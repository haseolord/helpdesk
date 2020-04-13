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
          <form id="form-juara" method="POST" action="<?php echo base_url() ?>/penilaian/hasil_kejuaraan/post_juara_sma">
            <div class="table-responsive">
                <div class="col-md-12">
                  
                </div>
                <div class="col-md-12" style="padding: 0px">
                  <table class="table" style="border:0px;">
                    <tr>
                      <th width="15%">Jenjang</th>
                      <td>
                        <input type="hidden" name="jenjang" class="form-control" id="jenjang" value="3">
                        <input type="text" name="nmjenjang" disabled class="form-control" id="nmjenjang" value="SMA">
                      </th>
                    </tr>
                    <tr>
                      <th>Mata Lomba</th>
                      <td>
                        <input type="hidden" name="lomba" class="form-control" id="lomba" value="<?php echo $kegiatan_object->id ?>">
                        <input type="text" name="nmlomba" disabled class="form-control" id="nmlomba" value="<?php echo $nmlomba ?>">
                      </td>
                    </tr>
                    <tr>
                      <th>Kategori</th>
                      <td>
                        <?php
                              $js = array(
                                      'id'       => 'kategori',
                                      'class' => 'form-control select2-default'
                              );
                              echo form_dropdown('kategori', $array_kategori, null, $js);
                            ?>
                        <input type="hidden" id="is_campuran" name="is_campuran" value="0">
                      </td>
                    </tr>
                    <tr>
                      <th class="text-center hide" colspan="2"><button id="btn-search" class="btn btn-primary" type="button"><span class="glyphicon glyphicon-menu-right"></span> Lanjutkan</button></th>
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
                            <?php if($value->id == 3){break;} ?>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                          <td colspan="3">Tidak ada kejuaraan.</td>
                        </tr>
                    <?php endif ?>
                  </table>
                <!--   <div class="text-center"><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Simpan</button></div> -->
              </div>
              <div id="kejuaraan-box-campuran" class="col-md-12 hide">
                  <table class="table">
                    <tr>
                      <th colspan="3" class="text-center"><h4><b>Hasil Kejuaraan</b></h4></th>
                    </tr>
                    <tr>
                      <th width="10%"></th>
                      <th width="45%" class="text-center alert-info">Campuran</th>
                    </tr>
                    <?php if($kejuaraan): ?>
                        <?php foreach ($kejuaraan as $key => $value) :?>
                            <tr>
                              <th><?php echo $value->name ?></th>
                              <td class="alert-info">
                                <?php
                                    $js = array(
                                            'id'       => 'kejuaraan-campuran-'.$value->id,
                                            'class' => 'form-control kejuaraan-campuran'
                                    );
                                    echo form_dropdown('campuran[]', null, null, $js);
                                ?>
                                <div class="warning-kejuaraan-campuran text-danger"></div>
                              </td>
                            </tr>
                            <?php if($value->id == 3){break;} ?>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                          <td colspan="3">Tidak ada kejuaraan.</td>
                        </tr>
                    <?php endif ?>
                  </table>
                 
              </div>
            </div>
             <div id="submit-button" class="text-center hide"><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Simpan</button></div>
             <div id="submited-alert" class="alert alert-success hide"> Anda sudah menyimpan hasil kejuaraan, silahkan hubungi MABES jika ada perubahan.</div>
            </form>
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
            $('.select2-default').select2(); 
            $('#btn-search').on('click', function(){
              $('#kejuaraan-box-campuran').addClass('hide');
              $('#kejuaraan-box').addClass('hide');
                let id_jenjang = $('#jenjang').val();
                let id_lomba = $('#lomba').val();
                let id_kategori = $('#kategori').val();
                let show = false;
                if(id_jenjang == null || id_jenjang == '' || id_lomba == null || id_lomba == '' || id_kategori == null || id_kategori == '' || id_kategori == 0){
                  $('#submit-button').addClass('hide');
                  $(this).removeClass('hide');
                }
                else{
                  $('#submit-button').removeClass('hide');
                  if($('#is_campuran').val() == 1 || $('#is_campuran').val() == '1'){
                    $('#kejuaraan-box-campuran').removeClass('hide');
                    $(this).addClass('hide');
                  }
                  else{
                    $('#kejuaraan-box').removeClass('hide');
                    $(this).addClass('hide');
                  }
                }
                
            })
            $('#lomba').on('change', function(){
              $('#submited-alert').addClass('hide')
              $('#kategori').val('');
              $('#btn-search').click()
              let idlomba  = $(this).val();
              let jenjang = $('#jenjang').val();
              let newOption ='';
              let base_url='<?php echo base_url() ?>';
              let select_juara_putra = document.getElementsByClassName('kejuaraan-putra');
              var url = '<?php echo base_url()?>admin/penilaian/get_api_sma/'+idlomba;
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
                    $('#kategori').html('<option value="0">--- Pilih Kategori ---</option>');
                    for(var i=0; i< data.length;i++){
                      id = data[i]['id'];
                      nama = data[i]['nama'];
                      option += '<option value="'+id+'">'+nama+'</option>';
                    }
                    $('#kategori').append(option);
                  }
                }
              });
            });

            $('#kategori').on('change', function(){
              $('#submited-alert').addClass('hide')
              id_kategori=$(this).val();
              kegiatan = $('#lomba').val();
              let is_juara = 0;
              var url = '<?php echo base_url()?>admin/penilaian/get_kategori/'+id_kategori;
              let base_url='<?php echo base_url() ?>';
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
                    $('#is_campuran').val(data['is_campuran']);
                    // console.log($('#is_campuran').val());
                     $('#btn-search').click();
                    if(data['is_campuran'] ==  '1' || data['is_campuran'] == 1){
                      $('.kejuaraan-putra').html('<option value="">Pilih Peserta</option>');
                      $('.kejuaraan-putri').html('<option value="">Pilih Peserta</option>');
                      let newOption2 ='';
                      $.ajax({
                          url: base_url+'/admin/penilaian/get_peserta_sma/'+data['id_kegiatan']+'/'+3+'/3/'+id_kategori,
                          data: '',
                          type: 'post',
                          beforeSend:function(){
                            $('.kejuaraan-campuran').html('');
                            $('.kejuaraan-campuran').html('<option value="">Pilih Peserta</option>');
                          },
                          success: function(response) {
                              var response = JSON.parse(response);
                              if(response.status == 'success'){
                                  data = response.data;
                                  juara = response.juara_campuran;
                                  is_juara = 0;
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
                                        $('#submit-button').addClass('hide');
                                        $('#submited-alert').removeClass('hide');
                                        newOption = '<option value="'+data[i]['id']+'"" selected>'+data[i]['peserta']+'</option>';
                                      }
                                      else{
                                        if(is_juara == 1){
                                          $('.kejuaraan-campuran').attr('disabled', true);
                                        }
                                        else{
                                          $('.kejuaraan-campuran').attr('disabled', false);
                                        }
                                        newOption = '<option value="'+data[i]['id']+'"">'+data[i]['peserta']+'</option>';
                                      }
                                      $('#kejuaraan-campuran-'+(j+1)).append(newOption);
                                    }
                                  }
                                  $('.kejuaraan-campuran').select2();
                              }
                          }
                      });
                    }
                    else{
                      $('.kejuaraan-putra').html('<option value="">Pilih Peserta</option>');
                      $('.kejuaraan-putri').html('<option value="">Pilih Peserta</option>');
                      let newOption2 ='';
                      $.ajax({
                          url: base_url+'/admin/penilaian/get_peserta_sma/'+data['id_kegiatan']+'/'+3+'/1/'+id_kategori,
                          data: '',
                          type: 'post',
                          beforeSend:function(){
                            $('.kejuaraan-putra').html('<option value="">Pilih Peserta</option>');
                            $('.kejuaraan-putri').html('<option value="">Pilih Peserta</option>');
                          },
                          success: function(response) {
                              var response = JSON.parse(response);
                              if(response.status == 'success'){
                                  data = response.data;
                                  juara = response.juara_putra;
                                  let newOption = '';
                                  is_juara = 0;
                                  // newOption = '<option>Pilih Peserta</option>';
                                  for(j = 0 ; j<3;j++){
                                    current_juara = 0;
                                    // console.log(juara[j]);
                                    if(juara[j]){
                                      current_juara = juara[j]['id_pendaftaran'];
                                    }
                                    for(var i=0;i<data.length;i++){
                                      if(current_juara == data[i]['id']){
                                        $('#submit-button').addClass('hide');
                                        $('#submited-alert').removeClass('hide');
                                        is_juara = 1;
                                        newOption = '<option value="'+data[i]['id']+'"" selected>'+data[i]['peserta']+'</option>';
                                      }
                                      else{
                                        newOption = '<option value="'+data[i]['id']+'"">'+data[i]['peserta']+'</option>';
                                      }
                                      $('#kejuaraan-putra-'+(j+1)).append(newOption);
                                      if(is_juara == 1){
                                        $('.kejuaraan-putra').attr('disabled', true);
                                      }
                                      else{
                                        $('.kejuaraan-putra').attr('disabled', false);
                                      }
                                    }
                                  }
                                  $('.kejuaraan-putra').select2();
                              }
                          }
                      });
                      $.ajax({
                          url: base_url+'/admin/penilaian/get_peserta_sma/'+data['id_kegiatan']+'/'+3+'/2/'+id_kategori,
                          data: '',
                          type: 'post',
                          beforeSend:function(){
                            $('.kejuaraan-putri').html('<option value="">Pilih Peserta</option>');
                          },
                          success: function(response) {
                              var response = JSON.parse(response);
                              if(response.status == 'success'){
                                  data = response.data;
                                  juara = response.juara_putri;
                                  let newOption = '';
                                  is_juara =0 ;
                                  // newOption = '<option>Pilih Peserta</option>';
                                  for(j = 0 ; j<3;j++){
                                    current_juara = 0;
                                    // console.log(juara[j]);
                                    if(juara[j]){
                                      current_juara = juara[j]['id_pendaftaran'];

                                    }
                                    for(var i=0;i<data.length;i++){
                                      if(current_juara == data[i]['id']){
                                        $('#submit-button').addClass('hide');
                                        $('#submited-alert').removeClass('hide');
                                        
                                        is_juara = 1;
                                        newOption = '<option value="'+data[i]['id']+'"" selected>'+data[i]['peserta']+'</option>';
                                      }
                                      else{
                                        newOption = '<option value="'+data[i]['id']+'"">'+data[i]['peserta']+'</option>';
                                      }
                                      $('#kejuaraan-putri-'+(j+1)).append(newOption);
                                      if(is_juara == 1){
                                        $('.kejuaraan-putri').attr('disabled', true);
                                      }
                                      else{
                                        $('.kejuaraan-putri').attr('disabled', false);
                                      }
                                    }
                                  }
                                  $('.kejuaraan-putri').select2();
                              }
                          }
                      });
                    }
                  }
                }
              });
            })

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

        $('.kejuaraan-campuran').on('change', function(e){
          var putra = document.getElementsByClassName("kejuaraan-campuran");
          var warning_putra = document.getElementsByClassName("warning-kejuaraan-campuran");
          for(i=0;i<putra.length;i++){
            if(putra[i].value != ''){
              warning_putra[i].innerHTML = '';
            }
          }

        });

        $('#form-juara').submit(function(){
          let error = 0;
          let is_campuran = $('#is_campuran').val();
          let kegiatan  = $('#lomba').val();
            var putra = document.getElementsByClassName("kejuaraan-putra");
            var putri = document.getElementsByClassName("kejuaraan-putri");
            var campuran = document.getElementsByClassName("kejuaraan-campuran");
            var warning_putra = document.getElementsByClassName("warning-kejuaraan-putra");
            var warning_putri = document.getElementsByClassName("warning-kejuaraan-putri");
            var warning_campuran = document.getElementsByClassName("warning-kejuaraan-campuran");
            if(is_campuran == 0){
              for(i=0;i<putra.length;i++){
                warning_putra[i].innerHTML = '';
                warning_putri[i].innerHTML = '';
                // console.log(putra[i].value);
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
            }
            else{
              for(i=0;i<campuran.length;i++){
                warning_campuran[i].innerHTML = '';
                if(campuran[i].value == "" || campuran[i].value == null){
                  // console.log("kosong1 brok");
                  warning_campuran[i].innerHTML = 'Peserta belum dipilih';
                  error=1;
                  return false;
                }
                if(error == 0){
                  for(j=(i+1); j<campuran.length; j++){
                    if(campuran[i].value == campuran[j].value){
                      warning_campuran[j].innerHTML = 'Nomor peserta sama dengan juara ke-'+(i+1);
                      return false;
                    }
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
