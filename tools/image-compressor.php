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
            z-index: 1000; /* Ensure sidebar is above content */
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
            margin-top: 60px; /* Ensure content is below the fixed sidebar */
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
            max-width: 600px; /* Limit width for smaller screens */
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
        .image-preview {
            margin-top: 20px;
            max-width: 100%;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .resolution-info {
            margin-top: 10px;
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
                margin-top: 60px; /* Adjust margin to align content below fixed header */
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
        <a href="image-compressor" class="active">Image Compressor</a>
        <a href="pdf-compressor">PDF Compressor</a>
        <a href="#">Large File Compressor</a>
        <a href="#">Other Tools</a>
    </div>
    <div class="main-content">
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
        <a id="downloadLink" href="#" download="compressed_image.jpg">Download Compressed Image</a>
    </div>
    
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const loader = document.getElementById('loader');
                const canvas = document.getElementById('canvas');
                const downloadLink = document.getElementById('downloadLink');
                const progressContainer = document.getElementById('progressContainer');
                const progressBar = document.getElementById('progressBar');
                const originalResolution = document.getElementById('originalResolution');
                const compressedResolution = document.getElementById('compressedResolution');
                
                // Show the loader and progress bar
                loader.style.display = 'block';
                progressContainer.style.display = 'block';
                originalResolution.style.display = 'none';
                compressedResolution.style.display = 'none';
                canvas.style.display = 'none';
                downloadLink.style.display = 'none';
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        // Hide the loader
                        loader.style.display = 'none';

                        // Update progress bar (50% - image loaded)
                        progressBar.style.width = '50%';

                        // Show original resolution
                        originalResolution.textContent = `Original Resolution: ${img.width} x ${img.height}`;
                        originalResolution.style.display = 'block';

                        // Set canvas dimensions
                        canvas.width = img.width;
                        canvas.height = img.height;
                        
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0);

                        // Compress the image
                        const quality = 0.5; // Adjust this value (0 to 1) to change compression level
                        const compressedDataUrl = canvas.toDataURL('image/jpeg', quality);

                        // Update the canvas with the compressed image
                        const compressedImage = new Image();
                        compressedImage.onload = function() {
                            canvas.width = compressedImage.width;
                            canvas.height = compressedImage.height;
                            ctx.drawImage(compressedImage, 0, 0);
                            
                            // Show compressed resolution
                            compressedResolution.textContent = `Compressed Resolution: ${compressedImage.width} x ${compressedImage.height}`;
                            compressedResolution.style.display = 'block';

                            // Display the canvas and download link
                            canvas.style.display = 'block';
                            downloadLink.style.display = 'inline-block';
                            downloadLink.href = compressedDataUrl;

                            // Update progress bar (100% - compression complete)
                            progressBar.style.width = '100%';
                        };
                        compressedImage.src = compressedDataUrl;
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
