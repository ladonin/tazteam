var list_js_preload_images = "";


function general___preload_images(images) {
    if (typeof document.body == "undefined") return;
    try {

        var div = document.createElement("div");
        var s = div.style;
		    s.position = "absolute";
        s.top = s.left = 0;
        s.visibility = "hidden";
        document.body.appendChild(div);
		div.innerHTML = "<img src=\"" + images.join("\" /><img src=\"") + "\" />";
		var lastImg = div.lastChild;

		lastImg.onload = function() { document.body.removeChild(document.body.lastChild); };
	 }
	 catch(e) {
        // Error. Do nothing.
	}
	delete div;
	delete s;
	delete lastImg;
}



function general___preload_one_image(image) {

jQuery(document).ready(function(){
    if (typeof document.body == "undefined") return;
    try {

        var div = document.createElement("div");
        var s = div.style;
		    s.position = "absolute";
        s.top = s.left = 0;
        s.visibility = "hidden";
        document.body.appendChild(div);
		div.innerHTML = "<img src=\"" + image+"\" />";
		var lastImg = div.lastChild;
		lastImg.onload = function() { document.body.removeChild(document.body.lastChild); };
	 }
	 catch(e) {
        // Error. Do nothing.
	}
	delete div;
	delete s;
	delete lastImg;
	
	});
}