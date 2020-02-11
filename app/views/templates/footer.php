<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">Sunqupacha</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.2
    </div>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php echo RUTA_PLUGIN; ?>/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo RUTA_PLUGIN; ?>/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo RUTA_PLUGIN; ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo RUTA_PLUGIN; ?>/datatables/jquery.dataTables.js"></script>
<script src="<?php echo RUTA_PLUGIN ?>/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo RUTA_PLUGIN; ?>/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo RUTA_PLUGIN; ?>/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?php echo RUTA_PLUGIN; ?>/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo RUTA_PLUGIN; ?>/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo RUTA_PLUGIN; ?>/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo RUTA_PLUGIN; ?>/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo RUTA_PLUGIN; ?>/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo RUTA_PLUGIN; ?>/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo RUTA_PLUGIN; ?>/moment/moment.min.js"></script>
<script src="<?php echo RUTA_PLUGIN; ?>/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo RUTA_PLUGIN; ?>/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo RUTA_PLUGIN; ?>/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo RUTA_PLUGIN; ?>/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo RUTA_DIST; ?>/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo RUTA_DIST; ?>/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo RUTA_DIST; ?>/js/demo.js"></script>
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
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>