<?php
namespace cs174assignments\hw4\src\models;

class Model {

    function __construct() {

    }

    /**
     * Get the name of the quiz to display on page and url
     */
    function getQuizName() {
        $quizName; 
        if (!isset($quizName)) { //For TESTING, need to read file name
            $quizName = "Template";
            return $quizName;
        }
        return $quizName;
    }

}