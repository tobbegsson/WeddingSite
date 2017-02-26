$(document).ready(function(){	

	var slideW = 500;
	var animSpeed = 1000;
	var pause = 3000;
	var currSlide = 1;
	var $slider = $('#slider');
	var $slideCont = $slider.find('.slides');
	var $slides = $slideCont.find('.slide');
	var interval;
	
	function startSlider(){
		
		interval = setInterval(function() {
			$slideCont.animate({'margin-left': '-='+slideW}, animSpeed, function(){
				currSlide++;
				if(currSlide === $slides.length) {
					currSlide = 1;
					$slideCont.css('margin-left', 0);
				}
			});
		}, pause);		
	}
	
	function pauseSlider(){
		clearInterval(interval);
	}
	
	$slider.on('mouseenter', pauseSlider).on('mouseleave', startSlider)
	
	startSlider();
	
});