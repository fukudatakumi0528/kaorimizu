<?php
	global $cssName;
	//global $scriptName;
	global $breadcrumb;
	$cssName = "contact/index";
	//$scriptName = "contact";
	$breadcrumb = '<li>お問い合わせ</li><li>お仕事の依頼</li>';
	get_header();
?>


<main>
	<div class="l-head">
		<h1 class="m-ttl">CONTACT<span>お問い合わせ</span></h1>
	</div>
	<section class="l-contact inner -m">
		<div class="contact__tab c-tab">
      <ul>
        <li><a class="-isActive" href="<?php home_url() ?>/contact/">お仕事の依頼</a></li>
        <li><a href="<?php home_url() ?>/contact/appointment/">取材・アポイント・営業</a></li>
        <li><a href="<?php home_url() ?>/contact/partner/">協力パートナー応募</a></li>
        <li><a href="<?php home_url() ?>/contact/entry/">採用エントリー</a></li>
      </ul>
    </div>
		<div class="contact__panel -work">
			<h2 class="contact__panel_title">お仕事の依頼</h2>
			<div class="contact__panel_form">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<?php the_content() ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer() ?>
