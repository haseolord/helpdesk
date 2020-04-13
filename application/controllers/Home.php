<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('basic_model', 'bm');
		$this->load->model('login_model', 'lm');
		$this->cek_session();
	}

	public function index()
	{
		redirect('login/');
	}

	function homepage($jenis_pekerjaan){
		$is_juara = 0;
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);
		if($jenis_pekerjaan == 'admin'){
			$data['content'] = $this->load->view('admin/home', $data,true);
		}
		elseif($jenis_pekerjaan == 'peserta'){
			$is_juara = 0;
			$pembayaran = $this->bm->select_where('tr_pembayaran', 'kdpembayaran', $data['username'])->row();
			$where = array(
				'status' => 1,
				'id_pembayaran' => $pembayaran->id
			);
			$pendaftaran = $this->bm->select_where_array_order('tr_pendaftaran', $where, 'created_at desc')->result();
			$id_jenjang = $this->bm->select_where('tr_kegiatan', 'id', $pendaftaran[0]->id_kegiatan)->row()->id_jenjang;
			if($id_jenjang == 3){
				$sql = "SELECT * FROM `tr_hasil_kejuaraan_sma`
						LEFT JOIN tr_pendaftaran ON tr_hasil_kejuaraan_sma.id_pendaftaran = tr_pendaftaran.id 
						LEFT JOIN tr_kegiatan ON tr_kegiatan.id = tr_hasil_kejuaraan_sma.id_kegiatan
						where tr_hasil_kejuaraan_sma.status = 1 and id_pembayaran=". $pembayaran->id ;
				$pendaftaran =  $this->db->query($sql)->result();
				if($pendaftaran){
					foreach ($pendaftaran as $key => $value) {
						$sekolah = $this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row();
						$value->nmsekolah = $sekolah->nmsekolah;
						$value->regu = $this->bm->select_where('ms_jenis_regu', 'id', $value->jenis_regu)->row()->jenis_regu;
						$nmsekolah = $value->nmsekolah;
						$peserta = $this->bm->select_where('tr_peserta', 'id_pendaftaran', $value->id)->row();
						$kegiatan = $this->bm->select_where('tr_kegiatan', 'id', $value->id_kegiatan)->row();
						$value->nmlomba = $this->bm->select_where('ms_lomba', 'id', $kegiatan->id_lomba)->row()->nmlomba;
						$value->jumlah_peserta = $kegiatan->jmlpeserta;
						$value->nomor_peserta = str_pad($value->nomor_peserta, 4, '0', STR_PAD_LEFT);
						$where_juara =  array('id_pendaftaran' =>  $value->id, 'status' => 1);
						$value->nmkategori = $this->bm->select_where('ms_kategori_juara', 'id_kategori', $value->id_kategori)->row()->nmkategori;

					}
					$is_juara =1;
				}
			}
			else{
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
					$where_juara =  array('id_pendaftaran' =>  $value->id, 'status' => 1);
					$kejuaraan = $this->bm->select_where_array('tr_hasil_kejuaraan',$where_juara)->row();
					$value->juara = 0;
					if($kejuaraan){
						$is_juara=1;
						$value->juara = $kejuaraan->juara;
					}

				}
			}
			$data['pendaftaran'] = $pendaftaran;
			$data['is_juara'] = $is_juara;
			$data['id_jenjang'] = $id_jenjang;
			$data['content'] = $this->load->view('peserta/home', $data,true);
		}
		
		$this->load->view(template,$data);	

		
	}

	
	function cek_session()
		{
		$nmsekolah = $this->session->userdata('nmsekolah');
		if($nmsekolah == '')
		{
			redirect('login/login_ulang');
		}
	}
}
