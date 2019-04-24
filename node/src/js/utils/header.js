export default class Header {
	openHeaderNav() {
		const $selecter = $('.header__btn');
		const $navArea = $('.header__nav');
		$selecter.on('click', event => {
			$selecter.toggleClass('-isActive');
			$navArea.toggleClass('-isOpen');
		});
	};
};
