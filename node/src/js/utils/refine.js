export default class Refine {
  clickRefineAccordion() {
    const $refineIcon = $('.js-refine__icon')
    const $refineIconSpan = $refineIcon.children('span');
    const $refineSelectArea = $('.js-refine__selectArea');

    $refineSelectArea.hide();

    $refineIcon.on('click', function () {
      $refineIconSpan.toggleClass('is-active');
      $refineSelectArea.slideToggle(100);
    })
	}
}
