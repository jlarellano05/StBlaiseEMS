function generatePassword() {
    var LRN = document.getElementById("LRN").value;
    var firstname = document.getElementById("firstname").value;
    var surname = document.getElementById("surname").value;

    var last4Digits = LRN.slice(-4);

    var initialLetters = firstname.charAt(0) + surname.charAt(0);

    var generatedPassword = last4Digits + initialLetters;

    document.getElementById("password").value = generatedPassword;

  }

  function captureFormData() {

    var name = document.getElementById('firstname').value + ' ' + document.getElementById('surname').value;
    var gradeLevel = document.getElementById('level').value;
    var address = document.getElementById('address').value;

    if (name && gradeLevel && address) {

      sessionStorage.setItem('name', name);
      sessionStorage.setItem('gradeLevel', gradeLevel);
      sessionStorage.setItem('address', address);

      var newTab = window.open('invoice/index.html', '_blank');

      newTab.onload = function() {

        newTab.location.href = 'home.php';
      };
    } else {

      alert('Please fill in all required fields before submitting.');
    }
  }


  function calculateAge() {
    var dob = document.getElementById("dob").value;
    var today = new Date();
    var birthDate = new Date(dob);
    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }
    document.getElementById("age").value = age;
  }