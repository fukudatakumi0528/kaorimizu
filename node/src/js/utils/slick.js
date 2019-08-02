export default class Slick {
	slickInit() {

		const $topSlickSelecter = $('.js-slickSlider--topkv');
		const $topSlickItem = $('.js-slickSlider--topkv li');

		//
		// top KV スライダー
		//


		$topSlickSelecter.slick({
			autoplay: true,
			autoplaySpeed: 5000,
			fade: true,
			speed: 2000,
			arrows: false,
			dots: true,
			appendDots: $('.kv__slider_dots'),
/*
			responsive: [
				{
					breakpoint: 480,
					settings: {
						//dots: true,
						arrows: true,
						slidesToShow: 1,
						centerMode: true,
						centerPadding: '40px',
						initialSlide: 1,
					}
				}
			]
*/
		});
		$(window).on('load resize', function(){
			let $containerH = $topSlickSelecter.innerHeight();
			$topSlickItem.innerHeight($containerH);
		});





		$('.js-slickSlider--pickup').slick({
			dots: true,
			slidesToShow: 3,
			appendArrows: $('.js-slickSlider--pickup--arrows'),
			prevArrow: '<div class="slickprev"></div>',
			nextArrow: '<div class="slicknext"></div>',
			//autoplay: true,

			//arrows: false,
			responsive: [
				{
					breakpoint: 480,
					settings: {
						//dots: true,
						arrows: true,
						slidesToShow: 1,
						centerMode: true,
						centerPadding: '40px',
						initialSlide: 1,
					}
				}
			]
		});
		$('.js-slickSlider--article').slick({
			dots: true,
			slidesToShow: 3,
			appendArrows: $('.js-slickSlider--article--arrows'),
			prevArrow: '<div class="slickprev"></div>',
			nextArrow: '<div class="slicknext"></div>',

			//arrows: false,
			responsive: [
				{
					breakpoint: 480,
					settings: {
						//dots: true,
						//arrows: false,
						slidesToShow: 1,
						centerMode: true,
						centerPadding: '40px',
					}
				}
			]
		});
	};
};
