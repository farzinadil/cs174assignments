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
        </h1>
        <div>
        <form action="index.php?c=QuizPage" method="POST">
            <select name="quiz" id="quiz"> <?php
             echo "<option value='template'>Choose a quiz</option>";
            foreach($this->quiz as $q) {
                echo "<option value=" . $q . ">" . $q . "</option>";
            }                
            ?>
            </select>
            <p>Years Experience:</p>
            <input type="number" name="years" id="years" required>
            <br></br>
            <?php
            if(isset($_GET["quiz"])) {
                $selected = $_GET["quiz"];
            } else {
                $selected = "n/a";
            }
            ?>
            <button>Start Quiz</button>
            <button formaction="index.php?c=Stats">See Results</button>
            </form>
        </div>
        <?php
    }

}