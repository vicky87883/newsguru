<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Compression Tool</title>
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
            transition: transform 0.3s ease;
        }
        .sidebar.hidden {
            transform: translateX(-100%);
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
        .main-content {
            margin-left: 250px;
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            transition: margin-left 0.3s ease;
        }
        .main-content.full {
            margin-left: 0;
        }
        .hamburger {
            display: none;
            position: absolute;
            top: 15px;
            left: 15px;
            width: 30px;
            height: 30px;
            cursor: pointer;
            z-index: 10;
        }
        .hamburger div {
            width: 100%;
            height: 4px;
            background-color: #343a40;
            margin: 6px 0;
            transition: transform 0.3s ease;
        }
        .hamburger.open div:nth-child(1) {
            transform: translateY(10px) rotate(45deg);
        }
        .hamburger.open div:nth-child(2) {
            opacity: 0;
        }
        .hamburger.open div:nth-child(3) {
            transform: translateY(-10px) rotate(-45deg);
        }

        /* Styles for the rest of the content */
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2.5em;
            text-align: center;
        }
        .upload-area {
            border: 2px dashed #007BFF;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            background: #fff;
            transition: background-color 0.3s ease;
        }
        .upload-area:hover {
            background-color: #f1f1f1;
        }
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            cursor: pointer;
        }
        .upload-btn-wrapper input[type="file"] {
            font-size: 100px;
            display: inline-block;
            cursor: pointer;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
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
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            display: none;
            margin-top: 20px;
        }
        .progress-container {
            width: 80%;
            max-width: 300px;
            height: 10px;
            background-color: #ddd;
            border-radius: 5px;
            margin-top: 20px;
            display: none;
        }
        .progress-bar {
            width: 0%;
            height: 100%;
            background-color: #28a745;
            border-radius: 5px;
            transition: width 0.4s ease;
        }
        .resolution-info {
            margin-top: 10px;
            font-size: 0.9em;
            color: #666;
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
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .hamburger {
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="hamburger" id="hamburger">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="sidebar" id="sidebar">
        <h2>Toolbox</h2>
        <a href="image-compressor">Image Compressor</a>
        <a href="pdf_compressor" class="active">PDF Compressor</a>
        <a href="#">Large File Compressor</a>
        <a href="#">Other Tools</a>
    </div>
    <div class="main-content" id="mainContent">
        <h1>Compress Your PDF</h1>
        <div class="upload-area">
            <div class="upload-btn-wrapper">
                <button class="btn">Upload PDF</button>
                <input type="file" id="pdfInput" accept="application/pdf">
            </div>
        </div>
        <div class="loader" id="loader"></div>
        <div class="progress-container" id="progressContainer">
            <div class="progress-bar" id="progressBar"></div>
        </div>
        <div class="resolution-info" id="fileInfo">File Information: </div>
        <a id="downloadLink" href="#" download="compressed_pdf.pdf">Download Compressed PDF</a>
    </div>
    
   <script>document.getElementById('pdfInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const loader = document.getElementById('loader');
        const downloadLink = document.getElementById('downloadLink');
        const progressContainer = document.getElementById('progressContainer');
        const progressBar = document.getElementById('progressBar');
        const fileInfo = document.getElementById('fileInfo');

        // Show the loader and progress bar
        loader.style.display = 'block';
        progressContainer.style.display = 'block';
        fileInfo.style.display = 'none';
        downloadLink.style.display = 'none';

        // Create FormData object to send the file to server-side PHP script
        const formData = new FormData();
        formData.append('pdf', file);

        // AJAX request to upload and compress PDF
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'compress_pdf.php', true);

        xhr.upload.onprogress = function(event) {
            if (event.lengthComputable) {
                const percentComplete = (event.loaded / event.total) * 100;
                progressBar.style.width = percentComplete + '%';
            }
        };

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Hide the loader
                loader.style.display = 'none';

                // Show file info
                fileInfo.textContent = `File Information: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
                fileInfo.style.display = 'block';

                // Parse response
                const response = JSON.parse(xhr.responseText);
                const downloadUrl = response.url;

                // Set download link
                downloadLink.href = downloadUrl;
                downloadLink.style.display = 'inline-block';

                // Update progress bar (100% - upload complete)
                progressBar.style.width = '100%';
            } else {
                const response = JSON.parse(xhr.responseText);
                alert('Error compressing the PDF: ' + response.error);
            }
        };

        xhr.onerror = function() {
            alert('An error occurred during the transaction');
        };

        xhr.send(formData);
    }
});
</script>
</body>
</html>
