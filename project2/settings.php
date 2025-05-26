<?php
$host = "localhost";
$user = "root";
$pwd = "";
$sql_db = "project2db";

#Start the connection
$conn = mysqli_connect($host, $user, $pwd);

#Return error if unable to connect
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

#Create project2db database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS project2db";
mysqli_query($conn, $sql_create_db);

#Connect to project2db database
$sql_use_db = "USE project2db";
if (!mysqli_query($conn, $sql_use_db)) {
    die("Error connecting to database: " . mysqli_connect_error());
} else {
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
}
?>