<!DOCTYPE html>
<html>
<body>

<h1>Pizza Place</h1>

<?php
function toppings() {
    echo "<h2>Toppings</h2>";
    $toppings = array("Pepperoni", "Cheese", "Hawaiian", "Meat Lovers", "Veggie");
    echo "<form action='index.php' method='post'>";
    for ($i = 0; $i < 5; $i++) {
        echo "<input type='checkbox' name='topping[]' value='" . $toppings[$i] . "'>" . $toppings[$i] . "<br>";
    }
    echo "<input type='submit' name='page' value='detail'>";
    echo "</form>";
}
function menu() {
    echo "<h2>Menu</h2>";
    $pizza = array("Pepperoni", "Cheese", "Hawaiian", "Meat Lovers", "Veggie");
    $price = array(10, 8, 12, 14, 11);
    $popularity = array(1, 2, 3, 4, 5);
    $order = array("Order", "Order", "Order", "Order", "Order");
    echo "<table border='1'>
    <tr>
    <th>Pizza</th>
    <th>Price</th>
    <th>Popularity</th>
    <th>Order</th>
    </tr>";
    for ($i = 0; $i < 5; $i++) {
        echo "<tr>";
        echo "<td>" . $pizza[$i] . "</td>";
        echo "<td>" . $price[$i] . "</td>";
        echo "<td>" . $popularity[$i] . "</td>";
        echo "<td>" . $order[$i] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    // order button 
    echo "<form action='index.php' method='post'>";
    echo "<input type='submit' label='order' name='page' value='toppings'>";
    echo "</form>";

    
  }

  //function to list details of pizzed selected
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

$page = $_POST['page'];






switch ($page) {
    case "detail":
        echo detail();
        break;
    case "toppings":
        echo toppings();
        break;
    default:
        echo menu();
}





?> 

</body>
</html>
