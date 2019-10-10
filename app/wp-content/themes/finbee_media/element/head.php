<?php
	global $cssName;

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<title>株式会社オフィス・ラボ</title>
<?php /*
<meta property="og:locale" content="ja_JP">
<meta property="og:type" content="website">
<meta property="twitter:card" content="summary">
<meta property="og:title" content="株式会社オフィス・ラボ">
<meta property="twitter:title" content="株式会社オフィス・ラボ">
<meta property="og:url" content="">
<meta property="og:site_name" content="株式会社オフィス・ラボ">
<meta property="twitter:site" content="株式会社オフィス・ラボ">
<meta property="og:image" content="">
<meta property="twitter:image" content="">
<meta property="article:publisher" content="株式会社オフィス・ラボ">
*/ ?>
<link rel="apple-touch-icon" sizes="57x57" href="<?= assetsPath('img') ?>icon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?= assetsPath('img') ?>icon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?= assetsPath('img') ?>icon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?= assetsPath('img') ?>icon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?= assetsPath('img') ?>icon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?= assetsPath('img') ?>icon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?= assetsPath('img') ?>icon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?= assetsPath('img') ?>icon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?= assetsPath('img') ?>icon/apple-touch-icon-180x180.png">
<link rel="icon" href="<?= assetsPath('img') ?>icon/favicon.ico">
<?php /* <link rel="manifest" href="<?= assetsPath('img') ?>icon/manifest.json"> */ ?>
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?= assetsPath('img') ?>icon/ms-icon-144x144.png">
<meta name="theme-color" content="#FFF002">
<link rel="stylesheet" href="<?= assetsPath('css') ?>common.css">
<link rel="stylesheet" href="<?= assetsPath('css') . $cssName ?>.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php /* ↓adove typekit 筑紫ゴシック 使用スクリプト */ ?>
<script>
	(function(d) {
		var config = {
			kitId: 'kwp4vyw',
			scriptTimeout: 3000,
			async: true
		},
		h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	})(document);
</script>
<script type="text/javascript" src="https://api.docodoco.jp/v4/docodoco?key=u9G9AHplXuxT9GMoxw29qZNzGkE17pFTg4PsG5hZOCntq5gWI1MJwKrc42REkXy5" charset="utf-8"></script>
<script type="text/javascript" src="<?= assetsPath('js') ?>docodoco_ua_plugin.js" charset="utf-8"></script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create','UA-60523614-1','auto');
	ga('set', 'dimension1' , SURFPOINT.getOrgName()); //組織名
	ga('set', 'dimension2' , SURFPOINT.getOrgUrl()); //組織 URL
	ga('set', 'dimension3' , getIndL(SURFPOINT.getOrgIndustrialCategoryL())); //業種大分類
	ga('set', 'dimension4' , getEmp(SURFPOINT.getOrgEmployeesCode())); //従業員数
	ga('set', 'dimension5' , getTime()); //アクセス時刻
	ga('set', 'dimension6' , SURFPOINT.getIP()); //IP アドレス
	ga('set', 'dimension7' , getIpo(SURFPOINT.getOrgIpoType())); //上場区分
	ga('set', 'dimension8' , getCap(SURFPOINT.getOrgCapitalCode())); //資本金
	ga('set', 'dimension9' , getGross(SURFPOINT.getOrgGrossCode())); //売上高
	ga('set', 'dimension10' , SURFPOINT.getCountryJName()); //国名
	ga('set', 'dimension11' , SURFPOINT.getPrefJName()); //都道府県名
	ga('set', 'dimension12' , SURFPOINT.getLineJName()); //回線名
	ga('send', 'pageview');
</script>
<?php wp_head(); ?>
