<?php

    spl_autoload_register(function ($nombre_clase) {
    require_once '../app/librerias/'.$nombre_clase . '.php';
    });
    require_once 'librerias/configurar.php';
    require_once 'librerias/extras.php';

 ?>
