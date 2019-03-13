(function($) {


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
  	$('#menu').toggleClass('open');
  	$('.menu-header-container').toggleClass('open');
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