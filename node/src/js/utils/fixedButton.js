export default class FixedButton {
  clickMenu() {
    const $innerTopperInner = $('.l-fixed-button__inner__topper__inner');
    const $innerTopperInnerText = $('.l-fixed-button__inner__topper__inner__text');
    const $innerTopperInnerMenuLine = $('.l-fixed-button__inner__topper__inner__menu__line');
    const $innerMainButton = $('.l-fixed-button__inner__main__button');
    const $spSearchTrigger = $('#js-spSearch-trigger');
    const $spGrantTrigger = $('#js-spGrant-trigger');

    //menu部分
    const $spMenu = $('#js-spMenu');
    const $spSearch = $('#js-spSearch');
    const $spGrant = $('#js-spGrant');


    //スクロール禁止にするための設定
    function handleTouchMove(event) {
      event.preventDefault();
    }

    //スクロール禁止
    function scrollStop() {
      document.addEventListener('touchmove', handleTouchMove, { passive: false });
    };

    //スクロール復帰
    function scrollStart() {
      document.removeEventListener('touchmove', handleTouchMove, { passive: false });
    };

    //スクロールの解除、非解除
    function scrollControl() {
      if ($spMenu.hasClass('is-active')) {
        scrollStop();
      } else {
        scrollStart();
      };
    }

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


    //spMenu開閉用ボタンを押した時
    $innerTopperInner.on('click', function () {
      $innerMainButton.removeClass('is-click');
      $innerTopperInnerMenuLine.toggleClass('is-active');
      if ($innerTopperInnerMenuLine.hasClass('is-active')) {
        $innerTopperInnerText.html('close');
      } else {
        $innerTopperInnerText.html('menu');
      }
      spMenuToggle();

      //grantボタンがクリックされた時は、必ずspMenuは閉じている。
      if ($spSearch.hasClass('is-active')) {
        $spSearch.removeClass('is-active');
        $spSearch.addClass('is-right');
        setTimeout(function () {
          $spSearch.removeClass('is-right');
        },400)
      };

      //searchボタンがクリックされた時は、必ずspGrantは閉じている。
      if ($spGrant.hasClass('is-active')) {
        $spGrant.removeClass('is-active');
        $spGrant.addClass('is-right');
        setTimeout(function () {
          $spGrant.removeClass('is-right');
        },400)
      };

      scrollControl();
    });


    
    //spSearch開閉用ボタンを押した時
    $spSearchTrigger.on('click', function () {
      $innerMainButton.not(this).removeClass('is-click');
      $innerTopperInnerMenuLine.removeClass('is-active');
      if ($innerTopperInnerMenuLine.hasClass('is-active')) {
        $innerTopperInnerText.html('close');
      } else {
        $innerTopperInnerText.html('menu');
      }
      $(this).toggleClass('is-click');

      spSearchToggle();

      //searchボタンがクリックされた時は、必ずspMenuは閉じている。
      if ($spMenu.hasClass('is-active')) {
        $spMenu.removeClass('is-active');
        $spMenu.addClass('is-right');
        setTimeout(function () {
          $spMenu.removeClass('is-right');
        },400)
      };
      
      //searchボタンがクリックされた時は、必ずspGrantは閉じている。
      if ($spGrant.hasClass('is-active')) {
        $spGrant.removeClass('is-active');
        $spGrant.addClass('is-right');
        setTimeout(function () {
          $spGrant.removeClass('is-right');
        },400)
      };

      scrollStart();
    });


    //spGrant開閉用ボタンを押した時
    $spGrantTrigger.on('click', function () {
      $innerMainButton.not(this).removeClass('is-click');
      $innerTopperInnerMenuLine.removeClass('is-active');
      if ($innerTopperInnerMenuLine.hasClass('is-active')) {
        $innerTopperInnerText.html('close');
      } else {
        $innerTopperInnerText.html('menu');
      }
      $(this).toggleClass('is-click');

      spGrantToggle();

      //grantボタンがクリックされた時は、必ずspMenuは閉じている。
      if ($spMenu.hasClass('is-active')) {
        $spMenu.removeClass('is-active');
        $spMenu.addClass('is-right');
        setTimeout(function () {
          $spMenu.removeClass('is-right');
        },400)
      };

      //grantボタンがクリックされた時は、必ずspMenuは閉じている。
      if ($spSearch.hasClass('is-active')) {
        $spSearch.removeClass('is-active');
        $spSearch.addClass('is-right');
        setTimeout(function () {
          $spSearch.removeClass('is-right');
        },400)
      };
      
      scrollStart();
    });
    
	};
};
