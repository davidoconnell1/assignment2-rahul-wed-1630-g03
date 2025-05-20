<?php
session_start();
require_once('settings.php');
$conn = mysqli_connect("localhost", "root", "", "project2db");
if ($conn) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $suburb = $_POST['suburb'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $jobnumber = $_POST['jobnumber'];
    $experience = $_POST['experience'];
    $otherskills = $_POST['skills'];

    $sql = "
    CREATE TABLE `eoi` (
    `EOInumber` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Job Reference Number` int(11) NOT NULL,
    `First Name` varchar(50) NOT NULL,
    `Last Name` varchar(50) NOT NULL,
    `Street Address` varchar(100) NOT NULL,
    `Suburb/town` varchar(100) NOT NULL,
    `State` varchar(10) NOT NULL,
    `Postcode` int(11) NOT NULL,
    `Email Address` varchar(100) NOT NULL,
    `Phone number` int(11) NOT NULL,
    `Python experience` tinyint(1) NOT NULL,
    `SQL experience` tinyint(1) NOT NULL,
    `C/C++ experience` tinyint(1) NOT NULL,
    `PowerShell experience` tinyint(1) NOT NULL,
    `Other skills` text NOT NULL,
    `Status` set('New','Current','Final') NOT NULL DEFAULT 'New'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    "




    mysqli_query();






    //echo '<pre>'; print_r($experience); echo '</pre>';
    //echo "$otherskills <br>";
    //print_r($experience);
    //echo "$experience[0]";


    //$result = mysqli_query();
} else {
    die("Connection falied: " . mysqli_connect_error());
}