window.onload = function() {
	// Following code to find document height from http://stackoverflow.com/questions/1145850/how-to-get-height-of-entire-document-with-javascript
	var body = document.body, html = document.documentElement;
	var doc_height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
	var footer = document.getElementById("footer");
	footer.style.top = doc_height-100 + "px";
};