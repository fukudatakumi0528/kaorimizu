<div class="m-titleBorder">
  <div class="m-titleBorder__main">
    <div class="m-titleBorder__main__text">人気記事<small>Ranking</small></div>
    <div class="m-titleBorder__main__border"></div>
  </div>
</div>
<ul class="t-rankingArea__tab">
  <li class="t-rankingArea__tab__list tab-month is-active">
    <p class="t-rankingArea__tab__list__text">月間</p>
  </li>
  <li class="t-rankingArea__tab__list tab-weekly">
    <p class="t-rankingArea__tab__list__text">週間</p>
  </li>
  <li class="t-rankingArea__tab__list tab-all">
    <p class="t-rankingArea__tab__list__text">すべて</p>
  </li>
</ul>
<div class="t-rankingArea__slider">
  <div class="t-rankingArea__slider__arrow js__arrow-top__ranking__month is-active">
    <div class="slick-next">
      <span class="icon-arrow2">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span>
      </span>
    </div>
    <div class="slick-prev">
      <span class="icon-arrow2">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span>
      </span>
    </div>
  </div>
  <div class="t-rankingArea__slider__arrow js__arrow-top__ranking__weekly">
    <div class="slick-next">
      <span class="icon-arrow2">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span>
      </span>
    </div>
    <div class="slick-prev">
      <span class="icon-arrow2">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span>
      </span>
    </div>
  </div>
  <div class="t-rankingArea__slider__arrow js__arrow-top__ranking__all">
    <div class="slick-next">
      <span class="icon-arrow2">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span>
      </span>
    </div>
    <div class="slick-prev">
      <span class="icon-arrow2">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span>
      </span>
    </div>
  </div>
  <ul class="t-rankingArea__slider__inner js-slickSlider-top__ranking__month is-active">
    <?php
      $simpleGaArgsMonth = array(
        'display_count' => 5, //5件表示
        'period' => 30, //30日間のデータからランキング
        'post_type' => array(
          'feature', 'hobby', 'life', 'learn', //記事のみ 
        ),
      );

      $rankingDataMonth = sga_ranking_get_date($simpleGaArgsMonth);

      $articlesRankingAllNumber = 0;

      foreach($rankingDataMonth as $articleIdMonth):

        $articleRankingMonth = get_post($articleIdMonth);

        $articlesRankingMonthNumber += 1;

        // サムネイルID
        if ( has_post_thumbnail($articleRankingMonth->ID) ) {
          $thumbnail =  get_the_post_thumbnail_url($articleRankingMonth->ID);
        } else {
          $thumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
        };

        //
        $postType = get_post_type_object($articleRankingMonth->post_type);
        $postLabel = $postType->label;

        //タグを取得
        $term = search_tags($articleRankingMonth->ID);
    ?>
    <li class="m-squareCard">
      <a class="m-squareCard__inner" href="<?php the_permalink($articleRankingMonth) ?>">
        <?php if($articlesRankingMonthNumber < 4): ?>
          <div class="m-squareCard__inner__ranking">
            <span class="icon-label m-squareCard__inner__ranking__icon">
              <span class="path1"></span>
               <span class="rank-<?= $articlesRankingMonthNumber ?> path2"></span>
              <span class="path3"></span>
            </span>
            <div class="m-squareCard__inner__ranking__rank">
              <p class="m-squareCard__inner__ranking__rank__text"><small>No.</small><strong><?= $articlesRankingMonthNumber ?></strong></p>
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
            <p class="m-squareCard__inner__footer__title__text"><?= $articleRankingMonth->post_title ?></p>
          </div>
          <div class="m-squareCard__inner__footer__description">
            <div class="m-squareCard__inner__footer__description__text">
              <?= get_the_custom_excerpt( $articleRankingMonth->post_content, 100 ) ?>
            </div>
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
  <ul class="t-rankingArea__slider__inner js-slickSlider-top__ranking__weekly">
  <?php
      $simpleGaArgsWeekly = array(
        'display_count' => 5, //5件表示
        'period' => 7, //7日間のデータからランキング
        'post_type' => array(
          'feature', 'hobby', 'life', 'learn', //記事のみ 
        ),
      );

      $rankingDataWeekly = sga_ranking_get_date($simpleGaArgsWeekly);

      $articlesRankingAllNumber = 0;

      foreach($rankingDataWeekly as $articleIdWeekly):

      $articleRankingWeekly = get_post($articleIdWeekly);

      $articlesRankingWeeklyNumber += 1;


      // サムネイルID
      if ( has_post_thumbnail($articleRankingWeekly->ID) ) {
        $thumbnail =  get_the_post_thumbnail_url($articleRankingWeekly->ID);
      } else {
        $thumbnail = assetsPath('img') . "/logo/be-topia_thumbnail.jpg";
      };

      //
      $postType = get_post_type_object($articleRankingWeekly->post_type);
      $postLabel = $postType->label;

      //タグを取得
      $term = search_tags($articleRankingWeekly->ID);
    ?>
    <li class="m-squareCard">
      <a class="m-squareCard__inner" href="<?php the_permalink($articleRankingWeekly) ?>">
        <?php if($articlesRankingWeeklyNumber < 4): ?>
          <div class="m-squareCard__inner__ranking">
            <span class="icon-label m-squareCard__inner__ranking__icon">
              <span class="path1"></span>
               <span class="rank-<?= $articlesRankingWeeklyNumber ?> path2"></span>
              <span class="path3"></span>
            </span>
            <div class="m-squareCard__inner__ranking__rank">
              <p class="m-squareCard__inner__ranking__rank__text"><small>No.</small><strong><?= $articlesRankingWeeklyNumber ?></strong></p>
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
            <p class="m-squareCard__inner__footer__title__text"><?= $articleRankingWeekly->post_title ?></p>
          </div>
          <div class="m-squareCard__inner__footer__description">
            <div class="m-squareCard__inner__footer__description__text">
              <?= get_the_custom_excerpt( $articleRankingWeekly->post_content, 100 ) ?>
            </div>
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
  <ul class="t-rankingArea__slider__inner js-slickSlider-top__ranking__all">
  <?php
    $simpleGaArgsAll = array(
      'display_count' => 5, //5件表示
      'period' => 365, //365日間(過去１年)のデータからランキング
      'post_type' => array(
        'feature', 'hobby', 'life', 'learn', //記事のみ 
      ),
    );

    $rankingDataAll = sga_ranking_get_date($simpleGaArgsAll);

    $articlesRankingAllNumber = 0;

    foreach($rankingDataAll as $articleIdAll):

    $articleRankingAll = get_post($articleIdAll);

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
            <div class="m-squareCard__inner__footer__description__text">
              <?= get_the_custom_excerpt( $articleRankingAll->post_content, 100 ) ?>
            </div>
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
</div>
