<!DOCTYPE html>
<html>
<head>
	<title>video</title>
	<style type="text/css">
		.ff{
			border:10px solid red;
			width:320px;
		}
	</style>
</head>
<body>
	<h1>通过ajax获取图片资源并显示</h1>
	<button onclick="upload();">Upload</button>
	<div id="imgcontainer"></div>
	<div id="videocontainer"></div>
	<div id="videocontainer2"></div>
	<div id="videocontainer3">
		<!-- <video class="ff" src="http://zh.laravel.dev/1.mp4" controls></video> -->
		<video id="video" poster="{{asset('2.png')}}" width="320" class="ff" controls>
			<source src="http://zh.laravel.dev/1.mp4" type="video/mp4">
		</video>
	</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript">
	var video0 = document.createElement("video");
	// setInterval(function(){
 //    	console.log(video0.readyState);
 //    },100);
	function upload(){
		var img_url = "http://zh.laravel.dev/pic";
		// var img = document.createElement("img");
		// img.src = url;
		// $("#imgcontainer").html(img);    
	    var img_xhr = new XMLHttpRequest();
	    var _desktop_web_access_key = 'ccc';
	    img_xhr.open('GET', img_url, true);
	    img_xhr.responseType = "blob";

	    img_xhr.setRequestHeader("client_type", "DESKTOP_WEB");
	    img_xhr.setRequestHeader("desktop_web_access_key", _desktop_web_access_key);
	    img_xhr.onload = function() {
	        if (this.status == 200) {
	            var blob = this.response;
	            var img = document.createElement("img");
	            img.onload = function(e) {
	                window.URL.revokeObjectURL(img.src); 
	            };
	            img.src = window.URL.createObjectURL(blob);
	            $("#imgcontainer").html(img);    
	        }
	    }
	    img_xhr.send();


	    var video_url = "http://zh.laravel.dev/video";
	    var video_xhr = new XMLHttpRequest();
	    console.log(video_xhr)
	    video_xhr.open('GET', video_url, true);
	    video_xhr.responseType = "arraybuffer";
	    video_xhr.onload = function() {
	        if (this.status == 200) {
	        	var arrayBuffer = this.response;
	        	if(arrayBuffer){
	        		var byteArray = new Uint8Array(arrayBuffer);
	        		console.log(byteArray);
	        		// for(var i=0;i<byteArray.byteLength;i++){
	        		// 	console.log(i)
	        		// }
	        		var video = document.createElement("video");
	        		video.setAttribute("width", "320");
	        		video.onload = function(e) {
		                window.URL.revokeObjectURL(video.src); 
		            };
		            video.src = window.URL.createObjectURL(arrayBuffer);

	        	}

	   //          var blob = this.response;
	   //          console.log(blob)
	   //          var video = document.createElement("video");
	   //          video.setAttribute("width", "320");
				// video.setAttribute("controls", "controls");
				// video.setAttribute("class", "ff");
	   //          video.onload = function(e) {
	   //              window.URL.revokeObjectURL(video.src); 
	   //          };
	   //          video.src = window.URL.createObjectURL(blob);

	   //          var video2 = document.createElement("video");
	   //          video2.setAttribute("width", "320");
				// video2.setAttribute("controls", "controls");
				// video2.setAttribute("class", "ff");
				// video2.src = 'http://zh.laravel.dev/1.mp4';
				// video2.muted = true;

	   //          var video3 = document.querySelector("#video");
	   //          video3.setAttribute("width", "320");
				// video3.setAttribute("controls", "controls");
				// video3.setAttribute("class", "ff");
				// video3.onload = function(e) {
	   //              window.URL.revokeObjectURL(video3.src); 
	   //          };
	   //          video3.src = window.URL.createObjectURL(blob);
	   //          // video3.src = 'http://zh.laravel.dev/vvv';
	   //          // video3.muted = false; //初始化音量
	   //          // alert(video3.muted);
	   //          // video3.controls = "controls";
	   //          video3.muted = false;
	            
	            $("#videocontainer").html(video);  
	   //          $("#videocontainer2").html(video2);  
	        }
	    }
	    video_xhr.send();
	}
	// upload();
</script>
</html>
