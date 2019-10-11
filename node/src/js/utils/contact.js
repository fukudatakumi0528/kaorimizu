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
    const $contactChoiceLabel =$('.p-contact__main__input__radiobutton__under__label')

    const $inputAreaEmail = $('.p-contact__main__input__email');
    const $inputAreaTel = $('.p-contact__main__input__tel');

    $contactChoiceLabel.on('click', function () {
      if ($(this).hasClass('js-contactChoiceEmailButton')) {
        $inputAreaTel.removeClass('is-active');
        $inputAreaEmail.addClass('is-active');
      } else if ($(this).hasClass('js-contactChoiceTelButton')) {
        $inputAreaEmail.removeClass('is-active');
        $inputAreaTel.addClass('is-active');
      }        
    })
  }
}



