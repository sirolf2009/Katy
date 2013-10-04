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
            $server = mysql_connect("localhost", "root", "");
            if (!$server) {
                die("Could not connect to: ".mysql_error());
            }
            $database = mysql_select_db("katy", $server);
            if (!$database) {
                die("Can\'t use Katy database : ".mysql_error());
            }
            $result = mysql_query("SELECT * FROM account WHERE Username='".$username."' AND Password='".$password."'");
            if(!$result) {
                die("Query failure: ".mysql_error());
            }
            
            $this->session->set_userdata("userData", array("loggedIn" => true,
                                                           "username" => $username));
            //$this->load->view("welcome_message");
            echo("Login succesful<br>");
            mysql_free_result($result);
        }
}
?>
