<?php
namespace cs174assignments\hw4\src\controllers;
use cs174assignments\hw4\src\models\LandingModel;
use cs174assignments\hw4\src\views\LandingView;

class LandingController extends Controller {

    private $model;
    private $view;
    private $quizzes;

    /**
     * Creates a LandingController
     * Gets all quizzes from model to display
     * After that, create a new view obj and render the view
     */
    function __construct() {
        $this->model = new LandingModel();
        $this->quizzes = $this->model->getAllQuizzes();
        $this->view = new LandingView($this->quizzes);
        $this->view->render();
    }
}