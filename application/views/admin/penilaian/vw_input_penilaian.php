<!-- =============================================== -->
  <style type="text/css">
    table th{
      vertical-align: middle !important;
    }
  </style>
    <?php
        $status = $this->session->flashdata('status');
        if(isset($status)){
          if($status == 1){
              echo '<div class="" style="padding-top:20px;"><div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Berhasil input hasil kejuaraan</div></div>';
          }
          elseif($status == 3){
            echo '<div class="" style="padding-top:20px;"><div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Berhasil update hasil kejuaraan</div></div>';
          }
          else{
            echo '<div class="" style="padding-top:20px;"><div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Gagal hasil kejuaraan</div></div>';
          }
        }
      ?>
   <section class="content-header">
      <div class="row">
        <div class="col-md-12">
          
        </div>
      </div>
      <h1>
        Input Hasil Kejuaraan
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
      <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <div class="col-md-12">
                  
                </div>
                <div class="col-md-12" style="padding: 0px">
                  <form id="form-juara" method="POST" action="<?php echo base_url() ?>admin/penilaian/post_juara">
                  <table class="table" style="border:0px;">
                    <tr>
                      <th width="15%">Jenjang</th>
                      <td>
                        <?php if($role == 1 && $id_jenjang == null) :?>
                            <?php
                              $js = array(
                                      'id'       => 'jenjang',
                                      'class' => 'form-control select2-default'
                              );
                              echo form_dropdown('jenjang', $jenjang, null, $js);
                            ?>
                        <?php else : ?>
                          <input type="hidden" name="jenjang" class="form-control" id="jenjang" value="<?php echo $id_jenjang ?>">
                            <input type="text" name="nmjenjang" disabled class="form-control" id="nmjenjang" value="<?php echo $nmjenjang ?>">
                        <?php endif ?>
                      </th>
                    </tr>
                    <tr>
                      <th>Mata Lomba</th>
                      <td>
                        <?php
                              $js = array(
                                      'id'       => 'lomba',
                                      'class' => 'form-control select2-default'
                              );
                              echo form_dropdown('lomba', $kegiatan, null, $js);
                            ?>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-center" colspan="2"><button id="btn-search" class="btn btn-primary" type="button"><span class="glyphicon glyphicon-menu-right"></span> Lanjutkan</button></th>
                    </tr>
                  </table>
              </div>
              <div id="kejuaraan-box" class="col-md-12 hide">
                  <table class="table">
                    <tr>
                      <th colspan="3" class="text-center"><h4><b>Hasil Kejuaraan</b></h4></th>
                    </tr>
                    <tr>
                      <th width="10%"></th>
                      <th width="45%" class="text-center alert-info">Putra</th>
                      <th width="45%" class="text-center alert-warning">Putri</th>
                    </tr>
                    <?php if($kejuaraan): ?>
                        <?php foreach ($kejuaraan as $key => $value) :?>
                            <tr>
                              <th><?php echo $value->name ?></th>
                              <td class="alert-info">
                                <?php
                                    $js = array(
                                            'id'       => 'kejuaraan-putra-'.$value->id,
                                            'class' => 'form-control kejuaraan-putra'
                                    );
                                    echo form_dropdown('putra[]', null, null, $js);
                                ?>
                                <div class="warning-kejuaraan-putra text-danger"></div>
                              </td>
                              <td class="alert-warning">
                                <?php
                                    $js = array(
                                            'id'       => 'kejuaraan-putri-'.$value->id,
                                            'class' => 'form-control kejuaraan-putri',
                                    );
                                    echo form_dropdown('putri[]', null, null, $js);

                                ?>
                                <div class="warning-kejuaraan-putri text-danger"></div>
                              </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                          <td colspan="3">Tidak ada kejuaraan.</td>
                        </tr>
                    <?php endif ?>
                  </table>
                  <div class="text-center"><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Simpan</button></div>
                </form>
              </div>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#tb-list-pendaftaran').DataTable({
              "aaSorting": []
            });
            $('#btn-search').on('click', function(){
                let id_jenjang = $('#jenjang').val();
                let id_lomba = $('#lomba').val();
                console.log(id_lomba, id_jenjang);
                let show = false;
                if(id_jenjang == null || id_jenjang == '' || id_lomba == null || id_lomba == ''){
                  console.log('jenjang harus dipilih');
                  $(this).removeClass('hide');
                }
                else{
                  $('#kejuaraan-box').removeClass('hide');
                  $(this).addClass('hide');
                }
                
            })
            $('#lomba').on('change', function(){
              let kegiatan  = $(this).val();
              let jenjang = $('#jenjang').val();
              let newOption ='';
              let base_url='<?php echo base_url() ?>'
              let select_juara_putra = document.getElementsByClassName('kejuaraan-putra');
              $.ajax({
                  url: base_url+'/admin/penilaian/get_peserta/'+kegiatan+'/'+jenjang+'/1',
                  data: '',
                  type: 'post',
                  beforeSend:function(){
                    // $('.kejuaraan-putra').html('');
                    $('.kejuaraan-putra').html('<option value="">Pilih Peserta</option>');
                  },
                  success: function(response) {
                      var response = JSON.parse(response);
                      if(response.status == 'success'){
                          data = response.data;
                          juara = response.juara_putra;
                          // console.log(juara);
                          // newOption = '<option>Pilih Peserta</option>';
                          for(j = 0 ; j<6;j++){
                            current_juara = 0;
                            // console.log(juara[j]);
                            if(juara[j]){
                              current_juara = juara[j]['id_pendaftaran'];
                            }
                            for(var i=0;i<data.length;i++){
                              if(current_juara == data[i]['id']){
                                newOption = '<option value="'+data[i]['id']+'"" selected>'+data[i]['peserta']+'</option>';
                              }
                              else{
                                newOption = '<option value="'+data[i]['id']+'"">'+data[i]['peserta']+'</option>';
                              }
                              $('#kejuaraan-putra-'+(j+1)).append(newOption);
                            }
                          }
                          $('.kejuaraan-putra').select2();
                      }
                  }
              });
              let newOption2 ='';
              $.ajax({
                  url: base_url+'/admin/penilaian/get_peserta/'+kegiatan+'/'+jenjang+'/2',
                  data: '',
                  type: 'post',
                  beforeSend:function(){
                    $('.kejuaraan-putri').html('');
                    $('.kejuaraan-putri').html('<option value="">Pilih Peserta</option>');
                  },
                  success: function(response) {
                      var response = JSON.parse(response);
                      if(response.status == 'success'){
                          data = response.data;
                          juara = response.juara_putri;
                          let newOption = '';
                          // newOption = '<option>Pilih Peserta</option>';
                          for(j = 0 ; j<6;j++){
                            current_juara = 0;
                            // console.log(juara[j]);
                            if(juara[j]){
                              current_juara = juara[j]['id_pendaftaran'];
                            }
                            for(var i=0;i<data.length;i++){
                              if(current_juara == data[i]['id']){
                                newOption = '<option value="'+data[i]['id']+'"" selected>'+data[i]['peserta']+'</option>';
                              }
                              else{
                                newOption = '<option value="'+data[i]['id']+'"">'+data[i]['peserta']+'</option>';
                              }
                              $('#kejuaraan-putri-'+(j+1)).append(newOption);
                            }
                          }
                          $('.kejuaraan-putri').select2();
                      }
                  }
              });
            });

        });

        $('.kejuaraan-putra').on('change', function(e){
          var putra = document.getElementsByClassName("kejuaraan-putra");
          var putri = document.getElementsByClassName("kejuaraan-putri");
          var warning_putra = document.getElementsByClassName("warning-kejuaraan-putra");
          var warning_putri = document.getElementsByClassName("warning-kejuaraan-putri");
          for(i=0;i<putra.length;i++){
            if(putra[i].value != ''){
              warning_putra[i].innerHTML = '';
            }
            if(putri[i].value != ''){
              warning_putri[i].innerHTML= '';
            }
          }

        });
        $('.kejuaraan-putri').on('change', function(e){
          var putra = document.getElementsByClassName("kejuaraan-putra");
          var putri = document.getElementsByClassName("kejuaraan-putri");
          var warning_putra = document.getElementsByClassName("warning-kejuaraan-putra");
          var warning_putri = document.getElementsByClassName("warning-kejuaraan-putri");
          for(i=0;i<putra.length;i++){
            if(putra[i].value != ''){
              warning_putra[i].innerHTML = '';
            }
            if(putri[i].value != ''){
              warning_putri[i].innerHTML= '';
            }
          }

        });

        $('#form-juara').submit(function(){
          let error = 0;
            var putra = document.getElementsByClassName("kejuaraan-putra");
            var putri = document.getElementsByClassName("kejuaraan-putri");
            var warning_putra = document.getElementsByClassName("warning-kejuaraan-putra");
            var warning_putri = document.getElementsByClassName("warning-kejuaraan-putri");
            for(i=0;i<putra.length;i++){
              warning_putra[i].innerHTML = '';
              warning_putri[i].innerHTML = '';
              console.log(putra[i].value);
              if(putra[i].value == "" || putra[i].value == null){
                warning_putra[i].innerHTML = 'Peserta belum dipilih';
                error=1;
                return false;
              }
              if(putri[i].value == "" || putri[i].value == null){
                error = 1
                warning_putri[i].innerHTML = 'Peserta belum dipilih';
                return false;
              }
              if(error == 0){
                for(j=(i+1); j<putra.length; j++){
                  if(putra[i].value == putra[j].value){
                    warning_putra[j].innerHTML = 'Nomor peserta sama dengan juara ke-'+(i+1);
                    return false;
                  }
                  if(putri[i].value == putri[j].value){
                    warning_putri[j].innerHTML = 'Nomor peserta sama dengan juara ke-'+(i+1);
                    return false;
                  }
                }
              }
            }
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
