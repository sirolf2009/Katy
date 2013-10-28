<?php

$data['barItems'] = "3";
$data['destinations'] = array(
    0 => "http://localhost/index.php/login",
    1 => "http://localhost/index.php/register",
    2 => "http://localhost/index.php/editor"
);
$data['descriptions'] = array(
    0 => "login",
    1 => "register",
    2 => "editor"
);
$this->load->view('header', $data);
?>