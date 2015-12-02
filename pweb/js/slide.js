var imageCount = 1;
var total = 2;

function slide(x) {
	var image = document.getElementById('img');
	imageCount = imageCount + x;
	if(imageCount > total){imageCount = 1;}
	if(imageCount < 1){imageCount = total;}	
	image.src = "slide/img"+ imageCount +".jpg";
	}
	
window.setInterval(function slideA() {
	var image = document.getElementById('img');
	imageCount = imageCount + 1;
	if(imageCount > total){imageCount = 1;}
	if(imageCount < 1){imageCount = total;}	
	image.src = "slide/img"+ imageCount +".jpg";
	},15000);