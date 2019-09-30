export default class FixedButton {
  clickMenu() {
    const $innerTopperInner = $('.l-fixed-button__inner__topper__inner');
    const $innerTopperInnerText = $('.l-fixed-button__inner__topper__inner__text');
    const $innerTopperInnerMenuLine = $('.l-fixed-button__inner__topper__inner__menu__line');
    const $innerMainButton = $('.l-fixed-button__inner__main__button');

    $innerTopperInner.on('click', function () {
      $innerMainButton.removeClass('is-click');
      $innerTopperInnerMenuLine.toggleClass('is-active');
      if ($innerTopperInnerMenuLine.hasClass('is-active')) {
        $innerTopperInnerText.html('close');
      } else {
        $innerTopperInnerText.html('menu');
      }
    });

    $innerMainButton.on('click', function () {
      $innerMainButton.not(this).removeClass('is-click');
      $innerTopperInnerMenuLine.removeClass('is-active');
      $(this).toggleClass('is-click');
    });
	};
};
