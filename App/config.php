<?php

// 1® O diretório base "App"
// 2® Onde estão as views
// 3® Acesso ao DATABASE

define('BASE_DIR', dirname(__FILE__,2));
define('VIEWS', BASE_DIR . '/App/View');

$_ENV['db']['host'] = 'localhost';
$_ENV['db']['user'] = 'root';
$_ENV['db']['pass'] = '';
$_ENV['db']['database'] = 'biblioteca';
