<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "article/post";
	$breadcrumb = '<li><a href="/column/">コラム</a></li><li>'.get_the_title().'</li>';
	get_header();

	//前後の記事取得
	$next_post = get_next_post();
	$next_post_ID = $next_post->ID;
//	$next_post_thumb = CFS()->get('cloumn_image', $next_post_ID);
	$next_post_url = get_permalink($next_post_ID);
	$next_post_time = get_the_time('Y.n.j', $next_post_ID);


	$prev_post = get_previous_post();
	$prev_post_ID = $prev_post->ID;
//	$prev_post_thumb = CFS()->get('cloumn_image', $prev_post_ID);
	$prev_post_url = get_permalink($prev_post_ID);
	$prev_post_time = get_the_time('Y.n.j', $prev_post_ID);

	//当記事のサムネイル
//	$thumbnail = CFS()->get('cloumn_image');
	if(empty($thumbnail)){
		$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
	}

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
						<header class="article__header">
							<h1><?php the_title() ?></h1>
							<div class="article__header__sub">
								<p>生活</p>
								<time><?php the_time('Y.n.j') ?></time>
							</div>
							<img src="<?= get_the_post_thumbnail_url() ?>" class="thumbnail">
							<!--
							<div class="article__sns">
								<?php get_template_part('element/sns') ?>
							</div>
							-->
						</header>

						<section class="article__body">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
							<img class="article__bnr" src="<?php echo assetsPath('img') . "/common/bnr.jpg" ?>" alt="">
						</section>

						<footer class="article__inner__footer">
							<div class="article__sns">
								<?php get_template_part('element/sns') ?>
							</div>
							<div class="article__footer_likeBox">
								<figure style="background-image: url(<?= $thumbnail ?>)"></figure>
								<div><b>facebookでも<br>随時配信しています！</b>
									<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
								</div>
							</div>
						</footer>
					</article>


					<div class="article__prevnext">
						<a class="prev" href="<?= $next_post_url ?>">
							<figure style="background-image: url(<?= $next_post_thumb ?>)"></figure>
							<div>
								<time><?= $next_post_time ?></time>
								<p><?= mb_substr(get_the_title($next_post_ID), 0, 12) ?>...</p>
							</div>
						</a>
						<a class="archive" href="<?= home_url() ?>/column/">ARCHIVE</a>
						<a class="next" href="<?= $prev_post_url ?>">
							<div>
								<time><?= $prev_post_time ?></time>
								<p><?= mb_substr(get_the_title($prev_post_ID), 0, 12) ?>...</p>
							</div>
							<figure style="background-image: url(<?= $prev_post_thumb ?>)"></figure>
						</a>
					</div>
				</div>
			</div>
			<div class="p-articlePost__inner__main__sidebar">
				<?php get_sidebar('pc'); ?>
			</div>
		</section>
	</div>
</main>


<?php get_footer() ?>
