window.onscroll=function(){myfun()};
var navbar=document.getElementById('navbar');
var topPx=navbar.offsetTop;
function myfun(){
    if(window.pageYOffset>=topPx){
        navbar.classList.add('fixMe');
    }else{
        navbar.classList.remove('fixMe');
    }
}