<?php
class Login extends CI_Controller {
    
        function __construct() {
            parent::__construct();
            $this->Login();
        } 
    
	public function Login() {
            $username = "test";//$this->input->get("username");
            $password = "test";//$this->input->get("password");
            $sessionData = $this->session->userdata("userData");
            if($sessionData["loggedIn"]) {
                die("You are already logged in.");
            }
            $server = mysqli_connect("localhost", "root", "", "katy");
            if (!$server) {
                die("Could not connect to: ".mysqli_error($server));
            }
            $result = mysqli_query($server, "SELECT * FROM account WHERE Username='".$username."' AND Password='".$password."'");
            if($result->num_rows == 0) {
                die("Wrong password or username given". mysqli_error($server));
            }
            
            $this->session->set_userdata("userData", array("loggedIn" => true,
                                                           "username" => $username));
            //$this->load->view("welcome_message");
            echo("Login succesful<br>");
            mysqli_free_result($result);
        }
}
?>
