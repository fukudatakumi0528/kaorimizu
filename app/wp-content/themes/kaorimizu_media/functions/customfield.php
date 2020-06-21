<?php
  if( function_exists('acf_add_options_page') ) {
    // 全カテゴリ（PICK UP）
    acf_add_options_page(array(
      'page_title'     => '全カテゴリ（PICK UP）',
      'menu_title'    => '全カテゴリ（PICK UP）',
      'menu_slug'     => 'article-all-pickup',
      'capability'    => 'edit_posts',
      'redirect'        => true,
      'icon_url'    => 'dashicons-tag'
    ));
    // 目標を探す（PICK UP）
    acf_add_options_page(array(
      'page_title'     => '目標を探す（PICK UP）',
      'menu_title'    => '目標を探す（PICK UP）',
      'menu_slug'     => 'article-search-pickup',
      'capability'    => 'edit_posts',
      'redirect'        => true,
      'icon_url'    => 'dashicons-tag'
    ));
    // 目標を叶える（PICK UP）
    acf_add_options_page(array(
      'page_title'     => '目標を叶える（PICK UP）',
      'menu_title'    => '目標を叶える（PICK UP）',
      'menu_slug'     => 'article-grant-pickup',
      'capability'    => 'edit_posts',
      'redirect'        => true,
      'icon_url'    => 'dashicons-tag'
    ));
    // 純広告（ランキング上部）
    acf_add_options_page(array(
      'page_title'     => '純広告（ランキング上部）',
      'menu_title'    => '純広告（ランキング上部）',
      'menu_slug'     => 'article-ad-ranking',
      'capability'    => 'edit_posts',
      'redirect'        => true,
      'icon_url'    => 'dashicons-tag'
    ));    
    // 純広告（記事詳細下部1）
    acf_add_options_page(array(
      'page_title'     => '純広告（記事詳細下部1）',
      'menu_title'    => '純広告（記事詳細下部1）',
      'menu_slug'     => 'article-ad-under-1',
      'capability'    => 'edit_posts',
      'redirect'        => true,
      'icon_url'    => 'dashicons-tag'
    ));    
    // 純広告（記事詳細下部2）
    acf_add_options_page(array(
      'page_title'     => '純広告（記事詳細下部2）',
      'menu_title'    => '純広告（記事詳細下部2）',
      'menu_slug'     => 'article-ad-under-2',
      'capability'    => 'edit_posts',
      'redirect'        => true,
      'icon_url'    => 'dashicons-tag'
    ));    

  }