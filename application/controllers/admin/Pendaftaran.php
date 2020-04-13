<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
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
		if($kode_role == 2){
			show_404();
		}
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);
		$where = array(
			'status' => 1,
		);

		$pendaftaran = $this->bm->select_where_array_order('tr_pembayaran', $where, 'is_paid asc, created_at desc')->result();
		foreach ($pendaftaran as $key => $value) {
			$peserta = $this->bm->select_where('tr_pendaftaran', 'id_pembayaran', $value->id )->row();
			$value->total_tim = count($this->bm->select_where('tr_pendaftaran', 'id_pembayaran', $value->id )->result());
			$sekolah = $this->bm->select_where('ms_sekolah', 'id', $peserta->id_sekolah)->row();
			$value->nmsekolah = $sekolah->nmsekolah;
			if(!$value->is_paid){
				$value->aksi = "<a href=".site_url('admin/pendaftaran/verifikasi/'.$value->kdpembayaran)." class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-check'></span> Verifikasi</a>";
			}
			else{
				$value->aksi = "<button disabled class='btn btn-success btn-xs'><span class='glyphicon glyphicon-check'></span> Terverifikasi</button>";
				if($value->file_bukti){
					$value->aksi .= "<div style='margin-top:5px;'><a target='_blank' href=".base_url().$value->file_bukti." class='btn btn-info btn-xs'><span class='glyphicon glyphicon-download'></span> Bukti Transaksi</a></div>";
				}
			}
			$tanggal = strtotime($value->created_at);
			$tanggal = date('Y-m-d', $tanggal);
			$value->tanggal = $this->tgl_indo($tanggal);
		}
		$data['pendaftaran'] = $pendaftaran;
		$data['title'] 		= "List Pendaftaran";
		$data['content'] 	= $this->load->view('admin/pendaftaran/vw_list_pendaftaran',$data,true);
		$this->load->view('master_page',$data);
	}

	public function verifikasi($kdpembayaran){
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username')
		);
		$pembayaran = $this->bm->select_where('tr_pembayaran', 'kdpembayaran', $kdpembayaran)->row();
		$data['kdpembayaran'] = $kdpembayaran;
		$pendaftaran = $this->bm->select_where('tr_pendaftaran', 'id_pembayaran', $pembayaran->id)->row();
		$sekolah = $this->bm->select_where('ms_sekolah', 'id', $pendaftaran->id_sekolah)->row();
		$jenjang = $sekolah->id_jenjang;
		$where = array(
			'tahun' => tahun_lomba,
		);
		$nmsekolah='';
		$nmkabupaten='';
		$nmkecamatan = '';
		$data_lomba_penggalang = $this->bm->select_where_array_in('tr_kegiatan', $where,'id_jenjang', array($jenjang))->result();
		$pendaftaran = $this->bm->select_where_order_all('tr_pendaftaran', 'id_pembayaran', $pembayaran->id, 'jenis_regu, id_kegiatan')->result();
		$arr_mata_lomba[0] = "Semua";
		foreach ($data_lomba_penggalang as $key => $value) {
			$value->biaya = $biaya = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->harga;
			$value->nmlomba = $arr_mata_lomba[$key] = $this->bm->select_where('ms_lomba', 'id', $value->id_lomba)->row()->nmlomba;
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
		$data['id_sekolah'] = $sekolah->id;
		$data['arr_lomba'] = $arr_mata_lomba;
		$data['pendaftaran'] = $data_lomba_penggalang;
		$data['tanggal_kadaluarsa'] = $this->tgl_indo($pembayaran->tanggal_kadaluarsa);
		$data['today'] = $this->tgl_indo(date('Y-m-d'));
		$data['nmsekolah'] = ucfirst(strtolower($nmsekolah));
		$data['nmkabupaten'] = ucfirst(strtolower($nmkabupaten));
		$data['nmkecamatan'] = ucfirst(strtolower($nmkecamatan));
		$data['jenjang'] = 'Sekolah Dasar';
		$data['content'] = $this->load->view('admin/pendaftaran/vw_verifikasi_pendaftaran',$data, true);
		$this->load->view('master_page',$data);
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

	public function get_list(){
		$post_data = $this->input->post();
		$where = "";
		if(isset($post_data['kdpembayaran'])){
			$where='WHERE tr_pembayaran.kdpembayaran like "%'.$post_data['kdpembayaran'].'%"';
		}
		if(isset($post_data['id_jenjang'])){
			$id_jenjang = $post_data['id_jenjang'];
			if($id_jenjang != 0){
				if($where != ""){
					$where.= ' '. 'AND ms_sekolah.id_jenjang = '.$post_data['id_jenjang'];
				}
				else{
					$where= 'where ms_sekolah.id_jenjang = '.$post_data['id_jenjang'];
				}
			}
		}
		if(isset($post_data['nmsekolah'])){
			if($where != ""){
				$where.= ' AND ms_sekolah.nmsekolah like "%'.$post_data['nmsekolah'].'%"';
			}
			else{
				$where= 'where ms_sekolah.nmsekolah like %"'.$post_data['nmsekolah'].'%"';
			}
		}	
		$sql = "SELECT * FROM `tr_pembayaran`
					LEFT JOIN tr_pendaftaran ON tr_pembayaran.id = tr_pendaftaran.id_pembayaran
					LEFT JOIN ms_sekolah ON tr_pendaftaran.id_sekolah = ms_sekolah.id ".$where."
					GROUP BY tr_pembayaran.kdpembayaran
					ORDER BY is_paid ASC
					";
		$data = $this->db->query($sql)->result();
		if($data){
			foreach ($data as $key => $value) {
				if(!$value->is_paid){
					$value->aksi = "<a href=".site_url('admin/pendaftaran/verifikasi/'.$value->kdpembayaran)." class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-check'></span> Verifikasi</a>";
				}
				else{
					$value->aksi = "<button disabled class='btn btn-success btn-xs'><span class='glyphicon glyphicon-check'></span> Terverifikasi</button>";
					if($value->file_bukti){
						$value->aksi .= "<div style='margin-top:5px;'><a target='_blank' href=".base_url().$value->file_bukti." class='btn btn-info btn-xs'><span class='glyphicon glyphicon-download'></span> Bukti Transaksi</a></div>";
					}
				}
				$value->total_pembayaran = 'Rp. ' .number_format(round($value->total_pembayaran),0, '' ,'.');
				$value->total_regu = number_format(round($value->total_regu),0, '' ,'.');
				$tanggal = $this->bm->select_where('tr_pembayaran', 'kdpembayaran', $value->kdpembayaran)->row()->created_at;
				$tanggal = strtotime($tanggal);
				$tanggal = date('Y-m-d', $tanggal);
				$value->tanggal = $this->tgl_indo($tanggal);
			}
			$data = array(
				'status' => 'success',
				'message' => 'data ditemukan',
				'data' => $data
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

	function post_verification(){
		 $kdpembayaran = $this->input->post('kdpembayaran');
		 $id_sekolah = $this->input->post('id_sekolah');
		$config['upload_path'] = './bukti_transaksi/';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $config['max_size'] = 5000;
        $config['file_name'] =  $kdpembayaran. '_' . time();
        // $config['encrypt_name'] = TRUE;
        // $config['max_width'] = 1500;
        // $config['max_height'] = 1500;
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path']))
		mkdir($config['upload_path'], 0777);

        if(!empty($_FILES['file_bukti']['name'])){
        	$extension = explode(".", $_FILES['file_bukti']['name']);
        	$extension = end($extension);	
        	$config['file_name'].= '.' . $extension;	
        	if(!$this->upload->do_upload('file_bukti')) {
	            $error = array('error' => $this->upload->display_errors());
	            $this->session->set_flashdata('status', 1);
	            $this->session->set_flashdata('error', json_encode($error));
	            redirect('admin/pendaftaran/verifikasi/'. $kdpembayaran);
	        } else {
	            $data = array('image_metadata' => $this->upload->data());
	            $data = array(
		        	'is_paid' => 1,
		        	'file_bukti' => '/bukti_transaksi/'. $config['file_name'],
		        	'updated_by' => $this->session->userdata('username')
		        );
		        $update = $this->bm->update('tr_pembayaran', $data, 'kdpembayaran', $kdpembayaran);
		        $id_pembayaran = $this->bm->select_where('tr_pembayaran', 'kdpembayaran', $kdpembayaran)->row()->id;
		        $pendaftaran = $this->bm->select_where('tr_pendaftaran', 'id_pembayaran', $id_pembayaran)->result();
		        foreach ($pendaftaran as $key => $value) {
		        	$data = array(
		        		'nomor_peserta' => $this->getNomorPeserta()
		        	);
		        	$update2 = $this->bm->update('tr_pendaftaran', $data, 'id', $value->id);
		        }
		        $config = array();
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'ssl://smtp.googlemail.com';
				$config['smtp_user'] = 'reynaldopandu03@gmail.com';
				$config['smtp_pass'] = 'pandudewanata';
				$config['protocol'] = 'sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['mailtype'] = 'html';
				$config['wordwrap'] = TRUE;
				$config['smtp_port'] = 465;
				
				// date_default_timezone_set('Asia/Jakarta');
				$today = date('Y-m-d H:i:s');

				$pwd = $this->generatePassword(8);
				$sekolah = $this->bm->select_where('ms_sekolah', 'id', $id_sekolah)->row();
				$data_user = array(
					'username' => $kdpembayaran,
					'password' => md5($pwd),
					'id_sekolah' => $id_sekolah,
					'nama' => $sekolah->nmsekolah . '-'. $kdpembayaran,
					'role' => 2,
					'CreatedBy' => 'System',
					'CreatedDate' => $today,
					'ModifiedBy' => 'System',
					'ModifiedDate' => $today,
					'isActive' => 1,
					'default' => $pwd
				);

				$user = $this->bm->insert_all('ms_user', $data_user);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('reynaldopandu03@gmail.com', 'Jalakmas 2020');
				$this->email->to('pandureynaldo02@gmail.com');
				$this->email->subject('Pendaftaran Jalakmas 2020 telah diverifikasi');
				$this->email->message('Silahkan login');
				$this->email->send();


		        $this->session->set_flashdata('status', 2);
		        $this->session->set_flashdata('username_daftar', $kdpembayaran);
				$this->session->set_flashdata('password_daftar', $pwd);
				$this->session->set_flashdata('nmsekolah', $sekolah->nmsekolah);

	             redirect('admin/pendaftaran');
	        }
        }
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('status', 3);
        redirect('admin/pendaftaran/verifikasi/'. $kdpembayaran);
	}

	private function generatePassword($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}


	private function getNomorPeserta(){
		$where = array('status' => 1);
		$nompes = $this->bm->select_where_array_order('tr_pendaftaran', $where, 'nomor_peserta desc')->row();
		if($nompes){
			return $nompes->nomor_peserta+1;
		}
		else{
			return 1;
		} 
	}

}
