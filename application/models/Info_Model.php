<?php

class Info_Model extends MY_Model {

    function index() {
        
    }

    function __construct() {
        parent::__construct();
    }

    function get_all() {
        $this->load->database();
        $val = $this->db->get("item_info")->result();
        return $val;
    }

    //
    function insert_item($name, $value, $room_id) {
        $data = array(
            'name' => $name,
            'value' => $value,
            'room_id' => $room_id,
            'type' => 1
        );
        try {
            $this->load->database();
            $this->db->db_debug = FALSE;
            //   $this->db->trans_start(FALSE);
            $val = $this->db->insert("item_info", $data);
            //    $val = $this->db->query("Seletct * from house where idd = 1");
            // $this->db->trans_complete();

            $db_error = $this->db->error();
            if (!empty($db_error['code'])) {

                throw new Exception($db_error['message'], $db_error['code']);
                //  throw new Exception($db_error);
            } else {
                return $val;
            }
        } catch (Exception $e) {

            return $this->buildErrorArray($e->getCode(), $e->getMessage());
//            if (isset($error['code'])) {
//                var_dump($error);
//            }
        }
    }

}

?>