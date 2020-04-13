<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {
	private $tbl_main 		= 'ms_provinsi';

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
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);
		$data['title'] 		= "Provinsi";
		$data['content'] 	= $this->load->view('admin/master/provinsi/vw_provinsi',$data,true);
		$data['javascript'] = "provinsi.js";
		$this->load->view('master_page',$data);
	}

	function cek_session()
		{
		$kode_role = $this->session->userdata('nama');
		if($kode_role == '')
		{
			redirect('login/login_ulang');
		}
	}

	/*----------------------------------------------------------------------*
	* GET_DATA
	*-----------------------------------------------------------------------*
	* Get data for main table
	*----------------------------------------------------------------------*/
	public function get_data()
	{
		date_default_timezone_set('Asia/Jakarta');
		$filter = array(
			// 'status'		=> 1,
		);

		/*$date 		= $this->input->post('ajx_anggaran_date');

		if($date != '')
			$filter['anggaranDate LIKE'] = date('Y-m', strtotime($date)).'%';*/

		$filter = (array_filter($filter,function($v){return $v != '' && $v != '%%';}));
		
		$select = ('
			id,
			kdprovinsi,
			nmprovinsi,
			status
		');

		$order_by = "status DESC";
		echo $this->get($select, false, null, $this->tbl_main, $filter, $order_by );
	}

	/*----------------------------------------------------------------------*
	* ADD_DATA
	*-----------------------------------------------------------------------*
	* Add new data
	*----------------------------------------------------------------------*/
	public function add_data($source = 'app')
	{
        $input_data = $this->input->post();

		$this->form_validation->set_rules('nmprovinsi', '', 'required');
		$this->form_validation->set_rules('kdprovinsi', '', 'required');
		
		if ($this->form_validation->run() == true)
		{
			unset($input_data['PrimaryKey']);

			date_default_timezone_set('Asia/Jakarta');
			
			$input_data['tanggal_lahir_murid']	= date('Y-m-d H:i:s', strtotime($input_data['tanggal_lahir_murid']));
			$input_data['CreatedBy']	= $this->session->userdata('username');
			$input_data['CreatedDate']	= date('Y-m-d H:i:s');
			$input_data['ModifiedBy']	= $this->session->userdata('username');
			$input_data['ModifiedDate']	= date('Y-m-d H:i:s');
			$input_data['IsActive']		= 1;
			
			$input_func = $this->bm->insert_all($this->tbl_siswa, $input_data);

			if($input_func == FALSE){
				$return['response'] = 'false';
				$return['message'] 	= 'Input gagal!';
			}else{
				$return['response'] = 'true';
				$return['message'] 	= 'Input berhasil!';				
			}
			
			if($source == 'app'){
				$this->session->set_userdata('add_notification', $return);
				redirect('k_siswa/siswa');
			}else{
				echo json_encode($return);
			}

		}
		else
		{
			$return['response'] = 'false';
			$return['message']  = 'Harap isi seluruh field!';

			if($source == 'app'){
				$this->session->set_userdata('add_notification', $return);
				redirect('k_siswa/siswa');
			}else{
				echo json_encode($return);
			};
		}
	}

	/*----------------------------------------------------------------------*
	* GET_SINGLE_DATA
	*-----------------------------------------------------------------------*
	* Get single data
	*----------------------------------------------------------------------*/
	public function get_single_data()
	{
		date_default_timezone_set('Asia/Jakarta');

		$pk = $this->input->post('ajx_pk');

		echo json_encode($this->bm->select_where($this->tbl_main, 'id', $pk)->row_array());
	}

	/*----------------------------------------------------------------------*
	* UPDATE_DATA
	*-----------------------------------------------------------------------*
	* Update existing data
	*----------------------------------------------------------------------*/
	public function update_data()
	{		
		$input_data	= $this->input->post();
		$pk			= $input_data['PrimaryKey'];
		
		$this->form_validation->set_rules('kdprovinsi', '', 'required');
		$this->form_validation->set_rules('nmprovinsi', '', 'required');
		
		if ($this->form_validation->run() == true)
		{
			unset($input_data['PrimaryKey']);
			
			date_default_timezone_set('Asia/Jakarta');

			$input_data['updated_by']	= $this->session->userdata('username');
			$input_data['updated_at']	= date('Y-m-d H:i:s');
			
			$unique = '';
			
			$query = $this->bm->update($this->tbl_main, $input_data, 'id', $pk);

			if($query){
				$return['response'] = 'true';
				$return['message'] 	= 'Berhasil mengubah data';
			}else{
				$return['response'] = 'false';
				$return['message'] 	= 'Terjadi kesalahan';
			}

			$return['type'] = 'update';
			
			echo json_encode($return);
		}
		else
		{
			$return['response'] = 'false';
			$return['message'] = 'Harap isi seluruh field!';
			echo json_encode($return);
		}
	}


public function delete_data(){

		date_default_timezone_set('Asia/Jakarta');

		$pk = $this->input->post('ajx_pk');
		
		$update_data = array(
			'status' => 0,
			'created_by' => $this->session->userdata('username'),
			'created_at' => date('Y-m-d H:i:s')
		);
		$query = $this->bm->update($this->tbl_main, $update_data, 'id', $pk);

			if($query){
				$return['response'] = 'true';
				$return['message'] 	= 'Berhasil menghapus data';
				$return['data'] = $pk;
			}else{
				$return['response'] = 'false';
				$return['message'] 	= 'Terjadi kesalahan';
				$return['data'] = $pk;
			}

			$return['type'] = 'update';
			
			echo json_encode($return);

	}

	function get_kelas_tingkat(){
		$tingkat_kelas = $this->input->post('tingkat_kelas');
		$kelas = $this->select_where('ms_kelas', 'tingkat_kelas', $tingkat_kelas)->result();

		echo json_encode($kelas);
	}

	/*----------------------------------------------------------------------*
	* GET
	*-----------------------------------------------------------------------*
	* Get data for main table
	*----------------------------------------------------------------------*/
	function get($select, $is_join, $joins, $from, $where, $order_by = "", $group_by = "", $where_in = NULL, $where_not_in = NULL, $having = [])
	{
		$this->load->library('Datatables');

		$this->datatables->select($select, false);
		$this->datatables->from($from);
		$this->datatables->where($where);
		
		if($is_join == true)
		{
			foreach($joins as $join)
			{
				if(isset($join['join_type']))
					$join_type = $join['join_type'];
				else
					$join_type = "";
					
				$this->datatables->join($join['join_table'], $join['join_condition'], $join_type);
			}
		}
		
		if($order_by != ""){$this->datatables->order_by($order_by);}
		if($group_by != ""){$this->datatables->group_by($group_by);}

		if($where_in != NULL)
		{
			$keys = array_keys($where_in);
			$i = 0;
			
			foreach($keys as $key)
			{
				$this->datatables->where_in($keys[$i], $where_in[$keys[$i]]);
				$i++;
			}
		}
		
		if($where_not_in != NULL)
		{
			$keys = array_keys($where_not_in);
			$i = 0;
			
			foreach($keys as $key)
			{
				$this->datatables->where_not_in($keys[$i], $where_not_in[$keys[$i]]);
				$i++;
			}
		}
    
    if($having != NULL)
		{
			$keys = array_keys($having);
			$i = 0;
			
			foreach($keys as $key)
			{
				$this->datatables->having($keys[$i], $having[$keys[$i]]);
				$i++;
			}
		}
		
		return $this->datatables->generate();
	}
}
