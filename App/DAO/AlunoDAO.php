<?php

namespace App\DAO;

use App\Model\Aluno;
use Override;

final class AlunoDAO extends DAO
{
    #[Override]
    public function __construct()
    {
        return parent::__construct();
    }

    public function save(Aluno $model): Aluno
    {
        return ($model->id == null) ?  $this->insert($model) :  $this->update($model);
    }

    public function insert(Aluno $model): Aluno
    {
        $sql = "INSERT INTO aluno(nome,ra,curso) VALUES(?,?,?)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->ra);
        $stmt->bindValue(3, $model->curso);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();
        return $model;
    }

    public function update(Aluno $model): Aluno
    {
        $sql = "UPDATE aluno nome=?,ra=?,curso=? WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->ra);
        $stmt->bindValue(3, $model->curso);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();
        return $model;
    }

    public function selectById(int $id): ?Aluno
    {
        $sql = "SELECT * FROM aluno WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
      
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject("App\Model\Aluno");
    }

    public function select(): array
    {
        $sql = "SELECT * FROM aluno WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS,"App\Model\Aluno");
    }

    public function delete(): bool
    {
        $sql = "DELETE FROM aluno WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        return $stmt->execute();
    }
}
