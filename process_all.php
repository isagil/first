<?php
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $start_reading = $_POST['start-reading'];
    $finish_reading = $_POST['finish-reading'];
    $unities = $finish_reading - $start_reading;

    $sql = "INSERT INTO meter_readings (start_reading, finish_reading, unities, date) VALUES ($start_reading, $finish_reading, $unities, '$date')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $super_kg = $_POST['super'];
    $super_cash = $super_kg * 250;
    $number1_kg = $_POST['number1'];
    $number1_cash = $number1_kg * 200;
    $number2_kg = $_POST['number2'];
    $number2_cash = $number2_kg * 150;
    $others_kg = $_POST['others'];
    $others_cash = $others_kg * 80;
    $total_cash = $super_cash + $number1_cash + $number2_cash + $others_cash;
    $per_unit = $total_cash / $unities;

    $sql = "INSERT INTO weights (super_kg, super_cash, number1_kg, number1_cash, number2_kg, number2_cash, others_kg, others_cash, total_cash, per_unit, date)
            VALUES ($super_kg, $super_cash, $number1_kg, $number1_cash, $number2_kg, $number2_cash, $others_kg, $others_cash, $total_cash, $per_unit, '$date')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $umeme_expenditure = $unities * 850;
    $home_expenditure = $_POST['home-exp'];
    $mill_expenditure = $_POST['mill-exp'];
    $labour_expenditure = $total_cash * 0.1;
    $total_expenditure = $umeme_expenditure + $home_expenditure + $mill_expenditure + $labour_expenditure;
    $balance = $total_cash - $total_expenditure;

    $sql = "INSERT INTO expenditures (umeme_expenditure, home_expenditure, mill_expenditure, labour_expenditure, total_expenditure, balance, date)
            VALUES ($umeme_expenditure, $home_expenditure, $mill_expenditure, $labour_expenditure, $total_expenditure, $balance, '$date')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
}
?>
