<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {
	private $tbl_main 		= 'ms_kecamatan';

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('basic_model', 'bm');
		$this->load->model('login_model', 'lm');
	}


	function get_api($id_kabupaten){
		$where = array('id_kabupaten' => $id_kabupaten);
		$data_kecamatan = $this->bm->select_where_array('ms_kecamatan', $where)->result();
		$arr_kecamatan = null; $i=0;
		foreach ($data_kecamatan as $key => $value) {
			$arr_kecamatan[$i]['id'] = $value->id;
			$arr_kecamatan[$i]['nama'] = $value->nama_kecamatan;
			$i++;
		}
		echo json_encode($arr_kecamatan);
	}
	
}
