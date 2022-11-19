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
        echo "/" . $this->quizName . "</h1>";
        ?>
        <p>Select the words that could be used to fill in the blank (at least one should work).</p>
            <?php
                $numbers = 1;
                for ($index = 0; $index < $this->numberOfQuestions; $index++){                  
                    echo "<form id='questions$numbers' method='POST'>";
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
                    echo "<label for='4th'>choice 4</label><br>";
                    echo "</form>";
                    $numbers++;
                }
                echo "<br>";
            ?>
            <script type="text/javascript">
                function onClick() {
                    let answers = [];
                    // for each question (20)
                    for (let i = 0; i < 20; i++) {
                        let element = document.getElementById(`questions${i+1}`);
                        let children = element.children;
                        answers.push([]);
                        let hasAtleastOneChecked = false;
                        let iterator = 0;
                        
                        // for each possible answer
                        for (let j = 1; j < children.length-1; j+=3) {
                            let child = children[j];
                            if (child.type == 'checkbox') {
                                if (child.checked) {
                                    answers[i][iterator] = true;
                                    hasAtleastOneChecked = true;
                                } else {
                                    answers[i][iterator] = false;
                                }
                                iterator++;
                            }
                            
                        }
                        if (hasAtleastOneChecked == false) {
                            alert("You must check at least one answer per question.")
                            return false;
                        }
                    }
                    console.log(answers);
                    return answers;
                    
                }
                
            </script>
        <form>
            <button onclick="return onClick();">Submit</button>
        </form>
        <?php
    }
}