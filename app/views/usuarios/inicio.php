<?php   
  $dashboard = 'Administración';
  $url = explode('/', $vista);
  $controlador = $url[1];
  $metodo = $url[2];
  require RUTAL_APP . '/views/templates/header.php'; 
  require RUTAL_APP . '/views/templates/head.php'; 
?>
    <!-- Main content -->
    <section class="content">
    <?php         
    /* var_dump($datos);
    tipos_user */
    $tipo_color = ['bg-primary', 'bg-success', 'bg-warning', 'bg-danger', 'bg-info'];      
    
     
    ?>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php
          foreach($datos['tipos_user'] as $key => $value) {
        /*     echo  $value['type']." Cantidad =". $value['cantidad'] . " - " . $tipo_color[$key] . "<br>"; */
        ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box <?php echo $tipo_color[$key]; ?>">
              <div class="inner">
                <h3><?php echo $value['cantidad']; ?></h3>
                <p><?php echo $value['type']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php
        }           
          ?>

          
        

          </div>
        </div>
      </div>
        
        
        <!-- /.row -->

<?php
  require RUTAL_APP . '/views/templates/footer.php'; 
?>
