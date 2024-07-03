<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Calculators</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
        }
        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin-bottom: 30px;
        }
        .calculator h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .calculator input, .calculator select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .calculator button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .calculator button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Financial Calculators</h1>

    <!-- FD Calculator -->
    <div class="calculator" id="fdCalculator">
        <h2>FD Calculator</h2>
        <label for="fdPrincipal">Principal Amount (₹):</label>
        <input type="number" id="fdPrincipal" placeholder="Enter principal amount">
        
        <label for="fdRate">Annual Interest Rate (%):</label>
        <input type="number" id="fdRate" placeholder="Enter interest rate">

        <label for="fdTenure">Tenure (years):</label>
        <input type="number" id="fdTenure" placeholder="Enter tenure">

        <button onclick="calculateFD()">Calculate Maturity Amount</button>
        
        <div class="result" id="fdResult"></div>
    </div>

    <!-- EMI Calculator -->
    <div class="calculator" id="emiCalculator">
        <h2>EMI Calculator</h2>
        <label for="loanAmount">Loan Amount (₹):</label>
        <input type="number" id="loanAmount" placeholder="Enter loan amount">
        
        <label for="annualInterestRate">Annual Interest Rate (%):</label>
        <input type="number" id="annualInterestRate" placeholder="Enter interest rate">
        
        <label for="loanTenure">Tenure (years):</label>
        <input type="number" id="loanTenure" placeholder="Enter tenure">

        <button onclick="calculateEMI()">Calculate EMI</button>
        
        <div class="result" id="emiResult"></div>
    </div>

    <script>
        function calculateFD() {
            const principal = parseFloat(document.getElementById('fdPrincipal').value);
            const rate = parseFloat(document.getElementById('fdRate').value) / 100;
            const tenure = parseFloat(document.getElementById('fdTenure').value);
            
            if (isNaN(principal) || isNaN(rate) || isNaN(tenure)) {
                alert("Please enter valid values");
                return;
            }
            
            const maturityAmount = principal * Math.pow((1 + rate), tenure);
            document.getElementById('fdResult').innerText = `Maturity Amount: ₹${maturityAmount.toFixed(2)}`;
        }

        function calculateEMI() {
            const loanAmount = parseFloat(document.getElementById('loanAmount').value);
            const annualInterestRate = parseFloat(document.getElementById('annualInterestRate').value) / 100;
            const loanTenure = parseFloat(document.getElementById('loanTenure').value);

            if (isNaN(loanAmount) || isNaN(annualInterestRate) || isNaN(loanTenure)) {
                alert("Please enter valid values");
                return;
            }

            const monthlyInterestRate = annualInterestRate / 12;
            const numberOfPayments = loanTenure * 12;
            const emi = loanAmount * monthlyInterestRate * Math.pow((1 + monthlyInterestRate), numberOfPayments) / (Math.pow((1 + monthlyInterestRate), numberOfPayments) - 1);

            document.getElementById('emiResult').innerText = `Monthly EMI: ₹${emi.toFixed(2)}`;
        }
    </script>
</body>
</html>
