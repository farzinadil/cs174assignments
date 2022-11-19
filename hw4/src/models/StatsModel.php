<?php
namespace cs174assignments\hw4\src\models;

class StatsModel extends Model {

    const STATS_FILE = "QuizStatistics.txt";

    /**
     * Gets all the stats from the QuiaStatistics.txt file
     */
    function getStatsData() {
        if (!file_exists(STATS_FILE)) { //For testing
            $stats;
            for ($i = 0; $i < 20; $i++) {
                $stats[$i] = "..";
            }
            return $stats;
        }
        $entries = unserialize(file_get_contents(STATS_FILE));
        return $entries;
    }

    function quizAnswers() {
        return [];
    }

    function enterNewStats() {
        if
    }

    function answerChecker() {

    }
}