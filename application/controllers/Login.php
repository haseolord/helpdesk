<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
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
		if($this->session->userdata('role') != ''){
			$jenis_pekerjaan = $this->session->userdata('role');
			if($jenis_pekerjaan == 1){
				redirect('home');
			}
			elseif($jenis_pekerjaan == 2){
				redirect('home');	
			}
			else{
				redirect('login');
			}
		}
		if(isset($_POST['username']) && isset($_POST['password'])){
			$data['username'] = $_POST['username'];
			if($_POST['username'] != null && $this->lm->cek_user($_POST['username']) == FALSE){
				$data['notification1'] = '*Username tidak terdaftar.';
			}
			elseif($_POST['password'] != null && $this->lm->get_user($_POST['username'], md5($_POST['password']))->num_rows < 1){
				$data['notification1'] = '*Password tidak sesuai.';
			}
		}
		$data['title'] = "Login";
		$data['content'] = $this->load->view('general/login',$data);
		
	}
	function login_proses(){
		if($this->cek_validasi() == FALSE){
			$this->index();
		}
		else{
			$user = $this->lm->get_user($_POST['username'], md5($_POST['password']))->row();
			if($user != null){
				$this->session->set_userdata('id', $user->id);
				$this->session->set_userdata('username', $user->username);
				$this->session->set_userdata('role', $user->role);
				$this->session->set_userdata('nama', $user->nama);
				if($user->role == 1 || $user->role == 3 || $user->role == 4){
					redirect('home');	
				}
				elseif($user->role == 2){
					redirect('home');	
				}
			}

			else{$this->index();}
		}
	}
	function cek_validasi(){
		$config = array(
			array('field'=>'username','label'=>'Username', 'rules'=>'required'),
			array('field'=>'password','label'=>'Password', 'rules'=>'required')
		);
		//setting rules
		$this->form_validation->set_rules($config);
		
		$this->form_validation->set_message('required', 'Kolom %s harus diisi !!');
		return $this->form_validation->run();
	}
	public function login_ulang(){
		$this->index();
		// $data['title']="SISTEM INFORMASI KEMENTERIAN KESEHATAN";		
		// $this->load->view('metronic/general/maintenance',$data);
	}
	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('id_user');
		$this->session->sess_destroy();
		redirect($this->index());
	}
}