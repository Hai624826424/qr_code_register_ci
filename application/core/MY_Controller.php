<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        //$this->load->model('Register_Model');
        echo "Default";
    }

    public function get_all_item() {
        $this->load->Model("Info_Model");
        $data = $this->Info_Model->get_all();
        $value = array("list" => $data);
        $json = json_encode($value);

        echo $json;
    }

    public function isSpam() {
        if (!isset($_POST['who_are_you'])) {
            echo "Go home, kid!";
            return true;
        } else if ($_POST['who_are_you'] != WHO_ARE_YOU) {
            echo "Say Hello, please!";
            true;
        }
        return false;
    }

    public function exportJson($data, $isSuccess = true) {
        if (!isset($data['code'])) {
            echo $this->exportSuccessJson($data);
        } else {
            echo $this->exportErrorJson($data);
        }
    }

    private function exportSuccessJson($data) {
        $json = array(
            "success" => true,
            "data" => $data
        );
        $ret = json_encode($json, JSON_UNESCAPED_UNICODE);

        return $ret;
    }

    private function exportErrorJson($data) {
        $json = array(
            "success" => false,
            "error" => $data
        );
        $ret = json_encode($json, JSON_UNESCAPED_UNICODE);

        return $ret;
    }

}

?>
