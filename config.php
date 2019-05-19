<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $host = $_SERVER['HTTP_HOST'];
    
    //date_default_timezone_set('Europe/Paris');

    Define('HOST', 'http://'.$host.'/');
    define('ROOT', $root.'/');

    define('CONTROLLERS', ROOT.'src/controllers/');
    define('VIEWS', ROOT.'src/views/');
    define('MODELS', ROOT.'src/models/');
    define('AJAX', ROOT.'src/ajax/');

    define('NODEJS', ROOT.'nodejs/');
    define('ASSETS', HOST.'assets/');
?>