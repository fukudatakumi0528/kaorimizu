<?php
/**
 *  定数:定数はここに全部書いてください
 *  定数名は単語毎「_」区切りで全て大文字にすること
 *  使用方法のコメントを必ず残すこと
 */


// 自動アップデートは停止

//オブジェクトの配列を、記事数順の昇順に並び替えるときに使用。
function sort_count( $a , $b){
  $sort_terms = strcmp( $b->count , $a->count ); //記事数で並び替え
  
  return $sort_terms;
};

//オブジェクトの配列を、記事数順の昇順に並び替えるときに使用。
function sort_id( $a , $b){
  $sort_terms = strcmp( $b->term_id , $a->term_id ); //記事数で並び替え
  
  return $sort_terms;
};


function search_tags( $articleObjectId ) {
  $termType = get_post_taxonomies($articleObjectId);
  foreach ($termType as $termTag) {

    switch ($termTag) {
      case "feature_tag":
          $termTagType = $termTag;
          break;
      case "hobby_tag":
          $termTagType = $termTag;
          break;
      case "life_tag":
          $termTagType = $termTag;
          break;
      case "learn_tag":
          $termTagType = $termTag;
          break;
      }
  };
  return  get_the_terms($articleObjectId, $termTagType);
};

function article_new_arrival($articleObjectId) {
  $days = 7;
  $today = date_i18n('U');
  $entry_day = get_the_time('U',$articleObjectId);
  $keika = date('U',($today - $entry_day)) / 86400;
  if ( $days > $keika ) {
    return true;
  } else {
    return false;
  };
}
