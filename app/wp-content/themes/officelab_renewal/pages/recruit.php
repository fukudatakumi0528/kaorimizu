<?php
	global $cssName;
	global $breadcrumb;
	$cssName = "recruit/index";
	$breadcrumb = '<li>採用情報</li>';
	get_header();
?>
<main>
	<div class="l-head">
		<h1 class="m-ttl">RECRUIT<span>採用情報</span></h1>
	</div>
	<section class="l-recruit">
		<div class="recruit__items inner">
			<section class="recruit__top">
				<ul class="recruit__top__imglist">
					<li class="recruit__top__img"><img style="background-image: url(<?= assetsPath('img') ?>/recruit/recruit_01.jpg)"></li>
					<li class="recruit__top__img"><img style="background-image: url(<?= assetsPath('img') ?>/recruit/recruit_02.jpg)"></li>
					<li class="recruit__top__img"><img style="background-image: url(<?= assetsPath('img') ?>/recruit/recruit_03.jpg)"></li>
					<li class="recruit__top__joinus"><img src="<?= assetsPath('img') ?>/recruit/joinus.svg"></li>
				</ul>
				<h2 class="m-ttl2">「ありがとう」で結ばれる会社で<br>共に夢を叶えませんか？</h2>
				<p class="recruit__top__subsentence">オフィス・ラボは精鋭集団をモットーに創業以来、順調に業績を伸ばし続けております。<br>業績拡大に伴い、以下の人材を募集します。</p>
			</section>
			<div class="inner -m">
				<div class="recruit__pagelinks">
					<?php
						$args = [
							'pagename' => 'recruit',
							'posts_per_page' => 1,
						];
						$query = new WP_Query($args);
						if($query->have_posts()): while($query->have_posts()): $query->the_post();
							foreach(CFS()->get('recruit_type') as $recruit):
					?>
						<ul class="recruit__pagelink">
							<li><?= $recruit['recruit_type_name_en'] ?></li>
							<li><?= $recruit['recruit_type_name'] ?></li>
							<li class="arrow"></li><a href="#<?= $recruit['recruit_type_name_en'] ?>"></a>
						</ul>
					<?php endforeach; endwhile; endif; wp_reset_postdata(); ?>
				</div>

				<?php
					$args = [
						'pagename' => 'recruit',
						'posts_per_page' => 1,
					];
					$query = new WP_Query($args);
					if($query->have_posts()): while($query->have_posts()): $query->the_post();
						foreach(CFS()->get('recruit_type') as $recruit):
				?>
					<section class="recruit__pattern" id="<?= $recruit['recruit_type_name_en'] ?>">
						<h3 class="recruit__pattern__ttl"><?= $recruit['recruit_type_name'] ?></h3>
						<div class="table">
							<?php foreach($recruit['recruit_description'] as $recruit_content): ?>
								<div class="tr">
									<div class="th"><?= $recruit_content['recruit_description_title'] ?></div>
									<div class="td"><?= $recruit_content['recruit_description_text'] ?></div>
								</div>
							<?php endforeach; ?>
						</div>
						<?php
							if(!empty($recruit['recruit_link']['url'])):
						?>
							<a class="m-btn"
								href="<?= $recruit['recruit_link']['url'] ?>"
								<?php
									if($recruit['recruit_link']['target'] != "none") {
										echo 'target="' . $recruit['recruit_link']['target'] . '"';
									}
								?>
							><?= $recruit['recruit_link']['text'] ?></a>
						<?php endif; ?>
					</section>
				<?php endforeach; endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="l-hugelink">
			<div class="c-hugelinks">
				<ul>
					<li>PROJECT</li>
					<li>施工事例一覧</li>
					<a href="<?php home_url() ?>/project/"></a>
				</ul>
				<ul>
					<li>VOICE</li>
					<li>お客様の声</li>
					<a href="<?php home_url() ?>/voice/"></a>
				</ul>
				<ul>
					<li>CONTACT</li>
					<li>お問い合わせ</li>
					<a href="<?php home_url() ?>/contact/"></a>
				</ul>
				<div class="background-something"></div>
			</div>
		</div>
	</section>
</main>
<?php get_footer() ?>
