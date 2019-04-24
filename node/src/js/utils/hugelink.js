export default class Hugelink {
	init() {
		const $selecter = $('.c-hugelinks');
		$selecter.on({
			'mouseenter': function(){
				$('.c-hugelinks ul + ul').css('border-left', '#FFF002 solid 1px');
			},
			'mouseleave': function(){
				$('.c-hugelinks ul + ul').css('border-left', '#F2F2F2 solid 1px');
			}
		});
	}
}
