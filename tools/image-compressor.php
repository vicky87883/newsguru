<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=UTF-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<title>High Quality Image Compressor</title>
<meta name=news_keywords content="image compressor,image to 10kb,image to 20kb,image to 30kb,image to 40kb,image to 50kb,image to 100kb,image under 200kb" itemprop="keywords"/>
<meta name=description content="High Quality image compressor without losing pixel quality and easy download" itemprop="description"/>
<link rel=canonical href=https://www.newsguru.live/tools/image-compressor />
<link rel="shortcut icon" type=image/x-icon href=assets/imgs/favicon.svg>
<link rel=stylesheet href=assets/css/style.css>
<script src=https://kit.fontawesome.com/a076d05399.js crossorigin=anonymous></script>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin=anonymous referrerpolicy=no-referrer />
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755" crossorigin=anonymous></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V6HH2RKGTW"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}
gtag('js',new Date());gtag('config','G-V6HH2RKGTW');</script>
<link rel="stylesheet" href="assets/css/imagestyle.css">
</head>
<body>
<div class=sidebar>
<h2>Toolbox</h2>
<a href=image-compressor class=active>Image Compressor</a>
<a href=pdf-compressor>PDF Compressor</a>
<a href=EMI-Calculator>EMI Calculator</a>
<a href=photoshop-online>Image Editor</a>
</div>
<div class=main-content>
<h1>High Quality Image Compressor</h1>
<p>This online image compressor reduces the size of JPEG, GIF, and PNG images to the smallest size while maintaining the necessary quality using a clever blend of lossy compression and optimization techniques.</p>
<p>Upload unlimited images. Await the completion of the compression. To compare photographs, use your mouse or gestures and the slider to adjust the compression level.</p>
<ins class=adsbygoogle style=display:block;text-align:center data-ad-layout=in-article data-ad-format=fluid data-ad-client=ca-pub-6958761602872755 data-ad-slot=5307231561></ins>
<script>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
<div class=upload-area>
<div class=upload-btn-wrapper>
<button class=btn><i class="fas fa-upload"></i>Upload Images</button>
<input type=file id=imageInput accept=image/* multiple>
</div>
</div>
<div id=imagesContainer></div>
<div class=loader id=loader>Loading...</div>
<div class=progress-container id=progressContainer>
<div class=progress-bar id=progressBar></div>
</div>
<div class=rating-section>
<h2>Rate Your Experience</h2>
<div class=rating-buttons>
<button data-rating=1><i class="fas fa-star"></i></button>
<button data-rating=2><i class="fas fa-star"></i></button>
<button data-rating=3><i class="fas fa-star"></i></button>
<button data-rating=4><i class="fas fa-star"></i></button>
<button data-rating=5><i class="fas fa-star"></i></button>
</div>
<div class=thank-you-message id=thankYouMessage>Thank you for your feedback!</div>
</div>
</div>
<script>document.getElementById('imageInput').addEventListener('change',function(event){const files=event.target.files;if(files.length>0){const loader=document.getElementById('loader');const progressContainer=document.getElementById('progressContainer');const progressBar=document.getElementById('progressBar');const imagesContainer=document.getElementById('imagesContainer');imagesContainer.innerHTML='';loader.style.display='block';progressContainer.style.display='block';progressBar.style.width='0%';const quality=0.5;let processedCount=0;Array.from(files).forEach((file,index)=>{const reader=new FileReader();reader.onload=function(e){const img=new Image();img.onload=function(){const canvas=document.createElement('canvas');canvas.width=img.width;canvas.height=img.height;const ctx=canvas.getContext('2d');ctx.drawImage(img,0,0);canvas.toBlob(function(blob){const compressedUrl=URL.createObjectURL(blob);const compressedImage=new Image();compressedImage.onload=function(){const imageWrapper=document.createElement('div');imageWrapper.classList.add('image-wrapper');imageWrapper.appendChild(compressedImage);const originalResolution=document.createElement('div');originalResolution.classList.add('info');originalResolution.textContent=`Original Resolution:${img.width}x${img.height}`;const originalSize=document.createElement('div');originalSize.classList.add('info');originalSize.textContent=`Original Size:${(file.size/1024).toFixed(2)}KB`;const compressedResolution=document.createElement('div');compressedResolution.classList.add('info');compressedResolution.textContent=`Compressed Resolution:${compressedImage.width}x${compressedImage.height}`;const compressedSize=document.createElement('div');compressedSize.classList.add('info');compressedSize.textContent=`Compressed Size:${(blob.size/1024).toFixed(2)}KB`;const downloadLink=document.createElement('a');downloadLink.href=compressedUrl;downloadLink.download=`compressed_image_${index}.jpg`;downloadLink.textContent='Download Compressed Image';downloadLink.classList.add('download-link');imageWrapper.appendChild(originalResolution);imageWrapper.appendChild(originalSize);imageWrapper.appendChild(compressedResolution);imageWrapper.appendChild(compressedSize);imageWrapper.appendChild(downloadLink);imagesContainer.appendChild(imageWrapper);processedCount++;progressBar.style.width=`${(processedCount/files.length)*100}%`;if(processedCount===files.length){loader.style.display='none';}};compressedImage.src=compressedUrl;},'image/jpeg',quality);};img.src=e.target.result;};reader.readAsDataURL(file);});}});</script>
</body>
</html>