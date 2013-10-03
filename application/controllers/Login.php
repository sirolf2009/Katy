<?php
class Login extends CI_Controller {

	public function Login() {
            $username = $this->input->get("username");
            $password = $this->input->get("password");
            $server = mysql_connect("localhost", "mysql_user", "mysql_password");
            if (!$server) {
                die("Could not connect to: ".mysql_error());
            }
            $database = mysql_select_db("Katy", $server);
            if (!$database) {
                die("Can\'t use Katy database : ".mysql_error());
            }
            $result = mysql("SELECT * where Username=".$username." AND Password=".$password." FROM Accounts");
            if(!$result) {
                die("Query failure: ".mysql_error());
            }
            $this->input->post("logged in", true);
            mysql_free_result($result);
            $this->load->view("index");
        }
}
?>
