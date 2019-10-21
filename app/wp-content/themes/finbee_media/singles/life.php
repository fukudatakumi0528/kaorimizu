<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "article/post";
	$breadcrumb = '<li><a href="/column/">コラム</a></li><li>'.get_the_title().'</li>';
	get_header();

	//前後の記事取得
	$next_post = get_next_post();
	$next_post_ID = $next_post->ID;
  $next_post_thumb = get_the_post_thumbnail_url($next_post_ID);
	$next_post_url = get_permalink($next_post_ID);
	$next_post_time = get_the_time('Y.n.j', $next_post_ID);


	$prev_post = get_previous_post();
	$prev_post_ID = $prev_post->ID;
	$prev_post_thumb = get_the_post_thumbnail_url($prev_post_ID);
	$prev_post_url = get_permalink($prev_post_ID);
	$prev_post_time = get_the_time('Y.n.j', $prev_post_ID);

	//当記事のサムネイル
	if ( has_post_thumbnail() ) { // 投稿にアイキャッチ画像が割り当てられているかチェックします。
		$thumbnail =  get_the_post_thumbnail_url();
	} 

	if(empty($thumbnail)){
		$thumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
	}

	$singletags = get_the_terms($post->ID, 'feature_tag');

?>

<main class="p-articlePost">
	<div class="p-articlePost__inner">
		<section class="p-articlePost__inner__topper">
			<h1><?php the_title() ?></h1>
			<div class="article__header__sub">
				<p>生活</p>
				<time><?php the_time('Y.n.j') ?></time>
			</div>
		</section>
		<section class="p-articlePost__inner__main">
			<div class="p-articlePost__inner__main__content">
				<div class="p-articlePost__inner__main__content__column">
					<article class="article">
						<div class="article__header">
							<h1><?php the_title() ?></h1>
							<div class="article__header__sub">
								<p>生活</p>
								<time><?php the_time('Y.n.j') ?></time>
							</div>
							<img src="<?= $thumbnail ?>" class="thumbnail">
						</div>

						<div class="article__body">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>

						<div class="article__footer">
							<div class="article__tag">
								<ul class="o-classificationList">
									<?php	if($singletags): foreach ($singletags as $tag ): ?>
										<li class="o-classificationList__tag">
											<a class="o-classificationList__tag__link" href="<?= get_category_link($tag->term_id); ?>">
												<p class="o-classificationList__tag__link__inner"><?= $tag->name?></p>
											</a>
										</li>
									<?php  endforeach;  endif; ?>
								</ul>
							</div>
							<a class="article__bnr" href="https://finbee.jp/">
								<img class="article__bnr__image" src="<?php echo assetsPath('img') . "/common/bnr.jpg" ?>" alt="">
							</a>
							<div class="article__sns">
								<p>この記事をシェアする</p>
								<?php get_template_part('element/sns') ?>
							</div>							
							<div class="article__border"></div>
							<div class="article__prevnext">
								<a class="article__prevnext__main" href="<?= $next_post_url ?>">
									<div class="article__prevnext__main__button prev">
										<span class="icon-head prev"></span>
									</div>
									<div class="article__prevnext__main__content">
										<div class="article__prevnext__main__content__topper">
											<p class="article__prevnext__main__content__topper__text prev">前の記事</p>
										</div>
										<div class="article__prevnext__main__content__footer">
											<img class="article__prevnext__main__content__footer__image" src="<?= $next_post_thumb ?>"></img>
											<p class="article__prevnext__main__content__footer__title"><?= get_the_title($next_post_ID) ?></p>
										</div>
									</div>
								</a>
								<a class="article__prevnext__main" href="<?= $prev_post_url ?>">
									<div class="article__prevnext__main__content">
										<div class="article__prevnext__main__content__topper">
											<p class="article__prevnext__main__content__topper__text next">次の記事</p>
										</div>
										<div class="article__prevnext__main__content__footer">
											<img class="article__prevnext__main__content__footer__image" src="<?= $prev_post_thumb ?>"></img>
											<p class="article__prevnext__main__content__footer__title"><?= get_the_title($prev_post_ID) ?></p>
										</div>
									</div>
									<div class="article__prevnext__main__button next">
										<span class="icon-head next"></span>
									</div>
								</a>
							</div>
						</div>

					</article>
				</div>
			</div>
			<div class="p-articlePost__inner__main__sidebar">
				<?php get_sidebar('pc'); ?>
			</div>
		</section>
		<section class="p-articlePost__inner__footer">
			<?php get_template_part('ranking'); ?>
		</section>
	</div>
</main>


<?php get_footer() ?>
