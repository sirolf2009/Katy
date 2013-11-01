<?php
class Achievement extends CI_Controller {

    private $load;

    function __construct() {
        parent::__construct();
    }

    function index() {
		$this->displayAllAchievementsFromUser(1);
    }
	
	function displayAllAchievementsFromUser($userID) {
		$this->load->model('Achievements', "achievements");
		$query = $this->achievements->getAllAchievementsFromUser($userID);
		$data["achievement_Amount"] = count($query);
		for($i = 0; $i < count($query); $i++) {
			$achievementName = $query[$i];
			$query2 = $this->achievements->getAchievementProperties($achievementName);
			foreach ($query2->result_array() as $row) {
			echo($achievementName);
				$data["Name"][$achievementName] = $row['AchievementName'];
				$data["Desc"][$achievementName] = $row['AchievementDesc'];
				$data["IMG"][$achievementName] = $row['AchievementIMG'];
				
			}
		}
		echo ($data["1name"]);
		$this->load->view('achievementView', $data);
	}
}
?>