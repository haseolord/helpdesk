<!-- =============================================== -->

  <style type="text/css">
    table th{
      vertical-align: middle !important;
    }
  </style>
  <?php
    $status = $this->session->flashdata('status');
    $username_daftar = $this->session->flashdata('username_daftar');
    $password_daftar = $this->session->flashdata('password_daftar');
    $nmsekolah = $this->session->flashdata('nmsekolah');
    if(isset($status)){
      $label = '';
      if(isset($username_daftar) && isset($password_daftar)){

           $label = 'User <span class="font-bold"><b>'. $username_daftar . '</b> Berhasil dibuat dengan password <b>'. $password_daftar. '</b></span><div><button id="copy-user" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-copy"></span> Copy</button></div>';
      }
      echo '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      Verifikasi Berhasil. '.$label.' </div><input type="text" class="hide" id="username-password" value="Selamat '.$nmsekolah.', username anda telah terdaftar. Berikut Username: *'.$username_daftar.'* - Password : *'.$password_daftar.'*  . Silahkan Kunjungi https://www.pendaftaranjc2020.online/login untuk melengkapi data.">';


    }
  ?>
   <section class="content-header">
      <h1>
        List Pendaftaran
        <small>JC 2020</small>
      </h1>
<!--       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Pace page</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box collapsed-box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Filter List Pendaftaran</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-plus"></i></button>
         <!--    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button> -->
          </div>
        </div>
        <div class="box-body"  style="display: none;">
          <form id="form-cari-pendaftaran">
            <table class="table table-responsive">
              <tr>
                <th colspan="2">Filter Tabel</th>
              </tr>
              <tr>
                <th width="15%"  style="vertical-align: middle;">Kode Pembayaran</th>
                <td class="form-inline"  style="vertical-align: middle;">
                  <label>#</label><input type="text" name="kdpembayaran" class="form-control">
                </td>
              </tr>
              <tr>
                <th width="15%"  style="vertical-align: middle;">Jenjang</th>
                <td  style="vertical-align: middle;">
                  <select class="form-control select2" name="id_jenjang">
                    <option value="0">Semua</option>
                    <option value="1">SD</option>
                    <option value="2">SMP</option>
                    <option value="3">SMA</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th width="15%"  style="vertical-align: middle;">Nama Sekolah</th>
                <td  style="vertical-align: middle;">
                  <label></label><input type="text" name="nmsekolah" class="form-control">
                  <!-- <select class="form-control select2">
                    <option>Semua</option>
                    <option value="1">SD</option>
                  </select> -->
                 
                </td>
              </tr>
            </table>
          </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="button" id="btn-search" class="btn btn-primary"><span class="glyphicon glyphicon-filter"></span> Filter</button>
          <a href="<?php echo site_url('admin/pendaftaran') ?>" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span> Reset</a>
        </div>
          <!-- /.box-footer-->
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
            <h5 class="text-bold">Export Data</h5>
            <div class="table-responsive">
                <table id="tb-list-pendaftaran" class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th class="">Kode Pembayaran</th>
                      <th class="">Nama Sekolah</th>
                      <th class="text-right">Jumlah Tim</th>
                      <th class="text-right">Total Pembayaran</th>
                      <th class="text-center">Verifikasi</th>
                    </tr>
                  </thead>
                  <tbody id="tbody-list">
                    <?php if($pendaftaran): ?>
                      <?php  foreach($pendaftaran as $key => $value):?>
                         <tr>
                          <td><?php echo $value->tanggal ?></td>
                          <td><?php echo $value->kdpembayaran ?></td>
                          <td><?php echo $value->nmsekolah ?></td>
                          <td class="text-right"><?php echo round($value->total_tim) ?></td>
                          <td class="text-right">Rp. <?php echo number_format(round($value->total_pembayaran),0, '' ,'.') ?></td>
                          <td class="text-center"><?php echo $value->aksi ?></td>
                        </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="5">Belum ada pendaftar.</td>
                      </tr>
                    <?php endif ?>
                  </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#tb-list-pendaftaran').DataTable({
              "aaSorting": [],
              dom: 'Bfrtip',
              buttons: [
                { extend: 'pdf', className: 'btn btn-sm btn-primary' },
                { extend: 'excel', className: 'btn btn-sm  btn-primary' },
                { extend: 'print', className: 'btn btn-sm btn-primary' },
              ]
            });
            $('#btn-search').on('click', function(){
              var url = '<?php echo base_url()?>admin/pendaftaran/get_list'; 
              var $form = $('#form-cari-pendaftaran').serialize();
                var newTr = '';
                $.ajax({
                  url: url,
                  data: $form,
                  type: 'post',
                  beforeSend:function(){
                    $('#tbody-list').html('<tr><td>Mencari data...</td><td></td><td></td><td></td><td></td></tr>');
                  },
                  success: function(response) {
                      $('#tbody-list').html('');
                      var response = JSON.parse(response);
                      if(response.status == 'success'){
                          data = response.data;
                          for(var i=0;i<data.length;i++){
                            newTr+= '<tr><td>'+data[i]['tanggal']+'</td><td>'+data[i]['kdpembayaran']+'</td><td>'+data[i]['nmsekolah']+'</td><td class="text-right">'+data[i]['total_regu']+'</td><td class="text-right">'+data[i]['total_pembayaran']+'</td><td class="text-center">'+data[i]['aksi']+'</td></tr>';
                          }

                      }
                      else{
                        newTr += '<tr><td>Data tidak ditemukan</td><td></td><td></td><td></td><td></td><td></td></tr>';
                      }
                      if(newTr != ''){
                        if ( $.fn.DataTable.isDataTable('#tb-list-pendaftaran') ) {
                          $('#tb-list-pendaftaran').DataTable().destroy();
                        }

                        
                        $('#tbody-list').html(newTr);
                        $('#tb-list-pendaftaran').DataTable({
                          "aaSorting": [],
                          dom: 'Bfrtip',
                          buttons: [
                            { extend: 'pdf', className: 'btn btn-sm btn-primary' },
                            { extend: 'excel', className: 'btn btn-sm  btn-primary' },
                            { extend: 'print', className: 'btn btn-sm btn-primary' },
                          ]
                        });
                      }
                  }
                });
            })
        });
        $('#copy-user').on('click', function(){
          copyToClipboard();
        });

        function copyToClipboard() {
          input = $("#username-password");
          var success   = true,
              range     = document.createRange(),
              selection;

          // For IE.
          if (window.clipboardData) {
            window.clipboardData.setData("Text", input.val());        
          } else {
            // Create a temporary element off screen.
            var tmpElem = $('<div>');
            tmpElem.css({
              position: "absolute",
              left:     "-1000px",
              top:      "-1000px",
            });
            // Add the input value to the temp element.
            tmpElem.text(input.val());
            $("body").append(tmpElem);
            // Select temp element.
            range.selectNodeContents(tmpElem.get(0));
            selection = window.getSelection ();
            selection.removeAllRanges ();
            selection.addRange (range);
            // Lets copy.
            try { 
              success = document.execCommand ("copy", false, null);
            }
            catch (e) {
              copyToClipboardFF(input.val());
            }
            if (success) {
              alert ("Data telah dicopy ke clipboard!");
              // remove temp element.
              tmpElem.remove();
            }
          }
        }
    </script>
