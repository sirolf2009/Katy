<?php

class OpenView extends CI_Controller {
    
    function Index() {
        $data['barItems'] = "3";
	$data['destinations'] = array(
            0 => "http://localhost/index.php/login",
            1 => "http://localhost/index.php/register",
            2 => "http://localhost/index.php/register"
        );
	$data['descriptions'] = array(
            0 => "login",
            1 => "register",
            2 => "moar register"
        );
//	$data['barItem2Desc'] = "login";
//	$data['barItem2Dest'] = "http://localhost/index.php/login";
        $this->load->view("header", $data);
    }
}

?>
