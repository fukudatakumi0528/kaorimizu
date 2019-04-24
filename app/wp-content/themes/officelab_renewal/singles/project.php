<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "project/post";
	$breadcrumb = '<li><a href="/project/">施工事例</a></li><li>'.get_the_title().'</li>';
	get_header();

?>

<main>
	<?php
		$tastes = get_the_terms($post->ID, 'taste');
		foreach($tastes as $taste) {
			$taste_name = $taste->name;
		}
		$types = get_the_terms($post->ID, 'type');
		foreach($types as $type) {
			$type_name = $type->name;
		}
		$cases = get_the_terms($post->ID, 'case');
		foreach($cases as $case) {
			$case_name = $case->name;
		}
		$areas = get_the_terms($post->ID, 'area');
		foreach($areas as $area) {
			$area_name = $area->name;
		}
	?>
	<section class="l-head -isPC">
		<div class="head__figure" style="background-image:url(<?= CFS()->get('works_images')[0]['works_image']; ?>)"></div>
		<div class="head__wrap inner -m">
			<div class="head__content">
				<h1><?php the_title() ?></h1>
				<h2><?= CFS()->get('design_container_type_title') ?></h2>
				<div class="head__content_table">
					<table>
						<tr>
							<td>テイスト：<?= $taste_name; ?></td>
							<td>事例：<?= $case_name; ?></td>
						</tr>
						<tr>
							<td>広さ：<?= $area_name; ?></td>
							<td>業種：<?= $type_name; ?></td>
						</tr>
<!--
						<tr>
							<td colspan="2">URL：<a href="https://info.cookpad.com/">https://info.cookpad.com/</a></td>
						</tr>
-->
					</table>
				</div>
			</div>
		</div>
	</section>

	<section class="l-head -isSP">
		<div class="head__figure" style="background-image:url(<?= CFS()->get('works_images')[0]['works_image']; ?>)"></div>
		<div class="head__wrap inner -m">
			<div class="head__content">
				<h1><?php the_title() ?></h1>
				<h2><?= CFS()->get('design_container_type_title') ?></h2>
				<div class="head__content_table">
					<table>
						<tr>
							<td>テイスト：<?= $taste_name; ?></td>
							<td>事例：<?= $case_name; ?></td>
						</tr>
						<tr>
							<td>広さ：<?= $area_name; ?></td>
							<td>業種：<?= $type_name; ?></td>
						</tr>
<!--
						<tr>
							<td colspan="2">URL：<a href="https://info.cookpad.com/">https://info.cookpad.com/</a></td>
						</tr>
-->
					</table>
				</div>
			</div>
		</div>
	</section>


	<section class="l-panel inner">
		<ul>
			<?php
				$works_imagegs = CFS()->get('works_images');
				foreach($works_imagegs as $works_image):
			?>
				<li>
					<a>
						<figure style="background-image:url(<?= $works_image['works_image']; ?>)"></figure>

					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>


	<section class="l-message inner -s">
		<?php
			$message = CFS()->get('design_container_type_text2');
			if(!empty($message)):
		?>
			<div>
				<div>
					<h2><span>Message</span>お客様メッセージ</h2>
					<div class="message__text">
						<p><?= CFS()->get('design_container_type_text2') ?></p>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php
			$comment = CFS()->get('design_container_type_text1');
			if(!empty($comment)):
		?>
		<div>
			<div>
				<h2><span>Comment</span>担当者コメント</h2>
				<div class="message__text">
					<p><?= CFS()->get('design_container_type_text1') ?></p>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</section>



	<section class="l-share">
		<div class="share__sns">
			<?php get_template_part('element/sns') ?>
		</div>
	</section>

	<section class="l-btn">
		<a class="m-btn" href="<?php home_url() ?>/project/">VIEW ALL PROJECT</a>
		<a class="m-btn" href="<?php home_url() ?>/contact/">CONTACT</a>
	</section>



	<?php
		//関連インタビュー記事
		$relation_post_ID = CFS()->get('works_relation_post')[0];
		if(!empty($relation_post_ID)):
			$args = [
				'post_type' => 'voice',
				'p' => $relation_post_ID,
				'posts_per_page' => 1,
			];
			$query = new WP_Query($args);
			if($query->have_posts()): while($query->have_posts()): $query->the_post();
	?>
		<section class="l-voice inner -s"><a href="">
				<figure style="background-image:url(http://www.officelab-ka.com/wp-content/uploads/2016/01/cookpad-021-520x277.jpg)"></figure>
				<div>
					<h2><?php the_title() ?></h2>
					<p><?= CFS()->get('voice_description') ?></p>
					<b><?= CFS()->get('voice_person_in_charge') ?></b>
				</div></a>
		</section>
	<?php endwhile; endif; wp_reset_postdata(); unset($args, $query); endif; ?>


	<section class="l-recommend inner -s"><b class="recommend__title">RECOMMEND</b>
		<div class="recommend__slider_wrap">
			<ul class="recommend__slider">
				<?php
					$args = [
						'post_type' => 'project',
						'posts_per_page' => 3,
						'post__not_in' => array($post->ID,),
						'orderby' => 'rand',
					];
					$query = new WP_Query($args);
					if($query->have_posts()): while($query->have_posts()): $query->the_post();
				?>
					<li>
						<a href="<?php the_permalink() ?>">
							<figure style="background-image:url(<?= CFS()->get('works_images')[0]['works_image']; ?>)"></figure>
							<h2><?php the_title() ?></h2>
						</a>
					</li>
				<?php endwhile; endif; ?>
			</ul>
		</div>
	</section>


</main>




<?php get_footer() ?>
