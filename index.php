<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meter Readings and Weights</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" alt="System Logo" class="logo">
            <div class="date">
                <h1 id="date"></h1>
            </div>
        </div>
        <form action="process_all.php" method="post">
            <div class="meter-readings">
                <h2>Meter Readings</h2>
                <div class="reading-group">
                    <label for="start-reading">Start Reading:</label>
                    <input type="number" id="start-reading" name="start-reading" oninput="calculateUnities()" readonly>
                    <label for="finish-reading">Finish Reading:</label>
                    <input type="number" id="finish-reading" name="finish-reading" oninput="calculateUnities()">
                    <label for="unities">Unities:</label>
                    <input type="number" id="unities" name="unities" readonly>
                </div>
            </div>
            <div class="weights">
                <h2>Weights</h2>
                <div class="weight-item">
                    <label for="super">Super (kg):</label>
                    <input type="number" id="super" name="super" oninput="calculateCash()">
                    <label for="super-cash">Super Cash:</label>
                    <input type="number" id="super-cash" name="super-cash" readonly>
                </div>
                <div class="weight-item">
                    <label for="number1">Number 1 (kg):</label>
                    <input type="number" id="number1" name="number1" oninput="calculateCash()">
                    <label for="number1-cash">Number 1 Cash:</label>
                    <input type="number" id="number1-cash" name="number1-cash" readonly>
                </div>
                <div class="weight-item">
                    <label for="number2">Number 2 (kg):</label>
                    <input type="number" id="number2" name="number2" oninput="calculateCash()">
                    <label for="number2-cash">Number 2 Cash:</label>
                    <input type="number" id="number2-cash" name="number2-cash" readonly>
                </div>
                <div class="weight-item">
                    <label for="others">Others (kg):</label>
                    <input type="number" id="others" name="others" oninput="calculateCash()">
                    <label for="others-cash">Others Cash:</label>
                    <input type="number" id="others-cash" name="others-cash" readonly>
                </div>
                <label for="total-cash">Total Cash:</label>
                <input type="number" id="total-cash" name="total-cash" readonly><br>
                <label for="per-unit">Per Unit:</label>
                <input type="number" id="per-unit" name="per-unit" readonly>
            </div>
            <div class="expenditures">
                <h2>Expenditures</h2>
                <div class="expenditure-item">
                    <label for="umeme">Umeme:</label>
                    <input type="number" id="umeme" name="umeme" readonly>
                </div>
                <div class="expenditure-item">
                    <label for="home-exp">Home Exp:</label>
                    <input type="number" id="home-exp" name="home-exp" oninput="calculateExpenditures()">
                </div>
                <div class="expenditure-item">
                    <label for="mill-exp">Mill Expenditure:</label>
                    <input type="number" id="mill-exp" name="mill-exp" oninput="calculateExpenditures()">
                </div>
                <div class="expenditure-item">
                    <label for="labour">Labour:</label>
                    <input type="number" id="labour" name="labour" readonly>
                </div>
                <label for="total-expenditures">Total Expenditures:</label>
                <input type="number" id="total-expenditures" name="total-expenditures" readonly>
            </div>
            <div class="balance">
                <h2>Balance</h2>
                <label for="balance">Balance:</label>
                <input type="number" id="balance" name="balance" readonly>
            </div>
            <button type="submit">Submit</button>
        </form>
        
        <h2>Generate Report</h2>
        <form action="generate_report.php" method="get">
            <label for="report-type">Report Type:</label>
            <select id="report-type" name="report-type" onchange="toggleDateInput()">
                <option value="day">Day</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
                <option value="year">Year</option>
            </select><br>
            <div id="date-input" style="display: block;">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date"><br>
            </div>
            <div id="week-input" style="display: none;">
                <label for="week">Week:</label>
                <input type="week" id="week" name="week"><br>
            </div>
            <div id="month-input" style="display: none;">
                <label for="month">Month:</label>
                <input type="month" id="month" name="month"><br>
            </div>
            <div id="year-input" style="display: none;">
                <label for="year">Year:</label>
                <input type="number" id="year" name="year" min="2000" max="2100"><br>
            </div>
            <button type="submit">Generate Report</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
