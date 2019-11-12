<?php
  if( function_exists('acf_add_options_page') ) {
    // メインビジュアルスライダー
    acf_add_options_page(array(
      'page_title'     => 'トップスライダー',
      'menu_title'    => 'トップスライダー',
      'menu_slug'     => 'top-slider',
      'capability'    => 'edit_posts',
      'redirect'        => true,
      'icon_url'    => 'dashicons-tag'
    ));
    // トップページ一覧（特集、趣味等）
    acf_add_options_page(array(
      'page_title'     => 'トップページ一覧',
      'menu_title'    => 'トップページ一覧',
      'menu_slug'     => 'top-popular',
      'capability'    => 'edit_posts',
      'redirect'        => true,
      'icon_url'    => 'dashicons-tag'
    ));
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
  }