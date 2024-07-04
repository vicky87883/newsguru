<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMI Calculator</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2em;
        }
        .calculator {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>
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
    </script>
</body>
</html>
