<?php

namespace App\Controller;

use App\Model\Usuario;

final class UsuarioController
{
    public static function cadastro() : void
    {
        $model = new Usuario();

        $model->nome = 'Rafael';
        $model->email = 'rjv@gmail.com';
        $model->senha = '1234';
        $model->save();
    }

    public static function listar() : void
    {
        $usuario = new Usuario();
        $usuario->getAllRows();
    }
}