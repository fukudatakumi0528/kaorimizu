<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="description" content="オフィスの設計デザイン、各種工事をまとめて１社完結！オフィス移転・レイアウト変更はオフィス・ラボへお任せください。弊社はオフィス環境におけるお客様の様々なニーズにお応えし課題解決するコンサルティング会社です。">
<meta name="keywords" content="オフィス移転,オフィスレイアウト,オフィスデザイン,レイアウト変更,オフィス施工,東京,名古屋,大阪,福岡,">
<meta name="viewport" content="width=1040">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" media="all">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" media="all">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/overwrite.css" media="all">
<?php if(is_front_page()) echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/js/slick.css" media="all">
'; ?>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>
<script type="text/javascript" src="http://api.docodoco.jp/v4/docodoco?key=u9G9AHplXuxT9GMoxw29qZNzGkE17pFTg4PsG5hZOCntq5gWI1MJwKrc42REkXy5" charset="utf-8"></script>
<script type="text/javascript" src="http://www.officelab-ka.com/wp-content/themes/officelab/js/docodoco_ua_plugin.js" charset="utf-8"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create','UA-60523614-1','auto');
　ga('set','dimension1',SURFPOINT.getOrgName());                        //組織名
  ga('set','dimension2',SURFPOINT.getOrgUrl());                         //組織URL
  ga('set','dimension3',getIndL(SURFPOINT.getOrgIndustrialCategoryL()));  //業種大分類
  ga('set','dimension4',getEmp(SURFPOINT.getOrgEmployeesCode()));       //従業員数
  ga('set','dimension5',getTime());                                     //アクセス時刻
  ga('set','dimension6',SURFPOINT.getIP());                             //IPアドレス
  ga('set','dimension7',getIpo(SURFPOINT.getOrgIpoType()));             //上場区分
  ga('set','dimension8',getCap(SURFPOINT.getOrgCapitalCode()));         //資本金
  ga('set','dimension9',getGross(SURFPOINT.getOrgGrossCode()));         //売上高
  ga('set','dimension10',SURFPOINT.getCountryJName());                  //国名
  ga('set','dimension11',SURFPOINT.getPrefJName());                     //都道府県名
  ga('set','dimension12',SURFPOINT.getLineJName());                     //回線名
  ga('send','pageview');
</script>
</head>
<body<?php if(is_front_page()){
        echo ' class="toppage"';
    }else{
        echo ' class="subpage"';
    }
    if(is_page('info')){
        echo ' onload="initialize();"';
    } ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KXQKLQB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="wrapper">
<header id="header"<?php if(!is_front_page()){echo ' class="hidden"';};?>>
    <div class="inner">
        <div id="logo_area">
            <p class="logo"><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo<?php  if(!is_front_page()){echo '_sub';}else{echo '_main';};?>.png" width="225" height="48" alt="Office lab"></a></p>
<h1></h1>
        </div>
        <nav id="g_navi">
<?php wp_nav_menu( array(
            'theme_location'=>'globalnavi',
            'container'     =>'',
            'menu_class'    =>'',
            'items_wrap'    =>'<ul>%3$s</ul>'));
?>
        <!-- /g_navi --></nav>
    <!-- /inner --></div>
<!-- /header --></header>