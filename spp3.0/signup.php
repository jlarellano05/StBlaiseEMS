<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:Login.php');
}


?>


<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Announcement</title>
   <link rel="stylesheet" href="style/signup.css" />
</head>

<body>
   <header>
      <ul>
         <li><a href="adminhome.php">Home</a></li>
         <li><a href="logout.php">Logout</a></li>

      </ul>
   </header>

   <div class="flex">
      <div class="form-container">
         <img class="logo2" src="photos/logo.png" alt="Logo">
         <form action="" method="post">
            <h3>register now</h3>

            <?php
            if (isset($error)) {
               foreach ($error as $error) {
                  echo '<span class="error-msg">' . $error . '</span>';
               };
            };
            ?>

            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            <input type="password" name="cpassword" required placeholder="confirm your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            <input type="submit" name="submit" value="register now" class="form-btn">
            <input type="hidden" name="user_type" value="admin">

         </form>

      </div>

   </div>
</body>

</html>

<?php

@include 'php/config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);


   $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   $select = "SELECT * FROM admin WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $error[] = 'User already exists!';
   } else {
      if ($password != $cpassword) {
         $error[] = 'Passwords do not match!';
      } else {

         $insert_admin = "INSERT INTO admin(name, email, password) VALUES('$name', '$email', '$hashed_password')";
         mysqli_query($conn, $insert_admin);


         $insert_user = "INSERT INTO user(name, email, password, user_type) VALUES('$name', '$email', '$hashed_password', '$user_type')";
         mysqli_query($conn, $insert_user);

         header('location: adminhome.php');
      }
   }
};

?>