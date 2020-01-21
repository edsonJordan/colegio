<?php 
/* Redirecionamiento a paginas */
function rediccionar($pagina){
    header('location: ' . RUTA_URL . $pagina);
}
