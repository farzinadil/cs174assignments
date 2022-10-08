
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

function processDeletePie($pizza) {
    //delete pizza from file
    $newPizza = [];
    if (isset($_REQUEST['name'])) {
        $name = $_REQUEST['name'];
        for ($i = 0; $i < count($pizza); $i++) {
            if ($pizza[$i]['name'] == $name) {
                //add pizza to new array
                array_push($newPizza, $pizza[$i]);

            }
        }
        file_put_contents(PIE_FILE, serialize($newPizza));
    };
    /*
    if (isset($_REQUEST['name'])) {
        $name = $_REQUEST['name'];
        $pizza = array_filter($pizza, function ($pizza) use ($name) {
            return $pizza['name'] != $name;
        });
        file_put_contents(PIE_FILE, serialize($pizza));
    }
    */

    // clear file
    /*
    file_put_contents(PIE_FILE, serialize([]));
    return [];
    */



}


function editController() {
    $pizza["NAME"] = (isset($_REQUEST['name'])) ?
        filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING) : "";
    $pizza["PRICE"] = (isset($_REQUEST['price'])) ?
        filter_var($_REQUEST['price'], FILTER_SANITIZE_NUMBER_INT) : "";
    $pizza["PIE_FILE"] = getEntries();
    $layout = (isset($_REQUEST['f']) && $_REQUEST['f'] == "html") ? $_REQUEST['f'] . "Layout" : "htmlLayout";
    $layout($pizza, "editView");
}

function detailController() {
    $pizza["NAME"] = (isset($_REQUEST['name'])) ?
        filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING) : "";
    $layout = (isset($_REQUEST['f']) && $_REQUEST['f'] == "html") ? $_REQUEST['f'] . "Layout" : "htmlLayout";
    $layout($pizza, "detailView");
}

function deleteController() {
    $name = (isset($_REQUEST['name'])) ?
        filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING) : "";
    $entries = getEntries();
    $layout = (isset($_REQUEST['f']) && $_REQUEST['f'] == "html") ? $_REQUEST['f'] . "Layout" : "htmlLayout";
    $layout($name, "deleteView");
}

function htmlLayout($pizza, $view) {
    ?><!DOCTYPE html>
<html>
    <head>
        <title>Original Pizza Place</title>
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
                foreach($pizza["PIE_FILE"] as $value) {
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
    <h2>Pie Editor</h2><form><?php
    if (empty($pizza["NAME"])) {?>
            <input size='25' type='text' name='name' placeholder='Enter Pizza Name' required>
            <input size='10' type='text' name='price' placeholder='Pizza Price' required>
            <h3>Toppings: </h3>
            <div><?php
                foreach ($toppings as $topping) {
                    echo "<input type='checkbox' name='topping[]' value='" . $topping . "'>" . $topping . "<br>";
                } ?><button>Create</button></div><?php
    } else {
        print($pizza["NAME"]);
        echo ": <input size='10' type='text' name='price' placeholder='Pizza Price' required></p>";
        ?>
            <h3>Toppings</h3>
            <div><?php
                $temp = array();
                foreach($pizza["PIE_FILE"] as $pie) {
                    if ($pizza["NAME"] == $pie['name']) {
                        $temp = $pie['topping'];
                        break;
                    }
                }
                foreach ($toppings as $topping) {
                    $checked = false;
                    for ($j = 0; $j < count($temp); $j++) {
                        if ($topping == $temp[$j]) {
                            echo "<input type='checkbox' name='topping[]' value='" . $topping . "' checked>" . $topping . "<br>";
                            $checked = true;
                            break;
                        }
                    }
                    if (!$checked) {
                        echo "<input type='checkbox' name='topping[]' value='" . $topping . "'>" . $topping . "<br>";
                    }
                }
                ?><button>Save</button></div><?php
    }?>
    </form><?php
}

function deleteView($data) {

    // buttons to confirm or cancel deletion
    // if confirmed, redirect to menu page with delete action
    // if cancelled, redirect to menu page 
    ?>
    <h1><a href="index.php">Original Pizza Place</a></h1>
    <h2>Delete Pie</h2>
    <form>
    <div>
        <p>Are you sure you want to delete <?=$data?>?</p>
        
        <button><a href="index.php<?=processDeletePie($data)?>">Confirm</a></button>
        <button><a href="index.php">Cancel</a></button>
    </div>
    </form><?php
            /*

        ?> <h1><a href="index.php">Original Pizza Place</a></h1>
        <h2>Delete Pie</h2>
        <form>
        <div>
            <p>Are you sure you want to delete this pie?</p>
            <button>Yes</button>
            <button>No</button>
        </div>
        </form><?php
        */


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