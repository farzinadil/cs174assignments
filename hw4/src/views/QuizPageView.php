<?php
namespace cs174assignments\hw4\src\views;

class QuizPageView {

    private $quizName;
    private $data;
    private $numberOfQuestions;

    function __construct($quizName, $data) {
        $this->quizName = $quizName;
        $this->data = $data;
        $this->numberOfQuestions = 20;
    }

    function render() {
        require_once('src/views/layouts/header.php');
        // displays the quiz name
        echo "/" . $_POST['quiz'] . "</h1>";
        ?>
        <p>Select the words that could be used to fill in the blank (at least one should work).</p>
            <?php
                $answerArr = array();
                $numbers = 1;
                for ($index = 0; $index < $this->numberOfQuestions; $index++){                  
                    echo "<form id='questions$numbers' action='GET'>";
                    echo "<p>" . $numbers . ". " . $this->data[$index] . "</p>";
                    //Insert quiz problems here
                    // quiz problems come from data param
                    echo "<input type='checkbox' id='0' name='1stchoice'>";
                    echo "<label for='1st'>choice 1</label><br>";
                    echo "<input type='checkbox' id='1' name='2ndchoice'>";
                    echo "<label for='2nd'>choice 2</label><br>";
                    echo "<input type='checkbox' id='2' name='3rdchoice'>";
                    echo "<label for='3rd'>choice 3</label><br>";
                    echo "<input type='checkbox' id='3' name='4thchoice'>";
                    numbers++;
                }
                echo "<br>";
            ?>
            <script type="text/javascript">
                function onClick() {
                    let answers = 0;
                    for (let i = 1; i < 21; i++){
                        let element = document.getElementById(`questions${i}`);
                        for (const child of element.children) {
                            if (child.type == 'checkbox' && child.checked)
                            answers++;
                        }
                    }
                    if (!(answers >= 20)) {
                        alert("You must answer each question with at least one solution.")
                        return false;
                    } else {
                        return true;
                    }
                    
                }
                
            </script>
        <form>
            <button onclick="return onClick();">Submit</button>
        </form>
        <?php
    }
}