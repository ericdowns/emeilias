(function($) {


//Hide Header on on scroll down
//https://medium.com/@mariusc23/hide-header-on-scroll-down-show-on-scroll-up-67bbaae9a78c

var didScroll;
var lastScrollTop = 0;
var delta = 2;
var navbarHeight = $('.section-site-header-wrapper').outerHeight();

$(window).scroll(function(event){
	didScroll = true;
});

setInterval(function() {
	if (didScroll) {
		hasScrolled();
		didScroll = false;
	}
}, 250);

function hasScrolled() {
	var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
    	return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('.section-site-header-wrapper').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
        	$('.section-site-header-wrapper').removeClass('nav-up').addClass('nav-down');
        }
    }

    lastScrollTop = st;
}









$(window).scroll( function() {
	var windowTop = $(window).scrollTop();
	windowTop > 80 ? $('.section-site-header-wrapper').addClass('scrolled') : $('.section-site-header-wrapper').removeClass('scrolled');
});


	//Click Logo To Scroll To Top
	$('#logo').on('click', function()  {
		$('html,body').animate({
			scrollTop: 0
		},500);
	});
	
	//Smooth Scrolling Using Navigation Menu
	$('a[href*="#"]').on('click', function(e){
		$('html,body').animate({
			scrollTop: $($(this).attr('href')).offset().top - 100
		},500);
		e.preventDefault();
	});
	


  //Toggle Menu
  $('#menu-toggle').on('click',  function() {
  	$('#menu-toggle').toggleClass('closeMenu');
  	$('.section-mobile-header-wrapper').toggleClass('open');
  	$('header').toggleClass('open');

  	
  	$('li').on('click', function() {
  		$('ul').removeClass('showMenu');
  		$('#menu-toggle').removeClass('closeMenu');
  	});
  });



// Search Dropdown
$('.icon-search').click(function(){
	$('.section-navwrapper').removeClass('open');
	$('.search-dropdown').toggleClass('down');
});

// Close Button for Search Dropdown
$(".close-search").on('click', function() {
	$('.search-dropdown').removeClass('down');
});


})(jQuery);