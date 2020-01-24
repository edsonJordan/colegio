<?php 
class Redireccion{
    function rediccionar($pagina){
        header('location: ' . RUTA_URL .'/'. $pagina);
    }
}