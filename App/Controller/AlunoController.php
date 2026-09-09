<?php

namespace App\Controller;

use App\Model\Aluno;

final class AlunoController
{
    public static function cadastro() : void
    {
        $model = new Aluno();
        $model->id = 9;
        $model->nome = 'Rafael';
        $model->ra = 124.123;
        $model->curso = 'Eng.Software';
        $model->save();
    }

    public static function listar() : void
    {
        echo "listar";
        $aluno = new Aluno();
        $aluno->getAllRows();
    }
}