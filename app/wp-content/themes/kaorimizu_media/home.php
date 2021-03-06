<?php
	global $cssName;
	global $scriptName;
	$cssName = "home";
	$scriptName = "home";
	get_header();
?>
<main class="p-top">

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
				$post_type_slug_kv = array(
					'feature','hobby','life', // 投稿タイプのスラッグを指定
				);

				$args = array(
					'post_type' => $post_type_slug_kv, // 投稿タイプを指定
					'posts_per_page' => 5, // 表示件数を指定
					'orderby' =>  'DESC', // 新着順
				);

				$slider_query = new WP_Query($args);
				if($slider_query->have_posts()):
				while ($slider_query->have_posts()): $slider_query->the_post();

				// サムネイルID
				if ( has_post_thumbnail($post->ID) ) {
					$topSliderThumbnail = get_the_post_thumbnail_url($post->ID);
				} else {
					$topSliderThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
				};

				//
				$postType = get_post_type_object($post->post_type);
				$postLabel = $postType->label;

				//タグを取得
				$term = search_tags($post->ID);
			?>
			<li class="m-squareCard">
				<a class="m-squareCard__inner" href="<?php the_permalink($post) ?>">
					<div class="m-squareCard__inner__topper">
						<img class="m-squareCard__inner__topper__image" src="<?= $topSliderThumbnail ?>" alt="">
					</div>
					<div class="m-squareCard__inner__footer">
						<div class="m-squareCard__inner__footer__sign">
							<div class="m-squareCard__inner__footer__sign__text"><?= $postLabel ?></div>
						</div>
						<div class="m-squareCard__inner__footer__title">
							<p class="m-squareCard__inner__footer__title__text"><?= $post->post_title ?></p>
						</div>
						<div class="m-squareCard__inner__footer__description">
							<div class="m-squareCard__inner__footer__description__text">
								<?= get_the_custom_excerpt( $post->post_content, 45 ) ?>
							</div>
						</div>
						<div class="m-squareCard__inner__footer__classification">
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
					</div>
				</a>
			</li>
			<?php endwhile; wp_reset_postdata(); endif; ?>
		</ul>
		<!-- <div class="p-top__kv__cover"></div> -->
	</section>

	<!--latest & ranking-->
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

					if($newPost->have_posts()): while($newPost->have_posts()): $newPost->the_post();

					if ( has_post_thumbnail(get_the_ID()) ) {
						$topLatestThumbnail =  get_the_post_thumbnail_url();
					} else {
						$topLatestThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
					};

					//タグを取得
					$term = search_tags(get_the_ID());
				?>
				<li class="m-wideCard">
					<a class="m-wideCard__inner" href="<?php the_permalink() ?>">
						<div class="m-wideCard__inner__left">
							<div class="m-wideCard__inner__left__image">
								<img class="m-wideCard__inner__left__image__inner" src="<?= $topLatestThumbnail ?>" alt="">
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
								<div class="m-wideCard__inner__right__description__text">
									<?= get_the_custom_excerpt( the_excerpt(), 100 ) ?>
								</div>
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
	  //top部分
		$post_type_slug_topFeature = array(
			'feature', // 投稿タイプのスラッグを指定
		);
		$args_topFeature = array(
			'post_type' => $post_type_slug_topFeature, // 投稿タイプを指定
			'posts_per_page' => 1, // 表示件数を指定
			'orderby' =>  'DESC', // 新着順
		);
		$topFeature_query = new WP_Query($args_topFeature);

		//topFeatureのIDを保存
		$topFeatureId = $topFeature_query->posts[0]->ID;

		//スライダー部分
		$args_topFeatureList = [
			'post_type' => 'feature',
			'posts_per_page' => 5,
			'post__not_in' => array($topFeatureId),
			'paged' => $paged,
		];
		$query_topFeatureList = new WP_Query($args_topFeatureList);

		if($topFeature_query->have_posts()):
	?>
	<section class="p-top__featureHobby">
		<?php if(count($query_topFeatureList->posts) > 0): ?>
			<?php if(count($query_topFeatureList->posts) < 5):?>
				<div class="p-top__featureHobby__bg fewArticle"></div>
			<?php else: ?>
				<div class="p-top__featureHobby__bg"></div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="m-titleBorder">
			<span class="m-titleBorder__icon">
				<img class="m-titleBorder__icon__image feature" src="<?= assetsPath('img') ?>icon/home/icon-feature.svg" alt="特集">
			</span>
			<div class="m-titleBorder__main">
				<div class="m-titleBorder__main__text">特集<small>Feature</small></div>
				<div class="m-titleBorder__main__border"></div>
			</div>
		</div>
		<?php
			while ($topFeature_query->have_posts()): $topFeature_query->the_post();

			// サムネイルID
			if ( has_post_thumbnail($post->ID)) {
				$topFeatureThumbnail =  get_the_post_thumbnail_url($post->ID);
			} else {
				$topFeatureThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
			};

			//タグを取得
			$term = get_the_terms($post->ID, 'feature_tag');
		?>
		<div class="p-top__featureHobby__topper">
			<div class="p-top__featureHobby__topper__bg"></div>
			<div class="m-oblongCard">
				<a class="m-oblongCard__inner" href="<?php the_permalink($post) ?>" alt="">
					<div class="m-oblongCard__inner__topper">
						<img class="m-oblongCard__inner__topper__image" src="<?= $topFeatureThumbnail ?>" alt="">
					</div>
					<div class="m-oblongCard__inner__footer">
						<div class="m-oblongCard__inner__footer__topper">
							<time class="m-oblongCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
							<?php if(article_new_arrival($post)): ?>
								<p class="m-oblongCard__inner__footer__topper__new">NEW</p>
							<?php endif; ?>
						</div>
						<div class="m-oblongCard__inner__footer__title">
							<p class="m-oblongCard__inner__footer__title__text"><?= $post->post_title ?></p>
						</div>
						<div class="m-oblongCard__inner__footer__description">
							<p class="m-oblongCard__inner__footer__description__text">
								<?= get_the_custom_excerpt( $post->post_content, 100 ) ?>
							</p>
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
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); endif; ?>

		<?php
			if($query_topFeatureList->have_posts()):
		?>
		<?php if(count($query_topFeatureList->posts) < 5):?>
		<div class="p-top__featureHobby__list">
			<ul class="p-top__featureHobby__list__inner">

				<?php
					while($query_topFeatureList->have_posts()): $query_topFeatureList->the_post();

					if ( has_post_thumbnail($post->ID)) {
						$topFeatureListThumbnail =  get_the_post_thumbnail_url();
					} else {
						$topFeatureListThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
					};

					$term = get_the_terms($post->ID, 'feature_tag');
				?>
				<li class="m-verticallyCard">
					<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
						<div class="m-verticallyCard__inner__topper">
							<div class="m-verticallyCard__inner__topper__image">
								<img class="m-verticallyCard__inner__topper__image__inner" src="<?= $topFeatureListThumbnail ?>" alt="">
							</div>
						</div>
						<div class="m-verticallyCard__inner__footer">
							<div class="m-verticallyCard__inner__footer__topper">
								<time class="m-verticallyCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
								<?php if(article_new_arrival($post)): ?>
									<p class="m-verticallyCard__inner__footer__topper__new">NEW</p>
								<?php endif; ?>
							</div>
							<div class="m-verticallyCard__inner__footer__title"><?php the_title_attribute(); ?></div>
							<div class="m-verticallyCard__inner__footer__description">
								<div class="m-verticallyCard__inner__footer__description__text">
									<?= get_the_custom_excerpt( the_excerpt(), 100 ) ?>
								</div>
							</div>
							<div class="m-classificationArea">
							<?php	if($term): foreach ($term as $tag ): ?>
								<object>
									<a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
										<?= $tag->name?>
									</a>
								</object>
							<?php endforeach; endif; ?>
							</div>
						</div>
					</a>
				</li>
				<?php endwhile; wp_reset_postdata();?>
			</ul>
		</div>
		<?php else: ?>
		<div class="p-top__featureHobby__slider">
			<?php if($query_topFeatureList->have_posts()): ?>
			<div class="p-top__featureHobby__slider__arrow js__arrow-top__feature">
				<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
				<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
			</div>
			<?php endif; ?>
			<ul class="p-top__featureHobby__slider__inner js-slickSlider-top__feature">
				<?php
					while($query_topFeatureList->have_posts()): $query_topFeatureList->the_post();

					if ( has_post_thumbnail($post->ID)) {
						$topFeatureListThumbnail =  get_the_post_thumbnail_url();
					} else {
						$topFeatureListThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
					};

					$term = get_the_terms($post->ID, 'feature_tag');

				?>
				<li class="m-verticallyCard">
					<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
						<div class="m-verticallyCard__inner__topper">
							<div class="m-verticallyCard__inner__topper__image">
								<img class="m-verticallyCard__inner__topper__image__inner" src="<?= $topFeatureListThumbnail ?>" alt="">
							</div>
						</div>
						<div class="m-verticallyCard__inner__footer">
							<div class="m-verticallyCard__inner__footer__topper">
								<time class="m-verticallyCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
								<?php if(article_new_arrival($post)): ?>
									<p class="m-verticallyCard__inner__footer__topper__new">NEW</p>
								<?php endif; ?>
							</div>
							<div class="m-verticallyCard__inner__footer__title"><?php the_title_attribute(); ?></div>
							<div class="m-verticallyCard__inner__footer__description">
								<div class="m-verticallyCard__inner__footer__description__text">
									<?= get_the_custom_excerpt( the_excerpt(), 100 ) ?>
								</div>
							</div>
							<div class="m-classificationArea">
							<?php	if($term): foreach ($term as $tag ): ?>
									<object>
										<a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
											<?= $tag->name?>
										</a>
									</object>
								<?php endforeach; endif; ?>
							</div>
						</div>
					</a>
				</li>
				<?php endwhile; wp_reset_postdata();?>
			</ul>
		</div>
		<?php endif; ?>
		<?php if($query_topFeatureList->have_posts()): ?>
		<div class="p-top__featureHobby__footer"><a class="p-top__featureHobby__footer__link" href="<?= site_url('feature/') ?>"><span class="icon-btn"></span>
			<p class="p-top__featureHobby__footer__link__text">記事一覧を見る</p></a>
		</div>
		<?php endif; ?>
	</section>
	<?php endif; ?>
		<!-- hobby-->
	<?php
		//top部分
		$post_type_slug_topHobby = array(
			'hobby', // 投稿タイプのスラッグを指定
		);
		$args_topHobby = array(
			'post_type' => $post_type_slug_topHobby, // 投稿タイプを指定
			'posts_per_page' => 1, // 表示件数を指定
			'orderby' =>  'DESC', // 新着順
		);
		$topHobby_query = new WP_Query($args_topHobby);

		//topHobbyのIDを保存
		$topHobbyId = $topHobby_query->posts[0]->ID;

		//スライダー部分
		$args_topHobbyList = [
			'post_type' => 'hobby',
			'posts_per_page' => 5,
			'post__not_in' => array($topHobbyId),
			'paged' => $paged,
		];
		$query_topHobbyList = new WP_Query($args_topHobbyList);

		if($topHobby_query->have_posts()):
	?>
	<section class="p-top__featureHobby">
		<?php if(count($query_topHobbyList->posts) > 0 ):?>
			<?php if(count($query_topHobbyList->posts) < 5):?>
				<div class="p-top__featureHobby__bg fewArticle"></div>
			<?php else: ?>
				<div class="p-top__featureHobby__bg"></div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="m-titleBorder">
			<span class="m-titleBorder__icon">
				<img class="m-titleBorder__icon__image hobby" src="<?= assetsPath('img') ?>icon/home/icon-hobby.svg" alt="趣味">
			</span>
			<div class="m-titleBorder__main">
				<div class="m-titleBorder__main__text">趣味<small>Hobby</small></div>
				<div class="m-titleBorder__main__border"></div>
			</div>
		</div>
		<?php
			while ($topHobby_query->have_posts()): $topHobby_query->the_post();

			// サムネイルID
			if ( has_post_thumbnail($post->ID)) {
				$topHobbyThumbnail =  get_the_post_thumbnail_url($post->ID);
			} else {
				$topHobbyThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
			};

			//タグを取得
			$term = get_the_terms($post->ID, 'hobby_tag');

		?>
		<div class="p-top__featureHobby__topper">
			<div class="p-top__featureHobby__topper__bg"></div>
			<div class="m-oblongCard">
				<a class="m-oblongCard__inner" href="<?php the_permalink($post) ?>" alt="">
					<div class="m-oblongCard__inner__topper">
						<img class="m-oblongCard__inner__topper__image" src="<?= $topHobbyThumbnail ?>" alt="">
					</div>
					<div class="m-oblongCard__inner__footer">
						<div class="m-oblongCard__inner__footer__topper">
							<time class="m-oblongCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
							<?php if(article_new_arrival($post)): ?>
								<p class="m-oblongCard__inner__footer__topper__new">NEW</p>
							<?php endif; ?>
						</div>
						<div class="m-oblongCard__inner__footer__title">
							<p class="m-oblongCard__inner__footer__title__text"><?= $post->post_title ?></p>
						</div>
						<div class="m-oblongCard__inner__footer__description">
							<p class="m-oblongCard__inner__footer__description__text">
								<?= get_the_custom_excerpt( $post->post_content, 100 ) ?>
							</p>
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
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); endif; ?>

		<?php
			if($query_topHobbyList->have_posts()):
		?>
		<?php if(count($query_topHobbyList->posts) < 5):?>
		<div class="p-top__featureHobby__list">
			<ul class="p-top__featureHobby__list__inner">

				<?php
					while($query_topHobbyList->have_posts()): $query_topHobbyList->the_post();

					if ( has_post_thumbnail($post->ID)) {
						$topHobbyListThumbnail =  get_the_post_thumbnail_url();
					} else {
						$topHobbyListThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
					};

					$term = get_the_terms($post->ID, 'hobby_tag');
				?>
				<li class="m-verticallyCard">
					<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
						<div class="m-verticallyCard__inner__topper">
							<div class="m-verticallyCard__inner__topper__image">
								<img class="m-verticallyCard__inner__topper__image__inner" src="<?= $topHobbyListThumbnail ?>" alt="">
							</div>
						</div>
						<div class="m-verticallyCard__inner__footer">
							<div class="m-verticallyCard__inner__footer__topper">
								<time class="m-verticallyCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
								<?php if(article_new_arrival($post)): ?>
									<p class="m-verticallyCard__inner__footer__topper__new">NEW</p>
								<?php endif; ?>
							</div>
							<div class="m-verticallyCard__inner__footer__title"><?php the_title_attribute(); ?></div>
							<div class="m-verticallyCard__inner__footer__description">
								<div class="m-verticallyCard__inner__footer__description__text">
									<?= get_the_custom_excerpt( the_excerpt(), 100 ) ?>
								</div>
							</div>
							<div class="m-classificationArea">
							<?php	if($term): foreach ($term as $tag ): ?>
								<object>
									<a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
										<?= $tag->name?>
									</a>
								</object>
							<?php endforeach; endif; ?>
							</div>
						</div>
					</a>
				</li>
				<?php endwhile; wp_reset_postdata();?>
			</ul>
		</div>
		<?php else: ?>
		<div class="p-top__featureHobby__slider">
			<?php if($query_topHobbyList->have_posts()): ?>
			<div class="p-top__featureHobby__slider__arrow js__arrow-top__hobby">
				<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
				<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
			</div>
			<?php endif; ?>
			<ul class="p-top__featureHobby__slider__inner js-slickSlider-top__hobby">
				<?php
					while($query_topHobbyList->have_posts()): $query_topHobbyList->the_post();

					if ( has_post_thumbnail($post->ID)) {
						$topHobbyListThumbnail =  get_the_post_thumbnail_url();
					} else {
						$topHobbyListThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
					};

					$term = get_the_terms($post->ID, 'hobby_tag');

				?>
				<li class="m-verticallyCard">
					<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
						<div class="m-verticallyCard__inner__topper">
							<div class="m-verticallyCard__inner__topper__image">
								<img class="m-verticallyCard__inner__topper__image__inner" src="<?= $topHobbyListThumbnail ?>" alt="">
							</div>
						</div>
						<div class="m-verticallyCard__inner__footer">
							<div class="m-verticallyCard__inner__footer__topper">
								<time class="m-verticallyCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
								<?php if(article_new_arrival($post)): ?>
									<p class="m-verticallyCard__inner__footer__topper__new">NEW</p>
								<?php endif; ?>
							</div>
							<div class="m-verticallyCard__inner__footer__title"><?php the_title_attribute(); ?></div>
							<div class="m-verticallyCard__inner__footer__description">
								<div class="m-verticallyCard__inner__footer__description__text">
									<?= get_the_custom_excerpt( the_excerpt(), 100 ) ?>
								</div>
							</div>
							<div class="m-classificationArea">
							<?php	if($term): foreach ($term as $tag ): ?>
									<object>
										<a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
											<?= $tag->name?>
										</a>
									</object>
								<?php endforeach; endif; ?>
							</div>
						</div>
					</a>
				</li>
				<?php endwhile; wp_reset_postdata();?>
			</ul>
		</div>
		<?php endif; ?>
		<?php if($query_topHobbyList->have_posts()): ?>
		<div class="p-top__featureHobby__footer"><a class="p-top__featureHobby__footer__link" href="<?= site_url('hobby/') ?>"><span class="icon-btn"></span>
			<p class="p-top__featureHobby__footer__link__text">記事一覧を見る</p></a>
		</div>
		<?php endif; ?>
	</section>
	<?php endif; ?>


	<!-- life-->
	<?php
		$topLifeArgs = [
			'post_type' => 'life',
			'posts_per_page' => 6,
			'paged' => $paged,
		];
		$query = new WP_Query($topLifeArgs);
		if($query->have_posts()):
	?>
	<section class="p-top__lifeLearn">
		<div class="m-titleBorder">
			<span class="m-titleBorder__icon">
				<img class="m-titleBorder__icon__image life" src="<?= assetsPath('img') ?>icon/home/icon-life.svg" alt="生活">
			</span>
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

						if ( has_post_thumbnail($post->ID)) {
							$topLifeListThumbnail =  get_the_post_thumbnail_url();
						} else {
							$topLifeListThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
						};
					?>
					<li class="m-verticallyCard">
						<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
							<div class="m-verticallyCard__inner__topper">
								<div class="m-verticallyCard__inner__topper__image">
									<img class="m-verticallyCard__inner__topper__image__inner" src="<?= $topLifeListThumbnail ?>" alt="">
								</div>
							</div>
							<div class="m-verticallyCard__inner__footer">
								<div class="m-verticallyCard__inner__footer__topper">
									<time class="m-verticallyCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
									<?php if(article_new_arrival($post)): ?>
										<p class="m-verticallyCard__inner__footer__topper__new">NEW</p>
									<?php endif; ?>
								</div>
								<div class="m-verticallyCard__inner__footer__title"><?php the_title_attribute(); ?></div>
								<div class="m-verticallyCard__inner__footer__description">
									<div class="m-verticallyCard__inner__footer__description__text">
										<?= get_the_custom_excerpt( the_excerpt(), 100 ) ?>
									</div>
								</div>
								<div class="m-classificationArea">
									<?php	if($singletags): foreach ($singletags as $tag ): ?>
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

						if ( has_post_thumbnail($post->ID)) {
							$topLifeSliderThumbnail = get_the_post_thumbnail_url();
						} else {
							$topLifeSliderThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
						};
						?>
					<li class="m-verticallyCard">
						<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
							<div class="m-verticallyCard__inner__topper">
								<div class="m-verticallyCard__inner__topper__image">
									<img class="m-verticallyCard__inner__topper__image__inner" src="<?= $topLifeSliderThumbnail ?>" alt="">
								</div>
							</div>
							<div class="m-verticallyCard__inner__footer">
								<div class="m-verticallyCard__inner__footer__topper">
									<time class="m-verticallyCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
									<?php if(article_new_arrival($post)): ?>
										<p class="m-verticallyCard__inner__footer__topper__new">NEW</p>
									<?php endif; ?>
								</div>
								<div class="m-verticallyCard__inner__footer__title"><?php the_title_attribute(); ?></div>
								<div class="m-verticallyCard__inner__footer__description">
									<div class="m-verticallyCard__inner__footer__description__text">
										<?= get_the_custom_excerpt( the_excerpt(), 100 ) ?>
									</div>
								</div>
								<div class="m-classificationArea">
									<?php	if($singletags): foreach ($singletags as $tag ): ?>
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
		<div class="p-top__lifeLearn__footer">
			<a class="p-top__lifeLearn__footer__link" href="<?= site_url('life/') ?>"><span class="icon-btn"></span>
			<p class="p-top__lifeLearn__footer__link__text">記事一覧を見る</p></a>
		</div>
	</section>
	<?php endif; ?>

	<!-- learn-->
	<?php
		$topLearnArgs = [
			'post_type' => 'learn',
			'posts_per_page' => 6,
			'paged' => $paged,
		];
		$query = new WP_Query($topLearnArgs);
		if($query->have_posts()):
	?>
	<section class="p-top__lifeLearn">
		<div class="m-titleBorder">
			<span class="m-titleBorder__icon">
				<img class="m-titleBorder__icon__image learn" src="<?= assetsPath('img') ?>icon/home/icon-learn.svg" alt="学び">
			</span>
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

						if ( has_post_thumbnail($post->ID)) {
							$topLearnListThumbnail =  get_the_post_thumbnail_url();
						} else {
							$topLearnListThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
						};

						?>
					<li class="m-verticallyCard">
						<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
							<div class="m-verticallyCard__inner__topper">
								<div class="m-verticallyCard__inner__topper__image">
									<img class="m-verticallyCard__inner__topper__image__inner" src="<?= $topLearnListThumbnail ?>" alt="">
								</div>
							</div>
							<div class="m-verticallyCard__inner__footer">
								<div class="m-verticallyCard__inner__footer__topper">
									<time class="m-verticallyCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
									<?php if(article_new_arrival($post)): ?>
										<p class="m-verticallyCard__inner__footer__topper__new">NEW</p>
									<?php endif; ?>
								</div>
								<div class="m-verticallyCard__inner__footer__title"><?php the_title_attribute(); ?></div>
								<div class="m-verticallyCard__inner__footer__description">
									<div class="m-verticallyCard__inner__footer__description__text">
										<?= get_the_custom_excerpt( the_excerpt(), 100 ) ?>
									</div>
								</div>
								<div class="m-classificationArea">
									<?php	if($singletags): foreach ($singletags as $tag ): ?>
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

					if ( has_post_thumbnail($post->ID)) {
						$topLearnSliderThumbnail =  get_the_post_thumbnail_url();
					} else {
						$topLearnSliderThumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
					};
				?>
				<li class="m-verticallyCard">
					<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
						<div class="m-verticallyCard__inner__topper">
							<div class="m-verticallyCard__inner__topper__image">
								<img class="m-verticallyCard__inner__topper__image__inner" src="<?= $topLearnSliderThumbnail ?>" alt="">
							</div>
						</div>
						<div class="m-verticallyCard__inner__footer">
							<div class="m-verticallyCard__inner__footer__topper">
								<time class="m-verticallyCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
								<?php if(article_new_arrival($post)): ?>
									<p class="m-verticallyCard__inner__footer__topper__new">NEW</p>
								<?php endif; ?>
							</div>
							<div class="m-verticallyCard__inner__footer__title"><?php the_title_attribute(); ?></div>
							<div class="m-verticallyCard__inner__footer__description">
								<div class="m-verticallyCard__inner__footer__description__text"><?= get_the_custom_excerpt( the_excerpt(), 100 ) ?></div>
							</div>
							<div class="m-classificationArea">
								<?php	if($singletags): foreach ($singletags as $tag ): ?>
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
    $taxonomies = array(
      'feature_tag',
      'hobby_tag',
      'life_tag',
      'learn_tag',
    );

    $args = array(
      'orderby'       => 'name',
      'order'         => 'ASC',
      'hide_empty'    => true,
      'exclude'       => array(),
      'exclude_tree'  => array(),
      'include'       => array(),
      'number'        => '',
      'fields'        => 'all',
      'slug'          => '',
      'parent'        => '',
      'hierarchical'  => true,
      'child_of'      => 0,
      'childless'     => false,
      'get'           => '',
      'name__like'    => '',
      'description__like' => '',
      'pad_counts'    => false,
      'offset'        => '',
      'search'        => '',
      'cache_domain'  => 'core'
    );

    $popularTags = get_terms($taxonomies, $args);

    usort($popularTags,"sort_count");

    $rankingPopularTags = array_slice($popularTags,0,10);

		if(count($rankingPopularTags) > 0):


		$termsNameList = [];
		foreach ($rankingPopularTags as $termsName) {
			array_push($termsNameList,$termsName->name);
		}
		$uniqueTermsNameList = array_unique($termsNameList);
	?>
	<section class="p-top__keyword">
		<div class="p-top__keyword__header">
			<div class="p-top__keyword__header__subtitle">Keywords</div>
			<div class="p-top__keyword__header__tilte">人気のワード</div>
		</div>
		<ul class="o-classificationList">
			<?php foreach($uniqueTermsNameList as $uniqueTermsName): ?>
				<li class="o-classificationList__tag">
					<a class="o-classificationList__tag__link" href="<?= home_url() .'?s=' .$uniqueTermsName ?>">
						<p class="o-classificationList__tag__link__inner"><?= $uniqueTermsName ?></p>
					</a>
				</li>
			<?php endforeach;?>
		</ul>
	</section>
	<?php endif; ?>
</main>
<?php get_footer() ?>
