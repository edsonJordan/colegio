<?php   
  $dashboard = 'Formulario';
  $url = explode('/', $vista);
  $controlador = $url[1];
  $metodo = $url[2];
  $usuarios= true;
  $agregarusuarios  = true;
  require RUTAL_APP . '/views/templates/header.php'; 
  require RUTAL_APP . '/views/templates/head.php'; 
?>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Agregar usuarios</h3>
               
              </div>
              <!-- /.card-header -->
              <!-- form start -->              
              <form method="POST" action="<?php echo  RUTA_URL; ?>/usuarios/agregar" onsubmit="return checkSubmit();" role="form">
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-6">   
                    <?php                    
                    ?>                                    
                  <label > Tipo de usuario</label>                    
                    <select class="form-control select2 " data-dropdown-css-class="<?php if( isset($_GET['mensage']) == '20000' ){ echo   'select2-danger';  }      ?>" name="type_user" style="width: 100%;" required >
                    <option selected="selected" value="">Elegir opcion</option>
                      <?php                      
                      foreach($datos['tipos'] as $tipos){
                        ?>
                         <option value="<?php echo $tipos->cod_type_user; ?>" ><?php echo $tipos->type; ?></option>
                      <?php
                      }                  
                      ?>                         
                        </select>                    
                  </div>
                  <div class="col-6">                    
                  <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" class="form-control " name="nombre" id="inputSuccess" placeholder="Enter ..." required  >
                  </div>                   
                  <div class="col-6">
                  <label for="exampleInputEmail1"> Apellido paterno</label>
                  <input type="text" class="form-control " name="ap_paterno" id="inputSuccess" placeholder="Enter ..." required>                 
                  </div>
                  <div class="col-6">                    
                  <label for="exampleInputPassword1">Apellido materno</label>
                    <input type="text" class="form-control " name="ap_materno" id="inputSuccess" placeholder="Enter ..." required>
                  </div>                   
                  <div class="col-6">                    
                  <label for="exampleInputPassword1">Telefono</label>
                    <input type="tel" class="form-control " name="telefono" pattern="[0-9]{9}"  id="inputSuccess" placeholder="Enter ..." required >
                  </div> 
                  <div class="col-6">                    
                  <label for="exampleInputPassword1">Correo</label>
                    <input type="email" class="form-control  
                    <?php 
                  if(isset($_GET['mensage'])){
                    switch($_GET['mensage']){
                      case 23000:
                        echo "is-invalid";
                      break;
                    }
                  }                           ?> 
                    " name="correo" id="inputSuccess" placeholder="Enter ..." required >
                  </div>                                    
                  <div class="col-6">                    
                  <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control " name="password" placeholder="Enter ..."  required>
                  </div>                   
                  <div style="padding-top: 20px;" class="col-12 d-flex justify-content-around ">
                  <div  class="  custom-control custom-switch custom-switch-off-primary custom-switch-on-fuchsia">
                      <input type="checkbox" class="form-control custom-control-input"  name="genero"   id="customSwitch3">                      
                      <label class="custom-control-label " for="customSwitch3" id="label" >Masculino</label>
                    </div>                                  
                  </div>
                </div>                            
                </div>
                <!-- /.card-body -->
                <div class=" card-footer col center  ">
                <div  class="col text-center" >
                <button type="submit" class="btn btn-primary col-4 ">Agregar </button>
                </div>                  
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- Horizontal Form -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-4">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Agregar monitoreo de estudiantes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="POST" action="<?php echo  RUTA_URL; ?>/usuarios/monitoreo" onsubmit="return checkSubmit();" role="form">
                  <div class="row">
                    <div class="col-12">
                      <!-- text input -->
                      <div class="form-group">
                  <label>Estudiantes</label>
                  <select class="select2" name="estudiantes[]" multiple="multiple" data-placeholder="Seleccion estudiante(s)" style="width: 100%;" required>
                  <?php                      
                      foreach($datos['alumnos'] as $alumnos){
                        ?>
                         <option value="<?php echo $alumnos->cod_user; ?>" ><?php echo $alumnos->name." ".$alumnos->ap_paterno." ".$alumnos->ap_materno.$alumnos->cod_user; ?></option>
                      <?php
                      }                  
                      ?>  
                  </select>
                </div>               
                  </div>
                  <div class="col-12">
                      <!-- text input -->
                      <div class="form-group">
                  <label>Padre o tutor</label>
                  <select class="form-control select2 "  name="familiar" style="width: 100%;"  required >
                    <option selected="selected" value="">Elegir opcion</option>
                      <?php                      
                      foreach($datos['padres'] as $padres){
                        ?>
                         <option value="<?php echo $padres->cod_user; ?>" ><?php echo $padres->name." ".$padres->ap_paterno." ".$padres->ap_materno." ".$padres->cod_user; ?></option>
                      <?php
                      }                  
                      ?>                         
                        </select>
                </div>               
                  </div>
                  
                  <div class="  col center  ">
                <div  class="col text-center" >
                <button type="submit" class="btn btn-warning col-4 ">Asignar </button>
                </div>                  
                </div>
                
                  </div>
                                                    
                  </div>                                               
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->          
          </div>
          <!--/.col (right) -->
        </div> 
      </div> 
  <script>            
   enviando = false; //Obligaremos a entrar el if en el primer submit    
    function checkSubmit() {
        if (!enviando) {
    		enviando= true;
    		return true;
        } else {
            //Si llega hasta aca significa que pulsaron 2 veces el boton submit
            alert("El formulario ya se esta enviando");
            return false;
        }
    }    
</script>
</div>                
      </div>
<?php
  require RUTAL_APP . '/views/templates/footer.php'; 
?>
<!-- var url = < ?= //json_encode($_GET['error']) ?>; -->
<script>
    $( "#customSwitch3" ).click(function() {
      var x = document.getElementById("label");
  if (x.innerHTML === "Masculino") {
    x.innerHTML = "Femenino";
  } else {
    x.innerHTML = "Masculino";
  }
  });
      


  function jsfunction(codigo){    
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });    
    switch(codigo){
      case 10000:
        $(function() {
    toastr.success('Los datos fueron guardados satisfactoriamente')
  });   
  break;
      case 23000:
        $(function() {
    toastr.error('El correo ya existe en la base de datos')
  });
    break;
    case 20000:
      $(function() {
    toastr.error('Seleccione un tipo de usuario')
  });
  break;
    }       
  }    
  </script>
<?php
if( isset($_GET['mensage'])){
  $error = $_GET['mensage'];      
  ?>
  <script> jsfunction(<?php echo $error; ?>);</script>
  <?php  
}
?>

