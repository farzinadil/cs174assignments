<?php
namespace cs174assignments\hw4\src\controllers;
use cs174assignments\hw4\src\models\LandingModel;
use cs174assignments\hw4\src\views\LandingView;

class LandingController extends Controller {

    private $model;
    private $view;

    function __construct() {
        $this->model = new LandingModel();
        $quizzes = $this->model->getAllQuizzes();
        $view = new LandingView($quizzes);
        $view->render();
    }
}