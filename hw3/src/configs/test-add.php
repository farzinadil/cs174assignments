<?php
// add policy to database
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






// insert data into table
$sql = "INSERT INTO policy (title, agent_email, duration, description, views, types)
VALUES ('Life Insurance', 'agent@monster.com', '50', 'term life insurace policy $300,000', 0, 'Life')";

if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>