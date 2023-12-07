<?php

@include 'php/addenroll.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>St. Blaise Community Academy</title>
  <link rel="stylesheet" href="style/enrollment.css" />

</head>

<body>
  <header>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="announcement.php">Announcements</a></li>
      <li><a href="history.php">History</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="Login.php">Login</a></li>
    </ul>
  </header>
  <div class="Container">
    <div class="title">
      <h1>Enrollment Form</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data" id="enrollmentForm">
      <div class="upperpart">
        <div class="user-details">
          <div class="input-box">
            <span class="details"><b>LRN</b></span>
            <input type="text" id="LRN" name="LRN" placeholder="LRN" required minlength="12" maxlength="12" pattern=".{12}" title="LRN must be exactly 12 characters long">
          </div>

          <div class="input-box">
            <span class="details"><b>Surname</b></span>
            <input type="text" id="surname" name="surname" placeholder="Surname" required>
          </div>

          <div class="input-box">
            <span class="details"><b>First Name</b></span>
            <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
          </div>

          <div class="input-box">
            <span class="details"><b>Middle Name</b></span>
            <input type="text" name="middlename" placeholder="Middle Name" required>
          </div>
        </div>

        <div class="top2">
          <div class="input-box">
            <span class="details"><b>Address</b></span>
            <input type="text" id="address" name="address" placeholder="Address" required>
          </div>

          <div class="input-box">
            <span class="details"><b>Contact No</b></span>
            <input type="tel" name="number" placeholder="Contact No" required>
          </div>

          <div class="input-box">
            <span class="details"><b>Email</b></span>
            <input type="email" name="email" placeholder="Email" required>
          </div>
        </div>

        <div class="top3">
          <div class="input-box">
            <span class="details"><b>Birthdate:</b></span>
            <input type="date" id="dob" name="date" placeholder="Date" required onchange="calculateAge()">
          </div>

          <div class="input-box">
            <span class="details"><b>Age:</b></span>
            <input type="number" id="age" name="age" placeholder="Age" readonly>
          </div>
          <div class="input-box">
            <span class="details"><b>Birth Place:</b></span>
            <input type="text" name="birthplace" placeholder="Birth Place" required>
          </div>
        </div>

        <div class="middle">
          <div class="input-box">
            <span class="details"><b>School Last Attended</b>
              <input type="text" name="lastschool" required>
          </div>

          <div class="input-box">
            <span class="details"><b>School Year</b>
              <input type="text" name="sy" required>
          </div>
        </div>

        <div class="mid2">
          <div class="input-box">
            <span class="details"><b>Parents/Guardian</b>
              <input type="text" name="parentname">
          </div>

          <div class="input-box">
            <span class="details"><b>Occupation</b>
              <input type="text" name="occupation">
          </div>

        </div>

        <div class="bot">
          <div class="input-box">
            <span class="details"><b>Address</b>
              <input type="text" name="parentaddress">
          </div>

          <div class="input-box">
            <span class="details"><b>Contact Number</b>
              <input type="tel" name="parentnum" required>
          </div>
        </div>
        <div class="Credentials"></div>
        <div class="input-box">
          <span class="details"><b>Credentials Submitted:</b></span>
          <div class="Card">
            <p> 138 Card</p>
            <input type="file" id="fileInput" name="138card" accept=" .pdf.jpeg, .png">
          </div>
          <div class="Certificate">
            <p> Certificate of GoodMoral</p>
            <input type="file" id="fileInput" name="goodmoral" accept=" .pdf.jpeg, .png">
          </div>
          <div class="psa">
            <p> PSA</p>
            <input type="file" id="fileInput" name="psa" accept=" .pdf.jpeg, .png">
          </div>
        </div>
      </div>
      <div class="Grantee">
        <div class="input-box">
          <span class="details"><b>Grantee:</b></span>
          <label for="Credentials Submitted">
            <input type="checkbox" name="grantee[]" value="ESC">ESC
            <input type="checkbox" name="grantee[]" value="RBSL">RBSL
            <input type="checkbox" name="grantee[]" value="Other">Other, please specify: <input name="other_specify" type="text">
        </div>
      </div>
      <div class="gradelevel">
        <div class="Gradels"><b>Grade Level:</b>
          <select name="level" id="level">
            <option disabled>Select Category</option>
            <option value="JuniorHigh-Grade7">Junior High - Grade 7</option>
            <option value="JuniorHigh-Grade8">Junior High - Grade 8</option>
            <option value="JuniorHigh-Grade9">Junior High - Grade 9</option>
            <option value="JuniorHigh-Grade10">Junior High - Grade 10</option>
            <option value="SeniorHigh-Grade11">Senior High - Grade 11</option>
            <option value="SeniorHigh-Grade12">Senior High - Grade 12</option>
          </select>
        </div>
      </div>

      <input type="hidden" name="status" value="Pending">

      <input type="hidden" name="user_type" value="student">

      <input type="hidden" id="password" name="password">

      <button type="submit" name="submit" onclick="generatePassword(); captureFormData();">SUBMIT</button>
      <button class="reset" type="reset">RESET</button>
    </form>
  </div>
</body>
<script src="script/Enrollment.js"></script>
</html>