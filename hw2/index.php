<!DOCTYPE html>
<html>
<body>

<h1 style=color:SlateBlue><center><u>Original Pizza Place<u></center></h1>

<?php

//Main list of pizzas created
function menu() {
    echo "<h2><center>Menu<center></h2>";
    $pizza = array("Hawaiian", "Meat Lovers", "Veggie");
    $price = array(12, 14, 11);
    $popularity = array(4, 4, 5);
    $actions = array("Order", "Order", "Order");
    echo "<center><table border='0'>
    <tr>
    <th>Pizza</th>
    <th>Price</th>
    <th>Popularity</th>
    <th>Actions</th>
    </tr>";
    echo "<form action='index.php' method='post'>";
    for ($i = 0; $i < sizeof($pizza); $i++) {
        echo "<tr>";
        echo "<td style=color:SlateBlue><u>" . $pizza[$i] . "</u></td>";
        echo "<td>$" . $price[$i] . "</td>";
        echo "<td>";
        for ($j = 0; $j < $popularity[$i]; $j++) {
            echo "💗";
        }
        echo "</td>";
        //Unable to go to the delete page when clicking deleting button
        echo "<td>" . "<input type='submit' label='order' name='page' value='Edit'>" .
            "<input type='submit' label='order' name='page' value='Delete'>" . "</td>";
        echo "</tr>";
    }
    echo "</table></center>";

    echo "<center><input type='submit' label='order' name='page' value='Add Pie'></center>";
    echo "</form>";
}

//Enter Pizza create/edit mode with given amount of toppings
function toppings() {
    echo "<h2>Pie Editor</h2>";
    //Need to add functionality to save pizza name and price into menu
    echo "<input size='25' type='text' label='Pizza Name' placeholder='Enter Pizza Name'>" .
        "<input size='4' type='text' label='Pizza Price' placeholder='Price'>";
    $toppings = array("Pepperoni", "Cheese", "Green pepper", "Pineapple", "Olives");
    echo "<form action='index.php' method='post'>";
    for ($i = 0; $i < 5; $i++) {
        echo "<input type='checkbox' name='topping[]' value='" . $toppings[$i] . "'>" . $toppings[$i] . "<br>";
    }
    echo "<input type='submit' name='page' value='Create'>";
    echo "</form>";
}

//function to list details of pizza selected
function detail() {
    echo "<h2>Detail</h2>";
    //print selected toppings from post
    echo "<h3>Toppings</h3>";
    echo "<ul>";
    foreach ($_POST['topping'] as $topping) {
        echo "<li>" . $topping . "</li>";
    }
    echo "</ul>";
}

function delete() {
    //Need to add given pizza name
    echo "Are you sure you want to delete the bookmark: (INSERT PIZZA NAME)?";
    echo "<form action='index.php' method='post'>";
    //Need to add Confirm and Cancel actual functionality
    echo "<input type='submit' label='page' value='Confirm'>" .
        "<input type='submit' label='page' value=''Cancel'>";
    echo "</form>";
}

$page = $_POST['page'];






switch ($page) {
    case "Create":
        echo detail();
        break;
    case "Add Pie" || "Edit":
        echo toppings();
        break;
    case "Delete":
        echo delete();
        break;
    case "Confirm" || "Cancel":
        echo menu();
        break;
    default:
        echo menu();
}





?>

</body>
</html>