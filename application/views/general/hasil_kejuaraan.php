<html>
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/back/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/jalakmas2020/AdminLTE.css">
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
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<head>
  <title> JC2020 </title>
  <link rel="icon" href="<?php echo  base_url('assets/images/logo.png')  ?>" type="image/png" sizes="16x16">
  <style type="text/css">
    body{
      height: auto;
      background-color: #F9E79F !important;
      /*background-repeat: no-repeat;*/
      background-size: 100% 100%;
      margin-top: -35px;
    }
    /* CSS Document */

    @import url(https://fonts.googleapis.com/css?family=Open+Sans);
    @import url(https://fonts.googleapis.com/css?family=Bree+Serif);

    h1 {
      font-size: 60px;
      text-align: center;
      color: #FFF;
    } 

    h3 {
      font-size: 30px;
      line-height: 34px;
      text-align: center;
      color: #FFF;
    }

    h3 a {
      color: #FFF;
    }

    a {
      color: #FFF;
    }

    h1 {
      margin-top: 100px;
      text-align:center;
      font-size:60px;
      line-height: 70px;
      font-family: 'Bree Serif', 'serif';
      }
    
    /*Button*/
    .button {
    border-radius: 4px;
    background-color: #f4511e;
    border: none;
    color: #FFFFFF;
    text-align: center;
    font-size: 16px;
    padding: 10px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 10px auto;
    width: 290px;
    }

    .button:hover{
      border-right: 20px solid #000;
    }

    .button  a{
      color: white;
      text-decoration: none;
    }

    .button span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }

    .button span:after {
      content: '\00bb';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }

    .button:hover span {
      padding-right: 25px;      
    }

    .button:hover span:after {
      opacity: 1;
      right: 0;
    }
    .welcome {
      font-size: 23px;
    }
    .footer {
    	max-width: 100%;
    }
    .footer img{
    	max-width: 100%;
    	max-height: 100%;
    	margin: 6px;
    }
    .suport {
    	text-align: center;
    	padding-bottom: 5px;
    }
  </style>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo welcome">
    <a href="<?php echo base_url()?>homepage/">Hasil Kejuaraan<div><b>Jalakmas Championship 2020</b></a></div>
  </div>
  <!-- User name -->
  <div class="text-center" style="margin: 20px auto;"><img src="<?php echo base_url('assets/images/logo.png') ?>" width="150px"><br/>
  <!--<div style="margin-top:20px "> <a href="<?php echo base_url()?>homepage/mata_lomba" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-right"></i> Lihat Mata Lomba</div></a>-->
  <!-- /.lockscreen-item -->
  <a href="<?php echo base_url()?>hasil_kejuaraan/sd"><button class="button"><span>Kejuaraan Penggalang SD/MI </span></button></a>
  <a href="<?php echo base_url()?>hasil_kejuaraan/smp"><button class="button"><span>Kejuaraan Penggalang SMP/MTs. </span></button></a>
  <a href="<?php echo base_url()?>hasil_kejuaraan/sma"><button class="button"><span>Kejuaraan Penegak/Pandega </span></button></a>
  <div style="margin-top: 10px;" class="lockscreen-footer text-center">
    Cerdas Tangguh dan Berkarakter
  </div>
  <div class="lockscreen-footer text-center">
  	<div class="footer">
  	<div class="suport">Suported by :</div>
    <img src="<?php echo base_url('assets/images/FOOTER_JABAR.png') ?>" style="width: 4%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_SMANJA.png') ?>" style="width: 3.8%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_KWARDA.png') ?>" style="width: 3.3%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_KIBAS.png') ?>" style="width: 4.4%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_NYIMAS.png') ?>" style="width: 4.2%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_FADA.png') ?>" style="width: 4%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_FRUITEA.png') ?>" style="width: 4%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_KOMPASAYU.png') ?>" style="width: 5.5%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_KODAM.png') ?>" style="width: 3.5%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_POLDA.png') ?>" style="width: 3.2%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_PDAM.png') ?>" style="width: 3.9%; height: auto;"/>
    <img src="<?php echo base_url('assets/images/FOOTER_BJB.png') ?>" style="width: 5.7%; height: auto;"/>
    </div>
    <br/>Copyright &copy; 2019 <b><a href="/" class="text-black">JC2020</a></b><br>
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
