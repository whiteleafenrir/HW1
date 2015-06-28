$(document).ready(function(){
	$('.image-overlay').mouseenter(function() {
		var item = $(this);
		$(this).stop(true,true).animate({'opacity':0.55},300)
	}).mouseleave(function() {
		var item = $(this);
		$(this).stop(true,true).animate({'opacity':0.0},300)
	});
	$('.image-wrapper').on('click',function(){
		$('.grey-fon-wrapper').show();
		$('.popap-container').show();
	});
	$('.grey-fon-wrapper').on('click',function(){
		$('.popap-container').hide();
		$('.grey-fon-wrapper').hide();

	});
	$('.error-msg__close').on('click',function(){
		$('.error-msg').hide();
	});
	$('.success-msg__close').on('click',function(){
		$('.success-msg').hide();
	});
});