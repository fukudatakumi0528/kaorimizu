<?php
	global $cssName;
	global $breadcrumb;
	$cssName = "message/index";
	$breadcrumb = '<li>代表挨拶</li>';
	get_header();
?>

<main>
	<div class="l-head">
		<h1 class="m-ttl">MESSAGE<span>代表挨拶</span></h1>
	</div>
	<section class="l-message inner -m">
		<div class="change__tab">
			<ul>
				<li><a href="<?php home_url() ?>/company/">企業情報</a></li>
				<li class="-isActive"><span>代表挨拶</span></li>
			</ul>
		</div>
		<div class="message__items">
			<div class="message__img">
				<figure style="background-image: url(<?= assetsPath('img') ?>message/img_watanabe-kouichirou.jpg)"></figure>
			</div>
			<div class="message__wrap">
				<div class="message__left -isPC">
					<div class="message__title">
						<h1><span>お客様に常に寄<span>り</span>添い、</span><br><span>支<span>え</span>続け<span>る</span>最良の</span><br><span>パー<span>ト</span>ナーであ<span>り</span>たい</span></h1>
					</div>
				</div>
				<div class="message__right">
					<div class="message__head"><b>お客様、協力企業、社員とその家族、<br>すべての方々から永遠に愛され、<br>真に社会に貢献する。<br>「ありがとう」で結ばれる企業を目指して<br>私たちは成長し続けます。</b></div>
					<div class="message__title--SP -isSP">
						<h1>お客様に常に寄り添い、<br>支え続ける最良の<br>パートナーでありたい</h1>
					</div>
					<div class="message__text">
						<h2>お客様に常に寄り添い、<br>支え続ける最良のパートナーでありたい。</h2>
						<p>「お客様のために、真摯に働く社員を幸せにしたい。」<br>その想いで2010年、私は弊社を創業しました。<br>オフィスは働く現代人にとって一日の大半を過ごす場所であり、<br>生産効率や利益に直結する"経営装置"そのものです。<br>そのためには経営者のビジョンが明確に発信され、社員一人一人が能力を最大限に発揮でき、いきいきとした笑顔あふれる場所であるべきだと考えています。</p>
						<p>企業の成長、変革、成熟、すべての局面において<br>お客様に常に寄り添い、支え続ける最良のパートナーでありたい。<br>オフィス・ラボはいつもそう願い、独立系企業を貫き「オフィス専門のコンサルタント」としてお客様の目線でよりよいオフィスづくりを心がけてきました。<br>常に新しいオフィスの在り方をイメージし、いかなる経営課題にも真摯に向き合い、求められる以上の価値を提供する。<br>私たちが目指すのは、お客様に、社会に、真に貢献し続ける企業です。</p>
						<p>オフィス・ラボに出会っていただいたすべての人々の幸せを想い、<br>「ありがとう」という言葉で結ばれる絆を深め、<br>これまでも、これからも、ひたむきに誠実に取り組んでまいります。</p>
					</div>
					<div class="message__sign">
						<p>株式会社オフィス・ラボ　<br class="-isSP">代表取締役社長</p><img src="<?= assetsPath('img') ?>message/img_sign.svg">
					</div>
				</div>
			</div>
		</div>
	</section>
</main>


<?php get_footer() ?>
