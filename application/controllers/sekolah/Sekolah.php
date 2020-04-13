<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	private $tbl_main 		= 'ms_akademik';
	private $tbl_siswa 		= 'ms_murid';
	private $tbl_kelas 		= 'ms_kelas';

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

		$option_kelas[''] = '-- Pilih Kelas --';
		$where = array(
			'IsActive' => 1,
			// 'tingkat_kelas' => 1
		);
		$kelas = $this->bm->select_where_array('ms_kelas', $where)->result();
		foreach ($kelas as $key => $value) {
			$option_kelas[$value->id_kelas] = $value->nama_kelas;
		}
		$data['option_kelas'] = $option_kelas;

		$data['title'] 		= "Siswa";
		$data['content'] 	= $this->load->view('k_siswa/vw_siswa',$data,true);
		$data['javascript'] = "k_js_siswa.js";
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
		$semester_aktif = $this->session->userdata('id_semester');
		$tahun_akademik = $this->bm->select_where('ms_semester', 'id_semester', $semester_aktif)->row()->id_akademik;
		$filter = array(
			'sis.IsActive'		=> 1,
			'th.id_akademik' => $tahun_akademik
		);

		/*$date 		= $this->input->post('ajx_anggaran_date');

		if($date != '')
			$filter['anggaranDate LIKE'] = date('Y-m', strtotime($date)).'%';*/

		$filter = (array_filter($filter,function($v){return $v != '' && $v != '%%';}));
		
		$select = ('
			sis.id_murid,
			sis.nama_murid,
			sis.jenis_kelamin_murid,
			sis.tanggal_lahir_murid,
			sis.agama_murid,
			sis.alamat_murid,
			sis.nama_ortu_murid,
			sis.tingkat_murid,
			sis.NISN,
			sis.CreatedBy,
			sis.CreatedDate,
			sis.ModifiedBy,
			sis.ModifiedDate,
			sis.IsActive,
			kel.id_kelas,
			kel.nama_kelas
		');


		$joins[0] = array(
			'join_table' => 'ms_histori_kelas th',
			'join_condition' => 'sis.id_murid = th.id_murid'
		);

		$joins[1] = array(
			'join_table'		=> $this->tbl_kelas.' kel',
			'join_condition'	=> 'th.id_kelas = kel.id_kelas'
		);



		echo $this->get($select, true, $joins, $this->tbl_siswa.' sis', $filter);
	}

	/*----------------------------------------------------------------------*
	* ADD_DATA
	*-----------------------------------------------------------------------*
	* Add new data
	*----------------------------------------------------------------------*/
	public function add_data($source = 'app')
	{
        $input_data = $this->input->post();

		$this->form_validation->set_rules('nama_murid', '', 'required');
		$this->form_validation->set_rules('jenis_kelamin_murid', '', 'required');
		$this->form_validation->set_rules('tanggal_lahir_murid', '', 'required');
		$this->form_validation->set_rules('alamat_murid', '', 'required');
		$this->form_validation->set_rules('nama_ortu_murid', '', 'required');
		$this->form_validation->set_rules('id_kelas', '', 'required');
		
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

		echo json_encode($this->bm->select_where($this->tbl_siswa, 'id_murid', $pk)->row_array());
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
		
		$this->form_validation->set_rules('nama_murid', '', 'required');
		$this->form_validation->set_rules('jenis_kelamin_murid', '', 'required');
		$this->form_validation->set_rules('tanggal_lahir_murid', '', 'required');
		$this->form_validation->set_rules('nama_ortu_murid', '', 'required');
		$this->form_validation->set_rules('id_kelas', '', 'required');
		
		if ($this->form_validation->run() == true)
		{
			unset($input_data['PrimaryKey']);
			
			date_default_timezone_set('Asia/Jakarta');

			$input_data['tanggal_lahir_murid']	= date('Y-m-d H:i:s', strtotime($input_data['tanggal_lahir_murid']));
			$input_data['ModifiedBy']	= $this->session->userdata('username');
			$input_data['ModifiedDate']	= date('Y-m-d H:i:s');
			
			$unique = '';
			
			$query = $this->bm->update($this->tbl_siswa, $input_data, 'id_murid', $pk);

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
			'IsActive' => 0,
			'ModifiedBy' => $this->session->userdata('username'),
			'ModifiedDate' => date('Y-m-d H:i:s')
		);
		$query = $this->bm->update($this->tbl_siswa, $update_data, 'id_murid', $pk);

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
