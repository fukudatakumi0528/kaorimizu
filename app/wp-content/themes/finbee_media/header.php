<!DOCTYPE html>
<html lang="ja-jp" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<head>
<?php get_template_part('element/head') ?>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KBC63RB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="wrap">
  <div class="l-modalCover"></div>

  <!-- メインメニュー -->
	<div class="l-spMenu is-hidden" id="js-spMenu">
		<header class="l-header">
			<div class="o-headerInner">
				<a class="m-logo" href="<?= site_url() ?>">
					<img class="m-logo__image" src="<?= assetsPath('img') ?>logo/be-topia_headerLogo.svg" alt="be-topia">
				</a>
				<div class="o-headerInner__left">
					<a class="o-headerInner__left__list instagram" href="https://www.instagram.com/be_topia/" target= _blank>
  					<img src="<?= assetsPath('img') ?>logo/sns/simple/logo-instagram.svg" alt="instagram公式アカウント">
          </a>
					<a class="o-headerInner__left__list twitter" href="https://twitter.com/be_topia" target= _blank>
  					<img src="<?= assetsPath('img') ?>logo/sns/simple/logo-twitter.svg" alt="twitter公式アカウント">
          </a>
					<a class="o-headerInner__left__list facebook" href="https://www.facebook.com/betopia.jp" target= _blank>
  					<img src="<?= assetsPath('img') ?>logo/sns/simple/logo-facebook.svg" alt="facebook公式アカウント">
          </a>
				</div>
			</div>
          <div class="o-headerInnerPc">
            <a class="m-logo" href="<?= site_url() ?>">
              <img class="m-logo__image" src="<?= assetsPath('img') ?>logo/be-topia_headerLogo.svg" alt="be-topia">
            </a>
            <div class="o-headerInnerPc__left">
              <ul class="o-headerInnerPc__left__category">
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('feature/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon feature" src="<?= assetsPath('img') ?>icon/home/icon-feature.svg" alt="特集">
                    <p class="o-headerInnerPc__left__category__list__link__text">特集</p>
                  </a>
                </li>
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('hobby/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon hobby" src="<?= assetsPath('img') ?>icon/home/icon-hobby.svg" alt="趣味">
                    <p class="o-headerInnerPc__left__category__list__link__text">趣味</p>
                  </a>
                </li>
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('life/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon life" src="<?= assetsPath('img') ?>icon/home/icon-life.svg" alt="生活">
                    <p class="o-headerInnerPc__left__category__list__link__text">生活</p>
                  </a>
                </li>
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('learn/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon learn" src="<?= assetsPath('img') ?>icon/home/icon-life.svg" alt="学び">
                    <p class="o-headerInnerPc__left__category__list__link__text">学び</p>
                  </a>
                </li>
              </ul>
              <div class="o-headerInnerPc__left__icon">
                <a class="icon-instagram o-headerInnerPc__left__icon__list" href="https://www.instagram.com/be_topia/"></a>
                <a class="icon-twitter o-headerInnerPc__left__icon__list" href="https://twitter.com/be_topia"></a>
                <a class="icon-facebook o-headerInnerPc__left__icon__list" href="https://www.facebook.com/betopia.jp">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </a>
                <div class="icon-search o-headerInnerPc__left__icon__list js-headerInnerPc__Menu"></div>
              </div>
            </div>
          </div>
        </header>
        <div class="l-spMenu__main">
          <ul class="l-spMenu__main__nav">
            <li class="l-spMenu__main__nav__list">
							<a class="l-spMenu__main__nav__list__link" href="<?= site_url('') ?>">
								<div class="l-spMenu__main__nav__list__link__left">
                  <div class="l-spMenu__main__nav__list__link__left__icon">
                    <img class="l-spMenu__main__nav__list__link__left__icon__image home" src="<?= assetsPath('img') ?>icon/home/icon-home.svg" alt="TOP">
                  </div>
									<p class="l-spMenu__main__nav__list__link__left__text">TOP</p>
								</div>
								<div class="icon-btn"></div>
							</a>
						</li>
            <li class="l-spMenu__main__nav__list">
							<a class="l-spMenu__main__nav__list__link" href="<?= site_url('feature/') ?>">
								<div class="l-spMenu__main__nav__list__link__left">
                  <div class="l-spMenu__main__nav__list__link__left__icon">
                    <img class="l-spMenu__main__nav__list__link__left__icon__image feature" src="<?= assetsPath('img') ?>icon/home/icon-feature.svg" alt="特集">
                  </div>
									<p class="l-spMenu__main__nav__list__link__left__text">特集</p>
								</div>
								<div class="icon-btn"></div>
							</a>
						</li>
            <li class="l-spMenu__main__nav__list">
							<a class="l-spMenu__main__nav__list__link" href="<?= site_url('hobby/') ?>">
                <div class="l-spMenu__main__nav__list__link__left">
                  <div class="l-spMenu__main__nav__list__link__left__icon">
                    <img class="l-spMenu__main__nav__list__link__left__icon__image hobby" src="<?= assetsPath('img') ?>icon/home/icon-hobby.svg" alt="趣味">
                  </div>
                  <p class="l-spMenu__main__nav__list__link__left__text">趣味</p>
                </div>
								<div class="icon-btn"></div>
							</a>
						</li>
            <li class="l-spMenu__main__nav__list">
							<a class="l-spMenu__main__nav__list__link" href="<?= site_url('life/') ?>">
                <div class="l-spMenu__main__nav__list__link__left">
                  <div class="l-spMenu__main__nav__list__link__left__icon">
                    <img class="l-spMenu__main__nav__list__link__left__icon__image life" src="<?= assetsPath('img') ?>icon/home/icon-life.svg" alt="生活">
                  </div>
                  <p class="l-spMenu__main__nav__list__link__left__text">生活</p>
                </div>
								<div class="icon-btn"></div>
							</a>
						</li>
            <li class="l-spMenu__main__nav__list">
							<a class="l-spMenu__main__nav__list__link" href="<?= site_url('learn/') ?>">
                <div class="l-spMenu__main__nav__list__link__left">
                  <div class="l-spMenu__main__nav__list__link__left__icon">
                    <img class="l-spMenu__main__nav__list__link__left__icon__image learn" src="<?= assetsPath('img') ?>icon/home/icon-learn.svg" alt="学び">
                  </div>
                  <p class="l-spMenu__main__nav__list__link__left__text">学び</p>
                </div>
								<div class="icon-btn"></div>
							</a>
						</li>
          </ul>
          <div class="l-spMenu__main__searcharea">
						<span class="icon-close js-spMenu__close"></span>
            <form class="m-inputSearch" id="form" action="<?php echo esc_url( home_url() ); ?>" method="get">
              <input class="m-inputSearch__input" id="s-box" name="s" type="text" placeholder="気になるワードを入力してください。">
              <button class="icon-search" type="submit" id="s-btn-area"></button>
            </form>
          </div>
          <?php 
            $articleAllPickup = get_field('article-all-pickup', 'option');
            if($articleAllPickup):
          ?>
          <div class="l-spMenu__main__pickup">
            <p class="l-spMenu__main__pickup__title">Pickup</p>
							<ul class="o-verticallyCardList">
              <?php 
                foreach($articleAllPickup as $articleAll):
                            
                  // サムネイルID
                  if ( has_post_thumbnail($articleAll->ID) ) {
                    $thumbnail =  get_the_post_thumbnail_url($articleAll->ID);
                  } else {
                    $thumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
                  };

                  //
                  $postType = get_post_type_object($articleAll->post_type);
                  $postLabel = $postType->label;

                  //タグを取得
                  $term = search_tags($articleAll->ID);
              ?>

							<li class="m-verticallyCard">
								<a class="m-verticallyCard__inner" href="<?php the_permalink($articleAll) ?>">
									<div class="m-verticallyCard__inner__topper">
                    <div class="m-verticallyCard__inner__topper__image">
                      <img class="m-verticallyCard__inner__topper__image__inner" src="<?= $thumbnail ?>" alt="">
                    </div>
                  </div>
									<div class="m-verticallyCard__inner__footer">
                    <div class="m-verticallyCard__inner__footer__date">2019.08.14</div>
                    <div class="m-verticallyCard__inner__footer__title"><?= $articleAll->post_title ?></div>
										<div class="m-verticallyCard__inner__footer__description">
											<div class="m-verticallyCard__inner__footer__description__text"><?= strip_tags($articleAll->post_content) ?></div>
										</div>
                    <div class="m-classificationArea">
                      <?php	if($term): foreach ($term as $tag ): ?>
                        <object>
                          <a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
                            <?= $tag->name?>
                          </a>
                        </object>
                      <?php  endforeach; endif; ?>
                    </div>
									</div>
								</a>
              </li>
              <?php endforeach; ?>
						</ul>
          </div>
          <?php endif; ?>
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

            $newArrivalTags = get_terms($taxonomies, $args);

            usort($newArrivalTags,"sort_id");

            $sliceNewArrivalTags = array_slice($newArrivalTags,0,10);

            if(count($sliceNewArrivalTags) > 0):

            $termsNameList = [];
            foreach ($sliceNewArrivalTags as $termsName) {
              array_push($termsNameList,$termsName->name);
            }

            $uniqueTermsNameList = array_unique($termsNameList);
          ?>
          <div class="l-spMenu__main__keywords">
            <div class="l-spMenu__main__keywords__title">Keywords</div>
						<ul class="o-classificationList">
              <?php foreach($uniqueTermsNameList as $uniqueTermsName): ?>
							<li class="o-classificationList__tag">
                <a class="o-classificationList__tag__link" href="<?= home_url() .'?s=' .$uniqueTermsName .'&t=tag' ?>">
                  <p class="o-classificationList__tag__link__inner"><?= $uniqueTermsName ?></p>
                </a>
              </li>
              <?php endforeach;?>
						</ul>
          </div>
          <?php endif; ?>
				</div>
      </div>

      <!-- 目標を探す -->
      <div class="l-spSearch is-hidden" id="js-spSearch">
        <header class="l-header">
          <div class="o-headerInner">
            <a class="m-logo" href="<?= site_url() ?>">
              <img class="m-logo__image" src="<?= assetsPath('img') ?>logo/be-topia_headerLogo.svg" alt="be-topia">
            </a>
            <div class="o-headerInner__left">
              <a class="o-headerInner__left__list instagram" href="https://www.instagram.com/be_topia/" target= _blank>
                <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-instagram.svg" alt="instagram公式アカウント">
              </a>
              <a class="o-headerInner__left__list twitter" href="https://twitter.com/be_topia" target= _blank>
                <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-twitter.svg" alt="twitter公式アカウント">
              </a>
              <a class="o-headerInner__left__list facebook" href="https://www.facebook.com/betopia.jp" target= _blank>
                <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-facebook.svg" alt="facebook公式アカウント">
              </a>
            </div>
          </div>
          <div class="o-headerInnerPc">
            <a class="m-logo" href="<?= site_url() ?>">
              <img class="m-logo__image" src="<?= assetsPath('img') ?>logo/be-topia_headerLogo.svg" alt="be-topia">
            </a>
            <div class="o-headerInnerPc__left">
              <ul class="o-headerInnerPc__left__category">
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('feature/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon feature" src="<?= assetsPath('img') ?>icon/home/icon-feature.svg" alt="特集">
                    <p class="o-headerInnerPc__left__category__list__link__text">特集</p>
                  </a>
                </li>
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('hobby/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon hobby" src="<?= assetsPath('img') ?>icon/home/icon-hobby.svg" alt="趣味">
                    <p class="o-headerInnerPc__left__category__list__link__text">趣味</p>
                  </a>
                </li>
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('life/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon life" src="<?= assetsPath('img') ?>icon/home/icon-life.svg" alt="生活">
                    <p class="o-headerInnerPc__left__category__list__link__text">生活</p>
                  </a>
                </li>
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('learn/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon learn" src="<?= assetsPath('img') ?>icon/home/icon-life.svg" alt="学び">
                    <p class="o-headerInnerPc__left__category__list__link__text">学び</p>
                  </a>
                </li>
              </ul>
              <div class="o-headerInnerPc__left__icon">
                <a class="icon-instagram o-headerInnerPc__left__icon__list" href="https://www.instagram.com/be_topia/"></a>
                <a class="icon-twitter o-headerInnerPc__left__icon__list" href="https://twitter.com/be_topia"></a>
                <a class="icon-facebook o-headerInnerPc__left__icon__list" href="https://www.facebook.com/betopia.jp">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </a>
                <div class="icon-search o-headerInnerPc__left__icon__list js-headerInnerPc__Menu"></div>
              </div>
            </div>
          </div>
        </header>
        <div class="l-spSearch__main js-headerInnerPc__search">
          <div class="l-spSearch__main__callout">
            <div class="l-spSearch__main__callout__triangle"></div>
          </div>
          <form class="m-inputSearch" id="form" action="<?php echo esc_url( home_url() ); ?>" method="get">
            <input class="m-inputSearch__input" id="s-box" name="s" type="text" placeholder="気になるワードを入力してください。">
            <button class="icon-search" type="submit" id="s-btn-area"></button>
          </form>
          <?php 
            $articleSearchPickup = get_field('article-search-pickup', 'option');
            if($articleSearchPickup):
          ?>
          <div class="l-spSearch__main__pickup">
            <p class="l-spSearch__main__pickup__title">Pickup</p>
            <ul class="o-verticallyCardList">
              <?php 
                foreach($articleSearchPickup as $articleSearch):
                            
                  // サムネイルID
                  if ( has_post_thumbnail($articleSearch->ID) ) {
                    $thumbnail =  get_the_post_thumbnail_url($articleSearch->ID);
                  } else {
                    $thumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
                  };

                  //
                  $postType = get_post_type_object($articleSearch->post_type);
                  $postLabel = $postType->label;

                  //タグを取得
                  $term = search_tags($articleSearch->ID);
              ?>

							<li class="m-verticallyCard">
								<a class="m-verticallyCard__inner" href="<?php the_permalink($articleSearch) ?>">
									<div class="m-verticallyCard__inner__topper">
                    <div class="m-verticallyCard__inner__topper__image">
                      <img class="m-verticallyCard__inner__topper__image__inner" src="<?= $thumbnail ?>" alt="">
                    </div>
                  </div>
									<div class="m-verticallyCard__inner__footer">
                    <div class="m-verticallyCard__inner__footer__date">2019.08.14</div>
                    <div class="m-verticallyCard__inner__footer__title"><?= $articleSearch->post_title ?></div>
										<div class="m-verticallyCard__inner__footer__description">
											<div class="m-verticallyCard__inner__footer__description__text"><?= strip_tags($articleSearch->post_content) ?></div>
										</div>
                    <div class="m-classificationArea">
                      <?php	if($term): foreach ($term as $tag ): ?>
                        <object>
                          <a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
                            <?= $tag->name?>
                          </a>
                        </object>
                      <?php  endforeach; endif; ?>
                    </div>
									</div>
								</a>
              </li>
              <?php endforeach; ?>
						</ul>
          </div>
          <?php endif;?>
          <div class="l-spSearch__main__keywords">
            <div class="l-spSearch__main__keywords__title">Keywords</div>
              <ul class="o-classificationList">
                <?php 
                  $args = array(
                    'post_type' => array(
                      'feature','hobby', 'life', 'learn',
                    ), //投稿タイプ名
                    'posts_per_page' => 9999, //出力する記事の数
                    'tax_query' => array(
                      'relation' => 'OR',
                      array(
                        'taxonomy' => 'feature_taxonomy', 
                        'field' => 'slug',
                        'terms' => 'goal-search' //タームのスラッグ
                      ),    
                      array(
                        'taxonomy' => 'hobby_taxonomy', 
                        'field' => 'slug',
                        'terms' => 'goal-search' //タームのスラッグ
                      ),    
                      array(
                        'taxonomy' => 'life_taxonomy', 
                        'field' => 'slug',
                        'terms' => 'goal-search' //タームのスラッグ
                      ),    
                      array(
                        'taxonomy' => 'learn_taxonomy', 
                        'field' => 'slug',
                        'terms' => 'goal-search' //タームのスラッグ
                      ),    
                    ),
                    'fields' => 'ids',
                  );

                  $goalSearchArticles = get_posts($args);	
                  $searchTerms = [];

                  foreach($goalSearchArticles as $goalSearchArticle) {
                    $goalSearchArticleTerms = search_tags($goalSearchArticle);
                    
                    foreach($goalSearchArticleTerms as $goalSearchArticleTerm){
                      array_push($searchTerms ,$goalSearchArticleTerm->term_id); 
                    }
                  };

                  $searchTermsUnique = array_unique($searchTerms);
                  asort($searchTermsUnique);
                  $searchTermsUnique = array_values($searchTermsUnique);

                  $termsNameList = [];
                  foreach ($searchTermsUnique as $termsID) {
                    array_push($termsNameList,get_term($termsID)->name);
                  }
            
                  $uniqueTermsNameList = array_unique($termsNameList);

                  foreach($uniqueTermsNameList as $uniqueTermsName):
                ?>
                <li class="o-classificationList__tag">
                  <a class="o-classificationList__tag__link" href="<?= home_url() .'?s=' .$uniqueTermsName .'&t=tag' ?>">
                    <p class="o-classificationList__tag__link__inner">
                      <?= $uniqueTermsName?>
                    </p>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
          </div>
        </div>
      </div>

      <!-- 目標を叶える -->
      <div class="l-spGrant is-hidden" id="js-spGrant">
        <header class="l-header">
          <div class="o-headerInner"><a class="m-logo" href="<?= site_url() ?>">
            <img class="m-logo__image" src="<?= assetsPath('img') ?>logo/be-topia_headerLogo.svg" alt="be-topia"></a>
            <div class="o-headerInner__left">
              <a class="o-headerInner__left__list instagram" href="https://www.instagram.com/be_topia/" target= _blank>
                <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-instagram.svg" alt="instagram公式アカウント">
              </a>
              <a class="o-headerInner__left__list twitter" href="https://twitter.com/be_topia" target= _blank>
                <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-twitter.svg" alt="twitter公式アカウント">
              </a>
              <a class="o-headerInner__left__list facebook" href="https://www.facebook.com/betopia.jp" target= _blank>
                <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-facebook.svg" alt="facebook公式アカウント">
              </a>
            </div>
          </div>
          <div class="o-headerInnerPc"><a class="m-logo" href="<?= site_url() ?>">
            <img class="m-logo__image" src="<?= assetsPath('img') ?>logo/be-topia_headerLogo.svg" alt="be-topia"></a>
            <div class="o-headerInnerPc__left">
              <ul class="o-headerInnerPc__left__category">
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('feature/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon feature" src="<?= assetsPath('img') ?>icon/home/icon-feature.svg" alt="特集">
                    <p class="o-headerInnerPc__left__category__list__link__text">特集</p>
                  </a>
                </li>
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('hobby/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon hobby" src="<?= assetsPath('img') ?>icon/home/icon-hobby.svg" alt="趣味">
                    <p class="o-headerInnerPc__left__category__list__link__text">趣味</p>
                  </a>
                </li>
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('life/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon life" src="<?= assetsPath('img') ?>icon/home/icon-life.svg" alt="生活">
                    <p class="o-headerInnerPc__left__category__list__link__text">生活</p>
                  </a>
                </li>
                <li class="o-headerInnerPc__left__category__list">
                  <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('learn/') ?>">
                    <img class="o-headerInnerPc__left__category__list__link__icon learn" src="<?= assetsPath('img') ?>icon/home/icon-life.svg" alt="学び">
                    <p class="o-headerInnerPc__left__category__list__link__text">学び</p>
                  </a>
                </li>
              </ul>
              <div class="o-headerInnerPc__left__icon">
                <a class="icon-instagram o-headerInnerPc__left__icon__list" href="https://www.instagram.com/be_topia/"></a>
                <a class="icon-twitter o-headerInnerPc__left__icon__list" href="https://twitter.com/be_topia"></a>
                <a class="icon-facebook o-headerInnerPc__left__icon__list" href="https://www.facebook.com/betopia.jp">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </a>
                <div class="icon-search o-headerInnerPc__left__icon__list js-headerInnerPc__Menu"></div>
              </div>
            </div>
          </div>
        </header>
        <div class="l-spGrant__main js-headerInnerPc__grant">
          <div class="l-spGrant__main__triangle"></div>
          <form class="m-inputSearch" id="form" action="<?php echo esc_url( home_url() ); ?>" method="get">
            <input class="m-inputSearch__input" id="s-box" name="s" type="text" placeholder="気になるワードを入力してください。">
            <button class="icon-search" type="submit" id="s-btn-area"></button>
          </form>
          <?php
            $articleGrantPickup = get_field('article-grant-pickup', 'option');
            if($articleGrantPickup):  
          ?>
          <div class="l-spGrant__main__pickup">
            <p class="l-spGrant__main__pickup__title">Pickup</p>
            <ul class="o-verticallyCardList">
              <?php 
                $articleGrantPickup = get_field('article-grant-pickup', 'option');
                foreach($articleGrantPickup as $articleGrant):
                            
                  // サムネイルID
                  if ( has_post_thumbnail($articleGrant->ID) ) {
                    $thumbnail =  get_the_post_thumbnail_url($articleGrant->ID);
                  } else {
                    $thumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
                  };

                  //
                  $postType = get_post_type_object($articleGrant->post_type);
                  $postLabel = $postType->label;

                  //タグを取得
                  $term = search_tags($articleGrant->ID);
              ?>

							<li class="m-verticallyCard">
								<a class="m-verticallyCard__inner" href="<?php the_permalink($articleGrant) ?>">
									<div class="m-verticallyCard__inner__topper">
                    <div class="m-verticallyCard__inner__topper__image">
                      <img class="m-verticallyCard__inner__topper__image__inner" src="<?= $thumbnail ?>" alt="">
                    </div>
                  </div>
									<div class="m-verticallyCard__inner__footer">
                    <div class="m-verticallyCard__inner__footer__date">2019.08.14</div>
                    <div class="m-verticallyCard__inner__footer__title"><?= $articleGrant->post_title ?></div>
										<div class="m-verticallyCard__inner__footer__description">
											<div class="m-verticallyCard__inner__footer__description__text"><?= strip_tags($articleGrant->post_content) ?></div>
										</div>
                    <div class="m-classificationArea">
                      <?php	if($term): foreach ($term as $tag ): ?>
                        <object>
                          <a class="m-classificationArea__tag" href="<?= home_url() .'?s=' .$tag->name .'&t=tag' ?>">
                            <?= $tag->name?>
                          </a>
                        </object>
                      <?php  endforeach; endif; ?>
                    </div>
									</div>
								</a>
              </li>
              <?php endforeach; ?>
						</ul>
          </div>
          <?php endif; ?>
          <div class="l-spGrant__main__keywords">
            <div class="l-spGrant__main__keywords__title">Keywords</div>
              <ul class="o-classificationList">
              <?php 
              $args = array(
                'post_type' => array(
                  'feature','hobby', 'life', 'learn',
                ), //投稿タイプ名
                'posts_per_page' => 9999, //出力する記事の数
                'tax_query' => array(
                  'relation' => 'OR',
                  array(
                    'taxonomy' => 'feature_taxonomy', 
                    'field' => 'slug',
                    'terms' => 'goal-grant' //タームのスラッグ
                  ),    
                  array(
                    'taxonomy' => 'hobby_taxonomy', 
                    'field' => 'slug',
                    'terms' => 'goal-grant' //タームのスラッグ
                  ),    
                  array(
                    'taxonomy' => 'life_taxonomy', 
                    'field' => 'slug',
                    'terms' => 'goal-grant' //タームのスラッグ
                  ),    
                  array(
                    'taxonomy' => 'learn_taxonomy', 
                    'field' => 'slug',
                    'terms' => 'goal-grant' //タームのスラッグ
                  ),    
                ),
                'fields' => 'ids',
              );

              $goalGrantArticles = get_posts($args);	
              $grantTerms = [];

              foreach($goalGrantArticles as $goalGrantArticle) {
                $goalGrantArticleTerms = search_tags($goalGrantArticle);
                
                foreach($goalGrantArticleTerms as $goalGrantArticleTerm){
                  array_push($grantTerms ,$goalGrantArticleTerm->term_id); 
                }
              };

              $grantTermsUnique = array_unique($grantTerms);
              asort($grantTermsUnique);
              $grantTermsUnique = array_values($grantTermsUnique);

              $termsNameList = [];
              foreach ($grantTermsUnique as $termsID) {
                array_push($termsNameList,get_term($termsID)->name);
              }
        
              $uniqueTermsNameList = array_unique($termsNameList);

              foreach($uniqueTermsNameList as $uniqueTermsName):
        ?>
            <li class="o-classificationList__tag">
              <a class="o-classificationList__tag__link" href="<?= home_url() .'?s=' .$uniqueTermsName .'&t=tag' ?>">
                <p class="o-classificationList__tag__link__inner">
                  <?= $uniqueTermsName?>
                </p>
              </a>
            </li>
            <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>

  <!-- pc用header -->
	<header class="l-header">
		<div class="o-headerInner">
			<a class="m-logo" href="<?= home_url() ?>/">
				<img class="m-logo__image" src="<?= assetsPath('img') ?>logo/be-topia_headerLogo.svg" alt="be-topia">
			</a>
			<div class="o-headerInner__left">
        <a class="o-headerInner__left__list instagram" href="https://www.instagram.com/be_topia/" target= _blank>
          <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-instagram.svg" alt="instagram公式アカウント">
        </a>
        <a class="o-headerInner__left__list twitter" href="https://twitter.com/be_topia" target= _blank>
          <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-twitter.svg" alt="twitter公式アカウント">
        </a>
        <a class="o-headerInner__left__list facebook" href="https://www.facebook.com/betopia.jp" target= _blank>
          <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-facebook.svg" alt="facebook公式アカウント">
        </a>
			</div>
		</div>
		<div class="o-headerInnerPc"><a class="m-logo" href="<?= site_url('') ?>"><img class="m-logo__image" src="<?= assetsPath('img') ?>logo/be-topia_headerLogo.svg" alt="be-topia"></a>
			<div class="o-headerInnerPc__left">
				<ul class="o-headerInnerPc__left__category">
					<li class="o-headerInnerPc__left__category__list">
            <a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('feature/') ?>">
              <div class="o-headerInnerPc__left__category__list__link__icon">
                <img class="o-headerInnerPc__left__category__list__link__icon__inner feature" src="<?= assetsPath('img') ?>icon/home/icon-feature.svg" alt="特集">
              </div>
              <p class="o-headerInnerPc__left__category__list__link__text">特集</p>
						</a>
					</li>
					<li class="o-headerInnerPc__left__category__list">
						<a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('hobby/') ?>">
              <div class="o-headerInnerPc__left__category__list__link__icon">
                <img class="o-headerInnerPc__left__category__list__link__icon__inner hobby" src="<?= assetsPath('img') ?>icon/home/icon-hobby.svg" alt="趣味">
              </div>
                <p class="o-headerInnerPc__left__category__list__link__text">趣味</p>
						</a>
					</li>
					<li class="o-headerInnerPc__left__category__list">
						<a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('life/') ?>">
              <div class="o-headerInnerPc__left__category__list__link__icon">
                <img class="o-headerInnerPc__left__category__list__link__icon__inner life" src="<?= assetsPath('img') ?>icon/home/icon-life.svg" alt="生活">
              </div>
              <p class="o-headerInnerPc__left__category__list__link__text">生活</p>
						</a>
					</li>
					<li class="o-headerInnerPc__left__category__list">
						<a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('learn/') ?>">
              <div class="o-headerInnerPc__left__category__list__link__icon">
                <img class="o-headerInnerPc__left__category__list__link__icon__inner learn" src="<?= assetsPath('img') ?>icon/home/icon-learn.svg" alt="学び">
              </div>
              <p class="o-headerInnerPc__left__category__list__link__text">学び</p>
						</a>
					</li>
				</ul>
				<ul class="o-headerInnerPc__left__button">
					<li class="o-headerInnerPc__left__button__list js-headerInnerPc__search">
            <div class="o-headerInnerPc__left__button__list__inner">
              <div class="o-headerInnerPc__left__button__list__inner__icon">
                <img class="search js-headerInnerPc__search__icon" src="<?= assetsPath('img') ?>icon/header-search.svg">
                <div class="o-headerInnerPc__left__button__list__inner__icon__triangle js-headerInnerPc__search__triangle">
                  <div class="o-headerInnerPc__left__button__list__inner__icon__triangle__inner">
                    <div class="o-headerInnerPc__left__button__list__inner__icon__triangle__inner__back">
                    </div>
                    <div class="o-headerInnerPc__left__button__list__inner__icon__triangle__inner__front">
                    </div>
                  </div>
                </div>
              </div>
              <p class="o-headerInnerPc__left__button__list__inner__text">したい・ほしいを<br><strong>探す</strong></p>
            </div>
					</li>
					<li class="o-headerInnerPc__left__button__list js-headerInnerPc__grant">
            <div class="o-headerInnerPc__left__button__list__inner">
              <div class="o-headerInnerPc__left__button__list__inner__icon">
                <img class="star js-headerInnerPc__grant__icon" src="<?= assetsPath('img') ?>icon/header-star.svg">
                <div class="o-headerInnerPc__left__button__list__inner__icon__triangle js-headerInnerPc__grant__triangle">
                  <div class="o-headerInnerPc__left__button__list__inner__icon__triangle__inner">
                    <div class="o-headerInnerPc__left__button__list__inner__icon__triangle__inner__back">
                    </div>
                    <div class="o-headerInnerPc__left__button__list__inner__icon__triangle__inner__front">
                    </div>
                  </div>
                </div>
              </div>
              <p class="o-headerInnerPc__left__button__list__inner__text">したい・ほしいを<br><strong>叶える</strong></p>
            </div>
					</li>
				</ul>
				<div class="o-headerInnerPc__left__icon">
          <div class="o-headerInnerPc__left__icon__list">
            <a class="o-headerInnerPc__left__icon__list__item instagram" href="https://www.instagram.com/be_topia/"target= _blank >
              <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-instagram.svg" alt="instagram公式アカウント">
            </a>
            <a class="o-headerInnerPc__left__icon__list__item twitter" href="https://twitter.com/be_topia" target= _blank>
              <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-twitter.svg" alt="twitter公式アカウント">
            </a>
            <a class="o-headerInnerPc__left__icon__list__item facebook" href="https://www.facebook.com/betopia.jp" target= _blank>
              <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-facebook.svg" alt="facebook公式アカウント">
            </a>
            <div class="o-headerInnerPc__left__icon__list__item search js-headerInnerPc__Menu">
              <img src="<?= assetsPath('img') ?>logo/sns/simple/logo-search.svg" alt="検索アイコン">
            </div>
          </div>
  			</div>
			</div>
		</div>
	</header>
