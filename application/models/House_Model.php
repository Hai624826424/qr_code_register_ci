<?php
class House_Model extends CI_Model{
	
	function index(){
	}
	
	function __construct(){
		parent::__construct();
	}
	
	function get_all_house(){
		$this->load->database();
		
		$this->db->select("id as house_id, name as house_name", false);
		
		$this->db->from("house");

		$val = $this->db->get()->result();

		return $val;
	}
}
?>