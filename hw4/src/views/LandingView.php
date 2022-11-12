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
            <form>
            <select name="quizzes" id="quizzes"> <?php
                echo "<option value='' disabled selected>Choose a quiz</option>";
                foreach($this->quizzes as $q) {
                    echo "<option value=" . $q . ">" . $q . "</option>";
                }
                ?>
            </select>
            <p>Years Experience:</p>
            <input type="number" name="years" id="years" required>
            <br></br>
            <button>Start Quiz</button>
            <button>See Results</button>
            </form>
        </div>
        <?php
    }

}