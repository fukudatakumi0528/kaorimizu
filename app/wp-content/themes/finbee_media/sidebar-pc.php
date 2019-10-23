<div class="t-sideBarPc">
  <?php get_template_part('ranking'); ?>
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

    if(count($rankingPopularTags) > 0):
  ?>

  <div class="t-sideBarPc__keyword">
    <div class="t-sideBarPc__keyword__header">
      <div class="t-sideBarPc__keyword__header__tilte">人気のワード</div>
      <div class="t-sideBarPc__keyword__header__subtitle">Ranking</div>
    </div>
    <ul class="o-classificationList">
      <?php foreach($rankingPopularTags as $rankingPopularTag): ?>
        <li class="o-classificationList__tag">
          <a class="o-classificationList__tag__link" href="<?= get_category_link($rankingPopularTag->term_id);?>">
            <p class="o-classificationList__tag__link__inner"><?= $rankingPopularTag->name ?></p>
          </a>
        </li>
      <?php endforeach;?>
    </ul>
  </div>
  <?php endif; ?>
  <div class="t-sideBarPc__downlord">
    <div class="t-sideBarPc__downlord__inner"><img class="t-sideBarPc__downlord__inner__image" src="<?php echo assetsPath('img') ?>common/footer/download.png" alt="">
      <div class="t-sideBarPc__downlord__inner__main">
        <div class="t-sideBarPc__downlord__inner__main__link">
          <button class="t-sideBarPc__downlord__inner__main__link__AppStore"><a href="https://apps.apple.com/jp/app/finbee-%E3%82%A2%E3%83%97%E3%83%AA%E3%81%A7%E8%B2%AF%E9%87%91-%E6%A5%BD%E3%81%97%E3%81%8F%E3%81%8A%E9%87%91%E3%82%92%E8%B2%AF%E3%82%81%E3%82%8B%E8%B2%AF%E9%87%91%E3%82%A2%E3%83%97%E3%83%AA/id1182852315?mt=8" style="display:inline-block;overflow:hidden;background:url(https://linkmaker.itunes.apple.com/ja-jp/badge-lrg.svg?releaseDate=2016-12-26&amp;kind=iossoftware&amp;bubble=ios_apps) no-repeat;width:135px;height:40px;"></a></button>
          <button class="t-sideBarPc__downlord__inner__main__link__GooglePlay"><a href="https://play.google.com/store/apps/details?id=jp.co.nestegg.finbee&amp;hl=ja&amp;pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1"><img alt="Google Play で手に入れよう" src="https://play.google.com/intl/ja/badges/images/generic/ja_badge_web_generic.png" width="155"></a></button>
        </div>
      </div>
    </div>
  </div>
</div>