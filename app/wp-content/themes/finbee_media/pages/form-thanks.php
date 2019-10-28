<?php
	global $cssName;
	global $breadcrumb;
	$cssName = "contact/thanks";
	$breadcrumb = '<li><a href="/news/">ニュース</a></li><li></li>';
	get_header();

?>
<main>
	<section class="p-contactThanks__main">
	  <div class="p-contactThanks__main__topper"><span class="icon-check2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
	    <p class="p-contactThanks__main__topper__title is-onlySp">お問い合わせ</p>
	    <p class="p-contactThanks__main__topper__title is-onlySp">ありがとうございました</p>
	    <p class="p-contactThanks__main__topper__title is-onlyPc">お問い合わせありがとうございました</p>
	    <p class="p-contactThanks__main__topper__subtitle">Thanks!</p>
	    <?php if(have_posts()): while(have_posts()): the_post(); ?>
			  <p class="p-contactThanks__main__topper__description"><?php the_content() ?></p>
		  <?php endwhile; endif; ?>
	  </div><a class="p-contactThanks__main__link" href="/"><span class="icon-btn"></span>
	    <p class="p-contactThanks__main__link__text">TOPへ戻る</p></a>
	</section>
</main>
<?php get_footer() ?>
