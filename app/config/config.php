<?php
/* CONFIGURACION DE DATOS DE CONEXION */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'prueba');
define('RUTAL_APP', dirname(dirname(__FILE__)));
/* RUTA DEL SISTEMA GENERAL */
define('RUTA_URL', 'http://localhost:8080/colegio');
define('NAME_SITE', 'Sistema de colegio');
/* RUTA DE MODULOS */
define('MODULO_MATRICULA', NAME_SITE.'-Matricula');
define('MODULO_LIBRETA', NAME_SITE.'-Libretas');
/* RUTA DE RECURSOS PUBLIC */
define('RUTA_TIPOGRAFIA', RUTAL_APP.'tipografias/');
define('RUTA_IMAGENES', RUTAL_APP.'img/');
define('RUTA_ESTILOS', RUTAL_APP.'css/');
define('RUTA_javascripts', RUTAL_APP.'js/');