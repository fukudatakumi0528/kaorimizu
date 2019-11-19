<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "article/post";
	$breadcrumb = '<li><a href="/column/">コラム</a></li><li>'.get_the_title().'</li>';
	get_header();

	//前後の記事取得
	$next_post = get_next_post();
	if($next_post){
		$next_post_ID = $next_post->ID;
		$next_post_thumb = get_the_post_thumbnail_url($next_post_ID);
		$next_post_url = get_permalink($next_post_ID);
		$next_post_time = get_the_time('Y.n.j', $next_post_ID);	
	};

	$prev_post = get_previous_post();
	if($prev_post) {
		$prev_post_ID = $prev_post->ID;
		$prev_post_thumb = get_the_post_thumbnail_url($prev_post_ID);
		$prev_post_url = get_permalink($prev_post_ID);
		$prev_post_time = get_the_time('Y.n.j', $prev_post_ID);	
	};

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
											<a class="o-classificationList__tag__link" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
												<p class="o-classificationList__tag__link__inner"><?= $tag->name?></p>
											</a>
										</li>
									<?php  endforeach;  endif; ?>
								</ul>
							</div>
							<a class="anl_post_footer" href="https://finbee.jp?utm_source=be-topia&utm_medium=anl_post_footer&utm_campaign=<?= $_SERVER["REQUEST_URI"]; ?>" target= _blank>
								<img class="anl_post_footer__image" src="<?php echo assetsPath('img') . "/common/bnr.jpg" ?>" alt="">
							</a>
							<div class="article__sns">
								<p>この記事をシェアする</p>
								<?php get_template_part('element/sns') ?>
							</div>
							<div class="article__border"></div>
							<div class="article__prevnext">
								<?php if($prev_post): ?>
									<a class="article__prevnext__main" href="<?= $prev_post_url ?>">
										<div class="article__prevnext__main__button prev">
											<span class="icon-head prev"></span>
										</div>
										<div class="article__prevnext__main__content">
											<div class="article__prevnext__main__content__topper">
												<p class="article__prevnext__main__content__topper__text prev">前の記事</p>
											</div>
											<div class="article__prevnext__main__content__footer">
												<div class="article__prevnext__main__content__footer__image">
													<img class="article__prevnext__main__content__footer__image__inner" src="<?= $prev_post_thumb ?>"></img>
												</div>
												<p class="article__prevnext__main__content__footer__title"><?= get_the_title($prev_post_ID) ?></p>
											</div>
										</div>
									</a>
								<?php else: ?>
									<div class="article__prevnext__main empty">
									</div>
								<?php endif; ?>
								<?php if($next_post): ?>
									<a class="article__prevnext__main" href="<?= $next_post_url ?>">
										<div class="article__prevnext__main__content">
											<div class="article__prevnext__main__content__topper">
												<p class="article__prevnext__main__content__topper__text next">次の記事</p>
											</div>
											<div class="article__prevnext__main__content__footer">
												<div class="article__prevnext__main__content__footer__image">
													<img class="article__prevnext__main__content__footer__image__inner" src="<?= $next_post_thumb ?>"></img>
												</div>
												<p class="article__prevnext__main__content__footer__title"><?= get_the_title($next_post_ID) ?></p>
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
							<?php if(get_field('related_writer')): ?>
								<div class="article__writer">
									<ul class="article__writer_list">
										<?php
											$writers_id = get_field('related_writer');
											foreach($writers_id as $writer_id):
												$writerthumb = get_the_post_thumbnail_url($writer_id, 'large');
										?>
											<li class="article__writer_item">
												<figure style="background-image: url(<?php echo $writerthumb ?>)"></figure>
												<div>
													<h2><?php the_field('writer_name', $writer_id); ?></h2>
													<?php if(get_field('writer_position', $writer_id)): ?>
														<b><?php the_field('writer_position', $writer_id); ?></b>
													<?php endif; ?>
													<p><?php the_field('writer_text', $writer_id); ?></p>
													<?php if(get_field('writer_instagram', $writer_id) || get_field('writer_twitter', $writer_id) || get_field('writer_facebook', $writer_id)): ?>
														<ul class="article__writer_item_sns">
															<?php if(get_field('writer_instagram', $writer_id)): ?>
																<li class="-ig"><a href="<?php the_field('writer_instagram', $writer_id) ?>" target="_blank"></a></li>
															<?php endif; ?>
															<?php if(get_field('writer_twitter', $writer_id)): ?>
																<li class="-tw"><a href="<?php the_field('writer_twitter', $writer_id) ?>" target="_blank"></a></li>
															<?php endif; ?>
															<?php if(get_field('writer_facebook', $writer_id)): ?>
																<li class="-fb"><a href="<?php the_field('writer_facebook', $writer_id) ?>" target="_blank"></a></li>
															<?php endif; ?>
														</ul>
													<?php endif; ?>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<!-- 関連記事がある場合 -->
							<?php
							
								$post_type_slug_relation = 'learn'; // 投稿タイプのスラッグを指定

								$args_relation = array(
									'post_type' => $post_type_slug_relation, // 投稿タイプを指定
									'posts_per_page' => 2, // 表示件数を指定
									'orderby' =>  'DESC', // 新着順に投稿を取得
									'post__not_in' => array($post->ID), // 現在の投稿を除外
								);

								$the_query_relation = new WP_Query($args_relation);

								if($the_query_relation->have_posts()):
							?>
							<div class="article__relation">
								<div class="m-titleBorder">
									<div class="m-titleBorder__main">
										<div class="m-titleBorder__main__text">関連記事<small>Relation</small></div>
										<div class="m-titleBorder__main__border"></div>
									</div>
								</div>

								<ul class="o-wideCardList">
									<!-- 関連記事をループ -->
									<?php
										while ($the_query_relation->have_posts()): $the_query_relation->the_post();

										if ( has_post_thumbnail() ) {
											$thumbnail =  get_the_post_thumbnail_url();
										}else{
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
												<div class="m-wideCard__inner__right__topper">
													<time class="m-wideCard__inner__right__topper__date"><?php the_time('Y.n.j') ?></time>
													<?php if(article_new_arrival($post)): ?>
														<p class="m-wideCard__inner__right__topper__new">NEW</p>
													<?php endif; ?>
												</div>
												<h2 class="m-wideCard__inner__right__title"><?php the_title_attribute(); ?></h2>
												<div class="m-wideCard__inner__right__description">
													<div class="m-wideCard__inner__right__description__text"><?php the_excerpt() ?></div>
												</div>
												<div class="m-classificationArea">
													<?php	if($term): foreach ($term as $tag ): ?>
														<object>
															<a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
																<?= $tag->name?>
															</a>
														</object>
													<?php  endforeach; endif; ?>
												</div>
											</div>
										</a>
									</li>
									<?php endwhile; wp_reset_postdata(); ?>

									<!-- PR記事をループ -->
									<?php

										$post_type_slug_PR = array(
											'feature','hobby','life','learn', // 投稿タイプのスラッグを指定
										); 

										//PR記事で除外するID一覧を作成。
										$the_query_relation_ids = [$post->ID];
										foreach($the_query_relation->posts as $post) {
											array_push($the_query_relation_ids,$post->ID);									
										}

										$args_PR = array(
											'post_type' => $post_type_slug_PR, // 投稿タイプを指定
											'posts_per_page' => 2, // 表示件数を指定
											'orderby' =>  'DESC', // 新着順に投稿を取得
											'post__not_in' => $the_query_relation_ids, // 現在の投稿と、関連記事を除外
											'tax_query' => array(
												'relation'=>'OR',
												array(
													'taxonomy' => 'feature_tag',
													'field'    => 'slug',
													'terms'    => array( 'PR' ),
												),
												array(
													'taxonomy' => 'hobby_tag',
													'field'    => 'slug',
													'terms'    => array( 'PR' ),
												),
												array(
													'taxonomy' => 'life_tag',
													'field'    => 'slug',
													'terms'    => array( 'PR' ),
												),
												array(
													'taxonomy' => 'learn_tag',
													'field'    => 'slug',
													'terms'    => array( 'PR' ),
												),
											)
										);

										$the_query_PR = new WP_Query($args_PR);

										while ($the_query_PR->have_posts()): $the_query_PR->the_post();

										if ( has_post_thumbnail() ) {
											$thumbnail =  get_the_post_thumbnail_url();
										}else{
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
												<div class="m-wideCard__inner__right__topper">
													<time class="m-wideCard__inner__right__topper__date"><?php the_time('Y.n.j') ?></time>
													<?php if(article_new_arrival($post)): ?>
														<p class="m-wideCard__inner__right__topper__new">NEW</p>
													<?php endif; ?>
												</div>
												<h2 class="m-wideCard__inner__right__title"><?php the_title_attribute(); ?></h2>
												<div class="m-wideCard__inner__right__description">
													<div class="m-wideCard__inner__right__description__text"><?php the_excerpt() ?></div>
												</div>
												<div class="m-classificationArea">
													<?php	if($term): foreach ($term as $tag ): ?>
														<object>
															<a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
																<?= $tag->name?>
															</a>
														</object>
													<?php  endforeach; endif; ?>
												</div>
											</div>
										</a>
									</li>
									<?php endwhile; wp_reset_postdata(); ?>
									
								</ul>
							</div>
							<?php else: ?>

							<!-- 関連記事が無い場合（PR記事だけを表示） -->
							<?php

								$post_type_slug_PR = array(
									'feature','hobby','life','learn', // 投稿タイプのスラッグを指定
								); 

								//PR記事で除外するID一覧を作成。
								$the_query_relation_ids = [$post->ID];
								foreach($the_query_relation->posts as $post) {
									array_push($the_query_relation_ids,$post->ID);									
								}

								$args_PR = array(
									'post_type' => $post_type_slug_PR, // 投稿タイプを指定
									'posts_per_page' => 2, // 表示件数を指定
									'orderby' =>  'DESC', // 新着順に投稿を取得
									'post__not_in' => $the_query_relation_ids, // 現在の投稿と、関連記事を除外
									'tax_query' => array(
										'relation'=>'OR',
										array(
											'taxonomy' => 'feature_tag',
											'field'    => 'slug',
											'terms'    => array( 'PR' ),
										),
										array(
											'taxonomy' => 'hobby_tag',
											'field'    => 'slug',
											'terms'    => array( 'PR' ),
										),
										array(
											'taxonomy' => 'life_tag',
											'field'    => 'slug',
											'terms'    => array( 'PR' ),
										),
										array(
											'taxonomy' => 'learn_tag',
											'field'    => 'slug',
											'terms'    => array( 'PR' ),
										),
									)
								);

								$the_query_PR = new WP_Query($args_PR);

								if($the_query_PR->have_posts()):

							?>
							<div class="article__relation">
								<div class="m-titleBorder">
									<div class="m-titleBorder__main">
										<div class="m-titleBorder__main__text">関連記事<small>Relation</small></div>
										<div class="m-titleBorder__main__border"></div>
									</div>
								</div>

								<ul class="o-wideCardList">

									<!-- PR記事をループ -->
									<?php
										while ($the_query_PR->have_posts()): $the_query_PR->the_post();

										if ( has_post_thumbnail() ) {
											$thumbnail =  get_the_post_thumbnail_url();
										}else{
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
												<div class="m-wideCard__inner__right__topper">
													<time class="m-wideCard__inner__right__topper__date"><?php the_time('Y.n.j') ?></time>
													<?php if(article_new_arrival($post)): ?>
														<p class="m-wideCard__inner__right__topper__new">NEW</p>
													<?php endif; ?>
												</div>
												<h2 class="m-wideCard__inner__right__title"><?php the_title_attribute(); ?></h2>
												<div class="m-wideCard__inner__right__description">
													<div class="m-wideCard__inner__right__description__text"><?php the_excerpt() ?></div>
												</div>
												<div class="m-classificationArea">
													<?php	if($term): foreach ($term as $tag ): ?>
														<object>
															<a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
																<?= $tag->name?>
															</a>
														</object>
													<?php  endforeach; endif; ?>
												</div>
											</div>
										</a>
									</li>
									<?php endwhile; wp_reset_postdata(); ?>
									
								</ul>
							</div>
							<?php endif; ?>

							<?php endif; ?>
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
