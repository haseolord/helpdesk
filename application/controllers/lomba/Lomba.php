<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lomba extends CI_Controller {
	private $tbl_main 		= 'ms_kelas';

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
		$option_ta[''] = '-- Pilih Tahun Akademik --';
		$option_jurusan[''] = '-- Pilih Jurusan --';
		$tahun_akademik = $this->bm->select_where('ms_akademik','IsActive', '1')->result();
		$jurusan = $this->bm->select_where('ms_jurusan', 'IsActive' , '1')->result();
		foreach ($tahun_akademik as $key => $value) {
			$option_ta[$value->id_akademik] = $value->tahun_akademik;
		}
		$condition = array(
			'IsActive' => 1,
			'id_pekerjaan' => 3
		);
		$guru = $this->bm->select_where_array('ms_staff', $condition)->result();
		$option_wk[0] = '-- Pilih Wali Kelas -- ';
		foreach ($guru as $key => $value) {
			$option_wk[$value->id_staff] = $value->nama_staff;
			# code...
		}
		// foreach ($jurusan as $key => $value) {
		// 	$option_jurusan[$value->id_jurusan] = $value->nama_jurusan;
		// }
		$data['option_ta'] = $option_ta;
		$data['option_wk'] = $option_wk;
		$data['option_jurusan'] = $jurusan;
		$data['title'] 		= "Kelas";
		$data['content'] 	= $this->load->view('p_kelas/vw_kelas',$data,true);
		$data['javascript'] = "p_js_kelas.js";
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


	public function update_data()
	{		
		$input_data	= $this->input->post();
		$pk			= $input_data['PrimaryKey'];

		$this->form_validation->set_rules('kode_tingkatan', '', 'required');
		$this->form_validation->set_rules('urutan_kelas', '', 'required');
		$this->form_validation->set_rules('id_jurusan', '', 'required');


		if ($this->form_validation->run() == true)
		{
			unset($input_data['PrimaryKey']);
			
			date_default_timezone_set('Asia/Jakarta');

			$kode_jurusan = $this->bm->select_where('ms_jurusan','id_jurusan' , $input_data['id_jurusan'])->row()->kode_jurusan;

			$nama_kelas = $input_data['kode_tingkatan']. ' '. $kode_jurusan . ' '. $input_data['urutan_kelas'];
			$id_ta = $this->bm->select_where('ms_semester', 'id_semester', $this->session->userdata('id_semester'))->row()->id_akademik;
			$input_data = array(
				'id_jurusan' => $input_data['id_jurusan'],
				'id_staff' => $input_data['id_staff'],
				'nama_kelas' => $nama_kelas,
				'id_akademik' => $id_ta

			);

			$input_data['ModifiedBy']	= $this->session->userdata('username');
			$input_data['ModifiedDate']	= date('Y-m-d H:i:s');
			
			$unique = '';
			
			$query = $this->bm->update($this->tbl_main, $input_data, 'id_kelas', $pk);

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
		$query = $this->bm->update($this->tbl_main, $update_data, 'id_kelas', $pk);

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


	public function get_single_data()
	{
		date_default_timezone_set('Asia/Jakarta');

		$pk = $this->input->post('ajx_pk');
		// print_r($pk); exit();
		echo json_encode($this->bm->select_where($this->tbl_main, 'id_kelas', $pk)->row_array());
	}



	public function get_data()
	{
		date_default_timezone_set('Asia/Jakarta');
			
		$filter = array(
			'tk.IsActive'		=> 1
		);

		/*$date 		= $this->input->post('ajx_anggaran_date');
		if($date != '')
			$filter['anggaranDate LIKE'] = date('Y-m', strtotime($date)).'%';*/

		$filter = (array_filter($filter,function($v){return $v != '' && $v != '%%';}));
		$select = ('
			tk.id_kelas,
			tk.nama_kelas,
			ta.tahun_akademik,
			tj.nama_jurusan,
			ts.nama_staff,
			tk.CreatedBy,
			tk.CreatedDate,
			tk.ModifiedBy,
			tk.ModifiedDate,
			tk.IsActive
		');
		$joins = array();
		$join = array(
			'join_type' => 'LEFT',
			'join_table' => 'ms_jurusan tj',
			'join_condition' => 'tk.id_jurusan = tj.id_jurusan'
		);
		array_push($joins, $join);
		$join = array(
			'join_type' => 'LEFT',
			'join_table' => 'ms_akademik ta',
			'join_condition' => 'tk.id_akademik = ta.id_akademik'
		);
		array_push($joins, $join);
		$join = array(
			'join_type' => 'LEFT',
			'join_table' => 'ms_staff ts',
			'join_condition' => 'tk.id_staff = ts.id_staff'
		);
		array_push($joins, $join);
		// print_r($joins); exit();
		echo $this->get($select, true, $joins, $this->tbl_main.' tk', $filter);
	}

	/*----------------------------------------------------------------------*
	* ADD_DATA
	*-----------------------------------------------------------------------*
	* Add new data
	*----------------------------------------------------------------------*/
	public function add_data($source = 'app')
	{
        $input_data = $this->input->post();
		$this->form_validation->set_rules('kode_tingkatan', '', 'required');
		$this->form_validation->set_rules('urutan_kelas', '', 'required');
		$this->form_validation->set_rules('id_jurusan', '', 'required');
		
		if ($this->form_validation->run() == true)
		{
			unset($input_data['PrimaryKey']);

			date_default_timezone_set('Asia/Jakarta');
			$kode_jurusan = $this->bm->select_where('ms_jurusan','id_jurusan' , $input_data['id_jurusan'])->row()->kode_jurusan;

			$nama_kelas = $input_data['kode_tingkatan']. ' '. $kode_jurusan . ' '. $input_data['urutan_kelas'];
			$id_ta = $this->bm->select_where('ms_semester', 'id_semester', $this->session->userdata('id_semester'))->row()->id_akademik;
			$input_data = array(
				'id_jurusan' => $input_data['id_jurusan'],
				'id_staff' => $input_data['id_staff'],
				'nama_kelas' => $nama_kelas,
				'id_akademik' => $id_ta

			);
			$input_data['CreatedBy']	= $this->session->userdata('username');
			$input_data['CreatedDate']	= date('Y-m-d H:i:s');
			$input_data['ModifiedBy']	= $this->session->userdata('username');
			$input_data['ModifiedDate']	= date('Y-m-d H:i:s');
			$input_data['IsActive']		= 1;
			
			$input_func = $this->bm->insert_all($this->tbl_main, $input_data);

			if($input_func == FALSE){
				$return['response'] = 'false';
				$return['message'] 	= 'Input gagal!';
			}else{
				$return['response'] = 'true';
				$return['message'] 	= 'Input berhasil!';				
			}
			
			if($source == 'app'){
				$this->session->set_userdata('add_notification', $return);
				redirect('p_kelas/kelas');
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
				redirect('p_kelas/kelas');
			}else{
				echo json_encode($return);
			};
		}
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
