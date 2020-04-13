<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {
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
		if($kode_role == 2 || $kode_role == 3){
			show_404();
		}
	}


	function input_penilaian($kdjenjang = null, $kdlomba = null){
		$kode_role = $this->session->userdata('role');
		$nmjenjang = '';
		$peserta = array();
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username'),
			'role' => $kode_role
		);
		$where = array(
			'tahun' => tahun_lomba,
		);
		if($kdlomba != null){
			$where['id_lomba'] = $kdlomba;
		}
		if($kdjenjang != null ){
			$where['id_jenjang'] = $kdjenjang;
			$nmjenjang = $this->bm->select_where('ms_jenjang', 'id', $kdjenjang)->row()->nmjenjang;
		}

		if($kode_role == 2 || $kode_role == 3){
			show_404();
		}

		$kegiatan = $this->bm->select_where_array_order('tr_kegiatan', $where, 'id_lomba asc, created_at desc')->result();
		$kejuaraan = $this->bm->select_all('ms_juara');
		$array_kegiatan[''] = 'Pilih Mata Lomba';
		foreach ($kegiatan as $key => $value) {
			$array_kegiatan[$value->id] = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->nmlomba;
		}
		
		if($kdjenjang != null){
			$array_jenjang[$kdjenjang] = $this->bm->select_where('ms_jenjang', 'id', $kdjenjang)->row()->nmjenjang;	
		}
		else{
			$array_jenjang[''] = 'Pilih Jenjang';
			foreach ($this->bm->select_all('ms_jenjang') as $key => $value) {
				$array_jenjang[$value->id] = $value->nmjenjang; 
			}
		}
		$data['id_jenjang'] = $kdjenjang;
		$data['kegiatan'] = $array_kegiatan;
		$data['nmjenjang'] = $nmjenjang;
		$data['jenjang'] = $array_jenjang;
		$data['kejuaraan'] = $kejuaraan;
		$data['title'] 		= "Input Nilai";
		$data['content'] 	= $this->load->view('admin/penilaian/vw_input_penilaian',$data,true);
		if($kdjenjang == 3){
			$data['content'] 	= $this->load->view('admin/penilaian/vw_input_penilaian_sma',$data,true);
		}
		$this->load->view('master_page',$data);
	}

	function input_penegak($kdlomba = null){
		$kdjenjang = 3;
		$kode_role = $this->session->userdata('role');
		$nmjenjang = '';
		$peserta = array();
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username'),
			'role' => $kode_role
		);
		$where = array(
			'tahun' => tahun_lomba,
		);
		if($kdlomba != null){
			$where['id_lomba'] = $kdlomba;
		}
		if($kdjenjang != null ){
			$where['id_jenjang'] = $kdjenjang;
			$nmjenjang = $this->bm->select_where('ms_jenjang', 'id', $kdjenjang)->row()->nmjenjang;
		}

		if($kode_role == 2 || $kode_role == 3){
			show_404();
		}

		$kegiatan = $this->bm->select_where_array_order('tr_kegiatan', $where, 'id_lomba asc, created_at desc')->result();
		$kejuaraan = $this->bm->select_all('ms_juara');
		$array_kegiatan[''] = 'Pilih Mata Lomba';
		foreach ($kegiatan as $key => $value) {
			$array_kegiatan[$value->id] = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->nmlomba;
		}
		
		if($kdjenjang != null){
			$array_jenjang[$kdjenjang] = $this->bm->select_where('ms_jenjang', 'id', $kdjenjang)->row()->nmjenjang;	
		}
		else{
			$array_jenjang[''] = 'Pilih Jenjang';
			foreach ($this->bm->select_all('ms_jenjang') as $key => $value) {
				$array_jenjang[$value->id] = $value->nmjenjang; 
			}
		}
		$data['id_jenjang'] = $kdjenjang;
		$data['kegiatan'] = $array_kegiatan;
		$data['nmjenjang'] = $nmjenjang;
		$data['jenjang'] = $array_jenjang;
		$data['kejuaraan'] = $kejuaraan;
		$data['title'] 	= "Input Nilai";
		$data['content'] = $this->load->view('admin/penilaian/vw_input_penilaian_sma',$data,true);
		$this->load->view('master_page',$data);
	}

	public function get_peserta($id_kegiatan, $id_jenjang, $id_jenis_regu){
		$data = $this->bm->select_where_array('tr_pendaftaran', array('status' => 1, 'id_kegiatan' => $id_kegiatan, 'jenis_regu' => $id_jenis_regu))->result();
		$where_putra = array(
			'id_kegiatan' => $id_kegiatan,
			'id_jenjang' => $id_jenjang,
			'jenis_regu' => 1,
			'status' => 1
		);

		$where_putri = array(
			'id_kegiatan' => $id_kegiatan,
			'id_jenjang' => $id_jenjang,
			'jenis_regu' => 2,
			'status' => 1
		);

		$where_campuran = array(
			'id_kegiatan' => $id_kegiatan,
			'id_jenjang' => $id_jenjang,
			'jenis_regu' => 3,
			'status' => 1
		);

		$juara_putra = $this->bm->select_where_array_order('tr_hasil_kejuaraan', $where_putra, 'juara asc')->result();

		$juara_putri = $this->bm->select_where_array_order('tr_hasil_kejuaraan', $where_putri, 'juara asc')->result();

		
		$juara_campuran = $this->bm->select_where_array_order('tr_hasil_kejuaraan', $where_campuran, 'juara asc')->result();


		$array_data_putra = array();
		$array_data_putri = array();
		$array_data_campuran = array();
		if($juara_putra && $juara_putri){
			foreach ($juara_putra as $key => $value) {
				$array_data_putra[$key]['id'] = $value->id;
				$array_data_putra[$key]['id_pendaftaran'] = $value->id_pendaftaran;
			}
			foreach ($juara_putri as $key => $value) {
				$array_data_putri[$key]['id'] = $value->id;
				$array_data_putri[$key]['id_pendaftaran'] = $value->id_pendaftaran;
			}
		}

		if($juara_campuran){
			foreach ($juara_campuran as $key => $value) {
				$array_data_campuran[$key]['id'] = $value->id;
				$array_data_campuran[$key]['id_pendaftaran'] = $value->id_pendaftaran;
			}
		}
		
		$i =0;
		if($data){
			foreach ($data as $key => $value) {
				$value->peserta = str_pad($value->nomor_peserta, 4, '0', STR_PAD_LEFT) . ' - ' . $this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row()->nmsekolah;
				if($this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row()->id_jenjang == $id_jenjang){
					$array_data[$i]['id'] = $value->id;
					$array_data[$i]['peserta'] = $value->peserta;
					$i++;
				}
			}
			$data = array(
				'status' => 'success',
				'message' => 'data ditemukan',
				'data' => $array_data,
				'juara_putra' => $array_data_putra,
				'juara_putri' => $array_data_putri,
				'juara_campuran' => $array_data_campuran
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

	public function get_peserta_sma($id_kegiatan, $id_jenjang, $id_jenis_regu, $id_kategori = 0 , $id_sub_kategori = 0){
		$data = $this->bm->select_where_array('tr_pendaftaran', array('status' => 1, 'id_kegiatan' => $id_kegiatan, 'jenis_regu' => $id_jenis_regu))->result();
		$where_putra = array(
			'id_kegiatan' => $id_kegiatan,
			// 'id_jenjang' => $id_jenjang,
			'jenis_regu' => 1,
			'status' => 1
		);

		$where_putri = array(
			'id_kegiatan' => $id_kegiatan,
			// 'id_jenjang' => $id_jenjang,
			'jenis_regu' => 2,
			'status' => 1
		);

		$where_campuran = array(
			'id_kegiatan' => $id_kegiatan,
			// 'id_jenjang' => $id_jenjang,
			'jenis_regu' => 3,
			'status' => 1
		);

		if($id_kategori){
			$where_putra['id_kategori'] = $id_kategori;
			$where_putri['id_kategori'] = $id_kategori;
			$where_campuran['id_kategori'] = $id_kategori;
		}
		if($id_sub_kategori){
			$where_putra['id_sub_kategori'] = $id_sub_kategori;
			$where_putri['id_kategori'] = $id_kategori;
			$where_campuran['id_kategori'] = $id_kategori;
		}

		$juara_putra = $this->bm->select_where_array_order('tr_hasil_kejuaraan_sma', $where_putra, 'juara asc')->result();

		$juara_putri = $this->bm->select_where_array_order('tr_hasil_kejuaraan_sma', $where_putri, 'juara asc')->result();

		$juara_campuran = $this->bm->select_where_array_order('tr_hasil_kejuaraan_sma', $where_campuran, 'juara asc')->result();


		$array_data_putra = array();
		$array_data_putri = array();
		$array_data_campuran = array();
		if($juara_putra && $juara_putri){
			foreach ($juara_putra as $key => $value) {
				$array_data_putra[$key]['id'] = $value->id;
				$array_data_putra[$key]['id_pendaftaran'] = $value->id_pendaftaran;
			}
			foreach ($juara_putri as $key => $value) {
				$array_data_putri[$key]['id'] = $value->id;
				$array_data_putri[$key]['id_pendaftaran'] = $value->id_pendaftaran;
			}
		}

		if($juara_campuran){
			foreach ($juara_campuran as $key => $value) {
				$array_data_campuran[$key]['id'] = $value->id;
				$array_data_campuran[$key]['id_pendaftaran'] = $value->id_pendaftaran;
			}
		}
		
		$i =0;
		if($data){
			foreach ($data as $key => $value) {
				$value->peserta = str_pad($value->nomor_peserta, 4, '0', STR_PAD_LEFT) . ' - ' . $this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row()->nmsekolah;
				if($this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row()->id_jenjang == $id_jenjang){
					$array_data[$i]['id'] = $value->id;
					$array_data[$i]['peserta'] = $value->peserta;
					$i++;
				}
			}
			$data = array(
				'status' => 'success',
				'message' => 'data ditemukan',
				'data' => $array_data,
				'juara_putra' => $array_data_putra,
				'juara_putri' => $array_data_putri,
				'juara_campuran' => $array_data_campuran
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


	public function get_api_sma($idlomba){
		$kategori = $this->bm->select_where('ms_kategori_juara', 'id_kegiatan', $idlomba)->result();
		$data =[];
		$i=0;
		foreach ($kategori as $key => $value) {
			$data[$i]['id'] = $value->id_kategori;
			$data[$i]['nama'] = $value->nmkategori;
			$data[$i]['is_campuran'] = $value->is_campuran;
			$i++;
		}
		echo json_encode($data);
	}

	public function get_kategori($id_kategori){
		echo json_encode($this->bm->select_where('ms_kategori_juara', 'id_kategori', $id_kategori)->row());
	}

	function update_klasemen_sd(){
		$where = array(
			'jenjang' => 1,
		);
		$where_sd_pa = array(
			'status' => 1,
			'id_jenjang' => 1,
			'jenis_regu' => 1
		);
		$this->bm->delete_where_array('tr_klasemen', $where);
		$hasil_kejuaraan_sd_pa = $this->bm->select_where_array('tr_hasil_kejuaraan', $where_sd_pa)->result();
		$sql = "SELECT * FROM `tr_hasil_kejuaraan` where status =1 and jenis_regu = 1 and id_jenjang = 1 GROUP BY id_sekolah";
		$sekolah_sd_pa = $this->db->query($sql)->result();
		foreach ($sekolah_sd_pa as $key => $value) {
			$emas = 0;
			$perak = 0;
			$perunggu = 0;
			$poin = 0;
			foreach ($hasil_kejuaraan_sd_pa as $key2 => $value2) {
				if($value->id_sekolah == $value2->id_sekolah){
					if($value2->juara == 1){
						$emas++;
						$poin+=$value2->poin;
					}
					if($value2->juara == 2){
						$perak++;
						$poin+=$value2->poin;
					}
					if($value2->juara == 3){
						$perunggu++;
						$poin+=$value2->poin;
					}
				}
			}
			$data = array(
				'id_sekolah' => $value->id_sekolah,
				'nmsekolah' => $this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row()->nmsekolah,
				'jenis_regu' => 1,
				'emas' => $emas,
				'perak' => $perak,
				'jenjang' => 1,
				'perunggu' => $perunggu,
				'poin' => $poin,
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->session->userdata('username'),
			);
			$id_hasil_juara_putra = $this->bm->insert_all('tr_klasemen', $data);
		}
		$where_sd_pi = array(
			'status' => 1,
			'id_jenjang' => 1,
			'jenis_regu' => 2
		);
		$hasil_kejuaraan_sd_pi = $this->bm->select_where_array('tr_hasil_kejuaraan', $where_sd_pi)->result();
		$sql = "SELECT * FROM `tr_hasil_kejuaraan` where status =1 and jenis_regu = 2 and id_jenjang = 1 GROUP BY id_sekolah";
		$sekolah_sd_pi = $this->db->query($sql)->result();
		foreach ($sekolah_sd_pi as $key => $value) {
			$emas = 0;
			$perak = 0;
			$perunggu = 0;
			$poin = 0;
			foreach ($hasil_kejuaraan_sd_pi as $key2 => $value2) {
				if($value->id_sekolah == $value2->id_sekolah){
					if($value2->juara == 1){
						$emas++;
						$poin+=$value2->poin;
					}
					if($value2->juara == 2){
						$perak++;
						$poin+=$value2->poin;
					}
					if($value2->juara == 3){
						$perunggu++;
						$poin+=$value2->poin;
					}
				}
			}
			$data = array(
				'id_sekolah' => $value->id_sekolah,
				'nmsekolah' => $this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row()->nmsekolah,
				'jenis_regu' => 2,
				'emas' => $emas,
				'perak' => $perak,
				'jenjang' => 1,
				'perunggu' => $perunggu,
				'poin' => $poin,
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->session->userdata('username'),
			);
			$id_hasil_juara_putri = $this->bm->insert_all('tr_klasemen', $data);
		}
	}

	function update_klasemen_smp(){
		$where = array(
			'jenjang' => 2,
		);
		$where_sd_pa = array(
			'status' => 1,
			'id_jenjang' => 2,
			'jenis_regu' => 1
		);
		$this->bm->delete_where_array('tr_klasemen', $where);
		$hasil_kejuaraan_sd_pa = $this->bm->select_where_array('tr_hasil_kejuaraan', $where_sd_pa)->result();
		$sql = "SELECT * FROM `tr_hasil_kejuaraan` where status =1 and jenis_regu = 1 and id_jenjang = 2 GROUP BY id_sekolah";
		$sekolah_sd_pa = $this->db->query($sql)->result();
		foreach ($sekolah_sd_pa as $key => $value) {
			$emas = 0;
			$perak = 0;
			$perunggu = 0;
			$poin = 0;
			foreach ($hasil_kejuaraan_sd_pa as $key2 => $value2) {
				if($value->id_sekolah == $value2->id_sekolah){
					if($value2->juara == 1){
						$emas++;
						$poin+=$value2->poin;
					}
					if($value2->juara == 2){
						$perak++;
						$poin+=$value2->poin;
					}
					if($value2->juara == 3){
						$perunggu++;
						$poin+=$value2->poin;
					}
				}
			}
			$data = array(
				'id_sekolah' => $value->id_sekolah,
				'nmsekolah' => $this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row()->nmsekolah,
				'jenis_regu' => 1,
				'emas' => $emas,
				'perak' => $perak,
				'jenjang' => 2,
				'poin' => $poin,
				'perunggu' => $perunggu,
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->session->userdata('username'),
			);
			$id_hasil_juara_putra = $this->bm->insert_all('tr_klasemen', $data);
		}
		$where_sd_pi = array(
			'status' => 1,
			'id_jenjang' => 2,
			'jenis_regu' => 2
		);
		$hasil_kejuaraan_sd_pi = $this->bm->select_where_array('tr_hasil_kejuaraan', $where_sd_pi)->result();
		$sql = "SELECT * FROM `tr_hasil_kejuaraan` where status =1 and jenis_regu = 2 and id_jenjang = 2  GROUP BY id_sekolah";
		$sekolah_sd_pi = $this->db->query($sql)->result();
		foreach ($sekolah_sd_pi as $key => $value) {
			$emas = 0;
			$perak = 0;
			$perunggu = 0;
			$poin = 0;
			foreach ($hasil_kejuaraan_sd_pi as $key2 => $value2) {
				if($value->id_sekolah == $value2->id_sekolah){
					if($value2->juara == 1){
						$emas++;
						$poin+=$value2->poin;
					}
					if($value2->juara == 2){
						$perak++;
						$poin+=$value2->poin;
					}
					if($value2->juara == 3){
						$perunggu++;
						$poin+=$value2->poin;
					}
				}
			}
			$data = array(
				'id_sekolah' => $value->id_sekolah,
				'nmsekolah' => $this->bm->select_where('ms_sekolah', 'id', $value->id_sekolah)->row()->nmsekolah,
				'jenis_regu' => 2,
				'emas' => $emas,
				'perak' => $perak,
				'jenjang' => 2,
				'poin' => $poin,
				'perunggu' => $perunggu,
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->session->userdata('username'),
			);
			$id_hasil_juara_putri = $this->bm->insert_all('tr_klasemen', $data);
		}
	}

	public function post_juara(){
		$today = date('Y-m-d H:i:s');
		$post_data = $this->input->post();
		$juara_putra = $post_data['putra'];
		$juara_putri = $post_data['putri'];
		if(isset($post_data['campuran'])){
			$juara_campuran = $post_data['campuran'];
		}
		$jenjang = $post_data['jenjang'];
		$lomba = $post_data['lomba'];
		if($id_kegiatan != 19){
			if(count(array_unique($juara_putra)) < 5 || count(array_unique($juara_putri)) < 5){
				$this->session->set_flashdata('status', 2);
				// redirect('admin/penilaian/input_penilaian/'.$jenjang);
			}
		}
		$kegiatan = $this->bm->select_where('tr_kegiatan', 'id', $lomba)->row();
		$where = array(
			'id_kegiatan' => $kegiatan->id,
			'id_jenjang' => $jenjang,
		);
		$check_juara = $this->bm->select_where_array('tr_hasil_kejuaraan', $where )->result();
		if($check_juara){
			$data = array(
				'status' => 0
			);
			$this->bm->update_where_array('tr_hasil_kejuaraan', $data, $where);
		}
		
		if($kegiatan->id != 19){
			foreach ($juara_putra as $key => $value) {
				$juara = $key+1;
				$poin_juara = $this->bm->select_where('ms_juara', 'id', $juara)->row()->poin;
				$pendaftar_putra = $this->bm->select_where('tr_pendaftaran','id', $juara_putra[$key])->row();
				$data_hasil_putra = array(
					'id_kegiatan' => $kegiatan->id,
					'id_jenjang' => $jenjang,
					'jenis_regu' => 1,
					'id_pendaftaran' => $juara_putra[$key],
					'id_sekolah' => $pendaftar_putra->id_sekolah,
					'juara' => $juara ,
					'poin' => $poin_juara,
					'created_at' => $today,
					'updated_at' => $today,
					'created_by' => $this->session->userdata('username'),
					'updated_by' => $this->session->userdata('username')
				);
				$id_hasil_juara = $this->bm->insert_all('tr_hasil_kejuaraan', $data_hasil_putra);

				$pendaftar_putri = $this->bm->select_where('tr_pendaftaran', 'id', $juara_putri[$key])->row();
				$data_hasil_putri = array(
					'id_kegiatan' => $kegiatan->id,
					'id_jenjang' => $jenjang,
					'jenis_regu' => 2,
					'id_pendaftaran' => $juara_putri[$key],
					'id_sekolah' => $pendaftar_putri->id_sekolah,
					'juara' => $juara ,
					'poin' => $poin_juara,
					'created_at' => $today,
					'updated_at' => $today,
					'created_by' => $this->session->userdata('username'),
					'updated_by' => $this->session->userdata('username')
				);
				$id_hasil_juara_putri = $this->bm->insert_all('tr_hasil_kejuaraan', $data_hasil_putri);
			}
		}
		else{
			foreach ($juara_campuran as $key => $value) {
				$juara = $key+1;
				$poin_juara = $this->bm->select_where('ms_juara', 'id', $juara)->row()->poin;
				$pendaftar_putra = $this->bm->select_where('tr_pendaftaran','id', $juara_campuran[$key])->row();
				$data_hasil_putra = array(
					'id_kegiatan' => $kegiatan->id,
					'id_jenjang' => $jenjang,
					'jenis_regu' => 3,
					'id_pendaftaran' => $juara_campuran[$key],
					'id_sekolah' => $pendaftar_putra->id_sekolah,
					'juara' => $juara ,
					'poin' => $poin_juara,
					'created_at' => $today,
					'updated_at' => $today,
					'created_by' => $this->session->userdata('username'),
					'updated_by' => $this->session->userdata('username')
				);
				$id_hasil_juara = $this->bm->insert_all('tr_hasil_kejuaraan', $data_hasil_putra);
			}
		}
		if($jenjang == 1){
			$this->update_klasemen_sd();
		}
		elseif($jenjang == 2){
			$this->update_klasemen_smp();
		}
		$this->session->set_flashdata('status', 3);
		redirect('admin/penilaian/input_penilaian/'.$jenjang);
	}

	public function post_juara_sma(){
		$today = date('Y-m-d H:i:s');
		$post_data = $this->input->post();
		$juara_putra = $post_data['putra'];
		$juara_putri = $post_data['putri'];
		if(isset($post_data['campuran'])){
			$juara_campuran = $post_data['campuran'];
		}
		$jenjang = $post_data['jenjang'];
		$lomba = $post_data['lomba'];
		$kategori = $post_data['kategori'];
		$kategori_obj = $this->bm->select_where('ms_kategori_juara', 'id_kategori', $kategori)->row();
		if($kategori_obj->is_campuran){
			if(count(array_unique($juara_campuran)) < 3){
				$this->session->set_flashdata('status', 2);
				// redirect('admin/penilaian/input_penilaian/'.$jenjang);
			}
		}
		else{
			if(count(array_unique($juara_putra)) < 3 || count(array_unique($juara_putri)) < 3){
				$this->session->set_flashdata('status', 2);
				// redirect('admin/penilaian/input_penilaian/'.$jenjang);
			}
		}

		$kegiatan = $this->bm->select_where('tr_kegiatan', 'id', $lomba)->row();
		$where = array(
			'id_kategori' => $kategori_obj->id_kategori,
		);
		$check_juara = $this->bm->select_where_array('tr_hasil_kejuaraan_sma', $where )->result();
		if($check_juara){
			$data = array(
				'status' => 0
			);
			$this->bm->update_where_array('tr_hasil_kejuaraan_sma', $data, $where);
		}
		if($kategori_obj->is_campuran == 0){
			foreach ($juara_putra as $key => $value) {
				$juara = $key+1;
				$poin_juara = $this->bm->select_where('ms_juara', 'id', $juara)->row()->poin;
				$pendaftar_putra = $this->bm->select_where('tr_pendaftaran','id', $juara_putra[$key])->row();
				$data_hasil_putra = array(
					'id_kategori' => $kategori_obj->id_kategori,
					'id_sub_kategori' => $jenjang,
					'juara' => $juara ,
					'jenis_regu' => 1,
					'id_pendaftaran' => $juara_putra[$key],
					'id_sekolah' => $pendaftar_putra->id_sekolah,
					'id_kegiatan' => $kegiatan->id,
					'created_at' => $today,
					'updated_at' => $today,
					'created_by' => $this->session->userdata('username'),
					'updated_by' => $this->session->userdata('username')
				);
				$id_hasil_juara = $this->bm->insert_all('tr_hasil_kejuaraan_sma', $data_hasil_putra);

				$pendaftar_putri = $this->bm->select_where('tr_pendaftaran', 'id', $juara_putri[$key])->row();
				$data_hasil_putri = array(
					'id_kategori' => $kategori_obj->id_kategori,
					'id_sub_kategori' => $jenjang,
					'juara' => $juara ,
					'jenis_regu' => 2,
					'id_pendaftaran' => $juara_putri[$key],
					'id_sekolah' => $pendaftar_putri->id_sekolah,
					'id_kegiatan' => $kegiatan->id,
					'created_at' => $today,
					'updated_at' => $today,
					'created_by' => $this->session->userdata('username'),
					'updated_by' => $this->session->userdata('username')
				);
				$id_hasil_juara_putri = $this->bm->insert_all('tr_hasil_kejuaraan_sma', $data_hasil_putri);
			}
			$this->session->set_flashdata('status', 3);
		}
		else{
			foreach ($juara_campuran as $key => $value) {
				$juara = $key+1;
				$poin_juara = $this->bm->select_where('ms_juara', 'id', $juara)->row()->poin;
				$pendaftar_putra = $this->bm->select_where('tr_pendaftaran','id', $juara_campuran[$key])->row();
				$data_hasil_putra = array(
					'id_kategori' => $kategori_obj->id_kategori,
					'id_sub_kategori' => $jenjang,
					'juara' => $juara ,
					'jenis_regu' => 3,
					'id_pendaftaran' => $juara_campuran[$key],
					'id_sekolah' => $pendaftar_putra->id_sekolah,
					'id_kegiatan' => $kegiatan->id,
					'created_at' => $today,
					'updated_at' => $today,
					'created_by' => $this->session->userdata('username'),
					'updated_by' => $this->session->userdata('username')
				);
				$id_hasil_juara = $this->bm->insert_all('tr_hasil_kejuaraan_sma', $data_hasil_putra);
			}
			$this->session->set_flashdata('status', 3);
		}
		redirect('admin/penilaian/input_penegak/');
	}

	

}
