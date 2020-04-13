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
  <title> Mata Lomba Penegak/Pandega </title>
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
      border-right: 80px solid #ffbf00;
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
    .note1 {
      border: 1px solid #8D8A16;
      border-radius: 5px;
      background-color: #7B7800;
      margin-top: 3px;
      padding: 2px 0px 2px 10px;
      font-size: 16px;
      font-weight: bold;
      color: white;
    }
    .kejuaraan1 {
      color: black;
      border: 1px solid #734B00;
      border-radius: 5px;
      background-color: #FFFA3B;
      margin: 2px 0px 2px -25px;
      padding: 0px 0px 0px 20px;
    }
    .kejuaraan2 {
      color: black;
      border: 1px solid #734B00;
      border-radius: 5px;
      background-color: #E1DC00;
      margin: 2px 0px 2px -25px;
      padding: 0px 0px 0px 20px;
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
  </style>
</head>
<body>
  <button onclick="topFunction()" id="myBtn" title="Kembali ke atas">
    <i class="glyphicon glyphicon-arrow-up"></i>
  </button>
  <div class="row" id="wrapper">
    <div class="col-md-12" >
      <div class="header-mata-lomba">
        <h2>Mata Lomba Penegak/Pandega<div>Jalakmas Championship 2020</div></h2>
         <a href="<?php echo base_url() ?>pendaftaran/penegak" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-share-alt"></i> Daftar Sekarang </a>
      </div>
    </div>
    <!-- ROW 1 -->
    <div class="row">
      <!-- 3R -->
      <div class="leftcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_3R.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Rover Ranger Race (3R) adalah perjalanan (hyking) untuk penegak/pandega yang didalamnya terdapat rintangan yang harus dilewati, setiap rintangan yang berhasil diselesaikan akan memperoleh bukti penyelesaian berupa bendera. Rintangan yang harus diselesaikan meliputi <b>Merayap, Arung Jeram, Kapal Selam, Rope Climb, Bamboo Bridge dan Danger Alarm</b>. Adapun ketentuan lainnya sebagai berikut:
          <ol>
          <li>Peserta terdiri dari 3 orang dengan satuan terpisah</li>
          <li>Peserta ditugaskan untuk menyelesaikan rintangan</li>
          <li>Peserta disarankan memakai kaos lapangan/olahraga</li>
          </ol>
          <!-- PENYELESAIAN RINTANGAN -->
          <h3>PENYELESAIAN RINTANGAN</h3>
          <ol>
          <b><li>Merayap</li></b>
          Peserta melewati rintangan merayap pada jalur yang telah ditentukan oleh panitia dengan panjang lintasan ± 10 m dan peserta akan mendapat bendera jika selesai melewati rintangan.
          <b><li>Arung Jeram</li></b>
          Peserta melewati rintangan sungai yaitu menyeberang dengan rakit yang disediakan panitia dan peserta akan mendapat bendera jika selesai melewati rintangan.
          <b><li>Kapal Selam</li></b>
          Peserta melewati rintangan berenang di sungai kecil sambil melakukan gerakan timbul tenggelam seperti “kapal selam” dan peserta akan mendapat bendera jika selesai melewati rintangan.
          <b><li>Rope Climb</li></b>
          Peserta melewati rintangan memanjat tali (vertikal) setinggi ± 7 m dan mengambil bendera saat berada diatas lalu turun lagi ke bawah.
          <b><li>Bamboo Bridge</li></b>
          Peserta melewati rintangan jembatan bambu tunggal sepanjang ± 7 m tanpa pegangan dan peserta akan mendapat bendera jika selesai melewati rintangan.
          <b><li>Danger Alarm</li></b>
          Peserta melewati rintangan sambil membawa beban berupa ember berisi air dan melintasi rintangan yang dibuat panitia sepanjang ± 15 m dan dan peserta akan  mendapat bendera jika selesai melewati rintangan
          </ol>
          <div class="note">
          Catatan :<br/>
          - Semua rintangan harus diikuti oleh semua peserta<br/>
          - Ada perhitungan waktu untuk tiap-tiap rintangan
          </div>
        </div>
        </div>
      </div>

      <!-- LKBBT -->
      <div class="rightcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_LKBBT.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Lomba Keterampilan Baris-Berbaris Tongkat (LKBBT) ini adalah parade baris-berbaris dengan memegang tongkat. Dengan ketentuan sebagai berikut:
          <ol>
          <li>Sangga terdiri dari 12 orang ditambah 1 orang sebagai pinsa</li>
          <li>Pasukan bisa heterogen/campuran putra dan putri</li>
          <li>Waktu dimulai ketika pinsa memasuki kotak pinsa</li>
          <li>Waktu pelaksanaan 9 menit</li>
          <li>Lapangan lomba 18 x 8 meter</li>
          <li>Bentuk pasukan 3 bershaf 4 banjar</li>
          <li>Jumlah peserta dibatasi hanya 35 sangga</li>
          </ol>
          <!-- MATERI LOMBA -->
          <h3>MATERI LOMBA</h3>
          <table style="width: 100%">
            <tbody>
              <tr style="font-size: 14px; vertical-align: top;">
                <td style="width: 40%;">
                  <b>a. Gerakan di tempat</b><br/>
                    1) Istirahat di tempat<br/>
                    2) Sikap sempurna<br/>
                    3) Hormat<br/>
                    4) Periksa kerapihan<br/>
                    5) Setengah lengan lencang kanan<br/>
                    6) Lencang kanan<br/>
                    7) Hadap kanan<br/>
                    8) Lencang depan<br/>
                    9) Hadap kiri<br/>
                    10) Hadap Serong kanan<br/>
                    11) Hadap Serong kiri<br/>
                    12) Balik kanan<br/>
                    13) Jalan di tempat<br/>
                  <b>b. Gerakan berpindah tempat</b><br/>
                    1) 4 langkah ke kiri<br/>
                    2) 4 langkah ke kanan<br/>
                    3) 4 langkah ke depan<br/>
                    4) 4 langkah ke belakang<br/>
                  <b>c. Gerakan diam keberjalan</b><br/>
                    1) Langkah tegap<br/>
                    2) Langkah biasa
                </td>
                <td style="width: 60%;">
                  <b>d. Gerakan berjalan keberjalan</b><br/>
                    1) Langkah biasa ke langkah tegap<br/>
                    2) Langkah tegap ke langkah biasa<br/>
                    3) Buka & tutup barisan<br/>
                    4) Tiap – tiap banjar 2x belok kanan<br/>
                    5) Haluan kanan<br/>
                    6) Melintang kanan<br/>
                    7) Balik kanan maju<br/>
                  <b>e. Gerakan bubar dan berkumpul</b><br/>
                    1) Bubar jalan (menggunakan kode morse)<br/>
                    2) Berkumpul (menggunakan kode morse)<br/>
                      - Bentuk Bersaf<br/>
                      - Bentuk angkare<br/>
                      - Bentuk lingkaran besar<br/>
                      - Bentuk lingkaran kecil<br/>
                  <div class="note">Catatan : Kode morse akan disampaikan pada saat Temu Teknik</div><br/>
                  <b>f. Variasi/Yelling & Formasi</b><br/>
                  Pada saat variasi/yelling diwajibkan mengandung kata-kata sebagai berikut:<br/>
                  1) Cerdas, Tangguh dan Berkarakter (Tema JC 20)<br/>
                  2) Berani beda itu hebat (semboyan JC 20)<br/>
                  3) Jalakmas Championship 2020<br/>
                  4) Ambalan Kibasnyimas
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>

    <!-- ROW 2 -->
    <div class="row">
      <!-- PIONERING -->
      <div class="leftcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_Pionering.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Pionering adalah sebuah bangunan darurat yang dapat digunakan dalam kehidupan seharihari, bangunan tersebut bisa berupa menara, gapura, jembatan dan perlengkapan perkemahan lainnya. Kali ini kami menantang peserta untuk membuat gapura. Adapun ketentuanya sebagai berikut:
          <ol>
          <li>Peserta berjumlah 3 orang;</li>
          <li>Peserta ditugaskan membuat pionering berbentuk gapura dengan ukuran tidak lebih dari 2 m X 4 m;</li>
          <li>Media atau alat yang digunakan adalah bambu dengan panjang 120 cm tanpa dicat;</li>
          <li>Tongkat yang digunakan harus berjumlah 35 buah;</li>
          <li>Disarankan memakai tali kering Pramuka warna putih;</li>
          <li>Waktu pengerjaan selama 180 menit atau 3 jam;</li>
          </ol>
          <!-- ASPEK PENILAIAN -->
          <h3>ASPEK PENILAIAN</h3>
          <ol>
          <li>Ketepatan simpul</li>
          <li>Kekuatan simul dan ikatan</li>
          <li>Kreatifitas bentuk pionering</li>
          <li>Hiasan/Aksesoris</li>
          </ol>
        <div class="note">
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        </div>
        </div>
        </div>
      </div>

      <!-- KEJUARAAN -->
      <div class="rightcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_Kejuaraan_TD.png') ?>"/></div>
        <div class="descript">
          <!-- KEJUARAAN -->
          <!-- 3R -->
          <div class="note1">
            ROVER RANGER RACE (3R)
          </div>
          <ol>
          <div class="kejuaraan2">
          <li>Juara Utama 1, 2 dan 3 sangga terbaik putra dan putri + Uang Pembinaan</li>
          </div>
          <div class="kejuaraan1">
          <li>Juara Harapan 1, 2 dan 3 sangga terbaik putra dan putri</li>
          </div>
          <div class="kejuaraan2">
          <li>Juara Madya 1, 2 dan 3 sangga terbaik putra dan putri</li>
          </div>
          <div class="kejuaraan1">
          <li>Juara Bina 1, 2 dan 3 sangga terbaik putra dan putri</li>
          </div>
          <div class="kejuaraan2">
          <li>Juara 1, 2 dan 3 kategori bendera terbanyak putra dan putri</li>
          </div>
          <div class="kejuaraan1">
          <li>Juara 1,2 dan 3 masing-masing rintangan putra dan putri</li>
          </div>
          </ol>

          <!-- LKBBT -->
          <div class="note1">
            L K B B T
          </div>
          <ol>
          <div class="kejuaraan2">
          <li>Juara Utama 1, 2 dan 3 + Uang Pembinaan</li>
          </div>
          <div class="kejuaraan1">
          <li>Juara Harapan 1, 2 dan 3 + Uang Pembinaan</li>
          </div>
          <div class="kejuaraan2">
          <li>Juara Madya 1, 2 dan 3</li>
          </div>
          <div class="kejuaraan1">
          <li>Juara Bina 1, 2 dan 3</li>
          </div>
          <div class="kejuaraan2">
          <li>Juara Mula 1, 2 dan 3</li>
          </div>
          <div class="kejuaraan1">
          <li>Juara Purwa 1, 2 dan 3</li>
          </div>
          <div class="kejuaraan2">
          <li>Juara 1, 2 dan 3 PBB Dasar Terbaik</li>
          </div>
          <div class="kejuaraan1">
          <li>Juara 1, 2 dan 3 Variasi dan Formasi Terbaik</li>
          </div>
          <div class="kejuaraan2">
          <li>Juara 1, 2 dan 3 Pinsa Terbaik</li>
          </div>          
          </ol>
          
          <!-- PIONERING -->
          <div class="note1">
            PIONERING
          </div>
          <ol>
          <div class="kejuaraan2">
          <li>Juara Utama 1, 2 dan 3 Pionering Terbaik putra dan putri + Uang Pembinaan</li>
          </div>
          <div class="kejuaraan1">
          <li>Juara Harapan 1,2 dan 3 Pionering Terbaik putra dan putri</li>
          </div>
          <div class="kejuaraan2">
          <li>Juara Madya 1,2 dan 3 Pionering Terbaik putra dan putri</li>
          </div>
          <div class="kejuaraan1">
          <li>Juara Bina 1,2 dan 3 Pionering Terbaik putra dan putri</li>
          </div>
          <div class="kejuaraan2">
          <li>Juara 1, 2 dan 3 Simpul dan ikatan Pionering Terbaik</li>
          </div>
          <div class="kejuaraan1">
          <li>Juara 1, 2 dan 3 Kreatifitas bentuk Pionering Terbaik</li>
          </div>
          </ol>
        </div>
        </div>
      </div>
    </div>
  <center><a href="<?php echo base_url() ?>homepage" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"></i> Batal </a></center>
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
