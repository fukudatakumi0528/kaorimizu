<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "article/index";
	$breadcrumb = "<li>生活</li>";
	$currentPage = get_query_var('paged'); //現在のページ数
	$currentPage = $currentPage == 0 ? 1 : $currentPage;
	$articlePerPage = get_option('posts_per_page');//現在の表示件数
	
	$startPageNumber = $articlePerPage * ($currentPage - 1) + 1;
	$endPageNumber = $startPageNumber + $wp_query->post_count - 1;
	get_header();
?>

<main>
	<section class="p-article__topper">
		<div class="o-topperSection">
			<div class="o-topperSection__main">
				<div class="o-topperSection__main__title">
					<img class="o-topperSection__main__title__icon" src="<?php echo assetsPath('img') ?>icon/category/category-icon-life.svg" alt="生活">
					<div class="o-topperSection__main__title__text">
						<h1 class="o-topperSection__main__title__text__main">生活</h1>
						<p class="o-topperSection__main__title__text__sub">Life</p>
					</div>
				</div>
				<div class="o-topperSection__main__description">生活や仕事など、暮らしをもっと楽しくするコンテンツをお届けします。</div>
			</div>
		</div>
	</section>
	<section class="p-article__main">
		<div class="p-article__main__content">
			<?php if($wp_query->have_posts()): ?>
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
							<?php $tags = get_terms('life_tag'); ?>
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
			<?php endif; ?>
			<div class="p-article__main__content__column">
				<div class="p-article__main__content__column__result">
					<?php if($wp_query->have_posts()): ?>
					<div class="p-article__main__content__column__result__number">
						<p class="p-article__main__content__column__result__number__text"><?= wp_count_posts('life')->publish; ?>件中 <?= $startPageNumber ?>-<?= $endPageNumber ?>件を表示</p>
					</div>
					<?php else: ?>
					<div class="p-article__main__content__column__result">
						<div class="p-article__main__content__column__result__category nothing">
							<p class="p-article__main__content__column__result__category__text nothing">まだ<strong>生活</strong>カテゴリに記事はありません。</p>
						</div>
					</div>
					<?php endif;?>
				</div>		
				<div class="o-verticallyCardList">
					<?php
						if($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();

						$singletags = get_the_terms($post->ID, 'life_tag');

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
										<time class="m-verticallyCard__inner__footer__topper__date"><?php the_time('Y.n.j') ?></time>
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
												<a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name ?>">
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
								'total' => $wp_query->max_num_pages,
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
	<section class="p-article__footer">
		<?php get_template_part('ranking'); ?>
	</section>
</main>


<?php get_footer(); ?>
