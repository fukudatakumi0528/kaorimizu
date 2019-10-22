<?php
/**
 *  定数:定数はここに全部書いてください
 *  定数名は単語毎「_」区切りで全て大文字にすること
 *  使用方法のコメントを必ず残すこと
 */


// 自動アップデートは停止

//オブジェクトの配列を、昇順に並び替えるときに使用。
function sort_count( $a , $b){
  $sort_terms = strcmp( $b->count , $a->count ); //記事数で並び替え
  
  return $sort_terms;
};

function serach_tags( $articleObjectId ) {
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
