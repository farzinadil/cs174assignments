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
            // set quiz name to the name of the text file in the quizes folder
            $quizName = "english";

            return $quizName;
        }
        return $quizName;
    }

}