<?php

include 'php/config.php';

session_start();

if (!isset($_SESSION['lrn'])) {
    header('location: Login.php');
}

$lrn = $_SESSION['lrn'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $oldPassword = $_POST["oldpassword"];
    $newPassword = $_POST["newpassword"];


    $sql = "SELECT password FROM user WHERE lrn = '$lrn'";


    $result = mysqli_query($conn, $sql);

    if ($result) {

        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];


        if (password_verify($oldPassword, $storedPassword)) {



            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);


            $updateSql = "UPDATE user SET password = '$hashedNewPassword' WHERE lrn = '$lrn'";


            $updateResult = mysqli_query($conn, $updateSql);

            if ($updateResult) {

                echo "Password updated successfully!";
            } else {

                echo "Error updating password: " . mysqli_error($conn);
            }
        } else {

            echo "<script>alert('Old password is incorrect.');</script>";
        }
    } else {

        echo "Error fetching password: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/Login.css" />
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

    <div class="loginContent">
        <img class="logo2" src="photos/logo.png" alt="Logo">
        <div class="Student_Login">
            <form action="" method="post">
                <h1>Change Password</h1>
                <input type="password" name="oldpassword" required placeholder="Enter Your old Password">
                <input type="password" name="newpassword" required placeholder="Your new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br /><br />
                <input type="checkbox" onclick="showPass()">Show Password <br /><br />
                <input type="submit" name="submit" class="formButton" value="Change Password">
            </form>
        </div>
    </div>
</body>
<script src="script/Changepassword.js"></script>
</html>