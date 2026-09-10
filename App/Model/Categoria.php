<?php

namespace App\Model;

use App\DAO\CategoriaDAO;

class Categoria
{
    public ?int $id;
    public string $descricao;
    public string $nome;

        public function save(): Categoria
    {
        return (new CategoriaDAO())->save($this);
    }

    public function getById(int $id): ?Categoria
    {
        return (new CategoriaDAO())->selectById($id);
    }

    public function getAllRows() : Categoria
    {
        return (new CategoriaDAO())->select();
    }

    public function delete(int $id): bool
    {
        return (new CategoriaDAO())->delete($id);
    }
}