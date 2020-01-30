<?php   
  $dashboard = 'Administración';
  $url = explode('/', $vista);
  $controlador = $url[1];
  $metodo = $url[2];
  require RUTAL_APP . '/views/templates/header.php'; 
  require RUTAL_APP . '/views/templates/head.php'; 
?>

</div>                
      </div>
      
<?php
  require RUTAL_APP . '/views/templates/footer.php'; 
?>
