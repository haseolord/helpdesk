<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	private $tbl_main 		= 'ms_sekolah';

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('basic_model', 'bm');
		$this->load->model('login_model', 'lm');
	}


	function get_api($id_kecamatan, $jenjang = null){
		$where = array('id_kecamatan' => $id_kecamatan);
		if($jenjang){
			$where['id_jenjang'] = $jenjang;
		}
		$data_sekolah = $this->bm->select_where_array('ms_sekolah', $where)->result();
		$arr_sekolah = null; $i=0;
		foreach ($data_sekolah as $key => $value) {
			$arr_sekolah[$i]['id'] = $value->id;
			$arr_sekolah[$i]['nama'] = $value->nmsekolah;
			$i++;
		}
		echo json_encode($arr_sekolah);
	}
	
}
