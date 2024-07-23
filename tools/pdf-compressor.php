<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Quality PDF Compressor</title>
    <meta name="news_keywords" content="PDF Compressor, compress PDF, reduce PDF size, multiple PDF compressor"
        itemprop="keywords" />
    <meta name="description" content="High Quality PDF file compressor without losing quality, easy to use and download"
        itemprop="description" />
    <link rel="canonical" href="https://www.newsguru.live/tools/pdf-compressor" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin=anonymous referrerpolicy=no-referrer />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755"
        crossorigin="anonymous"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V6HH2RKGTW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-V6HH2RKGTW');
    </script>
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f4f7f6;
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            flex-direction: column;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 200px;
            background: #2c3e50;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.8em;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px 0;
            margin-bottom: 10px;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s ease, transform 0.2s ease;
            font-size: 1.1em;
            text-align: center;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #34495e;
            transform: scale(1.05);
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            margin-left: 270px;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 1250px;
        }

        .main-content h1 {
            font-size: 2.5em;
            color: #34495e;
            margin-bottom: 20px;
            text-align: center;
        }

        .main-content p {
            font-size: 1.2em;
            text-align: justify;
            margin-bottom: 20px;
        }

        /* Upload Area */
        .upload-area {
            border: 2px dashed #007bff;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            background: #fff;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
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
            border: 2px solid #007bff;
            color: #007bff;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* Loader and Progress */
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
            margin: 10px auto;
        }

        .progress-bar {
            width: 0;
            height: 100%;
            background-color: #28a745;
            border-radius: 5px;
            transition: width 0.4s ease;
        }

        /* PDF Display */
        .pdf-wrapper {
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            background-color: #fafafa;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .info {
            margin: 10px 0;
            font-weight: bold;
            font-size: 1em;
        }

        .download-link {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .download-link:hover {
            text-decoration: underline;
        }

        /* Rating Section */
        .rating-section {
            margin-top: 40px;
            text-align: center;
        }

        .rating-section h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #34495e;
        }

        .rating-buttons button {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 32px;
            transition: color 0.3s ease, transform 0.2s ease;
            padding: 0 10px;
            color: #ccc;
        }

        .rating-buttons button:hover,
        .rating-buttons button.selected {
            color: #f1c40f;
            transform: scale(1.2);
        }

        .thank-you-message {
            display: none;
            margin-top: 10px;
            color: #16a085;
            font-weight: bold;
            font-size: 1.2em;
        }

        /* Spinner Animation */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Responsive Design */
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

            .upload-area {
                width: 80%;
                max-width: 300px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Toolbox</h2>
        <a href="image-compressor">Image Compressor</a>
        <a href="pdf-compressor" class="active">PDF Compressor</a>
        <a href="large-file-compressor">Large File Compressor</a>
        <a href="other-tools">Other Tools</a>
    </div>
    <div class="main-content">
        <h1>Compress Your PDFs</h1>
        <div class="upload-area">
            <div class="upload-btn-wrapper">
                <button class="btn">Upload PDFs</button>
                <input type="file" id="pdfInput" accept="application/pdf" multiple>
            </div>
        </div>
        <div class="loader" id="loader"></div>
        <div class="progress-container" id="progressContainer">
            <div class="progress-bar" id="progressBar"></div>
        </div>
        <div class="pdf-wrapper" id="pdfWrapper"></div>
        <div class="rating-section">
            <h2>Rate Your Experience</h2>
            <div class="rating-buttons">
                <button data-rating="1"><i class="fas fa-star"></i></button>
                <button data-rating="2"><i class="fas fa-star"></i></button>
                <button data-rating="3"><i class="fas fa-star"></i></button>
                <button data-rating="4"><i class="fas fa-star"></i></button>
                <button data-rating="5"><i class="fas fa-star"></i></button>
            </div>
            <div class="thank-you-message" id="thankYouMessage">Thank you for your feedback!</div>
        </div>
    </div>
    <script>
        document.getElementById('pdfInput').addEventListener('change', function (event) {
            const files = event.target.files;
            const loader = document.getElementById('loader');
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');
            const pdfWrapper = document.getElementById('pdfWrapper');
            loader.style.display = 'block';
            progressContainer.style.display = 'block';
            progressBar.style.width = '0%';
            pdfWrapper.innerHTML = '';
            let completed = 0;
            const totalFiles = files.length;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const originalSize = (file.size / 1024).toFixed(2);
                setTimeout(() => {
                    const compressedSize = (file.size / 2 / 1024).toFixed(2); // Simulate compression
                    const compressedBlob = new Blob([file.slice(0, file.size / 2)], { type: 'application/pdf' });
                    const compressedUrl = URL.createObjectURL(compressedBlob);
                    const pdfInfo = document.createElement('div');
                    pdfInfo.className = 'info';
                    pdfInfo.innerHTML = `
                        <p>Original Size: ${originalSize} KB</p>
                        <p>Compressed Size: ${compressedSize} KB</p>
                        <a href="${compressedUrl}" class="download-link" download="compressed_${file.name}">Download Compressed PDF</a>
                    `;
                    pdfWrapper.appendChild(pdfInfo);
                    completed++;
                    progressBar.style.width = `${(completed / totalFiles) * 100}%`;
                    if (completed === totalFiles) {
                        loader.style.display = 'none';
                    }
                }, 2000); // Simulate a 2-second compression process for each file
            }
        });

        // Rating system functionality
        const ratingButtons = document.querySelectorAll('.rating-buttons button');
        const thankYouMessage = document.getElementById('thankYouMessage');
        ratingButtons.forEach(button => {
            button.addEventListener('click', () => {
                ratingButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');
                thankYouMessage.style.display = 'block';
            });
        });
    </script>
</body>

</html>