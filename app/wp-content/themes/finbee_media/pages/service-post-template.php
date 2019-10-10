<?php
	/*
	Template Name: サービス詳細用テンプレート
	*/
	global $cssName;
	global $breadcrumb;
	$cssName = "service/post";

	$page_title = get_the_title();
	$breadcrumb = '<li><a href="/service/">サービス</a></li><li>'. $page_titlef .'</li>';
	get_header();
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<main>
		<article class="l-article inner">
			<header class="article__header">
				<h1 class="m-ttl"><?php the_title() ?><span><?= CFS()->get('service_catchcopy')  ?></span></h1>
				<figure style="background-image: url(<?= CFS()->get('service_thumbnail') ?>)"></figure>
			</header>
			<section class="article__body">
				<?php the_content() ?>
			</section>
		</article>

		<div class="l-services inner">
			<h2 class="m-ttl">OUR SERVICES<span>サービス内容</span></h2>
			<ul class="services__list">
				<?php
					$services = get_posts('name=service&post_type=page');
					$services_ID = $services[0]->ID;
					$args = [
						'posts_per_page' => -1,
						'post_type' => 'page',
						'post_parent' => $services_ID,
						'order' => 'ASC',
						'orderby' => 'menu_order',
					];
					$query = new WP_Query($args);
					if($query->have_posts()): while($query->have_posts()): $query->the_post();
				?>
				<li>
					<a href="<?php the_permalink() ?>">
						<figure style="background-image: url(<?= CFS()->get('service_thumbnail')  ?>)"></figure>
						<h3><?php the_title() ?></h3>
					</a>
				</li>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</ul>
		</div>
	</main>
<?php endwhile; endif; ?>

<?php get_footer() ?>
