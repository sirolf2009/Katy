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
                show_error("You are not logged in.");
            } else {
                $this->session->unset_userdata("userData");
                $this->load->view('loginView');
            }
        }
}
?>
