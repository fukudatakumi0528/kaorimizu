export default class SliderTab {
  clickTab() {
    const $sliderTabRanking = $('.p-top__ranking__tab');
    const $sliderTabRankingList = $sliderTabRanking.children('.p-top__ranking__tab__list')

    $sliderTabRankingList.on('click', function () {
      if (!$(this).hasClass('is-active')) {
        $sliderTabRankingList.removeClass('is-active');
        $(this).addClass('is-active');
        if ($(this).hasClass('tab-month')) {
          //クラスを初期化
          $('.p-top__ranking__slider__inner').removeClass('is-active');
          $('.p-top__ranking__slider__arrow').removeClass('is-active');
          //is-activeを付与
          $('.js-slickSlider-top__ranking__month').addClass('is-active');
          $('.js__arrow-top__ranking__month').addClass('is-active');
          $('.js-slickSlider-top__ranking__month').slick('setPosition');
        } else if ($(this).hasClass('tab-weekly')) { 
          //クラスを初期化
          $('.p-top__ranking__slider__inner').removeClass('is-active');
          $('.p-top__ranking__slider__arrow').removeClass('is-active');
          //is-activeを付与
          $('.js-slickSlider-top__ranking__weekly').addClass('is-active');
          $('.js__arrow-top__ranking__weekly').addClass('is-active');
          $('.js-slickSlider-top__ranking__weekly').slick('setPosition');
        } else if ($(this).hasClass('tab-all')) { 
          //クラスを初期化
          $('.p-top__ranking__slider__inner').removeClass('is-active');
          $('.p-top__ranking__slider__arrow').removeClass('is-active');
          //is-activeを付与
          $('.js-slickSlider-top__ranking__all').addClass('is-active');
          $('.js__arrow-top__ranking__all').addClass('is-active');
          $('.js-slickSlider-top__ranking__all').slick('setPosition');
        }
      }
    });
	};
};
