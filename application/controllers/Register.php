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
        require_once(__DIR__ . '/../libraries/CAPTCHA/recaptchalib.php');
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
		$this->load->helper('string');
		$activation_code = random_string('alnum', 10);
		
		
        $this->load->model('Account', "account");
        $this->account->register($this->input->post("username"), sha1($this->input->post("password") . 'extra'), $this->input->post("email"), $activation_code);
		
		$this->load->library('email');
		
		$this->email->from('hr.e.learing@gmail.com');
		$this->email->to($this->input->post("email"));
		
		$value = 
		
		$this->email->subject('Registratie Bevestigen');
		$this->email->message('Klik deze link om uw registratie te bevestige ' . html_entity_decode('http://localhost/index.php/register/register_confirm/') . $activation_code, 'Bevestig Registatie');
		
		if ($this->email->send()) 
		{
		}
		else
		{
			echo($this->email->print_debugger());
		}
    }
	
	public function register_confirm($variable)
	{
		$registration_code = $this->uri->segment(3);
		
		if($registration_code == ' ')
		{
			echo 'Error geen registratie code in de URL';
			exit();
		}
		
		$this->load->model('Account', "account");
		$registration_confirmed = $this->account->confirm_registration($registration_code);
		
		if($registration_confirmed)
		{
			$this->load->view("register_ValidationView");
		}
		else
		{
			echo 'Registratie gefaalt';
		}
	}
}

?>