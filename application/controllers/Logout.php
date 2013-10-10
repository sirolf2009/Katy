<?php
class Logout extends CI_Controller {
    
        function __construct() {
            parent::__construct();
        } 
        
        function index() {
            $this->Logout();
        }
        
	public function Logout() {
            $sessionData = $this->session->userdata("userData");
            if(!$sessionData["loggedIn"]) {
                echo("You are not logged in.");
                $this->load->view('loginView');
            } else {
                $this->session->unset_userdata("userData");
                $this->load->view('loginView');
            }
        }
}
?>
