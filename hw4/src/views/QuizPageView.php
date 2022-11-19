<?php
namespace cs174assignments\hw4\src\views;

class QuizPageView {

    private $quizName;
    private $data;

    function __construct($quizName, $data) {
        $this->quizName = $quizName;
        $this->data = $data;
    }

    function render() {
        require_once('src/views/layouts/header.php');
<<<<<<< Updated upstream
            echo "/" . $this->quizName . "</h1>";
=======
        // displays the quiz name
        echo "/" . $_POST['quiz'] . "</h1>";
>>>>>>> Stashed changes
        ?>
        <p>Select the words that could be used to fill in the blank (at least one should work).</p>
            <?php
                $index = 0;
                while ($index < 20) {
                    echo "<form>";
                    echo "<p>" . $index+1 . ". " . $this->data[$index] . "</p>";
                    //Insert quiz problems here
                    echo "<input type='radio' id='1st' name='1stchoice'>";
                    echo "<label for='1st'>choice 1<label><br>";
                    echo "<input type='radio' id='2nd' name='2ndchoice'>";
                    echo "<label for='2nd'>choice 2<label><br>";
                    echo "<input type='radio' id='3rd' name='3rdchoice'>";
                    echo "<label for='3rd'>choice 3<label><br>";
                    echo "<input type='radio' id='4th' name='4thchoice'>";
                    echo "<label for='4th'>choice 4<label><br>";
                    echo "</form>";
                    $index++;
                }
                echo "<br>";
            ?>
        <form>
            <button>Submit</button>
        </form>
        <?php
    }
}