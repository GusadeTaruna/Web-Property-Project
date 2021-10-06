window.onscroll = function() {myFunction()};

var navbar = document.getElementById("nav-container");
var sticky = navbar.offsetTop;
var height = $('.header').height();

function myFunction() {
  if (window.pageYOffset > height/2) {
    navbar.classList.add("fixed")
  } else {
    navbar.classList.remove("fixed");
  }
}