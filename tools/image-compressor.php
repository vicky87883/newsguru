<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Quality Image Compressor</title>
    <meta name="news_keywords" content="image compressor,image to 10kb,image to 20kb,image to 30kb,image to 40kb,image to 50kb,image to 100kb,image under 200kb" itemprop="keywords"/>
    <meta name="description" content="High Quality image compressor without losing pixel quality and easy download" itemprop="description"/>
    <link rel="canonical" href="https://www.newsguru.live/tools/image-compressor" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/favicon.svg">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755" crossorigin="anonymous"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V6HH2RKGTW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-V6HH2RKGTW');
    </script>
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', Arial, sans-serif; /* Changed font to Roboto */
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f4f7f6; /* Light background color for better contrast */
            color: #333;
            line-height: 1.6;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 200px; /* Slightly wider for better layout */
            background: #2c3e50;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
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
            transition: background 0.3s ease, transform 0.2s ease; /* Added transform for a subtle hover effect */
            font-size: 1.1em;
            text-align: center; /* Centering text for better readability */
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #34495e;
            transform: scale(1.05); /* Slight zoom on hover */
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            margin-left: 260px; /* Adjusted to align with sidebar width */
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 1250px; /* Set max-width for better layout on larger screens */
            margin-top: 20px;
        }

        .main-content h1 {
            font-size: 2.5em; /* Larger font size for headings */
            color: #34495e;
            margin-bottom: 20px;
            text-align: center;
        }

        .main-content p {
            font-size: 1.2em; /* Increased font size for readability */
            text-align: justify; /* Justified text for better layout */
            margin-bottom: 20px;
        }

        /* Upload Button */
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            margin-top: 20px;
            width: 100%;
            text-align: center; /* Centering the upload button */
        }

        .btn {
            border: 2px solid #1abc9c;
            color: white;
            background-color: #1abc9c;
            padding: 12px 24px; /* Increased padding for better button size */
            border-radius: 8px;
            font-size: 18px; /* Larger font size */
            cursor: pointer;
            display: inline-flex; /* Inline-flex for proper button styling */
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #16a085;
            transform: scale(1.05);
        }

        .btn i {
            margin-right: 8px;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }

        /* Loader and Progress */
        .loader,
        .progress-container {
            display: none;
            margin-top: 20px;
        }

        .progress-container {
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-bar {
            width: 0;
            height: 24px;
            background-color: #1abc9c;
            border-radius: 4px;
            transition: width 0.4s ease;
        }

      /* Image Display */
.image-wrapper {
    display: flex; /* Use Flexbox */
    flex-direction: column; /* Align items in a column */
    align-items: center; /* Center items horizontally */
    border: 1px solid #ddd;
    padding: 20px;
    margin-top: 20px;
    border-radius: 8px;
    background-color: #fafafa;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.image-wrapper img {
    max-width: 100%; /* Ensure the image scales properly */
    border-radius: 8px;
    margin-bottom: 15px; /* Space between image and text details */
}

.info {
    margin: 10px 0;
    font-weight: bold;
    font-size: 1em;
    text-align: center; /* Center text for better appearance */
}

.download-link {
    display: block;
    margin-top: 10px;
    color: #1abc9c;
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
            font-size: 32px; /* Larger icons for better visibility */
            transition: color 0.3s ease, transform 0.2s ease;
            padding: 0 10px;
            color: #ccc; /* Default color */
        }

        .rating-buttons button:hover,
        .rating-buttons button.selected {
            color: #f1c40f;
            transform: scale(1.2); /* Larger scale on hover and selected */
        }

        .thank-you-message {
            display: none;
            margin-top: 10px;
            color: #16a085;
            font-weight: bold;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Toolbox</h2>
        <a href="image-compressor" class="active">Image Compressor</a>
        <a href="pdf-compressor">PDF Compressor</a>
        <a href="EMI-Calculator">EMI Calculator</a>
        <a href="photoshop-online">Image Editor</a>
    </div>
    <div class="main-content">
        <h1>High Quality Image Compressor</h1>
        <p>This online image compressor reduces the size of JPEG, GIF, and PNG images to the smallest size while maintaining the necessary quality using a clever blend of lossy compression and optimization techniques.</p>
        <p>Upload unlimited images. Await the completion of the compression. To compare photographs, use your mouse or gestures and the slider to adjust the compression level.</p>
        <ins class="adsbygoogle" style="display:block;text-align:center" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6958761602872755" data-ad-slot="5307231561"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
        <div class="upload-area">
            <div class="upload-btn-wrapper">
                <button class="btn"><i class="fas fa-upload"></i>Upload Images</button>
                <input type="file" id="imageInput" accept="image/*" multiple>
            </div>
        </div>
        <div id="imagesContainer"></div>
        <div class="loader" id="loader">Loading...</div>
        <div class="progress-container" id="progressContainer">
            <div class="progress-bar" id="progressBar"></div>
        </div>
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
    <script>document.getElementById('imageInput').addEventListener('change', function(event) {
        const files = event.target.files;
        if (files.length > 0) {
            const loader = document.getElementById('loader');
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');
            const imagesContainer = document.getElementById('imagesContainer');
            imagesContainer.innerHTML = ''; // Clear previous images
            loader.style.display = 'block';
            progressContainer.style.display = 'block';
            progressBar.style.width = '0%';
            const quality = 0.5;
            let processedCount = 0;
    
            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        canvas.width = img.width;
                        canvas.height = img.height;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0);
                        canvas.toBlob(function(blob) {
                            const compressedUrl = URL.createObjectURL(blob);
                            const compressedImage = new Image();
                            compressedImage.onload = function() {
                                const imageWrapper = document.createElement('div');
                                imageWrapper.classList.add('image-wrapper');
    
                                // Append the compressed image to the wrapper
                                imageWrapper.appendChild(compressedImage);
    
                                const originalResolution = document.createElement('div');
                                originalResolution.classList.add('info');
                                originalResolution.textContent = `Original Resolution: ${img.width}x${img.height}`;
                                const originalSize = document.createElement('div');
                                originalSize.classList.add('info');
                                originalSize.textContent = `Original Size: ${(file.size / 1024).toFixed(2)}KB`;
                                const compressedResolution = document.createElement('div');
                                compressedResolution.classList.add('info');
                                compressedResolution.textContent = `Compressed Resolution: ${compressedImage.width}x${compressedImage.height}`;
                                const compressedSize = document.createElement('div');
                                compressedSize.classList.add('info');
                                compressedSize.textContent = `Compressed Size: ${(blob.size / 1024).toFixed(2)}KB`;
                                const downloadLink = document.createElement('a');
                                downloadLink.href = compressedUrl;
                                downloadLink.download = `compressed_image_${index}.jpg`;
                                downloadLink.textContent = 'Download Compressed Image';
                                downloadLink.classList.add('download-link');
    
                                imageWrapper.appendChild(originalResolution);
                                imageWrapper.appendChild(originalSize);
                                imageWrapper.appendChild(compressedResolution);
                                imageWrapper.appendChild(compressedSize);
                                imageWrapper.appendChild(downloadLink);
                                imagesContainer.appendChild(imageWrapper);
                                processedCount++;
                                progressBar.style.width = `${(processedCount / files.length) * 100}%`;
                                if (processedCount === files.length) {
                                    loader.style.display = 'none';
                                }
                            };
                            compressedImage.src = compressedUrl;
                        }, 'image/jpeg', quality);
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });
        }
    });
    </script>
</body>
</html>
