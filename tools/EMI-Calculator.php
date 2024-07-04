<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools - Image Compressor and EMI Calculator</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            padding: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            color: #fff;
            z-index: 1000;
            overflow-y: auto;
        }
        .sidebar h2 {
            font-size: 1.5em;
            margin-bottom: 30px;
            text-align: center;
        }
        .sidebar a {
            display: block;
            color: #ddd;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar a.active {
            background-color: #007BFF;
            color: #fff;
        }
        .sidebar::-webkit-scrollbar {
            width: 12px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: linear-gradient(180deg, #007BFF, #28A745, #DC3545, #FFC107);
            border-radius: 6px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: #343a40;
            border-radius: 6px;
            border: 3px solid transparent;
            background-clip: content-box;
        }
        .main-content {
            margin-left: 250px;
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2.5em;
            text-align: center;
        }
        .calculator, .upload-area {
            border: 2px dashed #007BFF;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            background: #fff;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
            width: 100%;
            max-width: 600px;
        }
        .calculator:hover, .upload-area:hover {
            background-color: #f1f1f1;
        }
        .upload-btn-wrapper, .calculator label {
            display: block;
            margin-bottom: 5px;
        }
        .upload-btn-wrapper input[type="file"], .calculator input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            border: 2px solid #007BFF;
            color: #007BFF;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #007BFF;
            color: #fff;
        }
        .loader, .progress-container, .result {
            display: none;
            margin-top: 20px;
        }
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        .progress-container {
            width: 80%;
            max-width: 300px;
            height: 10px;
            background-color: #ddd;
            border-radius: 5px;
        }
        .progress-bar {
            width: 0%;
            height: 100%;
            background-color: #28a745;
            border-radius: 5px;
            transition: width 0.4s ease;
        }
        .result {
            font-size: 1.2em;
            color: #333;
            text-align: center;
        }
        #downloadLink {
            display: none;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 5px;
            font-weight: bold;
        }
        #downloadLink:hover {
            background-color: #0056b3;
        }
        .resolution-info, #originalSize, #compressedSize {
            font-size: 0.9em;
            color: #666;
            margin-top: 10px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: 60px;
                overflow-y: auto;
                overflow-x: hidden;
                flex-direction: row;
                justify-content: space-around;
                padding: 0;
                box-shadow: none;
                z-index: 1000;
            }
            .sidebar h2 {
                display: none;
            }
            .sidebar a {
                margin: 0;
                padding: 15px;
            }
            .main-content {
                margin-left: 0;
                margin-top: 60px;
            }
            .upload-area, .calculator {
                width: 80%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Toolbox</h2>
        <a href="#image-compressor" class="active" onclick="showSection('imageCompressor')">Image Compressor</a>
        <a href="#emi-calculator" onclick="showSection('emiCalculator')">EMI Calculator</a>
        <a href="#">PDF Compressor</a>
        <a href="#">Large File Compressor</a>
        <a href="#">Other Tools</a>
    </div>
    <div class="main-content" id="mainContent">
        <div id="imageCompressor" class="tool-section">
            <h1>Compress Your Image</h1>
            <div class="upload-area">
                <div class="upload-btn-wrapper">
                    <button class="btn">Upload Image</button>
                    <input type="file" id="imageInput" accept="image/*">
                </div>
            </div>
            <div class="loader" id="loader"></div>
            <div class="progress-container" id="progressContainer">
                <div class="progress-bar" id="progressBar"></div>
            </div>
            <canvas id="canvas" class="image-preview"></canvas>
            <div class="resolution-info" id="originalResolution">Original Resolution: </div>
            <div class="resolution-info" id="compressedResolution">Compressed Resolution: </div>
            <div id="originalSize">Original Size: </div>
            <div id="compressedSize">Compressed Size: </div>
            <a id="downloadLink" href="#" download="compressed_image.jpg">Download Compressed Image</a>
        </div>
        <div id="emiCalculator" class="tool-section" style="display: none;">
            <h1>EMI Calculator</h1>
            <div class="calculator">
                <label for="loanAmount">Loan Amount (₹):</label>
                <input type="number" id="loanAmount" placeholder="Enter loan amount">
                
                <label for="annualInterestRate">Annual Interest Rate (%):</label>
                <input type="number" id="annualInterestRate" placeholder="Enter interest rate">
                
                <label for="loanTenure">Tenure (years):</label>
                <input type="number" id="loanTenure" placeholder="Enter tenure">
        
                <button class="btn" onclick="calculateEMI()">Calculate EMI</button>
                
                <div class="result" id="emiResult"></div>
                <div class="result" id="totalPaymentResult"></div>
            </div>
        </div>
    </div>
    
    <script>
        // Function to handle section display
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.tool-section');
            sections.forEach(section => {
                if (section.id === sectionId) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });

            const links = document.querySelectorAll('.sidebar a');
            links.forEach(link => {
                if (link.href.includes(sectionId)) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

        // EMI Calculation Logic
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
            const totalPayment = emi * numberOfPayments;

            document.getElementById('emiResult').innerText = `Monthly EMI: ₹${emi.toFixed(2)}`;
            document.getElementById('totalPaymentResult').innerText = `Total Payment: ₹${totalPayment.toFixed(2)}`;
        }

        // Initial section to show on page load
        document.addEventListener('DOMContentLoaded', () => {
            showSection('imageCompressor');  // Default section to show
        });
    </script>
</body>
</html>
