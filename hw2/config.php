<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 
    <!-- PHP serve multiple pages with a switch statement-->
    <?php
    $page = "menu";
    switch ($page) {
        case "menu":
            echo "<h1>Menu</h1>";
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
            break;
        case "toppings":
            echo "<h1>Toppings</h1>";
            $toppings = array("Pepperoni", "Cheese", "Hawaiian", "Meat Lovers", "Veggie");
            echo "<form action='index.php' method='post'>";
            for ($i = 0; $i < 5; $i++) {
                echo "<input type='checkbox' name='toppings[]' value='" . $toppings[$i] . "'>" . $toppings[$i] . "<br>";
            }
            echo "<input type='submit' name='submit' value='Submit'>";
            echo "</form>";
            break;
        default:
            echo "<h1>Menu</h1>";
            $pizza = array("Pepperoni", "Cheese", "Hawaiian", "Meat Lovers", "Veggie");
            $price = array(10, 8, 12, 14, 11);
            $popularity = array(1, 2, 3, 4, 5);
            $order = array
        }
    ?>


 </body>
</html>