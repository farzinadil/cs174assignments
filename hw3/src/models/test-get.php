<?php
// display policy data
// connect to mysql
$server_name = "localhost";
$user_name = "root";
$password = "root";
$connection = mysqli_connect($server_name, $user_name, $password);

// check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// select database insurance
$sql = "USE insurance";
if (mysqli_query($connection, $sql)) {
    echo "Database selected successfully";
} else {
    echo "Error selecting database: " . mysqli_error($connection);
}

// select data from table
$sql = "SELECT * FROM policy";
$result = mysqli_query($connection, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Title: " . $row["title"]. " - Agent Email: " . $row["agent_email"]. " - Duration: " . $row["duration"]. " - Description: " . $row["description"]. " - Views: " . $row["views"]. " - Types: " . $row["types"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($connection);
?>