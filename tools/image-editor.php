<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=UTF-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<title>Advanced Image Editor</title>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css>
<style>body{display:flex;min-height:100vh;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;background:#f5f5f5;margin:0}.sidebar{width:200px;background:#333;color:white;padding:20px;box-sizing:border-box;display:flex;flex-direction:column}.sidebar h2{color:#fff}.sidebar a{color:#bbb;text-decoration:none;display:block;margin:10px 0}.sidebar a.active{color:#fff}.main-content{flex:1;padding:20px;display:flex;flex-direction:column;align-items:center}.upload-area{margin-bottom:20px}.upload-btn-wrapper{position:relative;overflow:hidden;display:inline-block}.upload-btn-wrapper .btn{border:2px solid #007bff;color:#fff;background-color:#007bff;padding:10px 20px;border-radius:8px;font-size:20px;cursor:pointer;transition:background-color .3s}.upload-btn-wrapper input[type=file]{font-size:100px;position:absolute;left:0;top:0;opacity:0}.image-section{position:relative;display:flex;justify-content:center;margin-bottom:20px;border:2px solid #444;padding:10px;background:#fff;width:100%;max-width:800px}#canvas{border:1px solid #ddd;max-width:100%}.controls{display:flex;flex-direction:column;align-items:center;width:100%;max-width:800px}.controls label{margin-top:10px;font-weight:bold}.controls input[type=range]{width:80%;margin:5px 0}.shape-controls,.text-controls,.buttons{display:flex;flex-wrap:wrap;margin-top:10px}.shape-controls .button,.text-controls .button,.buttons .button{margin:5px;padding:10px;border:0;border-radius:8px;background-color:#007bff;color:#fff;font-size:16px;cursor:pointer;transition:background-color .3s}.shape-controls .button:hover,.text-controls .button:hover,.buttons .button:hover{background-color:#0056b3}#colorPicker,#lineWidth,#textInput{margin:5px;padding:10px;border-radius:5px;border:1px solid #444;outline:0;background-color:#fff;color:#000}#crop-area{border:2px solid #007bff;position:absolute;display:none}.font-select{margin:5px;padding:10px;border-radius:5px;border:1px solid #444;outline:0;background-color:#fff;color:#000}</style>
</head>
<body>
<div class=sidebar>
<h2>Toolbox</h2>
<a href=# class=active><i class="fas fa-image"></i> Image Editor</a>
<a href=#><i class="fas fa-tools"></i> Other Tools</a>
<a href=#><i class="fas fa-cog"></i> Settings</a>
<a href=#><i class="fas fa-info-circle"></i> About</a>
</div>
<div class=main-content>
<h1>Advanced Image Editor</h1>
<div class=upload-area>
<div class=upload-btn-wrapper>
<button class=btn>Choose Image</button>
<input type=file id=upload accept=image/*>
</div>
</div>
<div class=image-section>
<canvas id=canvas></canvas>
<div id=crop-area></div>
</div>
<div class=controls>
<label for=brightness>Brightness</label>
<input type=range id=brightness min=0 max=200 value=100>
<label for=contrast>Contrast</label>
<input type=range id=contrast min=0 max=200 value=100>
<label for=sharpen>Sharpen</label>
<input type=range id=sharpen min=0 max=10 value=0>
<div class=shape-controls>
<button id=draw-rectangle class=button><i class="fas fa-square"></i> Rectangle</button>
<button id=draw-circle class=button><i class="fas fa-circle"></i> Circle</button>
<button id=draw-line class=button><i class="fas fa-slash"></i> Line</button>
<input type=color id=colorPicker value=#ff0000>
<input type=number id=lineWidth min=1 max=10 value=2>
</div>
<div class=text-controls>
<input type=text id=textInput placeholder="Enter text">
<select id=fontSelect class=font-select>
<option value=Arial>Arial</option>
<option value=Verdana>Verdana</option>
<option value="Times New Roman">Times New Roman</option>
<option value=Georgia>Georgia</option>
<option value="Courier New">Courier New</option>
</select>
<button id=add-text class=button><i class="fas fa-font"></i> Add Text</button>
<button id=move-text class=button><i class="fas fa-arrows-alt"></i> Move Text</button>
</div>
<div class=buttons>
<button id=crop class=button><i class="fas fa-crop-alt"></i> Crop</button>
<button id=download class=button><i class="fas fa-download"></i> Download</button>
<button id=reset class=button><i class="fas fa-undo"></i> Reset</button>
</div>
</div>
</div>
<script>let canvas=document.getElementById('canvas');let ctx=canvas.getContext('2d');let img=new Image();let cropping=false;let startX,startY,endX,endY;let isDrawing=false;let shape='';let color='#ff0000';let lineWidth=2;let textMode=false;let moveTextMode=false;let textX,textY;let font='Arial';let text='';document.getElementById('upload').addEventListener('change',function(e){let file=e.target.files[0];let reader=new FileReader();reader.onload=function(event){img.src=event.target.result;img.onload=function(){canvas.width=img.width;canvas.height=img.height;ctx.drawImage(img,0,0);}}
reader.readAsDataURL(file);});document.getElementById('brightness').addEventListener('input',applyFilters);document.getElementById('contrast').addEventListener('input',applyFilters);function applyFilters(){ctx.drawImage(img,0,0);let brightness=document.getElementById('brightness').value;let contrast=document.getElementById('contrast').value;ctx.filter=`brightness(${brightness}%)contrast(${contrast}%)`;ctx.drawImage(img,0,0);ctx.filter='none';if(text){drawText();}}
document.getElementById('sharpen').addEventListener('input',function(){applyFilters();let sharpenValue=document.getElementById('sharpen').value;if(sharpenValue>0){let imageData=ctx.getImageData(0,0,canvas.width,canvas.height);let data=imageData.data;let w=canvas.width;let h=canvas.height;let weights=[0,-1,0,-1,5,-1,0,-1,0];let side=Math.round(Math.sqrt(weights.length));let halfSide=Math.floor(side/2);let src=data.slice();let alphaFac=1;for(let y=0;y<h;y++){for(let x=0;x<w;x++){let sy=y;let sx=x;let dstOff=(y*w+x)*4;let r=0,g=0,b=0,a=0;for(let cy=0;cy<side;cy++){for(let cx=0;cx<side;cx++){let scy=sy+cy-halfSide;let scx=sx+cx-halfSide;if(scy>=0&&scy<h&&scx>=0&&scx<w){let srcOff=(scy*w+scx)*4;let wt=weights[cy*side+cx];r+=src[srcOff]*wt;g+=src[srcOff+1]*wt;b+=src[srcOff+2]*wt;a+=src[srcOff+3]*wt;}}}
data[dstOff]=r*sharpenValue;data[dstOff+1]=g*sharpenValue;data[dstOff+2]=b*sharpenValue;data[dstOff+3]=a+alphaFac*(255-a);}}
ctx.putImageData(imageData,0,0);if(text){drawText();}}});document.getElementById('draw-rectangle').addEventListener('click',function(){shape='rectangle';textMode=false;});document.getElementById('draw-circle').addEventListener('click',function(){shape='circle';textMode=false;});document.getElementById('draw-line').addEventListener('click',function(){shape='line';textMode=false;});document.getElementById('colorPicker').addEventListener('input',function(){color=this.value;});document.getElementById('lineWidth').addEventListener('input',function(){lineWidth=this.value;});canvas.addEventListener('mousedown',function(e){if(textMode){addText(e.offsetX,e.offsetY);return;}
if(moveTextMode){moveText(e.offsetX,e.offsetY);return;}
isDrawing=true;startX=e.offsetX;startY=e.offsetY;});canvas.addEventListener('mouseup',function(){if(!isDrawing)return;isDrawing=false;endX=event.offsetX;endY=event.offsetY;switch(shape){case'rectangle':drawRectangle(startX,startY,endX-startX,endY-startY);break;case'circle':let radius=Math.sqrt(Math.pow(endX-startX,2)+Math.pow(endY-startY,2));drawCircle(startX,startY,radius);break;case'line':drawLine(startX,startY,endX,endY);break;}});function drawRectangle(x,y,width,height){ctx.beginPath();ctx.rect(x,y,width,height);ctx.fillStyle=color;ctx.fill();ctx.lineWidth=lineWidth;ctx.strokeStyle=color;ctx.stroke();}
function drawCircle(x,y,radius){ctx.beginPath();ctx.arc(x,y,radius,0,2*Math.PI);ctx.fillStyle=color;ctx.fill();ctx.lineWidth=lineWidth;ctx.strokeStyle=color;ctx.stroke();}
function drawLine(x1,y1,x2,y2){ctx.beginPath();ctx.moveTo(x1,y1);ctx.lineTo(x2,y2);ctx.lineWidth=lineWidth;ctx.strokeStyle=color;ctx.stroke();}
document.getElementById('add-text').addEventListener('click',function(){textMode=true;moveTextMode=false;});function addText(x,y){textX=x;textY=y;text=document.getElementById('textInput').value;font=document.getElementById('fontSelect').value;drawText();}
function drawText(){ctx.drawImage(img,0,0);ctx.font=`${lineWidth*10}px ${font}`;ctx.fillStyle=color;ctx.fillText(text,textX,textY);}
document.getElementById('move-text').addEventListener('click',function(){moveTextMode=true;textMode=false;});function moveText(x,y){textX=x;textY=y;drawText();}
document.getElementById('crop').addEventListener('click',function(){cropping=!cropping;if(cropping){canvas.addEventListener('mousedown',startCrop);canvas.addEventListener('mouseup',endCrop);}else{canvas.removeEventListener('mousedown',startCrop);canvas.removeEventListener('mouseup',endCrop);document.getElementById('crop-area').style.display='none';}});function startCrop(e){startX=e.offsetX;startY=e.offsetY;cropping=true;}
function endCrop(e){endX=e.offsetX;endY=e.offsetY;cropping=false;let cropX=Math.min(startX,endX);let cropY=Math.min(startY,endY);let cropWidth=Math.abs(startX-endX);let cropHeight=Math.abs(startY-endY);let croppedImage=ctx.getImageData(cropX,cropY,cropWidth,cropHeight);canvas.width=cropWidth;canvas.height=cropHeight;ctx.putImageData(croppedImage,0,0);document.getElementById('crop-area').style.display='none';}
document.getElementById('download').addEventListener('click',function(){let link=document.createElement('a');link.download='edited-image.png';link.href=canvas.toDataURL();link.click();});document.getElementById('reset').addEventListener('click',function(){ctx.clearRect(0,0,canvas.width,canvas.height);ctx.drawImage(img,0,0);});</script>
</body>
</html>