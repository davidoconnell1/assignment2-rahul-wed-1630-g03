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

    






    //echo '<pre>'; print_r($experience); echo '</pre>';
    echo "$otherskills <br>";

    print_r($experience);
    //echo "$experience[0]";


    //$result = mysqli_query();
} else {
    die("Connection falied: " . mysqli_connect_error());
}