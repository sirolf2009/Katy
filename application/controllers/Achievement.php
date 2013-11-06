<?php
class Achievement extends CI_Controller {

        function __construct() {
        parent::__construct();
    }

    function index() {
		$this->displayAllAchievementsFromUser(1);
                
                
    }
	
	function displayAllAchievementsFromUser($userID) {
            
                $achievementName = 0;        
                $this->load->model('Achievements', "achievements");
		$query = $this->achievements->getAllAchievementsFromUser($userID);
		for($i = 0; $i < count($query); $i++) {
                        $query2 = $this->achievements->getAchievementProperties($achievementName);
			foreach ($query2->result_array() as $row) {
                                $achievementName++ ;
                                $data["Name$achievementName"]= $row['AchievementName']; 
				$data["Desc$achievementName"] = $row['AchievementDesc'];
				$data["IMG$achievementName"] = $row['AchievementIMG'];
				
                                
                        }
                        $data ["achievement_Amount"] = $achievementName;
		}
                
		$this->load->view('achievementView',$data);
                
	}

}
?>