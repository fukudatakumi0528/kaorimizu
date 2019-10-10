<?php
	global $cssName;
	global $breadcrumb;
	$cssName = "contact/thanks";
	$breadcrumb = '<li><a href="/contact/">お問い合わせ</a></li><li>送信完了</li>';
	get_header();
?>

<main>
	<div class="l-head">
		<h1 class="m-ttl">CONTACT<span>お問い合わせ</span></h1>
	</div>
	<section class="l-thanks inner -m">
		<h2>お問い合わせありがとうございました。</h2>
		<p>この度は、お問い合わせいただきまして誠に有難うございます。<br>内容を確認したのち、1週間以内にご連絡いたしますので、<br>しばらくお待ちください。よろしくお願いいたします。</p><a class="m-btn" href="/">トップに戻る</a>
	</section>
</main>

<?php get_footer() ?>
