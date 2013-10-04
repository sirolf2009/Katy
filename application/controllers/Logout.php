<?php
class Logout extends CI_Controller {
    
        function __construct() {
            parent::__construct();
            $this->Logout();
        } 

	public function Logout() {
            $sessionData = $this->session->userdata("userData");
            if(!$sessionData["loggedIn"]) {
                die("You are not logged in.");
            } else {
                $this->session->unset_userdata("userData");
                echo("Logout succesful");
            }
        }
}
?>
