export default class Refine {
  clickRefineAccordion() {
    const $refineClick = $('.js-refine__click')
    const $refineIcon = $('.js-refine__icon')
    const $refineIconSpan = $refineIcon.children('span');
    const $refineSelectArea = $('.js-refine__selectArea');

    $refineSelectArea.hide();

    $refineClick.on('click', function () {
      $refineIconSpan.toggleClass('is-active');
      $refineSelectArea.slideToggle(100);
    })
	}
}
