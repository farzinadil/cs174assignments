<?php
namespace cs174assignments\hw4\src\models;

class StatsModel extends Model {

    const STATS_FILE = "QuizStatistics.txt";

    /**
     * Gets all the stats from the QuiaStatistics.txt file
     */
    function getStatsData() {
        $stats;
        if (!isset($stats)) { //For testing
            for ($i = 0; $i < 20; $i++) {
                $stats[$i] = "..";
            }
            return $stats;
        }
        return $stats;
    }

    function enterNewStats() {

    }
}