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
    }
  /*Button Login Admin*/
  .button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin-right: 30px;
  float: right;
  }

  .button a{
    color: white;
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
  .image img{
    width: 290px;
  }
  /*accordion*/
  .accordion {
  background-color: orange;
  color: #000;
  cursor: pointer;
  padding: 12px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 20px;
  transition: 0.4s;
  margin-top: 20px;
  }

  .active, .accordion:hover {
    background-color: #FFBB43; 
  }

  .panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    overflow: hidden;
  }
  </style>
</head>
<body class="hold-transition lockscreen">
<hr style="border: 8px solid orange; margin-top: 0px;">

<center>
  <div class="image">
    <img src="<?php echo base_url('assets/images/JC2020.png') ?>">
    <h2>Pertanyaan Seputar Jalakmas Championship 2020</h2>
  </div>
</center>
<!--FAQ-->
  <button class="accordion">Jalakmas Championship 2020</button>
  <div class="panel">
    Q : Apa itu Jalakmas Championship 2020?<br>
    A : Kegiatan lomba yang diselenggarakan oleh Gerakan Pramuka Gugusdepan Indramayu 24.129 - 24.130 Ambalan Ki Bagus Rangin - Nyimas Gandasari SMA Negeri 1 Anjatan
  </div>
  <button class="accordion">Pelaksanaan</button>
  <div class="panel">
    Q : Apa itu Jalakmas Championship 2020?<br>
    A : Kegiatan lomba yang diselenggarakan oleh Gerakan Pramuka Gugusdepan Indramayu 24.129 - 24.130 Ambalan Ki Bagus Rangin - Nyimas Gandasari SMA Negeri 1 Anjatan
  </div>
  <button class="accordion">Mata Lomba</button>
  <div class="panel">
    Q : Apa itu Jalakmas Championship 2020?<br>
    A : Kegiatan lomba yang diselenggarakan oleh Gerakan Pramuka Gugusdepan Indramayu 24.129 - 24.130 Ambalan Ki Bagus Rangin - Nyimas Gandasari SMA Negeri 1 Anjatan
  </div>
  <button class="accordion">Kejuaraan</button>
  <div class="panel">
    Q : Apa itu Jalakmas Championship 2020?<br>
    A : Kegiatan lomba yang diselenggarakan oleh Gerakan Pramuka Gugusdepan Indramayu 24.129 - 24.130 Ambalan Ki Bagus Rangin - Nyimas Gandasari SMA Negeri 1 Anjatan
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2019 <b><a href="https://jalakmaschampionship2020.com" class="text-black">JC2020</a></b><br>
    <!-- All rights reserved -->
  </div>
<!--Home-->
<a href="<?php echo base_url()?>homepage/"><button class="button"><span>Home </span></button></a>
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
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
</html>