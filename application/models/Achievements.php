<?php
class Achievements extends CI_Model {

    function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function getAllAchievementsFromUser($userID) {
        $this->db->select('achievements');
        $this->db->from('account');
        $this->db->where('user_id', $userID);
        $this->db->limit(1);

        $query = $this->db->get();
		
		$row = $query->row();
		return str_split($row->achievements);
    }
	
	function getAchievementProperties($achievementName) {
		$this->db->select('*');
        $this->db->from('achievements');
        $this->db->where('achievementName', $achievementName);
        $this->db->limit(255);
	
		return $this->db->get();
	}
	
	
}
?>