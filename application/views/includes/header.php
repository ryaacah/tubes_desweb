<!DOCTYPE html>
<html lang="in">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Hallynime Retreat | <?= $title ?></title>
  
  <!-- Icon Page -->
  <link rel="icon" href="<?= base_url("assets/images/logo.png") ?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("assets/adminlte/") ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("assets/adminlte/") ?>dist/css/adminlte.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url("assets/adminlte/") ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url("assets/adminlte/") ?>plugins/daterangepicker/daterangepicker.css">
  <!-- Toast -->
  <link rel="stylesheet" href="<?= base_url('/assets/adminlte/plugins'); ?>/toastr/toastr.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" href="<?= base_url('/assets/adminlte/plugins'); ?>/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Magnific -->
  <link rel="stylesheet" href="<?= base_url('assets/js/magnific-popup/'); ?>magnific-popup.css">
  <!-- Select -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <!-- Chart -->
  <link rel="stylesheet" href="<?= base_url('/assets/adminlte/plugins'); ?>/chart.js/Chart.css">
  <!-- jQuery -->
  <script src="<?= base_url("assets/adminlte/") ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url("assets/adminlte/") ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Chart -->
  <script src="<?= base_url('assets/adminlte/plugins'); ?>/chart.js/Chart.js"></script>  
</head>

<!-- Alert Error -->
<?php
  $error = $this->session->flashdata('error');
  if ($error) {
  ?>
    <script type="text/javascript">
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000
          });

          Toast.fire({
            icon: 'error',
            title: '&nbsp;<?php echo $error ?>'
          })
        });
    </script>
  <?php }
?>

<!-- Alert Success -->
<?php
  $success = $this->session->flashdata('success');
  if ($success) {
  ?>
    <script type="text/javascript">
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000
          });

          Toast.fire({
            icon: 'success',
            title: '&nbsp;<?php echo $success ?>'
          })
        });
    </script>
  <?php }
?>

<style>
  .content-wrapper > .content{
    padding: 4rem 0.5rem!important;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url("assets/images/logo.png") ?>" alt="" style="width:25%;height:auto;">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url($menuLink) ?>" class="nav-link"><?= $title ?></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-user-circle"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url("dashboard")?>" class="brand-link text-center">
      <span class="font-weight-light">HR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url("dashboard")?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>orders" class="nav-link">
              <i class="fas fa-cash-register nav-icon"></i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>rooms" class="nav-link">
              <i class="fas fa-bed nav-icon"></i>
              <p>Rooms</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>users" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>Users</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>