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
            overflow-y: auto; /* Enable scrollbar */
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

        /* Custom Scrollbar */
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
            background: linear-gradient(90deg, #007BFF, #28A745, #DC3545, #FFC107);
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
        .resolution-info, .size-info {
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
            display: none; /* Initially hidden */
            font-size: 1.1em;
            color: #28a745;
            margin-top: 20px;
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
        <div class="size-info" id="originalSize">Original Size: </div>
        <div class="size-info" id="compressedSize">Compressed Size: </div>
        <a id="downloadLink" href="#" download="compressed_image.jpg">Download Compressed Image</a>
        
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
                const originalSize = document.getElementById('originalSize');
                const compressedSize = document.getElementById('compressedSize');
                
                // Show the loader and progress bar
                loader.style.display = 'block';
                progressContainer.style.display = 'block';
                originalResolution.style.display = 'none';
                compressedResolution.style.display = 'none';
                originalSize.style.display = 'none';
                compressedSize.style.display = 'none';
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

                        // Show original resolution and size
                        originalResolution.textContent = `Original Resolution: ${img.width} x ${img.height}`;
                        originalResolution.style.display = 'block';
                        originalSize.textContent = `Original Size: ${(file.size / 1024).toFixed(2)} KB`;
                        originalSize.style.display = 'block';

                        // Set canvas dimensions
                        canvas.width = img.width;
                        canvas.height = img.height;
                        
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0);

                        // Compress the image
                        const quality = 0.5; // Adjust this value (0 to 1) to change compression level
                        canvas.toBlob(function(blob) {
                            const compressedUrl = URL.createObjectURL(blob);
                            const compressedImage = new Image();
                            compressedImage.onload = function() {
                                canvas.width = compressedImage.width;
                                canvas.height = compressedImage.height;
                                ctx.drawImage(compressedImage, 0, 0);
                                
                                // Show compressed resolution
                                compressedResolution.textContent = `Compressed Resolution: ${compressedImage.width} x ${compressedImage.height}`;
                                compressedResolution.style.display = 'block';
                                canvas.style.display = 'block';

                                // Update progress bar (100% - compression complete)
                                progressBar.style.width = '100%';

                                // Show compressed size
                                compressedSize.textContent = `Compressed Size: ${(blob.size / 1024).toFixed(2)} KB`;
                                compressedSize.style.display = 'block';

                                // Show the download link
                                downloadLink.href = compressedUrl;
                                downloadLink.style.display = 'block';
                            };
                            compressedImage.src = compressedUrl;
                        }, 'image/jpeg', quality);
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
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
