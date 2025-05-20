<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    <link rel="stylesheet" href="styles/style.css">
  </head>
  <body>
    <header> <!-- Logo / Company Name-->
      <img id="logo" src="images/image.png" alt="Intelligenz logo">
      <h1>Intelligenz Analytics - Apply</h1>
    </header>

    <!-- Menu / Navigation-->
    <nav class="menu"> 
      <ul>
        <li> <a href="index.html">Home</a></li>
        <li> <a href="jobs.html">Jobs</a></li>
        <li> <a href="apply.php">Apply</a></li>
        <li> <a href="about.html">About</a></li>
        <li> <a href="mailto:intelligenzanalytics@gmail.com">Email</a></li>
      </ul>
      </nav>

    <!--Form-->
    <form method="post" action="process_eoi.php" novalidate>
      <!--Personal information box-->
      <fieldset class="personalinformation">
        <legend>Personal information</legend>
        <p><label for="firstname">First Name</label>
          <input type="text" name="firstname" id="firstname" pattern="[A-za-z]{1,20}" required>
        </p>

        <p><label for="lastname">Last Name</label>
          <input type="text" name="lastname" id="lastname" pattern="[A-za-z{1,20}]" required>
        </p>

        <p><label for="dob">Date of Birth</label>
          <input type="text" id="dob" name="dob" placeholder="dd/mm/yyyy" pattern="\d{1,2}\/\d{1,2}\/\d{4}" required>
        </p>
        
        <!--Gender-->
        <p>Gender</p>
        <p><label for="male">Male</label>
          <input type="radio" id="male" name="gender" value="male" required>
        <label for="female">Female</label>
          <input type="radio" id="female" name="gender" value="female">
        <label for="other">Other</label>
          <input type="radio" id="other" name="gender" value="other">
        <label for="notgiven">Prefer not to answer</label>
          <input type="radio" id="notgiven" name="gender" value="none">
        </p>
      </fieldset>

      <!--Contact information box-->
      <fieldset class="contactinformation">
        <legend>Contact information</legend>
        <p><label for="address">Street Address</label>
          <input type="text" id="address" name="address" pattern="[A-Za-z0-9 ]{1,40}" required>
        <p><label for="suburb">Suburb/Town</label>
          <input type="text" id="suburb" name="suburb" pattern="[A-Za-z0-9 ]{1,40}" required>
        
        
        <!--State selection-->
        <p><label for="state">State</label>
          <select name="state" id="state" required>
            <option value="">Select</option>
            <option value="vic">VIC</option>
            <option value="nsw">NSW</option>
            <option value="qld">QLD</option>
            <option value="nt">NT</option>
            <option value="wa">WA</option>
            <option value="sa">SA</option>
            <option value="tas">TAS</option>
            <option value="act">ACT</option>
          </select>
        </p>
        
        <!--Postcode, email, and Phone number text inputs-->
        <p><label for="postcode">Postcode</label>
          <input type="text" name="postcode" id="postcode" pattern="[0-9]{1}[2-9]{1}[0-4]{1}[0-4]{1}" required>
        </p>
        <p><label for="email">Email address</label>
          <input id="email" type="email" name="email" required>
        </p>
        <p><label for="phone">Phone number</label>
          <input type="text" id="phone" name="phone" pattern="[0-9 ]{8,14}" required>
        </p>
      </fieldset>

      <!--Job information box-->
      <fieldset class="jobinformation">
        <legend>Job information</legend>
        <p><label for="jobnumber">Job reference number</label> <!--JOB REFERENCE NUMBERS WILL BE 5 ALPHANUMERIC CHARACTERS-->
          <select name="jobnumber" id="jobnumber" required>
            <option value="">Select</option>
            <option value="100">100</option>
            <option value="101">101</option>
          </select>
        </p>

        <!--Programming languages checkboxes-->
        <p>Technical experience</p>
        <p><label for="python">Python</label>
          <input type="checkbox" id="python" name="experience[]" value="python" checked="checked">
        <label for="sql">SQL</label>
          <input type="checkbox" id="sql" name="experience[]" value="sql">
        <label for="c">C/C++</label>
          <input type="checkbox" id="c" name="experience[]" value="c">
        <label for="powershell">PowerShell</label>
          <input type="checkbox" id="powershell" name="experience[]" value="powershell">
        </p>

        <!--Optional textarea for any other skills-->
        <p><label>Other skills<br></label>
          <textarea name="skills" rows="6" placeholder="Any other skills relevant to the job application"></textarea>
        </p>
      </fieldset>

      <!--Form submit button-->
      <p id="submit"><input type="submit" value="Apply"></p>
    </form>
  </body>
</html>