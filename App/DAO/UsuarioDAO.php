<?php

namespace App\DAO;

use App\Model\Usuario;

final class UsuarioDAO extends DAO
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function save(Usuario $model) : Usuario
    {
        return ($model->id !== null) ? $this->update($model) : $this->insert($model);
    }

    public function insert(Usuario $model) : Usuario
    {
        $slq = "INSERT INTO usuario( nome, email, senha ) VALUES ( ?, ?, ? )";
        $stmt = parent::$conexao->execute($slq);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(4, $model->senha);
        $stmt->execute();
        $model->id = parent::$conexao->lastInsertId();

        return $model;
    }
    
    public function update($model) : Usuario
    {
         $slq = "UPDATE usuario SET nome = ? , email = ?, senha = ? WHERE id_usuario = ?";
        $stmt = parent::$conexao->execute($slq);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(4, $model->senha);
        $stmt->execute();
        return $model;
    }

    public function select() : array
    {
        $slq = 'SELECT * FROM usuario';
        $stmt = parent::$conexao->prepare($slq);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS,"App/Model/Usuario");
    }

    public function selectById($id) : ?Usuario
    {
        $slq = "SELECT * FROM usuario WHERE id_usuario = ?";

        $stmt = parent::$conexao->prepare($slq);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App/Model/Usuario");
    }

    public function delete(int $id) : bool
    {
        $slq = "DELETE usuario WHERE id_usuario = ?";

        $stmt = parent::$conexao->prepare($slq);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}