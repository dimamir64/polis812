$(document).ready(function(){

	$("#owl-mainpage").owlCarousel({
		loop: true,
		nav: true,
		dots: true,
		items: 1,
		autoplay:true,
		autoplayTimeout:7000,
		autoplayHoverPause:true
	});

	$('.mainpage-contacts__name').click(function(){
		$(this).toggleClass('active');
		$(this).parent('.mainpage-contacts__content').find('.mainpage-contacts__contact-data').toggleClass('active');
	});

	$('.contacts__switch a').click(function(){
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		var current_region = $(this).data('region');
		console.log(current_region);
		if (current_region == "spb") {
			$('#contacts-spb').show();
			$('#contacts-msk').hide();
		} else if (current_region == "msk") {
			$('#contacts-msk').show();
			$('#contacts-spb').hide();
		}
	});
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Загрузка изображения #%curr%...',
		mainClass: 'mfp-no-margins mfp-with-zoom',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">Изображение #%curr%</a> не найдено.'
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});

});


var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       false,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  }
);
wow.init();
