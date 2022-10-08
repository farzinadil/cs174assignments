
<?php
const PIE_FILE = "Pizzas.txt";
$activity = (isset($_REQUEST['a']) && in_array($_REQUEST['a'],
        ["menu", "edit", "detail", "delete"])) ? $_REQUEST['a'] . "Controller" : "menuController";
$activity();

function menuController() {
    $pizza["PIE_FILE"] = getEntries();
    $pizza["PIE_FILE"] = processNewPie($pizza["PIE_FILE"]);
    $layout = (isset($_REQUEST['f']) && $_REQUEST['f'] == "html") ? $_REQUEST['f'] . "Layout" : "htmlLayout";
    $layout($pizza, "menuView");
}

function getEntries() {
    if (file_exists(PIE_FILE)) {
        $entries = unserialize(file_get_contents(PIE_FILE));
        if ($entries) {
            return $entries;
        }
    }
    return [];
}

function processNewPie($pizza) {
    //add new pizza to array with name, price, list of toppings, and view count
    if (isset($_REQUEST['name']) && isset($_REQUEST['price']) && isset($_REQUEST['topping'])) {
        $pizza[] = [
            "name" => $_REQUEST['name'],
            "price" => $_REQUEST['price'],
            "topping" => $_REQUEST['topping'],
            "viewCount" => 0
        ];
        file_put_contents(PIE_FILE, serialize($pizza));
    }
    return $pizza;
}

function editController() {
    $pizza["NAME"] = (isset($_REQUEST['name'])) ?
        filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING) : "";
    $entries = getEntries();
    $layout = (isset($_REQUEST['f']) && $_REQUEST['f'] == "html") ? $_REQUEST['f'] . "Layout" : "htmlLayout";
    $layout($pizza, "editView");
}

function detailController() {
    $pizza["NAME"] = (isset($_REQUEST['name'])) ?
        filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING) : "";
    $entries = getEntries();
    $layout = (isset($_REQUEST['f']) && $_REQUEST['f'] == "html") ? $_REQUEST['f'] . "Layout" : "htmlLayout";
    $layout($pizza, "detailView");
}

//delete pizza from menu
function deleteController() {
    $name = (isset($_REQUEST['name'])) ?
        filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING) : "";
    $entries = getEntries();
    if (isset($entries[$name])) {
        unset($entries[$name]);
        file_put_contents(PIE_FILE, serialize($entries));
    }
    $layout = (isset($_REQUEST['f']) && $_REQUEST['f'] == "html") ? $_REQUEST['f'] . "Layout" : "htmlLayout";
    $layout($entries, "menuView");
}

function htmlLayout($pizza, $view) {
    ?><!DOCTYPE html>
<html>
    <head>
        <title>Original Pizza Place <?php if (!empty($pizza['NAME'])) {
        echo ":" . $pizza['NAME'];
    } ?></title>
    </head>
    <body>
    <?php
    $view($pizza);
    ?>
    </body>
</html><?php
}

function menuView($pizza) {
    ?>
    <h1><a href="index.php">Original Pizza Place</a></h1>
    <h2>Menu</h2>
    <form>
    <div>
        <table>
            <tr>
                <th>Pizza</th>
                <th>Price</th>
                <th>Popularity</th>
                <th>Actions</th>
            </tr>
            <?php
            session_start();
            if (!empty($pizza)) {
                foreach($pizza["PIE_FILE"] as $key => $value) {
                    $name = $value["name"];
                    ?><tr>
                        <td><a href="index.php?a=detail&name=<?=urlencode($name)?>">
                                <?=$name?></a></td>
                        <td>$<?=$value["price"]?></td>
                        <td><?php
                            if (isset($_SESSION[$name]['views'])) {
                                $views = $_SESSION[$name]['views'];
                                $log5Views = log($views, 5);
                                for ($i = 0; $i < $log5Views; $i++) {
                                    echo "💗 ";
                                }
                            }
                            else {
                                echo "💔";
                            }
                            ?>
                        </td>
                        <td>
                            <button><a style="text-decoration: none; color: inherit;" href="index.php?a=edit&name=<?=urlencode($name)?>">✏️</a></button>
                            <button><a style="text-decoration: none; color: inherit;" href="index.php?a=delete&name=<?=urlencode($name)?>">🗑️</a></button>
                        </td>
                    </tr>
                    <?php
                 }
            }?>
        </table>
    </div>
        <button><a style="text-decoration: none; color: inherit; text-align-all: center;" href="index.php?a=edit">Add Pie</a></button><?php
}

function editView($pizza) {
    $toppings = array("Red Sauce", "Mozzarella", "Pepperoni", "Pineapple",
        "Green Peppers", "Ham", "Mushrooms", "Anchovies");
    ?>
    <h1><a href="index.php">Original Pizza Place</a></h1>
    <h2>Pie Editor</h2>
    <form>
    <input size='25' type='text' name='name' placeholder='Enter Pizza Name' required>
    <input size='10' type='text' name='price' placeholder='Pizza Price' required>
    <h3>Toppings: </h3>
    <div>
    <?php
    foreach ($toppings as $topping) {
        echo "<input type='checkbox' name='topping[]' value='" . $topping . "'>" . $topping . "<br>";
    }
    ?></div>
    <button>Create</button></form><?php
}

function deleteView($data) {
       ?> <?php

}

function detailView($data) {

    session_start();

    $name = $data["NAME"];
    if(isset($_SESSION[$name]['views']))
        $_SESSION[$name]['views'] = $_SESSION[$name]['views']+1;
    else
         $_SESSION[$name]['views'] = 1;

     echo "views = ".$_SESSION[$name]['views'];
    ?>

    <h1><a href="index.php">Original Pizza Place</a></h1>

    <?php
}

?>