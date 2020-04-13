<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	private $tbl_main 		= 'ms_provinsi';

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
		if($kode_role == 2){
			show_404();
		}
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);
		$where = array(
			'isActive' => 1,
			'role' => 2
		);

		$pendaftaran = $this->bm->select_where_array_order('ms_user', $where, 'CreatedDate desc')->result();
		foreach ($pendaftaran as $key => $value) {
			$sekolah = $this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row();
			$value->nmsekolah = $sekolah->nmsekolah;
		}
		$data['users'] = $pendaftaran;
		$data['title'] 		= "List User";
		$data['content'] 	= $this->load->view('admin/users/vw_users',$data,true);
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

	public function peserta(){
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);

		$where = array(
			'status' => 1,
		);

		$sql = "SELECT tr_pendaftaran.*, tr_pembayaran.* ,tr_pendaftaran.id as nomor FROM `tr_pendaftaran` 
				LEFT JOIN tr_pembayaran ON tr_pendaftaran.id_pembayaran = tr_pembayaran.id
				WHERE tr_pendaftaran.`status` = 1 and tr_pembayaran.is_paid = 1
				ORDER BY `id_pembayaran` asc, `id_sekolah` asc, tr_pendaftaran.id asc
					";
		$pendaftaran = $this->db->query($sql)->result();
		foreach ($pendaftaran as $key => $value) {
			$sekolah = $this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row();
			$value->nmsekolah = $sekolah->nmsekolah;
			$nmsekolah = $value->nmsekolah;
			$value->kategori = $this->bm->select_where('ms_jenis_regu', 'id', $value->jenis_regu)->row()->jenis_regu;
			$peserta = $this->bm->select_where('tr_peserta', 'id_pendaftaran', $value->nomor)->row();
			$kegiatan = $this->bm->select_where('tr_kegiatan', 'id', $value->id_kegiatan)->row();
			$value->nmlomba = $this->bm->select_where('ms_lomba', 'id', $kegiatan->id_lomba)->row()->nmlomba;
			$value->jumlah_peserta = $kegiatan->jmlpeserta;
			$value->nomor_peserta = str_pad($value->nomor_peserta, 4, '0', STR_PAD_LEFT);
			if($peserta){
				$value->aksi = '<button class="btn btn-xs btn-default" style="margin-right:5px;" data-toggle="modal" data-target="#modal-edit-data" onclick="edit_data('.$value->nomor.')"><span class="glyphicon glyphicon-edit"></span> Edit</buton><button class="btn btn-xs btn-primary m-l-5" data-toggle="modal" data-target="#modal-view-data" onclick="view_data('.$value->nomor.')"><span class="glyphicon glyphicon-eye-open"></span> Lihat</buton>';
				// print_r($peserta); die;
			}
			else{
				$value->aksi = '<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-add-data" onclick="add_data('.$value->nomor.')"><span class="glyphicon glyphicon-edit"></span> Lengkapi Data</buton>';
			}
		}
		$data['pendaftaran'] = $pendaftaran;
		$data['nmsekolah'] = $nmsekolah;
		$data['title'] 		= "List Peserta";
		$data['content'] 	= $this->load->view('admin/users/vw_peserta',$data,true);
		$this->load->view('master_page',$data);
	}

}
