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
  <div class="pad margin no-print">
        <div class="callout callout-success" style="margin-bottom: 0!important;">
          <h4><i class="fa fa-info"></i> Pendaftaran berhasil.</h4>
              Silahkan melakukan pembayaran ke :<br>
              <b>BANK BRI</b> <br>
              <b>ATAS NAMA IMAM FAWZY</b><br>
              <b>418501007179539</b><br>
        </div>
      </div>
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Invoice JC 2020
            <small class="pull-right">Tanggal: <?php echo $today ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Dari
          <address>
            <strong>Admin Jalakmas</strong><br>
            Jl. Jenderal Sudirman, Lempuyang,  <br> Anjatan, Kabupaten Indramayu, Jawa Barat 45256<br> 
            HP: <a href="tel:<?php echo jalakmas_phone ?>"><?php echo jalakmas_phone ?></a><br>
            Email: <?php echo jalakmas_email ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Kepada
          <address>
            <strong>Pendaftar - <?php echo $nmsekolah ?></strong><br>
            <?php echo $nmkecamatan ?><br>
            <?php echo $nmkabupaten ?>

          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?php echo $kdpembayaran ?></b><br>
          <br>
          <!-- <b>Order ID:</b> 4F3S8J<br> -->
          <b>Jatuh Tempo : </b> <span class="text-danger"><?php echo $tanggal_kadaluarsa ?></span><br>
          <!-- <b>Account:</b> 968-34567 -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Kegiatan</th>
                <th width="10%" class="text-right">Kuantitas</th>
                <th width="15%" class="text-right">Biaya</th>
                <!-- <th>Description</th> -->
                <th width="15%" class="text-right">Subtotal</th>
              </tr>
            </thead>
            <tbody>
                <?php if($pendaftaran) : ?>
                  <?php foreach ($pendaftaran as $key => $value):?>
                    <?php if($value->total_regu):?>
                      <tr>
                        <td><?php echo $value->nmlomba ?></td>
                        <td class="text-right"><?php echo $value->total_regu ?></td>
                        <td class="text-right">Rp. <?php echo number_format(round($value->biaya),0, '' ,'.')?></td>
                        <td class="text-right">Rp. <?php echo number_format(round($value->total_pembayaran),0, '' ,'.')?></td>
                      </tr>
                    <?php endif ?>
                  <?php endforeach ?>
                <?php endif ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
        <!--   <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Silahkan melakukan pembayaran ke :<br>
            <b>BANK BRI</b> <br>
            <b>ATAS NAMA IMAM FAWZY</b><br>
            <b>418501007179539</b><br>
            Setelah melakukan pembayaran harap konfirmasi kepada admin kami melalui WhatsApp dengan menyertakan bukti transfer. Proses verifikasi selambat - lambatnya akan dilakukan dalam waktu 3x24jam. Jika ada pertanyaan silahkan hubungi admin kami.

          </p>
          <p>
            <b>Admin Jalakmas</b><br>
            <b><a href="tel:<?php echo jalakmas_phone ?>"><span class="glyphicon glyphicon-phone"></span> <?php echo jalakmas_phone ?></a></b>
            <br><b><span class="glyphicon glyphicon-briefcase"></span> <?php echo jalakmas_email ?></b>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Jatuh Tempo <?php echo $tanggal_kadaluarsa ?></p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rp. <?php echo number_format(round($pembayaran->total_pembayaran),0, '' ,'.')?></td>
              </tr>
              <tr>
                <th>Pajak (-)</th>
                <td>-</td>
              </tr>
             <!--  <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr> -->
              <tr>
                <th>Total:</th>
                <td>Rp. <?php echo number_format(round($pembayaran->total_pembayaran),0, '' ,'.')?></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment -->
          <!-- </button> -->
        <!--   <button type="button" class="btn btn-primary pull-right" style="margin-left: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button> -->
          <button  class="btn btn-success pull-right" type="button" onclick="printPage()"><i class="fa fa-print"></i> Print</button>
        </div>
      </div>
    </section>

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

    function printPage() {
      window.print();
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
