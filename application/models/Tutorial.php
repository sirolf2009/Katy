<?php

class Tutorial extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function registerTutorial($userID, $tutName) {
        $data = array(
            'user_id'=>$userID,
            'tutName'=>$tutName,
        );
        $this->db->insert('tutorial', $data);
    }
}

?>
