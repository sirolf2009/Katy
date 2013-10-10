<?php
class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registerView');
        } else {
            $this->Register();
            $this->load->view("loginView");
        }
    }

    Public function Register() {
        $username = $this->input->post("username");
        $password = sha1($this->input->post("password").'extra');
        $email = $this->input->post("email");
        
        $this->load->model('Account', "account");
        $this->account->register($username, $password, $email);
    }

}

?>