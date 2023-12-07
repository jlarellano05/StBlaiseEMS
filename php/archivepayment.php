

<?php

@include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $lrn = $data['lrn'];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $archiveQuery = "INSERT INTO archive_table2 SELECT * FROM enrollment_form WHERE lrn = '$lrn'";
    $deleteEnroll = "DELETE FROM enrollment_form WHERE lrn = '$lrn'";
    $deletePayment = "DELETE FROM payment WHERE lrn = '$lrn'";
    $deleteUser = "DELETE FROM user WHERE lrn = '$lrn'";

    if (mysqli_query($conn, $archiveQuery) && mysqli_query($conn, $deleteEnroll) && mysqli_query($conn, $deletePayment) && mysqli_query($conn, $deleteUser)) {

        echo json_encode(['success' => true]);
    } else {

        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }

    mysqli_close($conn);
} else {

    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
