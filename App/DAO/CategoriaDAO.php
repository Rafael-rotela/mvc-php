<?php

namespace App\DAO;

use App\DAO\DAO;
use App\Model\Categoria;

class CategoriaDAO extends DAO
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function save(Categoria $model) : Categoria
    {
        return ($model->id !== null) ? $this->update($model) : $this->insert($model);
    }

    public function insert(Categoria $model) : Categoria
    {
        $sql = "INSERT INTO categoria (descricao,nome) VALUES (?.?)";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1,$model->descricao);
        $stmt->bindValue(2,$model->nome);
        $stmt->execute();
        return $model;
    }

    public function update(Categoria  $model) : Categoria
    {
        $sql = "UPDATE categoria SET descricao = ? nome = ? WHERE id_categoria = ?";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1,$model->descricao);
        $stmt->bindValue(2,$model->nome);
        $stmt->execute();
        return $model;
    }

    public function select() : Categoria
    {
        $sql = "SELECT * FROM categoria";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(DAO::FETCH_CLASS,"App/Model/Categoria");
    }

    public function selectById(int $id) : ?Categoria
    {
        $sql = "SELECT * FROM categoria WHERE id_categoria = ?";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchOject(DAO::FETCH_CLASS,"App/Model/Categoria");
    }

    public function delete(int $id) : bool
    {
        $slq = "DELETE categoria WHERE id_categoria = ?";

        $stmt = parent::$conexao->prepare($slq);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}