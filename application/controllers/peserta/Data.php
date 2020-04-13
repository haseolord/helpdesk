<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('form');
		$this->load->model('basic_model', 'bm');
		$this->load->model('login_model', 'lm');
		$this->cek_session();
	}

	function cek_session(){
		$kode_role = $this->session->userdata('role');
		if($kode_role == '')
		{
			redirect('login/login_ulang');
		}
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);
		$pembayaran = $this->bm->select_where('tr_pembayaran', 'kdpembayaran', $data['username'])->row();
		$where = array(
			'status' => 1,
			'id_pembayaran' => $pembayaran->id
		);

		$pendaftaran = $this->bm->select_where_array_order('tr_pendaftaran', $where, 'created_at desc')->result();
		foreach ($pendaftaran as $key => $value) {
			$sekolah = $this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row();
			$value->nmsekolah = $sekolah->nmsekolah;
			$value->kategori = $this->bm->select_where('ms_jenis_regu', 'id', $value->jenis_regu)->row()->jenis_regu;
			$nmsekolah = $value->nmsekolah;
			$peserta = $this->bm->select_where('tr_peserta', 'id_pendaftaran', $value->id)->row();
			$kegiatan = $this->bm->select_where('tr_kegiatan', 'id', $value->id_kegiatan)->row();
			$value->nmlomba = $this->bm->select_where('ms_lomba', 'id', $kegiatan->id_lomba)->row()->nmlomba;
			$value->jumlah_peserta = $kegiatan->jmlpeserta;
			$value->nomor_peserta = str_pad($value->nomor_peserta, 4, '0', STR_PAD_LEFT);
			if($peserta){
				$value->aksi = '<button class="btn btn-xs btn-default" style="margin-right:5px;" data-toggle="modal" data-target="#modal-edit-data" onclick="edit_data('.$value->id.')"><span class="glyphicon glyphicon-edit"></span> Edit</buton><button class="btn btn-xs btn-info m-l-5" data-toggle="modal" data-target="#modal-view-data" onclick="view_data('.$value->id.')"><span class="glyphicon glyphicon-eye-open"></span> Lihat</buton>';
			}
			else{
				$value->aksi = '<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-add-data" onclick="add_data('.$value->id.')"><span class="glyphicon glyphicon-edit"></span> Lengkapi Data</buton>';
			}
		}
		$data['pendaftaran'] = $pendaftaran;
		$data['nmsekolah'] = $nmsekolah;
		$data['title'] 		= "List Pendaftaran";
		$data['content'] 	= $this->load->view('peserta/vw_data',$data,true);
		$this->load->view('master_page',$data);
	}

	public function get_list(){
		$post_data = $this->input->post();
		$where = "WHERE role = 2";
		if(isset($post_data['kdpembayaran'])){
			$where.=' and ms_user.username like "%'.$post_data['kdpembayaran'].'%"';
		}
		if(isset($post_data['id_jenjang'])){
			$id_jenjang = $post_data['id_jenjang'];
			if($id_jenjang != 0){
				if($where != ""){
					$where.= ' '. 'AND ms_sekolah.id_jenjang = '.$post_data['id_jenjang'];
				}
				else{
					$where= 'where ms_sekolah.id_jenjang = '.$post_data['id_jenjang'];
				}
			}
		}
		if(isset($post_data['nmsekolah'])){
			if($where != ""){
				$where.= ' AND ms_sekolah.nmsekolah like "%'.$post_data['nmsekolah'].'%"';
			}
			else{
				$where= 'where ms_sekolah.nmsekolah like %"'.$post_data['nmsekolah'].'%"';
			}
		}
		$sql = "SELECT * FROM `ms_user`
					LEFT JOIN ms_sekolah ON ms_user.id_sekolah = ms_sekolah.id ".$where."
					GROUP BY ms_user.username
					ORDER BY created_at DESC
					";
		$data = $this->db->query($sql)->result();
		if($data){
			$data = array(
				'status' => 'success',
				'message' => 'data ditemukan',
				'data' => $data
			);
		}	
		else{
			$data = array(
				'status' => 'error',
				'message' => 'data tidak ditemukan',
				'data' => '',
			);
		}
		echo json_encode($data);
	}

	public function get_pendaftaran($id){
		$pendaftaran = $this->bm->select_where('tr_pendaftaran', 'id', $id)->row();
		$kegiatan = $this->bm->select_where('tr_kegiatan', 'id', $pendaftaran->id_kegiatan)->row();
		$lomba = $this->bm->select_where('ms_lomba', 'id', $kegiatan->id_lomba)->row();
		$data['nmlomba'] = $lomba->nmlomba;
		$data['jumlah_peserta'] = $kegiatan->jmlpeserta;
		$data['nomor_peserta'] = str_pad($pendaftaran->id, 4, '0', STR_PAD_LEFT);
		$data['jenjang'] = $this->bm->select_where('ms_jenjang', 'id', $kegiatan->id_jenjang)->row()->nmjenjang;
		$data['jenis_regu'] = $this->bm->select_where('ms_jenis_regu', 'id', $pendaftaran->jenis_regu)->row()->jenis_regu;
		$data['pendaftaran'] = $pendaftaran;
		if($data){
			$data = array(
				'status' => 100,
				'message' => 'success',
				'data' => $data
			);
		}
		else{
			$data = array(
				'status' => 100,
				'message' => 'success',
				'data' => ''
			);
		}
		echo json_encode($data);
	}

	public function post_peserta(){
		$data_user = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);
		$today = date('Y-m-d H:i:s');
		$id_pendaftaran = $this->input->post('id_pendaftaran');
		$nama_peserta = $this->input->post('nama_peserta');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		foreach ($nama_peserta as $key => $value) {
			$data = array(
				'id_pendaftaran' => $id_pendaftaran,
				'nmpeserta' => $value,
				'tanggal_lahir' => $tanggal_lahir[$key],
				'created_by' => $data_user['username'],
				'created_at' => $today,
			);
			$user = $this->bm->insert_all('tr_peserta', $data);
		}
		if($this->session->userdata('role') == 2){
			$this->session->set_flashdata('status', 1);
			redirect('peserta/data');
		}
		else{
			$this->session->set_flashdata('status', 1);
			redirect('admin/users/peserta');
		}		
		
	}

	public function edit_peserta(){
		$data_user = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);
		$today = date('Y-m-d H:i:s');
		$id_peserta = $this->input->post('id_peserta');

		$nama_peserta = $this->input->post('nama_peserta');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		foreach ($id_peserta as $key => $value) {
			$data = array(
				'nmpeserta' => $nama_peserta[$key],
				'tanggal_lahir' => $tanggal_lahir[$key]
			);

			$update_peserta = $this->bm->update('tr_peserta', $data, 'id', $value);
		}

		if($this->session->userdata('role') == 2){
			$this->session->set_flashdata('status', 1);
			redirect('peserta/data');
		}
		else{
			$this->session->set_flashdata('status', 1);
			redirect('admin/users/peserta');
		}		
		
	}

	public function view($id){
		$today = date('Y-m-d');
		$pendaftaran = $this->bm->select_where('tr_pendaftaran', 'id', $id)->row();
		$kegiatan = $this->bm->select_where('tr_kegiatan', 'id', $pendaftaran->id_kegiatan)->row();
		$lomba = $this->bm->select_where('ms_lomba', 'id', $kegiatan->id_lomba)->row();
		$peserta = $this->bm->select_where('tr_peserta', 'id_pendaftaran', $id)->result();
		foreach ($peserta as $key => $value) {
			if($value->tanggal_lahir){
				$value->usia = $this->get_usia($value->tanggal_lahir);
			}
			else{
				$value->usia = '-';
			}
		}
		$data['nmlomba'] = $lomba->nmlomba;
		$data['jumlah_peserta'] = $kegiatan->jmlpeserta;
		$data['nomor_peserta'] = str_pad($pendaftaran->id, 4, '0', STR_PAD_LEFT);
		$data['jenjang'] = $this->bm->select_where('ms_jenjang', 'id', $kegiatan->id_jenjang)->row()->nmjenjang;
		$data['jenis_regu'] = $this->bm->select_where('ms_jenis_regu', 'id', $pendaftaran->jenis_regu)->row()->jenis_regu;
		$data['pendaftaran'] = $pendaftaran;
		$data['peserta'] = $peserta;
		if($data){
			$data = array(
				'status' => 100,
				'message' => 'success',
				'data' => $data
			);
		}
		else{
			$data = array(
				'status' => 100,
				'message' => 'success',
				'data' => ''
			);
		}
		echo json_encode($data);
	}

	private function get_usia($birthday){
		$today = date('Y-m-d');
		$date1 = strtotime($today);
		$date2 = strtotime($birthday);
		$usia = floor(($date1-$date2) / (365*60*60*24));
		if($usia < 4){
			return '-';
		}  
		return $usia;
	}



}
