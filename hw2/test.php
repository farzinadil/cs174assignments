<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
echo "<form action='index.php' method='post'>";
echo "<input type='radio' name='page' value='view'>View<br>";
echo "<input type='radio' name='page' value='toppings'>toppings<br>";
echo "<input type='submit' name='submit' value='Submit'>";
echo "</form>";

if (isset($_POST['submit'])) {
    $page = $_POST['page'];
    switch ($page) {
        case "view":
            echo "<h1>View</h1>";
            break;
        case "toppings":
            echo "<h1>toppings</h1>";
            break;
        default:
            echo "<h1>View</h1>";
    }
}




?> 

</body>
</html>
