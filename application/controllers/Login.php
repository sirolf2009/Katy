<?php
class Login extends CI_Controller {
    
        function __construct() {
            parent::__construct();
        } 
        
        function index() {
                $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
                    $this->load->view('loginView');
		} else {
                    $this->Login();
                    $this->load->view("logoutView");
		}
	}
    
	public function Login() {
            $username = $this->input->post("username");
            $sessionData = $this->session->userdata("userData");
            if($sessionData["loggedIn"]) {
                show_error("You are already logged in.");
            }
            $this->load->model('Account', "account");
            $this->account->login($username, $this->input->post("password"));
            
            $this->session->set_userdata("userData", array("loggedIn" => true,
                                                           "username" => $username));
        }
}
?>
