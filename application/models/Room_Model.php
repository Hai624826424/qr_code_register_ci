<?php
class Room_Model extends CI_Model{
	
	function index(){
	}
	
	function __construct(){
		parent::__construct();
	}
	
	function get_all_room($house_id = null){
		$this->load->database();
		/*$this->db->select("room.id as room_id, room.name as room_name, house.id as house_id, house.name as house_name", false);

		$this->db->from("room");
		$this->db->join("house", "room.house_id = house.id");
		*/
		$this->db->select("room.id as room_id, room.name as room_name", false);
		
		$this->db->from("room");
		
		if(isset($house_id)){
			$this->db->where("room.house_id", $house_id);
		}

		$val = $this->db->get()->result();

		return $val;
	}
}
?>