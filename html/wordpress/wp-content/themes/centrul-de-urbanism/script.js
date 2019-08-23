
let oldScrollPos = window.pageYOffset;
const navUl = document.querySelectorAll('ul li');


window.onscroll = function() {
	let currentScrollPos = window.pageYOffset;
	if(window.pageYOffset > oldScrollPos) {
		document.getElementById('main-navigation').style.top = "-115px";
	} else {
		document.getElementById('main-navigation').style.top = "0";
	} 
	oldScrollPos = currentScrollPos;
}

document.querySelector('.search-button').addEventListener('click', function() {
	document.querySelector('.search-box').classList.toggle('visible');
	document.querySelector('.search-button').classList.toggle('none');
	document.querySelector('.close-button').classList.toggle('visible');
});

document.querySelector('.close-button').addEventListener('click', function() {
	document.querySelector('.search-box').classList.toggle('visible');
	document.querySelector('.search-button').classList.toggle('none');
	document.querySelector('.close-button').classList.toggle('visible');
});


