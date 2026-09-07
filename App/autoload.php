<?php

spl_autoload_functions(function($nome_da_classe)
{
    $arquivo = BASE_DIR . '/' .  $nome_da_classe . '.php';
    if(file_exists($arquivo))
    {
        include $arquivo;
    } else {
        throw new Exception("Arquivo inexistente");
    }
});