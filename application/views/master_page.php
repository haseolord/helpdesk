<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jalakmas 2020 <?php if(isset($title)){echo " - " .$title;}?></title>
   <link rel="icon" href="<?php echo  base_url('assets/images/logo.png')  ?>" type="image/png" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/js/bower_components') ?>/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/js/bower_components') ?>/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/js/bower_components') ?>/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/dist') ?>/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/dist') ?>/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets/js/bower_components') ?>/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/js/bower_components') ?>/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/js/bower_components') ?>/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/js/bower_components') ?>/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/js/plugins') ?>/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

  <!-- PNotify -->
  <link href="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.brighttheme.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.history.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.material.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.mobile.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Select 2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <style type="text/css">
    #datepicker{
      z-index: 9999;
    }
    .logo{
      background: #FFA500 !important;
    }
    .sidebar-toggle:hover{
      background: #FFA500 !important;
    }
    .select2{
      width: 100% !important;
    }
    .select2-selection__rendered {
        margin:-7px !important;
      }
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<input type="hidden" id="hdn_base_url" value="<?=base_url()?>" />
<input type="hidden" id="hdn_site_url" value="<?=site_url()?>" />
<div class="wrapper">

  <?php $this->load->view('template/header')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php 
    if($this->session->userdata('role') == 1 ){
      $this->load->view('admin/leftbar');
    }
    elseif($this->session->userdata('role') == 2 ){
      $this->load->view('peserta/leftbar');
    }
    elseif($this->session->userdata('role') == 3 ){
      $this->load->view('admin/leftbar_pendaftaran');
    }
    elseif($this->session->userdata('role') == 4 ){
      $this->load->view('admin/leftbar_pos');
    }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/js/bower_components') ?>/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/js/bower_components') ?>/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/js/bower_components') ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url() ?>assets/js/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('assets/js/bower_components') ?>/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url('assets/js/bower_components') ?>/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('assets/js/bower_components') ?>/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url('assets/js/plugins') ?>/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url('assets/js/bower_components') ?>/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/js/bower_components') ?>/fastclick/lib/fastclick.js"></script>
    <!-- PNotify -->
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.js"></script>
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.animate.js"></script>
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.callbacks.js"></script>
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.confirm.js"></script>
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.desktop.js"></script>
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.history.js"></script>
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.mobile.js"></script>
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.nonblock.js"></script>
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.reference.js"></script>
    <script src="<?=base_url()?>assets/plugins/pnotify/dist/pnotify.tooltip.js"></script>
    <!-- Sweetalert2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/js/dist') ?>/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/js/dist') ?>/demo.js"></script>
    <!-- select 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
     <!-- select 2 -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>assets/js/dist/jquery-price-format.js"></script>

    <!-- dattale export -->
      <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $content; ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Designed By</b> Jalakmas Tech Team
    </div>
     <strong>Copyright © 2019<a href="<?php echo base_url() ?>"> Jalakmas Championship 2020</a>.</strong>
  </footer>


  
<?php if(isset($javascript)){echo '<script src="'.base_url().'assets/js/function/'.$javascript.'"></script>';}?>
<script type="text/javascript">
  //Date picker
  $('.datepicker').datepicker({
    autoclose: true
  });
   $('.select2').select2({});
</script>

</body>
</html>
