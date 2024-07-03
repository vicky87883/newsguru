<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Compression Tool</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }
        /* Sidebar Styles */
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

        /* Hamburger Styles */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 10;
        }
        .hamburger div {
            width: 30px;
            height: 3px;
            background-color: #333;
            margin: 5px 0;
            transition: 0.4s;
        }
        .hamburger.open div:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }
        .hamburger.open div:nth-child(2) {
            opacity: 0;
        }
        .hamburger.open div:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        /* Main Content Styles */
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
            display: none; /* Initially hidden */
            margin-top: 20px;
        }
        .progress-container {
            width: 80%;
            max-width: 300px;
            height: 10px;
            background-color: #ddd;
            border-radius: 5px;
            margin-top: 20px;
            display: none; /* Initially hidden */
        }
        .progress-bar {
            width: 0%;
            height: 100%;
            background-color: #28a745;
            border-radius: 5px;
            transition: width 0.4s ease;
        }
        .file-info {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
        }
        #downloadLink {
            display: none; /* Initially hidden */
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
                width: 250px;
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .hamburger {
                display: flex;
            }
            .main-content {
                margin-left: 0;
                transition: transform 0.3s ease;
            }
            .main-content.full {
                transform: translateX(250px);
            }
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2>Toolbox</h2>
        <a href="#" class="active">Image Compressor</a>
        <a href="#">PDF Compressor</a>
        <a href="#">Large File Compressor</a>
        <a href="#">Other Tools</a>
    </div>
    <div class="hamburger" id="hamburger">
        <div></div>
        <div></div>
        <div></div>
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
        <div class="file-info" id="fileInfo">File Information: </div>
        <a id="downloadLink" href="#" download="compressed_file.pdf">Download Compressed PDF</a>
    </div>
    
    <!-- Include pdf-lib from a CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    
    <script>
        document.getElementById('pdfInput').addEventListener('change', async function(event) {
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

                // Read the file
                const reader = new FileReader();
                reader.readAsArrayBuffer(file);
                reader.onload = async function(e) {
                    const pdfDoc = await PDFLib.PDFDocument.load(e.target.result);
                    const pages = pdfDoc.getPages();

                    // Reduce image quality on each page
                    for (const page of pages) {
                        const { width, height } = page.getSize();
                        page.scale(0.5, 0.5); // Adjust scale factor for compression
                    }

                    // Serialize the PDFDocument to bytes (a Uint8Array)
                    const pdfBytes = await pdfDoc.save();

                    // Create a blob from the bytes
                    const blob = new Blob([pdfBytes], { type: 'application/pdf' });

                    // Create a URL for the blob
                    const url = URL.createObjectURL(blob);

                    // Set the download link
                    downloadLink.href = url;
                    downloadLink.style.display = 'inline-block';

                    // Hide the loader
                    loader.style.display = 'none';

                    // Show file info
                    fileInfo.textContent = `File Information: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
                    fileInfo.style.display = 'block';
                };

                reader.onerror = function(e) {
                    alert('An error occurred while reading the file.');
                    loader.style.display = 'none';
                    progressContainer.style.display = 'none';
                };
            }
        });

        document.getElementById('hamburger').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            sidebar.classList.toggle('open');
            mainContent.classList.toggle('full');
            this.classList.toggle('open');
        });
    </script>
</body>
</html>
