<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Info extends MY_Controller {

    public function index() {
        //$this->load->model('Register_Model');
        echo "Register_ModelRegister_ModelRegister_Model";
    }

    public function get_all_item() {
        $this->load->Model("Info_Model");
        $data = $this->Info_Model->get_all();
        $this->exportJson($data);
    }

    public function add_item() {
        try {
            $this->load->Model("Info_Model_");
            if ($this->isSpam()) {
                return;
            } else if (!isset($_POST['name']) || !isset($_POST['value']) || !isset($_POST['room_id'])) {
                echo "Missing params";
                return;
            }

            $this->load->Model("Info_Model");
            $data = $this->Info_Model->insert_item($_POST['name'], $_POST['value'], $_POST['room_id']);


            $this->exportJson($data);
        } catch (Exception $e) {
            $this->load->helper("my_error");
           
            $this->exportJson(buildError("500", "Internal Error reach"), FALSE);
        }
    }

}

?>
