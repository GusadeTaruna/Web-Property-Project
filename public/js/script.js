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

jQuery(function($) {
  
  // Function which adds the 'animated' class to any '.animatable' in view
  var doAnimations = function() {
    
    // Calc current offset and get all animatables
    var offset = $(window).scrollTop() + ($(window).height()+100),
        $animatables = $('.animatable');
    
    // Unbind scroll handler if we have no animatables
    if ($animatables.length == 0) {
      $(window).off('scroll', doAnimations);
    }
    
    // Check all animatables and animate them if necessary
		$animatables.each(function(i) {
       var $animatable = $(this);
			if (($animatable.offset().top + $animatable.height() - 20) < offset) {
        $animatable.removeClass('animatable').addClass('animated');
			}
    });

	};
  
  // Hook doAnimations on scroll, and trigger a scroll
	$(window).on('scroll', doAnimations);
  $(window).trigger('scroll');

});


window.setInterval(function (){
  var images = $('#banner-image img');
  var active, next;

  images.each(function(index, img) {
    if($(img).hasClass('active')) {
      active = index;
      next = (index === images.length - 1) ? 0 : index + 1;
    }
  });

  $(images[active]).fadeOut(5, function() {
    $(images[next]).fadeIn(1500);
  });

  $(images[next]).addClass('active');
  $(images[active]).removeClass('active');
}, 5000);