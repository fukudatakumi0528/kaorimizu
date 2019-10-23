export default class Header {
	openHeaderNav() {
		const $selecter = $('.header__btn');
		const $navArea = $('.header__nav');
		$selecter.on('click', event => {
			$selecter.toggleClass('-isActive');
			$navArea.toggleClass('-isOpen');
		});
	};

	clickHeaderButton() {
		const $headerInnerPcSearch = $('.js-headerInnerPc__search');
		const $headerInnerPcGrant = $('.js-headerInnerPc__grant');

		const $spSearch = $('#js-spSearch');
		const $spGrant = $('#js-spGrant');
		const $spMenu = $('#js-spMenu');

		const $modalCover = $('.l-modalCover')

		const $seachTriangle = $('.js-headerInnerPc__search__triangle');
		const $grantTriangle = $('.js-headerInnerPc__grant__triangle');

		//spSearchの出し入れ
		function spSearchToggle() {
			if (!$spSearch.hasClass('is-active')) {
				$spSearch.addClass('is-active');
			} else {
				$spSearch.removeClass('is-active');
				$spSearch.addClass('is-left');
				setTimeout(function () {
					$spSearch.removeClass('is-left');
				},400)
			}
		};

		//spGrantの出し入れ
		function spGrantToggle() {
			if (!$spGrant.hasClass('is-active')) {
				$spGrant.addClass('is-active');
			} else {
				$spGrant.removeClass('is-active');
				$spGrant.addClass('is-left');
				setTimeout(function () {
					$spGrant.removeClass('is-left');
				},400)
			}
		};
		

    //spMenuの出し入れ
    function spMenuToggle() {
      if (!$spMenu.hasClass('is-active')) {
        $spMenu.addClass('is-active');
      } else {
        $spMenu.removeClass('is-active');
        $spMenu.addClass('is-left');
        setTimeout(function () {
          $spMenu.removeClass('is-left');
        },400)
      }
		};

		//modalCoverの出し入れ
		function modalCoverToggle() {
      if ($spSearch.hasClass('is-active') || $spGrant.hasClass('is-active') || $spMenu.hasClass('is-active')) {
        $modalCover.addClass('is-active');
      } else {
        $modalCover.removeClass('is-active');
      }
		}

		function triangleToggle() {
			if ($spSearch.hasClass('is-active')) {
				$seachTriangle.addClass('is-active');
			} else {
				$seachTriangle.removeClass('is-active');
			}

			if ($spGrant.hasClass('is-active')) {
				$grantTriangle.addClass('is-active');
			} else {
				$grantTriangle.removeClass('is-active');
			}
		}

		//pcMenuが押された時
		$(".js-headerInnerPc__Menu, .js-spMenu__close").on('click', function () {
			spMenuToggle();
			modalCoverToggle();

			//menuボタンがクリックされた時は、必ずspSearchは閉じている。
			if ($spSearch.hasClass('is-active')) {
				$spSearch.removeClass('is-active');
			};
			
			//menuボタンがクリックされた時は、必ずspGrantは閉じている。
			if ($spGrant.hasClass('is-active')) {
				$spGrant.removeClass('is-active');
			};

			triangleToggle();
		}); 

		//pcSearchが押された時
		$headerInnerPcSearch.on('click', function () {
			spSearchToggle();
			modalCoverToggle();

			//searchボタンがクリックされた時は、必ずspMenuは閉じている。
			if ($spMenu.hasClass('is-active')) {
				$spMenu.removeClass('is-active');
			};
			
			//searchボタンがクリックされた時は、必ずspGrantは閉じている。
			if ($spGrant.hasClass('is-active')) {
				$spGrant.removeClass('is-active');
			};

			triangleToggle();
		}); 


		//pcGrantが押された時
		$headerInnerPcGrant.on('click', function () {
			spGrantToggle();
			modalCoverToggle();

			//grantボタンがクリックされた時は、必ずspMenuは閉じている。
			if ($spMenu.hasClass('is-active')) {
				$spMenu.removeClass('is-active');
			};
			
			//grantボタンがクリックされた時は、必ずspSearchは閉じている。
			if ($spSearch.hasClass('is-active')) {
				$spSearch.removeClass('is-active');
			};

			triangleToggle();
		}); 

		$modalCover.on('click', function () {
			$modalCover.removeClass('is-active');

			//modalCoverがクリックされた時は、必ずspMenuは閉じている。
			if ($spMenu.hasClass('is-active')) {
				$spMenu.removeClass('is-active');
			};
			
			//modalCoverがクリックされた時は、必ずspGrantは閉じている。
			if ($spGrant.hasClass('is-active')) {
				$spGrant.removeClass('is-active');
			};

			//modalCoverがクリックされた時は、必ずspSearchは閉じている。
			if ($spSearch.hasClass('is-active')) {
				$spSearch.removeClass('is-active');
			};			

			triangleToggle();
		})

	};
};
