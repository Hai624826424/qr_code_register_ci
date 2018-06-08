<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('buildError')) {

    function buildError($code, $data) {
        $data = array(
            "code" => $code,
            "message" => $data
        );
        return $data;
    }
}
?>