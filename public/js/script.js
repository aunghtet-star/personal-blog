window.onscroll = function (){ myfun()}
var navbar = document.getElementById('navbar');
var topPx  = navbar.offsetTop;
function myfun(){
    if (window.pageYOffset>= topPx){
        navbar.classList.add('fixme');
    }else{
        navbar.classList.remove('fixme');

    }
}