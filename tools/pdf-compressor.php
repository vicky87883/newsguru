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
            margin-top: 60px;
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
            margin-bottom: 20px;
            width: 100%;
            max-width: 600px;
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
            background: linear-gradient(90deg, #007BFF, #28A745, #DC3545, #FFC107);
            border-radius: 5px;
            transition: width 0.4s ease;
        }
        .info {
            margin-top: 10px;
            font-size: 0.9em;
            color: #666;
        }
        .highlight {
            font-weight: bold;
            color: #007BFF;
            background-color: #e9f7ff;
            padding: 5px;
            border-radius: 5px;
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
        .rating-section {
            margin-top: 30px;
            text-align: center;
        }
        .rating-section h2 {
            font-size: 1.2em;
            margin-bottom: 15px;
        }
        .rating-buttons {
            display: flex;
            justify-content: center;
        }
        .rating-buttons button {
            background-color: #ddd;
            border: 2px solid #ccc;
            border-radius: 5px;
            color: #333;
            padding: 10px 15px;
            margin: 0 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .rating-buttons button:hover {
            background-color: #007BFF;
            color: #fff;
        }
        .rating-buttons button.selected {
            background-color: #28a745;
            color: #fff;
            border: 2px solid #28a745;
        }
        .thank-you-message {
            display: none;
            font-size: 1.1em;
            color: #28a745;
            margin-top: 20px;
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
        <a href="#">Large File Compressor</a>
        <a href="#">Other Tools</a>
    </div>
    <div class="main-content">
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
        <div class="info" id="originalSize">Original Size: <span class="highlight"></span></div>
        <div class="info" id="compressedSize">Compressed Size: <span class="highlight"></span></div>
        <a id="downloadLink" href="#" download="compressed_pdf.pdf">Download Compressed PDF</a>
        
        <div class="rating-section">
            <h2>Rate Your Experience</h2>
            <div class="rating-buttons">
                <button data-rating="1">1</button>
                <button data-rating="2">2</button>
                <button data-rating="3">3</button>
                <button data-rating="4">4</button>
                <button data-rating="5">5</button>
            </div>
            <div class="thank-you-message" id="thankYouMessage">Thank you for your feedback!</div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    <script>
        document.getElementById('pdfInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const loader = document.getElementById('loader');
                const downloadLink = document.getElementById('downloadLink');
                const progressContainer = document.getElementById('progressContainer');
                const progressBar = document.getElementById('progressBar');
                const originalSize = document.getElementById('originalSize').querySelector('.highlight');
                const compressedSize = document.getElementById('compressedSize').querySelector('.highlight');
                
                // Show the loader and progress bar
                loader.style.display = 'block';
                progressContainer.style.display = 'block';
                originalSize.parentNode.style.display = 'none';
                compressedSize.parentNode.style.display = 'none';
                downloadLink.style.display = 'none';

                // Read the file
                const reader = new FileReader();
                reader.onload = async function(e) {
                    // Hide the loader
                    loader.style.display = 'none';

                    // Update progress bar (50% - file loaded)
                    progressBar.style.width = '50%';

                    // Show original size
                    originalSize.textContent = `${(file.size / 1024).toFixed(2)} KB`;
                    originalSize.parentNode.style.display = 'block';

                    // Compress the PDF
                    const pdfDoc = await PDFLib.PDFDocument.load(e.target.result);
                    const pages = pdfDoc.getPages();
                    for (let page of pages) {
                        const { width, height } = page.getSize();
                        const scale = 0.75; // Reduce page size to 75%
                        page.setSize(width * scale, height * scale);

                        const images = page.getImages();
                        for (let img of images) {
                            const imgBytes = await img.image.getBytes();
                            const canvas = document.createElement('canvas');
                            const ctx = canvas.getContext('2d');
                            const image = new Image();
                            image.src = URL.createObjectURL(new Blob([imgBytes]));
                            await new Promise((resolve) => {
                                image.onload = () => {
                                    canvas.width = image.width * scale;
                                    canvas.height = image.height * scale;
                                    ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
                                    resolve();
                                };
                            });
                            const newImgBytes = canvas.toDataURL('image/jpeg', 0.75); // Reduce quality to 75%
                            const newImage = await pdfDoc.embedJpg(newImgBytes);
                            img.image = newImage;
                        }
                    }
                    const pdfBytes = await pdfDoc.save();
                    
                    // Show compressed size
                    const compressedBlob = new Blob([pdfBytes], { type: 'application/pdf' });
                    compressedSize.textContent = `${(compressedBlob.size / 1024).toFixed(2)} KB`;
                    compressedSize.parentNode.style.display = 'block';

                    // Update progress bar (100% - compression complete)
                    progressBar.style.width = '100%';

                    // Show the download link
                    const compressedUrl = URL.createObjectURL(compressedBlob);
                    downloadLink.href = compressedUrl;
                    downloadLink.style.display = 'block';
                };
                reader.readAsArrayBuffer(file);
            }
        });

        // Rating system logic
        const ratingButtons = document.querySelectorAll('.rating-buttons button');
        const thankYouMessage = document.getElementById('thankYouMessage');
        
        ratingButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove selected class from all buttons
                ratingButtons.forEach(btn => btn.classList.remove('selected'));
                
                // Add selected class to the clicked button
                button.classList.add('selected');
                
                // Show thank you message
                thankYouMessage.style.display = 'block';
            });
        });
    </script>
</body>
</html>
