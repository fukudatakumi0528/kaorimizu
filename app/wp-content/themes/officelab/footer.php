<footer id="footer">
    <p id="pagetop"><a href="#wrapper"></a></p>
    <div class="inner">
        <div class="company">
            <p>オフィス、店舗の移転・レイアウト変更ならオフィス・ラボにお任せください</p>
            <p class="logo"><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_sub.png" alt="Office lab"></a></p>
            <p class="address">東京都中央区日本橋本町3-3-6　WAKAMATSU BUILDING 9F</p>
            <p class="tel"><i><img src="<?php echo get_template_directory_uri(); ?>/img/icon_footer_tel01.png" width="17" height="19" alt="tel"></i>03-6281-9950</p>
            <p class="fax"><i><img src="<?php echo get_template_directory_uri(); ?>/img/icon_footer_fax01.png" width="17" height="19" alt="fax"></i>03-6281-9952</p>
        </div>
        <nav id="f_navi">
            <ul>
                <li><a href="<?php echo home_url(); ?>/">ホーム</a></li>
                <li><a href="<?php echo home_url(); ?>/column/">コラム</a></li>
                <li><a href="<?php echo home_url(); ?>/company/info/">企業情報</a>
                    <ul>
                        <li><a href="<?php echo home_url(); ?>/company/info/">会社概要</a></li>
                        <li><a href="<?php echo home_url(); ?>/company/idea/">代表挨拶</a></li>
                        <li><a href="<?php echo home_url(); ?>/company/advantage/">強み</a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li><a href="<?php echo home_url(); ?>/works/">施工事例</a>
                    </ul>
                </li>
            </ul>
            <ul class="link_space01">
                <li><a href="<?php echo home_url(); ?>/service/">サービス</a></li>
            </ul>
            <ul class="link_space02">
                <li><a href="<?php echo home_url(); ?>/recruit/">採用情報</a></li>
                <li><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></li>
                <li><a href="<?php echo home_url(); ?>/partner/">協力会社様募集</a></li>
                <li><a href="<?php echo home_url(); ?>/policy/">プライバシーポリシー</a></li>
            </ul>
        </nav>
        <p id="copyright">&copy; 2015 Office Laboratory Inc. All Rights Reserved.</p>
    <!-- /inner --></div>
<!-- /footer --></footer>
<!-- /wrapper --></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>
<?php if(is_front_page()) :?>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.heightLine.js"></script>
<script>
jQuery(function($){
//ビジュアル通過でheader背景・logo・navi文字 色変更
$visual = $('#main_visual');
$header = $('#header');
$gnavi_lists = $('#g_navi').children('ul').children('li').children('a');
$logo = $('#logo_area').find('img');
$header.css('background','none');

$(window).on('scroll', function () {
    if($visual.height() <= $(window).scrollTop()) {
        $header.css('background','#FFF');
        var src = $logo.attr('src');
        $logo.attr('src',$logo.attr('src').replace('_main','_sub'));
        $gnavi_lists.each(function(){
            $(this).css('color','#333333');
        });
    }else {
        $header.css('background','none');
        var src = $logo.attr('src');
        $logo.attr('src',$logo.attr('src').replace('_sub','_main'));
        $gnavi_lists.each(function(){
            $(this).css('color','#FFFFFF');
        });
    }
});

//ビジュアルスライダー
$('body').fadeIn(1000);
$('#visual').slick({
    autoplay: true,
    pauseOnHover: false,
    arrows: false,
    speed: 4000,
    // fade: true
});

//heightline
    $("#topics").find('.topics').heightLine();
    $("#works").find('.categories').heightLine();
    $("#works").find('h2').heightLine();

});
</script>
<?php endif; ?>

<?php if(is_singular( 'works' )) :?>
<script>
$(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    //controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 255,
    itemMargin: 5,
    asNavFor: '#slider',
	prevText:'',
	nextText:''
  });

  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: true,
    sync: "#carousel",
	prevText:'',
	nextText:''
  });
});
</script>
<?php endif; ?>
<?php if(is_category()) :
    if(!is_category('news')) global $slug;
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.heightLine.js"></script>
<script>
jQuery(function($){
    var showcount = 9; //初期表示数
    var oldcount = showcount - 9;
    $list = $('#list');
    $loadheight = $list.offset().top + $list.height();
    $(window).on('scroll', function () {
        if($(window).scrollTop() + $(window).height() > $loadheight && showcount > oldcount ) {
            oldcount = showcount;
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    'action' : 'my_ajax_get_posts',
                    'showcount'  : showcount,<?php
                    if($slug) :?>
                    'cat':'<?php echo $slug; ?>',
<?php endif; ?>
                },
                success: function( response ){
                    console.log(response);
                    $(response).appendTo($list).stop(true,true).hide().fadeIn(1000);
                    showcount = showcount + 3;
                }
            });
            $loadheight = $list.offset().top + $list.height();
            return false;
        }
        $('#list').find('.topics').heightLine();
    });
});

</script>
<?php endif; ?>
<?php if(is_post_type_archive( 'works' ) || is_tax(array('type','taste','case','area','date'))) :?>
<script>
jQuery(function($){
    var showcount = 10; //初期表示投稿数
    var loadcount = 0;
    var lastdate = 0;
    $main = $('#main');
    $htmlcode = $main.find('.works_list:last-child').clone();

function addpost(i) {
    loadcount++;
    $htmlcode.find('h2 a').text(posts[i].title);
    $htmlcode.find('.detail').text(posts[i].detail);
    $htmlcode.find('.image01 img').attr('src',posts[i].imgs[0]);
    $htmlcode.find('.image02 img').attr('src',posts[i].imgs[1]);
    $htmlcode.find('.image03 img').attr('src',posts[i].imgs[2]);
    $htmlcode.find('.image04 img').attr('src',posts[i].imgs[3]);
    $htmlcode.find('img').attr('alt',posts[i].title);
    $htmlcode.find('a').attr('href',posts[i].url);
    $($htmlcode.html()).appendTo($main.find('.works_list:last')).stop(true,true).hide().fadeIn(1000);
    lastdate = posts[i].date;
    // $('h1').next('h1').remove();
}

for (var i = 0; i < showcount; i++) {
    addpost(i);
}

    $loadheight = $main.offset().top + $main.height();
    var count = loadcount - 1;
    // var loadposts = 1; // 追加読み込みの件数
    $(window).on('scroll', function () {
        if($(window).scrollTop() + $(window).height() > $loadheight && loadcount > count && loadcount < posts.length) {
            count++;
            addpost(loadcount);
            $loadheight = $main.offset().top + $main.height();
            return false;
        }
    });
});
</script>
<?php endif; ?>

<?php if(is_post_type_archive( 'realestate' ) || is_tax(array('tsubo','location'))) :
    global $slug;
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.heightLine.js"></script>
<script>
jQuery(function($){

    var showcount = 9; //初期表示数
    var oldcount = showcount - 9;
    $main = $('#main');
    $loadheight = $main.offset().top + $main.height();
    $(window).on('scroll', function () {
        if($(window).scrollTop() + $(window).height() > $loadheight && showcount > oldcount ) {
                oldcount = showcount;
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    'action' : 'my_ajax_get_realestate_posts',
                    'showcount'  : showcount,
<?php if($taxonomy) :?>
                    'tax' : '<?php echo $taxonomy;?>',
                    'slug' : '<?php echo $slug;?>',
<?php endif; ?>
                },
                success: function( response ){
                    $(response).appendTo($main).stop(true,true).hide().fadeIn(1000);
                    showcount = showcount + 3;
                }
            });
            $loadheight = $main.offset().top + $main.height();
            return false;
        }
        $('#main').find('.topics').heightLine();
    });
});
</script>
<?php endif; ?>

<?php if(is_page('service')) :?>
<script>
jQuery(function($){
    $list = $('#single').find('li');
    $list.on( 'touchstart', function(){
        $list.addClass( '.hover' );
    }).on( 'touchend', function(){
        $list.removeClass( '.hover' );
    });
});
</script>
<?php endif; ?>
<?php
    if(is_page('estimate')):
    $item = htmlspecialchars($_GET['item']);
?>
<script>
jQuery(function($){

var items = {
    item01: {
        id: 1,
        name: 'イトーキ エフチェア',
        price: 'ハイバック／肘無し：￥71,900 ハイバック／可動肘付き：￥90,100'
    },
    item02: {
        id: 2,
        name: 'イトーキ ノナチェア',
        price: '肘無し：￥48,500 可動肘付き：￥68,600'
    },
    item03: {
        id: 3,
        name: 'オカムラ スラート',
        price: 'ハイバック／肘無し:￥46,200 ハイバック／可動肘付き:￥61,200'
    },
    item04: {
        id: 4,
        name: 'オカムラ シルフィー',
        price: 'ハイバック／サポート無し／肘無し ：￥70,900 ハイバック／サポート無し／可動肘付き ：￥87,700'
    },
    item05: {
        id: 5,
        name: 'コクヨ ウィザード2',
        price: 'ローバック／肘無し：￥55,400 ハイバック／T型肘付き：￥70,500'
    },
    item06: {
        id: 6,
        name: 'コクヨ シロッコ',
        price: 'ハイバック／サポート付／肘無し ：￥70,200 ハイバック／サポート付／可動肘付き ：￥88,000'
    },
    item07: {
        id: 7,
        name: '内田洋行 エージェイチェア',
        price: 'ハイバック／肘無し:￥60,000 ハイバック／可動肘付き:￥72,200'
    },
    item08: {
        id: 8,
        name: '内田洋行 カリッサチェア',
        price: 'ハイバック／肘無し：￥38,500 ハイバック／可動肘付き：￥50,700'
    }
}

$item_name = $('#item_name');
$form_item_name = $('#form_item_name');
$name_input = $('#name_input input');
$item_detail = $('#item_detail img');
$form_item_price = $('#form_item_price');

$item = <?php if($item) {
    echo 'items.'.$item;
    }else {
        echo 'false';
    } ?>;
if(!$item){
    $('#single').html('<p><a href="/campaign/" style="text-decoration:underline;">商品一覧</a>より商品を選んでください。</p>');
}

$item_name.text($item.name);
$form_item_name.text($item.name);
$name_input.attr('value',$item.name);
$item_detail.attr('src', '/wp-content/themes/officelab/img/img_itemdesc_id' + $item.id + '.png');
$item_detail.attr('alt', $item.name );
$form_item_price.text($item.price);

});
</script>

<!--Ptengine-->
<script type="text/javascript">
	window._pt_sp_2 = [];
	_pt_sp_2.push('setAccount,758c2098');
	var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	(function() {
		var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
		atag.src = _protocol + 'js.ptengine.jp/pta.js';
		var stag = document.createElement('script'); stag.type = 'text/javascript'; stag.async = true;
		stag.src = _protocol + 'js.ptengine.jp/pts.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(atag, s);s.parentNode.insertBefore(stag, s);
	})();
</script>

<?php endif; ?>
<?php if(is_page('info')) :?>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/gmap.js"></script>
<?php endif; ?>

<!--LP用-->
<script type="text/javascript">
  (function () {
    var tagjs = document.createElement("script");
    var s = document.getElementsByTagName("script")[0];
    tagjs.async = true;
    tagjs.src = "//s.yjtag.jp/tag.js#site=G6pjWk1";
    s.parentNode.insertBefore(tagjs, s);
  }());
</script>
<noscript>
  <iframe src="//b.yjtag.jp/iframe?c=G6pjWk1" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'ja'}
</script>
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<?php wp_footer(); ?>
</body>
</html>
