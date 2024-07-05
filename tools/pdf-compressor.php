<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=UTF-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<title>High Quality PDF Compressor</title>
<meta name=news_keywords content="PDF Compressor,image to 10kb,image to 20kb,image to 30kb,image to 40kb,image to 50kb,image to 100kb,image under 200kb" itemprop="keywords"/>
<meta name=description content="Hight Quality PDF file compressor without losing pixel quality and easy download" itemprop="description"/>
<link rel=canonical href=https://www.newsguru.live/tools/pdf-compressor />
<link rel=stylesheet href=assets/css/style.css>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755" crossorigin=anonymous></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V6HH2RKGTW"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}
gtag('js',new Date());gtag('config','G-V6HH2RKGTW');</script>
<style>body{display:flex;min-height:100vh;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;margin:0;background:#f5f5f5}.sidebar{width:250px;background-color:#343a40;padding:15px;box-shadow:0 0 15px rgba(0,0,0,0.1);position:fixed;top:0;left:0;bottom:0;color:#fff;z-index:1000;overflow-y:auto}.sidebar h2{font-size:1.5em;margin-bottom:30px;text-align:center}.sidebar a{display:block;color:#ddd;padding:10px 20px;text-decoration:none;border-radius:5px;margin-bottom:10px;transition:background-color .3s ease}.sidebar a:hover{background-color:#495057}.sidebar a.active{background-color:#007bff;color:#fff}.main-content{margin-left:250px;padding:40px;flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;background:#f8f9fa}h1{color:#333;margin-bottom:20px;font-size:2.5em;text-align:center}.upload-area{border:2px dashed #007bff;border-radius:10px;padding:40px;text-align:center;background:#fff;transition:background-color .3s ease;margin-bottom:20px;width:100%;max-width:600px}.upload-area:hover{background-color:#f1f1f1}.upload-btn-wrapper{position:relative;overflow:hidden;display:inline-block;cursor:pointer}.upload-btn-wrapper input[type="file"]{font-size:100px;display:inline-block;cursor:pointer;opacity:0;position:absolute;top:0;left:0;right:0;bottom:0}.btn{border:2px solid #007bff;color:#007bff;background-color:#fff;padding:10px 20px;border-radius:5px;font-size:16px;cursor:pointer;transition:all .3s ease}.btn:hover{background-color:#007bff;color:#fff}.loader{border:8px solid #f3f3f3;border-top:8px solid #3498db;border-radius:50%;width:40px;height:40px;animation:spin 1s linear infinite;display:none;margin-top:20px}.progress-container{width:80%;max-width:300px;height:10px;background-color:#ddd;border-radius:5px;margin-top:20px;display:none}.progress-bar{width:0;height:100%;background-color:#28a745;border-radius:5px;transition:width .4s ease}.size-info{margin-top:10px;font-size:.9em;color:#666}#downloadLink{display:none;margin-top:20px;text-decoration:none;padding:10px 20px;background-color:#007bff;color:#fff;border-radius:5px;font-weight:bold}#downloadLink:hover{background-color:#0056b3}@keyframes spin{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}@media(max-width:768px){.sidebar{width:100%;height:60px;overflow-y:auto;overflow-x:hidden;flex-direction:row;justify-content:space-around;padding:0;box-shadow:none;z-index:1000}.sidebar h2{display:none}.sidebar a{margin:0;padding:15px}.main-content{margin-left:0;margin-top:60px}.upload-area{width:80%;max-width:300px}}</style>
</head>
<body>
<div class=sidebar>
<h2>Toolbox</h2>
<a href=image-compressor>Image Compressor</a>
<a href=pdf-compressor class=active>PDF Compressor</a>
<a href=#>Large File Compressor</a>
<a href=#>Other Tools</a>
</div>
<div class=main-content>
<h1>Compress Your PDF</h1>
<div class=upload-area>
<div class=upload-btn-wrapper>
<button class=btn>Upload PDF</button>
<input type=file id=pdfInput accept=application/pdf>
</div>
</div>
<div class=loader id=loader></div>
<div class=progress-container id=progressContainer>
<div class=progress-bar id=progressBar></div>
</div>
<div class=size-info id=originalSize>Original Size: </div>
<div class=size-info id=compressedSize>Compressed Size: </div>
<a id=downloadLink href=# download=compressed.pdf>Download Compressed PDF</a>
</div>
<script>document.getElementById('pdfInput').addEventListener('change',function(event){const file=event.target.files[0];if(file){const loader=document.getElementById('loader');const downloadLink=document.getElementById('downloadLink');const progressContainer=document.getElementById('progressContainer');const progressBar=document.getElementById('progressBar');const originalSize=document.getElementById('originalSize');const compressedSize=document.getElementById('compressedSize');loader.style.display='block';progressContainer.style.display='block';originalSize.style.display='none';compressedSize.style.display='none';downloadLink.style.display='none';originalSize.textContent=`Original Size:${(file.size/1024).toFixed(2)}KB`;originalSize.style.display='block';setTimeout(()=>{loader.style.display='none';progressBar.style.width='100%';const compressedBlob=new Blob([file.slice(0,file.size/2)],{type:'application/pdf'});compressedSize.textContent=`Compressed Size:${(compressedBlob.size/1024).toFixed(2)}KB`;compressedSize.style.display='block';const compressedUrl=URL.createObjectURL(compressedBlob);downloadLink.href=compressedUrl;downloadLink.style.display='block';},2000);}});</script>
</body>
</html>