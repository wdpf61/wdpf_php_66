</div>
</div>
</div>
  <!-- /.content-wrapper -->
<?php //include("views/layout/footer.php");?>
 <?php //include("views/layout/control_sidebar.php");?>
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $base_url?>/asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<script src="<?php echo $base_url?>/asset/plugins/select2-4.1.0/js/select2.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo $base_url?>/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $base_url?>/asset/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $base_url?>/asset/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo $base_url?>/asset/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo $base_url?>/asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $base_url?>/asset/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $base_url?>/asset/plugins/moment/moment.min.js"></script>
<script src="<?php echo $base_url?>/asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $base_url?>/asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $base_url?>/asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $base_url?>/asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base_url?>/asset/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base_url?>/asset/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $base_url?>/asset/dist/js/pages/dashboard.js"></script>
<script src="<?php echo $base_url?>/js/helper.js"></script>
<script>
   $(function(){
       
       $("select").select2();
      

   });
</script>
</body>
</html>
