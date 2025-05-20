<?php
session_start();
require_once('settings.php');
$conn = mysqli_connect("localhost", "root", "", "projectdb.sql");
if (!conn) {
    die("Connection falied: " . mysqli_connect_error());
}