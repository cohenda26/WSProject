<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $host = $_SERVER['HTTP_HOST'];

    Define('HOST', 'http://'.$host.'/');
    define('ROOT', $root.'/');

    define('CONTROLLERS', ROOT.'controllers/');
    define('VIEWS', ROOT.'views/');
    define ('MODELS', ROOT.'models/');
    define('AJAX', ROOT.'ajax/');

    define('ASSETS', HOST.'assets/');
?>