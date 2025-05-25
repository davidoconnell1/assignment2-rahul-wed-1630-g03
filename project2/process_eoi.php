<?php
session_start();
require_once('settings.php');

$conn = mysqli_connect("localhost", "root", "", "project2db");

if ($conn) {
    #Initialise completed form message variable
    $message = "";

    #Get form data
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

    #Sanitize form data
    $first_name = preg_replace("~[<>/\\\ ]~", "", $first_name);
    $last_name = preg_replace("~[<>/\\\ ]~", "", $last_name);
    $dob = preg_replace("~[<>\\\ ]~", "", $dob);
    $address = preg_replace("~[<>/\\\]~", "", $address);
    $suburb = preg_replace("~[<>/\\\]~", "", $suburb);
    $postcode = preg_replace("/[^0-9]/", "", $postcode);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $phone = preg_replace("/[^0-9]/", "", $phone);

    #Check no required fields are empty
    if ($first_name == "" || $last_name == "" || $dob == "" || $address == "" || $suburb == "" || $postcode == "" || $email == "" || $phone == "" || $state == "" || $job_number == "") {
        $message = "Some required fields are missing";
    }

    #Validate length of text fields
    if (strlen($first_name) > 20) {$message = "First name should be max of 20 characters.";}
    if (strlen($last_name) > 20) {$message = "Last name should be max of 20 characters.";}
    if (strlen($address) > 40) {$message = "Street address should be max of 40 characters.";}
    if (strlen($suburb) > 40) {$message = "Suburb should be max of 40 characters.";}

    #Validate phone number
    if (strlen($phone) > 10 || strlen($phone) < 8) {$message = "Phone number is invalid.";}
    
    #Validate postcode
    $postcode = (int)$postcode;
    if ($state == "vic") {
        if ($postcode < 3000 || $postcode > 8999) {
            $message = "Postcode does not match state";
        } else {
            if ($postcode > 3996 && $postcode < 8000) {
                $message = "Postcode does not match state";
            }
        }
    } elseif ($state == "nsw") {
        if ($postcode < 1000 || $postcode > 2999) {
            $message = "Postcode does not match state";
        } else {
            if ($postcode > 2599 && $postcode < 2619) {
                $message = "Postcode does not match state";
            } else {
                if ($postcode > 2899 && $postcode < 2921) {
                    $message = "Postcode does not match state";
                }
            }
        }
    } elseif ($state == "qld") {
        if ($postcode < 4000 || $postcode > 9999) {
            $message = "Postcode does not match state";
        } else {
            if ($postcode > 3996 && $postcode < 9000) {
                $message = "Postcode does not match state";
            }
        }
    } elseif ($state == "nt") {
        if ($postcode < 800 || $postcode > 999) {
            $message = "Postcode does not match state";
        }
    } elseif ($state == "wa") {
        if ($postcode < 6000 || $postcode > 6999) {
            $message = "Postcode does not match state";
        } else {
            if ($postcode > 6797 && $postcode < 6800) {
                $message = "Postcode does not match state";
            }
        }
    } elseif ($state == "sa") {
        if ($postcode < 5000 || $postcode > 5999) {
            $message = "Postcode does not match state";
        }
    } elseif ($state == "tas") {
        if ($postcode < 7000 || $postcode > 7999) {
            $message = "Postcode does not match state";
        }
    } elseif ($state == "act") {
        if ($postcode < 200 || $postcode > 2920) {
            $message = "Postcode does not match state";
        } elseif ($postcode > 299 && $postcode < 2600) {
            $message = "Postcode does not match state";
        } elseif ($postcode > 2618 && $postcode < 2900) {
            $message = "Postcode does not match state";
        }
    }

    #Assign programming experience variables from checkbox input     
    if (in_array("python", $experience)) {
        $python = 1;
    } else {
        $python = 0;
    }
    if (in_array("sql", $experience)) {
        $sql = 1;
    } else {
        $sql = 0;
    }
    if (in_array("c", $experience)) {
        $c = 1;
    } else {
        $c = 0;
    }
    if (in_array("powershell", $experience)) {
        $powershell = 1;
    } else {
        $powershell = 0;
    }



    #SQL to create empty eoi table if it doesn't exist
    $create_eoi_table = "
    CREATE TABLE IF NOT EXISTS `eoi` (
    `EOInumber` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Job Reference Number` set('Select','10000','10001') NOT NULL DEFAULT 'Select',
    `First Name` varchar(20) NOT NULL,
    `Last Name` varchar(20) NOT NULL,
    `Street Address` varchar(40) NOT NULL,
    `Suburb/town` varchar(40) NOT NULL,
    `State` set('Select','VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL DEFAULT 'Select',
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
        INSERT INTO eoi (`Job Reference Number`, `First Name`, `Last Name`, `Street Address`, `Suburb/town`, `State`, `Postcode`, `Email Address`, `Phone number`, `Python experience`, `SQL experience`, `C/C++ experience`, `PowerShell experience`, `Other skills`) 
        VALUES ('$job_number', '$first_name', '$last_name', '$address', '$suburb', '$state', $postcode, '$email', $phone, $python, $sql, $c, $powershell, '$other_skills');
    ";

    if ($message == "") {
        $result = mysqli_query($conn, $insert_into_eoi);
        if ($result) {
            $complete_heading = "Application received";
            $complete_text = "Your application has been received with EOI number: " . mysqli_insert_id($conn);
            $_SESSION['complete_heading'] = $complete_heading;
            $_SESSION['complete_text'] = $complete_text;
            header("Location: completedform.php");
        } else { 
            $complete_heading = "Internal server error";
            $complete_text = "Unable to submit application due to an internal server error.";
            $_SESSION['complete_heading'] = $complete_heading;
            $_SESSION['complete_text'] = $complete_text;
            header("Location: completedform.php");
        }
    } else {
            $complete_heading = "Application error";
            $complete_text = "Application submission raised the following error: " . $message;
            $_SESSION['complete_heading'] = $complete_heading;
            $_SESSION['complete_text'] = $complete_text;
            header("Location: completedform.php");
    }

} else {
    die("Connection falied: " . mysqli_connect_error());
}