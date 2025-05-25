<?php
session_start();
require_once('settings.php');

$conn = mysqli_connect("localhost", "root", "", "project2db");

if ($conn) {
    //Get form data
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $suburb = $_POST['suburb'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job_number = $_POST['jobnumber'];
    $experience = $_POST['experience'];
    $other_skills = $_POST['skills'];

    $experience_length = count($experience);
    echo "<p>$experience_length</p>";
    echo "$experience[0]";


    //Create empty eoi table if it doesn't exist
    $create_eoi_table = "
    CREATE TABLE IF NOT EXISTS `eoi` (
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
    ";

    mysqli_query($conn, $create_eoi_table);
    

    //Insert record into eoi table
    $insert_into_eoi = "
    INSERT INTO `eoi` (`EOInumber`, `Job Reference Number`, `First Name`, `Last Name`, `Street Address`, `Suburb/town`, `State`, `Postcode`, `Email Address`, `Phone number`, `Python experience`, `SQL experience`, `C/C++ experience`, `PowerShell experience`, `Other skills`, `Status`) 
    VALUES (NULL, $job_number, $first_name, $last_name, $address, $suburb, $state, $postcode, $email, $phone, '1', '0', '0', '0', $other_skills, 'New');
    ";
    //check experience booleans and status

    //mysqli_query();






    //echo '<pre>'; print_r($experience); echo '</pre>';
    //echo "$otherskills <br>";
    //print_r($experience);
    //echo "$experience[0]";


    //$result = mysqli_query();
} else {
    die("Connection falied: " . mysqli_connect_error());
}