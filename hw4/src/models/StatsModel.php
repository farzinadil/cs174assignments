<?php
namespace cs174assignments\hw4\src\models;

class StatsModel extends Model {

    /**
     * Gets all the stats from the QuiaStatistics.txt file
     */
    function getStatsData() {
        $stats;
        if (!isset($stats)) { //For testing
            for ($i = 0; $i < 20; $i++) {
                $stats[$i] = "(Read data from file)";
            }
            return $stats;
        }
        return $stats;
    }
}