<?php
namespace cs174assignments\hw4\src\models;

class QuizPageModel extends Model {

    /**
     * Get data for the quiz
     */
    function getQuizData($quizname) {
        $data;
        if (!isset($data)) { //For Testing
            // add each line of the text file in quizes folder to an array
            $data = file(dirname(__FILE__) . '/../../quizes/' . $quizname . '.txt');
            return $data;
        }
        return $data;
    }

}