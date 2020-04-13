<html>
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    body{
      background-image: url('<?php echo base_url('assets/images/bg.jpg') ?>') !important;
      /*background-repeat: no-repeat;*/
      background-size: 100% 100%;
    }
  </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<head>
  <title> Pendaftaran Jalakmas </title>
  <link rel="icon" href="<?php echo  base_url('assets/images/logo.png')  ?>" type="image/png" sizes="16x16">
  <style type="text/css">
    body{
      height: auto;
    }
    .bodyframe{
      width: 100%;
      margin-top: 10%;
    }
    .dropbtn {
      background-color: #4CAF50;
      color: #ffffff;
      margin-top: 30px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      width: 160px;
      height: 40px;
    }

    .dropbtn a {
      text-decoration: none;
      color: #ffffff;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 10px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }
  </style>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper, bodyframe">
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>Selamat Datang </b><div>Jalakmas Championship 2020</div></a>
  </div>
  <!-- User name -->
  <div class="text-center" style="margin: 20px auto"><img src="<?php echo base_url('assets/images/logo.png') ?>" width="150px"><br/>
  <!--<div style="margin-top:20px "> <a href="<?php echo base_url()?>homepage/mata_lomba" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-right"></i> Lihat Mata Lomba</div></a>-->
  <div class="dropdown">
  <button class="dropbtn">Penggalang</button>
  <div class="dropdown-content">
  <a href="<?php echo base_url()?>homepage/mata_lomba">SD</a>
  <a href="<?php echo base_url()?>homepage/mata_lomba">SMP</a>
  </div>
  </div>
  <button class="dropbtn"><a href="<?php echo base_url()?>homepage/mata_lomba">Penegak</a></button>
  </div>
  <!-- /.lockscreen-item -->
  <div style="margin-top: 10px;" class="help-block text-center">
    Ki Bagus Rangin & Nyimas Gandasari
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2019 <b><a href="https://jalakmas.io" class="text-black">JC2020</a></b><br>
    <!-- All rights reserved -->
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
</body>
<!-- <body>
  <div class="row" style="margin-top: auto">
    <div class="col-md-12">
        <div class="boxes">
          <h3 style="font-weight: bold">Selamat Datang <div>Jalakmas 2020</div></h3>
          <img src="<?php echo base_url('assets/images/logo.png') ?>" width="150px">
          <div style="margin-top:20px "> <a href="" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-right"></i> Lihat Mata Lomba</di></a>
        </div>
    </div>
  </div>
 <div class="row" style="margin-top: auto">
    <div class="col-md-12">
        <div class="boxes">
          <h3 style="font-weight: bold">Selamat Datang <div>Jalakmas 2020</div></h3>
          <img src="<?php echo base_url('assets/images/logo.png') ?>" width="150px">
          <div style="margin-top:20px "> <a href="" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-right"></i> Lihat Mata Lomba</di></a>
        </div>
    </div>
  </div>
</body> -->

<script type="text/javascript">

</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146784115-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146784115-1');
</script>


</html>
