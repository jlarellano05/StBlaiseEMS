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

  <script>
    function fetchData() {
      return fetch("php/getarchive.php").then((response) => response.json());
    }

    function populateTable(data) {
      const tableBody = document.getElementById("tableBody");
      tableBody.innerHTML = "";

      data.forEach((archive_table2) => {
        const row = document.createElement("tr");
        row.innerHTML = `
                  <td>${archive_table2.LRN}</td>
                  <td>${archive_table2.firstname} ${archive_table2.surname}</td>
                  <td>${archive_table2.created_at}</td>

      <td>
        <button class="retrieveBtn" onclick="retrieveData('${archive_table2.LRN}')">Retrieve</button>
      </td>
      
                `;
        tableBody.appendChild(row);
      });
    }



    function searchData(query) {
      fetchData()
        .then((data) => {
          const filteredData = data.filter((archive_table2) => {
            return (
              archive_table2.LRN.toLowerCase().includes(query.toLowerCase()) ||
              archive_table2.firstname.toLowerCase().includes(query.toLowerCase()) ||
              archive_table2.surname.toLowerCase().includes(query.toLowerCase()) ||
              archive_table2.created_at
              .toLowerCase()
              .includes(query.toLowerCase())
            );
          });

          populateTable(filteredData);
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    fetchData()
      .then((data) => {
        populateTable(data);
      })
      .catch((error) => console.error("Error fetching data:", error));



    function retrieveData(LRN) {
      const confirmation = confirm("Are you sure you want to archive this record?");

      if (!confirmation) {
        return;
      }

      fetch("php/retrieve.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            LRN
          }),
        })
        .then((response) => response.json())
        .then((result) => {
          if (result.success) {
            alert("Record archived successfully!");

            const row = document.querySelector(`tr[data-lrn="${LRN}"]`);
            location.reload();
            row.remove();

          } else {
            alert("Error archiving record. Please try again.");
          }
        })
        .catch((error) => console.error("Error archiving record:", error));
    }
  </script>

</body>

</html>