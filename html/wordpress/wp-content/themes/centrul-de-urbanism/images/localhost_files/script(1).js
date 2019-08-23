
var oldScrollPos = window.pageYOffset;

window.onscroll = function() {
	let currentScrollPos = window.pageYOffset;
	if(window.pageYOffset > oldScrollPos) {
		document.getElementById('main-navigation').style.top = "-100px";
	} else {
		document.getElementById('main-navigation').style.top = "0";
	} 
	oldScrollPos = currentScrollPos;
}