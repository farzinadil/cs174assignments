<?php
// delete database insurance
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
$sql = "DROP DATABASE insurance";
if (mysqli_query($connection, $sql)) {
    echo "Database deleted successfully";
} else {
    echo "Error deleting database: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
