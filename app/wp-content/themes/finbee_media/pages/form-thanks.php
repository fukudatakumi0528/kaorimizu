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
	    <p class="p-contactThanks__main__topper__description">◯日以内に、担当者よりご連絡をさせていただきます。<br>今しばらくお待ちくださいますよう、よろしくお願い申し上げます。</p>
	  </div><a class="p-contactThanks__main__link" href=""><span class="icon-btn"></span>
		  <?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php the_content() ?>
		<?php endwhile; endif; ?>
	    <p class="p-contactThanks__main__link__text">TOPへ戻る</p></a>
	</section>
	<section class="p-contactThanks__footer">
	            <div class="m-breadcrumb">
	              <ul class="m-breadcrumb__list">
	                <li class="m-breadcrumb__list__link"> <a class="m-breadcrumb__list__link__text" href="">TOP</a><span class="icon-head"></span></li>
	                <li class="m-breadcrumb__list__link"> <a class="m-breadcrumb__list__link__text" href="">
	                    <p class="m-breadcrumb__list__link__text__inner"> お問い合わせ</p></a><span class="icon-head"></span></li>
	              </ul>
	            </div>
	</section>



</main>
<?php get_footer() ?>
