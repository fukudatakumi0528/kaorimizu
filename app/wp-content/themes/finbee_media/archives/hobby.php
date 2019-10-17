<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "article/index";
	$breadcrumb = "<li>趣味</li>";
	get_header();
?>

<main>
	<section class="p-article__topper">
		<div class="o-topperSection">
			<div class="o-topperSection__main">
				<div class="o-topperSection__main__title"><img class="o-topperSection__main__title__icon" src="<?php echo assetsPath('img') ?>common/icon/hobby.png" alt="">
					<div class="o-topperSection__main__title__text">
						<h1 class="o-topperSection__main__title__text__main">趣味</h1>
						<p class="o-topperSection__main__title__text__sub">Hobby</p>
					</div>
				</div>
				<div class="o-topperSection__main__description">ヒト・モノ・コトをテーマにコラム・インタビュー記事などをお届けします。</div>
			</div>
		</div>
	</section>
	<section class="p-article__main">
		<div class="p-article__main__content">
			<div class="p-article__main__content__refine">
				<div class="p-article__main__content__refine__inner">
					<div class="p-article__main__content__refine__inner__header">
						<div class="p-article__main__content__refine__inner__header__title">人気のワードから絞り込む</div>
						<div class="p-article__main__content__refine__inner__header__icon js-refine__icon">
							<span class="p-article__main__content__refine__inner__header__icon__line"></span>
							<span class="p-article__main__content__refine__inner__header__icon__line"></span>
						</div>
					</div>
					<div class="p-article__main__content__refine__inner__selectArea js-refine__selectArea">
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
			<div class="p-article__main__content__column">
				<div class="p-article__main__content__column__result">
					<div class="p-article__main__content__column__result__category">
						<p class="p-article__main__content__column__result__category__text"><strong>#マイナースポーツ</strong>の検索結果</p>
					</div>
					<div class="p-article__main__content__column__result__number">
						<p class="p-article__main__content__column__result__number__text">40件中 1-18件を表示</p>
					</div>
				</div>		
				<div class="o-verticallyCardList">
					<?php
						$args = [
							'post_type' => 'feature',
							'posts_per_page' => 6,
							'paged' => $paged,
						];
						$query = new WP_Query($args);
						if($query->have_posts()): while($query->have_posts()): $query->the_post();

						$singletags = get_the_terms($post->ID, 'feature_tag');

						if ( has_post_thumbnail() ) { // 投稿にアイキャッチ画像が割り当てられているかチェックします。
							$thumbnail =  get_the_post_thumbnail();
						} 

						if(empty($thumbnail)){
							$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
						}
					?>
						<article class="m-verticallyCard">
							<a class="m-verticallyCard__inner" href="<?php the_permalink() ?>">
								<div class="m-verticallyCard__inner__topper">
									<div class="m-verticallyCard__inner__topper__image" href="">
										<img class="m-verticallyCard__inner__topper__image__inner" src=<?= $thumbnail ?> alt="">
									</div>
								</div>
								<div class="m-verticallyCard__inner__footer">
									<time class="m-verticallyCard__inner__footer__date"><?php the_time('Y.n.j') ?></time>
									<h2 class="m-verticallyCard__inner__footer__title" ><?php the_title_attribute(); ?></h2>
									<div class="m-verticallyCard__inner__footer__description">
										<p class="m-verticallyCard__inner__footer__description__text"><?php the_excerpt() ?></p>
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
		<div class="p-article__main__sidebar">
			<?php get_sidebar('pc'); ?>
		</div>
	</section>
</main>


<?php get_footer(); ?>
