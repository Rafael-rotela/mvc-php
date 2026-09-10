<?php

namespace App\DAO;

use App\Model\Autor;

final class AutorDAO extends DAO
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function save(Autor $model): Autor
    {
        return ($model->id == null) ?  $this->insert($model) :  $this->update($model);
    }

    public function insert(Autor $model): Autor
    {
        $sql = "INSERT INTO Autor(nome,data_nascimento,cpf) VALUES(?,?,?)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->data_nascimento);
        $stmt->bindValue(3, $model->cpf);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();
        return $model;
    }

    public function update(Autor $model): Autor
    {
        $sql = "UPDATE Autor SET nome=?,data_nascimento=?,cpf=? WHERE id_Autor=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->data_nascimento);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();
        return $model;
    }

    public function selectById(int $id): ?Autor
    {
        $sql = "SELECT * FROM Autor WHERE id_Autor=?";

        $stmt = parent::$conexao->prepare($sql);
      
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject("App\Model\Autor");
    }

    public function select(): array
    {
        $sql = "SELECT * FROM Autor WHERE id_Autor=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS,"App\Model\Autor");
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM Autor WHERE id_Autor=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        return $stmt->execute();
    }
}
