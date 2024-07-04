document.addEventListener('DOMContentLoaded', function() {
    const dateElement = document.getElementById('date');
    const today = new Date().toISOString().split('T')[0];
    dateElement.innerText = today;

    document.querySelector('input[name="date"]').value = today;

    fetch(`fetch_previous_reading.php?date=${today}`)
        .then(response => response.json())
        .then(data => {
            const startReadingInput = document.getElementById('start-reading');
            startReadingInput.value = data.previousFinishReading ? data.previousFinishReading + 2 : 0;
        });
});

function calculateUnities() {
    const startReading = parseFloat(document.getElementById('start-reading').value) || 0;
    const finishReading = parseFloat(document.getElementById('finish-reading').value) || 0;
    const unities = finishReading - startReading;
    document.getElementById('unities').value = unities;
}

function calculateCash() {
    const superKg = parseFloat(document.getElementById('super').value) || 0;
    const number1Kg = parseFloat(document.getElementById('number1').value) || 0;
    const number2Kg = parseFloat(document.getElementById('number2').value) || 0;
    const othersKg = parseFloat(document.getElementById('others').value) || 0;

    const superCash = superKg * 250;
    const number1Cash = number1Kg * 200;
    const number2Cash = number2Kg * 150;
    const othersCash = othersKg * 80;
    const totalCash = superCash + number1Cash + number2Cash + othersCash;
    const unities = parseFloat(document.getElementById('unities').value) || 0;
    const perUnit = unities ? totalCash / unities : 0;

    document.getElementById('super-cash').value = superCash;
    document.getElementById('number1-cash').value = number1Cash;
    document.getElementById('number2-cash').value = number2Cash;
    document.getElementById('others-cash').value = othersCash;
    document.getElementById('total-cash').value = totalCash;
    document.getElementById('per-unit').value = perUnit;
}

function calculateExpenditures() {
    const homeExp = parseFloat(document.getElementById('home-exp').value) || 0;
    const millExp = parseFloat(document.getElementById('mill-exp').value) || 0;
    const unities = parseFloat(document.getElementById('unities').value) || 0;
    const labourExp = parseFloat(document.getElementById('total-cash').value) * 0.1;
    const umemeExp = unities * 850;
    const totalExp = homeExp + millExp + labourExp + umemeExp;
    const balance = parseFloat(document.getElementById('total-cash').value) - totalExp;

    document.getElementById('umeme').value = umemeExp;
    document.getElementById('labour').value = labourExp;
    document.getElementById('total-expenditures').value = totalExp;
    document.getElementById('balance').value = balance;
}

function toggleDateInput() {
    const reportType = document.getElementById('report-type').value;
    document.getElementById('date-input').style.display = reportType === 'day' ? 'block' : 'none';
    document.getElementById('week-input').style.display = reportType === 'week' ? 'block' : 'none';
    document.getElementById('month-input').style.display = reportType === 'month' ? 'block' : 'none';
    document.getElementById('year-input').style.display = reportType === 'year' ? 'block' : 'none';
}
