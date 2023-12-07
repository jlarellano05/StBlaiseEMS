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