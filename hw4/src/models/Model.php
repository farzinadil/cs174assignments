<?php
namespace cs174assignments\hw4\src\models;

class Model {

    function __construct() {

    }

    /**
     * Get the name of the quiz to display on page and url
     */
    function getQuizName() {
        if (!isset($_POST['quiz'])) { //For TESTING, need to read file name
            $quizName = "template";
            return $quizName;
        }
        return $_POST['quiz'];
    }

}