<?php
    //configuraciones generales
    require_once 'config/configurar.php';

    //autoload php
    spl_autoload_register(function($clase){
        require_once 'libs/'.$clase.'.php';
    });

