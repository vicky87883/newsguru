<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Compressor</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .upload-area {
            border: 2px dashed #007BFF;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            background: #fff;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
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
    </style>
</head>
<body>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    <script>
        document.getElementById('pdfInput').addEventListener('change', async function(event) {
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
                    try {
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

                        for (let i = 0; i < pages.length; i++) {
                            const page = pages[i];
                            const { width, height } = page.getSize();
                            const scale = 0.75; // Reduce page size to 75%
                            page.setSize(width * scale, height * scale);

                            const images = page.node.normalizedEntries().filter(e => e[1].object && e[1].object.dict.lookup(PDFLib.PDFName.of('Subtype')).name === 'Image');
                            for (let imgRef of images) {
                                const img = imgRef[1];
                                const imgBytes = await img.object.streamContents();
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
                                img.object.streamContent = newImage.object.streamContent;
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
                    } catch (error) {
                        console.error('Compression error:', error);
                        alert('Failed to compress PDF. Please try again.');
                    }
                };
                reader.readAsArrayBuffer(file);
            }
        });
    </script>
</body>
</html>
