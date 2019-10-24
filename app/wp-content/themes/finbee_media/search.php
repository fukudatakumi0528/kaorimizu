<?php
	global $cssName;
	global $scriptName;
	$cssName = "search/index";

	$currentPage = get_query_var('paged'); //現在のページ数
	$currentPage = $currentPage == 0 ? 1 : $currentPage;
	$articlePerPage = get_option('posts_per_page');//現在の表示件数
	
	$startPageNumber = $articlePerPage * ($currentPage - 1) + 1;
	$endPageNumber = $startPageNumber + $wp_query->post_count - 1;

	get_header();
?>
<main>
	<section class="p-search__topper">
    <form class="m-inputSearch" id="form" action="<?php echo esc_url( home_url() ); ?>" method="get">
      <input class="m-inputSearch__input" id="s-box" name="s" type="text" placeholder="気になるワードを入力してください。">
      <button class="icon-search" type="submit" id="s-btn-area"></button>
    </form>
	</section>
	<section class="p-search__main">
		<div class="p-search__main__content">
			<div class="p-search__main__content__column">
        <?php if(have_posts() && get_search_query()): ?>         
				<div class="p-search__main__content__column__result">
					<div class="p-search__main__content__column__result__category">
						<p class="p-search__main__content__column__result__category__text"><strong><?= urldecode($termTypeQuery); ?><?php the_search_query(); ?></strong>の検索結果</p>
          </div>
          <div class="p-search__main__content__column__result__number">
            <p class="p-search__main__content__column__result__number__text"><?= $wp_query->found_posts; ?>件中 <?= $startPageNumber ?>-<?= $endPageNumber ?>件を表示</p>
          </div>
        </div>
        <?php else: ?>
				<div class="p-search__main__content__column__result">
					<div class="p-search__main__content__column__result__category nothing">
						<p class="p-search__main__content__column__result__category__text nothing"><strong><?= urldecode($termTypeQuery); ?><?php the_search_query(); ?></strong>の検索結果が見つかりませんでした。</p>
          </div>
        </div>
        <?php endif; ?>
				<div class="o-verticallyCardList">
					<?php
            while(have_posts()): 
            the_post();
              
						$singletags = search_tags($post->ID);

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
										<?php  endforeach; wp_reset_postdata(); endif; ?>
									</div>
								</div>
							</a>
						</article>
					<?php endwhile; ?>
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
		<div class="p-search__main__sidebar">
			<?php get_sidebar('pc'); ?>
		</div>
	</section>
	<section class="p-search__footer">
		<?php get_template_part('ranking'); ?>
	</section>

</main>
<?php get_footer() ?>
