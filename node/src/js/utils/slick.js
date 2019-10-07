export default class Slick {
	slickInit() {

		// top KV スライダー
		const $topSlickSlider = $('.js-slickSlider-top__kv');
		const $topSlickItem = $('.js-slickSlider-top__kv li');

		// top ranking スライダー
		const $topRankingMonthSlider = $('.js-slickSlider-top__ranking__month');
		const $topRankingWeeklySlider = $('.js-slickSlider-top__ranking__weekly');
		const $topRankingAllSlider = $('.js-slickSlider-top__ranking__all');

		// top feature スライダー
		const $topFeatureSlider = $('.js-slickSlider-top__feature');

		// top hobby スライダー
		const $topHobbySlider = $('.js-slickSlider-top__hobby');


		$topSlickSlider.on("beforeChange", (event, slick, currentSlide, nextSlide) => {
			$topSlickSlider.find(".slick-slide").each((index, el) => {
				const $this = $(el),
					slickindex = $this.attr("data-slick-index");
				if (nextSlide == slick.slideCount - 1 && currentSlide == 0) {
					// 現在のスライドが最初のスライドでそこから最後のスライドに戻る場合
					if (slickindex == "-1") {
						// 最後のスライドに対してクラスを付与
						$this.addClass("is-active-next");
					} else {
						// それ以外は削除
						$this.removeClass("is-active-next");
					}
				} else if (nextSlide == 0) {
					// 次のスライドが最初のスライドの場合
					if (slickindex == slick.slideCount) {
						// 最初のスライドに対してクラスを付与
						$this.addClass("is-active-next");
					} else {
						// それ以外は削除
						$this.removeClass("is-active-next");
					}
				} else {
					// それ以外は削除
					$this.removeClass("is-active-next");
				}
			});
		});

		// top KV スライダー
		$topSlickSlider.slick({
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 800,
			arrows: true,
			dots: true,
			infinite: true,
			centerMode: true,
			centerPadding: '0 15% 0 0',
			appendArrows: $('.p-top__kv__bg__js'),
			variableWidth: true,
			responsive: [
				{
		      breakpoint: 768,  //ブレイクポイントを指定
					settings: {
						variableWidth: false,
			     }
				},
			]
		});

		$(window).on('load resize', function(){
			let $containerH = $topSlickSlider.innerHeight();
			$topSlickItem.innerHeight($containerH);
		});


		// top ranking スライダー
		$topRankingMonthSlider.slick({
			autoplaySpeed: 3000,
			speed: 800,
			arrows: true,
			dots: false,
			infinite: true,
			centerMode: true,
			appendArrows: $('.js__arrow-top__ranking__month'),
		});

		$topRankingWeeklySlider.slick({
			autoplaySpeed: 3000,
			speed: 800,
			arrows: true,
			dots: false,
			infinite: true,
			centerMode: true,
			appendArrows: $('.js__arrow-top__ranking__weekly'),
		});

		$topRankingAllSlider.slick({
			autoplaySpeed: 3000,
			speed: 800,
			arrows: true,
			dots: false,
			infinite: true,
			centerMode: true,
			appendArrows: $('.js__arrow-top__ranking__all'),
		});

		// top feature スライダー
		$topFeatureSlider.slick({
			autoplaySpeed: 3000,
			speed: 800,
			arrows: true,
			dots: false,
			infinite: true,
			centerMode: true,
			appendArrows: $('.js__arrow-top__feature'),
		});

		// top hobby スライダー
		$topHobbySlider.slick({
			autoplaySpeed: 3000,
			speed: 800,
			arrows: true,
			dots: false,
			infinite: true,
			centerMode: true,
			appendArrows: $('.js__arrow-top__hobby'),
		});
		
	};
};
