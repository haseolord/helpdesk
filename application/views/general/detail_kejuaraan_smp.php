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
      background-color: #F9E79F;
      /*background-repeat: no-repeat;*/
      background-size: 100% 100%;
    }
  </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<head>
  <title> Detail Hasil Kejuaraan Penggalang SD/MI </title>
  <link rel="icon" href="<?php echo  base_url('assets/images/logo.png')  ?>" type="image/png" sizes="16x16">
  <style type="text/css">
    .boxes {
      margin: 10% auto;
      height: auto;
      border: 2px solid white;
      padding: 20px;
      color:white ;
      text-align: center;
      width: 400px;
    }
    .lomba{
      margin : 20px 20px;
    }
    #wrapper{
      padding: 20px;
    }
    .header-mata-lomba {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
      margin-top: 0px;
    }
    .footer-mata-lomba {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
      margin-top: 0px;
    }
    .footer {
      bottom: 0px;
    }

    .descript h3 {
      font-size: 15px;
      font-weight: bold;
      text-align: justify;
      color: #fff;
      padding: 10px;
      background-color: #3c8dbc;
      border-right: 80px solid red;
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
    /* Content Mata Lomba */
    /* Left column */
    .leftcolumn {   
      float: left;
      width: 49.5%;
      padding: 0px 0px 0px 37px;
    }

    /* Right column */
    .rightcolumn {
      float: right;
      width: 49.5%;
      padding: 0px 37px 0px 0px;
    }

    /* Add a card effect for articles */
    .card {
       background-color: white;
       padding: 20px;
       border-radius: 10px;
       border: 2px solid #367fa9;
       margin: 15px 30px 15px 30px;
    }

    .card:hover {
      box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.6);
      cursor: pointer;
    }

    .fakeimg img {
      max-width: 100%;
      width: 100%;
      padding: 5px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 800px) {
      .leftcolumn, .rightcolumn {   
        width: 100%;
        padding: 0;
      }
    }
    .note {
      border: 1px solid #3c8dbc;
      border-radius: 5px;
      background-color: #eee;
      margin-top: 3px;
      padding: 5px 5px 5px 5px;
    }
    .kejuaraan1 {
      color: white;
      border: 1px solid #310000;
      border-radius: 5px;
      background-color: #B80101;
      margin-top: 23px;
      padding: 15px 0px 15px 20px;
    }
    .kejuaraan2 {
      color: white;
      border: 1px solid #310000;
      border-radius: 5px;
      background-color: #FF4D4D;
      margin-top: 23px;
      padding: 15px 0px 15px 20px;
    }
    .kejuaraan1:hover {
      box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.6);
      cursor: pointer;
    }
    .kejuaraan2:hover {
      box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.6);
      cursor: pointer;
    }

    /* Back to Top */
    #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: #f4511e;
      color: white;
      cursor: pointer;
      padding: 10px;
      border-radius: 4px;
    }

    #myBtn:hover {
      background-color: #555;
    }
    .table tr td{
        padding: 3px !important;
    }
  </style>
</head>

<body>
  <button onclick="topFunction()" id="myBtn" title="Kembali ke atas">
    <i class="glyphicon glyphicon-arrow-up"></i>
  </button>
  <div class="row" id="wrapper">
    <div class="col-md-12" >
      <div class="header-mata-lomba">
        <h2><b>Kejuaraan Penggalang SMP/MTS<div>Jalakmas Championship 2020</div></b></h2>
        <!--  <a href="<?php echo base_url() ?>pendaftaran/penggalang" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-share-alt"></i> Daftar Sekarang </a> -->
      </div>
    </div>
    <!-- Content Mata Lomba -->
    <!-- ROW 1 -->
    
    <?php foreach ($kegiatan as $key => $value): ?>
      <?php if($key == 0 || ($key > 1 &&  $key%2==0)): ?>
        <div class="row">
      <?php endif ?>
      <!-- SEMAPHORE -->
      <div class="col-md-6">
        <div class="card">
          <div class="fakeimg"><img src="<?php echo base_url($value->banner) ?>"/></div>
          <div class="descript">
            <!-- KETENTUAN -->
            <h3>Juara Putra</h3>
            <table class="table table-sm">
              <tr>
                <th width="10%">Peringkat</th>
                <th>Nama Sekolah</th>
                <th>Medali</th>
              </tr>
              <?php if($value->juara_putra): ?>
                <?php foreach ($value->juara_putra as $ke2y => $value2):?>
                  <?php $warna ='#fff'; if($this->bm->select_where('ms_juara', 'id', $value2->juara)->row()->warna) {
                    $warna = '#'. $this->bm->select_where('ms_juara', 'id', $value2->juara)->row()->warna;
                  }
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $value2->juara ?></td>
                      <td><?php echo $this->bm->select_where('ms_sekolah', 'id', $value2->id_sekolah)->row()->nmsekolah ?>
                        <?php $peserta = $this->bm->select_where('tr_peserta', 'id_pendaftaran', $value2->id_pendaftaran)->result();
                              $name = array();
                              $i = 0; 
                              if($peserta){
                                foreach ($peserta as $key3 => $value3) {
                                  $name[$i] = $value3->nmpeserta;
                                  $i++;
                                }
                              }
                          ?>
                          <?php if($name){ echo ' <b>( '.implode(', ', $name).')</b>';} ?>
                      </td>
                      <td style="background: <?php echo $warna ?>"><?php echo $this->bm->select_where('ms_juara', 'id', $value2->juara)->row()->medali ?></td>
                    </tr>
                  <?php  endforeach?>
              <?php else : ?>
                <tr>
                  <td colspan="3" class="text-center">Data belum tersedia</td>
                </tr>
              <?php endif ?>
            </table>
              
            </ol>
            <!-- TEKNIS -->
            <h3>Juara Putri</h3>
            <table class="table table-sm">
              <tr>
                <th width="10%">Peringkat</th>
                <th>Nama Sekolah</th>
                <th>Medali</th>
              </tr>
              <?php if($value->juara_putri): ?>
                <?php foreach ($value->juara_putri as $ke2y => $value2):?>
                  <?php $warna ='#fff'; if($this->bm->select_where('ms_juara', 'id', $value2->juara)->row()->warna) {
                    $warna = '#'. $this->bm->select_where('ms_juara', 'id', $value2->juara)->row()->warna;
                  }
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $value2->juara ?></td>
                      <td><?php echo $this->bm->select_where('ms_sekolah', 'id', $value2->id_sekolah)->row()->nmsekolah ?>
                        <?php $peserta = $this->bm->select_where('tr_peserta', 'id_pendaftaran', $value2->id_pendaftaran)->result();
                              $name = array();
                              $i = 0; 
                              if($peserta){
                                foreach ($peserta as $key3 => $value3) {
                                  $name[$i] = $value3->nmpeserta;
                                  $i++;
                                }
                              }
                          ?>
                          <?php if($name){ echo ' <b>( '.implode(', ', $name).')</b>';} ?>
                      </td>
                      <td style="background: <?php echo $warna ?>"><?php echo $this->bm->select_where('ms_juara', 'id', $value2->juara)->row()->medali ?></td>
                    </tr>
                  <?php  endforeach?>
              <?php else : ?>
                <tr>
                  <td colspan="3" class="text-center">Data belum tersedia</td>
                </tr>
              <?php endif ?>
            </table>
          </div>
        </div>
      </div>
      <?php if($key == 1 || ($key > 0 && $key%2==1) || $key == 8): ?>
        </div>
      <?php endif ?>
    <?php endforeach?>
    

  <center><a href="<?php echo base_url() ?>hasil_kejuaraan/smp" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali </a></center>
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
</body>
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

<?php if(isset($javascript)){echo '<script src="'.base_url().'assets/js/function/'.$javascript.'"></script>';}?>
<script type="text/javascript">
$('#my-box').boxWidget({
  animationSpeed: 500,
  collapseTrigger: '#my-collapse-button-trigger',
  removeTrigger: '#my-remove-button-trigger',
  collapseIcon: 'fa-minus',
  expandIcon: 'fa-plus',
  removeIcon: 'fa-times'
})
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146784115-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146784115-1');
</script>

<!-- Back to Top -->
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</html>
