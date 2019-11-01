<?php
/************************************************
 * サイト内検索の範囲に、カテゴリー名、タグ名、を含める
************************************************/
function custom_search($search, $wp_query) {
  global $wpdb;
  
  //サーチページ以外だったら終了
  if (!$wp_query->is_search)
      return $search;
  
  if (!isset($wp_query->query_vars))
      return $search;
  
  // ユーザー名とか、タグ名・カテゴリ名も検索対象に

  if(is_search()) {
    // カスタム投稿タイプを検索結果に含める
    $search .= "AND (post_type = 'feature' OR post_type='hobby' OR post_type='life' OR post_type='learn')";
  }

  /*
  $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
  if ( count($search_words) > 0 ) {
      $search = '';
      foreach ( $search_words as $word ) {
          if ( !empty($word) ) {
              $search_word = $wpdb->escape("%{$word}%");
              $search .= " AND (
                      {$wpdb->posts}.post_title LIKE '{$search_word}'
                      OR {$wpdb->posts}.post_content LIKE '{$search_word}'
                      OR {$wpdb->posts}.ID IN (
                          SELECT distinct r.object_id
                          FROM {$wpdb->term_relationships} AS r
                          INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
                          INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
                          WHERE t.name LIKE '{$search_word}'
                      OR t.slug LIKE '{$search_word}'
                      OR tt.description LIKE '{$search_word}'
                      )
              ) ";
          }
      }
  }
  */
  
  return $search;
}
add_filter('posts_search','custom_search', 10, 2);
