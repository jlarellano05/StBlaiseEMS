<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['lrn'])) {
    header('location:Login.php');
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>St. Blaise Community Academy</title>
    <link rel="stylesheet" href="style/home.css" />
</head>

<body>
    <header>
        <img src="photos/logo.png" class="logo" />
        <ul>
            <li><a href="studenthome.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </header>
    <section class="banner"></section>
    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>
    <div class="flexcontent">
        <div class="content1">
            <div class="title">
                <pre><b>St. Blaise
    Community 
       Academy, Inc.</pre>

                <p>San Luis, Batangas</p>
            </div>
            <a href="Enrollment.php" target="_blank">
                <div class="Button">

                    <div class="enroll"><span></span>ENROLL NOW</div>
                    <a class="Circle" href="Enrollment.php" target="_blank">></a>
                </div>
            </a>
        </div>
    </div>

</body>

</html>