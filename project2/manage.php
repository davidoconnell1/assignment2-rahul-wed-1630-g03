<?php
require_once("settings.php"); 

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("<p>Database connection failure</p>");
}

$query = "SELECT * FROM eoi";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage EOIs</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <?php
    include 'header.inc';
    include 'nav.inc';
  ?>

  <table1>
    <h1>List of all EOIs</h1>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
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
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No EOI records found.</p>";
    }

    mysqli_close($conn);
    ?>
  </table1>
</body>
</html>
