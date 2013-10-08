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
            echo("Register succesful!");
        }
    }

    Public function Register(){
        $username = $this->input->get("username");
        $password = $this->input->get("password");
        $email = $this->input->get("email");


        $server = mysqli_connect("localhost", "root", "", "katy");
        if (!$server) {
            die("Could not connect to: ".mysqli_error($server));
        }
        $result = mysqli_query($server, "SELECT * FROM account WHERE Username='".$username."'");
        if($result->num_rows != 0) {
            die("This user is already registered");
        }
        $result = mysqli_query($server, ' INSERT INTO account (Username, Password, Email) VALUES("'.$username.'", "'.$password.'", "'.$email.'")');
        if(!$result) {
            die("Query failure: ".mysqli_error($server));
        }
        mysqli_free_result($result);
    }

}

?>