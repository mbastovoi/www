
const downBtn1 = document.getElementById("click1");
const downBtn2 = document.getElementById("click2");
const downBtn3 = document.getElementById("click3");
const downBtn4 = document.getElementById("click4");
const proiecte = document.getElementById('proiecte');
const first = document.getElementById('first');
const viziunea = document.getElementById('viziunea');
const eventsBlog = document.getElementById('events-blog');



function scrollTo (zone) {
    event.preventDefault();
    zone.scrollIntoView({behavior:'smooth'});
}


downBtn1.onclick = function(event) {
    scrollTo (proiecte);
}

downBtn2.onclick = function(event) {
	scrollTo (eventsBlog);
}

downBtn3.onclick = function (event) {
    scrollTo(viziunea);
}

downBtn4.onclick = function (event) {
    scrollTo(first);
}

console.log("valera");



