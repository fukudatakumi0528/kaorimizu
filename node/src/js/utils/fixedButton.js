export default class FixedButton {
  clickMenu() {
    const $innerTopperInner = $('.l-fixed-button__inner__topper__inner');
    const $innerTopperInnerText = $('.l-fixed-button__inner__topper__inner__text');
    const $innerTopperInnerMenuLine = $('.l-fixed-button__inner__topper__inner__menu__line');

    $innerTopperInner.on('click', function () {
      $innerTopperInnerMenuLine.toggleClass('is-active');
      if ($innerTopperInnerMenuLine.hasClass('is-active')) {
        $innerTopperInnerText.html('close');
      } else {
        $innerTopperInnerText.html('menu');        
      }
    })
	};
};
