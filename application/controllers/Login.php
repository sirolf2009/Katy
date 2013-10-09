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
            $password = sha1($this->input->post("password")."extra");
            $sessionData = $this->session->userdata("userData");
            if($sessionData["loggedIn"]) {
                die("You are already logged in.");
            }
            $this->load->model('Account', "account");
            $this->account->login($username, $password);
            $server = mysqli_connect("localhost", "root", "", "katy");
            if (!$server) {
                die("Could not connect to: ".mysqli_error($server));
            }
            $result = mysqli_query($server, "SELECT * FROM account WHERE Username='".$username."' AND Password='".$password."'");
            if($result->num_rows == 0) {
                die("Wrong password or username given". mysqli_error($server)." Username=".$username."");
            }
            
            $this->session->set_userdata("userData", array("loggedIn" => true,
                                                           "username" => $username));
            mysqli_free_result($result);
        }
}
?>
