<?php
namespace cs174assignments\hw4\src\models;

class LandingModel extends Model {

    

    /**
     * Gets all the quiz names to display on page
     */
    function getAllQuizzes() {
        $quizNames = [];
        // loop through each subfolder in the folder named "executables" and get name of each text file
        $dir = new \DirectoryIterator(dirname(__FILE__) . '/../../quizes');
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                // get name of each text file
                $quizName = $fileinfo->getFilename();
                $quizName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $quizName);
                $quizNames[] = $quizName;
            }
        }
        return $quizNames;
    }

}