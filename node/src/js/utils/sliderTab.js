export default class SliderTab {
  clickTab() {
    const $sliderTabRanking = $('.t-rankingArea__tab');
    const $sliderTabRankingList = $sliderTabRanking.children('.t-rankingArea__tab__list')

    //画面幅が変更された時に、スタイル適応させるため。
    $(function(){
      var timer = false;
      var prewidth = $(window).width()
      $(window).resize(function() {
          if (timer !== false) {
              clearTimeout(timer);
          };
          timer = setTimeout(function() {
              var nowWidth = $(window).width()
              if(prewidth !== nowWidth){
                  location.reload();
              };
              prewidth = nowWidth;
          }, 200);
      });
    });
    
    $sliderTabRankingList.on('click', function () {
      if (!$(this).hasClass('is-active')) {
        $sliderTabRankingList.removeClass('is-active');
        $(this).addClass('is-active');
        if ($(this).hasClass('tab-month')) {
          //クラスを初期化
          $('.t-rankingArea__slider__inner').removeClass('is-active');
          $('.t-rankingArea__slider__arrow').removeClass('is-active');
          //is-activeを付与
          $('.js-slickSlider-top__ranking__month').addClass('is-active');
          $('.js__arrow-top__ranking__month').addClass('is-active');
          $('.js-slickSlider-top__ranking__month').slick('setPosition');
        } else if ($(this).hasClass('tab-weekly')) { 
          //クラスを初期化
          $('.t-rankingArea__slider__inner').removeClass('is-active');
          $('.t-rankingArea__slider__arrow').removeClass('is-active');
          //is-activeを付与
          $('.js-slickSlider-top__ranking__weekly').addClass('is-active');
          $('.js__arrow-top__ranking__weekly').addClass('is-active');
          $('.js-slickSlider-top__ranking__weekly').slick('setPosition');
        } else if ($(this).hasClass('tab-all')) { 
          //クラスを初期化
          $('.t-rankingArea__slider__inner').removeClass('is-active');
          $('.t-rankingArea__slider__arrow').removeClass('is-active');
          //is-activeを付与
          $('.js-slickSlider-top__ranking__all').addClass('is-active');
          $('.js__arrow-top__ranking__all').addClass('is-active');
          $('.js-slickSlider-top__ranking__all').slick('setPosition');
        }
      }
    });
	};
};
