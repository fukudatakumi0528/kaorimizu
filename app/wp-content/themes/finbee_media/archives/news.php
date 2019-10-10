<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "article/index";
	$breadcrumb = "<li>ニュース</li>";
	get_header();
?>

<main>
	<div class="l-head">
		<h1 class="m-ttl">NEWS<span>ニュース</span></h1>
	</div>
	<section class="l-articles">
		<div class="articles__list inner -m">
			<?php
				$args = [
					'post_type' => 'news',
					'posts_per_page' => 12,
					'paged' => $paged,
				];
				$query = new WP_Query($args);
				if($query->have_posts()): while($query->have_posts()): $query->the_post();

					$thumbnail = CFS()->get('cloumn_image');
					if(empty($thumbnail)){
						$thumbnail = assetsPath('img') . "/common/img_logo.jpg";
					}
			?>
				<article class="articles__item">
					<a href="<?php the_permalink() ?>">
						<figure style="background-image: url(<?= $thumbnail ?>)"></figure>
						<div class="item__wrap">
							<h1 class="item__title"><?php the_title() ?></h1>
							<p><?php the_excerpt() ?></p>
							<time><?php the_time('Y.n.j') ?></time>
							<?php if( CFS()->get('new') == true ): ?>
								<span>NEW</span>
							<?php endif; ?>
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
						'prev_text' => __(''),
						'next_text' => __(''),
						'mid_size' => 1,
					];
					echo paginate_links($pgArgs);
					wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
</main>



<?php get_footer(); ?>
