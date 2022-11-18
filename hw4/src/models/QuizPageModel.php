<?php
namespace cs174assignments\hw4\src\models;

class QuizPageModel extends Model {

    /**
     * Get data for the quiz
     */
    function getQuizData($quizname) {
        $data;
        if (!isset($data)) { //For Testing
            for ($i = 0; $i < 20; $i++) {
                $data[$i] = "(Insert Sentence Problems)";
            }
            return $data;
        }
        return $data;
    }

}