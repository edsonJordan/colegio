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
                  <label > Tipo de usuario</label>                    
                    <select class="form-control select2" name="type_user" style="width: 100%;" >
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
                    <input type="text" class="form-control is-valid" name="nombre" id="inputSuccess" placeholder="Enter ..."  >
                  </div>                   
                  <div class="col-6">
                  <label for="exampleInputEmail1"> Apellido paterno</label>
                  <input type="text" class="form-control is-valid" name="ap_paterno" id="inputSuccess" placeholder="Enter ...">                 
                  </div>
                  <div class="col-6">                    
                  <label for="exampleInputPassword1">Apellido materno</label>
                    <input type="text" class="form-control is-valid" name="ap_materno" id="inputSuccess" placeholder="Enter ...">
                  </div>                   
                  <div class="col-6">                    
                  <label for="exampleInputPassword1">Telefono</label>
                    <input type="text" class="form-control is-valid" name="telefono" id="inputSuccess" placeholder="Enter ...">
                  </div> 
                  <div class="col-6">                    
                  <label for="exampleInputPassword1">Correo</label>
                    <input type="text" class="form-control is-valid" name="correo" id="inputSuccess" placeholder="Enter ...">
                  </div> 
                  <div class="col-6">
                  <label for="exampleInputEmail1"> contraseña</label>
                  <input type="text" class="form-control is-valid"  placeholder="Enter ...">                 
                  </div>
                  <div class="col-6">                    
                  <label for="exampleInputPassword1">Repite contraseña</label>
                    <input type="text" class="form-control is-valid" name="password" placeholder="Enter ...">
                  </div> 
                  <div style="padding-top: 20px;" class="col-12 d-flex justify-content-around ">
                  <div  class="  form-control custom-switch custom-switch-off-primary custom-switch-on-fuchsia">
                      <input type="checkbox" class="form-control custom-control-input  " checked="checked" name="genero"  id="customSwitch3">                      
                      <label class="custom-control-label " for="customSwitch3">femenino</label>
                    </div>              
                  </div>
                </div>           
                 
                </div>
                <!-- /.card-body -->

                <div class=" card-footer col center  ">
                <div  class="col text-center" >
                <button type="submit" class="btn btn-success col-4 ">Agregar </button>
                </div>
                  
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- Input addon -->          
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
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Text Disabled</label>
                        <input type="text" class="form-control" placeholder="Enter ..." disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Textarea Disabled</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." disabled></textarea>
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Input with
                      success</label>
                    <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i> Input with
                      warning</label>
                    <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Input with
                      error</label>
                    <input type="text" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                          <label class="form-check-label">Checkbox</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked>
                          <label class="form-check-label">Checkbox checked</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" disabled>
                          <label class="form-check-label">Checkbox disabled</label>
                        </div>
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">Radio</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1" checked>
                          <label class="form-check-label">Radio checked</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" disabled>
                          <label class="form-check-label">Radio disabled</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Disabled</label>
                        <select class="form-control" disabled>
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Select multiple-->
                      <div class="form-group">
                        <label>Select Multiple</label>
                        <select multiple class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Multiple Disabled</label>
                        <select multiple class="form-control" disabled>
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
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
