<?php
// Database connection settings
$servername = "localhost"; // Change this to your database server
$username = "root";        // Change this to your database username
$password = "";            // Change this to your database password
$dbname = "your_database"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from 'eoi' table
$sql = "SELECT * FROM eoi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage - Intelligenz Analytics</title>
    <link rel="stylesheet" href="styles/style.css">
  </head>
  <body>
    <header>
      <img id="logo" src="images/image.png" alt="Intelligenz logo">
      <h1>Intelligenz Analytics - Manage</h1>
    </header>
    <nav class="menu">
      <ul>
        <li> <a href="index.html">Home</a></li>
        <li> <a href="jobs.html">Jobs</a></li>
        <li> <a href="apply.php">Apply</a></li>
        <li> <a href="about.html">About</a></li>
        <li> <a href="manage.php">Manage</a></li>
        <li> <a href="mailto:intelligenzanalytics@gmail.com">Email</a></li>
      </ul>
    </nav>

    <!-- Table to display data from the 'eoi' table -->
    <section>
      <h2>EOI Submissions</h2>
      <?php
      if ($result->num_rows > 0) {
          // Start table structure
          echo "<table border='1'>
                  <thead>
                    <tr>
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
                      <th>Python Experience</th>
                      <th>SQL Experience</th>
                      <th>C/C++ Experience</th>
                      <th>PowerShell Experience</th>
                      <th>Other Skills</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>";

          // Output data for each row
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>" . $row["EOInumber"] . "</td>
                      <td>" . $row["Job Reference Number"] . "</td>
                      <td>" . $row["First Name"] . "</td>
                      <td>" . $row["Last Name"] . "</td>
                      <td>" . $row["Street Address"] . "</td>
                      <td>" . $row["Suburb/town"] . "</td>
                      <td>" . $row["State"] . "</td>
                      <td>" . $row["Postcode"] . "</td>
                      <td>" . $row["Email Address"] . "</td>
                      <td>" . $row["Phone number"] . "</td>
                      <td>" . ($row["Python experience"] ? "Yes" : "No") . "</td>
                      <td>" . ($row["SQL experience"] ? "Yes" : "No") . "</td>
                      <td>" . ($row["C/C++ experience"] ? "Yes" : "No") . "</td>
                      <td>" . ($row["PowerShell experience"] ? "Yes" : "No") . "</td>
                      <td>" . ($row["Other skills"] ? $row["Other skills"] : "N/A") . "</td>
                      <td>" . $row["Status"] . "</td>
                    </tr>";
          }

          // Close table structure
          echo "</tbody></table>";
      } else {
          echo "<p>No records found</p>";
      }

      // Close the connection
      $conn->close();
      ?>
    </section>
  </body>
</html>
