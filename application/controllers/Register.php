<?php
class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_CheckUserExistence');
        $this->form_validation->set_rules('passwordConf', 'PasswordConf', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registerView');
        } else {
            $this->Register();
            $this->load->view("loginView");
        }
    }
    
    public function CheckUserExistence() {
        $username = $this->input->post("username");
        $this->load->model('Account', "account");
        $result = $this->account->doesUserExist($username);
        if($result == false) {
            return true;
        } else {
            $this->form_validation->set_message('CheckUserExistence', 'Deze gebruiker bestaat al');
            return false;
        }
    }

    Public function Register() {
        $this->load->model('Account', "account");
        $this->account->register($this->input->post("username"), sha1($this->input->post("password").'extra'), $this->input->post("email"));
    }

}

?>