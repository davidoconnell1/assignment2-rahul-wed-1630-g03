<?php
require_once("settings.php"); 

#Connect to Database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<p>Database connection failure</p>");
}

$whereClause = "";
$message = "";

#Create empty eoi table if it does not already exist
include 'create_eoi.inc';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    #List all EOIs for a particular position (given a job reference number)
    if (isset($_POST['filter_jobref'])) {
        $jobRef = mysqli_real_escape_string($conn, $_POST['job_ref']);
        $whereClause = "WHERE `Job Reference Number` = '$jobRef'";
    }

    #List all EOIs for a particular applicant given their first name, last name or both
    if (isset($_POST['filter_applicant'])) {
        $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
        $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
        if ($fname && $lname) {
            $whereClause = "WHERE `First Name` = '$fname' AND `Last Name` = '$lname'";
        } elseif ($fname) {
            $whereClause = "WHERE `First Name` = '$fname'";
        } elseif ($lname) {
            $whereClause = "WHERE `Last Name` = '$lname'";
        }
    }

    #Delete all EOIs with a specified job reference number
    if (isset($_POST['delete_jobref'])) {
        $jobRef = mysqli_real_escape_string($conn, $_POST['job_ref_delete']);
        $deleteQuery = "DELETE FROM eoi WHERE `Job Reference Number` = '$jobRef'";
        if (mysqli_query($conn, $deleteQuery)) {
            $message = "EOIs with Job Reference Number $jobRef deleted.";
        } else {
            $message = "Error deleting records.";
        }
    }

    #Change the Status of an EOI
    if (isset($_POST['update_status'])) {
        $eoiNum = mysqli_real_escape_string($conn, $_POST['eoi_number']);
        $newStatus = mysqli_real_escape_string($conn, $_POST['new_status']);
        $updateQuery = "UPDATE eoi SET `Status` = '$newStatus' WHERE EOInumber = '$eoiNum'";
        if (mysqli_query($conn, $updateQuery)) {
            $message = "EOI #$eoiNum status updated to $newStatus.";
        } else {
            $message = "Error updating status.";
        }
    }
}

$query = "SELECT * FROM eoi $whereClause";
$result = mysqli_query($conn, $query);
?>

<!--HTML Section-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage EOI's</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?php include 'header.inc'; include 'nav.inc'; ?>

  <h1>Manage EOI's</h1>
<?php if ($message) echo "<p>$message</p>"; ?>

<!--List of All EOI's-->
<section>
  <h2>List of All EOI's</h2>
</section>
<?php
if ($result && mysqli_num_rows($result) > 0) {
    echo "<section>";
    echo "<table border='1'>";
    echo "<tr>
            <th>EOI Number</th>
            <th>Job Reference Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Street Address</th>
            <th>Suburb/Town</th>
            <th>State</th>
            <th>Postcode</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Python</th>
            <th>SQL</th>
            <th>C/C++</th>
            <th>PowerShell</th>
            <th>Other Skills</th>
            <th>Status</th>
          </tr>";
    echo "</section>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<section><p>No EOI records found.</p></section>";
}
?>

<!--List all EOIs for a particular position (given a job reference number)-->
<form method="post" class="form-section">
  <fieldset>
    <legend>Filter by Job Reference Number</legend>
    <div class="form-group">
      <label for="job_ref">Job Reference Number:</label>
      <input type="text" id="job_ref" name="job_ref" placeholder="Max 11 Characters" required>
    </div>
    <div class="form-group">
      <input type="submit" name="filter_jobref" value="Filter">
    </div>
  </fieldset>
</form>


<!--List all EOIs for a particular applicant given their first name, last name or both-->
<form method="post" class="form-section">
  <fieldset>
    <legend>Filter by Applicant Name</legend>

    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" id="first_name" name="first_name" placeholder="Max 50 Characters ">
    </div>

    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" id="last_name" name="last_name" placeholder="Max 50 Characters">
    </div>

    <div class="form-group">
      <input type="submit" name="filter_applicant" value="Filter">
    </div>
  </fieldset>
</form>

<!--Delete all EOIs with a specified job reference number-->
<form method="post" class="form-section">
  <fieldset>
    <legend>Delete EOIs by Job Reference Number</legend>

    <div class="form-group">
      <label for="job_ref_delete">Job Reference Number:</label>
      <input type="text" id="job_ref_delete" name="job_ref_delete" placeholder="Max 11 Characters" required>
    </div>

    <div class="form-group">
      <input type="submit" name="delete_jobref" value="Delete">
    </div>
  </fieldset>
</form>

<!--Change the Status of an EOI-->
<form method="post" class="form-section">
  <fieldset>
    <legend>Update EOI Status</legend>

    <div class="form-group">
      <label for="eoi_number">EOI Number:</label>
      <input type="number" id="eoi_number" name="eoi_number" placeholder="Max 11 Characters" required>
    </div>

    <div class="form-group">
      <label for="new_status">New Status:</label>
      <select id="new_status" name="new_status" required>
        <option value="" disabled selected>Select status</option>
        <option value="New">New</option>
        <option value="Current">Current</option>
        <option value="Final">Final</option>
      </select>
    </div>

    <div class="form-group">
      <input type="submit" name="update_status" value="Update Status">
    </div>
  </fieldset>
</form>

</body>
</html>
