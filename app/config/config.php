<?php
/* CONFIGURACION DE DATOS DE CONEXION */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_colegio');
define('RUTAL_APP', dirname(dirname(__FILE__)));
define('APP', 'http://localhost:8080/app/');
/* RUTA DEL SISTEMA GENERAL */
define('RUTA_URL', 'http://localhost:8080/colegio');
define('RUTA_RECURSO','http://localhost:8080/colegio/public');
define('NAME_SITE', 'Sistema de colegio');
/* RUTA DE MODULOS */
define('MODULO_MATRICULA', NAME_SITE.'-Matricula');
define('MODULO_LIBRETA', NAME_SITE.'-Libretas');
/* RUTA DE RECURSOS PUBLIC */
define('RUTA_TIPOGRAFIA', RUTA_RECURSO.'/tipografias');
define('RUTA_IMAGENES', RUTA_RECURSO.'/img');
define('RUTA_ESTILOS', RUTA_RECURSO.'/css');
define('RUTA_JAVASCRIPT', RUTA_RECURSO.'/js');
define('RUTA_PLUGIN', RUTA_RECURSO.'/plugin');
define('RUTA_DIST', RUTA_RECURSO.'/dist');