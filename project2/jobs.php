<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Available Jobs - Intelligenz Analytics</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <!-- Header with Company Logo and Name -->
  <?php include 'header.inc'; ?>

  <!-- Menu / Navigation -->
  <?php include 'nav.inc'; ?>

  <!-- Main Content Section -->
  <main>
    <?php
    require_once('settings.php'); // Database config

    // Connect to the database
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    // Check connection
    if (!$conn) {
      echo "<p>Database connection failed: " . mysqli_connect_error() . "</p>";
    } else {
      // Fetch all jobs from database
      $query = "SELECT * FROM jobs";
      $result = mysqli_query($conn, $query);

      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<section>";
          echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
          echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
          echo "<p><strong>Salary Range:</strong> " . htmlspecialchars($row['salary']) . "</p>";
          echo "<p><strong>Reports To:</strong> " . htmlspecialchars($row['reports_to']) . "</p>";

          // Essential Skills
          echo "<h3>Required Qualifications and Skills</h3>";
          echo "<p><strong>Essential:</strong></p>";
          echo "<ul>";
          $essentialSkills = explode(',', $row['essential']);
          foreach ($essentialSkills as $skill) {
            echo "<li>" . htmlspecialchars(trim($skill)) . "</li>";
          }
          echo "</ul>";

          // Preferred Skills
          if (!empty($row['preferred'])) {
            echo "<p><strong>Preferable:</strong></p>";
            echo "<ul>";
            $preferredSkills = explode(',', $row['preferred']);
            foreach ($preferredSkills as $skill) {
              echo "<li>" . htmlspecialchars(trim($skill)) . "</li>";
            }
            echo "</ul>";
          }

          echo "</section>";
        }
      } else {
        echo "<p>No job listings found.</p>";
      }

      mysqli_close($conn);
    }
    ?>
  </main>

  <!-- Aside with Job Application Link -->
  <aside>
    <h3>Interested in applying?</h3>
    <p>For more details or to apply for a job, visit our <a href='apply.php'>Application Page</a>.</p>
  </aside>

  <!-- Footer -->
  <?php include 'footer.inc'; ?>
</body>
</html>
