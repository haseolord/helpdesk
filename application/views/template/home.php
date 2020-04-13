<!DOCTYPE html>
<html>
<?php $this->load->view('template/head')?>
<body class="hold-transition skin-blue sidebar-mini">

  <?php $this->load->view('template/header')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php 
    if($this->session->userdata('role') == 1 ){
      $this->load->view('admin/leftbar');
    }
    elseif($this->session->userdata('role') == 2 ){
      $this->load->view('peserta/leftbar');
    }
    elseif($this->session->userdata('role') == 3){
      $this->load->view('admin/leftbar_pendaftaran');
    }
    elseif($this->session->userdata('role') == 4){
      $this->load->view('admin/leftbar_pos');
    }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $content; ?>

    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('template/footer')?> 
</body>
</html>
