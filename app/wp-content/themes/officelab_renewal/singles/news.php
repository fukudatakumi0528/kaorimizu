<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "article/post";
	$breadcrumb = '<li><a href="/news/">ニュース</a></li><li>'.get_the_title().'</li>';
	get_header();

	//前後の記事取得
	$next_post = get_next_post();
	$next_post_ID = $next_post->ID;
	$next_post_thumb = CFS()->get('cloumn_image', $next_post_ID);
	$next_post_url = get_permalink($next_post_ID);
	$next_post_time = get_the_time('Y.n.j', $next_post_ID);


	$prev_post = get_previous_post();
	$prev_post_ID = $prev_post->ID;
	$prev_post_thumb = CFS()->get('cloumn_image', $prev_post_ID);
	$prev_post_url = get_permalink($prev_post_ID);
	$prev_post_time = get_the_time('Y.n.j', $prev_post_ID);


	//当記事のサムネイル
	$thumbnail = CFS()->get('cloumn_image');
	if(empty($thumbnail)){
		$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
	}

?>


<main>
	<div class="l-article">
		<div class="l-article--wrap inner -s">
			<div class="l-article--left">
				<article class="article">
					<header class="article__header">
						<figure style="background-image: url(<?= $thumbnail ?>)">
							<?php if( CFS()->get('new') == true ): ?>
								<figcaption>NEW</figcaption>
							<?php endif; ?>
						</figure>
						<div class="article__header_wrap">
							<div class="article__header_info">
								<time><?php the_time('Y.n.j') ?></time>
							</div>
							<h1><?php the_title() ?></h1>
							<div class="article__sns">
								<?php get_template_part('element/sns') ?>
							</div>
						</div>
					</header>

					<section class="article__body">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</section>

					<footer class="article__footer">
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
					<a class="archive" href="<?= home_url() ?>/news/">ARCHIVE</a>
					<a class="next" href="<?= $prev_post_url ?>">
						<div>
							<time><?= $prev_post_time ?></time>
							<p><?= mb_substr(get_the_title($prev_post_ID), 0, 12) ?>...</p>
						</div>
						<figure style="background-image: url(<?= $prev_post_thumb ?>)"></figure>
					</a>
				</div>

				<div class="article__related"><b>関連記事</b>
					<ul>
						<?php
							$relatedArgs = [
								'post_type' => 'news',
								'posts_per_page' => 4,
								'post__not_in' => array($post->ID,),
								'order' => 'DESC',
								'orderby' => 'rand',
							];
							$relatedQuery = new WP_Query($relatedArgs);
							if($relatedQuery->have_posts()): while($relatedQuery->have_posts()): $relatedQuery->the_post();
						?>
							<li>
								<a href="<?php the_permalink() ?>">
									<figure style="background-image: url(<?= CFS()->get('cloumn_image') ?>)"></figure>
									<div><b><?php the_title() ?></b>
										<p><?php the_excerpt() ?></p>
										<time><?php the_time('Y.n.j') ?></time>
									</div>
								</a>
							</li>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>


			<div class="l-article--right">
				<div class="article__new"><b>新着記事</b>
					<ul>
						<?php
							$newArgs = [
								'post_type' => 'news',
								'posts_per_page' => 5,
								'post__not_in' => array($post->ID,),
								'order' => 'DESC',
							];
							$newQuery = new WP_Query($newArgs);
							if($newQuery->have_posts()): while($newQuery->have_posts()): $newQuery->the_post();
						?>
							<li>
								<a href="<?php the_permalink() ?>">
									<figure style="background-image: url(<?= CFS()->get('cloumn_image') ?>)"></figure>
									<div>
										<b><?php the_title() ?></b>
										<time><?php the_time('Y.n.j') ?></time>
									</div>
								</a>
							</li>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</main>


<?php get_footer() ?>
