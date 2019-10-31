<?php
	global $cssName;

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<title>finbee</title>
<link rel="apple-touch-icon" sizes="180x180" href="<?= assetsPath('img') ?>icon/apple-touch-icon-180x180.png">
<link rel="stylesheet" href="<?= assetsPath('css') ?>common.css">
<link rel="stylesheet" href="<?= assetsPath('css') . $cssName ?>.css">
<link rel="stylesheet" href="<?= assetsPath('fonts') ?>icomoon/style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<script src="https://kit.fontawesome.com/fb47fbf916.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/object-fit-images/3.2.3/ofi.js"></script>
<script src="<?= assetsPath('js') ?>stickyfill.min.js"></script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KBC63RB');</script>
<!-- End Google Tag Manager -->

<?php wp_head(); ?>
