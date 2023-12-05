<?php

@include 'php/config.php';

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $select = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $select);



    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        $user_type = $row['user_type'];

        if (password_verify($password, $hashed_password)) {


            session_start();

            if ($user_type == 'admin') {

                $_SESSION['admin_name'] = $row['name'];
                header('location: adminhome.php');
            } elseif ($user_type == 'student') {
                $_SESSION['lrn'] = $row['lrn'];
                header('location: studenthome.php');
            } else {
                $error[] = 'Invalid user type!';
            }
        } else {
            $error[] = 'Incorrect email or password!';
        }
    } else {
        $error[] = 'User not found!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/Login.css" />
</head>

<body>
    <header>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="announcement.php">Announcements</a></li>
            <li><a href="history.php">History</a></li>
            <li><a href="Login.php">Login</a></li>
        </ul>
    </header>
    <section class="banner"></section>

    <div class="loginContent">
        <img class="logo2" src="photos/logo.png" alt="Logo">
        <div class="Student_Login">
            <form action="" method="post">
                <h1>Login</h1>
                <?php
                if (!empty($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    }
                }
                ?>
                <input type="text" name="email" required placeholder="Email or Username"><br />
                <input type="password" name="password" required placeholder="Password"><br /><br />
                <input type="checkbox" onclick="myFunction()">Show Password <br /><br />
                <input type="submit" name="submit" class="formButton" value="Login">
            </form>
        </div>
    </div>
</body>
<script>
    function myFunction() {
        var x = document.getElementsByName("password")[0];
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>