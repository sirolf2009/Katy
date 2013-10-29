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
        $this->form_validation->set_rules('recaptcha_widget_div', 'Recaptcha_widget_div', 'callback_Captcha');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registerView');
        } else {
            $this->Register();
            $this->load->view("loginView");
        }
    }

    public function Captcha() {
        require_once(__DIR__ . '/../CAPTCHA/recaptchalib.php');
        $privatekey = "6Lco_OgSAAAAALzUplkjQ1FesnGqGdv1OBkAAI5x";
        $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
        if (!$resp->is_valid) {
            $this->form_validation->set_message('Captcha', 'De captcha is niet juist ingevuld');
            return false;
        }
        return true;
    }

    public function CheckUserExistence() {
        $username = $this->input->post("username");
        $this->load->model('Account', "account");
        $result = $this->account->doesUserExist($username);
        if ($result == false) {
            return true;
        } else {
            $this->form_validation->set_message('CheckUserExistence', 'Deze gebruiker bestaat al');
            return false;
        }
    }

    Public function Register() {
        $this->load->model('Account', "account");
        $this->account->register($this->input->post("username"), sha1($this->input->post("password") . 'extra'), $this->input->post("email"));
    }

}

?>