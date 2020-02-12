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
    <!-- Main content -->
    <section class="content">
    

                <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
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
                        <a  data-toggle="modal" data-target="#modal-default" href="<?php echo RUTA_URL; ?>/usuarios/ver/<?php echo $estudiantes->cod_user;  ?>" class="text-muted"><i  class="fas fa-search text-lightblue"></i></a>                        
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
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })      
  })
</script>
<script>
  $(function () {
    $("#alumno").DataTable();
    $("#docente").DataTable();
    $("#auxiliar").DataTable();
    $("#secretaria").DataTable();
    $("#padre").DataTable();   
  });
</script>
