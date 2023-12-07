<?php

@include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $lrn = $data['LRN'];


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $retrieveEnroll = "INSERT INTO enrollment_form SELECT * FROM archive_table2 WHERE lrn = '$lrn'";
    $retrievePayment = "INSERT INTO payment (lrn, name) SELECT lrn, CONCAT(surname, ' ', firstname) AS name FROM archive_table2 WHERE lrn = '$lrn'";
    $retrieveUser = "INSERT INTO user (lrn, name, email) SELECT lrn, CONCAT(surname, ' ', firstname) AS name, email FROM archive_table2 WHERE lrn = '$lrn'";
    $deleteQuery = "DELETE FROM archive_table2 WHERE lrn = '$lrn'";

    $successInsertions = mysqli_query($conn, $retrieveEnroll) &&
        mysqli_query($conn, $retrievePayment) &&
        mysqli_query($conn, $retrieveUser);

    if ($successInsertions && mysqli_query($conn, $deleteQuery)) {

        echo json_encode(['success' => true]);
    } else {

        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }

    mysqli_close($conn);
} else {

    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
