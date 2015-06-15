$(document).ready(function(){
	$('.image-overlay').mouseenter(function() {
		var item = $(this);
		$(this).stop(true,true).animate({'opacity':0.55},300)
	}).mouseleave(function() {
		var item = $(this);
		$(this).stop(true,true).animate({'opacity':0.0},300)
	});
});