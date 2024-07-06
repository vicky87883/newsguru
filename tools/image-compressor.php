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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 200px;
            background: #333;
            color: white;
            padding: 20px;
            height: 100vh;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px 0;
            text-decoration: none;
        }
        .sidebar a.active {
            background: #575757;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .btn {
            border: 2px solid #4CAF50;
            color: white;
            background-color: #4CAF50;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
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
        .loader, .progress-container {
            display: none;
            margin-top: 20px;
        }
        .progress-container {
            width: 100%;
            background-color: #f3f3f3;
            border-radius: 4px;
            overflow: hidden;
        }
        .progress-bar {
            width: 0;
            height: 24px;
            background-color: #4CAF50;
            border-radius: 4px;
        }
        .image-wrapper {
            border: 1px solid #ddd;
            padding: 10px;
            margin-top: 20px;
            border-radius: 8px;
        }
        .info {
            margin: 10px 0;
        }
        .download-link {
            display: block;
            margin-top: 10px;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .rating-buttons button {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 24px;
        }
        .rating-buttons button.selected {
            color: #FFD700;
        }
        .thank-you-message {
            display: none;
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Toolbox</h2>
        <a href="image-compressor" class="active">Image Compressor</a>
        <a href="pdf-compressor">PDF Compressor</a>
        <a href="EMI-Calculator">EMI-Calculator</a>
        <a href="photoshop-online">Image Editor</a>
    </div>
    <div class="main-content">
        <h1>High Quality Image Compressor</h1>
        <p class="main-content">This online image compressor reduces the size of JPEG, GIF, and PNG images to the smallest size while maintaining the necessary quality using a clever blend of lossy compression and optimization techniques.
</p>
<p class="main-content">
Upload unlimited images. Await the completion of the compression. To compare photographs, use your mouse or gestures and the slider to adjust the compression level.
</p>
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
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
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
