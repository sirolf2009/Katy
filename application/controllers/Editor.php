<?php

class Editor extends CI_Controller {
    
        function __construct() {
            parent::__construct();
        } 
        
        function index() {
            $this->load->helper('url');
            $data["code"] = "";
            $this->load->view('editorView', $data);
        }
}
?>
