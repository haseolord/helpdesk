<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggalang extends CI_Controller {
	private $tbl_main 		= 'tr_pendaftaran';

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('basic_model', 'bm');
		$this->load->model('login_model', 'lm');
	}

	public function index()
	{
		$this->sd();
	}

	public function sd(){
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);

		$where = array(
			'tahun' => tahun_lomba,
		);
		$data_lomba_penggalang = $this->bm->select_where_array_in('tr_kegiatan', $where,'id_jenjang', array(1))->result();
		// print_r($data_lomba_penggalang);die;
		foreach ($data_lomba_penggalang as $key => $value) {
			$value->nmlomba = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->nmlomba;
			$value->biaya = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->harga;
			$value->pendaftar_putra = $this->getPendaftar($value->id, 1);
			$value->pendaftar_putri = $this->getPendaftar($value->id, 2);
		}

		$where = array(
			'status' => 1,
			'kdkabupaten !=' => '00'
		);
		$data_kabupaten = $this->bm->select_where_array_order('ms_kabupaten', $where, 'nomor_urut asc')->result();
		$arr_kabupaten[0] = 'Pilih Kabupaten';
		foreach ($data_kabupaten as $key => $value) {
			$arr_kabupaten[$value->id] = $value->nmkabupaten;
		}

		$where = array(
			'id_jenjang' => 1
		);
		$data['jenjang'] = 'Sekolah Dasar';
		$data['arr_kabupaten'] = $arr_kabupaten;
		$data['lomba'] = $data_lomba_penggalang;
		$data['content'] = $this->load->view('pendaftaran/penggalang',$data);
	}

	public function smp(){
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);

		$where = array(
			'tahun' => tahun_lomba,
		);
		$data_lomba_penggalang = $this->bm->select_where_array_in('tr_kegiatan', $where,'id_jenjang', array(2))->result();
		// print_r($data_lomba_penggalang);die;
		foreach ($data_lomba_penggalang as $key => $value) {
			$value->nmlomba = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->nmlomba;
			$value->biaya = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->harga;
			$value->pendaftar_putra = $this->getPendaftar($value->id, 1);
			$value->pendaftar_putri = $this->getPendaftar($value->id, 2);
		}

		$where = array(
			'status' => 1,
			'kdkabupaten !=' => '00'
		);
		// $data_kabupaten = $this->bm->select_where_array('ms_kabupaten', $where)->result();
		$data_kabupaten = $this->bm->select_where_array_order('ms_kabupaten', $where, 'nomor_urut asc')->result();
		$arr_kabupaten[0] = 'Pilih Kabupaten';
		foreach ($data_kabupaten as $key => $value) {
			$arr_kabupaten[$value->id] = $value->nmkabupaten;
		}

		$where = array(
			'id_jenjang' => 1
		);
		$data['jenjang'] = 'Sekolah Menengah Pertama';
		$data['arr_kabupaten'] = $arr_kabupaten;
		$data['lomba'] = $data_lomba_penggalang;
		$data['content'] = $this->load->view('pendaftaran/penggalang_smp',$data);
	}

	public function post_sd(){
		// date_default_timezone_set('Asia/Jakarta');
		$today = date('Y-m-d H:i:s');
		$tomorrow = date('Y-m-d H:i:s',strtotime($today . "+7 days"));
		$post_data = $this->input->post();
		$regu_pa = $post_data['jumlah_regu_pa'];
		$regu_pi = $post_data['jumlah_regu_pi'];
		$where = array(
			'tahun' => tahun_lomba,
		);
		$data_lomba_penggalang = $this->bm->select_where_array_in('tr_kegiatan', $where,'id_jenjang', array(1))->result();
		$total_payment = 0;
		$total_regu = 0;
		$arr_pendaftaran = [];
		foreach ($data_lomba_penggalang as $key => $value) {
			$total_regu += $regu_pa[$key];
			$total_regu += $regu_pi[$key];
			$biaya = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->harga;
			$total_payment += ($regu_pa[$key] * $biaya);
			$total_payment += ($regu_pi[$key] * $biaya);
			if(count($regu_pa)){
				for ($i=0; $i < $regu_pa[$key] ; $i++) {
					$insert_regu_pa = array(
						'id_kegiatan' => $value->id,
						'id_sekolah' => $post_data['sekolah'],
						'jenis_regu' => 1,
						'created_at' => $today,
						'created_by' => 'User',
					);
					$id_pa = $this->bm->insert_all('tr_pendaftaran', $insert_regu_pa);
					array_push($arr_pendaftaran, $id_pa->id);
				}
			}
			if(count($regu_pi)){
				for ($i=0; $i < $regu_pi[$key] ; $i++) {
					$insert_regu_pi = array(
						'id_kegiatan' => $value->id,
						'id_sekolah' => $post_data['sekolah'],
						'jenis_regu' => 2,
						'created_at' => $today,
						'created_by' => 'User',
					);
					$id_pi = $this->bm->insert_all('tr_pendaftaran', $insert_regu_pi);
					array_push($arr_pendaftaran, $id_pi->id);
				}
			}
		}
		if($total_payment){
			$insert_payment = array(
				'is_paid' => 0,
				'kdpembayaran' => $this->getKodePembayaran(1),
				'total_pembayaran' => $total_payment,
				'total_regu' => $total_regu,
				'tanggal_kadaluarsa' => $tomorrow,
				'created_at' => $today,
				'created_by' => 'User',
			);
			$id_pembayaran = $this->bm->insert_all('tr_pembayaran', $insert_payment)->id;
			$data_update = array(
				'id_pembayaran' => $id_pembayaran
			);
			$kdpembayaran = $this->bm->select_where('tr_pembayaran', 'id', $id_pembayaran)->row()->kdpembayaran;
			$this->bm->update_where_in('tr_pendaftaran', $data_update, 'id', $arr_pendaftaran);
			redirect('pendaftaran/penggalang/sukses/'.$kdpembayaran);
		}
		$this->session->set_flashdata('status', 1);
		redirect('pendaftaran/penggalang/sd', 'refresh');

	}

	public function post_smp(){
		// date_default_timezone_set('Asia/Jakarta');
		$today = date('Y-m-d H:i:s');
		$tomorrow = date('Y-m-d H:i:s',strtotime($today . "+7 days"));
		$post_data = $this->input->post();
		$regu_pa = $post_data['jumlah_regu_pa'];
		$regu_pi = $post_data['jumlah_regu_pi'];
		$where = array(
			'tahun' => tahun_lomba,
		);
		$data_lomba_penggalang = $this->bm->select_where_array_in('tr_kegiatan', $where,'id_jenjang', array(2))->result();
		$total_payment = 0;
		$total_regu = 0;
		$arr_pendaftaran = [];
		foreach ($data_lomba_penggalang as $key => $value) {
			$total_regu += $regu_pa[$key];
			$total_regu += $regu_pi[$key];
			$biaya = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->harga;
			$total_payment += ($regu_pa[$key] * $biaya);
			$total_payment += ($regu_pi[$key] * $biaya);
			if(count($regu_pa)){
				for ($i=0; $i < $regu_pa[$key] ; $i++) {
					$insert_regu_pa = array(
						'id_kegiatan' => $value->id,
						'id_sekolah' => $post_data['sekolah'],
						'jenis_regu' => 1,
						'created_at' => $today,
						'created_by' => 'User',
					);
					$id_pa = $this->bm->insert_all('tr_pendaftaran', $insert_regu_pa);
					array_push($arr_pendaftaran, $id_pa->id);
				}
			}
			if(count($regu_pi)){
				for ($i=0; $i < $regu_pi[$key] ; $i++) {
					$insert_regu_pi = array(
						'id_kegiatan' => $value->id,
						'id_sekolah' => $post_data['sekolah'],
						'jenis_regu' => 2,
						'created_at' => $today,
						'created_by' => 'User',
					);
					$id_pi = $this->bm->insert_all('tr_pendaftaran', $insert_regu_pi);
					array_push($arr_pendaftaran, $id_pi->id);
				}
			}
		}
		if($total_payment){
			$insert_payment = array(
				'is_paid' => 0,
				'kdpembayaran' => $this->getKodePembayaran(2),
				'total_pembayaran' => $total_payment,
				'total_regu' => $total_regu,
				'tanggal_kadaluarsa' => $tomorrow,
				'created_at' => $today,
				'created_by' => 'User',
			);
			$id_pembayaran = $this->bm->insert_all('tr_pembayaran', $insert_payment)->id;
			$data_update = array(
				'id_pembayaran' => $id_pembayaran
			);
			$kdpembayaran = $this->bm->select_where('tr_pembayaran', 'id', $id_pembayaran)->row()->kdpembayaran;
			$this->bm->update_where_in('tr_pendaftaran', $data_update, 'id', $arr_pendaftaran);
			redirect('pendaftaran/penggalang/sukses/'.$kdpembayaran.'/'.'2');
		}
		$this->session->set_flashdata('status', 1);
		redirect('pendaftaran/penggalang/smp', 'refresh');

	}

	public function sukses($kdpembayaran, $jenjang = 1){
		$data['kdpembayaran'] = $kdpembayaran;
		$where = array(
			'tahun' => tahun_lomba,
		);
		$nmsekolah='';
		$nmkabupaten='';
		$nmkecamatan = '';
		$data_lomba_penggalang = $this->bm->select_where_array_in('tr_kegiatan', $where,'id_jenjang', array($jenjang))->result();
		$pembayaran = $this->bm->select_where('tr_pembayaran', 'kdpembayaran', $kdpembayaran)->row();
		$pendaftaran = $this->bm->select_where_order_all('tr_pendaftaran', 'id_pembayaran', $pembayaran->id, 'jenis_regu, id_kegiatan')->result();
		foreach ($data_lomba_penggalang as $key => $value) {
			$value->biaya = $biaya = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->harga;
			$value->nmlomba = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->nmlomba;
			$value->total_regu = 0;
			$value->total_pembayaran = 0;
			$value->description = '';
			if($pendaftaran){
				foreach ($pendaftaran as $key2 => $value2) {
					if($value->id == $value2->id_kegiatan){
						$value->total_regu++;
					}
					if($nmsekolah == ''){
						$sekolah = $this->bm->select_where('ms_sekolah', 'id', $value2->id_sekolah)->row();
						$nmsekolah =  $sekolah->nmsekolah;
						$nmkabupaten = $this->bm->select_where('ms_kabupaten', 'id', $sekolah->id_kabupaten)->row()->nmkabupaten;
						$nmkecamatan = $this->bm->select_where('ms_kecamatan', 'id', $sekolah->id_kecamatan)->row()->nama_kecamatan;
					}
				}
			}
			$value->total_pembayaran = $value->total_regu * $biaya;
		}

		$data['pembayaran'] = $pembayaran;
		$data['pendaftaran'] = $data_lomba_penggalang;
		$data['tanggal_kadaluarsa'] = $this->tgl_indo($pembayaran->tanggal_kadaluarsa);
		$data['today'] = $this->tgl_indo(date('Y-m-d'));
		$data['nmsekolah'] = ucfirst(strtolower($nmsekolah));
		$data['nmkabupaten'] = ucfirst(strtolower($nmkabupaten));
		$data['nmkecamatan'] = ucfirst(strtolower($nmkecamatan));
		$data['jenjang'] = 'Sekolah Dasar';
		$data['content'] = $this->load->view('pendaftaran/sukses',$data);
	}

	private function getKodePembayaran($jenjang){
		$kode ='';
		if($jenjang == 1){
			$kode = "GLSD";
		}
		elseif($jenjang == 2){
			$kode = "GLSP";
		}
		elseif($jenjang == 3){
			$kode = "GKSA";
		}
		$randnumber = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
		$kode .= $randnumber;
		$checknumber = $this->bm->select_where('tr_pembayaran', 'kdpembayaran', $kode)->row();
		if($checknumber){
			return $this->getKodePembayaran($jenjang);
		}
		return $kode;

	}

	function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);

		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun

		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}


	private function getPendaftar($id_kegiatan, $jenis_regu, $jenjang = null){
		$sql = "SELECT * FROM `tr_pendaftaran` 
				LEFT JOIN tr_pembayaran ON tr_pendaftaran.id_pembayaran = tr_pembayaran.id
				where tr_pembayaran.is_paid = 1 and tr_pendaftaran.status = 1  and jenis_regu = ".$jenis_regu." and id_kegiatan  = " . $id_kegiatan ;
		return count($this->db->query($sql)->result());
	}

	// public function list(){

	// }


}
