<?php
	global $cssName;
	$cssName = "404/index";
	get_header();
?>

<main>
	<section class="p-404__main">
		<img class="p-404__main__img" src="<?php echo assetsPath('img') ?>404/404.png" alt="">
			<p class="p-404__main__description">指定されたURLのページは存在しません。<br>人気のキーワードからあなたにぴったりの<br class="is-onlySp">楽しい記事を探してみてください。</p>
		</section>
		<section class="p-404__footer">
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
			?>
			<div class="p-404__footer__keywords">
				<div class="p-404__footer__keywords__title">Keywords</div>
				<ul class="o-classificationList">
					<?php foreach($rankingPopularTags as $rankingPopularTag): ?>
						<li class="o-classificationList__tag">
							<a class="o-classificationList__tag__link" href="">
								<p class="o-classificationList__tag__link__inner"><?= $rankingPopularTag->name ?></p>
							</a>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
			<?php endif; ?>
		</section>
</main>

<?php get_footer() ?>
