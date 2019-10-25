export default class Contact {
  selectBoxChange() {
    const $selectBox = $('.js-selectbox');

    $(function () {
      $selectBox.on('change', function () {
        $(this).css('color', '#262626');
      });
    });
  }
  selectContactChoice() {
		console.log('contact script');
		//
		//入力画面
		//
		if($('.mw_wp_form_input').length) {
			// ロード時
			const $selected = $('.p-contact__main__input__radiobutton label input:checked');
			const $checkedVal = $selected.val();
			console.log($checkedVal);
			if($checkedVal == 'email') {
				//email側を表示
				$('.p-contact__main__input__email').addClass('is-active');
				//tel側を非表示
				$('.p-contact__main__input__tel').removeClass('is-active');
				//値の入れ替え
				$('.p-contact__main__input__email .-email input').attr('name', 'email');
				$('.p-contact__main__input__email .-emailconf input').attr('name', 'email-conf');
				$('.p-contact__main__input__tel input').attr('name', '');
			} else {
				//tel側を表示
				$('.p-contact__main__input__tel').addClass('is-active');
				//email側を非表示
				$('.p-contact__main__input__email').removeClass('is-active');
				//値の入れ替え
				$('.p-contact__main__input__tel input').attr('name', 'tel');
				$('.p-contact__main__input__email .-email input').attr('name', '');
				$('.p-contact__main__input__email .-emailconf input').attr('name', '');
			}


			// クリック時
			const $selector = $('.p-contact__main__input__radiobutton label span');
		  $selector.on('click', (e) => {
			  console.log('clicked');

			  const $this = $(e.currentTarget);
			  const $thisInput = $this.prev('input');
			  const $thisInputVal = $thisInput.val();

			  console.log($thisInputVal);

				if($thisInputVal == 'email') {
					//email側を表示
					$('.p-contact__main__input__email').addClass('is-active');
					//tel側を非表示
					$('.p-contact__main__input__tel').removeClass('is-active');
					//値の入れ替え
					$('.p-contact__main__input__email .-email input').attr('name', 'email');
					$('.p-contact__main__input__email .-emailconf input').attr('name', 'email-conf');
					$('.p-contact__main__input__tel input').attr('name', '');
				} else {
					//tel側を表示
					$('.p-contact__main__input__tel').addClass('is-active');
					//email側を非表示
					$('.p-contact__main__input__email').removeClass('is-active');
					//値の入れ替え
					$('.p-contact__main__input__tel input').attr('name', 'tel');
					$('.p-contact__main__input__email .-email input').attr('name', '');
					$('.p-contact__main__input__email .-emailconf input').attr('name', '');
				}
		  })
	  }



	  //
		// 確認画面
		//
		if($('.mw_wp_form_confirm').length) {
			// ロード時
			const $selected = $('.p-contact__main__input__radiobutton input[name="contactmethod"]');
			const $checkedVal = $selected.val();
			console.log($checkedVal);




			if($checkedVal == 'email') {
				//email側を表示
				$('.p-contact__main__input__email').addClass('is-active');
				//tel側を非表示
				$('.p-contact__main__input__tel').removeClass('is-active');
				//値の入れ替え
				$('.p-contact__main__input__email .-email input').attr('name', 'email');
				$('.p-contact__main__input__email .-emailconf input').attr('name', 'email-conf');
				$('.p-contact__main__input__tel input').attr('name', '');
			} else {
				//tel側を表示
				$('.p-contact__main__input__tel').addClass('is-active');
				//email側を非表示
				$('.p-contact__main__input__email').removeClass('is-active');
				//値の入れ替え
				$('.p-contact__main__input__tel input').attr('name', 'tel');
				$('.p-contact__main__input__email .-email input').attr('name', '');
				$('.p-contact__main__input__email .-emailconf input').attr('name', '');
			}


/*
			// クリック時
			const $selector = $('.p-contact__main__input__radiobutton label span');
		  $selector.on('click', (e) => {
			  console.log('clicked');

			  const $this = $(e.currentTarget);
			  const $thisInput = $this.prev('input');
			  const $thisInputVal = $thisInput.val();

			  console.log($thisInputVal);

				if($thisInputVal == 'email') {
					//email側を表示
					$('.p-contact__main__input__email').addClass('is-active');
					//tel側を非表示
					$('.p-contact__main__input__tel').removeClass('is-active');
					//値の入れ替え
					$('.p-contact__main__input__email .-email input').attr('name', 'email');
					$('.p-contact__main__input__email .-emailconf input').attr('name', 'email-conf');
					$('.p-contact__main__input__tel input').attr('name', '');
				} else {
					//tel側を表示
					$('.p-contact__main__input__tel').addClass('is-active');
					//email側を非表示
					$('.p-contact__main__input__email').removeClass('is-active');
					//値の入れ替え
					$('.p-contact__main__input__tel input').attr('name', 'tel');
					$('.p-contact__main__input__email .-email input').attr('name', '');
					$('.p-contact__main__input__email .-emailconf input').attr('name', '');
				}
		  })
*/
	  }








/*
	  console.log('teaestaertas');


    const $contactChoiceLabel =$('.p-contact__main__input__radiobutton__under__label')

    const $inputAreaEmail = $('.p-contact__main__input__email');
    const $inputAreaTel = $('.p-contact__main__input__tel');

    $contactChoiceLabel.on('click', function () {
      if ($(this).hasClass('js-contactChoiceEmailButton')) {
        $inputAreaTel.removeClass('is-active');

        $('.p-contact__main__input__email input').attr('name', '--');



        $inputAreaEmail.addClass('is-active');
      } else if ($(this).hasClass('js-contactChoiceTelButton')) {
        $inputAreaEmail.removeClass('is-active');
        $inputAreaTel.addClass('is-active');
      }
    })
*/
  }
}



