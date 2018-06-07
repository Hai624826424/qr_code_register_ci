<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends MY_Controller {

    public function index() {
        //$this->load->model('Register_Model');
        echo "index";
    }

    public function get_all_room() {
        if ($this->isSpam()) {
            return;
        }
        $data = array();
        $this->load->Model("Room_Model");
        $this->load->Model("House_Model");

        $houses = $this->House_Model->get_all_house();

        foreach ($houses as $house) {
            $item = array("house_id" => $house->house_id, "house_name" => $house->house_name, "rooms" => $this->Room_Model->get_all_room($house->house_id));
            array_push($data, $item);
        }

        $this->exportJson($data);
    }

}

?>
