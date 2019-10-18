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
    // トップページ一覧（特集、趣味等）
    acf_add_options_page(array(
      'page_title'     => '人気タグ一覧',
      'menu_title'    => '人気タグ一覧',
      'menu_slug'     => 'popular-tags',
      'capability'    => 'edit_posts',
      'redirect'        => true,
      'icon_url'    => 'dashicons-tag'
    ));
  }