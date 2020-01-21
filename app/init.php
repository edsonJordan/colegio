<?php 
require_once 'config/config.php';
require_once 'helpers/url_helper.php';
spl_autoload_register(function($name_clase){
    require_once 'librerias/' .$name_clase. '.php';
});