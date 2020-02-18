<?php 
$dashboard ;
$controlador;
$metodo;
$gestion;
?>

<title> <?php  echo NAME_SITE .' | '. $controlador; ?></title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?php echo $dashboard; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo RUTA_URL.'/'.strtolower($url[1]).'/'.strtolower($url[2]);  ?>"><?php echo $controlador; ?></a></li>
                <li class="breadcrumb-item active"><?php echo $metodo; ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

  