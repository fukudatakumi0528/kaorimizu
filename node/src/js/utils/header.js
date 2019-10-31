export default class Header {

	//表示崩れを起こさないために、読み込み直後は非表示にしておく。
	onloadDocument() {
		setTimeout(function () {
			const $spSearch = $('#js-spSearch');
			const $spGrant = $('#js-spGrant');
			const $spMenu = $('#js-spMenu');
	
			$spSearch.removeClass('is-hidden');
			$spGrant.removeClass('is-hidden');
			$spMenu.removeClass('is-hidden');
		},200)
	};

　//メニュー関連の開閉に関する処理。
	clickHeaderButton() {
		//seachMenu,grantMenuのトリガー
		const $headerInnerPcSearch = $('.js-headerInnerPc__search');
		const $headerInnerPcGrant = $('.js-headerInnerPc__grant');

		//seachMenu,grantMenu,mainMenu
		const $spSearch = $('#js-spSearch');
		const $spGrant = $('#js-spGrant');
		const $spMenu = $('#js-spMenu');

		//header,modalカバー
		const $header = $('.l-header');
		const $modalCover = $('.l-modalCover')

		//メニューが出てきたときの三角吹き出し
		const $seachTriangle = $('.js-headerInnerPc__search__triangle');
		const $grantTriangle = $('.js-headerInnerPc__grant__triangle');

		const $seachIcon = $('.js-headerInnerPc__search__icon');
		const $grantIcon = $('.js-headerInnerPc__grant__icon');

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


		//headerのクラス出し分け
		function headerToggle() {
			if ($spSearch.hasClass('is-active') || $spGrant.hasClass('is-active')) {
				$header.addClass('is-active');
			} else {
				$header.removeClass('is-active');
			}
		}
		

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
			headerToggle();
		}); 



		//pcSearchがhoverされた時
		$headerInnerPcSearch.on('mouseover', function () {
			$spSearch.addClass('is-active');
			$modalCover.addClass('is-active');
			$seachIcon.addClass('is-active');

			//searchボタンがhoverされた時は、必ずspMenuは閉じている。
			$spMenu.removeClass('is-active');
			
			//searchボタンがhoverされた時は、必ずspGrantは閉じている。
			$spGrant.removeClass('is-active');

			$seachTriangle.addClass('is-active');
			$header.addClass('is-active');
		}).on('mouseout', function () {
			$spSearch.removeClass('is-active');
			$modalCover.removeClass('is-active');
			$seachIcon.removeClass('is-active');

			$seachTriangle.removeClass('is-active');
			$header.removeClass('is-active');
		}); 




		//pcGrantがhoverされた時
		$headerInnerPcGrant.on('mouseover', function () {
			$spGrant.addClass('is-active');
			$modalCover.addClass('is-active');
			$grantIcon.addClass('is-active');

			//grantボタンがhoverされた時は、必ずspMenuは閉じている。
			$spMenu.removeClass('is-active');
			
			//grantボタンがhoverされた時は、必ずspSearchは閉じている。
			$spSearch.removeClass('is-active');

			$grantTriangle.addClass('is-active');
			$header.addClass('is-active');
		}).on('mouseout', function () {
			$spGrant.removeClass('is-active');
			$modalCover.removeClass('is-active');
			$grantIcon.removeClass('is-active');

			$grantTriangle.removeClass('is-active');
			$header.removeClass('is-active');
		}); 



		$modalCover.on('mouseover', function () {
			$modalCover.removeClass('is-active');

			//modalCoverがhoverされた時は、必ずspMenuは閉じている。
			if ($spMenu.hasClass('is-active')) {
				$spMenu.removeClass('is-active');
			};
			
			//modalCoverがhoverされた時は、必ずspGrantは閉じている。
			if ($spGrant.hasClass('is-active')) {
				$spGrant.removeClass('is-active');
			};

			//modalCoverがhoverされた時は、必ずspSearchは閉じている。
			if ($spSearch.hasClass('is-active')) {
				$spSearch.removeClass('is-active');
			};			

			triangleToggle();
			headerToggle();
		})

	};
};
