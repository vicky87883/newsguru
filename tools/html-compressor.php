<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Quality HTML Compressor</title>
    <meta name="description" content="Compress HTML files easily using our online HTML compressor.">
    <link rel=canonical href=https://www.newsguru.live/tools/image-compressor />
<link rel="shortcut icon" type=image/x-icon href=assets/imgs/favicon.svg>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755" crossorigin=anonymous></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V6HH2RKGTW"></script>
<meta name="keywords" content="HTML compressor, online tool, compress HTML, minimize file size, web development">
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}
gtag('js',new Date());gtag('config','G-V6HH2RKGTW');</script>
<link rel="stylesheet" href="assets/css/imagestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            padding: 20px;
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
            padding: 10px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #575757;
            color: #fff;
        }
        .main-content {
            margin-left: 270px;
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
            max-width: 500px;
            width: 100%;
        }
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .btn {
            border: 2px solid #ccc;
            color: #333;
            background-color: #f8f8f8;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        .upload-btn-wrapper input[type="file"] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
        .file-info {
            margin: 20px 0;
            font-size: 14px;
            color: #555;
        }
        .progress-container {
            display: none;
            margin: 20px 0;
        }
        .progress-bar {
            width: 0;
            height: 20px;
            background-color: #4caf50;
            border-radius: 10px;
        }
        #downloadLink {
            display: none;
            margin-top: 20px;
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
        <h1>HTML Compressor</h1>
        <p>Upload your HTML file to compress it.</p>
        <div class="upload-btn-wrapper">
            <button class="btn"><i class="fas fa-upload"></i> Upload HTML File</button>
            <input type="file" id="htmlFileInput" accept=".html,.htm">
        </div>
        <div class="file-info" id="fileInfo"></div>
        <div class="progress-container" id="progressContainer">
            <div class="progress-bar" id="progressBar"></div>
        </div>
        <a href="#" id="downloadLink" class="btn"><i class="fas fa-download"></i> Download Compressed File</a>
    </div>
</div>

<script>
    document.getElementById('htmlFileInput').addEventListener('change', async function(event) {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = async function(e) {
            const originalHtml = e.target.result;

            // Show original file size
            const fileInfo = document.getElementById('fileInfo');
            fileInfo.innerHTML = `Original Size: ${(file.size / 1024).toFixed(2)} KB`;

            // Show progress bar
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');
            progressContainer.style.display = 'block';
            progressBar.style.width = '0%';

            try {
                // Compress HTML by removing whitespace and comments
                const compressedHtml = originalHtml.replace(/\s+/g, ' ').trim();

                // Hide progress bar
                progressContainer.style.display = 'none';

                // Create a Blob with the compressed HTML
                const blob = new Blob([compressedHtml], { type: 'text/html' });
                const url = URL.createObjectURL(blob);

                // Show compressed file size
                fileInfo.innerHTML += `<br>Compressed Size: ${(blob.size / 1024).toFixed(2)} KB`;

                // Update the download link
                const downloadLink = document.getElementById('downloadLink');
                downloadLink.href = url;
                downloadLink.download = 'compressed_' + file.name;
                downloadLink.style.display = 'inline-block';

                // Update progress bar to 100%
                progressBar.style.width = '100%';
            } catch (error) {
                console.error('Error compressing the HTML file:', error);
                fileInfo.innerHTML = 'Error compressing the file. Please try again.';
                progressContainer.style.display = 'none';
            }
        };

        // Read the file as text
        reader.readAsText(file);
    });
</script>

</body>
</html>
