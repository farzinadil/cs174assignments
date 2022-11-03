<?php
require "Config.php";
// create mysql database with php table policy with fields title, agent email, duration, description

// connect to mysql
function developConnection($constants) {
    $connection = mysqli_connect($constants->dbHost, $constants->dbUser, $constants->dbPassword);
    return $connection;
}

$constants = new Constants("localhost", "root", "root");
$connection = developConnection($constants);

// check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// create database
$sql = "CREATE DATABASE insurance";
if (mysqli_query($connection, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($connection);
}

// select database insurance
$sql = "USE insurance";
if (mysqli_query($connection, $sql)) {
    echo "Database selected successfully";
} else {
    echo "Error selecting database: " . mysqli_error($connection);
}



// create table
$sql = "CREATE TABLE policy (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
agent_email VARCHAR(50),
duration VARCHAR(50),
description VARCHAR(50),
views INT(2),
types VARCHAR(30)
)";

if (mysqli_query($connection, $sql)) {
    echo "Table policy created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connection);
}



?>
