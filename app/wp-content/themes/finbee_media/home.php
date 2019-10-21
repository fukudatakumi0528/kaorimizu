<?php
	global $cssName;
	global $scriptName;
	$cssName = "home";
	$scriptName = "home";

	get_header();
?>
<main>
	<!-- kv-->
	<section class="p-top__kv">
		<div class="p-top__kv__bg">
			<div class="p-top__kv__bg__js">
				<div class="slick-next"><span class="icon-arrow"></span></div>
				<div class="slick-prev"><span class="icon-arrow"></span></div>
			</div>
		</div>
		<ul class="p-top__kv__slider js-slickSlider-top__kv">
			<?php 
				$topSlider = get_field('_top-slider', 'option');
				foreach($topSlider as $slider):
										 
					// サムネイルID
					$thumb_id = get_post_thumbnail_id($slider);
					$thumb_img = wp_get_attachment_image_src($thumb_id, 'full');
					$thumb_src = $thumb_img[0];

					//
					$postType = get_post_type_object($slider->post_type);
					$postLabel = $postType->label;

					//タグ名
					$termType = get_post_taxonomies($slider->ID);
					$term = get_the_terms($slider->ID, $termType[0]);

			?>
			<li class="m-squareCard">
				<a class="m-squareCard__inner" href="<?php the_permalink($slider) ?>">
					<div class="m-squareCard__inner__topper">
						<img class="m-squareCard__inner__topper__image" src="<?= $thumb_src ?>" alt="">
					</div>
					<div class="m-squareCard__inner__footer">
						<div class="m-squareCard__inner__footer__sign">
							<div class="m-squareCard__inner__footer__sign__text"><?= $postLabel ?></div>
						</div>
						<div class="m-squareCard__inner__footer__title">
							<p class="m-squareCard__inner__footer__title__text"><?= $slider->post_title ?></p>
						</div>
						<div class="m-squareCard__inner__footer__description">
							<div class="m-squareCard__inner__footer__description__text"><?= strip_tags($slider->post_content) ?></div>
						</div>
						<div class="m-squareCard__inner__footer__classification">
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
			<?php endforeach; ?>
		</ul>
	</section>
	<section class="p-top__latestRanking">
		<!--latest-->
		<div class="p-top__latestRanking__latest">
			<div class="m-titleBorder">
				<div class="m-titleBorder__main">
					<div class="m-titleBorder__main__text">新着<small>Latest</small></div>
					<div class="m-titleBorder__main__border"></div>
				</div>
			</div>
			<ul class="o-wideCardList">
				<?php 
					$newPostArgs = array(
						"posts_per_page" => 6,
						"post_status" => "publish",
						"post_type" => array('feature', 'hobby', 'learn', 'life'),
						"orderby" => array(
							"post_date" => "DESC"
						)
					);
					$newPost = new WP_Query($newPostArgs);

					//$singletags = get_the_terms($post->ID, 'feature_tag');

					if($newPost->have_posts()): while($newPost->have_posts()): $newPost->the_post(); 

					$termType = get_post_taxonomies(get_the_ID());
					$term = get_the_terms($post->ID, $termType[0]);
				?>
				<li class="m-wideCard">
					<div class="m-wideCard__pickup">
						<div class="m-wideCard__pickup__inner">
							<div class="m-wideCard__pickup__inner__text">NEW</div>
						</div>
					</div>
					<a class="m-wideCard__inner" href="<?php the_permalink() ?>">
						<div class="m-wideCard__inner__left">
							<div class="m-wideCard__inner__left__image">
								<img class="m-wideCard__inner__left__image__inner" src=<?= get_the_post_thumbnail() ?> alt="">
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
		<!--ranking-->
		<div class="p-top__latestRanking__ranking">
			<?php get_sidebar('pc'); ?>
		</div>
	</section>
	<!-- feature-->
	<?php 
		$topFeature = get_field('top-feature', 'option');

		$$topFeatureArgs = [
			'post_type' => 'feature',
			'posts_per_page' => 5,
			'post__not_in' => array($topFeature->ID),
			'paged' => $paged,
		];
		$query = new WP_Query($$topFeatureArgs);
		if($query->have_posts() || $topFeature):
	?>
	<section class="p-top__featureHobby">
		<div class="p-top__featureHobby__bg"></div>
		<div class="m-titleBorder"><span class="m-titleBorder__icon icon-feature"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
			<div class="m-titleBorder__main">
				<div class="m-titleBorder__main__text">特集<small>Feature</small></div>
				<div class="m-titleBorder__main__border"></div>
			</div>
		</div>
		<?php 
			$topFeature = get_field('top-feature', 'option');

			if ($topFeature):										
				// サムネイルID
				$thumb_id = get_post_thumbnail_id($topFeature);
				$thumb_img = wp_get_attachment_image_src($thumb_id, 'full');
				$thumb_src = $thumb_img[0];

				//タグ名
				$termType = get_post_taxonomies($topFeature->ID);
				$term = get_the_terms($topFeature->ID, $termType[0]);

		?>
		<div class="p-top__featureHobby__topper">
			<div class="p-top__featureHobby__topper__bg"></div>
			<div class="m-oblongCard">
				<a class="m-oblongCard__inner" href="<?php the_permalink($topFeature) ?>" alt="">
					<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="<?= $thumb_src ?>" alt=""></div>
					<div class="m-oblongCard__inner__footer">
						<p class="m-oblongCard__inner__footer__date"><?= $topFeature->post_date ?></p>
						<div class="m-oblongCard__inner__footer__title">
							<p class="m-oblongCard__inner__footer__title__text"><?= $topFeature->post_title ?></p>
						</div>
						<div class="m-oblongCard__inner__footer__description">
							<p class="m-oblongCard__inner__footer__description__text"><?= strip_tags($topFeature->post_content) ?></p>
						</div>
						<div class="m-oblongCard__inner__footer__classification"></div>
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
			</div>
		</div>
		<?php endif; ?>
		<div class="p-top__featureHobby__slider">
			<div class="p-top__featureHobby__slider__arrow js__arrow-top__feature">
				<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
				<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
			</div>
			<ul class="p-top__featureHobby__slider__inner js-slickSlider-top__feature">
				<?php
					while($query->have_posts()): $query->the_post();
					if($query !== $topFeature):

					$singletags = get_the_terms($post->ID, 'feature_tag');

					if ( has_post_thumbnail() ) {
						$thumbnail =  get_the_post_thumbnail();
					} 

					if(empty($thumbnail)){
						$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
					}
				?>
				<li class="m-oblongCard">
					<a class="m-oblongCard__inner" src="<?php the_permalink() ?>" alt="">
						<div class="m-oblongCard__inner__topper">
							<img class="m-oblongCard__inner__topper__image" src="<?= $thumbnail ?>" alt="">
						</div>
						<div class="m-oblongCard__inner__footer">
							<p class="m-oblongCard__inner__footer__date"><?php the_time('Y.n.j') ?></p>
							<div class="m-oblongCard__inner__footer__title">
								<h2 class="m-oblongCard__inner__footer__title__text"><?php the_title_attribute(); ?></h2>
							</div>
							<div class="m-oblongCard__inner__footer__description">
								<p class="m-oblongCard__inner__footer__description__text"><?php the_excerpt() ?></p>
							</div>
							<div class="m-classificationArea">
								<?php	if($singletags): foreach ($singletags as $tag ): ?>
									<object>
										<a class="m-classificationArea__tag" href="<?= get_category_link($tag->term_id); ?>">
											<?= $tag->name?>
										</a>
									</object>
								<?php endforeach; endif; ?>
							</div>
						</div>
					</a>
				</li>
				<?php endif; endwhile; wp_reset_postdata(); ?>
			</ul>
		</div>
		<div class="p-top__featureHobby__footer"><a class="p-top__featureHobby__footer__link" href="<?= site_url('feature/') ?>"><span class="icon-btn"></span>
			<p class="p-top__featureHobby__footer__link__text">記事一覧を見る</p></a>
		</div>
	</section>
	<?php endif; ?>
	<!-- hobby-->
	<?php
		$topHobby = get_field('top-hobby', 'option');

		$topHobbyArgs = [
			'post_type' => 'hobby',
			'posts_per_page' => 5,
			'post__not_in' => array($topHobby->ID),
			'paged' => $paged,
		];
		$query = new WP_Query($topHobbyArgs);
		if($query->have_posts() || $topHobby):
	?>
	<section class="p-top__featureHobby">
		<div class="p-top__featureHobby__bg"></div>
		<div class="m-titleBorder"><span class="m-titleBorder__icon icon-hobby"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>
			<div class="m-titleBorder__main">
				<div class="m-titleBorder__main__text">趣味<small>Hobby</small></div>
				<div class="m-titleBorder__main__border"></div>
			</div>
		</div>
		<?php 
			if ($topHobby):
										
				// サムネイルID
				$thumb_id = get_post_thumbnail_id($topHobby);
				$thumb_img = wp_get_attachment_image_src($thumb_id, 'full');
				$thumb_src = $thumb_img[0];

				//タグ名
				$termType = get_post_taxonomies($topHobby->ID);
				$term = get_the_terms($topHobby->ID, $termType[0]);
		?>
		<div class="p-top__featureHobby__topper">
			<div class="p-top__featureHobby__topper__bg"></div>
			<div class="m-oblongCard">
				<a class="m-oblongCard__inner" href="<?php the_permalink($topHobby) ?>" alt="">
					<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="<?= $thumb_src ?>" alt=""></div>
					<div class="m-oblongCard__inner__footer">
						<p class="m-oblongCard__inner__footer__date"><?= $topHobby->post_date ?></p>
						<div class="m-oblongCard__inner__footer__title">
							<p class="m-oblongCard__inner__footer__title__text"><?= $topHobby->post_title ?></p>
						</div>
						<div class="m-oblongCard__inner__footer__description">
							<p class="m-oblongCard__inner__footer__description__text"><?= strip_tags($topHobby->post_content) ?></p>
						</div>
						<div class="m-oblongCard__inner__footer__classification"></div>
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
			</div>
		</div>
		<?php endif; ?>

		<div class="p-top__featureHobby__slider">
			<div class="p-top__featureHobby__slider__arrow js__arrow-top__hobby">
				<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
				<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
			</div>
			<ul class="p-top__featureHobby__slider__inner js-slickSlider-top__hobby">

				<?php
					while($query->have_posts()): $query->the_post();

					$singletags = get_the_terms($post->ID, 'hobby_tag');

					if ( has_post_thumbnail() ) {
						$thumbnail =  get_the_post_thumbnail();
					} 

					if(empty($thumbnail)){
						$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
					}
				?>
				<li class="m-oblongCard">
					<a class="m-oblongCard__inner" src="<?php the_permalink() ?>" alt="">
						<div class="m-oblongCard__inner__topper">
							<img class="m-oblongCard__inner__topper__image" src="<?= $thumbnail ?>" alt="">
						</div>
						<div class="m-oblongCard__inner__footer">
							<p class="m-oblongCard__inner__footer__date"><?php the_time('Y.n.j') ?></p>
							<div class="m-oblongCard__inner__footer__title">
								<h2 class="m-oblongCard__inner__footer__title__text"><?php the_title_attribute(); ?></h2>
							</div>
							<div class="m-oblongCard__inner__footer__description">
								<p class="m-oblongCard__inner__footer__description__text"><?php the_excerpt() ?></p>
							</div>
							<div class="m-classificationArea">
								<?php	if($singletags): foreach ($singletags as $tag ): ?>
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
				<?php endwhile; wp_reset_postdata();?>

			</ul>
		</div>
		<div class="p-top__featureHobby__footer"><a class="p-top__featureHobby__footer__link" href="<?= site_url('hobby/') ?>"><span class="icon-btn"></span>
			<p class="p-top__featureHobby__footer__link__text">記事一覧を見る</p></a>
		</div>
	</section>
	<?php endif; ?>
	<!-- life-->

	<?php
		$topLifeArgs = [
			'post_type' => 'life',
			'posts_per_page' => 6,
			'paged' => $paged,
		];
		$query = new WP_Query($topLifeArgs);
		if($query->have_posts()):
	?>
	<section class="p-top__lifeLearn">
		<div class="m-titleBorder"><span class="m-titleBorder__icon icon-life"><span class="path1"></span><span class="path2"></span></span>
			<div class="m-titleBorder__main">
				<div class="m-titleBorder__main__text">生活<small>Life</small></div>
				<div class="m-titleBorder__main__border"></div>
			</div>
		</div>

		<?php if(count($query->posts) < 5): ?>
			<div class="p-top__lifeLearn__list">
				<ul class="p-top__lifeLearn__list__inner">

					<?php
						while($query->have_posts()): $query->the_post();

						$singletags = get_the_terms($post->ID, 'life_tag');

						if ( has_post_thumbnail() ) {
							$thumbnail =  get_the_post_thumbnail();
						} 

						if(empty($thumbnail)){
							$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
						}
					?>
					<li class="m-oblongCard">
						<a class="m-oblongCard__inner" src="<?php the_permalink() ?>" alt="">
							<div class="m-oblongCard__inner__topper">
								<img class="m-oblongCard__inner__topper__image" src="<?= $thumbnail ?>" alt="">
							</div>
							<div class="m-oblongCard__inner__footer">
								<p class="m-oblongCard__inner__footer__date"><?php the_time('Y.n.j') ?></p>
								<div class="m-oblongCard__inner__footer__title">
									<h2 class="m-oblongCard__inner__footer__title__text"><?php the_title_attribute(); ?></h2>
								</div>
								<div class="m-oblongCard__inner__footer__description">
									<p class="m-oblongCard__inner__footer__description__text"><?php the_excerpt() ?></p>
								</div>
								<div class="m-classificationArea">
									<?php	if($singletags): foreach ($singletags as $tag ): ?>
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
					<?php endwhile; wp_reset_postdata();?>
				</ul>
			</div>
		<?php else: ?>
			<div class="p-top__lifeLearn__slider">
				<div class="p-top__lifeLearn__slider__arrow">
					<div class="p-top__lifeLearn__slider__arrow__inner js__arrow-top__life">
						<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
						<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
					</div>
				</div>
				<ul class="p-top__lifeLearn__slider__list js-slickSlider-top__life">
					<?php
						while($query->have_posts()): $query->the_post();

						$singletags = get_the_terms($post->ID, 'life_tag');

						if ( has_post_thumbnail() ) {
							$thumbnail =  get_the_post_thumbnail();
						} 

						if(empty($thumbnail)){
							$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
						}
					?>
					<li class="m-verticallyCard">
						<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
							<div class="m-verticallyCard__inner__topper">
								<div class="m-verticallyCard__inner__topper__image">
									<img class="m-verticallyCard__inner__topper__image__inner" src="<?= $thumbnail ?>" alt="">
								</div>
							</div>
							<div class="m-verticallyCard__inner__footer">
								<div class="m-verticallyCard__inner__footer__date"><?php the_time('Y.n.j') ?></div>
								<div class="m-verticallyCard__inner__footer__title"><?php the_title_attribute(); ?></div>
								<div class="m-verticallyCard__inner__footer__description">
									<div class="m-verticallyCard__inner__footer__description__text"><?php the_excerpt() ?></div>
								</div>
								<div class="m-classificationArea">
									<?php	if($singletags): foreach ($singletags as $tag ): ?>
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
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			</div>
		<?php endif; ?>
		<div class="p-top__lifeLearn__footer">
			<a class="p-top__lifeLearn__footer__link" href="<?= site_url('life/') ?>"><span class="icon-btn"></span>
			<p class="p-top__lifeLearn__footer__link__text">記事一覧を見る</p></a>
		</div>
	</section>
	<?php endif; ?>

	<!-- learn-->
	<?php
		$topLearnArgs = [
			'post_type' => 'learn',
			'posts_per_page' => 6,
			'paged' => $paged,
		];
		$query = new WP_Query($topLearnArgs);
		if($query->have_posts()):
	?>
	<section class="p-top__lifeLearn">
		<div class="m-titleBorder"><span class="m-titleBorder__icon icon-learn"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
			<div class="m-titleBorder__main">
				<div class="m-titleBorder__main__text">学び<small>Learn</small></div>
				<div class="m-titleBorder__main__border"></div>
			</div>
		</div>
		
		<?php if(count($query->posts) < 5): ?>
			<div class="p-top__lifeLearn__list">
				<ul class="p-top__lifeLearn__list__inner">

					<?php
						while($query->have_posts()): $query->the_post();

						$singletags = get_the_terms($post->ID, 'learn_tag');

						if ( has_post_thumbnail() ) {
							$thumbnail =  get_the_post_thumbnail();
						} 

						if(empty($thumbnail)){
							$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
						}
					?>
					<li class="m-oblongCard">
						<a class="m-oblongCard__inner" src="<?php the_permalink() ?>" alt="">
							<div class="m-oblongCard__inner__topper">
								<img class="m-oblongCard__inner__topper__image" src="<?= $thumbnail ?>" alt="">
							</div>
							<div class="m-oblongCard__inner__footer">
								<p class="m-oblongCard__inner__footer__date"><?php the_time('Y.n.j') ?></p>
								<div class="m-oblongCard__inner__footer__title">
									<h2 class="m-oblongCard__inner__footer__title__text"><?php the_title_attribute(); ?></h2>
								</div>
								<div class="m-oblongCard__inner__footer__description">
									<p class="m-oblongCard__inner__footer__description__text"><?php the_excerpt() ?></p>
								</div>
								<div class="m-classificationArea">
									<?php	if($singletags): foreach ($singletags as $tag ): ?>
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
					<?php endwhile; wp_reset_postdata();?>
				</ul>
			</div>
		<?php else: ?>

		<div class="p-top__lifeLearn__slider">
			<div class="p-top__lifeLearn__slider__arrow">
				<div class="p-top__lifeLearn__slider__arrow__inner js__arrow-top__learn">
					<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
					<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
				</div>
			</div>
			<ul class="p-top__lifeLearn__slider__list js-slickSlider-top__learn">

				<?php
				  while($query->have_posts()): $query->the_post();

					$singletags = get_the_terms($post->ID, 'learn_tag');

					if ( has_post_thumbnail() ) {
						$thumbnail =  get_the_post_thumbnail();
					} 

					if(empty($thumbnail)){
						$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
					}
				?>
				<li class="m-verticallyCard">
					<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
						<div class="m-verticallyCard__inner__topper">
							<div class="m-verticallyCard__inner__topper__image">
								<img class="m-verticallyCard__inner__topper__image__inner" src="<?= $thumbnail ?>" alt="">
							</div>
						</div>
						<div class="m-verticallyCard__inner__footer">
							<div class="m-verticallyCard__inner__footer__date"><?php the_time('Y.n.j') ?></div>
							<div class="m-verticallyCard__inner__footer__title"><?php the_title_attribute(); ?></div>
							<div class="m-verticallyCard__inner__footer__description">
								<div class="m-verticallyCard__inner__footer__description__text"><?php the_excerpt() ?></div>
							</div>
							<div class="m-classificationArea">
								<?php	if($singletags): foreach ($singletags as $tag ): ?>
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
				<?php endwhile; wp_reset_postdata();?>
			</ul>
		</div>
		<?php endif; ?>
		<div class="p-top__lifeLearn__footer"><a class="p-top__lifeLearn__footer__link" href="<?= site_url('learn/') ?>"><span class="icon-btn"></span>
			<p class="p-top__lifeLearn__footer__link__text">記事一覧を見る</p></a>
		</div>
	</section>
	<?php endif;?>

	<?php 
		if(count($rankingPopularTags) > 0):
	?>
	<section class="p-top__keyword">
		<div class="p-top__keyword__header">
			<div class="p-top__keyword__header__subtitle">Keywords</div>
			<div class="p-top__keyword__header__tilte">人気のワード</div>
		</div>
		<ul class="o-classificationList">
			<?php foreach($rankingPopularTags as $rankingPopularTag): ?>
				<li class="o-classificationList__tag">
					<a class="o-classificationList__tag__link" href="">
						<p class="o-classificationList__tag__link__inner"><?= $rankingPopularTag->name ?></p>
					</a>
				</li>
			<?php endforeach;?>
		</ul>
	</section>
	<?php endif; ?>
</main>
<?php get_footer() ?>
