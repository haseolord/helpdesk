<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
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
		$data['title'] = "Homepage";
		// print_r($data); die();
		$data['content'] = $this->load->view('general/homepagenew',$data);		
	}

	public function penggalangsd(){
		$data['title'] = "Penggalang SD/MI";
		// print_r($data); die();
		$data['content'] = $this->load->view('general/penggalangsd',$data);
	}

	public function penggalangsmp(){
		$data['title'] = "Penggalang SMP/MTs.";
		// print_r($data); die();
		$data['content'] = $this->load->view('general/penggalangsmp',$data);
	}

	public function penegakpandega(){
		$data['title'] = "Penegak/Pandega";
		// print_r($data); die();
		$data['content'] = $this->load->view('general/penegakpandega',$data);
	}

	public function pendaftaran(){
		$data['title'] = "Pendaftaran";
		// print_r($data); die();
		$data['content'] = $this->load->view('general/pendaftaran',$data);
	}
}