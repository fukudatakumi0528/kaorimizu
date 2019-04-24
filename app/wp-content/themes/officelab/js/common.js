jQuery(function($){


// ウィンドウの高さ、幅を代入
var $wH = $(window).height();
var $wW = $(window).innerWidth();

//  #visual高さを画面サイズに合わせる
if($wH<$wW){
    $('#main_visual').css('height',$wH + 'px');
}

// 画面がリサイズされた時、上記処理をもう一度行ってcssを変更
$(window).resize(function(){
    var $wH = $(window).height();
    var $wW = $(window).innerWidth();
    if($wH<$wW){
      $('#main_visual').css('height',$wH+'px');
    }
});

// #で始まるアンカーをクリックした場合にスムーススクロール
$('a[href^=#]').on('click',function() {
  var $speed = 1000; // スクロールの速度
  var $href= $(this).attr("href");
  var $target = $($href == "#" || $href == "" ? 'html' : $href);
  var $position = $target.offset().top;
  $('body,html').animate({scrollTop:$position}, $speed, 'swing');
  return false;
});

// ページトップ フェードインアウト＆スムーススクロール
var $scroll = ($('body').height() - $(window).height()) * 0.6; //ページトップアイコン表示開始位置
var $speed = 300; //スクロール速度
var $pagetop = $('#pagetop');

$(window).on('scroll', function () {
    if($(this).scrollTop() > $scroll) {
        $pagetop.fadeIn();
    }
    else {
        $pagetop.fadeOut();
    }
});

$pagetop.click(function(){
    $('html,body').stop().animate({
        scrollTop: 0
    }, $speed);
    return false;
});

$(window).on('load', function () {
    $(window).on('scroll', function () {
        var $footerOffset = $('#footer').offset().top;
        if($(window).scrollTop() + $(window).height() - 10 < $footerOffset) {
            $pagetop.removeClass('static');
        } else {
            $pagetop.addClass('static');
        }
    });
});

// グローバルナビホバー時に画像差し替え
$gnavi = $('#g_navi');
$gnavi.find('img').on({
    'mouseenter':function(){
        src = $(this).attr('src');
        if(src.indexOf("sub")!=-1){
            $(this).attr('src',$(this).attr('src').replace('_sub','_main'));
        }
    },
    'mouseleave':function(){
        if(src.indexOf("sub")!=-1){
            $(this).attr('src',$(this).attr('src').replace('_main','_sub'));
        }
    }
});



});