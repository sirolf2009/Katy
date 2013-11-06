<?php

$userdata = $this->session->userdata("userData");
$loggedIn = isset($userdata["loggedIn"]) ? $userdata["loggedIn"] : false;
$data['barItems'] = 3;

//logged in header
if ($loggedIn) {
    $data['destinations'] = array(
        0 => "http://localhost/index.php/logout",
        1 => "http://localhost/index.php/editor",
        2 => "http://localhost/index.php/achievement"
    );
    $data['descriptions'] = array(
        0 => "log uit",
        1 => "editor",
        2 => "achievements"
    );
} else {
    $data['destinations'] = array(
        0 => "http://localhost/index.php/login",
        1 => "http://localhost/index.php/register",
        2 => "http://localhost/index.php/editor"
    );
    $data['descriptions'] = array(
        0 => "log in",
        1 => "register",
        2 => "editor"
    );
}
$this->load->view('header', $data);
?>