<?php
namespace cs174assignments\hw4\src\views;

class StatsView {

    private $stats;
    private $quizName;

    function __construct($stats, $name) {
        $this->stats = $stats;
        $this->quizName = $name;
    }

    function render() {
        require_once('src/views/layouts/header.php');
            echo "/" . $this->quizName . "</h1>"
            ?>
            <form>
                <select name="exp" id="exp">
                    <option value='' disabled selected>Experience</option>
                    <option value="<10">< 10 years</option>
                    <option value="10-20">10-20 years</option>
                    <option value=">20">> 20 years</option>
                </select>
            </form>
            <br>
            <table>
                <tr>
                    <th>Word Rank Percentile</th>
                    <th>% Correct</th>            
                </tr>
                <tr>
                    <td>5%</td>
                    <td>(Read data from file)</td>
                </tr>
                <?php
                    $lower = 5;
                    $upper = 10;
                    $step = 0;
                    while ($step < 19) {
                        echo "<tr>";
                        echo "<td>" . $lower . "%" . "-" . $upper . "%" . "</td>";
                        echo "<td>" . $this->stats[$step] . "</td>";
                        echo "</tr>";
                        $step++;
                        $lower += 5;
                        $upper += 5;
                    }
                ?>
            </table>
        </div>
        <?php
    }
}