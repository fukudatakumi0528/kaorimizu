<?php
	global $cssName;
	global $scriptName;
	$cssName = "article/search";

	$currentPage = get_query_var('paged'); //現在のページ数
	$currentPage = $currentPage == 0 ? 1 : $currentPage;
	$articlePerPage = get_option('posts_per_page');//現在の表示件数
	
	$startPageNumber = $articlePerPage * ($currentPage - 1) + 1;
	$endPageNumber = $startPageNumber + $wp_query->post_count - 1;

	get_header();
?>
<main>
	<section class="p-articleSearch__topper">
		<div class="o-topperSection">
			<div class="o-topperSection__main">
				<div class="o-topperSection__main__title">
				<img class="o-topperSection__main__title__icon feature" src="<?php echo assetsPath('img') ?>icon/category/category-icon-feature.svg" alt="特集">
					<div class="o-topperSection__main__title__text">
						<h1 class="o-topperSection__main__title__text__main">特集</h1>
						<p class="o-topperSection__main__title__text__sub">Feature</p>
					</div>
				</div>
				<div class="o-topperSection__main__description">ヒト・モノ・コトをテーマにコラム・インタビュー記事などをお届けします。</div>
			</div>
		</div>
	</section>
	<section class="p-articleSearch__main">
		<div class="p-articleSearch__main__content">
			<div class="p-articleSearch__main__content__refine">
				<div class="p-articleSearch__main__content__refine__inner">
					<div class="p-articleSearch__main__content__refine__inner__header js-refine__click">
						<div class="p-articleSearch__main__content__refine__inner__header__title">人気のワードから絞り込む</div>
						<div class="p-articleSearch__main__content__refine__inner__header__icon js-refine__icon">
							<span class="p-articleSearch__main__content__refine__inner__header__icon__line"></span>
							<span class="p-articleSearch__main__content__refine__inner__header__icon__line"></span>
						</div>
					</div>
					<div class="p-articleSearch__main__content__refine__inner__selectArea js-refine__selectArea">
						<ul class="o-classificationList">
							<?php $tags = get_terms('feature_tag'); ?>
								<?php	if($tags): foreach ($tags as $tag ): ?>
									<li class="o-classificationList__tag">
										<a class="o-classificationList__tag__link" href="<?= get_category_link($tag->term_id); ?>">
											<p class="o-classificationList__tag__link__inner"><?= $tag->name?></p>
										</a>
									</li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="p-articleSearch__main__content__column">
				<?php
					$termTypeQuery = get_query_var('feature_tag');
					$args = [
						'post_type' => 'feature',
						'tax_query'=> array(
							'relation' => 'OR',
							array(
								'taxonomy' => 'feature_tag',
								'field' => 'slug',
								'terms' => $termTypeQuery,									
							),
						),
						'posts_per_page' => 16,
						'paged' => $paged,
					];
					$query = new WP_Query($args);
				?>
				<div class="p-articleSearch__main__content__column__result">
					<div class="p-articleSearch__main__content__column__result__category">
						<p class="p-articleSearch__main__content__column__result__category__text"><strong>#<?= urldecode($termTypeQuery); ?></strong>の絞り込み結果</p>
					</div>
					<div class="p-articleSearch__main__content__column__result__number">
						<p class="p-articleSearch__main__content__column__result__number__text"><?= wp_count_posts('feature')->publish; ?>件中 <?= $startPageNumber ?>-<?= $endPageNumber ?>件を表示</p>
					</div>
				</div>		
				<div class="o-verticallyCardList">
					<?php
						if($query->have_posts()): while($query->have_posts()): $query->the_post();

						$singletags = get_the_terms($post->ID, 'feature_tag');

						if ( has_post_thumbnail($post->ID) ) {
							$thumbnail =  get_the_post_thumbnail_url($post->ID);
						} else {
							$thumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
						};
	
					?>
						<article class="m-verticallyCard">
							<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
								<div class="m-verticallyCard__inner__topper">
									<div class="m-verticallyCard__inner__topper__image" href="">
										<img class="m-verticallyCard__inner__topper__image__inner" src=<?= $thumbnail ?> alt="">
									</div>
								</div>
								<div class="m-verticallyCard__inner__footer">
									<div class="m-verticallyCard__inner__footer__topper">
										<time class="m-verticallyCard__inner__footer__topper__date"><?= mysql2date('Y.n.j', $post->post_date); ?></time>
										<?php if(article_new_arrival($post)): ?>
											<p class="m-verticallyCard__inner__footer__topper__new">NEW</p>
										<?php endif; ?>
									</div>
									<h2 class="m-verticallyCard__inner__footer__title" ><?php the_title_attribute(); ?></h2>
									<div class="m-verticallyCard__inner__footer__description">
										<p class="m-verticallyCard__inner__footer__description__text"><?php the_excerpt() ?></p>
									</div>
									<div class="m-classificationArea">
										<?php	if($singletags): foreach ($singletags as $tag ): ?>
											<object>
												<a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
													<?= $tag->name?>
												</a>
											</object>
										<?php  endforeach; wp_reset_postdata(); endif; ?>
									</div>
								</div>
							</a>
						</article>
					<?php endwhile; endif; ?>
				</div>
				<div class="articles__pager">
					<div class="c-pager">
						<?php
							$big = 999999999; //need an unlikely integer
							$pgArgs = [
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $query->max_num_pages,
								'prev_text' => __('前へ'),
								'next_text' => __('次へ'),
								'mid_size' => 2,
							];
							echo paginate_links_finbee($pgArgs);
							wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="p-articleSearch__main__sidebar">
			<?php get_sidebar('pc'); ?>
		</div>
	</section>
	<section class="p-articleSearch__footer">
		<?php get_template_part('ranking'); ?>
	</section>

</main>
<?php get_footer() ?>
