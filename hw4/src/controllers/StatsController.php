<?php
namespace cs174assignments\hw4\src\controllers;
use cs174assignments\hw4\src\models\StatsModel;
use cs174assignments\hw4\src\views\StatsView;

class StatsController {

    private $model;
    private $view;
    private $stats;
    private $quizName;

    /**
     * Creates a new Stats Controller
     * Then get all stats from the txt file
     * After that, render the page
     */
    function  __construct() {
        $this->model = new StatsModel();
        $this->stats = $this->model->getStatsData();
        $this->quizName = $this->model->getQuizName();
        $this->view = new StatsView($this->stats, $this->quizName);
        $this->view->render();
    }
}