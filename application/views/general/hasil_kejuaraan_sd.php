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
    .table{
      background: #fff;
    }
    .table th{
      text-align: center;
    }
  </style>
</head>
<body class="hold-transition">
<!-- Automatic element centering -->
<div style="margin-top: 40px;">
  <!-- User name -->
  <div class="row " style="margin: 20px auto;">
    <div class="col-md-12">
      <table align="center">
        <tr>
          <td width="100px">
            <img src="<?php echo base_url('assets/images/logo.png') ?>" width="90px">
          </td>
          <td><span class="title" style="font-size: 20pt">Hasil Kejuaraan Penggalang SD<b><div>Jalakmas Championship 2020</div></b></span></td>
        </tr>
      </table>
    </div>   
  </div>
    <br/>
  <!--<div style="margin-top:20px "> <a href="<?php echo base_url()?>homepage/mata_lomba" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-right"></i> Lihat Mata Lomba</div></a>-->
  <!-- /.lockscreen-item -->
  <div class="row">
    <div class="col-md-6" style="padding-right: 20px;padding-left: 20px;">
       <table width="100%" class="table table-bordered table-sm">
          <tr>
            <th colspan="4" class="text-center">Hasil Kejuaraan Putra</th>
          </tr>
          <tr>
            <th rowspan="2" style="text-align: left;">Nama Sekolah</th>
          </tr>
          <tr>
            <th style="background: #FFD700">Emas</th>
            <th style="background: #c0c0c0">Perak</th>
            <th style="background: #c99a83">Perunggu</th>
          </tr>
          <?php if($juara_putra): ?>
            <?php $jml = 0; ?>
            <?php foreach ($juara_putra as $key => $value):?>
                <tr>
                  <td><?php echo $value->nmsekolah ?></td>
                  <td class="text-center"><?php echo $value->emas ?></td>
                  <td class="text-center"><?php echo $value->perak ?></td>
                  <td class="text-center"><?php echo $value->perunggu ?></td>
                </tr>
                <?php $jml++; ?>
            <?php  endforeach ?>
            <?php $jml = 6 - $jml; ?>
            <?php for ((6-$jml) ; $jml>0 ; $jml--) : ?>
              <tr>
                <td colspan="4">-</td>
              </tr>
            <?php endfor?>
          <?php else : ?>
            <tr>
              <td colspan="4">Data belum tersedia</td>
            </tr>
          <?php endif ?>
        </table>
    </div>
     <div class="col-md-6" style="padding-right: 20px;padding-left: 20px;">
       <table width="100%" class="table table-bordered table-sm">
          <tr>
            <th colspan="4" class="text-center">Hasil Kejuaraan Putri</th>
          </tr>
          <tr>
            <th rowspan="2" style="text-align: left;">Nama Sekolah</th>
          </tr>
          <tr>
            <th style="background: #FFD700">Emas</th>
            <th style="background: #c0c0c0">Perak</th>
            <th style="background: #c99a83">Perunggu</th>
          </tr>
          <?php if($juara_putri): ?>
            <?php $jml = 0; ?>
            <?php foreach ($juara_putri as $key => $value):?>
                <tr>
                  <td><?php echo $value->nmsekolah ?></td>
                  <td class="text-center"><?php echo $value->emas ?></td>
                  <td class="text-center"><?php echo $value->perak ?></td>
                  <td class="text-center"><?php echo $value->perunggu ?></td>
                </tr>
                 <?php $jml++; ?>
            <?php endforeach ?>
            <?php $jml = 6 - $jml; ?>
            <?php for (($jml) ; $jml>0 ; $jml--) : ?>
              <tr>
                <td colspan="4">-</td>
              </tr>
            <?php endfor?>
          <?php else : ?>
            <tr>
              <td colspan="4">Data belum tersedia</td>
            </tr>
          <?php endif ?>
        </table>
    </div>
    <div class="col-md-12 text-center">
      <a href="<?php echo base_url()?>hasil_kejuaraan/detail_sd" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span> Lihat Detail</a>
    </div>
  </div>
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
