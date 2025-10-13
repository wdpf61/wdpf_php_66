<?php session_start();
  require_once("configs/config.php");
  require_once("helpers/helper.php");
  require_once("libraries/library.php");
  require_once("models/model.php");
  require_once("controllers/controller.php");
  
  // if(!isset($_SESSION["uid"])) header("location:$base_url");
  // $uid=$_SESSION["uid"];
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INTELLECT FRAMEWORK | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="<?php echo $base_url?>/asset/plugins/select2-4.1.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $base_url?>/asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $base_url?>/asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $base_url?>/asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $base_url?>/asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $base_url?>/asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $base_url?>/asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $base_url?>/asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $base_url?>/asset/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo $base_url?>/asset/font-awesome-4.7.0/css/font-awesome.min.css">
  
  <!-- <script src="https://use.fontawesome.com/bf6432abac.js"></script> -->
  
  <!-- jQuery -->
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="<?php echo $base_url?>/asset/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php include("views/layout/navbar.php");?>
<?php include("views/layout/main_sidebar.php");?>
<div class="content-wrapper"> 
   <section class="content-header">
      <div class="container-fluid"> 