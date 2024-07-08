<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Quality HTML Compressor</title>
    <meta name="description" content="Compress HTML files easily using our online HTML compressor.">
    <link rel=canonical href=https://www.newsguru.live/tools/image-compressor />
<link rel="shortcut icon" type=image/x-icon href=assets/imgs/favicon.svg>
<meta name="keywords" content="HTML compressor, online tool, compress HTML, minimize file size, web development">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755" crossorigin=anonymous></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V6HH2RKGTW"></script>
<meta name="keywords" content="HTML compressor, online tool, compress HTML, minimize file size, web development">
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}
gtag('js',new Date());gtag('config','G-V6HH2RKGTW');</script>
<link rel="stylesheet" href="assets/css/imagestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
        }
        .sidebar {
            width: 200px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            padding: 15px;
            box-sizing: border-box;
            position: fixed;
        }
        .sidebar h2 {
            color: #fff;
            margin-top: 0;
        }
        .sidebar a {
            display: block;
            color: #ccc;
            padding: 8px;
            text-decoration: none;
            margin-bottom: 8px;
            border-radius: 5px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #575757;
            color: #fff;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 800px;
            width: 100%;
        }
        textarea {
            width: 100%;
            height: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .btn {
            border: 2px solid #ccc;
            color: #333;
            background-color: #87CEEB;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .btn i {
            margin-right: 8px;
        }
        .btn:hover {
            background-color: #00BFFF;
            border-color: #00BFFF;
            color: #fff;
        }
        .progress-container {
            display: none;
            margin: 20px 0;
            width: 100%;
        }
        .progress-bar {
            width: 0;
            height: 10px;
            background: linear-gradient(to right, #4caf50, #8bc34a);
            border-radius: 10px;
        }
        .file-info {
            margin: 20px 0;
            font-size: 14px;
            color: #555;
        }
        .note {
            margin-bottom: 20px;
            font-size: 16px;
            color: #ff6347;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Toolbox</h2>
    <a href="html-compressor" class="active"><i class="fab fa-html5"></i> HTML Compressor</a>
    <a href="javascript-compressor"><i class="fas fa-compress"></i> JavaScript Compressor</a>
    <a href="image-compressor"><i class="fas fa-image"></i> Image Compressor</a>
    <a href="pdf-compressor"><i class="fas fa-file-pdf"></i> PDF Compressor</a>
    <a href="emi-calculator"><i class="fas fa-calculator"></i> EMI Calculator</a>
    <a href="photoshop-online"><i class="fas fa-paint-brush"></i> Image Editor</a>
</div>

<div class="main-content">
    <div class="container">
        <h1 style="color: #4682B4;">HTML Compressor</h1>
        <p class="note">This tool will remove whitespace and comments from your HTML code, making it smaller and faster to load.</p>
        <p style="color: #4682B4;">Paste your HTML code below and click "Compress" to get the compressed HTML.</p>
        <textarea id="htmlInput" placeholder="Paste your HTML code here..."></textarea>
        <button class="btn" id="compressButton"><i class="fas fa-compress"></i> Compress HTML</button>
        <div class="progress-container" id="progressContainer">
            <div class="progress-bar" id="progressBar"></div>
        </div>
        <div class="file-info" id="fileInfo"></div>
        <textarea id="htmlOutput" placeholder="Compressed HTML will appear here..." readonly></textarea>
        <a href="#" id="downloadLink" class="btn" style="display: none;"><i class="fas fa-download"></i> Download Compressed File</a>
    </div>
</div>

<script>
    document.getElementById('compressButton').addEventListener('click', function() {
        const htmlInput = document.getElementById('htmlInput').value;
        const progressBar = document.getElementById('progressBar');
        const progressContainer = document.getElementById('progressContainer');
        const htmlOutput = document.getElementById('htmlOutput');
        const fileInfo = document.getElementById('fileInfo');
        const downloadLink = document.getElementById('downloadLink');

        if (!htmlInput) {
            alert("Please paste your HTML code.");
            return;
        }

        // Calculate original size
        const originalSize = new Blob([htmlInput], { type: 'text/html' }).size;
        fileInfo.innerHTML = `Original Size: ${(originalSize / 1024).toFixed(2)} KB`;

        // Show progress bar
        progressContainer.style.display = 'block';
        progressBar.style.width = '0%';

        // Simulate progress
        let progress = 0;
        const interval = setInterval(() => {
            progress += 10;
            progressBar.style.width = `${progress}%`;
            if (progress >= 100) {
                clearInterval(interval);

                // Compress HTML by removing whitespace and comments
                const compressedHtml = htmlInput.replace(/\s+/g, ' ').trim();

                // Hide progress bar
                progressContainer.style.display = 'none';

                // Display compressed HTML
                htmlOutput.value = compressedHtml;

                // Calculate compressed size
                const compressedSize = new Blob([compressedHtml], { type: 'text/html' }).size;
                fileInfo.innerHTML += `<br>Compressed Size: ${(compressedSize / 1024).toFixed(2)} KB`;

                // Update download link
                const blob = new Blob([compressedHtml], { type: 'text/html' });
                const url = URL.createObjectURL(blob);
                downloadLink.href = url;
                downloadLink.download = 'compressed.html';
                downloadLink.style.display = 'inline-block';
            }
        }, 100);
    });
</script>

</body>
</html>
