<?php

@include 'php/config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
  header('location:Login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Student List</title>
  <link rel="stylesheet" href="style/studentList.css" />
  <style>
    .editable {
      border: 1px solid #ccc;
      padding: 5px;
      min-width: 50px;
    }

    .editable:focus {
      outline: none;
      border: 1px solid blue;
      /* Highlight the field when it's focused */
    }
  </style>
</head>

<body>
  <header>
    <ul>
      <li><a href="adminhome.php">Home</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </header>

  <main class="table">
    <section class="table__header">
      <h1>Student Lists</h1>
      <div class="input-group">
        <input type="search" placeholder="Search Data..." oninput="searchData(this.value)" />
        <img src="photos/search.png" alt="" />
      </div>
    </section>
    <section class="table__body">
      <table>
        <thead>
          <tr>
            <th>LRN</th>
            <th>Student</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tableBody"></tbody>
      </table>
    </section>
  </main>
  <script src="script/archivetable.js"></script>
</body>

</html>