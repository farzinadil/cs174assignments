<?php
namespace cs174assignments\hw4\src\controllers;
use cs174assignments\hw4\src\models\QuizPageModel;
use cs174assignments\hw4\src\views\QuizPageView;

class QuizPageController {

    private $view;
    private $model;
    private $quizName;
    private $data;

    function __construct() {
        $this->model = new QuizPageModel();
        $this->quizName = $this->model->getQuizName();
        $this->data = $this->model->getQuizData($this->quizName);
        $this->view = new QuizPageView($this->quizName, $this->data);
        $this->view->render();
    }

}