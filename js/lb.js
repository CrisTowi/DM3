$(document).ready(function(){  
	$("div#show-panel").click(function(){  
	$("#lightbox, #lightbox-panel").fadeIn(300);  
	})  
	$("#close-panel").click(function(){  
		$("#lightbox, #lightbox-panel").fadeOut(400);  
	})  
});