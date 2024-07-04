<?php
include_once 'db.php';

$date = $_GET['date'];
$previousDate = date('Y-m-d', strtotime($date . ' -1 day'));

$sql = "SELECT finish_reading FROM meter_readings WHERE date = '$previousDate' ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

$response = array("previousFinishReading" => null);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response["previousFinishReading"] = $row['finish_reading'];
}

echo json_encode($response);

$conn->close();
?>
