<?php
class Account extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function login($username, $password) {
        $password = sha1($password."extra");
        $this->db->select('username, password');
        $this->db->from('account');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1) {
            return $query->result();
        } else { 
            return false;
        }
    }
    
    function doesUserExist($username) {
        $this->db->select('username');
        $this->db->from('account');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() >= 1) {
            return true;
        } else { 
            return false;
        }
    }
    
    function register($username, $password, $email) {
        $password = sha1($password."extra");
            $data = array(
                'Username'=>$username,
                'Password'=>$password,
                'Email'=>$email,
                "user_id"=>$this->getLatestUserID()+1,
                "Rights"=>"User"
            );
        $this->db->insert('account', $data);
    }
    
    function getLatestUserID() {
        $this->db->select_max('user_id');
        $result = $this->db->get('account');
        $row = $result->row_array();
        return $row["user_id"];
    }
    
    function getUserFromID($ID) {
        $this->db->select('*');
        $this->db->from('account');
        $this->db->where('user_id', $ID);
        $this->db->limit(1);
        return $this->db->get();
    }
}
?>
