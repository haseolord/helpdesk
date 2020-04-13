
<?php
  $status = $this->session->flashdata('status');
  if(isset($status)){
    echo '<div class="alert alert-success alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Data peserta telah disimpan</div>';
  }
?>


<section class="content-header">
  <h1>
    Peserta
    JC 2020
    <div><small><?php echo $nmsekolah . ' | ' . $username?></small></div>
  </h1>
<!--       <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Pace page</li>
  </ol> -->
</section>
 <section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-body">
        <div class="table-responsive">
				<table id="tb-list-pendaftaran" class="table">
					<thead>
						<tr>
							<th>Nomor Peserta</th>
              <th class="text-center">Kategori</th>
							<th>Mata Lomba</th>
							<th class="text-center">Jumlah Peserta</th>
							<th class="text-center">Detail Peserta</th>
						</tr>
					</thead>
					<tbody>
						<?php if($pendaftaran): ?>
							<?php foreach ($pendaftaran as $key => $value) :?>
								<tr>
									<td><?php echo $value->nomor_peserta ?></td>
                  <td class="text-center"><?php echo $value->kategori ?></td>
									<td><?php echo $value->nmlomba ?></td>
									<td class="text-center"><?php echo $value->jumlah_peserta ?></td>
									<td class="text-center"><?php echo $value->aksi ?></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
        </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>

<!-- Modal -->
<div id="modal-add-data" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form id="form-detail-peserta" action="<?php echo base_url() ?>peserta/data/post_peserta" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b><span id="title-lomba"></span></b></h4>
      </div>
      <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Peserta</th>
                <th>Tanggal Lahir</th>
              </tr>   
            </thead>
           <tbody id="tbody-list">
           </tbody>
          </table>
          <input type="hidden" name="id_pendaftaran" id="id_pendaftaran">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
     </form>
  </div>
</div>

<!-- Modal -->
<div id="modal-view-data" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form id="form-detail-peserta" action="#" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b><span id="title-lomba-view"></span></b></h4>
      </div>
      <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Peserta</th>
                <th>Usia</th>
              </tr>   
            </thead>
           <tbody id="tbody-list-view">
           </tbody>
          </table>
          <input type="hidden" name="id_pendaftaran" id="id_pendaftaran">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
     </form>
  </div>
</div>

<div id="modal-edit-data" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form id="form-detail-peserta" action="<?php echo base_url() ?>peserta/data/edit_peserta" method="post">
    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b><span >Edit Data</span></b></h4>
      </div>
      <div class="modal-body">
          
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Peserta</th>
                  <th>Tanggal Lahir</th>
                </tr>   
              </thead>
             <tbody id="tbody-list-edit">
             </tbody>
            </table>
          <input type="hidden" name="id_pendaftaran" id="id_pendaftaran">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
     </form>
  </div>
</div>
<script type="text/javascript">
        $(document).ready( function () {
            $('#tb-list-pendaftaran').DataTable({
              "aaSorting": []
            });
           
        });
        function add_data(id){
          var url = '<?php echo base_url()?>peserta/data/get_pendaftaran/'+id; 
           $.ajax({
              url: url,
              data: '',
              type: 'get',
              dataType: "json",
              beforeSend:function(){
                $('#tbody-list-view').html('<tr><td>Mencari data...</td><td></td></tr>');
                $('#title-lomba-view').html('');
              },
              success: function(response) {
                console.log(response);
                let data = response.data;
                $('#tbody-list').html('');
                let title = data['nmlomba'] + ' - #' + data['nomor_peserta'];
                $('#title-lomba').html(title);
                let newTr = '';
                $('#id_pendaftaran').val(data['pendaftaran']['id']);
                for (var i = 0; i < data['jumlah_peserta']; i++) {
                   newTr += '<tr>';
                   newTr += '<td>'+(i+1)+'</td><td><input class="form-control" name="nama_peserta[]" required></td><td><input name="tanggal_lahir[]" type="date" class="form-control" value="2000-01-01" required></td>';
                   newTr += '</tr>';              
                }
                $('#tbody-list').append(newTr);
               
                
              }
            });
        }

        function view_data(id){
          var url = '<?php echo base_url()?>peserta/data/view/'+id; 
           $.ajax({
              url: url,
              data: '',
              type: 'get',
              dataType: "json",
              beforeSend:function(){
                $('#tbody-list-view').html('<tr><td>Mencari data...</td><td></td><td></td><td></td></tr>');
                $('#title-lomba-view').html('');
              },
              success: function(response) {
                console.log(response);
                let data = response.data;
                $('#tbody-list-view').html('');
                let title = data['nmlomba'] + ' - #' + data['nomor_peserta'];
                $('#title-lomba-view').html(title);
                let newTr = '';
                for (var i = 0; i < data['peserta'].length; i++) {
                   newTr += '<tr>';
                   newTr += '<td>'+(i+1)+'</td><td>'+data['peserta'][i]['nmpeserta']+'</td><td>'+data['peserta'][i]['usia']+' tahun</td>';
                   newTr += '</tr>';              
                }
                $('#tbody-list-view').append(newTr);
               
                
              }
            });
        }

        function edit_data(id){
          var url = '<?php echo base_url()?>peserta/data/view/'+id; 
           $.ajax({
              url: url,
              data: '',
              type: 'get',
              dataType: "json",
              beforeSend:function(){
                $('#tbody-list-view').html('<tr><td>Mencari data...</td><td></td><td></td><td></td></tr>');
                $('#title-lomba-view').html('');
              },
              success: function(response) {
                console.log(response);
                let data = response.data;
                $('#tbody-list-edit').html('');
                let title = data['nmlomba'] + ' - #' + data['nomor_peserta'];
                $('#title-lomba-edit').html(title);
                let newTr = '';
                for (var i = 0; i < data['peserta'].length; i++) {
                   newTr += '<tr>';
                   newTr += '<td><input type="hidden" name="id_peserta[]" value="'+data['peserta'][i]['id']+'">'+(i+1)+'</td><td><input class="form-control" name="nama_peserta[]" value="'+data['peserta'][i]['nmpeserta']+'" required></td><td><input name="tanggal_lahir[]" type="date" class="form-control" value="'+data['peserta'][i]['tanggal_lahir']+'" required></td>';             
                }
                $('#tbody-list-edit').append(newTr);
               
                
              }
            });
        }
    </script>