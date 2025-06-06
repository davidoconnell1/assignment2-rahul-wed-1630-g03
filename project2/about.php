<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="About page for Intelligenz Analytics">
  <meta name="keywords" content="About, Intelligenz Analytics">
  <meta name="author" content="Lachie Schroen">
  <title>About</title>
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <header> 
    <!-- Logo / Company Name-->
    <?php 
      include 'header.inc'; ?>
    <!-- Menu / Navigation-->
    <?php include 'nav.inc'; ?>
<br>
  
  <!--In-page nav menu-->
  <nav class="menu">
    <ul>
      <li> <a href="#information">Group Information</a></li>
      <li> <a href="#studentid">Student IDs</a></li>
      <li> <a href="#tutor">Tutor Name</a></li>
      <li> <a href="#contributions">Member Contributions</a></li>
      <li> <a href="#photo">Group Photo</a></li>
      <li> <a href="#interests">Member Interests</a></li>
      <li> <a href="#demographic">Demographic Information</a></li>
    </ul>
  </nav>

  <!--Class group info-->
  <div id="sections">
    <section id="information">
      <h2>Group Information</h2>
        <ul>
          <li>Group Name:
            <ul>
              <li>Intelligenz Analytics</li>
            </ul>
          </li>
          <li>Class Time and Day:
            <ul>
              <li>Wednesday 4:30pm - 6:30pm</li>
            </ul>
          </li>
        </ul>
    </section>

    <!--Student IDs-->
    <section id="studentid">
      <h2>Student IDs</h2>
        <ul>
          <li>Jack Hobbs:
            <ul>
              <li>104532329</li>
            </ul>
          </li>
          <li>David O'Connell:
            <ul>
              <li>105348831</li>
            </ul>
          </li>
          <li>Rijan Bhusal:
            <ul>
              <li>105280056</li>
            </ul>
          </li>
          <li>Lachie Schroen:
            <ul>
              <li>105933826</li>
            </ul>
          </li>
        </ul>
    </section>

    <!--Tutor-->
    <section id="tutor">
      <h2>Tutor Name</h2>
      <p>Rahul R.</p>
    </section>

    <!--Group member roles-->
    <section id="contributions">
      <h2>Member Contributions</h2>
        <dl>
          <dt>Shared:</dt>
          <dd>Home Page</dd>
          <dt>Jack Hobbs:</dt>
          <dd>Application Form Page, EOI & Form Processing</dd>
          <dt>David O'Connell:</dt>
          <dd>CSS Styling, Include (.inc) Files, Settings.php</dd>
          <dt>Rijan Bhusal:</dt>
          <dd>Jobs Page, Job Descriptions, Enhancements</dd>
          <dt>Lachie Schroen:</dt>
          <dd>About Page, Manage.php</dd>
        </dl>
    </section>

    <!--Group photo-->
    <section id="photo">
      <h2>Group Photo</h2>
        <a href="images/group.png"> <img src="images/group.png" alt="Placeholder Image"></a>
    </section>

    <!--Member interests table-->
    <section id="interests">
      <h2>Member Interests</h2>
        <table>
          <caption>Table of Member Interests</caption>
          <!--Table header-->
            <thead>
              <tr>
                <th rowspan="2" scope="col">Member</th>
                <th colspan="3" scope="col">Information</th>
              </tr>
              <tr>
                <th scope="col">Favourite Book</th>
                <th scope="col">Favourite Song</th>
                <th scope="col">Favourite Film</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                <th scope="row">Jack</th>
                <td>Wavewalker</td>
                <td>Cameras - Drake</td>
                <td>Inception</td>
              </tr>
              <tr>
                <th scope="row">David</th>
                <td>Metro 2033</td>
                <td>The Argus - Ween</td>
                <td>The Lord of The Rings: The Two Towers</td>
              </tr>
              <tr>
                <th scope="row">Rijan</th>
                <td>Harry Potter</td>
                <td>Flashing Lights</td>
                <td>The Godfather 2</td>
              </tr>
              <tr>
              <th scope="row">Lachie</th>
                <td>Invincible</td>
                <td>Bobby Sox - Green Day</td>
                <td>Minecraft Movie</td>
              </tr>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
    </section>

    <!--Member demographic and programming experience table-->
    <section id="demographic">
      <h2>Demographic Information</h2>
      <table>
        <caption>Table of Demographic Information</caption>
          <thead>
            <tr>
              <th rowspan="2" scope="col">Member</th>
              <th colspan="3" scope="col">Information</th>
            </tr>
            <tr>
              <th scope="col">Programming Skills</th>
              <th scope="col">Course</th>
              <th scope="col">Hometown</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <th scope="row">Jack</th>
              <td>Ruby, CSS, HTML</td>
              <td>Bachelor of Computer Science</td>
              <td>Albury</td>
            </tr>
            <tr>
              <th scope="row">David</th>
              <td>Python, GDscript, HTML, Ruby, CSS</td>
              <td>Bachelor of Games and Interactivity /Bachelor of Computer Science</td>
              <td>Mt. Eliza</td>
            </tr>
            <tr>
              <th scope="row">Rijan</th>
              <td>Pythone,HTML,CSS</td>
              <td>Bachelor of Computer Science</td>
              <td>Preston</td>
            </tr>
            <tr>
            <th scope="row">Lachie</th>
              <td>Ruby, HTML, CSS</td>
              <td>Bachelor of Computer Science</td>
              <td>Coolum Beach</td>
            </tr>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </section>
  </div>
  
  <!---Footer--->
  <?php include 'footer.inc'; ?>
</body>
</html>
