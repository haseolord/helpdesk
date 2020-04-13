var table = '';
$('#loader').hide();

obj_filter = {
	ajx_status		: 1
};

/*----------------------------------------------------------------------*
* INITIALIZATION
*----------------------------------------------------------------------*/

f_init_table();
$('#div_btn_group_update').hide();

// Appending individual column search functionality
table.columns().eq( 0 ).each( function ( colIdx ) {
	$( '#data_table input', table.column( colIdx ).footer() ).on( 'keyup', function () {
		table
			.columns( colIdx )
			.search( this.value )
			.draw();			
	} );
	
	$( '#data_table select', table.column( colIdx ).footer() ).on( 'change', function () {
		table
			.columns( colIdx )
			.search( this.value )
			.draw();			
	} );
} );

// Appending row selection
$('#data_table tbody').on( 'click', 'tr', function () {
	$(this).toggleClass('selected');
} );


/*----------------------------------------------------------------------*
* FUNCTION(S)
*----------------------------------------------------------------------*/

/*----------------------------------------------------------------------*
* F_INIT_TABLE
*-----------------------------------------------------------------------*
* Initialize main table
*----------------------------------------------------------------------*/
function f_init_table()
{
	table = $('#main_table').DataTable({
		'scrollX': true,
		'filter': true,
		'processing': true,
		'serverSide': true,
		'ajax': {
			'url'  : $('#hdn_site_url').val() + '/admin/master/provinsi/get_data',
			'type' : 'POST',
			'data' : obj_filter
		},
		'columns':[
			{'data' : 'id', 'defaultContent' : '', 'sortable' : false, 'searchable' : true, 'visible' : false},
			{'data' : 'kdprovinsi', 'defaultContent' : '', 'sortable' : false, 'searchable' : true, 'visible' : true},
			{'data' : 'nmprovinsi', 'defaultContent' : '', 'sortable' : false, 'searchable' : true, 'visible' : true},
			{'data' : 'status', 'defaultContent' : '', 'sortable' : false, 'searchable' : true, 'visible' : true},
			{'data' : null, 'defaultContent' : '', 'sortable' : false, 'searchable' : false, 'visible' : true},
		],
		'createdRow': function ( row, data, index ){
			if(data['status'] == 1){
				$('td', row).eq(2).html('<span class="text-success text-center">Aktif</span>');
				$('td', row).eq(-1).html(
					'<center><a href="#" class="btn btn-md" style="color:red" data-toggle="tooltip" data-placement="top" title="Delete Siswa" onclick="f_delete(\''+data['id_murid']+'\')" row_id="\''+data['id_murid']+'\'">'
					+'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a</center>'
				);
			}else{
				$('td', row).eq(2).html('<span class="text-danger text-center">Tidak Aktif</span>');
				$('td', row).eq(-1).html('<center><a href="#" class="edit" data-toggle="tooltip" data-placement="top" title="Edit Siswa" onclick="f_show_update_form('+data['id_murid']+')" row_id="\''+data['id_murid']+'\'">'
					+'<span class="glyphicon glyphicon-check" aria-hidden="true"></span></a></center>');
			}
		},
		'order' : [[0, "ASC"]]
	});	
}


/*----------------------------------------------------------------------*
* F_ADD_DATA
*-----------------------------------------------------------------------*
* Add new data
*----------------------------------------------------------------------*/
function f_add_data()
{
	var lobj_data = new FormData($('#add_form')[0]);
	var lv_url = '/k_siswa/siswa/add_data/api';
	var lv_loader_id = 'loader';

	// Ajax calling
	$.ajax({
		url : $('#hdn_site_url').val() + lv_url,
		type : 'post',
		dataType : 'json',
		data : lobj_data,
        cache: false,
        contentType: false,
        processData: false,
		beforeSend :
			function(){
				$('#' + lv_loader_id).show();
			},
		complete :
			function(){
				$('#' + lv_loader_id).hide();
			},
		success : 
			function(return_data){
				if(return_data.response == 'expired')
				{
					location.reload();
				}
				else
				{
					if(return_data.response == 'true')
					{
						table.draw();
						f_reset_form('add_form','');
					
						new PNotify({
				            title: 'Berhasil',
				            text: return_data.message,
				            type: 'success',
				            styling: 'bootstrap3',
				            delay: 3000,
				            mouse_reset: false,
				            hide: true
				        });
					}
					else
					{
						new PNotify({
				            title: 'Gagal',
				            text: return_data.message,
				            type: 'error',
				            styling: 'bootstrap3',
				            delay: 3000,
				            mouse_reset: false,
				            hide: true
				        });
					}
				}
			},
		error :
			function(return_data){
				console.log(return_data.responseText);
			}
	});
}

/*----------------------------------------------------------------------*
* F_SHOW_UPDATE_FORM
*-----------------------------------------------------------------------*
* Appending previous data and show update form
*----------------------------------------------------------------------*/
function f_show_update_form(lv_pk)
{	

	// Collecting data
	var lobj_data = {
		ajx_pk : lv_pk
	};
	
	var lv_url = '/k_siswa/siswa/get_single_data';
	var lv_loader_id = 'loader';
	
	// Set PK
	$('#hdn_in_pk').val(lv_pk);

	// Ajax calling
	$.ajax({
		url : $('#hdn_site_url').val() + lv_url,
		type : 'post',
		dataType : 'json',
		data : lobj_data,
		beforeSend :
			function(){
				$('#' + lv_loader_id).show();
			},
		complete :
			function(){
				$('#' + lv_loader_id).hide();
			},
		success : 		
			function(return_data){
				fc_append_update_form(return_data);
			},
		error :
			function(return_data){
				console.log(return_data.responseText);
			}
	});
	

}

/*----------------------------------------------------------------------*
* FC_APPEND_UPDATE_FORM
*-----------------------------------------------------------------------*
* Append current data on update form if AJAX success
*----------------------------------------------------------------------*/
function fc_append_update_form(return_data){
	// if(return_data.response == 'expired')
	// {
	// 	location.reload();
	// }
	// else
	// {
	// 	$('#div_in_message').removeClass('alert-danger');
	// 	$('#div_in_message').removeClass('alert-success');

	// 	if(return_data.response == 'true')
	// 	{		
			//--------------------------------------------------------------------------------
			// Appending return to input form
			$('#add_title').html('Update Data Siswa');
			$('#nama_murid').val(return_data.nama_murid);
			$('#jenis_kelamin_murid_'+return_data.jenis_kelamin_murid).prop('checked',true);

			//$('#tanggal_lahir_murid').val(return_data.tanggal_lahir_murid);
			if(return_data.tanggal_lahir_murid != '0000-00-00 00:00:00'){
				var student_birthdate = return_data.tanggal_lahir_murid.split(' ');
				student_birthdate = student_birthdate[0].split('-');
				student_birthdate = student_birthdate[1]+'/'+student_birthdate[2]+'/'+student_birthdate[0];
				$('#datepicker').datepicker('setDate', student_birthdate);
			}

			$('#agama_murid').val(return_data.agama_murid);
			$('#alamat_murid').val(return_data.alamat_murid);
			$('#nama_ortu_murid').val(return_data.nama_ortu_murid);
			$('#NISN').val(return_data.NISN);
			$('#tingkat_murid').val(return_data.tingkat_murid).trigger('change');
			$(function() {
			   $('#id_kelas').val(return_data.id_kelas);
			});

			$('#div_btn_group_add').hide();
			$('#div_btn_group_update').show();

			//$('#btn_update').attr('onclick', 'f_update_data('+return_data.query.klienID+')');
	// 	}
	// 	else
	// 	{
	// 		$('#div_in_message').addClass('alert alert-danger');
	// 		$('#div_in_message').html(return_data.message);
	// 		$('#div_in_message').show().fadeOut(5000);
	// 	}
		
	// 	f_open_form('div_input_form', 'edit', 'Edit Existing Data');
	// }

}

/*----------------------------------------------------------------------*
* F_UPDATE_DATA
*-----------------------------------------------------------------------*
* Update existing data
*----------------------------------------------------------------------*/
function f_update_data(lv_pk)
{
	// Validate form, abort if invalid
	// if(f_validate_form('fm_input') != true)
	// {
	// 	$('#div_in_message').addClass('alert-danger');
	// 	$('#div_in_message').html('Harap isi seluruh field dengan benar!');
	// 	return;
	// }
	
	// Collecting data
	var lobj_data = new FormData($('#add_form')[0]);
	var lv_url = '/k_siswa/siswa/update_data';
	var lv_loader_id = 'loader';
	
	// Ajax calling
	$.ajax({
		url : $('#hdn_site_url').val() + lv_url,
		type : 'post',
		dataType : 'json',
		data : lobj_data,
        cache: false,
        contentType: false,
        processData: false,
		beforeSend :
			function(){
				$('#' + lv_loader_id).show();
			},
		complete :
			function(){
				$('#' + lv_loader_id).hide();
			},
		success : 
			function(return_data){
				if(return_data.response == 'expired')
				{
					location.reload();
				}
				else
				{
					if(return_data.response == 'true')
					{
						table.draw();

						$('#add_title').html('Tambah Data Akademik');
						f_reset_form('add_form','');
						$('#div_btn_group_add').show();
						$('#div_btn_group_update').hide();
					
						new PNotify({
				            title: 'Berhasil',
				            text: return_data.message,
				            type: 'success',
				            styling: 'bootstrap3',
				            delay: 3000,
				            mouse_reset: false,
				            hide: true
				        });
					}
					else
					{
						new PNotify({
				            title: 'Gagal',
				            text: return_data.message,
				            type: 'error',
				            styling: 'bootstrap3',
				            delay: 3000,
				            mouse_reset: false,
				            hide: true
				        });
					}
				}
			},
		error :
			function(return_data){
				console.log(return_data.responseText);
			}
	});
}

function f_delete(id_pk){
	var lv_url = '/admin/master/provinsi/nontactive_data';
	var lv_loader_id = 'loader';
	var lobj_data = {
		ajx_pk : id_pk
	};
	swal({
	  title: "Apakah Anda yakin?",
	  text: "Menonaktifkan provinsi ini",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	   	$.ajax({
			url : $('#hdn_site_url').val() + lv_url,
			type : 'post',
			dataType : 'json',
			data : lobj_data,
	        cache: false,
			beforeSend :
				function(){
					$('#' + lv_loader_id).show();
				},
			complete :
				function(){
					$('#' + lv_loader_id).hide();
				},
			success : 
				function(return_data){
					if(return_data.response == 'expired')
					{
						location.reload();
					}
					else
					{
						if(return_data.response == 'true')
						{
							table.draw();
						
							new PNotify({
					            title: 'Berhasil',
					            text: return_data.message,
					            type: 'success',
					            styling: 'bootstrap3',
					            delay: 3000,
					            mouse_reset: false,
					            hide: true
					        });
					        swal({
							  title: "Berhasil!",
							  text: return_data.message,
							  icon: "success",
							  timer: 1500,
						      showConfirmButton: false
							});
						}
						else
						{
							new PNotify({
					            title: 'Gagal',
					            text: return_data.message,
					            type: 'error',
					            styling: 'bootstrap3',
					            delay: 3000,
					            mouse_reset: false,
					            hide: true
					        });
						}
					}
				},
			error :
				function(return_data){
					console.log(return_data.responseText);
				}
		});
	  } else {
	    return;
	  }
	});
}

/*----------------------------------------------------------------------*
* F_RESET_FORM
*-----------------------------------------------------------------------*
* Reset element within form
*----------------------------------------------------------------------*/
function f_reset_form(lv_form_id, is_validation_run)
{
	$('#' + lv_form_id).find("input[type=file]").val("");
	$('#' + lv_form_id).find("input[type=date]").val("");
	$('#' + lv_form_id).find("input[type=password]").val("");
	$('#' + lv_form_id).find("input[type=number]").val("");
	//$('#' + lv_form_id).find("input[type=checkbox]").prop('checked', false);
	$('#' + lv_form_id).find("#select2 select").val(null).trigger('change');
	$('#' + lv_form_id).find("input[type=radio]").prop('checked', false);
	$('#' + lv_form_id).find("span.remarks").html('');
	$('#' + lv_form_id).find("input").removeAttr('disabled');
	$('#' + lv_form_id).find("input[type=text], select, textarea").not(":disabled").val("");
	$('#' + lv_form_id).find("div[class*=message]").hide();
	//$('#' + lv_form_id).find("input[class*=tagsinput]").tagsinput('removeAll');
	$('#' + lv_form_id).find("input[type=email]").val("");
	
	// if(is_validation_run == true)
	// 	$('#' + lv_form_id).parsley().reset();
}

function tingkatChange(){
	  tingkat_kelas = $('#tingkat_murid').val();
      var juknis = '&tingkat_kelas='+ tingkat_kelas;
      var lv_url = '/k_siswa/siswa/get_kelas_tingkat';
      $.ajax({
          type: "POST",
          url:  $('#hdn_site_url').val() + lv_url,
          data: juknis,
          cache: false,
          dataType:'json',
          beforeSend: function()
          {
            
          },          //expect html to be returned
          success: function(data){
          	console.log(data);
              var id, nama, option;
              $('#id_kelas').html('<option value="0">-- Pilih Kelas --</option>');
              for(var i=0; i< data.length;i++){
                id = data[i]['id_kelas'];
                nama = data[i]['nama_kelas'];
                option = '<option value="'+id+'">'+nama+'</option>';  
                $('#id_kelas').append(option);
              }
            
              
            
          }
      });
 }
