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

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<head>
  <title> Pendaftaran Jalakmas </title>
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
      margin-top: 10px;
    }
    .footer-mata-lomba {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .box-default{
      margin-top: 5px;
    }
    .table-sm tr td{
      padding: 2px !important;
      vertical-align: middle !important;
    }
    .sumary{
      background: #FFFFE0 !important;
      color: #000 !important;
    }
    .select2-selection__rendered {
        margin:-7px !important;
      }
    body{
      background-color: #F9E79F;
    }
  </style>
</head>

<body>
  <div class="row" id="wrapper">
    <div class="col-md-12">
      <?php
              $status = $this->session->flashdata('status');
            if(isset($status)){
              echo '<div class="container" style="padding-top:20px;"><div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              Pendaftaran gagal</div></div>';
            }
          ?>
       <div class="box box-default">
          <div class="box-header with-border" style="text-align: center !important;  ">
            <img src="<?php echo base_url(); ?>/assets/images/banner-penggalang.png" width="100%" >

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="row box-body">
            <form id="form-pendaftaran" method="POST" action="<?php echo base_url() ?>pendaftaran/penggalang/post_sd">
              <div class="col-md-12">
                <table class="table table-striped table-responsive">
                  <tr>
                    <td width="15%">Jenjang</td>
                    <td>
                     Penggalang, Sekolah Dasar
                    </th>
                  </tr>
                  <tr>
                    <td width="15%">Pilih Kabupaten <span class="text-danger">*</span></td>
                    <td>
                      <?php
                        $js = array(
                                'id'       => 'kabupaten_select',
                                'class' => 'form-control select2-default'
                        );
                        echo form_dropdown('kabupaten', $arr_kabupaten, null, $js);
                      ?>
                      <span id="warning-kabupaten" class="text-sm text-danger hide">Kabupaten belum dipilih</span>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%">Pilih Kecamatan <span class="text-danger">*</span></td>
                    <td>
                      <select id="kecamatan_select" name="kecamatan" class="form-control select2-default">
                        <option>Pilih Kabupaten Terlebih Dahulu</option>
                      </select>
                      <span id="warning-kecamatan" class="text-sm text-danger hide">Kecamatan belum dipilih</span>
                    </td>
                  </tr>
                   <tr>
                    <td width="15%">Pilih Sekolah <span class="text-danger">*</span></td>
                    <td>
                      <select id="sekolah_select" name="sekolah" class="form-control select2-default">
                        <option>Pilih Kecamatan Terlebih Dahulu</option>
                      </select>
                      <span id="warning-sekolah" class="text-sm text-danger hide">Sekolah belum dipilih</span>
                    </td>
                  </tr>
                  </tr>
                  <tr>
                    <th class="text-center" colspan="2"><button id="btn-next-registration" class="btn btn-primary" type="button"><span class="glyphicon glyphicon-menu-right"></span> Lanjutkan</button></th>
                  </tr>
                </table>
              </div>
                <div id="content" class="container hide">
                   <div class="col-md-6">
                     <div class="">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="table-responsive">
                              <div class="text-center"><h4><span class="glyphicon glyphicon-asterisk"></span><span class="font-bold"> Daftarkan Tim Putra</span></h4></div>
                              <table class="table table-sm table-bordered">
                                <tr>
                                  <th>No</th>
                                  <th>Nama Lomba</th>
                                  <!-- <th>Perserta</th> -->
                                  <th>Biaya</th>
                                  <th>Tim</th>
                                </tr>
                                <?php $i=1; foreach ($lomba as $key => $value):?>
                                    <tr>
                                      <td><?php echo $i++; ?></td>
                                      <td><?php echo $value->nmlomba;?></td>
                                      <!-- <td><?php echo $value->jmlpeserta; ?></td> -->
                                      <?php if($value->pendaftar_putra < $value->kuota):?>
                                        <td class="text-right">Rp. <?php echo number_format(round($value->biaya),0, '' ,'.'); ?> x
                                          <input  type="hidden" name="biaya_regu_pa[]" class="form-control biaya_pa" value="<?php echo $value->biaya ?>">
                                        </td>
                                        <td width="30px"><input min="0" type="number" name="jumlah_regu_pa[]" class="form-control regu regu_pa" value="0"></td>
                                      <?php else : ?>
                                        <td colspan="2" class="alert-danger text-center">Kuota Penuh
                                          <input  type="hidden" name="biaya_regu_pa[]" class="form-control biaya_pa" value="<?php echo $value->biaya ?>">
                                          <input min="0" type="number" name="jumlah_regu_pa[]" class="form-control regu regu_pa hide" value="0">
                                        </td>
                                      <?php endif ?>
                                    </tr>
                                <?php endforeach ?>
                              </table>
                            </div>
                          </div>
                         </div>
                      </div>
                </div>
                <div class="col-md-6">
                   <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <div class="text-center"><h4><span class="glyphicon glyphicon-asterisk"></span><span class="font-bold"> Daftarkan Tim Putri</span></h4></div>
                            <table class="table table-sm table-bordered">
                              <tr>
                                <th>No</th>
                                <th>Nama Lomba</th>
                                <!-- <th>Perserta</th> -->
                                <th>Biaya</th>
                                <th>Tim</th>
                              </tr>
                               <?php $i=1; foreach ($lomba as $key => $value):?>
                                  <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $value->nmlomba;?></td>
                                    <!-- <td><?php echo $value->jmlpeserta; ?></td> -->
                                    <?php if($value->pendaftar_putri < $value->kuota):?>
                                      <td class="text-right">Rp. <?php echo number_format(round($value->biaya),0, '' ,'.'); ?> x
                                        <input  type="hidden" name="biaya_regu_pi[]" class="form-control biaya_pi" value="<?php echo $value->biaya ?>">
                                      </td>
                                      <td width="30px" class="text-right"><input min="0" type="number" name="jumlah_regu_pi[]" class="regu form-control regu_pi" value="0"></td>
                                    <?php else : ?>
                                        <td colspan="2" class="alert-danger text-center">Kuota Penuh
                                          <input  type="hidden" name="biaya_regu_pi[]" class="form-control biaya_pi" value="<?php echo $value->biaya ?>">
                                          <input min="0" type="number" name="jumlah_regu_pa[]" class="form-control regu regu_pi hide" value="0">
                                        </td>
                                    <?php endif ?>
                                    
                                    
                                  </tr>
                              <?php endforeach ?>
                            </table>
                          </div>
                        </div>

                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="alert alert-warning sumary">
                      Jumlah Tim :<b> <span id="jumlah_regu" class="font-bold"></span></b>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="alert alert-warning sumary">
                      Total Pembayaran : <b> <span id="total_payment" class="font-bold"></span></b>
                    </div>
                </div>


                <div class="box-footer">
                  Silahkan isi jumlah Tim yang akan anda daftarkan.

                  <div class="text-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Lanjutkan
                  </button></div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pendaftaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Apakah data yang anda masukan sudah benar?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Ajukan Pendaftaran</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </form>
          </div>
          <!-- /.box-body -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<?php if(isset($javascript)){echo '<script src="'.base_url().'assets/js/function/'.$javascript.'"></script>';}?>
<script type="text/javascript">
  $('#my-box').boxWidget({
    animationSpeed: 500,
    collapseTrigger: '#my-collapse-button-trigger',
    removeTrigger: '#my-remove-button-trigger',
    collapseIcon: 'fa-minus',
    expandIcon: 'fa-plus',
    removeIcon: 'fa-times'
  });
  $('.select2-default').select2();

  $('#kabupaten_select').on('change', function(e){
    kabupatenChanges();
    kecamatanChanges();
  });

  function kabupatenChanges(){
    $('#kecamatan_select').html('<option value="0">Pilih Kabupaten Terlebih Dahulu</option>');
    $('#sekolah_select').html('<option value="0">Pilih Kecamatan Terlebih Dahulu</option>');
    let kabupaten= $('#kabupaten_select').val();
    if(kabupaten == '' || kabupaten == '0' || kabupaten == null){
      $('#warning-kabupaten').removeClass('hide');
    }
    else{
      $('#warning-kabupaten').addClass('hide');
      var url = '<?php echo base_url()?>master/kecamatan/get_api/'+kabupaten;
      //alert(v)

      $.ajax({
        //alert('test')
        url: url,
        data: '',
        type: 'GET',
        dataType: 'json',
        beforeSend: function()
        {
        },
        success: function(data)
        {
           var id;
           var option;
           var nama;
           $('#kecamatan_select').html('<option value="0">--- Pilih Kecamatan ---</option>');

           for(var i=0; i< data.length;i++)
           {
              id = data[i]['id'];
              nama = data[i]['nama'];
              option += '<option value="'+id+'">'+nama+'</option>';

           }
           $('#kecamatan_select').append(option);
        }
        });
    }
    //var kdProv = document.getElementById('provinsi').value;
    // alert(xx);
  }
   $('#kecamatan_select').on('change', function(e){
      kecamatanChanges();
      $('#btn-next-registration').removeClass('hide');
      $('#content').addClass('hide');
    });

    function kecamatanChanges(){
      $('#sekolah_select').html('<option value="0">Pilih Kecamatan Terlebih Dahulu</option>');
      $('#warning-kecamatan').removeClass('hide');
      let kecamatan= $('#kecamatan_select').val();
      if(kecamatan){
        $('#warning-kecamatan').addClass('hide');
         //var kdProv = document.getElementById('provinsi').value;
       // alert(xx);
        var url = '<?php echo base_url()?>master/sekolah/get_api/'+kecamatan+'/'+1;
         //alert(v)
        $.ajax({
          //alert('test')
          url: url,
          data: '',
          type: 'GET',
          dataType: 'json',
          beforeSend: function()
          {
          },
          success: function(data){
            var id;
            var option;
            var nama;
            if(data){
              $('#sekolah_select').html('<option value="0">--- Pilih Sekolah ---</option>');
              for(var i=0; i< data.length;i++){
                id = data[i]['id'];
                nama = data[i]['nama'];
                option += '<option value="'+id+'">'+nama+'</option>';
              }
              $('#sekolah_select').append(option);
            }
          }
        });
      }
    }

    function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function calculateRegu(){
      $('#jumlah_regu').html('');
      $('#total_payment').html('');
      var regu_pa = document.getElementsByClassName("regu_pa");
      var regu_pi = document.getElementsByClassName("regu_pi");
      var biaya_pa = document.getElementsByClassName("biaya_pa");
      var biaya_pi = document.getElementsByClassName("biaya_pi");
      var total_regu = 0;
      var total_biaya = 0;
      var pa;
      var pi;
      for(let i =0 ; i < regu_pa.length; i++){
        // console.log(regu_pa[i]);
        pa =  Number(regu_pa[i].value);
        pi =  Number(regu_pi[i].value);
        pa_pay = Number(biaya_pa[i].value);
        pi_pay = Number(biaya_pi[i].value);
        total_regu += pa;
        total_regu += pi;
        total_biaya += Number(pa * pa_pay);
        total_biaya += Number(pi * pi_pay);
      }
      if(total_regu > 0){
        $('#jumlah_regu').html(total_regu+' regu');
      }
      if(total_biaya > 0){
        $('#total_payment').html('Rp. '+numberWithCommas(total_biaya));
      }
    }

    $('.regu').on('change', function(e){
      calculateRegu();
    });

    $('#sekolah_select').on('change', function(e){
      checkSekolah();
      $('#btn-next-registration').removeClass('hide');
      $('#content').addClass('hide');
    })

    function checkKabupaten(){
      let kabupaten = $('#kabupaten_select').val();
      let validation =0;
      if(kabupaten == '' || kabupaten == '0' || kabupaten == null){
        $('#warning-kabupaten').removeClass('hide');
        validation = 1;
      }
      return validation;
    }

    function checkKecamatan(){
      let kecamatan = $('#kecamatan_select').val();
      let validation =0;
      if(kecamatan == '' || kecamatan == '0' || kecamatan == null){
        $('#warning-kecamatan').removeClass('hide');
        validation = 1;
      }
      return validation;
    }

    function checkSekolah(){
      let sekolah = $('#sekolah_select').val();
      let validation =0;
      if(sekolah == '' || sekolah == '0' || sekolah == null){
        $('#warning-sekolah').removeClass('hide');
        validation = 1;
      }
      else{
        $('#warning-sekolah').addClass('hide');
      }
      return validation;
    }

    $('#btn-next-registration').on('click', function(e){
      e.preventDefault();
      let sumary = 0;
      let is_kabupaten = checkKabupaten();
      let is_kecamatan = checkKecamatan();
      let is_sekolah = checkSekolah();
      sumary += is_kabupaten + is_kecamatan + is_sekolah;
      if(sumary == 0){
        $(this).addClass('hide');
        $('#content').removeClass('hide');
      }
      else{
        $(this).removeClass('hide');
        $('#content').addClass('hide');
      }
      console.log(sumary);




    });

</script>
</html>
