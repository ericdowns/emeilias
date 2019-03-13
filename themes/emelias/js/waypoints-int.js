(function($){
	$(document).on("ready", function() {

		$('.gm-staggered-animation-container').waypoint(function(direction) {
			if (direction ==='down') {
				$(".gm-staggered-animation-item").addClass('animated fadeInUp');
			}
			else {
				$(".gm-staggered-animation-item").removeClass('animated fadeInUp');
			}
		},
		{
			offset: '70%',
			triggerOnce: true
		});




// https://codepen.io/hartless/pen/NGBMBB
function onScrollInit( items, trigger ) {

	items.each( function() {

		var osElement = $(this),
		osAnimationClass = osElement.attr('data-os-animation'),
		osAnimationDelay = osElement.attr('data-os-animation-delay');
osAnimationDuration = osElement.attr('data-os-animation-duration'); // added variable for animation duration
osElement.css({
	'-webkit-animation-delay':  osAnimationDelay,
	'-moz-animation-delay':     osAnimationDelay,
	'animation-delay':          osAnimationDelay,
'animation-duration':       osAnimationDuration // added for animation duration
});

var osTrigger = ( trigger ) ? trigger : osElement;
// modified this section to add waypoint direction
osTrigger.waypoint(function(direction) {
	if (direction ==='down') {
		osElement.addClass('animated').toggleClass(osAnimationClass);
	}
	else {
		osElement.removeClass('animated').toggleClass(osAnimationClass);
	}
},
{
	triggerOnce: true,
	offset: '90%'
});
});
}
onScrollInit( $('.os-animation') );



}); // END $(document).on("ready",
})(jQuery); // END (function($){