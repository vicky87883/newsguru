<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Quality PDF Compressor</title>    
    <meta name=news_keywords content="PDF Compressor,image to 10kb,image to 20kb,image to 30kb,image to 40kb,image to 50kb,image to 100kb,image under 200kb" itemprop="keywords"/>
    <meta name=description content="Hight Quality PDF file compressor without losing pixel quality and easy download" itemprop="description"/>
    <link rel=canonical href="https://www.newsguru.live/tools/pdf-compressor" />
        <link rel="stylesheet" href="assets/css/style.css">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755" crossorigin=anonymous></script>
        <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V6HH2RKGTW"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-V6HH2RKGTW');
    </script>
</head>
<body>
    <div class="sidebar">
        <h2>Toolbox</h2>
        <a href="image-compressor">PDF Compressor</a>
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
