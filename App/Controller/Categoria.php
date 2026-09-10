<?php

namespace App\Controller;


use App\Model\Categoria;

final class CategoriaController
{
    public static function cadastro() : void
    {
        $model = new Categoria();

        $model->nome = 'Rafael';
        $model->descricao = 'Rafael';
        $model->save();
    }

    public static function listar() : void
    {
        $aluno = new Categoria();
        $aluno->getAllRows();
    }
}