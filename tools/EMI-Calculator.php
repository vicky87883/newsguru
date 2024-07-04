<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Quality PDF Compressor</title>    
    <!-- Meta Description -->
    <meta name="description" content="Calculate your monthly EMI easily with our free online EMI Calculator. Enter your loan details and get instant results for your home, car, or personal loans. Plan your finances better with accurate and fast calculations.">

    <!-- Meta Keywords -->
    <meta name="keywords" content="EMI Calculator, monthly EMI, loan calculator, home loan EMI, car loan EMI, personal loan EMI, financial planning, loan interest, loan repayment, online calculator, free EMI calculation">

    <link rel="canonical" href="https://www.newsguru.live/tools/EMI-Calculator" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755" crossorigin=anonymous></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V6HH2RKGTW"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-V6HH2RKGTW');
    </script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            margin: 0;
        }
        .sidebar {
            width: 200px;
            background: #333;
            color: white;
            padding: 20px;
            box-sizing: border-box;
        }
        .sidebar h2 {
            color: #fff;
        }
        .sidebar a {
            color: #bbb;
            text-decoration: none;
            display: block;
            margin: 10px 0;
        }
        .sidebar a.active {
            color: #fff;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .calculator {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .calculator label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .calculator input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .calculator button {
            width: 100%;
            padding: 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .calculator button:hover {
            background-color: #0056b3;
        }
        .results {
            margin-top: 20px;
        }
        .results p {
            margin: 10px 0;
            font-size: 1.1em;
        }
        .results span {
            font-weight: bold;
            color: #007BFF;
        }
        .clock {
            position: relative;
            width: 300px;
            height: 300px;
            border: 2px solid #007BFF;
            border-radius: 50%;
            margin: 0 auto;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .clock .hand {
            position: absolute;
            width: 50%;
            height: 6px;
            background: #007BFF;
            top: 50%;
            transform-origin: 100%;
            transform: rotate(90deg);
            transition: transform 0.5s cubic-bezier(0.4, 2.3, 0.3, 1);
        }
        .clock .hour {
            height: 8px;
            width: 35%;
            background: #333;
        }
        .clock .minute {
            height: 6px;
        }
        .clock .second {
            height: 4px;
            background: #FF0000;
        }
        .clock .center {
            position: absolute;
            width: 12px;
            height: 12px;
            background: #007BFF;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Toolbox</h2>
        <a href="image-compressor">Image Compressor</a>
        <a href="pdf-compressor">PDF Compressor</a>
        <a href="EMI-Calculator" class="active">EMI Calculator</a>
        <a href="#">Other Tools</a>
    </div>
    <div class="main-content">
        <h1>EMI Calculator</h1>
        <div class="calculator">
            <label for="principal">Principal Amount (₹):</label>
            <input type="number" id="principal" placeholder="Enter principal amount" required>

            <label for="rate">Annual Interest Rate (%):</label>
            <input type="number" id="rate" step="0.01" placeholder="Enter annual interest rate" required>

            <label for="tenure">Loan Tenure (years):</label>
            <input type="number" id="tenure" placeholder="Enter loan tenure in years" required>

            <button onclick="calculateEMI()">Calculate EMI</button>

            <div class="results" id="results" style="display: none;">
                <p>EMI Amount: <span id="emiAmount">₹0</span></p>
                <p>Total Interest Payable: <span id="totalInterest">₹0</span></p>
                <p>Total Payment (Principal + Interest): <span id="totalPayment">₹0</span></p>
            </div>
        </div>
        <div class="clock">
            <div class="hand hour" id="hourHand"></div>
            <div class="hand minute" id="minuteHand"></div>
            <div class="hand second" id="secondHand"></div>
            <div class="center"></div>
        </div>
    </div>

    <script>
        function calculateEMI() {
            // Get input values
            const principal = parseFloat(document.getElementById('principal').value);
            const rate = parseFloat(document.getElementById('rate').value);
            const tenure = parseInt(document.getElementById('tenure').value);

            if (isNaN(principal) || isNaN(rate) || isNaN(tenure)) {
                alert("Please enter valid values.");
                return;
            }

            // Calculate monthly interest rate
            const monthlyRate = rate / (12 * 100);

            // Calculate total number of payments
            const totalPayments = tenure * 12;

            // Calculate EMI using the formula
            const emi = (principal * monthlyRate * Math.pow(1 + monthlyRate, totalPayments)) / (Math.pow(1 + monthlyRate, totalPayments) - 1);

            // Calculate total interest
            const totalInterest = (emi * totalPayments) - principal;

            // Calculate total payment
            const totalPayment = principal + totalInterest;

            // Display results
            document.getElementById('emiAmount').textContent = `₹${emi.toFixed(2)}`;
            document.getElementById('totalInterest').textContent = `₹${totalInterest.toFixed(2)}`;
            document.getElementById('totalPayment').textContent = `₹${totalPayment.toFixed(2)}`;

            document.getElementById('results').style.display = 'block';
        }

        // Clock functionality
        function updateClock() {
            const now = new Date();
            const seconds = now.getSeconds();
            const minutes = now.getMinutes();
            const hours = now.getHours();

            const secondHand = document.getElementById('secondHand');
            const minuteHand = document.getElementById('minuteHand');
            const hourHand = document.getElementById('hourHand');

            const secondDegree = ((seconds / 60) * 360) + 90;
            const minuteDegree = ((minutes / 60) * 360) + ((seconds / 60) * 6) + 90;
            const hourDegree = ((hours / 12) * 360) + ((minutes / 60) * 30) + 90;

            secondHand.style.transform = `rotate(${secondDegree}deg)`;
            minuteHand.style.transform = `rotate(${minuteDegree}deg)`;
            hourHand.style.transform = `rotate(${hourDegree}deg)`;
        }

        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>
