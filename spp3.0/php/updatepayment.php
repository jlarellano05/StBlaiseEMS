<?php


include('config.php');


$data = json_decode(file_get_contents("php://input"), true);


$lrn = $data['lrn'];
$name = $data['name'];
$misc = $data['misc'];
$tuition = $data['tuition'];
$others = $data['others'];

$sql = "UPDATE payment SET misc = '$misc', tuition = '$tuition', others = '$others' WHERE lrn = '$lrn'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Record updated successfully"));
} else {
    echo json_encode(array("message" => "Error updating record: " . $conn->error));
}

$conn->close();
