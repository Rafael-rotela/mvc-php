<?php

use App\Controller\{AlunoController}; 
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/':
        echo "pagina inicial";
        break;
    case '/mvc-php/Aluno':
        AlunoController::listar();
        break;
    case '/mvc-php/Aluno/Cadastro':
        AlunoController::cadastro();
        break;
}