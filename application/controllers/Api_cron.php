<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_cron extends CI_Controller {

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
		$this->checkListPendaftaran();
		
	}

	public function checkListPendaftaran(){
		$where = array(
			'is_paid' => 0,
			'status' => 1
		);
		$list_pendaftaran = $this->bm->select_where_array('tr_pembayaran', $where)->result();
		foreach ($list_pendaftaran as $key => $value) {
			if($this->getDiffDate($value->created_at) > 6){
				echo $value->kdpembayaran . ' - Expired<br>';
				$data = array(
					'status' => 0
				);
				$this->bm->update('tr_pembayaran', $data, 'id', $value->id);
				$this->bm->update('tr_pendaftaran', $data, 'id_pembayaran', $value->id);

			}

		}
	}

	public function getDiffDate($created_date){
		$now = time(); // or your date as well
		$created_date = strtotime($created_date);
		$datediff = $now - $created_date;
		return round($datediff / (60 * 60 * 24));
	}


	public function generateNomorPeserta(){
		$i = 1;
		$tr_pembayaran = $this->bm->select_where('tr_pembayaran', 'is_paid', 1)->result();
		foreach ($tr_pembayaran as $key => $value) {
			$where = array(
				'status' => 1,
				'id_pembayaran' => $value->id
			);
			$tr_pendaftaran = $this->bm->select_where_array('tr_pendaftaran', $where)->result();
			if($tr_pendaftaran){
				foreach ($tr_pendaftaran as $key2 => $value2) {
					$data = array(
						'nomor_peserta' => $i
					);
					$i++;
					$this->bm->update('tr_pendaftaran', $data, 'id', $value2->id);
				}
			}
		}
		echo "Berhasil generate nomor peserta";
	}
}
