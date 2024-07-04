<?php
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_date = $_POST['report_date'];
    $report_type = $_POST['report_type'];

    $sql = "";

    switch ($report_type) {
        case "day":
            $sql = "SELECT * FROM meter_readings WHERE date = '$report_date'";
            break;
        case "week":
            $sql = "SELECT * FROM meter_readings WHERE WEEK(date) = WEEK('$report_date')";
            break;
        case "month":
            $sql = "SELECT * FROM meter_readings WHERE MONTH(date) = MONTH('$report_date')";
            break;
        case "year":
            $sql = "SELECT * FROM meter_readings WHERE YEAR(date) = YEAR('$report_date')";
            break;
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Start Reading</th><th>Finish Reading</th><th>Unities</th><th>Date</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["start_reading"] . "</td><td>" . $row["finish_reading"] . "</td><td>" . $row["unities"] . "</td><td>" . $row["date"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }
}

$conn->close();
?>
