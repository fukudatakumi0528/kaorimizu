<?php
	global $cssName;
	$cssName = "contact/index";
	get_header();
?>
<main>
	<section class="p-contact__topper">
		<div class="o-topperSection">
			<div class="o-topperSection__main">
				<div class="o-topperSection__main__title">
					<img class="o-topperSection__main__title__icon contact" src="<?php echo assetsPath('img') ?>common/icon/mail.png" alt="">
					<div class="o-topperSection__main__title__text">
						<h1 class="o-topperSection__main__title__text__main">お問い合わせ</h1>
						<p class="o-topperSection__main__title__text__sub">Contact</p>
					</div>
				</div>
				<div class="o-topperSection__main__description">be-topia のコンテンツに参加してみたい方は以下フォームより、お問い合わせください。</div>
			</div>
		</div>
	</section>
	<section class="p-contact__main">
		<div class="p-contact__main__bg">
			<div class="p-contact__main__inner">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<?php the_content() ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer() ?>
