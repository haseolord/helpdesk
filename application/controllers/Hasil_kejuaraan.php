<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_kejuaraan extends CI_Controller {
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
		$data['title'] = "Hasil Kejuaraan";
		// print_r($data); die();
		$data['content'] = $this->load->view('general/hasil_kejuaraan',$data);		
	}

	public function sd(){
		$sql = "SELECT * FROM `tr_klasemen` where jenjang = 1 and jenis_regu = 1 and poin > 0 ORDER BY poin desc limit 6 ";
		$juara_sd_putra = $this->db->query($sql)->result();
		$sql = "SELECT * FROM `tr_klasemen` where jenjang = 1 and jenis_regu = 2 and poin > 0 ORDER BY poin desc limit 6 ";
		$juara_sd_putri = $this->db->query($sql)->result();

		$data['juara_putra'] = $juara_sd_putra;
		$data['juara_putri'] = $juara_sd_putri;
		$data['title'] = "Hasil Kejuaraan";
		// print_r($data); die();
		$data['content'] = $this->load->view('general/hasil_kejuaraan_sd',$data);	
	}


	public function smp(){
		$sql = "SELECT * FROM `tr_klasemen` where jenjang = 2 and jenis_regu = 1 and poin > 0 ORDER BY poin desc limit 6 ";
		$juara_sd_putra = $this->db->query($sql)->result();
		$sql = "SELECT * FROM `tr_klasemen` where jenjang = 2 and jenis_regu = 2 and poin > 0 ORDER BY poin desc limit 6 ";
		$juara_sd_putri = $this->db->query($sql)->result();

		$data['juara_putra'] = $juara_sd_putra;
		$data['juara_putri'] = $juara_sd_putri;
		$data['title'] = "Hasil Kejuaraan";
		// print_r($data); die();
		$data['content'] = $this->load->view('general/hasil_kejuaraan_smp',$data);	

	}

	public function sma(){
		$kegiatan_sma = $this->bm->select_where('tr_kegiatan', 'id_jenjang', 3)->result();
		$where_lkbbt = array(
			'id_kegiatan' => 19,
			'id_jenjang' => 3,
			'jenis_regu' => 3,
			'status' => 1
		);
		// $juara_lkbbt = $this->bm->select_where_array_order('tr_hasil_kejuaraan', $where_lkbbt, 'juara asc')->result();
		$banner_lkbbt =  $this->bm->select_where('ms_lomba', 'id', 10)->row()->banner;
		foreach ($kegiatan_sma as $key => $value) {
			$value->banner = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->banner;
			$where_pa = array(
				'id_kegiatan' => $value->id,
				'id_jenjang' => 3,
				'jenis_regu' => 1,
				'status' => 1
			);
			$where_pi = array(
				'id_kegiatan' => $value->id,
				'id_jenjang' => 3,
				'jenis_regu' => 2,
				'status' => 1
			);
			$kategori_juara = $this->bm->select_where('ms_kategori_juara', 'id_kegiatan', $value->id)->result();
			$value->kategori = $kategori_juara;	
		}
		$data['kegiatan'] =  $kegiatan_sma;
		// $data['juara_lkbbt'] = $juara_lkbbt;
		$data['banner_lkbbt'] = $banner_lkbbt;
		$data['content'] = $this->load->view('general/hasil_kejuaraan_sma',$data);		

	}

	public function detail_sd(){
		$kegiatan_sd = $this->bm->select_where('tr_kegiatan', 'id_jenjang', 1)->result();
		foreach ($kegiatan_sd as $key => $value) {
			$value->banner = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->banner;
			$where_pa = array(
				'id_kegiatan' => $value->id,
				'id_jenjang' => 1,
				'jenis_regu' => 1,
				'status' => 1
			);
			$where_pi = array(
				'id_kegiatan' => $value->id,
				'id_jenjang' => 1,
				'jenis_regu' => 2,
				'status' => 1
			);
			$value->juara_putra = $this->bm->select_where_array_order('tr_hasil_kejuaraan', $where_pa, 'juara asc')->result();
			$value->juara_putri = $this->bm->select_where_array_order('tr_hasil_kejuaraan', $where_pi, 'juara asc')->result();	
		}
		$data['kegiatan'] =  $kegiatan_sd;
		$data['content'] = $this->load->view('general/detail_kejuaraan_sd',$data);	
	}

	public function detail_smp(){
		$kegiatan_sd = $this->bm->select_where('tr_kegiatan', 'id_jenjang', 2)->result();
		foreach ($kegiatan_sd as $key => $value) {
			$value->banner = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->banner;
			$where_pa = array(
				'id_kegiatan' => $value->id,
				'id_jenjang' => 2,
				'jenis_regu' => 1,
				'status' => 1
			);
			$where_pi = array(
				'id_kegiatan' => $value->id,
				'id_jenjang' => 2,
				'jenis_regu' => 2,
				'status' => 1
			);
			$value->juara_putra = $this->bm->select_where_array_order('tr_hasil_kejuaraan', $where_pa, 'juara asc')->result();
			$value->juara_putri = $this->bm->select_where_array_order('tr_hasil_kejuaraan', $where_pi, 'juara asc')->result();	
		}
		$data['kegiatan'] =  $kegiatan_sd;
		$data['content'] = $this->load->view('general/detail_kejuaraan_smp',$data);	
	}


	
}