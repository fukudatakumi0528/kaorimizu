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
					//var_dump($slider->ID);
										 
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

					//var_dump($thumb_src);				
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
			<div class="t-sideBarPc">
				<div class="m-titleBorder">
					<div class="m-titleBorder__main">
						<div class="m-titleBorder__main__text">人気記事<small>Ranking</small></div>
						<div class="m-titleBorder__main__border"></div>
					</div>
				</div>
				<ul class="t-rankingArea__tab">
					<li class="t-rankingArea__tab__list tab-month is-active">
						<p class="t-rankingArea__tab__list__text">月間</p>
					</li>
					<li class="t-rankingArea__tab__list tab-weekly">
						<p class="t-rankingArea__tab__list__text">週間</p>
					</li>
					<li class="t-rankingArea__tab__list tab-all">
						<p class="t-rankingArea__tab__list__text">すべて</p>
					</li>
				</ul>
				<div class="t-rankingArea__slider">
					<div class="t-rankingArea__slider__arrow js__arrow-top__ranking__month is-active">
						<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
						<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
					</div>
					<div class="t-rankingArea__slider__arrow js__arrow-top__ranking__weekly">
						<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
						<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
					</div>
					<div class="t-rankingArea__slider__arrow js__arrow-top__ranking__all">
						<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
						<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
					</div>
					<ul class="t-rankingArea__slider__inner js-slickSlider-top__ranking__month is-active">
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__ranking"><span class="icon-label m-squareCard__inner__ranking__icon"><span class="path1"></span><span class="rank-1 path2"></span><span class="path3"></span></span>
																		<div class="m-squareCard__inner__ranking__rank">
																			<p class="m-squareCard__inner__ranking__rank__text"><small>No.</small><strong>1</strong></p>
																		</div>
																	</div>
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image3.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__ranking"><span class="icon-label m-squareCard__inner__ranking__icon"><span class="path1"></span><span class="rank-2 path2"></span><span class="path3"></span></span>
																		<div class="m-squareCard__inner__ranking__rank">
																			<p class="m-squareCard__inner__ranking__rank__text"><small>No.</small><strong>2</strong></p>
																		</div>
																	</div>
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image4.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__ranking"><span class="icon-label m-squareCard__inner__ranking__icon"><span class="path1"></span><span class="rank-3 path2"></span><span class="path3"></span></span>
																		<div class="m-squareCard__inner__ranking__rank">
																			<p class="m-squareCard__inner__ranking__rank__text"><small>No.</small><strong>3</strong></p>
																		</div>
																	</div>
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image5.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image1.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image2.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
					</ul>
					<ul class="t-rankingArea__slider__inner js-slickSlider-top__ranking__weekly">
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image2.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image4.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image1.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image3.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image5.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
					</ul>
					<ul class="t-rankingArea__slider__inner js-slickSlider-top__ranking__all">
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image5.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image1.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image2.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image3.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
															<li class="m-squareCard">
																<div class="m-squareCard__inner">
																	<div class="m-squareCard__inner__topper"><img class="m-squareCard__inner__topper__image" src="/assets/img/dammy/dammy-image4.jpg" alt=""></div>
																	<div class="m-squareCard__inner__footer">
																		<div class="m-squareCard__inner__footer__sign">
																			<div class="m-squareCard__inner__footer__sign__text">特集</div>
																		</div><a class="m-squareCard__inner__footer__title" href="">
																			<p class="m-squareCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p></a>
																		<div class="m-squareCard__inner__footer__description">
																			<div class="m-squareCard__inner__footer__description__text">実は毎年開催されるごとに参加人数を増やしている鳩レース。実は毎年開催されるごとに参加人数を増やしている鳩レース。</div>
																		</div>
																		<div class="m-squareCard__inner__footer__classification">
																																<div class="m-classificationArea"><a class="m-classificationArea__tag">マイナースポーツ</a><a class="m-classificationArea__tag">変わった趣味</a><a class="m-classificationArea__tag">20代から始める</a>
																																</div>
																		</div>
																	</div>
																</div>
															</li>
					</ul>
				</div>
				<div class="t-sideBarPc__keyword">
					<div class="t-sideBarPc__keyword__header">
						<div class="t-sideBarPc__keyword__header__tilte">人気のワード</div>
						<div class="t-sideBarPc__keyword__header__subtitle">Ranking</div>
					</div>
													<ul class="o-classificationList">
														<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
																<p class="o-classificationList__tag__link__inner">マイナースポーツ</p></a></li>
														<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
																<p class="o-classificationList__tag__link__inner">レアな仕事</p></a></li>
														<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
																<p class="o-classificationList__tag__link__inner">IKEA</p></a></li>
														<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
																<p class="o-classificationList__tag__link__inner">20代で始めたい</p></a></li>
														<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
																<p class="o-classificationList__tag__link__inner">マイナースポーツ</p></a></li>
														<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
																<p class="o-classificationList__tag__link__inner">レアな仕事</p></a></li>
														<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
																<p class="o-classificationList__tag__link__inner">IKEA</p></a></li>
														<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
																<p class="o-classificationList__tag__link__inner">20代で始めたい</p></a></li>
													</ul>
				</div>
				<div class="t-sideBarPc__downlord">
					<div class="t-sideBarPc__downlord__inner"><img class="t-sideBarPc__downlord__inner__image" src="/assets/img/common/footer/download.png" alt="">
						<div class="t-sideBarPc__downlord__inner__main">
							<div class="t-sideBarPc__downlord__inner__main__link">
								<button class="t-sideBarPc__downlord__inner__main__link__AppStore"><a href="https://apps.apple.com/jp/app/finbee-%E3%82%A2%E3%83%97%E3%83%AA%E3%81%A7%E8%B2%AF%E9%87%91-%E6%A5%BD%E3%81%97%E3%81%8F%E3%81%8A%E9%87%91%E3%82%92%E8%B2%AF%E3%82%81%E3%82%8B%E8%B2%AF%E9%87%91%E3%82%A2%E3%83%97%E3%83%AA/id1182852315?mt=8" style="display:inline-block;overflow:hidden;background:url(https://linkmaker.itunes.apple.com/ja-jp/badge-lrg.svg?releaseDate=2016-12-26&amp;kind=iossoftware&amp;bubble=ios_apps) no-repeat;width:135px;height:40px;"></a></button>
								<button class="t-sideBarPc__downlord__inner__main__link__GooglePlay"><a href="https://play.google.com/store/apps/details?id=jp.co.nestegg.finbee&amp;hl=ja&amp;pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1"><img alt="Google Play で手に入れよう" src="https://play.google.com/intl/ja/badges/images/generic/ja_badge_web_generic.png" width="155"></a></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- feature-->
	<section class="p-top__featureHobby">
		<div class="p-top__featureHobby__bg"></div>
							<div class="m-titleBorder"><span class="m-titleBorder__icon icon-feature"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
								<div class="m-titleBorder__main">
									<div class="m-titleBorder__main__text">特集<small>Feature</small></div>
									<div class="m-titleBorder__main__border"></div>
								</div>
							</div>
		<div class="p-top__featureHobby__topper">
			<div class="p-top__featureHobby__topper__bg"></div>
									<div class="m-oblongCard">
										<div class="m-oblongCard__inner">
											<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image2.jpg" alt=""></div>
											<div class="m-oblongCard__inner__footer">
												<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
												<div class="m-oblongCard__inner__footer__title">
													<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
												</div>
												<div class="m-oblongCard__inner__footer__description">
													<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
												</div>
												<div class="m-oblongCard__inner__footer__classification"></div>
																					<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																					</div>
											</div>
										</div>
									</div>
		</div>
		<div class="p-top__featureHobby__slider">
			<div class="p-top__featureHobby__slider__arrow js__arrow-top__feature">
				<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
				<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
			</div>
			<ul class="p-top__featureHobby__slider__inner js-slickSlider-top__feature">
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image1.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image2.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image3.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image4.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image5.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image4.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
			</ul>
		</div>
		<div class="p-top__featureHobby__footer"><a class="p-top__featureHobby__footer__link" href=""><span class="icon-btn"></span>
				<p class="p-top__featureHobby__footer__link__text">記事一覧を見る</p></a></div>
	</section>
	<!-- hobby-->
	<section class="p-top__featureHobby">
		<div class="p-top__featureHobby__bg"></div>
							<div class="m-titleBorder"><span class="m-titleBorder__icon icon-hobby"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>
								<div class="m-titleBorder__main">
									<div class="m-titleBorder__main__text">趣味<small>Hobby</small></div>
									<div class="m-titleBorder__main__border"></div>
								</div>
							</div>
		<div class="p-top__featureHobby__topper">
			<div class="p-top__featureHobby__topper__bg"></div>
									<div class="m-oblongCard">
										<div class="m-oblongCard__inner">
											<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image3.jpg" alt=""></div>
											<div class="m-oblongCard__inner__footer">
												<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
												<div class="m-oblongCard__inner__footer__title">
													<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
												</div>
												<div class="m-oblongCard__inner__footer__description">
													<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
												</div>
												<div class="m-oblongCard__inner__footer__classification"></div>
																					<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																					</div>
											</div>
										</div>
									</div>
		</div>
		<div class="p-top__featureHobby__slider">
			<div class="p-top__featureHobby__slider__arrow js__arrow-top__hobby">
				<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
				<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
			</div>
			<ul class="p-top__featureHobby__slider__inner js-slickSlider-top__hobby">
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image4.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image5.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image1.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image2.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
											<div class="m-oblongCard">
												<div class="m-oblongCard__inner">
													<div class="m-oblongCard__inner__topper"><img class="m-oblongCard__inner__topper__image" src="/assets/img/dammy/dammy-image3.jpg" alt=""></div>
													<div class="m-oblongCard__inner__footer">
														<p class="m-oblongCard__inner__footer__date">2019.08.14</p>
														<div class="m-oblongCard__inner__footer__title">
															<p class="m-oblongCard__inner__footer__title__text">【月間】鳩レースってどんなスポーツ？【マイナースポーツ特集Vol.9】鳩レースってどんなスポーツ？</p>
														</div>
														<div class="m-oblongCard__inner__footer__description">
															<p class="m-oblongCard__inner__footer__description__text">ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？ダミーテキスト実は毎年開催されるごとに参加人数を増やしている鳩レース。実際にどのようなルールで行われているかご存知ですか？</p>
														</div>
														<div class="m-oblongCard__inner__footer__classification"></div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">ビーチ</a><a class="m-classificationArea__tag" href="">日帰り旅行</a><a class="m-classificationArea__tag" href="">休日</a>
																								</div>
													</div>
												</div>
											</div>
			</ul>
		</div>
		<div class="p-top__featureHobby__footer"><a class="p-top__featureHobby__footer__link" href=""><span class="icon-btn"></span>
				<p class="p-top__featureHobby__footer__link__text">記事一覧を見る</p></a></div>
	</section>
	<!-- life-->
	<section class="p-top__lifeLearn">
							<div class="m-titleBorder"><span class="m-titleBorder__icon icon-life"><span class="path1"></span><span class="path2"></span></span>
								<div class="m-titleBorder__main">
									<div class="m-titleBorder__main__text">生活<small>Life</small></div>
									<div class="m-titleBorder__main__border"></div>
								</div>
							</div>
		<div class="p-top__lifeLearn__slider">
			<div class="p-top__lifeLearn__slider__arrow">
				<div class="p-top__lifeLearn__slider__arrow__inner js__arrow-top__life">
					<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
					<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
				</div>
			</div>
			<ul class="p-top__lifeLearn__slider__list js-slickSlider-top__life">
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image3.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image4.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image5.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image1.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image2.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image5.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
			</ul>
		</div>
		<div class="p-top__lifeLearn__footer"><a class="p-top__lifeLearn__footer__link" href=""><span class="icon-btn"></span>
				<p class="p-top__lifeLearn__footer__link__text">記事一覧を見る</p></a></div>
	</section>
	<!-- learn-->
	<section class="p-top__lifeLearn">
							<div class="m-titleBorder"><span class="m-titleBorder__icon icon-learn"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
								<div class="m-titleBorder__main">
									<div class="m-titleBorder__main__text">学び<small>Learn</small></div>
									<div class="m-titleBorder__main__border"></div>
								</div>
							</div>
		<div class="p-top__lifeLearn__slider">
			<div class="p-top__lifeLearn__slider__arrow">
				<div class="p-top__lifeLearn__slider__arrow__inner js__arrow-top__learn">
					<div class="slick-next"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
					<div class="slick-prev"><span class="icon-arrow2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
				</div>
			</div>
			<ul class="p-top__lifeLearn__slider__list js-slickSlider-top__learn">
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image2.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image3.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image1.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image4.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image3.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
											<li class="m-verticallyCard">
												<div class="m-verticallyCard__inner">
													<div class="m-verticallyCard__inner__topper"><a class="m-verticallyCard__inner__topper__image" href=""><img class="m-verticallyCard__inner__topper__image__inner" src="/assets/img/dammy/dammy-image5.jpg" alt=""></a></div>
													<div class="m-verticallyCard__inner__footer">
														<div class="m-verticallyCard__inner__footer__date">2019.08.14</div><a class="m-verticallyCard__inner__footer__title" href="">ダミー日帰りで行ける海が綺麗なビーチを探せ！ダミー日帰りで行ける海が綺麗なビーチを探せ！</a>
														<div class="m-verticallyCard__inner__footer__description">
															<div class="m-verticallyCard__inner__footer__description__text"></div>
														</div>
																								<div class="m-classificationArea"><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a><a class="m-classificationArea__tag" href="">日帰り旅行ツウな人の遊び方</a>
																								</div>
													</div>
												</div>
											</li>
			</ul>
		</div>
		<div class="p-top__lifeLearn__footer"><a class="p-top__lifeLearn__footer__link" href=""><span class="icon-btn"></span>
				<p class="p-top__lifeLearn__footer__link__text">記事一覧を見る</p></a></div>
	</section>
	<section class="p-top__keyword">
		<div class="p-top__keyword__header">
			<div class="p-top__keyword__header__subtitle">Keywords</div>
			<div class="p-top__keyword__header__tilte">人気のワード</div>
		</div>
							<ul class="o-classificationList">
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">TRIP</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">MOVIE</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">WORK</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">ART</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">TRIP</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">MOVIE</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">TRIP</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">MOVIE</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">WORK</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">ART</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">TRIP</p></a></li>
								<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
										<p class="o-classificationList__tag__link__inner">MOVIE</p></a></li>
							</ul>
	</section>
</main>
<?php get_footer() ?>
