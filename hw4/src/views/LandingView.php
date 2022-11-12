<?php
namespace cs174assignments\hw4\src\views;

class LandingView {

    private $quizzes;

    function __construct($quizzes) {
        $this->quizzes = $quizzes;
    }

    function render() {
        require_once('src/views/layouts/header.php');
        ?>
            </h1>
            <select name="quizzes" id="quizzes">
                <option value="Choose a quiz">Choose a quiz</option>
            </select>
            <p>Years Experience:</p>
            <input type="number" name="years" id="years">
            <button>Start Quiz</button>
            <button>See Results</button>
        </div>
        <?php
    }

}