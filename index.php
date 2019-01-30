<?php
    require_once('config.php');
    require_once(CONTROLLERS.'Router.php');

    $router = new Router();
    $router->routeReq();
?>