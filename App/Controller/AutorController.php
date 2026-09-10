<?php

namespace App\Controller;

use App\Model\Autor;

final class AutorController
{
    public static function cadastro() : void
    {
        $model = new Autor();

        $model->nome = 'Rafael';
        $model->data_nascimento = '02/12/2000';
        $model->cpf = '12345678923';
        $model->save();
    }

    public static function listar() : void
    {
        $usuario = new Autor();
        $usuario->getAllRows();
    }
}