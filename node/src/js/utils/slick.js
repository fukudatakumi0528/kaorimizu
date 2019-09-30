export default class Slick {
	slickInit() {

		const $topSlickSlider = $('.js-slickSlider--topkv');
		const $topSlickItem = $('.js-slickSlider--topkv li');

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

		//
		// top KV スライダー
		//

		$topSlickSlider.slick({
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 800,
			arrows: false,
			dots: true,
			infinite: true,
			centerMode: true,
			centerPadding:'0 15% 0 0',
		});

		$(window).on('load resize', function(){
			let $containerH = $topSlickSlider.innerHeight();
			$topSlickItem.innerHeight($containerH);
		});


	};
};
