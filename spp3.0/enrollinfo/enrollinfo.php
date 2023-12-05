<?php

include('config.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$lrn = $_GET['lrn'];



$sql = "SELECT * FROM enrollment_form WHERE lrn = $lrn LIMIT 1";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$name = $row['surname'] . ", " . $row['firstname'] . " " . $row['middlename'];
$age = $row['age'];
$grade_level = $row['grade_level'];
$contact_number = $row['contact_number'];
$address = $row['address'];
$birthdate = $row['birthdate'];
$birthplace = $row['birthplace'];
$last_school_attended = $row['last_school_attended'];
$school_year = $row['school_year'];
$parent_name = $row['parent_name'];
$parent_address = $row['parent_address'];
$parent_contact_number = $row['parent_contact_number'];
$parent_address = $row['parent_address'];
$occupation = $row['occupation'];
$card = $row['card_138'];
$goodmoral = $row['good_moral'];
$psa = $row['psa'];

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="enrollinfo.css">

</head>

<body>




    <div class="invoice-wrapper" id="print-area">
        <div class="invoice">
            <div class="invoice-container">
                <div class="invoice-head">
                    <div class="invoice-head-top">
                        <div class="invoice-head-top-left text-start">
                            <img src="logo.png">
                        </div>
                        <div class="invoice-head-top-right text-end">
                            <h3>ENROLLMENT INFORMATION</h3>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="invoice-head-middle">
                        <div class="invoice-head-middle-left text-start">
                            <p><b>Date: </b><span type="text" id="dateDisplay" readonly></span></p>
                        </div>
                        <div class="invoiceno">
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="invoice-head-bottom">
                        <div class="invoice-head-bottom-left">
                            <ul>
                                <li class='text-bold'>LRN: <a class="info"><?php echo $lrn; ?></a></li>

                                <li class='text-bold'>Student Name: <a class="info"><?php echo $name; ?></a></li>

                                <li class='text-bold'>Age: <a class="info"><?php echo $age; ?></a></li>

                                <li class='text-bold'>Grade Level: <a class="info"><?php echo $grade_level; ?></a></li>

                                <li class='text-bold'>Contact Number: <a class="info"><?php echo $contact_number; ?></a></li>

                                <li class='text-bold'>Address: <a class="info"><?php echo $address; ?></a></li>

                                <li class='text-bold'>Birthdate: <a class="info"><?php echo $birthdate; ?></a></li>

                                <li class='text-bold'>Birthplace: <a class="info"><?php echo $birthplace; ?></a></li>

                                <li class='text-bold'>Last School Attended: <a class="info"><?php echo $last_school_attended; ?></a></li>

                                <li class='text-bold'>School Year: <a class="info"><?php echo $school_year; ?></a></li>

                                <li class='text-bold'>Form 138: <a class="info" href="/uploads/<?php echo $card; ?>" download="Form 138 <?php echo $name; ?>">Download</a></li>

                                <li class='text-bold'>Good Moral: <a class="info" href="/uploads/<?php echo $goodmoral; ?>" download="Good Moral <?php echo $name; ?>">Download</a></li>

                                <li class='text-bold'>PSA: <a class="info" href="/uploads/<?php echo $psa; ?>" download="PSA <?php echo $name; ?>">Download</a></li>



                            </ul>
                        </div>
                        <div class="invoice-head-bottom-right">
                            <ul class="text-end">
                                <li class='text-bold'>Parent Name: <a class="info"><?php echo $parent_name; ?></a></li>
                                <li class='text-bold'>Occupation: <a class="info"><?php echo $occupation; ?></a> </li>

                                <li class='text-bold'>Parent Address: <a class="info"><?php echo $parent_address; ?></a></li>

                                <li class='text-bold'>Parent Contact Number: <a class="info"><?php echo $parent_contact_number; ?></li>

                        </div>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="studentoath">
            <b class="SA">STUDENT'S OATH</b>
            <p class="oath">I certify that all the above information is true and correct <br>
                My enrollment at <b>ST. BLAISE COMMUNITY ACADEMY</b><br>
                signifies my knowledge<br>
                and willingness to ABIDE by the school's policies and regulations.</p>

            <div class="invoice-btns">
                <button type="button" class="invoice-btn" onclick="printInvoice()">
                    <span>
                        <i class="fa-solid fa-print"></i>
                    </span>
                    <span>Print</span>
                </button>
                <button type="button" class="invoice-btn">
                    <span>
                        <i class="fa-solid fa-download"></i>
                    </span>
                    <span>Download</span>
                </button>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script>
        function updateDate() {
            var currentDate = new Date();
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1; // Months are zero-based
            var year = currentDate.getFullYear();

            // Display the date in the format: DD/MM/YYYY
            var formattedDate = `${day}/${month}/${year}`;

            // Update the HTML element with the formatted date
            document.getElementById('dateDisplay').innerText = formattedDate;
        }

        // Call updateDate initially and then every second (1000 milliseconds)
        updateDate();
        setInterval(updateDate, 1000);
    </script>


    <script src="script.js"></script>
</body>

</html>