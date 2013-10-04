<?php
class Register extends CI_Controller {

    Public function Register(){
        $username = "test5" ;//$this->input->get("username");
        $password = "test3" ;//$this->input->get("password");
        $email = "test3@gmail.com";//$this->input->get("email");

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

    }

}

?>