<?php
namespace cs174assignments\hw4\src\views;

class LandingView {

    private $quiz;

    /**
     * Initiate and paste the quiz names array
     */
    function __construct($quiz) {
        $this->quiz = $quiz;
    }

    /**
     * Render the page with include quiz names
     */
    function render() {
        require_once('src/views/layouts/header.php');
        ?>
            <form>
            </h1>
                <select name="quiz" id="quiz"> <?php
                echo "<option value='' disabled selected>Choose a quiz</option>";
                foreach($this->quiz as $q) {
                    echo "<option value=" . $q . ">" . $q . "</option>";
                }
                ?>
                </select>
                <p>Years Experience:</p>
                <input type="number" name="years" id="years" required>
            <br></br>
            <button><a style="text-decoration: none; color: inherit;" href="index.php?c=QuizPage">Start Quiz</a></button>
            <button><a style="text-decoration: none; color: inherit;" href="index.php?c=Stats">See Results</a></button>
            </form>
        </div>
        <?php
    }

}