<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    public function index() {
        //$this->load->model('Register_Model');
        echo "Default";
    }

    public function buildErrorArray($code, $data) {
        $json = array(
            "code" => $code,
            "message" => $data
        );
       
        return $json;
    }
}

?>