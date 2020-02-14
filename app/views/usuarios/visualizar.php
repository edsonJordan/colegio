<?php   
  $dashboard = 'Administración';
  $url = explode('/', $vista);
  $controlador = $url[1];
  $metodo = $url[2];  
  
  require RUTAL_APP . '/views/templates/indice2.php'; 

  $this->link(['plugin/fontawesome-free/css/all.min.css'
  ,'plugin/select2/css/select2.min.css'
  ,'plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css'
  ,'plugin/datatables-bs4/css/dataTables.bootstrap4.css'
  ,'dist/css/adminlte.min.css'
  ,'plugin/toastr/toastr.min.css'
  ]);
  require_once RUTAL_APP . '/views/templates/header2.php'; 
  require_once RUTAL_APP . '/views/templates/head.php'; 
?>
<style>
.fa-edit:hover{
  color:orange;
}

.fa-trash-alt:hover{
  color:#d9534f;
}
.fa-key:hover{
  color:#FFC107;
}
</style>
    <!-- Main content -->
    <section class="content">    
      <form id="formulario" action="">
      <div class="modal fade" id="modal-actualiza-padre">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Actualizar <label for="customSwitch3" id="label" ></label></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>              
            </div>
          <div class="modal-body">
      		<input type="text" hidden="" id="cod_user" name="">
        	<label>Nombre</label>
        	<input type="text" name="" id="name" class="form-control input-sm">
        	<label>Apellido paterno</label>
        	<input type="text" name="" id="ap_paterno" class="form-control input-sm">
        	<label>apellido materno</label>
        	<input type="text" name="" id="ap_materno" class="form-control input-sm">
        	<label>telefono</label>
          <input type="text" name="" id="phone" class="form-control input-sm">
          <label>Estado</label>
          <div class=" col-md-12 mx-auto btn-group btn-group-toggle " data-toggle="buttons">
                  <label id="labeldesabilitado" class="btn ">
                    <input type="radio" name="options" id="desabilitado" value="0" autocomplete="off" > Desabilitado
                  </label>
                  <label id="labelhabilitado" class=" btn  ">
                    <input type="radio" name="options" id="habilitado" value="1"  autocomplete="off" > Habilitado
                  </label>
                  <label id="labeldeuda" class="btn ">
                    <input type="radio" name="options" id="deudapendiente" value="2" autocomplete="off" >Deuda Pendiente
                  </label>                  
                </div>
      </div>
      </form>     
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-info " data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info ">Editar Cambios</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="container-fluid">        
        <div class="card card-default ">
          <div class="card-header bg-info">
            <h3 class="card-title ">Alumnos</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool text-navy" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->          
          <div class="card-body">
            <div class="row">
              <div class="col-12">                               
            <!-- /.card-header -->
            <div class="card-body">               
            <!-- /.card-header -->
            <div class="card-body">
              <table id="alumno" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Más</th>                                             
                  </tr>
                </thead>
                <tbody>         
                <?php
                foreach($datos['usuarios'] as $estudiantes){
                    ?>
                   <?php 
                      switch($estudiantes->type){
                        case 'alumno':
                        ?>
                         <tr>
                        <td><?php echo $estudiantes->name; ?></td>
                        <td><?php echo $estudiantes->ap_paterno." ".$estudiantes->ap_materno; ?></tds>
                        <td><?php echo $estudiantes->phone; ?></td>
                        <td><?php 
                        switch($estudiantes->status){
                          case 0:
                            echo "<span class='badge bg-danger'>Desabilitado</span>";
                          break;
                          case 1:
                            echo "<span class='badge bg-success'>Habilitado</span>";
                          break;
                          case 2:
                            echo "<span class='badge bg-warning'>Deuda pendiente</span>";
                          break;
                          
                        }
                        ?></td>
                        <td class="text-center">
                        <a    href="<?php echo RUTA_URL; ?>/usuarios/ver/<?php echo $estudiantes->cod_user;  ?>" class="text-muted"><i  class="fas fa-search text-lightblue"></i></a>                        
                      </td>
                    </tr>
                        <?php 
                        break; 
                      }                   
                     ?>                                      
                    <?php
                }
                ?>             
                </tbody>
                <tfoot>
               
                  <tr>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Telefono</th>
                      <th>Estado</th>
                      <th>Más</th>                                          
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>                             
          <!-- /.card -->              
          </div>
          </div>
          </div>
        </div>

         <div class="card card-default">
          <div class="card-header bg-info">
            <h3 class="card-title ">Docente</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool text-navy" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">                               
            <!-- /.card-header -->
            <div class="card-body">               
            <!-- /.card-header -->
            <div class="card-body">
            <table id="docente" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Operaciones</th>                    
                         
                  </tr>
                </thead>
                <tbody>         
                <?php
                foreach($datos['usuarios'] as $estudiantes){
                    ?>
                   <?php 
                      switch($estudiantes->type){
                        case 'docente':
                        ?>
                         <tr>
                        <td><?php echo $estudiantes->name; ?></td>
                        <td><?php echo $estudiantes->ap_paterno." ".$estudiantes->ap_materno; ?></tds>
                        <td><?php echo $estudiantes->phone; ?></td>
                        <td><?php 
                        switch($estudiantes->status){
                          case 0:
                            echo "<span class='badge bg-danger'>Desabilitado</span>";
                          break;
                          case 1:
                            echo "<span class='badge bg-success'>Habilitado</span>";
                          break;
                          case 2:
                            echo "<span class='badge bg-warning'>Deuda pendiente</span>";
                          break;
                          
                        }
                        ?></td>
                        <td> editar</td>
                    </tr>
                        <?php 
                        break; 
                      }                   
                     ?>                                      
                    <?php
                }
                ?>          
                </tbody>
                <tfoot>
               
                  <tr>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Telefono</th>
                      <th>Estado</th>
                      <th>Operaciones</th>                                          
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>                             
          <!-- /.card -->              
          </div>
          </div>
          </div>
        </div>           

        <div class="card card-default">
          <div class="card-header bg-info">
            <h3 class="card-title ">Auxiliar</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool text-navy" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">                               
            <!-- /.card-header -->
            <div class="card-body">               
            <!-- /.card-header -->
            <div class="card-body">
            <table id="auxiliar" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Operaciones</th>                                             
                  </tr>
                </thead>
                <tbody>         
                <?php
                foreach($datos['usuarios'] as $estudiantes){
                    ?>
                   <?php 
                      switch($estudiantes->type){
                        case 'auxiliar':
                        ?>
                         <tr>
                        <td><?php echo $estudiantes->name; ?></td>
                        <td><?php echo $estudiantes->ap_paterno." ".$estudiantes->ap_materno; ?></tds>
                        <td><?php echo $estudiantes->phone; ?></td>
                        <td><?php 
                        switch($estudiantes->status){
                          case 0:
                            echo "<span class='badge bg-danger'>Desabilitado</span>";
                          break;
                          case 1:
                            echo "<span class='badge bg-success'>Habilitado</span>";
                          break;
                          case 2:
                            echo "<span class='badge bg-warning'>Deuda pendiente</span>";
                          break;                          
                        }
                        ?></td>
                        <td> editar</td>
                    </tr>
                        <?php 
                        break; 
                      }                   
                     ?>                                      
                    <?php
                }
                ?>             
                </tbody>
                <tfoot>
               
                  <tr>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Telefono</th>
                      <th>Estado</th>
                      <th>Operaciones</th>                                          
                  </tr>
                </tfoot>
            </table>
          </div>
            <!-- /.card-body -->
          </div>                             
          <!-- /.card -->              
          </div>
          </div>
          </div>
        </div>        
        <div class="card card-default">
          <div class="card-header bg-info">
            <h3 class="card-title ">Secretaria</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool text-navy" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">                               
            <!-- /.card-header -->
            <div class="card-body">               
            <!-- /.card-header -->
            <div class="card-body">
            <table id="secretaria" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Operaciones</th>                                             
                  </tr>
                </thead>
                <tbody>         
                <?php
                foreach($datos['usuarios'] as $estudiantes){
                    ?>
                   <?php 
                      switch($estudiantes->type){
                        case 'secretaria':
                        ?>
                         <tr>
                        <td><?php echo $estudiantes->name; ?></td>
                        <td><?php echo $estudiantes->ap_paterno." ".$estudiantes->ap_materno; ?></tds>
                        <td><?php echo $estudiantes->phone; ?></td>
                        <td><?php 
                        switch($estudiantes->status){
                          case 0:
                            echo "<span class='badge bg-danger'>Desabilitado</span>";
                          break;
                          case 1:
                            echo "<span class='badge bg-success'>Habilitado</span>";
                          break;
                          case 2:
                            echo "<span class='badge bg-warning'>Deuda pendiente</span>";
                          break;
                          
                        }
                        ?></td>
                        <td> editar</td>
                    </tr>
                        <?php 
                        break; 
                      }                   
                     ?>                                      
                    <?php
                }
                ?>             
                </tbody>
                <tfoot>
               
                  <tr>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Telefono</th>
                      <th>Estado</th>
                      <th>Operaciones</th>                                          
                  </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
          </div>                             
          <!-- /.card -->              
          </div>
          </div>
          </div>
        </div>
        <!-- /.card -->                        
          <div class="card card-default">
            <div class="card-header bg-info">
              <h3 class="card-title ">Padres de familia</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool text-navy" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-12">                               
              <!-- /.card-header -->
              <div class="card-body">               
              <!-- /.card-header -->
              <div class="card-body">
              <table id="padre" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Operaciones</th>                                             
                  </tr>
                </thead>
                <tbody>         
                <?php
                foreach($datos['usuarios'] as $estudiantes){
                    ?>
                   <?php 
                      switch($estudiantes->type){
                        case 'padre':
                        ?>
                         <tr>
                        <td><?php echo $estudiantes->name; ?></td>
                        <td><?php echo $estudiantes->ap_paterno." ".$estudiantes->ap_materno; ?></tds>
                        <td><?php echo $estudiantes->phone; ?></td>
                        <td><?php 
                        switch($estudiantes->status){
                          case 0:
                            echo "<span class='badge bg-danger'>Desabilitado</span>";
                          break;
                          case 1:
                            echo "<span class='badge bg-success'>Habilitado</span>";
                          break;
                          case 2:
                            echo "<span class='badge bg-warning'>Deuda pendiente</span>";
                          break;                          
                        }
                        ?></td>
                     
                        <td class="text-center">
                        <div class="row">
                        <div class=" col-3  " >
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver monitoreo ">
                        <a type="button" id="actualizapadres" data-toggle="modal" data-target="#modal-monitoreo" data-dismiss="modal"  class="text-muted"><i  class="fas fa-map-pin "></i></a> 
                        </span>
                       </div>
                      <div class=" col-3  " >   
                        <span class="red-tooltip  " tabindex="0" data-toggle="tooltip" title="Editar información">                                         
                        <a  type="button" id="actualizapadres" data-toggle="modal" data-target="#modal-actualiza-padre" data-dismiss="modal" onclick="agregaform('<?php echo $estudiantes->cod_user.'\n'.$estudiantes->name.'\n'.$estudiantes->ap_materno.'\n'.$estudiantes->ap_paterno.'\n'.$estudiantes->phone.'\n'.$estudiantes->status.'\n'.'Padre de familia'; ?>')" ><i   class="fas fa-edit  "></i></a>                                                                      
                        </span>
                        </div>
                        <div class=" col-3  " >   
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar datos ">                                         
                        <a  type="button" id="actualizapadres" data-toggle="modal"  data-dismiss="modal"  class=""><i  class="fas fa-trash-alt"></i></a>                                                                      
                        </span>
                        </div>
                        <div class=" col-3  " >                                            
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Cambiar contraseña ">                                         
                        <a  type="button" id="actualizapadres" data-toggle="modal"  data-dismiss="modal"  ><i  class="fas fa-key   "></i></a>                                                                      
                        </span>
                        </div>

                        </div>
                       
                        </td>
                    </tr>
                        <?php 
                        break; 
                      }                   
                     ?>                                      
                    <?php
                }
                ?>             
                </tbody>
                <tfoot>               
                  <tr>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Telefono</th>
                      <th>Estado</th>
                      <th>Operaciones</th>                                          
                  </tr>
                </tfoot>
            </table>
              </div>
              <!-- /.card-body -->
            </div>                             
            <!-- /.card -->              
          </div>
                <!-- /.form-group -->              
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->      
        </div>
        <!-- /.card -->
        <div class="row">              
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>    
    <!-- /.content -->
  </div>            
    <!-- /.row -->
<?php 
require_once RUTAL_APP . '/views/templates/footer2.php'; 
  $this->script([
    'plugin/jquery/jquery.min.js'
  ,'plugin/bootstrap/js/bootstrap.bundle.min.js'
  ,'plugin/datatables/jquery.dataTables.js'
  ,'plugin/sweetalert2/sweetalert2.min.js'
  ,'plugin/toastr/toastr.min.js'
  ,'plugin/datatables-bs4/js/dataTables.bootstrap4.js'
  ,'dist/js/adminlte.min.js'
  ,'dist/js/demo.js']);
  //$this->script(['dist/prueba2.js', 'dist/pueba.js']);  
?>
<script>
 function agregaform(datos){
d=datos.split('\n');
$('#name').val(d[0]);
$('#name').val(d[1]);
$('#ap_materno').val(d[2]);
$('#ap_paterno').val(d[3]);
$('#phone').val(d[4]);

var x = document.getElementById("label");
    x.innerHTML = d[6];
let status = d[5];
$("#labeldesabilitado").removeClass("active");
$("#labelhabilitado").removeClass("active");
$("#labeldeuda").removeClass("active");

if(status == 0){
  $("#labeldesabilitado").addClass("active");    
  $("#labeldesabilitado").addClass("bg-danger"); 
  $("#labelhabilitado").removeClass("bg-success");
  $("#labeldeuda").removeClass("bg-warning");
  $("#desabilitado").prop( "checked", true );
}
if(status == 1){
  $("#labelhabilitado").addClass("active");
  $("#labelhabilitado").addClass("bg-success"); 
  $("#labeldesabilitado").removeClass("bg-danger");
  $("#labeldeuda").removeClass("bg-warning");

  $("#habilitado").prop( "checked", true );  
}
if(status == 2){
  $("#labeldeuda").addClass("active");
  $("#labeldeuda").addClass("bg-warning"); 
  $("#labelhabilitado").removeClass("bg-success");
  $("#labeldesabilitado").removeClass("bg-danger");
  $("#deudapendiente").prop( "checked", true );
}
//console.log($('input:radio[name=options]:checked').val());
}

$( "#labeldesabilitado" ).click(function() {
  $("#labeldesabilitado").addClass("bg-danger"); 
  $("#labelhabilitado").removeClass("bg-success");
  $("#labeldeuda").removeClass("bg-warning");
});

$( "#labelhabilitado" ).click(function() {
  $("#labelhabilitado").addClass("bg-success"); 
  $("#labeldesabilitado").removeClass("bg-danger");
  $("#labeldeuda").removeClass("bg-warning");
});
$( "#labeldeuda" ).click(function() {
  $("#labeldeuda").addClass("bg-warning"); 
  $("#labelhabilitado").removeClass("bg-success");
  $("#labeldesabilitado").removeClass("bg-danger");
});
</script>
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
  $(function () {
    $("#alumno").DataTable();
    $("#docente").DataTable();
    $("#auxiliar").DataTable();
    $("#secretaria").DataTable();
    $("#padre").DataTable();   
  });
</script>
