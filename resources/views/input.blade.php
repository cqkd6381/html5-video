<!DOCTYPE html>
<html>  
  	<head>  
  	<meta http-equiv="content-type" content="text/html; charset=utf-8">  
  	<meta name="author" content="oscar999">  
  	<title></title>  
	<script>  
	  	function  handleFiles(files)  
	  	{  
		    if(files.length)  
		    {  
		       	var file = files[0];  
		       	var reader = new FileReader();
		       	reader.onload = function(){  
		       		console.log(files)
		           // document.getElementById("filecontent").innerHTML = this.result;  
		           	var video = document.createElement("video");
		           	video.setAttribute("width", "640");
					video.setAttribute("controls", "controls");
					video.setAttribute("src", window.URL.createObjectURL(files[0]));
		           	video.onload = function(e) {
		           		console.log(this.src)
					    window.URL.revokeObjectURL(this.src);
					} 
					document.body.appendChild(video);

		   //         	var img = document.createElement("img");
		   //         	img.src = window.URL.createObjectURL(files[1]); 
		   //         	img.height = 60;
		   //         	img.onload = function(e) {
		   //         		console.log(this.src)
					//     window.URL.revokeObjectURL(this.src);
					// } 
					// document.body.appendChild(img);

					
					var info = document.createElement("div");
					info.innerHTML = "文件名：" + files[0].name + "<br/>文件大小：" + files[0].size + " bytes";
					document.querySelector('body').appendChild(info);
		       	};
		       	reader.readAsText(file);  
		    }  
	  	}  
	</script>  
    
</head>  
<body>  
  
  	<input type="file" id="file" onchange="handleFiles(this.files)" multiple />  
  	<div id="filecontent"></div>  
</body>  
</html>  