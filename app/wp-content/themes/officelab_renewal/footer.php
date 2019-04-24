<?php
	global $breadcrumb;
	global $scriptName;
?>

			<?php wp_footer(); ?>
			<footer class="footer">
				<div class="inner -m">
					<div class="footer__pager">
						<div class="breadcrumb">
							<ol>
								<li><a href="<?php home_url() ?>/"></a></li>
								<?php if(!empty($breadcrumb)): ?>
									<?= $breadcrumb ?>
								<?php endif; ?>
							</ol>
						</div>
						<a class="pagetop" href="#"></a>
					</div>

					<div class="footer__nav">
						<div>
							<dl>
								<dt><a href="<?php home_url() ?>/service/">サービス</a></dt>
								<?php /*
								<dd>
									<ul>
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
											<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
										<?php endwhile; endif; wp_reset_postdata(); ?>
									</ul>
								</dd>
								*/ ?>
							</dl>
						</div>
						<div>
							<dl>
								<dt><a href="<?php home_url() ?>/project/">施工事例</a></dt>
								<?php /*
								<dd>
									<ul>
										<li><a href="">エントランス</a></li>
										<li><a href="">会議室</a></li>
										<li><a href="">ワークスペース</a></li>
										<li><a href="">フリースペース</a></li>
										<li><a href="">床</a></li>
										<li><a href="">壁</a></li>
										<li><a href="">サイン</a></li>
									</ul>
								</dd>
								*/ ?>
							</dl>
							<?php /*
							<dl>
								<dt><a href="<?php home_url() ?>/voice/">お客様の声</a></dt>
							</dl>
							*/ ?>
						</div>
						<div>
							<dl>
								<dt><a href="<?php home_url() ?>/column/">コラム</a></dt>
								<?php /*
								<dd>
									<ul>
										<li><a href="">コラムカテゴリ1</a></li>
										<li><a href="">コラムカテゴリ2</a></li>
										<li><a href="">コラムカテゴリ3</a></li>
									</ul>
								</dd>
								*/ ?>
							</dl>
							<dl>
								<dt><a href="<?php home_url() ?>/news/">ニュース</a></dt>
								<?php /*
								<dd>
									<ul>
										<li><a href="">ニュースカテゴリ1</a></li>
										<li><a href="">ニュースカテゴリ2</a></li>
										<li><a href="">ニュースカテゴリ3</a></li>
									</ul>
								</dd>
								*/ ?>
							</dl>
						</div>
						<div>
							<dl>
								<dt><a href="<?php home_url() ?>/recruit/">採用情報</a></dt>
								<?php /*
								<dd>
									<ul>
										<li><a href="">キャリア採用</a></li>
										<li><a href="">新卒採用</a></li>
										<li><a href="">採用エントリー</a></li>
									</ul>
								</dd>
								*/ ?>
							</dl>
						</div>
						<div>
							<dl>
								<dt><a href="<?php home_url() ?>/company/">企業情報</a></dt>
								<dd>
									<ul>
										<li><a href="<?php home_url() ?>/company/message/">代表挨拶</a></li>
										<li><a href="<?php home_url() ?>/policy/">プライバシーポリシー</a></li>
									</ul>
								</dd>
							</dl>
							<dl>
								<dt><a href="<?php home_url() ?>/contact/">お問い合わせ</a></dt>
								<dd>
									<ul>
										<li><a href="<?php home_url() ?>/contact/">お仕事の依頼</a></li>
										<li><a href="<?php home_url() ?>/contact/appointment/">取材・アポイントメント</a></li>
										<li><a href="<?php home_url() ?>/contact/partner/">協力パートナー応募</a></li>
									</ul>
								</dd>
							</dl>
						</div>
					</div>
					<div class="footer__logo">
						<figure>
							<a href="<?php home_url() ?>/"></a>
						</figure>
						<p>オフィス、店舗の移転・レイアウト変更なら<br>オフィス・ラボにお任せください</p>
					</div>
					<div class="footer__contact">
						<a class="tel -isSP" href="tel:<?= COMPANY_TEL  ?>"><?= COMPANY_TEL  ?></a>
						<span class="tel -isPC"><?= COMPANY_TEL  ?></span>
						<a class="m-btn -black" href="<?php home_url() ?>/contact/">CONTACT</a>
					</div>
					<small class="footer__copy"><?= date('Y'); ?> &copy; <?= COMPANY_NAME_EN ?></small>
				</div>
			</footer>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
		<?php /* <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> */ ?>
		<script src="<?= assetsPath('js') ?>common.js"></script>
		<?php if(!empty($scriptName)): ?>
			<script src="<?= assetsPath('js') ?><?= $scriptName ?>.js"></script>
		<?php endif; ?>

		<div id="fb-root">
			<script async defer src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&amp;version=v3.2"></script>
		</div>
		<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
		<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
		<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
		<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
		<!--Ptengine-->
		<script type="text/javascript">
			window._pt_sp_2 = [];
			_pt_sp_2.push('setAccount,758c2098');
			var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
			(function() {
				var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
				atag.src = _protocol + 'js.ptengine.jp/pta.js';
				var stag = document.createElement('script'); stag.type = 'text/javascript'; stag.async = true;
				stag.src = _protocol + 'js.ptengine.jp/pts.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(atag, s);s.parentNode.insertBefore(stag, s);
			})();
		</script>
		<!--LP用-->
		<script type="text/javascript">
		  (function () {
		    var tagjs = document.createElement("script");
		    var s = document.getElementsByTagName("script")[0];
		    tagjs.async = true;
		    tagjs.src = "//s.yjtag.jp/tag.js#site=G6pjWk1";
		    s.parentNode.insertBefore(tagjs, s);
		  }());
		</script>
		<noscript>
		  <iframe src="//b.yjtag.jp/iframe?c=G6pjWk1" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
		</noscript>
	</body>
</html>
