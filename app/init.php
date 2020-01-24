<?php 
require_once 'config/config.php';

spl_autoload_register(function($name_clase){
    require_once 'librerias/' .$name_clase. '.php';
});