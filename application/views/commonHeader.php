<?php
$userdata = $this->session->userdata("userData");
$loggedIn = isset($userdata["loggedIn"]) ? $userdata["loggedIn"] : false;
$data['barItems'] = $loggedIn ? 2 : 3;
$data['destinations'] = array(
    0 => $loggedIn ? "http://localhost/index.php/logout" : "http://localhost/index.php/login",
    1 => $loggedIn ? "http://localhost/index.php/editor" : "http://localhost/index.php/register",
    2 => "http://localhost/index.php/editor"
);
$data['descriptions'] = array(
    0 => $loggedIn ? "log uit" : "log in",
    1 => $loggedIn ? "editor" : "register",
    2 => "editor"
);
$this->load->view('header', $data);
?>