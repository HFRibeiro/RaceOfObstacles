// JavaScript Document
$(document).on("scroll",function(){
});

var maxima = false;



$(document).ready(function() {
	
	acertAltura(innerHeight);
	
	$("body").css("display", "none");
            $("body").fadeIn(1500);
			
	
  $("#maxima").click(function(){
	  if(!maxima){
			launchIntoFullscreen(document.documentElement); // the whole page
			document.getElementById("maxima").style.backgroundImage = "url(imagens/nomaxima.png)";
			//$container.isotope({ sortBy: "number" });
			maxima = true;
	  }
	  else {
	  		exitFullscreen();
			document.getElementById("maxima").style.backgroundImage = "url(imagens/maxima.png)";
			//$container.isotope({ sortBy: "original-order" });
			maxima = false;
	  }
   });
   
	
	function acertAltura(altura) {
	}
	
	window.addEventListener("resize", myResize);
	
	function myResize()
	{
		var delay=200; //1 seconds
		setTimeout(function(){
	 	 acertAltura(innerHeight);
		}, delay); 
	}
	
	
		// Find the right method, call on correct element
	function launchIntoFullscreen(element) {
	  if(element.requestFullscreen) {
		element.requestFullscreen();
	  } else if(element.mozRequestFullScreen) {
		element.mozRequestFullScreen();
	  } else if(element.webkitRequestFullscreen) {
		element.webkitRequestFullscreen();
	  } else if(element.msRequestFullscreen) {
		element.msRequestFullscreen();
	  }
	  
	  	var delay=200; //1 seconds
		setTimeout(function(){
	 	 acertAltura(innerHeight);
		}, delay); 
	}

	function exitFullscreen() {
	  if(document.exitFullscreen) {
		document.exitFullscreen();
	  } else if(document.mozCancelFullScreen) {
		document.mozCancelFullScreen();
	  } else if(document.webkitExitFullscreen) {
		document.webkitExitFullscreen();
	  }
	  var delay=200; //1 seconds
		setTimeout(function(){
	 	 acertAltura(innerHeight);
		}, delay); 
	}
		
	
});


 
