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
        $this->form_validation->set_rules('passwordConf', 'PasswordConf', 'required|callback_ConfirmPass');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registerView');
        } else {
            $this->Register();
            $this->load->view("loginView");
        }
    }
    
    public function ConfirmPass() {
        $password = sha1($this->input->post("password")."extra");
        $passwordConf = sha1($this->input->post("passwordConf")."extra");
        if($password == $passwordConf) {
            return true;
        } else {
            $this->form_validation->set_message('ConfirmPass', 'De wachtwoorden moeten aan elkaar gelijk zijn');
            return false;
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
        $username = $this->input->post("username");
        $password = sha1($this->input->post("password").'extra');
        $email = $this->input->post("email");
        
        $this->load->model('Account', "account");
        $this->account->register($username, $password, $email);
    }

}

?>