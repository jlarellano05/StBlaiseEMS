<?php

@include 'config.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM archive_table2";
$result = $conn->query($sql);

$conn->close();

$rows = array();
while ($r = $result->fetch_assoc()) {
    $rows[] = $r;
}

echo json_encode($rows);
