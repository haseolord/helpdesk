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
  <title> Mata Lomba Penggalang SMP/MTs. </title>
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
      border-right: 5px solid red;
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
  </style>
</head>

<body>
  <button onclick="topFunction()" id="myBtn" title="Kembali ke atas">
    <i class="glyphicon glyphicon-arrow-up"></i>
  </button>
  <div class="row" id="wrapper">
    <div class="col-md-12" >
      <div class="header-mata-lomba">
        <h2>Mata Lomba Penggalang SMP/MTs.<div>Jalakmas Championship 2020</div></h2>
         <a href="<?php echo base_url() ?>pendaftaran/penggalang/smp" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-share-alt"></i> Daftar Sekarang </a>
      </div>
    </div>
    
    <!-- Content Mata Lomba -->
    <!-- ROW 1 -->
    <div class="row">
      <!-- SEMAPHORE -->
      <div class="leftcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_Semaphore.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Semaphore adalah sebuah cara mengirimkan berita dengan cara menggerakan benda apa saja dengan gerakan-gerakan tertentu. Pada lomba kali ini penyampaiannya melalui gerakan bendera, bendera yang digunakan adalah bendera Semaphore adapun ketentuan lainnya sebagai berikut:
          <ol>
          <li>Peserta berjumlah 2 (dua) orang</li>
          <li>Media lomba terdiri dari 2 (dua) set bendera semaphore, masker/kain penutup mulut, papan lapangan dan alat tulis (disiapkan oleh peserta)</li>
          <li>Lembar jawaban disiapkan panitia</li>
          </ol>
          <!-- TEKNIS -->
          <h3>TEKNIS</h3>
          Mata lomba Semaphore dilaksanakan dengan sistem gugur dan dibagi menjadi 3 babak, dengan rincian sebagai berikut :
          <ol>
          <li>Babak kesatu : Dilaksanakan serentak, Semaphore diperagakan oleh panitia</li>
          <li>Babak kedua : Peserta akan saling mengirimkan berita dalam waktu 10 menit sebanyak 10 kalimat.</li>
          <li>Babak ketiga : Peserta akan saling mengirimkan berita (berupa pertanyaan) dalam waktu 10 menit sebanyak 4 pertanyaan.</li>
          </ol>
        </div>
        </div>
      </div>
      <!-- MORSE -->
      <div class="rightcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_Morse.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Morse adalah sebuah kode yang terdiri dari dua unsur yaitu titik ( . ) dan strip ( _ ). Pada lomba kali ini penyampaiannya melalui gerakan tongkat dengan ketentuan yaitu untuk titik ( . ) tongkat digerakan 90 derajat arah jarum jam, sedangkang untuk strip ( _ ) tongkat digerakan 180 derajat arah jarum jam. Adapun ketentuan lainnya sebagai berikut:
          <ol>
          <li>Peserta berjumlah 2 (dua) orang</li>
          <li>Media lomba terdiri dari 2 (dua) buah tongkat dengan ukuran menyesuaikan postur tubuh, masker/kain penutup mulut, papan lapangan dan alat tulis (disiapkan oleh peserta)</li>
          <li>Lembar jawaban disiapkan panitia</li>
          </ol>
          <!-- TEKNIS -->
          <h3>TEKNIS</h3>
          Mata lomba Morse dilaksanakan dengan sistem gugur dan dibagi menjadi 3 babak, dengan rincian sebagai berikut :
          <ol>
          <li>Babak kesatu : Dilaksanakan serentak, kode Morse diperagakan oleh panitia</li>
          <li>Babak kedua : Peserta akan saling mengirimkan berita dalam waktu 10 menit sebanyak 10 kalimat</li>
          <li>Babak ketiga : Peserta akan saling mengirimkan berita (berupa pertanyaan) dalam waktu 10 menit sebanyak 4 pertanyaan</li>
          </ol>
        </div>
        </div>
      </div>
    </div>

    <!-- ROW 2 -->
    <div class="row">
      <!-- RAGAM SANDI -->
      <div class="leftcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_RagamSandi.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Sandi atau disebut juga kode adalah sebuah kata rahasia yang hanya orang-orang tertentu saja yang bisa menterjemahkan. Pada lomba kali ini sandi yang digunakan meliputi: sandi rumput, sandi kimia, sandi kotak 2 dan 3, sandi koordinat, sandi angka, sandi geser, sandi AND, sandi AZ, sandi napoleon dan sandi nomor. Adapun ketentuan lainnya sebagai berikut:
          <ol>
          <li>Peserta berjumlah 1 (satu) orang</li>
          <li>Media lomba terdiri dari, papan lapangan dan alat tulis (disiapkan oleh peserta)</li>
          <li>Lembar jawaban disiapkan panitia</li>
          </ol>
          <!-- TEKNIS -->
          <h3>TEKNIS</h3>
          Mata lomba Ragam Sandi dilaksanakan dengan sistem gugur dan dibagi menjadi 3 babak, dengan ketentuan sebagai berikut :
          <ol>
          <li>Babak kesatu : Dilaksanakan serentak, peserta akan menterjemahkan soal yang diberikan panita.</li>
          <li>Babak kedua : Peserta akan melewati 3 (tiga) halang-rintang dalam waktu 5 menit dan disetiap halang-rintang peserta akan menterjemahkan sebuah sandi</li>
          <li>Babak ketiga : Peserta akan menjawab soal yang dibagi dalam 2 sesi<br/>
            o Sesi 1 : peserta akan menerjemahkan soal dan jawaban ditulis di papan tulis yang sudah disediakan panitia,<br/>
            o Sesi 2 : peserta akan menjawab soal secara lisan atau tertulis yang diberikan panitia dengan cara rebutan.</li>
          </ol>
        </div>
        </div>
      </div>
    
      <!-- PENGETAHUAN PRAMUKA -->
      <div class="rightcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_PengetahuanPramuka.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Pengetahuan Kepramukaan meliputi Sejarah Pramuka Dunia dan Sejarah Pramuka Indonesia serta beberapa istilah yang sering digunakan dalam pendidikan kepramukaan. Adapun ketentuan lainnya sebagai berikut :
          <ol>
          <li>Peserta berjumlah 2 (dua) orang</li>
          <li>Media lomba terdiri dari, papan lapangan dan alat tulis (disiapkan oleh peserta)</li>
          <li>Lembar jawaban disiapkan panitia</li>
          </ol>
          <!-- TEKNIS -->
          <h3>TEKNIS</h3>
          Mata lomba Pengetahuan Pramuka dilaksanakan dengan sistem gugur dan dibagi menjadi 3 babak, dengan ketentuan sebagai berikut :
          <ol>
          <li>Babak kesatu : Peserta akan menjawab soal di komputer sebanyak 30 soal dalam waktu 20 menit</li>
          <li>Babak kedua : Peserta akan menjawab soal di komputer sebanyak 40 soal dalam waktu 20 menit</li>
          <li>Babak ketiga : Peserta akan menjawab soal yang dibagi 2 sesi</li>
            o sesi 1 : Peserta akan menjawab pertanyaan dan menjawab secara lisan,<br/>
            o sesi 2 : Peserta akan menjawab pertanyaan dan menjawab secara lisan dengan sistem rebutan,
          </ol>
        </div>
        </div>
      </div>
    </div>

    <!-- ROW 3 -->
    <div class="row">  
      <!-- WAWASAN NUSANTARA -->
      <div class="leftcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_WawasanNusantara.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Wawasan Nusantara adalah wawasan tentang kearifan lokal daerah-dareah yang ada di Indonesia meliputi: letak geografi, kebudayaan, adat istiadat, bahasa, dan kuliner. Adapun ketentuan lainnya sebagai berikut:
          <ol>
          <li>Peserta berjumlah 1 (satu) orang</li>
          <li>Media lomba terdiri dari, papan lapangan dan alat tulis (disiapkan oleh peserta)</li>
          <li>Lembar jawaban disiapkan panitia</li>
          </ol>
          <!-- TEKNIS -->
          <h3>TEKNIS</h3>
          Mata lomba Wawasan Nusantara dilaksanakan dengan sistem gugur dan dibagi menjadi 3 babak, dengan ketentuan sebagai berikut :
          <ol>
          <li>Babak kesatu : Peserta akan menjawab soal yang diberikan panitia (tes tulis)</li>
          <li>Babak kedua : Peserta akan menjawab soal yang diberikan panitia berupa slide</li>
          <li>Babak ketiga : Peserta akan menjawab soal yang dibagi dalam 2 sesi</li>
            o Sesi 1 : Peserta akan menjawab soal dan ditulis di papan tulis,<br/>
            o Sesi 2 : Soal rebutan jawab secara lisan.
          </ol>
        </div>
        </div>
      </div>

      <!-- TOGA -->
      <div class="rightcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_TOGA.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Tanaman Obat Keluarga atau disingkat TOGA adalah beberapa jenis tanaman yang bermanfaat sebagai obat untuk keluarga. Dalam lomba kali ini kami akan melalakukan ujian bagi para peserta untuk dapat menebak dan menjelaskan manfaat dari tanama obat tersebut. Adapun ketentuannya sebagai berikut:
          <ol>
          <li>Peserta berjumlah 1 (satu) orang</li>
          <li>Media lomba terdiri dari, papan lapangan dan alat tulis (disiapkan oleh peserta)</li>
          <li>Lembar jawaban disiapkan panitia</li>
          </ol>
          <!-- TEKNIS -->
          <h3>TEKNIS</h3>
          Mata lomba Toga dilaksanakan dengan sistem gugur dan dibagi menjadi 3 babak, dengan ketentuan sebagai berikut :
          <ol>
          <li>Babak pertama : Peserta akan menjawab soal yang diberikan panitia (tes tulis)</li>
          <li>Babak kedua : Peserta akan menebak nama tanaman dan manfaatnya</li>
          <li>Babak ketiga : Peserta akan membuat sebuah presentasi dari tanaman yang mereka pilih dari panitia.</li>
          </ol>
        </div>
        </div>
      </div>
    </div>

    <!-- ROW 4 -->
    <div class="row">
      <!-- ILMU TAJWID -->
      <div class="leftcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_Tajwid.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Tajwid adalah pengetahuan tentang kaidah serta cara-cara membaca Al-Quran dengan mengeluarkan huruf dari makhrojnya serta memberi hak dan mustahaknya. Pada lomba kali ini kami akan membatasi hukum-hukum tajwidnya yaitu meliputi: hukum nun mati dan hukum maad, adapun ketentuan lainnya sebagai berikut:
          <ol>
          <li>Peserta berjumlah 1 (satu) orang</li>
          <li>Media lomba terdiri dari, papan lapangan dan alat tulis (disiapkan oleh peserta)</li>
          <li>Lembar jawaban disiapkan panitia</li>
          </ol>
          <!-- TEKNIS -->
          <h3>TEKNIS</h3>
          Mata lomba Tajwid dilaksanakan dengan sistem gugur dan dibagi menjadi 3 babak, dengan ketentuan sebagai berikut :
          <ol>
          <li>Babak kesatu : Peserta akan menjawab soal yang diberikan panitia (tes tulis)</li>
          <li>Babak kedua : Peserta akan menjawab soal yang diberikan panitia berupa slide</li>
          <li>Babak ketiga : Peserta akan menjawab soal yang dibagi dalam 2 sesi</li>
            o Sesi 1 : Peserta akan menjawab soal dan ditulis di papan tulis,<br/>
            o Sesi 2 : Soal rebutan jawab secara lisan.
          </ol>
        </div>
        </div>
      </div>

      <!-- KIM -->
      <div class="rightcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_KIM.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          KIM merupakan keterampilan atau sensitifitas seorang anggota pramuka dalam menggunakan panca inderanya, KIM sering diterapkan oleh pembina pramuka untuk menguji anggota pramuka dalam pencapaian kecakapan tertentu, KIM meliputi Mata (Indera Penglihatan), Lidah (Indera Pengecap Rasa), Telinga (Indera Pendengaran), Kulit (Indera Peraba) dan Hidung (Indera Penciuman). Adapun ketentuan lainnya sebagai berikut:
          <ol>
          <li>Peserta berjumlah 1 (satu) orang</li>
          <li>Media lomba terdiri dari, papan lapangan dan alat tulis (disiapkan oleh peserta)</li>
          <li>Lembar jawaban disiapkan panitia</li>
          </ol>
          <!-- TEKNIS -->
          <h3>TEKNIS</h3>
           Mata lomba KIM dilaksanakan dengan sistem gugur dan dibagi menjadi 3 babak, dengan ketentuan sebagai berikut :
          <ol>
          <li>Babak pertama : KIM lihat dan KIM cium</li>
          <li>Babak kedua : KIM dengar dan KIM mengecap</li>
          <li>Babak ketiga : KIM lihat, KIM cium, KIM dengar, KIM mengecap</li>
          </ol>
        </div>
        </div>
      </div>
    </div>

    <!-- ROW 5 -->
    <div class="row">
      <!-- DOLANAN -->
      <div class="leftcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_Dolanan.png') ?>"/></div>
        <div class="descript">
          <!-- KETENTUAN -->
          <h3>KETENTUAN</h3>
          Dolanan atau dalam bahasa Indonesia disebut permainan, merupakan salah satu ciri khas daerah tertentu khususnya di Indramayu yang dijadikan sebagai media anak-anak untuk bermain meliputi : Bon-bonan, Boi-boian dan Glatikan. Adapun ketentuan lainnya sebagai berikut:
          <ol>
          <li>Peserta berjumlah 2 (dua) orang</li>
          <li>Pakaian kaos lapangan/olahraga</li>
          </ol>
          <!-- TEKNIS -->
          <h3>TEKNIS</h3>
          Mata lomba Dolanan dilaksanakan dengan sistem gugur dan dibagi menjadi 3 babak, dengan ketentuan sebagai berikut :
          <ol>
          <li>Babak kesatu : Peserta akan melakukan permainan Bon-bonan dan akan dibagi kedalam beberapa regu, regu yang kalah akan gugur</li>
          <li>Babak kedua : Peserta akan melakukan permainan boi-boian dan permaian dilakukan dengan duel antar tim</li>
          <li>Peserta akan bermain Glatikan dan permaiann dilakukan dengan duel antar tim</li>
          </ol>
          <div class="note">
          Catatan : Ketentuan teknis dan skor permainan akan dijelaskan pada saat temu teknik
          </div>
        </div>
        </div>
      </div>

      <!-- KEJUARAAN -->
      <div class="rightcolumn">
        <div class="card">
        <div class="fakeimg"><img src="<?php echo base_url('assets/images/HM_Kejuaraan_G.png') ?>"/></div>
        <div class="descript">
          <!-- KEJUARAAN -->
          <ol>
          <div class="kejuaraan2">
            <li>Masing-masing mata lomba Juara Utama 1, 2 dan 3 putra dan putri</li>
          </div>
          <div class="kejuaraan1">
            <li>Masing-masing mata lomba Juara Harapan 1, 2 dan 3 putra dan putri</li>
          </div>
          <div class="kejuaraan2">
            <li>Juara Umum Utama 1, 2 dan 3 Putra dan Putri + Uang Pembinaan</li>
          </div>
          <div class="kejuaraan1">
            <li>Juara Umum Harapan 1, 2 dan 3 Putra dan Putri + Uang Pembinaan</li>
          </div>
          <div class="kejuaraan2">
            <li>Juara Umum Madya 1, 2 dan 3 Putra dan Putri</li>
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
