<?php

class TutorialCreate extends CI_Controller {
    
    function index() {
        $this->load->helper('file');
        $this->createTutorial("testName2", "testContent2", "test");
    }
    
    function createTutorial($tutorialName, $tutorialContent, $tutorialCreator) {
        $template = read_file('application/views/tutorialTemplate.php');
        $tutorial = str_replace("@@TUTORIALCONTENT@@", $tutorialContent, $template);
        write_file('application/views/tutorials/'.$tutorialName.'.php', $tutorial);
        $this->load->model('Tutorial', "tutorial");
        $this->load->model('Account', "account");
        $userID = $this->account->getIDFromUser($tutorialCreator);
        $this->tutorial->registerTutorial($userID, $tutorialName);
        $this->load->view("tutorials/".$tutorialName.".php");
    }
}

?>
