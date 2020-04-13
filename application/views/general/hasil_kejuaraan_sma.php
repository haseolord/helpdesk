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
      padding: 5px;
      background-color: #3c8dbc;
      border-right: 10px solid #ffbf00;
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
       padding: 10px;
       border-radius: 10px;
       border: 2px solid #367fa9;
       margin: 10px 20px 10px 20px;
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
    .table-bordered{
      border: 2px solid grey;
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
        <h2>Hasil Kejuaraan Penegak/Pandega<div>Jalakmas Championship 2020</div></h2>
      </div>
    </div>
      <div class="row">
      <?php foreach ($kegiatan as $key => $value): ?>
      <!-- SEMAPHORE -->
        <?php if($key%2 == 1): ?>
          <div class="col-md-6">
             <div class="card">
                <div class="fakeimg"><img src="<?php echo base_url($value->banner) ?>"/></div>
                <div class="descript">
                  <!-- KETENTUAN -->
                  <?php if($value->kategori): ?>
                      <?php foreach ($value->kategori as $key2 => $value2):?>
                        <h3><?php echo $value2->nmkategori ?></h3>
                        <div class="row">
                          <?php if($value2->is_campuran): ?>
                              <div class="col-md-12">
                                  <table class="table table-sm table-bordered">
                                      <tr>
                                        <th colspan="2" style="background: #FFCC99">
                                          Putra/Putri
                                        </th>
                                      </tr>
                                      <tr>
                                        <th>Nama Sekolah</th>
                                        <th>Medali</th>
                                      </tr>
                                      <?php 
                                          $where = array(
                                              'id_kategori' => $value2->id_kategori,
                                              'jenis_regu' => 3,
                                              'status' => 1
                                          );
                                          $juara_campuran = $this->bm->select_where_array_order('tr_hasil_kejuaraan_sma', $where, 'juara asc')->result(); 
                                      ?>
                                      <?php if($juara_campuran): ?>
                                          <?php foreach ($juara_campuran as $key3 => $value3):?>
                                            <?php $warna ='#fff'; if($this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna) {
                                                $warna = '#'. $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna;
                                              }
                                              ?>
                                            <tr>
                                              <td>
                                                <?php echo $this->bm->select_where('ms_sekolah', 'id', $value3->id_sekolah)->row()->nmsekolah ?>
                                                <?php $peserta = $this->bm->select_where('tr_peserta','id_pendaftaran', $value3->id_pendaftaran)->result(); ?>
                                                <?php if(count($peserta) > 0 && count($peserta )< 10): ?>
                                                    <?php 
                                                      $name = array();
                                                      $i=0;
                                                      foreach ($peserta as $key4 => $value4) {
                                                        $name[$i] = $value4->nmpeserta;
                                                        $i++;
                                                      }
                                                      echo '<div><b> ('. implode(', ', $name).')</b></div>';
                                                    ?>
                                                <?php endif ?>
                                              </td>
                                              <td style="background: <?php echo $warna ?>"><?php echo $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->medali ?></td>
                                            </tr>
                                          <?php endforeach ?>
                                      <?php else: ?>
                                        <tr><td colspan="2">Data belum tersedia</td></tr>
                                      <?php endif ?>
                                  </table>
                              </div>
                          <?php else :?>
                              <div class="col-md-6">
                                <table class="table table-sm table-bordered">
                                  <tr>
                                    <th colspan="2" style="background:  #eed7a1">
                                      Putra
                                    </th>
                                  </tr>
                                  <tr>
                                    <th>Nama Sekolah</th>
                                    <th>Medali</th>
                                  </tr>
                                  <?php 
                                      $where = array(
                                          'id_kategori' => $value2->id_kategori,
                                          'jenis_regu' => 1,
                                          'status' => 1
                                      );
                                      $juara_campuran = $this->bm->select_where_array_order('tr_hasil_kejuaraan_sma', $where, 'juara asc')->result(); 
                                  ?>
                                  <?php if($juara_campuran): ?>
                                      <?php foreach ($juara_campuran as $key3 => $value3):?>
                                        <?php $warna ='#fff'; if($this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna) {
                                            $warna = '#'. $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna;
                                          }
                                          ?>
                                        <tr>
                                          <td>
                                            <?php echo $this->bm->select_where('ms_sekolah', 'id', $value3->id_sekolah)->row()->nmsekolah ?>
                                                <?php $peserta = $this->bm->select_where('tr_peserta','id_pendaftaran', $value3->id_pendaftaran)->result(); ?>
                                                <?php if(count($peserta) > 0 && count($peserta )< 10): ?>
                                                    <?php 
                                                      $name = array();
                                                      $i=0;
                                                      foreach ($peserta as $key4 => $value4) {
                                                        $name[$i] = $value4->nmpeserta;
                                                        $i++;
                                                      }
                                                      echo '<div><b> ('. implode(', ', $name).')</b></div>';
                                                    ?>
                                                <?php endif ?>
                                          </td>
                                          <td style="background: <?php echo $warna ?>"><?php echo $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->medali ?></td>
                                        </tr>
                                      <?php endforeach ?>
                                  <?php else: ?>
                                    <tr><td colspan="2">Data belum tersedia</td></tr>
                                  <?php endif ?>
                                </table>
                              </div>
                              <div class="col-md-6">
                                <table class="table table-sm table-bordered">
                                    <tr>
                                      <th colspan="2" style="background:  #f7efd2">
                                        Putri
                                      </th>
                                    </tr>
                                    <tr>
                                      <th>Nama Sekolah</th>
                                      <th>Medali</th>
                                    </tr>
                                    <?php 
                                      $where = array(
                                          'id_kategori' => $value2->id_kategori,
                                          'jenis_regu' => 2,
                                          'status' => 1
                                      );
                                      $juara_campuran = $this->bm->select_where_array_order('tr_hasil_kejuaraan_sma', $where, 'juara asc')->result(); 
                                  ?>
                                  <?php if($juara_campuran): ?>
                                      <?php foreach ($juara_campuran as $key3 => $value3):?>
                                        <?php $warna ='#fff'; if($this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna) {
                                            $warna = '#'. $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna;
                                          }
                                          ?>
                                        <tr>
                                          <td>
                                            <?php echo $this->bm->select_where('ms_sekolah', 'id', $value3->id_sekolah)->row()->nmsekolah ?>
                                                <?php $peserta = $this->bm->select_where('tr_peserta','id_pendaftaran', $value3->id_pendaftaran)->result(); ?>
                                                <?php if(count($peserta) > 0 && count($peserta )< 10): ?>
                                                    <?php 
                                                      $name = array();
                                                      $i=0;
                                                      foreach ($peserta as $key4 => $value4) {
                                                        $name[$i] = $value4->nmpeserta;
                                                        $i++;
                                                      }
                                                      echo '<div><b> ('. implode(', ', $name).')</b></div>';
                                                    ?>
                                                <?php endif ?>
                                          </td>
                                          <td style="background: <?php echo $warna ?>"><?php echo $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->medali ?></td>
                                        </tr>
                                      <?php endforeach ?>
                                  <?php else : ?>
                                      <tr><td colspan="2">Data belum tersedia</td></tr>
                                  <?php endif ?>
                                </table>
                              </div>
                          <?php endif ?>
                        </div>
                      <?php endforeach ?>
                  <?php endif ?>
                    
                  </ol>
                </div>
              </div>
          </div>
        <?php endif ?>
      <?php endforeach?>
      <?php foreach ($kegiatan as $key => $value): ?>
      <!-- SEMAPHORE -->
        <?php if($key%2 == 0): ?>
          <div class="col-md-6">
             <div class="card">
                <div class="fakeimg"><img src="<?php echo base_url($value->banner) ?>"/></div>
                <div class="descript">
                  <!-- KETENTUAN -->
                  <?php if($value->kategori): ?>
                      <?php foreach ($value->kategori as $key2 => $value2):?>
                        <h3><?php echo $value2->nmkategori ?></h3>
                        <div class="row">
                          <?php if($value2->is_campuran): ?>
                              <div class="col-md-12">
                                  <table class="table table-sm table-bordered">
                                      <tr>
                                        <th colspan="2" style="background: #FFCC99">
                                          Putra/Putri
                                        </th>
                                      </tr>
                                      <tr>
                                        <th>Nama Sekolah</th>
                                        <th>Medali</th>
                                      </tr>
                                      <?php 
                                          $where = array(
                                              'id_kategori' => $value2->id_kategori,
                                              'jenis_regu' => 3,
                                              'status' => 1
                                          );
                                          $juara_campuran = $this->bm->select_where_array_order('tr_hasil_kejuaraan_sma', $where, 'juara asc')->result(); 
                                      ?>
                                      <?php if($juara_campuran): ?>
                                          <?php foreach ($juara_campuran as $key3 => $value3):?>
                                            <?php $warna ='#fff'; if($this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna) {
                                                $warna = '#'. $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna;
                                              }
                                              ?>
                                            <tr>
                                              <td>
                                                <?php echo $this->bm->select_where('ms_sekolah', 'id', $value3->id_sekolah)->row()->nmsekolah ?>
                                                <?php $peserta = $this->bm->select_where('tr_peserta','id_pendaftaran', $value3->id_pendaftaran)->result(); ?>
                                                <?php if(count($peserta) > 0 && count($peserta )< 10): ?>
                                                    <?php 
                                                      $name = array();
                                                      $i=0;
                                                      foreach ($peserta as $key4 => $value4) {
                                                        $name[$i] = $value4->nmpeserta;
                                                        $i++;
                                                      }
                                                      echo '<div><b> ('. implode(', ', $name).')</b></div>';
                                                    ?>
                                                <?php endif ?>
                                              </td>
                                              <td style="background: <?php echo $warna ?>"><?php echo $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->medali ?></td>
                                            </tr>
                                          <?php endforeach ?>
                                      <?php else: ?>
                                        <tr><td colspan="2">Data belum tersedia</td></tr>
                                      <?php endif ?>
                                  </table>
                              </div>
                          <?php else :?>
                              <div class="col-md-6">
                                <table class="table table-sm table-bordered">
                                  <tr>
                                    <th colspan="2" style="background:  #eed7a1">
                                      Putra
                                    </th>
                                  </tr>
                                  <tr>
                                    <th>Nama Sekolah</th>
                                    <th>Medali</th>
                                  </tr>
                                  <?php 
                                      $where = array(
                                          'id_kategori' => $value2->id_kategori,
                                          'jenis_regu' => 1,
                                          'status' => 1
                                      );
                                      $juara_campuran = $this->bm->select_where_array_order('tr_hasil_kejuaraan_sma', $where, 'juara asc')->result(); 
                                  ?>
                                  <?php if($juara_campuran): ?>
                                      <?php foreach ($juara_campuran as $key3 => $value3):?>
                                        <?php $warna ='#fff'; if($this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna) {
                                            $warna = '#'. $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna;
                                          }
                                          ?>
                                        <tr>
                                          <td>
                                            <?php echo $this->bm->select_where('ms_sekolah', 'id', $value3->id_sekolah)->row()->nmsekolah ?>
                                                <?php $peserta = $this->bm->select_where('tr_peserta','id_pendaftaran', $value3->id_pendaftaran)->result(); ?>
                                                <?php if(count($peserta) > 0 && count($peserta )< 10): ?>
                                                    <?php 
                                                      $name = array();
                                                      $i=0;
                                                      foreach ($peserta as $key4 => $value4) {
                                                        $name[$i] = $value4->nmpeserta;
                                                        $i++;
                                                      }
                                                      echo '<div><b> ('. implode(', ', $name).')</b></div>';
                                                    ?>
                                                <?php endif ?>
                                          </td>
                                          <td style="background: <?php echo $warna ?>"><?php echo $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->medali ?></td>
                                        </tr>
                                      <?php endforeach ?>
                                  <?php else: ?>
                                    <tr><td colspan="2">Data belum tersedia</td></tr>
                                  <?php endif ?>
                                </table>
                              </div>
                              <div class="col-md-6">
                                <table class="table table-sm table-bordered">
                                    <tr>
                                      <th colspan="2" style="background:  #f7efd2">
                                        Putri
                                      </th>
                                    </tr>
                                    <tr>
                                      <th>Nama Sekolah</th>
                                      <th>Medali</th>
                                    </tr>
                                    <?php 
                                      $where = array(
                                          'id_kategori' => $value2->id_kategori,
                                          'jenis_regu' => 2,
                                          'status' => 1
                                      );
                                      $juara_campuran = $this->bm->select_where_array_order('tr_hasil_kejuaraan_sma', $where, 'juara asc')->result(); 
                                  ?>
                                  <?php if($juara_campuran): ?>
                                      <?php foreach ($juara_campuran as $key3 => $value3):?>
                                        <?php $warna ='#fff'; if($this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna) {
                                            $warna = '#'. $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->warna;
                                          }
                                          ?>
                                        <tr>
                                          <td>
                                            <?php echo $this->bm->select_where('ms_sekolah', 'id', $value3->id_sekolah)->row()->nmsekolah ?>
                                                <?php $peserta = $this->bm->select_where('tr_peserta','id_pendaftaran', $value3->id_pendaftaran)->result(); ?>
                                                <?php if(count($peserta) > 0 && count($peserta )< 10): ?>
                                                    <?php 
                                                      $name = array();
                                                      $i=0;
                                                      foreach ($peserta as $key4 => $value4) {
                                                        $name[$i] = $value4->nmpeserta;
                                                        $i++;
                                                      }
                                                      echo '<div><b> ('. implode(', ', $name).')</b></div>';
                                                    ?>
                                                <?php endif ?>
                                          </td>
                                          <td style="background: <?php echo $warna ?>"><?php echo $this->bm->select_where('ms_juara', 'id', $value3->juara)->row()->medali ?></td>
                                        </tr>
                                      <?php endforeach ?>
                                  <?php else: ?>
                                    <tr><td colspan="2">Data belum tersedia</td></tr>
                                  <?php endif ?>
                                </table>
                              </div>
                          <?php endif ?>
                        </div>
                      <?php endforeach ?>
                  <?php endif ?>
                    
                  </ol>
                </div>
              </div>
          </div>
        <?php endif ?>
      <?php endforeach?>
      
    </div>
  <div class="row">
    <div class="col-md-12">
      <center><a href="<?php echo base_url() ?>hasil_kejuaraan" class="btn btn-primary"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali </a></center>
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
