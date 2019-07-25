<?php
	global $cssName;
	global $breadcrumb;
	$cssName = "company/index";
	$breadcrumb = '<li>企業情報</li>';
	get_header();
?>

<main>
	<div class="l-head">
		<h1 class="m-ttl">COMPANY<span>企業情報</span></h1>
	</div>
	<section class="l-company inner -m">
		<div class="change__tab">
			<ul>
				<li class="-isActive"><span>企業情報</span></li>
				<li><a href="<?php home_url() ?>/company/message/">代表挨拶</a></li>
			</ul>
		</div>
		<div class="company__items">
			<section class="company__top">
				<div class="company__top__img"></div>
				<h2 class="m-ttl2">「ありがとう」で結ばれる<br>企業を目指して</h2>
				<div class="company__top__subsentence">
					<p>オフィス・ラボは、オフィス移転のプロジェクトマネジメント全般を手がけるトータルプロデュース会社です。</p>
					<p>常に新しいオフィスの在り方をイメージしながらプロ意識を持ってお客様の満足度を高め、<br class="-isPC">よりよいオフィスづくりのお手伝いをすることを心がけています。</p>
					<p>お客様の目線でオフィスの悩みを考え解決に導くことを重要とし、高品質とコスト最適化を両立させたご提案、<br class="-isPC">そして行き届いたサービスで「ありがとう」で結ばれる企業を目指します。</p>
				</div>
			</section>
			<section class="company__strength">
				<figure class="company__strength__point1">
					<div class="company__strength__figure"><img src="<?= assetsPath('img') ?>/company/pyramid.png" alt="全国上位8.4%"></div>
					<figcaption class="company__caption">
						<h3><span class="m-underline">全国上位8.4%の</span><br><span class="__big m-underline">優良企業として3年連続選出</span></h3>
						<p>オフィス・ラボは、東京商工リサーチが実施する企業信用調査を元に、一定の基準を満たした優良企業として選出されています。 優良企業は評価を受けた約151万社の中でも12万7,000社しか選出されておらず、全国の企業の中で上位8.4%にランクインしております。</p>
					</figcaption>
				</figure>
				<figure class="company__strength__point2">
					<div class="company__strength__figure"><img src="<?= assetsPath('img') ?>/company/bar.png" alt="増収増益連続達成"></div>
					<figcaption class="company__caption">
						<h3><span class="m-underline">創業以来、</span><br><span class="__big m-underline">増収増益を継続</span></h3>
						<p><span class="m-bold">オフィス・ラボは2010年の創業以来、増収増益を連続達成。</span><br>毎年多くの新たなお客様の組織課題を「オフィスの在り方」で解決し、オフィス移転のプロジェクトマネジメント全般を手がけるトータルプロデュース会社として常に成長し続けております。</p>
					</figcaption>
				</figure>
			</section>
			<div class="c-presidentlink">
				<div class="c-presidentlink__img">
					<img class="-isPC" src="<?= assetsPath('img') ?>/company/president--PC.jpg" alt="代表取締役社長　渡邉 晃一郎">
					<img class="-isSP" src="<?= assetsPath('img') ?>/company/president--SP.png" alt="代表取締役社長　渡邉 晃一郎">
				</div>

				<div class="c-skeleton-arrow">
					<svg width="48" height="27" viewBox="0 0 48 27" fill="none" xmlns="http://www.w3.org/2000/svg">
						<line class="svg-line" y1="13.3291" x2="34" y2="13.3291" stroke=""></line>
						<path class="svg-triangle" d="M28.25 2.64726L46.9907 13.3348L28.25 24.0224L28.25 2.64726Z" stroke="#333333"></path>
					</svg>
				</div>
				<a href="<?php home_url() ?>/company/message/"></a>
			</div>
		</div>
		<div class="company__office__img"></div>
		<div class="inner -m">
			<input class="c-more-btn__trigger" id="c-more-btn" type="checkbox">
			<address class="c-companyinfo c-more-btn__fire">
				<h2 class="m-ttl2">会社概要</h2>
				<table>
					<tr>
						<th>社名</th>
						<td>株式会社オフィス・ラボ</td>
					</tr>
					<tr>
						<th>代表取締役</th>
						<td>渡邉 晃一郎</td>
					</tr>
					<tr>
						<th>本社</th>
						<td><a href="https://goo.gl/maps/AMzNtkgdtYT2" target="_blank">東京都中央区日本橋本町3-3-6	WAKAMATSU BUILDING 9F</a></td>
					</tr>
					<tr>
						<th></th>
						<td>
							<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3437.185113724023!2d139.77195514265495!3d35.688695743334605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188eac9eb84369%3A0xb92b415012949039!2z5qCq5byP5Lya56S-44Kq44OV44Kj44K544O744Op44Oc!5e0!3m2!1sja!2sjp!4v1552546733298" width="100%" height="300px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
						</td>
					</tr>
					<tr>
						<th>支店</th>
						<td>東海オフィス / 大阪オフィス / 九州オフィス</td>
					</tr>
					<tr>
						<th>設立</th>
						<td>2010年7月1日</td>
					</tr>
					<tr>
						<th>資本金</th>
						<td>50,000,000円</td>
					</tr>
					<tr>
						<th>業務内容</th>
						<td>
							<ul>
								<li>オフィス移転のプロジェクトマネジメント</li>
								<li>ファシリティコンサルティング業務</li>
								<li>設計・デザイン、企画及び施工・管理</li>
								<li>家具及びインテリア用品・消耗品他の販売・レンタル</li>
							</ul>
						</td>
					</tr>
					<tr>
						<th>主要取引先</th>
						<td>
							<ul class="-col2">
								<li>株式会社パソナグループ</li>
								<li>オリエンタル技研工業株式会社</li>
								<li>株式会社ウィルグループ</li>
								<li>株式会社ハタノシステム</li>
								<li>株式会社セントメディア</li>
								<li>株式会社日ノ樹</li>
								<li>株式会社オープンハウス</li>
								<li>株式会社ナルミヤ・インターナショナル</li>
								<li>パーク24株式会社</li>
								<li>三井不動産ビルマネジメント株式会社</li>
								<li>三井不動産リアルティ株式会社</li>
								<li>テクダイヤ株式会社</li>
								<li>山万株式会社</li>
								<li>東洋ビジネスエンジニアリング株式会社</li>
								<li>株式会社保険見直し本舗</li>
								<li>厚生労働省</li>
								<li>株式会社パシフィックソーワ</li>
								<li>環境省</li>
								<li>京都きもの友禅株式会社</li>
								<li>他</li>
							</ul>
						</td>
					</tr>
					<tr>
						<th>取引銀行</th>
						<td>
							<ul>
								<li>みずほ銀行 横山町支店</li>
								<li>三井住友銀行 人形町支店</li>
								<li>りそな銀行 日本橋支店</li>
								<li>きらぼし銀行 神田支店</li>
							</ul>
						</td>
					</tr>
					<tr>
						<th>許認可事項</th>
						<td>
							<ul>
								<li>一級建築士事務所　東京都知事登録　第60746号</li>
								<li>特定建設業許可　東京都知事（特-28）第135661号</li>
								<li>特定建設業許可　東京都知事（特-30）第135661号</li>
								<li>古物商許可（東京都）</li>
								<li>各省庁建設工事、競争参加資格認定、全省庁統一資格</li>
							</ul>
						</td>
					</tr>
					<tr>
						<th>顧問</th>
						<td>
							<ul>
								<li><a href="http://www.keiei-consul.jp/" target="_blank">長江友和公認会計士・税理士事務所</a></li>
								<li>中林税務会計事務所</li>
								<li><a href="http://www.office-taniguchi.jp/" target="_blank">司法書士谷口宏平事務所</a></li>
							</ul>
						</td>
					</tr>
				</table>
			</address>
			<label class="c-more-btn" for="c-more-btn"></label>
		</div>
	</section>
</main>

<?php get_footer() ?>
