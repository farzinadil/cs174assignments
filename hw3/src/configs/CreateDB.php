<?php
// create mysql database with php table policy with fields title, agent email, duration, description

// connect to mysql
$server_name = "localhost";
$user_name = "root";
$password = "";
$connection = mysqli_connect($server_name, $user_name, $password);

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


?>
