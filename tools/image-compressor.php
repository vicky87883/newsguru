<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>High Quality Image Compressor</title>
    
<meta name=news_keywords content="image compressor,image to 10kb,image to 20kb,image to 30kb,image to 40kb,image to 50kb,image to 100kb,image under 200kb" itemprop="keywords"/>
<meta name=description content="Hight Quality image file compressor without losing pixel quality and easy download" itemprop="description"/>
<link rel=canonical href="https://www.newsguru.live/tools/image-compressor" />
    <link rel="stylesheet" href="assets/css/style.css">
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
        <div class="info" id="originalResolution">Original Resolution: <span class="highlight"></span></div>
        <div class="info" id="compressedResolution">Compressed Resolution: <span class="highlight"></span></div>
        <div class="info" id="originalSize">Original Size: <span class="highlight"></span></div>
        <div class="info" id="compressedSize">Compressed Size: <span class="highlight"></span></div>
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
                const originalResolution = document.getElementById('originalResolution').querySelector('.highlight');
                const compressedResolution = document.getElementById('compressedResolution').querySelector('.highlight');
                const originalSize = document.getElementById('originalSize').querySelector('.highlight');
                const compressedSize = document.getElementById('compressedSize').querySelector('.highlight');
                
                // Show the loader and progress bar
                loader.style.display = 'block';
                progressContainer.style.display = 'block';
                originalResolution.parentNode.style.display = 'none';
                compressedResolution.parentNode.style.display = 'none';
                originalSize.parentNode.style.display = 'none';
                compressedSize.parentNode.style.display = 'none';
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
                        originalResolution.textContent = `${img.width} x ${img.height}`;
                        originalResolution.parentNode.style.display = 'block';
                        originalSize.textContent = `${(file.size / 1024).toFixed(2)} KB`;
                        originalSize.parentNode.style.display = 'block';

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
                                compressedResolution.textContent = `${compressedImage.width} x ${compressedImage.height}`;
                                compressedResolution.parentNode.style.display = 'block';
                                canvas.style.display = 'block';

                                // Update progress bar (100% - compression complete)
                                progressBar.style.width = '100%';

                                // Show compressed size
                                compressedSize.textContent = `${(blob.size / 1024).toFixed(2)} KB`;
                                compressedSize.parentNode.style.display = 'block';

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
