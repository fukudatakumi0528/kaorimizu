<?php
	global $breadcrumb;
	global $scriptName;
?>

			<?php wp_footer(); ?>

			<footer class="l-footer">

        <?php if ( !is_home() && !is_front_page() ) :?>
          <div class="m-breadcrumb">
            <?php custom_breadcrumb(); ?>
          </div>
        <?php endif; ?>

        <div class="l-footer__downlord">
          <div class="l-footer__downlord__inner"><img class="l-footer__downlord__inner__image" src="<?php echo assetsPath('img') ?>common/footer/download.png" alt="">
            <div class="l-footer__downlord__inner__main">
              <div class="l-footer__downlord__inner__main__link">
                <div class="l-footer__downlord__inner__main__link__AppStore">
									<a class="anl_common_footer" href="https://apps.apple.com/jp/app/finbee-%E3%82%A2%E3%83%97%E3%83%AA%E3%81%A7%E8%B2%AF%E9%87%91-%E6%A5%BD%E3%81%97%E3%81%8F%E3%81%8A%E9%87%91%E3%82%92%E8%B2%AF%E3%82%81%E3%82%8B%E8%B2%AF%E9%87%91%E3%82%A2%E3%83%97%E3%83%AA/id1182852315?mt=8" style="display:inline-block;overflow:hidden;background:url(https://linkmaker.itunes.apple.com/ja-jp/badge-lrg.svg?releaseDate=2016-12-26&amp;kind=iossoftware&amp;bubble=ios_apps) no-repeat;width:135px;height:40px;"></a>
                </div>
                <div class="l-footer__downlord__inner__main__link__GooglePlay">
									<a class="anl_common_footer" href="https://play.google.com/store/apps/details?id=jp.co.nestegg.finbee&amp;hl=ja&amp;pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1"><img alt="Google Play で手に入れよう" src="https://play.google.com/intl/ja/badges/images/generic/ja_badge_web_generic.png" width="155"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="l-footer__support">
          <div class="l-footer__support__inner">
            <div class="l-footer__support__inner__header">
              <div class="l-footer__support__inner__header__subtitle no-pc">contents support</div>
              <div class="l-footer__support__inner__header__tilte">コンテンツサポート募集</div>
              <div class="l-footer__support__inner__header__subtitle is-pc">contents support</div>
            </div>
            <div class="l-footer__support__inner__center">
              <div class="l-footer__support__inner__center__checkbox">
                <div class="l-footer__support__inner__center__checkbox__inner">
                  <div class="l-footer__support__inner__center__checkbox__inner__left">
                    <img src="<?= assetsPath('img') ?>icon/footer-checkbox.svg" alt="チェックボックスアイコン">
									</div>
                  <p class="l-footer__support__inner__center__checkbox__inner__right">取材、執筆、撮影など制作に<br>関わりたい人</p>
                </div>
              </div>
              <div class="l-footer__support__inner__center__checkbox">
                <div class="l-footer__support__inner__center__checkbox__inner">
                  <div class="l-footer__support__inner__center__checkbox__inner__left">
                    <img src="<?= assetsPath('img') ?>icon/footer-checkbox.svg" alt="チェックボックスアイコン">
									</div>
                  <p class="l-footer__support__inner__center__checkbox__inner__right">マイナーな趣味やスポーツに<br>熱中している人</p>
                </div>
              </div>
              <div class="l-footer__support__inner__center__checkbox">
                <div class="l-footer__support__inner__center__checkbox__inner">
                  <div class="l-footer__support__inner__center__checkbox__inner__left">
                    <img src="<?= assetsPath('img') ?>icon/footer-checkbox.svg" alt="チェックボックスアイコン">
									</div>
                  <p class="l-footer__support__inner__center__checkbox__inner__right">その他コンテンツのネタを<br>提供したい人</p>
                </div>
              </div>
            </div>
						<div class="l-footer__support__inner__footer">be-topia のコンテンツに<br class="no-pc">参加してみたい方は以下フォームより、<br class="no-pc">お問い合わせください。</div>
						<a class="m-wideButton" href="<?= site_url('contact/') ?>">
							<span class="icon-btn"></span>
							<p class="m-wideButton__text">お問い合わせ</p>
						</a>
          </div>
        </div>
        <div class="l-footer__about">
          <div class="l-footer__about__inner">
            <div class="l-footer__about__inner__main">
              <div class="l-footer__about__inner__main__header">
                <div class="l-footer__about__inner__main__header__subhead">What is</div>
                <img class="l-footer__about__inner__main__header__image" src="<?= assetsPath('img') ?>logo/be-topia_footer.svg">
                <div class="l-footer__about__inner__main__header__subtitle">ビートピアについて</div>
              </div>
              <div class="l-footer__about__inner__main__line"></div>
              <p class="l-footer__about__inner__main__description">be-topiaは、「みつける、なりたいジブン」をテーマにしたライフスタイルマガジンです。さまざまな人の「やりたいこと」や「やってみたこと」にまつわるストーリーやアイデアを紹介します。やりたいことが見つからない人、やりたいことを先延ばしにしている人。そんな人たちの背中をそっと押して、やりたいことへの一歩を踏み出す人を増やしていきます。</p>
            </div>
            <div class="l-footer__about__inner__footer">
              <div class="l-footer__about__inner__footer__left">
                <img class="icon-check-text" src="<?= assetsPath('img') ?>icon/check.svg">
                <span class="icon-arrow"></span>
              </div>
              <div class="l-footer__about__inner__footer__list">
                <a class="l-footer__about__inner__footer__list__item instagram" href="" target= _blank>
                  <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-instagram.svg" alt="instagram公式アカウント">
                </a>
                <a class="l-footer__about__inner__footer__list__item twitter" href="" target= _blank>
                  <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-twitter.svg" alt="twitter公式アカウント">
                </a>
                <a class="l-footer__about__inner__footer__list__item facebook" href="" target= _blank>
                  <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-facebook.svg" alt="facebook公式アカウント">
                </a>
              </div>
						</div>
          </div>
        </div>
        <div class="l-footer__search">
          <div class="l-footer__search__inner">
            <div class="l-footer__search__inner__main">
              <ul class="l-footer__search__inner__main__category">
                <li class="l-footer__search__inner__main__category__list">
									<a class="l-footer__search__inner__main__category__list__text" href="<?= site_url('feature/') ?>">特集</a>
								</li>
                <li class="l-footer__search__inner__main__category__list">
									<a class="l-footer__search__inner__main__category__list__text" href="<?= site_url('hobby/') ?>">趣味</a>
								</li>
                <li class="l-footer__search__inner__main__category__list">
									<a class="l-footer__search__inner__main__category__list__text" href="<?= site_url('life/') ?>">生活</a>
								</li>
                <li class="l-footer__search__inner__main__category__list">
									<a class="l-footer__search__inner__main__category__list__text" href="<?= site_url('learn/') ?>">学び</a>
								</li>
              </ul>
              <div class="l-footer__search__inner__main__footer">
								<a class="l-footer__search__inner__main__footer__link" href="https://finbee.jp/" target= _blank>
									<span class="icon-btn"></span>
									<p class="l-footer__search__inner__main__footer__link__text">自動貯金サービス「finbee」</p>
									<span class="icon-tab"></span>
								</a>
							</div>
            </div>
            <div class="l-footer__search__inner__downlord">
              <div class="l-footer__search__inner__downlord__inner">
                <div class="l-footer__search__inner__downlord__inner__topper">
									<img class="l-footer__search__inner__downlord__inner__topper__logo" src="<?= assetsPath('img') ?>common/logo-finbee.png" alt="">
                  <div class="l-footer__search__inner__downlord__inner__topper__link">
                    <div class="l-footer__search__inner__downlord__inner__topper__link__title">自動貯金サービス「finbee」を試してみる</div>
                    <div class="l-footer__search__inner__downlord__inner__topper__link__button">
                      <div class="l-footer__search__inner__downlord__inner__topper__link__button__AppStore">
												<a class="anl_common_footer" href="https://apps.apple.com/jp/app/finbee-%E3%82%A2%E3%83%97%E3%83%AA%E3%81%A7%E8%B2%AF%E9%87%91-%E6%A5%BD%E3%81%97%E3%81%8F%E3%81%8A%E9%87%91%E3%82%92%E8%B2%AF%E3%82%81%E3%82%8B%E8%B2%AF%E9%87%91%E3%82%A2%E3%83%97%E3%83%AA/id1182852315?mt=8" style="display:inline-block;overflow:hidden;background:url(https://linkmaker.itunes.apple.com/ja-jp/badge-lrg.svg?releaseDate=2016-12-26&amp;kind=iossoftware&amp;bubble=ios_apps) no-repeat;width:135px;height:40px;" target= _blank></a>
											</div>
                      <div class="l-footer__search__inner__downlord__inner__topper__link__button__GooglePlay">
                        <a class="anl_common_footer" href="https://play.google.com/store/apps/details?id=jp.co.nestegg.finbee&amp;hl=ja&amp;pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1" target= _blank>
                          <img alt="Google Play で手に入れよう" src="https://play.google.com/intl/ja/badges/images/generic/ja_badge_web_generic.png" width="155">
                        </a>
											</div>
                    </div>
                  </div>
                </div>
                <div class="l-footer__search__inner__downlord__inner__footer">
                  <a class="anl_common_footer" href="https://finbee.jp/?utm_source=be-topia&utm_medium=footer&utm_campaign=<?= $_SERVER["REQUEST_URI"]; ?>" target= _blank>
										<span class="icon-btn"></span>
										<p class="anl_common_footer__text">公式サイトはこちら</p>
										<span class="icon-tab"></span>
									</a>
								</div>
              </div>
            </div>
          </div>
        </div>
        <div class="l-footer__nav">
          <div class="l-footer__nav__inner">
            <ul class="l-footer__nav__inner__main">
              <li class="l-footer__nav__inner__main__list">
								<a class="l-footer__nav__inner__main__list__link" href="https://finbee.jp/company/" target="_blank">
									<p class="l-footer__nav__inner__main__list__link__text">会社概要</p>
									<span class="icon-tab"></span>
								</a>
							</li>
              <li class="l-footer__nav__inner__main__list">
								<a class="l-footer__nav__inner__main__list__link" href="<?= site_url('disclaimer/') ?>">
									<p class="l-footer__nav__inner__main__list__link__text">免責事項</p>
								</a>
							</li>
              <li class="l-footer__nav__inner__main__list">
								<a class="l-footer__nav__inner__main__list__link" href="<?= site_url('privacypolicy/') ?>">
									<p class="l-footer__nav__inner__main__list__link__text">プライバシーポリシー</p>
								</a>
							</li>
              <li class="l-footer__nav__inner__main__list">
								<a class="l-footer__nav__inner__main__list__link" href="<?= site_url('contact/') ?>">
									<p class="l-footer__nav__inner__main__list__link__text">お問い合わせ</p>
								</a>
							</li>
            </ul>
            <div class="l-footer__nav__inner__copy">©︎2019 NestEgg,Inc.</div>
          </div>
        </div>
      </footer>
      <div class="l-fixed-button">
        <div class="l-fixed-button__inner">
          <div class="l-fixed-button__inner__topper" style="background-image:url(<?= assetsPath('img') ."common/fixedButton.svg" ?>)">
            <div class="l-fixed-button__inner__topper__inner">
              <div class="l-fixed-button__inner__topper__inner__menu"><span class="l-fixed-button__inner__topper__inner__menu__line"></span><span class="l-fixed-button__inner__topper__inner__menu__line"></span></div>
              <p class="l-fixed-button__inner__topper__inner__text">menu</p>
            </div>
          </div>
          <div class="l-fixed-button__inner__main">
            <div class="l-fixed-button__inner__main__button" id="js-spSearch-trigger">
              <p class="l-fixed-button__inner__main__button__text">したい・ほしいを<strong>探す</strong></p>
              <div class="l-fixed-button__inner__main__button__icon">
                <img class="l-fixed-button__inner__main__button__icon__image search" src="<?= assetsPath('img') ?>icon/fixedButton/icon-search.svg" alt="">
              </div>
            </div>
            <div class="l-fixed-button__inner__main__button" id="js-spGrant-trigger">
              <p class="l-fixed-button__inner__main__button__text">したい・ほしいを<strong>叶える</strong></p>
              <div class="l-fixed-button__inner__main__button__icon">
                <img class="l-fixed-button__inner__main__button__icon__image star" src="<?= assetsPath('img') ?>icon/fixedButton/icon-star.svg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
		<script src="<?= assetsPath('js') ?>common.js"></script>
		<script src="<?= assetsPath('js') ?>home.js"></script>
		<?php if(!empty($scriptName)): ?>
			<script src="<?= assetsPath('js') ?><?= $scriptName ?>.js"></script>
		<?php endif; ?>
	</body>
</html>
