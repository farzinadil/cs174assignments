<?php
namespace cs174assignments\hw4\src\models;

class StatsModel extends Model {

    /**
     * Gets all the stats from the QuiaStatistics.txt file
     */
    function getStatsData() {
        $statsData = file(dirname(__FILE__) . '/../../QuizStatistics.txt');
        if ($statsData) { //For testing
            $entries = unserialize($statsData);
            return $entries;
        }
        $stats = array();
        for ($i = 0; $i < 20; $i++) {
            $stats[$i] = "...";
        }
        return $stats;
    }

    function checkQuizAnswers() {
        if (isset($_POST["a"])) {
            echo "No Quiz Taken";
            return "";
        }
        $answers = $_POST["a"];
        $key = array(); //Need to insert key
        for ($i = 0; $i < 20; $i++) {
            if ($answers[$i] == $key[$i]) {
                //Record the correctness respective to the word rank
            }
        }
        return []; //Maybe return the work rank array
    }

    function enterNewStats() {
        
    }
}