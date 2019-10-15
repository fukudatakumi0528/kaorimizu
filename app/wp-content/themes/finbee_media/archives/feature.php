<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "article/index";
	$breadcrumb = "<li>特集</li>";
	get_header();
?>

<main>
	<section class="p-article__topper">
		<div class="o-topperSection">
			<div class="o-topperSection__main">
				<div class="o-topperSection__main__title"><img class="o-topperSection__main__title__icon" src="<?php echo assetsPath('img') ?>common/icon/feature.png" alt="">
					<div class="o-topperSection__main__title__text">
						<h1 class="o-topperSection__main__title__text__main">特集</h1>
						<p class="o-topperSection__main__title__text__sub">Feature</p>
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
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">マイナースポーツ</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">変わった趣味</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">IKEA</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">レアな仕事</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">ツウな人の遊び方</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">ディープな旅</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">マイルの貯め方</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">キャンプ</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">マイナースポーツ</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">変わった趣味</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">IKEA</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">レアな仕事</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">ツウな人の遊び方</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">ディープな旅</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">マイルの貯め方</p></a></li>
							<li class="o-classificationList__tag"><a class="o-classificationList__tag__link" href="">
									<p class="o-classificationList__tag__link__inner">キャンプ</p></a></li>
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
							'posts_per_page' => 12,
							'paged' => $paged,
						];
						$query = new WP_Query($args);
						if($query->have_posts()): while($query->have_posts()): $query->the_post();

						$tags = get_the_tags();

						if ( has_post_thumbnail() ) { // 投稿にアイキャッチ画像が割り当てられているかチェックします。
							$thumbnail =  get_the_post_thumbnail();
						} 

						if(empty($thumbnail)){
							$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
						}
					?>
						<article class="m-verticallyCard">
							<div class="m-verticallyCard__inner">
								<div class="m-verticallyCard__inner__topper">
									<a class="m-verticallyCard__inner__topper__image" href="">
										<img class="m-verticallyCard__inner__topper__image__inner" src=<?= $thumbnail ?> alt="">
									</a>
								</div>
								<div class="m-verticallyCard__inner__footer">
									<time class="m-verticallyCard__inner__footer__date"><?php the_time('Y.n.j') ?></time>
									<a href= <?php the_permalink() ?> class="m-verticallyCard__inner__footer__title" href=""><?php the_excerpt() ?></a>
									<div class="m-classificationArea">
										<?php 
											foreach ( $tags as $tag ) {
												echo '<a class="m-classificationArea__tag" href="">' . $tag->name . '</a>';
											}
										?>
									</div>
								</div>
							</div>
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
								'prev_text' => __(''),
								'next_text' => __(''),
								'mid_size' => 1,
							];
							echo paginate_links($pgArgs);
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
