<?php
session_start();
require_once("settings.php"); 

$complete_heading = $_SESSION["complete_heading"];
$complete_text = $_SESSION["complete_text"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="keywords" content="analytics, data, software, jobs, Intelligenz Analytics">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intelligenz Analytics – Form completion page</title>
    <link rel="stylesheet" href="styles/style.css">
  </head>
  <body>
  <?php 
    include 'header.inc'; 
    include 'nav.inc';
   ?>
<main>
      <!--Company description-->
      <div class="homepage_description">
        <h2><?php echo "$complete_heading"; ?></h2>
        <p><?php echo "$complete_text"; ?></p>
        <?php if ($complete_heading !== "Application received") {
            echo "<p><a href='apply.php'>  Go back</a></p>";
        } ?>
      </div>

      <!---Footer--->
      <?php include 'footer.inc'; ?>
  </body>
</html>