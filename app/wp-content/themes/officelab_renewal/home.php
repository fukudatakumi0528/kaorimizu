<?php
	global $cssName;
	$cssName = "home";
	get_header();
?>
<main>
	<section class="l-kv">
    <div class="kv__left">
      <h1>すべては、<br>働く人の<br>笑顔のために。<span>All for the smile of working people.</span></h1>
      <div class="kv__slider_dots"></div>
      <div class="kv__scroll"><a href="#policy"><span></span></a></div>
    </div>
    <div class="kv__slider">
      <ul class="kv__slider_list js-slickSlider--topkv">
        <li class="kv__slider_item" style="background-image:url(<?= assetsPath('img') ?>home/img_kv_01.jpg)"></li>
        <li class="kv__slider_item" style="background-image:url(<?= assetsPath('img') ?>home/img_kv_02.jpg)"></li>
        <li class="kv__slider_item" style="background-image:url(<?= assetsPath('img') ?>home/img_kv_03.jpg)"></li>
        <li class="kv__slider_item" style="background-image:url(<?= assetsPath('img') ?>home/img_kv_04.jpg)"></li>
        <li class="kv__slider_item" style="background-image:url(<?= assetsPath('img') ?>home/img_kv_05.jpg)"></li>
        <li class="kv__slider_item" style="background-image:url(<?= assetsPath('img') ?>home/img_kv_06.jpg)"></li>
      </ul>
    </div>
	</section>

	<section class="l-policy" id="policy">
    <div class="inner -m">
      <h2><span class="en">POLICY</span><span class="jp">大切にしていること</span></h2>
      <div class="policy__wrap">
        <div class="policy__fig">
          <figure class="-isPC" style="background-image:url(<?= assetsPath('img') ?>home/img_policy_01.png)"></figure>
          <figure class="-isSP" style="background-image:url(<?= assetsPath('img') ?>home/img_policy_01.png)"></figure>
        </div>
        <div class="policy__text">
          <h3><span>ありがとう</span>で<br>結ばれる<br>企業を目指して</h3>
          <h4>Who we are</h4>
          <p>小さくても大きくても「オフィス」です。</p>
          <p>働く場所、集まる場所、戦略を考える場所。<br>企業によって様々な「オフィス」の在り方が存在します。会社の規模ではなく、これからどういう会社にしていきたいか。その想いにオフィス・ラボは真摯に向き合い続けます。</p><a class="m-btn" href="<?php home_url() ?>/company/">COMPANY</a>
        </div>
      </div>
    </div>
  </section>

	<section class="l-service">
    <div class="inner -m">
      <div class="service__bg"></div>
      <div class="service__wrap">
        <h2><span class="en">SERVICE</span><span class="jp">できること</span></h2>
        <div class="service__text">
          <h3>What we do</h3>
          <p>オフィス・ラボは、移転プロジェクトを通じて様々な組織課題を解決する「オフィスの在り方」をご提案いたします。</p><a class="m-btn" href="<?php home_url() ?>/service/">MORE</a>
        </div>
      </div>
    </div>
  </section>

	<section class="l-project">
		<div class="inner -s">
			<h2 class="m-ttl">PROJECT<span>施工事例</span></h2>
			<ul class="project__list">
				<?php
					$args = [
						'post_type' => 'project',
						'posts_per_page' => 7,
						'paged' => $paged,
					];
					$query = new WP_Query($args);
					if($query->have_posts()): while($query->have_posts()): $query->the_post();
				?>
					<li class="project__item">
						<a href="<?php the_permalink() ?>">
							<div class="item__wrap">
								<div class="item__figwrap">
									<figure style="background-image: url(<?php echo CFS()->get('works_images')[0]['works_image'] ?>)"></figure>
								</div>
							</div>
							<h3 class="item__ttl"><?php the_title() ?></h3>
						</a>
					</li>
				<?php endwhile; endif; unset($args, $query); wp_reset_postdata(); ?>
			</ul><a class="m-btn" href="<?php home_url() ?>/project/">VIEW ALL PROJECT</a>
		</div>
	</section>

	<section class="l-pickup">
		<h2 class="m-ttl">PICK UP<span>注目記事</span></h2>
		<div class="inner -m">
			<ul class="pickup__list js-slickSlider--pickup">
				<?php
					// 配列にピックアップ記事のIDを格納にarticleで出さないようにする
					$not_in_post_ID = array();
					$args = [
						'pagename' => 'pickup',
						'posts_per_page' => 1,
					];
					$query = new WP_Query($args);
					if($query->have_posts()): while($query->have_posts()): $query->the_post();
						$pickup_posts = CFS()->get('pickup_posts');
						foreach($pickup_posts as $pickup_post):
							$pickup_post_ID = $pickup_post['pickup_post'][0];
							$args2 = [
								'post_type' => ['news','column'],
								'p' => $pickup_post_ID,
								'posts_per_page' => 1,
							];
							$query2 = new WP_Query($args2);
							if($query2->have_posts()): while($query2->have_posts()): $query2->the_post();
								array_push($not_in_post_ID, $post->ID);
				?>
					<li class="pickup__item">
						<a href="<?php the_permalink() ?>">
							<figure style="background-image: url(<?= CFS()->get('cloumn_image') ?>)">
								<figcaption>PICK UP</figcaption>
							</figure>
							<h3 class="item__ttl"><?php the_title() ?></h3>
						</a>
					</li>
				<?php endwhile; endif; endforeach; endwhile; endif; unset($args, $query); wp_reset_postdata(); ?>

			</ul>
			<div class="js-slickSlider--pickup--arrows"></div>
		</div>
	</section>


	<section class="l-article">
		<h2 class="m-ttl">ARTICLE<span>記事</span></h2>
		<div class="inner -m">
			<ul class="article__list js-slickSlider--article">
				<?php
					$args = [
						'post_type' => ['news','column'],
						'posts_per_page' => 10,
						'post__not_in' => $not_in_post_ID,
					];
					$query = new WP_Query($args);
					if($query->have_posts()): while($query->have_posts()): $query->the_post();
					$posttype_label = esc_html( get_post_type_object(get_post_type())->label );
				?>
					<li class="article__item">
						<a href="<?php the_permalink() ?>">
							<figure style="background-image: url(<?= CFS()->get('cloumn_image') ?>)">
								<figcaption class="-<?= get_post_type() ?>"><?= $posttype_label ?></figcaption>
							</figure>
							<h3 class="item__ttl"><?php the_title() ?></h3>
							<time><?php the_time('Y.n.j') ?></time>
						</a>
					</li>
				<?php endwhile; endif; unset($args, $query); wp_reset_postdata(); ?>
			</ul>
			<div class="js-slickSlider--article--arrows"></div>
		</div>
		<div class="article__btns">
			<a class="m-btn" href="<?= home_url() ?>/news/">NEWS ARCHIVE</a>
			<a class="m-btn" href="<?= home_url() ?>/column/">COLUMN ARCHIVE</a></div>
	</section>

	<?php /*
	<section class="l-voice">
		<h2 class="m-ttl">VOICE<span>お客様の声</span></h2>
		<div class="inner -l">
			<ul class="voice__list">
				<li class="voice__item"><a href="">
						<div class="item__figwrap">
							<figure style="background-image: url()"></figure>
							<h3 class="item__ttl">家を持つことへの夢を抱く、<br>お客様を迎える場として。</h3>
						</div>
						<div class="item__logo"><img src=""></div></a></li>
				<li class="voice__item"><a href="">
						<div class="item__figwrap">
							<figure style="background-image: url()"></figure>
							<h3 class="item__ttl">家を持つことへの夢を抱く、<br>お客様を迎える場として。</h3>
						</div>
						<div class="item__logo"><img src=""></div></a></li>
				<li class="voice__item"><a href="">
						<div class="item__figwrap">
							<figure style="background-image: url()"></figure>
							<h3 class="item__ttl">家を持つことへの夢を抱く、<br>お客様を迎える場として。</h3>
						</div>
						<div class="item__logo"><img src=""></div></a></li>
			</ul>
		</div>
	</section>
	*/ ?>

	<section class="l-recruit">
		<a href="<?= home_url() ?>/recruit/">
			<h2 class="m-ttl">RECRUIT<span>採用情報</span></h2>
			<p>「ありがとう」で結ばれる会社で<br>共に夢を叶えませんか？</p>
		</a>
	</section>

</main>
<?php get_footer() ?>
