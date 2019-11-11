<?php
	global $cssName;
	global $scriptName;
	$cssName = "disclaimer/index";
	$scriptName = "disclaimer/index";

	get_header();
?>
<main>
  <section class="p-disclaimer__topper">
    <div class="o-topperSection">
      <div class="o-topperSection__main">
        <div class="o-topperSection__main__title">
          <div class="o-topperSection__main__title__text">
            <h1 class="o-topperSection__main__title__text__main">免責事項</h1>
            <p class="o-topperSection__main__title__text__sub">Disclaimer</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="p-disclaimer__main">

    <ul class="t-rankingArea__slider__inner">
    <?php
      $args = array(
        'display_count' => 5, //10件表示
        'period' => 30, //30日間のデータからランキング
        'post_type' => array(
          'feature', 'hobby', 'life', 'learn', //記事のみ 
        ),
      );

      $ranking_data = sga_ranking_get_date($args);

      var_dump($ranking_data);
      $articlesRankingAllNumber = 0;

      foreach($ranking_data as $articleID):

      $articleRankingAll = get_post($articleID);

      $articlesRankingAllNumber += 1;

      // サムネイルID
      if ( has_post_thumbnail($articleRankingAll->ID) ) {
        $thumbnail =  get_the_post_thumbnail_url($articleRankingAll->ID);
      } else {
        $thumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
      };

      //
      $postType = get_post_type_object($articleRankingAll->post_type);
      $postLabel = $postType->label;

      //タグを取得
      $term = search_tags($articleRankingAll->ID);
    ?>
      <li class="m-squareCard">
        <a class="m-squareCard__inner" href="<?php the_permalink($articleRankingAll) ?>">
          <?php if($articlesRankingAllNumber < 4): ?>
            <div class="m-squareCard__inner__ranking">
              <span class="icon-label m-squareCard__inner__ranking__icon">
                <span class="path1"></span>
                <span class="rank-<?= $articlesRankingAllNumber ?> path2"></span>
                <span class="path3"></span>
              </span>
              <div class="m-squareCard__inner__ranking__rank">
                <p class="m-squareCard__inner__ranking__rank__text"><small>No.</small><strong><?= $articlesRankingAllNumber ?></strong></p>
              </div>
            </div>
          <?php endif;?>
          <div class="m-squareCard__inner__topper">
            <img class="m-squareCard__inner__topper__image" src="<?= $thumbnail ?>" alt="">
          </div>
          <div class="m-squareCard__inner__footer">
            <div class="m-squareCard__inner__footer__sign">
              <div class="m-squareCard__inner__footer__sign__text"><?= $postLabel ?></div>
            </div>
            <div class="m-squareCard__inner__footer__title" >
              <p class="m-squareCard__inner__footer__title__text"><?= $articleRankingAll->post_title ?></p>
            </div>
            <div class="m-squareCard__inner__footer__description">
              <div class="m-squareCard__inner__footer__description__text"><?= strip_tags($articleRankingAll->post_content) ?></div>
            </div>
            <div class="m-squareCard__inner__footer__classification">
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
          </div>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </section>
</main>
<?php get_footer() ?>
