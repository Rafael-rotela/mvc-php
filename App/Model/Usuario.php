<?php

namespace App\Model;

use App\DAO\AlunoDAO;
use App\DAO\UsuarioDAO;

final class Usuario
{
    public ?int $id;
    public string $nome;
    public string $email;
    public string $senha;
 
    public function save() : Usuario
    {
        return (new UsuarioDAO())->save($this);
    }

    public function getById(int $id) : ?Usuario
    {
        return (new AlunoDAO())->selectById($id);
    }

    public function getAllRows() : array
    {
        return (new AlunoDAO())->select();
    }

    public function delete(int $id) : bool
    {
        return (new AlunoDAO())->delete($id);
    }
}