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

	$singletags = get_the_terms($post->ID, 'learn_tag');
?>

<main class="p-articlePost">
	<div class="p-articlePost__inner">
		<section class="p-articlePost__inner__topper">
			<h1><?php the_title() ?></h1>
			<div class="article__header__sub">
				<p>学び</p>
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
								<p>学び</p>
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
								<?php if($next_post): ?>
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
								<?php else: ?>
									<div class="article__prevnext__main empty">
									</div>
								<?php endif; ?>
								<?php if($prev_post): ?>
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
								<?php else: ?>
									<div class="article__prevnext__main empty">
									</div>
								<?php endif; ?>
							</div>
							<div class="article__relation">
								<div class="m-titleBorder">
									<div class="m-titleBorder__main">
										<div class="m-titleBorder__main__text">関連記事<small>Relation</small></div>
										<div class="m-titleBorder__main__border"></div>
									</div>
								</div>
								<ul class="o-wideCardList">
									<?php
									
										$taxonomy_slug = 'learn_tag'; // タクソノミーのスラッグを指定
										$post_type_slug = 'learn'; // 投稿タイプのスラッグを指定
										$post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定
										if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
											$terms_slug = array(); // 配列のセット
											foreach( $post_terms as $value ){ // 配列の作成
												$terms_slug[] = $value->slug; // タームのスラッグを配列に追加
											}
										}

										$args = array(
											'post_type' => $post_type_slug, // 投稿タイプを指定
											'posts_per_page' => 4, // 表示件数を指定
											'orderby' =>  'rand', // ランダムに投稿を取得
											'post__not_in' => array($post->ID), // 現在の投稿を除外
											'tax_query' => array( // タクソノミーパラメーターを使用
												array(
													'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
													'field' => 'slug', // スラッグに一致するタームを返す
													'terms' => $terms_slug // タームの配列を指定
												)
											)
										);
										
										$the_query = new WP_Query($args); 
										
										if($the_query->have_posts()):while ($the_query->have_posts()): $the_query->the_post(); 

										if ( has_post_thumbnail() ) {
											$thumbnail =  get_the_post_thumbnail();
										} 

										if(empty($thumbnail)){
											$thumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
										}
									
										$termType = get_post_taxonomies(get_the_ID());
										$term = get_the_terms($post->ID, $termType[1]);
									?>
									<li class="m-wideCard">
										<a class="m-wideCard__inner" href="<?php the_permalink() ?>">
											<div class="m-wideCard__inner__left">
												<div class="m-wideCard__inner__left__image">
													<img class="m-wideCard__inner__left__image__inner" src="<?= $thumbnail ?>" alt="">
												</div>
											</div>
											<div class="m-wideCard__inner__right">
												<time class="m-wideCard__inner__right__date"><?php the_time('Y.n.j') ?></time>
												<h2 class="m-wideCard__inner__right__title"><?php the_title_attribute(); ?></h2>
												<div class="m-wideCard__inner__right__description">
													<div class="m-wideCard__inner__right__description__text"><?php the_excerpt() ?></div>
												</div>
												<div class="m-classificationArea">
													<?php	if($term): foreach ($term as $tag ): ?>
														<object>
															<a class="m-classificationArea__tag" href="<?= get_category_link($tag->term_id); ?>">
																<?= $tag->name?>
															</a>
														</object>
													<?php  endforeach; endif; ?>
												</div>
											</div>
										</a>
									</li>
									<?php endwhile; wp_reset_postdata();  endif; ?>
								</ul>
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
