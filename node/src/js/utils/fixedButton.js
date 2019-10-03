export default class FixedButton {
  clickMenu() {
    const $innerTopperInner = $('.l-fixed-button__inner__topper__inner');
    const $innerTopperInnerText = $('.l-fixed-button__inner__topper__inner__text');
    const $innerTopperInnerMenuLine = $('.l-fixed-button__inner__topper__inner__menu__line');
    const $innerMainButton = $('.l-fixed-button__inner__main__button');

    //menu部分
    const $spMenu = $('#js-spMenu')

    //スクロール禁止にするための設定
    function handleTouchMove(event) {
      event.preventDefault();
    }

    //スクロール禁止
    function scrollStop() {
      document.addEventListener('touchmove', handleTouchMove, { passive: false });
    };

    //スクロール復帰
    function scrollStart() {
      document.removeEventListener('touchmove', handleTouchMove, { passive: false });
    };

    //スクロールの解除、非解除
    function scrollControl() {
      if ($spMenu.hasClass('is-active')) {
        scrollStop();
      } else {
        scrollStart();
      };
    }

    $innerTopperInner.on('click', function () {
      $innerMainButton.removeClass('is-click');
      $innerTopperInnerMenuLine.toggleClass('is-active');
      if ($innerTopperInnerMenuLine.hasClass('is-active')) {
        $innerTopperInnerText.html('close');
      } else {
        $innerTopperInnerText.html('menu');
      }

      $spMenu.toggleClass('is-active');
      scrollControl();
    });

    $innerMainButton.on('click', function () {
      $innerMainButton.not(this).removeClass('is-click');
      $innerTopperInnerMenuLine.removeClass('is-active');
      $(this).toggleClass('is-click');

      //searchボタンがクリックされた時は、必ずspMenuは閉じている。
      $spMenu.removeClass('is-active');
      scrollControl();
    });
	};
};
