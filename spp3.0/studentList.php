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
            <th>Miscellaneous</th>
            <th>Tuition</th>
            <th>Other Fees</th>
            <th colspan="3">Action</th>
          </tr>
        </thead>
        <tbody id="tableBody"></tbody>
      </table>
    </section>
  </main>
  <script>
    function fetchData() {
      return fetch("php/getpayment.php").then((response) => response.json());
    }

    function populateTable(data) {
      const tableBody = document.getElementById("tableBody");
      tableBody.innerHTML = "";

      data.forEach((payment) => {
        const row = document.createElement("tr");
        row.innerHTML = `
                  <td>${payment.lrn}</td>
                  <td>${payment.name}</td>
                  <td>${payment.created_at}</td>
                  <td class="editable" contenteditable="false">
                    <select class="payment-status">
                      <option value="Pending" ${
                        payment.misc === "Pending" ? "selected" : ""
                      }>Pending</option>
                      <option value="Paid" ${
                        payment.misc === "Paid" ? "selected" : ""
                      }>Paid</option>
                    </select>
                  </td>
                  <td class="editable" contenteditable="false">
                    <select class="payment-status">
                      <option value="Pending" ${
                        payment.tuition === "Pending" ? "selected" : ""
                      }>Pending</option>
                      <option value="Paid" ${
                        payment.tuition === "Paid" ? "selected" : ""
                      }>Paid</option>
                    </select>
                  </td>
                  <td class="editable" contenteditable="false">
                    <select class="payment-status">
                      <option value="Pending" ${
                        payment.others === "Pending" ? "selected" : ""
                      }>Pending</option>
                      <option value="Paid" ${
                        payment.others === "Paid" ? "selected" : ""
                      }>Paid</option>
                    </select>
                  </td>
                  <td>
        <button class="saveBtn" onclick="saveChanges(this)"><img src="photos/save.png" alt="Save"> </button>
      </td>
      <td>
        <button class="archiveBtn" onclick="archiveData('${payment.lrn}')"><img src="photos/arch.png" alt="Archive"></button>
      </td>
      <td>
        <a href="enrollinfo/enrollinfo.php?lrn=${payment.lrn}" class="Print" target="_blank">
          <i class="fa fa-file-pdf-o"></i> <img class="docbut" src="photos/Docs.png" alt="Downloadable file">
        </a>
      </td>
                `;
        tableBody.appendChild(row);
      });
    }

    function saveChanges(btn) {
      const row = btn.parentNode.parentNode;
      const editableCells = row.querySelectorAll(".editable");

      const data = {
        lrn: row.cells[0].innerText,
        name: row.cells[1].innerText,
        misc: editableCells[0].querySelector(".payment-status").value,
        tuition: editableCells[1].querySelector(".payment-status").value,
        others: editableCells[2].querySelector(".payment-status").value,
      };

      fetch("php/updatepayment.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((result) => {
          console.log(result.message);
        })
        .catch((error) => console.error("Error updating record:", error));

      editableCells.forEach((cell) => {
        cell.contentEditable = false;
        cell.classList.remove("editable-active");
      });

      btn.style.display = "block";
    }

    function searchData(query) {
      fetchData()
        .then((data) => {
          const filteredData = data.filter((payment) => {
            return (
              payment.lrn.toLowerCase().includes(query.toLowerCase()) ||
              payment.name.toLowerCase().includes(query.toLowerCase()) ||
              payment.created_at
              .toLowerCase()
              .includes(query.toLowerCase()) ||
              payment.misc.toLowerCase().includes(query.toLowerCase()) ||
              payment.tuition.toLowerCase().includes(query.toLowerCase()) ||
              payment.others.toLowerCase().includes(query.toLowerCase())
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


    function archiveData(lrn) {
      const confirmation = confirm("Are you sure you want to archive this record?");

      if (!confirmation) {
        return;
      }

      fetch("php/archivepayment.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            lrn
          }),
        })
        .then((response) => response.json())
        .then((result) => {
          if (result.success) {
            alert("Record archived successfully!");

            const row = document.querySelector(`tr[data-lrn="${lrn}"]`);
            location.reload();
            row.remove();

          } else {
            alert("Error archiving record. Please try again.");
          }
        })
        .catch((error) => console.error("Error archiving record:", error));
    }
  </script>
  <a href="archivetable.php"><img class="Arcicon" src="photos/Archive.png" alt="Archive"></a>
</body>

</html>