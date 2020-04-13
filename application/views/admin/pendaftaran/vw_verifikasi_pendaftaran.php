<?php
    $status = $this->session->flashdata('status');
    $error = $this->session->flashdata('error');
    if(isset($status)){
      echo '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      Verifikasi Gagal</div>' . $error;
    }
  ?>
  <section class="invoice">
      <form action="<?php echo base_url() ?>admin/pendaftaran/post_verification" method="post" enctype="multipart/form-data">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-money"></i> Verifikasi Pembayaran
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped" >
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

          <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <table class="table">
              <tr>
                <th>Jumlah Pembayaran</th>
                <td><input type="text" id="input-amount" name="amount" class="form-control text-right">
                    <input type="hidden" id="" name="kdpembayaran" class="form-control text-right" value="<?php echo $pembayaran->kdpembayaran ?>">
                    <input type="hidden" id="" name="id_sekolah" class="form-control text-right" value="<?php echo $id_sekolah ?>">
                </td>
              </tr>
              <tr>
                <th>Bukti Transaksi</th>
                <td><input type="file" id="input-file" name="file_bukti" class="form-control"></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">

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
                <td>Rp. <?php echo number_format(round($pembayaran->total_pembayaran),0, '' ,'.')?>
                  <input type="hidden" id="total_pembayaran-input" name="total_pembayaran" value="<?php echo round($pembayaran->total_pembayaran) ?>">
                </td>
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
          </button>
          <a type="button" href="<?php echo base_url() ?>admin/pendaftaran/" class="btn btn-default" style="margin-left: 5px;">
            <i class="glyphicon glyphicon-arrow-left"></i>  Batalkan
          </a>
          <button id="btn-submit" type="submit" disabled="true" class="btn btn-success" style="margin-left: 5px;">
            <i class="fa fa-check-square-o"></i>  Verifikasi Pembayaran
          </button>
          
        </div>
      </div>
    </form>
    </section>  


    <script type="text/javascript">
     $(document).ready( function () {
        $('#input-amount').on('keyup', function(){
          priceFormat();
        });
        $('#input-amount').on('change', function(){
          var amount = $(this).unmask();
          var file = $('#input-file').val();
          var total_pembayaran = $('#total_pembayaran-input').val();
          if(Number(amount) == Number(total_pembayaran) && (file != '' && file != null) ){
            $('#btn-submit').prop('disabled', false);
          }
          else{
             $('#btn-submit').prop('disabled', true);
          }
        });
        $('#input-file').on('change', function(){
          var amount = $('#input-amount').unmask();
          var file = $('#input-file').val();
          var total_pembayaran = $('#total_pembayaran-input').val();
          if(Number(amount) == Number(total_pembayaran) && (file != '' && file != null) ){
            $('#btn-submit').prop('disabled', false);
          }
          else{
             $('#btn-submit').prop('disabled', true);
          }
        });
        function priceFormat(){
          $("#input-amount").priceFormat({
            prefix: 'Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            centsLimit: 0
         });
        }
      });
    </script>