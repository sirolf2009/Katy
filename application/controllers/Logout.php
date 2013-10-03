<?php
class Logout extends CI_Controller {

	public function Logout() {
            if(!$this->input->get("logged in")) {
                die("You are not signed in");
            } else {
                $this->input->post("logged in", false);
                $this->load->view("index");
            }
        }
}
?>
