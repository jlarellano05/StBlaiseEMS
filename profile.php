<?php

@include 'php/config.php';

session_start();

if (!isset($_SESSION['lrn'])) {
  header('location:Login.php');
}

$lrn = $_SESSION['lrn'];

$sql = "SELECT * FROM enrollment_form WHERE lrn = $lrn LIMIT 1";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$name = $row['surname'] . ", " . $row['firstname'] . " " . $row['middlename'];
$grade_level = $row['grade_level'];

$sql2 = "SELECT * FROM payment WHERE lrn = $lrn LIMIT 1";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

if ($row2['tuition'] == 'Paid') {
  $status = 'Enrolled';
} else {
  $status = 'Pending';
}


?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style/profile.css" />
</head>

<body>
  <header>
    <ul>
      <li><a href="studenthome.php">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </header>
  <section class="banner"></section>

  <div class="flex">
    <div class="container">

      <div class="profile">
        <img src="photos/user.png" alt="User" />
        <div class="info">
          <b><?php echo $name; ?></b>
          <p><b>Year Level:</b><?php echo $grade_level; ?></p>
          <p><b>Enrollment Status:</b><?php echo $status; ?></p>
          <a href="Changepassword.php">Change Password</a>
        </div>
      </div>

    </div>
  </div>
</body>

</html>