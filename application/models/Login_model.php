<?php
class Login_model extends CI_Model {
	/**
	 * Constructor
	 */
	public function __construct(){
        parent::__construct();
		$this->CI = get_instance();
		$this->load->database();		
    }
	
	function get_user($username, $password){
		$this->db->select('*');
		$this->db->from('m_user');
		$this->db->join('m_divisi', 'm_user.id_divisi = m_divisi.id');
		$this->db->where('username',$username);
		$this->db->where('password', $password);
		return $this->db->get();
	}
	
	function cek_user($username){
		$this->db->select('*');
		$this->db->from('m_user');
		$this->db->where('username',$username);
		$return = $this->db->get();
		if($return->num_rows() > 0)	
			return true;
		else
			return false;
	}
	function get($tabel){
		$this->db->select('*');
		$this->db->from($tabel);
		return $this->db->get();
	}
	
	function get_where($tabel,$kolom,$param){
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->where($kolom,$param);
		return $this->db->get();
	}
	
	function select($select,$tabel,$tabel_group){
		$this->db->select($select);
		$this->db->from($tabel);
		$this->db->group_by($tabel_group);
		return $this->db->get();
	}
	
}