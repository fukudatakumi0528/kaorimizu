<?php


/* 管理画面関連 -------------------------------*/

// 使用しないメニューを非表示にする
// function remove_admin_menus() {
//     global $menu;
    // unsetで非表示にするメニューを指定
    // unset($menu[2]);      // ダッシュボード
    // unset($menu[5]);      // 投稿
    // unset($menu[10]);     // メディア
    // unset($menu[20]);     // 固定ページ
    // unset($menu[25]);     // コメント
    // unset($menu[60]);     // 外観
    // unset($menu[65]);     // プラグイン
    // unset($menu[70]);     // ユーザー
    // unset($menu[75]);     // ツール
    // unset($menu[80]);     // 設定
// }
// add_action('admin_menu', 'remove_admin_menus');


// エディタで自動整形制御 （htmlテキストエディタでpタグを自動生成させない）
add_action('init', function() {
    remove_filter('the_title', 'wptexturize');
    remove_filter('the_content', 'wptexturize');
    remove_filter('the_excerpt', 'wptexturize');
    remove_filter('the_title', 'wpautop');
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('the_editor_content', 'wp_richedit_pre');
});

add_filter('tiny_mce_before_init', function($init) {
    $init['wpautop'] = false;
    $init['apply_source_formatting'] = ture;
    return $init;
});

// カスタムメニュー有効化
register_nav_menu('globalnavi', 'グローバルナビゲーション');



/*
// 固定ページのビジュアルエディタ無効化
function disable_visual_editor_in_page(){
    global $typenow;
    if( $typenow == 'page' ){
        add_filter('user_can_richedit', 'disable_visual_editor_filter');
    }
}
function disable_visual_editor_filter(){
    return false;
}
add_action( 'load-post.php', 'disable_visual_editor_in_page' );
add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );
*/



// カテゴリーをラジオボタンに変更
if(strstr($_SERVER['REQUEST_URI'], 'wp-admin/post.php')) {
    ob_start('one_category_only');
}
if(strstr($_SERVER['REQUEST_URI'], 'wp-admin/post-new.php')) {
    ob_start('one_category_only');
}
function one_category_only($content) {
    $content = str_replace('type="checkbox" name="post_category', 'type="radio" name="post_category', $content);
    return $content;
}

// タクソノミーをラジオボタンに変更するときは使用
/*
if(strstr($_SERVER['REQUEST_URI'], 'wp-admin/post.php')) {
    ob_start('one_type_only');
}
if(strstr($_SERVER['REQUEST_URI'], 'wp-admin/post-new.php?post_type=works')) {
    ob_start('one_type_only');
}
function one_type_only($content) {
    $content = str_replace('type="checkbox" name="tax_input[type]', 'type="radio" name="tax_input[type]', $content);
	$content = str_replace('type="checkbox" name="tax_input[taste]', 'type="radio" name="tax_input[taste]', $content);
	$content = str_replace('type="checkbox" name="tax_input[case]', 'type="radio" name="tax_input[case]', $content);
	$content = str_replace('type="checkbox" name="tax_input[area]', 'type="radio" name="tax_input[area]', $content);
	$content = str_replace('type="checkbox" name="tax_input[date]', 'type="radio" name="tax_input[date]', $content);
    return $content;
}
*/

/* 投稿名変更・カスタム投稿・カスタム分類（タクソノミー）関連 ------------*/

// カスタム投稿登録

//特集
function register_cpt_feature() {
    //カスタム投稿の部分を任意の文字列へ変更
    $labels = array(
        'name'               => _x( '特集', 'feature' ),
        'singular_name'      => _x( '特集', 'feature' ),
        'add_new'            => _x( '新規追加', 'feature' ),
        'add_new_item'       => _x( '新しい特集を追加', 'feature' ),
        'edit_item'          => _x( '特集を編集', 'feature' ),
        'new_item'           => _x( '特集を追加', 'feature' ),
        'view_item'          => _x( '特集を見る', 'feature' ),
        'search_items'       => _x( '特集検索', 'feature' ),
        'not_found'          => _x( '特集はありません', 'feature' ),
        'not_found_in_trash' => _x( 'ゴミ箱に特集はありません', 'feature' ),
        'parent_item_colon'  => _x( '親 特集:', 'feature' ),
        'menu_name'          => _x( '特集', 'feature' ),
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 5,                          // この投稿タイプが表示されるメニューの位置。5で投稿の下
        'menu_icon'     => 'dashicons-format-aside',  // 管理画面のメニューアイコン名 https://developer.wordpress.org/resource/dashicons/
        'supports'      => array(                      // このカスタム投稿内で使用する機能
            'title',  // 記事タイトル
            'editor',  // 記事本文
            'thumbnail',  // アイキャッチ画像
            'revisions',  // リビジョン
            'custom-fields'
        ),
        'taxonomies'    => array( 'type', ),       // このカスタム投稿で使用するカスタム分類
        'has_archive'   => true,                       // この投稿タイプのアーカイブを有効にする
    );

    register_post_type( 'feature', $args );

    // カスタム分類（タクソノミー）登録
    register_taxonomy(
        'feature_taxonomy',                 // カスタム分類の名前
        'feature',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'カテゴリ',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
	$labels = array(
		'name'                       => _x( 'タグ', 'taxonomy general name' ),
		'singular_name'              => _x( 'タグ', 'taxonomy singular name' ),
		'search_items'               => __( 'タグ検索' ),
		'popular_items'              => __( '人気のタグ' ),
		'all_items'                  => __( '全てのタグ' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'タグを編集' ),
		'update_item'                => __( 'タグを更新' ),
		'add_new_item'               => __( '新規タグ追加' ),
		'new_item_name'              => __( 'タグを新規追加' ),
		'add_or_remove_items'        => __( 'Add or remove writers' ),
		'choose_from_most_used'      => __( 'Choose from the most used writers' ),
		'not_found'                  => __( 'タグがありません' ),
		'menu_name'                  => __( 'タグ' ),
    );
    register_taxonomy(
        'feature_tag',                 // カスタム分類の名前
        'feature',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'タグ',   // カスタム分類表示名
			'labels' => $labels,
            'hierarchical' => true,   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
			'show_ui' => true,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'show_tagcloud' => true,
        )
    );
}
add_action( 'init', 'register_cpt_feature' );




//趣味
function register_cpt_hobby() {
//カスタム投稿の部分を任意の文字列へ変更
    $labels = array(
        'name'               => _x( '趣味', 'hobby' ),
        'singular_name'      => _x( '趣味', 'hobby' ),
        'add_new'            => _x( '新規追加', 'hobby' ),
        'add_new_item'       => _x( '新しい趣味を追加', 'hobby' ),
        'edit_item'          => _x( '趣味を編集', 'hobby' ),
        'new_item'           => _x( '趣味を追加', 'hobby' ),
        'view_item'          => _x( '趣味を見る', 'hobby' ),
        'search_items'       => _x( '趣味検索', 'hobby' ),
        'not_found'          => _x( '趣味はありません', 'hobby' ),
        'not_found_in_trash' => _x( 'ゴミ箱に趣味はありません', 'hobby' ),
        'parent_item_colon'  => _x( '親 趣味:', 'hobby' ),
        'menu_name'          => _x( '趣味', 'hobby' ),
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 5,                          // この投稿タイプが表示されるメニューの位置。5で投稿の下
        'menu_icon'     => 'dashicons-format-aside',  // 管理画面のメニューアイコン名 https://developer.wordpress.org/resource/dashicons/
        'supports'      => array(                      // このカスタム投稿内で使用する機能
            'title',  // 記事タイトル
            'editor',  // 記事本文
            'thumbnail',  // アイキャッチ画像
            'revisions',  // リビジョン
            'custom-fields'
        ),
        'taxonomies'    => array( 'type', ),       // このカスタム投稿で使用するカスタム分類
        'has_archive'   => true,                        // この投稿タイプのアーカイブを有効にする
    );

    register_post_type( 'hobby', $args );

    // カスタム分類（タクソノミー）登録
    register_taxonomy(
        'hobby_taxonomy',                 // カスタム分類の名前
        'hobby',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'カテゴリ',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    $labels = array(
        'name'                       => _x( 'タグ', 'taxonomy general name' ),
        'singular_name'              => _x( 'タグ', 'taxonomy singular name' ),
        'search_items'               => __( 'タグ検索' ),
        'popular_items'              => __( '人気のタグ' ),
        'all_items'                  => __( '全てのタグ' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'タグを編集' ),
        'update_item'                => __( 'タグを更新' ),
        'add_new_item'               => __( '新規タグ追加' ),
        'new_item_name'              => __( 'タグを新規追加' ),
        'add_or_remove_items'        => __( 'Add or remove writers' ),
        'choose_from_most_used'      => __( 'Choose from the most used writers' ),
        'not_found'                  => __( 'タグがありません' ),
        'menu_name'                  => __( 'タグ' ),
    );
    register_taxonomy(
        'hobby_tag',                 // カスタム分類の名前
        'hobby',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'タグ',   // カスタム分類表示名
            'labels' => $labels,
            'hierarchical' => true,   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'show_tagcloud' => true,
        )
    );
}
add_action( 'init', 'register_cpt_hobby' );




//生活
function register_cpt_life() {
//カスタム投稿の部分を任意の文字列へ変更
    $labels = array(
        'name'               => _x( '生活', 'life' ),
        'singular_name'      => _x( '生活', 'life' ),
        'add_new'            => _x( '新規追加', 'life' ),
        'add_new_item'       => _x( '新しい生活を追加', 'life' ),
        'edit_item'          => _x( '生活を編集', 'life' ),
        'new_item'           => _x( '生活を追加', 'life' ),
        'view_item'          => _x( '生活を見る', 'life' ),
        'search_items'       => _x( '生活検索', 'life' ),
        'not_found'          => _x( '生活はありません', 'life' ),
        'not_found_in_trash' => _x( 'ゴミ箱に生活はありません', 'life' ),
        'parent_item_colon'  => _x( '親 生活:', 'life' ),
        'menu_name'          => _x( '生活', 'life' ),
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 5,                          // この投稿タイプが表示されるメニューの位置。5で投稿の下
        'menu_icon'     => 'dashicons-format-aside',  // 管理画面のメニューアイコン名 https://developer.wordpress.org/resource/dashicons/
        'supports'      => array(                      // このカスタム投稿内で使用する機能
            'title',  // 記事タイトル
            'editor',  // 記事本文
            'thumbnail',  // アイキャッチ画像
            'revisions',  // リビジョン
            'custom-fields'
        ),
        'taxonomies'    => array( 'type', ),       // このカスタム投稿で使用するカスタム分類
        'has_archive'   => true,                        // この投稿タイプのアーカイブを有効にする
    );

    register_post_type( 'life', $args );

    // カスタム分類（タクソノミー）登録
    register_taxonomy(
        'life_taxonomy',                 // カスタム分類の名前
        'life',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'カテゴリ',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    $labels = array(
        'name'                       => _x( 'タグ', 'taxonomy general name' ),
        'singular_name'              => _x( 'タグ', 'taxonomy singular name' ),
        'search_items'               => __( 'タグ検索' ),
        'popular_items'              => __( '人気のタグ' ),
        'all_items'                  => __( '全てのタグ' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'タグを編集' ),
        'update_item'                => __( 'タグを更新' ),
        'add_new_item'               => __( '新規タグ追加' ),
        'new_item_name'              => __( 'タグを新規追加' ),
        'add_or_remove_items'        => __( 'Add or remove writers' ),
        'choose_from_most_used'      => __( 'Choose from the most used writers' ),
        'not_found'                  => __( 'タグがありません' ),
        'menu_name'                  => __( 'タグ' ),
    );
    register_taxonomy(
        'life_tag',                 // カスタム分類の名前
        'life',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'タグ',   // カスタム分類表示名
            'labels' => $labels,
            'hierarchical' => true,   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'show_tagcloud' => true,
        )
    );
}
add_action( 'init', 'register_cpt_life' );



//学び
function register_cpt_learn() {
//カスタム投稿の部分を任意の文字列へ変更
    $labels = array(
        'name'               => _x( '学び', 'learn' ),
        'singular_name'      => _x( '学び', 'learn' ),
        'add_new'            => _x( '新規追加', 'learn' ),
        'add_new_item'       => _x( '新しい学びを追加', 'learn' ),
        'edit_item'          => _x( '学びを編集', 'learn' ),
        'new_item'           => _x( '学びを追加', 'learn' ),
        'view_item'          => _x( '学びを見る', 'learn' ),
        'search_items'       => _x( '学び検索', 'learn' ),
        'not_found'          => _x( '学びはありません', 'learn' ),
        'not_found_in_trash' => _x( 'ゴミ箱に学びはありません', 'learn' ),
        'parent_item_colon'  => _x( '親 学び:', 'learn' ),
        'menu_name'          => _x( '学び', 'learn' ),
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 5,                          // この投稿タイプが表示されるメニューの位置。5で投稿の下
        'menu_icon'     => 'dashicons-format-aside',  // 管理画面のメニューアイコン名 https://developer.wordpress.org/resource/dashicons/
        'supports'      => array(                      // このカスタム投稿内で使用する機能
            'title',  // 記事タイトル
            'editor',  // 記事本文
            'thumbnail',  // アイキャッチ画像
            'revisions',  // リビジョン
            'custom-fields'
        ),
        'taxonomies'    => array( 'type', ),       // このカスタム投稿で使用するカスタム分類
        'has_archive'   => true,                        // この投稿タイプのアーカイブを有効にする
    );

    register_post_type( 'learn', $args );

    // カスタム分類（タクソノミー）登録
    register_taxonomy(
        'learn_taxonomy',                 // カスタム分類の名前
        'learn',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'カテゴリ',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    $labels = array(
        'name'                       => _x( 'タグ', 'taxonomy general name' ),
        'singular_name'              => _x( 'タグ', 'taxonomy singular name' ),
        'search_items'               => __( 'タグ検索' ),
        'popular_items'              => __( '人気のタグ' ),
        'all_items'                  => __( '全てのタグ' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'タグを編集' ),
        'update_item'                => __( 'タグを更新' ),
        'add_new_item'               => __( '新規タグ追加' ),
        'new_item_name'              => __( 'タグを新規追加' ),
        'add_or_remove_items'        => __( 'Add or remove writers' ),
        'choose_from_most_used'      => __( 'Choose from the most used writers' ),
        'not_found'                  => __( 'タグがありません' ),
        'menu_name'                  => __( 'タグ' ),
    );
    register_taxonomy(
        'learn_tag',                 // カスタム分類の名前
        'learn',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'タグ',   // カスタム分類表示名
            'labels' => $labels,
            'hierarchical' => true,   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'show_tagcloud' => true,
        )
    );
}
add_action( 'init', 'register_cpt_learn' );


// ライター
function register_cpt_writer() {
  $exampleSupports = [
    'title',
    //'editor',
    'thumbnail',
    //'revisions'
  ];
  register_post_type( 'writer',
    array(
      'label' => 'ライター',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 6,
      'supports' => $exampleSupports
    )
  );
}
add_action( 'init', 'register_cpt_writer' );









// タクソノミータームの順番をdescription順に変える
function taxonomy_orderby_description( $orderby, $args ) {

    if ( $args['orderby'] == 'description' ) {
        $orderby = 'tt.description';
    }
    return $orderby;
}
add_filter( 'get_terms_orderby', 'taxonomy_orderby_description', 10, 2 );


// 絵文字スクリプト読み込み停止
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );


//抜粋の最後の[...]を削除
function new_excerpt_more($more) {
     return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function article__interview_shortcode($atts ,$content){

    $atts = shortcode_atts(array(
        "src" => "ホワイトベアー株式会社",
        "name" => "四谷"
        ), $atts);

    return '<div class="article__interview">'
                . '<div class="article__interview__human">'
                    . '<img class="article__interview__human__image" src="' . $atts['src'] . '" alt="">'
                    . '<div class="article__interview__human__name">'
                        . $atts['name']
                    . '</div>'
                . '</div>'
                . '<div class="article__interview__callout">'
                    . '<span class="icon-callout"></span>'
                    . '<p class="article__interview__callout__text">'
                        . $content
                    . '</p>'
                . '</div>'
            . '</div>';
}
add_shortcode( 'article__interview', 'article__interview_shortcode' );

//吹き出し機能の追加
function add_add_shortcode_button_plugin( $plugin_array ) {
    $plugin_array[ 'article__interview_shortcode_button_plugin' ] = get_template_directory_uri() . '/js/editor.js';
    return $plugin_array;
}
add_filter( 'mce_external_plugins', 'add_add_shortcode_button_plugin' );

function add_shortcode_button( $buttons ) {
    $buttons[] = 'article__interview';
    return $buttons;
}
add_filter( 'mce_buttons', 'add_shortcode_button' );


/**
 * ビジュアルエディタに表(テーブル)の機能を追加します。
 */
function mce_external_plugins_table($plugins) {
    $plugins['table'] = '//cdn.tinymce.com/4/plugins/table/plugin.min.js';
    $plugins['contextmenu'] = '//cdn.tinymce.com/4/plugins/contextmenu/plugin.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'mce_external_plugins_table' );

/**
 * ビジュアルエディタにテーブル用のボタンを追加します。
 */
function mce_buttons_table($buttons) {
    $buttons[] = 'table';
    return $buttons;
}
add_filter( 'mce_buttons', 'mce_buttons_table' );


//特集カテゴリのパーマリンク設定
add_action('init', 'feature_posttype_rewrite');
add_action('init', 'hobby_posttype_rewrite');
add_action('init', 'life_posttype_rewrite');
add_action('init', 'learn_posttype_rewrite');


function feature_posttype_rewrite() {

    global $wp_rewrite;

    $wp_rewrite->add_rewrite_tag('%feature%', '(feature)','post_type=');

    $wp_rewrite->add_permastruct('feature', '/%feature%/%post_id%/', false);

}

function hobby_posttype_rewrite() {

    global $wp_rewrite;

    $wp_rewrite->add_rewrite_tag('%hobby%', '(hobby)','post_type=');

    $wp_rewrite->add_permastruct('hobby', '/%hobby%/%post_id%/', false);

}

function life_posttype_rewrite() {

    global $wp_rewrite;

    $wp_rewrite->add_rewrite_tag('%life%', '(life)','post_type=');

    $wp_rewrite->add_permastruct('life', '/%life%/%post_id%/', false);

}

function learn_posttype_rewrite() {

    global $wp_rewrite;

    $wp_rewrite->add_rewrite_tag('%learn%', '(learn)','post_type=');

    $wp_rewrite->add_permastruct('learn', '/%learn%/%post_id%/', false);

}


add_filter('post_type_link', 'custom_posttype_permalink', 1, 3);

function custom_posttype_permalink($post_link, $id = 0, $leavename) {

    global $wp_rewrite;

    $post = get_post($id);

    if(is_wp_error( $post )){
        return $post;
    }

    if('feature' === $post->post_type){
        $featurelink = $wp_rewrite->get_extra_permastruct($post->post_type);

        $featurelink = str_replace('%feature%', $post->post_type, $featurelink);

        $featurelink = str_replace('%post_id%', $post->ID, $featurelink);

        $featurelink = home_url(user_trailingslashit($featurelink));

        return $featurelink;
    } elseif('hobby' === $post->post_type) {
        $hobbylink = $wp_rewrite->get_extra_permastruct($post->post_type);

        $hobbylink = str_replace('%hobby%', $post->post_type, $hobbylink);

        $hobbylink = str_replace('%post_id%', $post->ID, $hobbylink);

        $hobbylink = home_url(user_trailingslashit($hobbylink));

        return $hobbylink;

    } elseif('life' === $post->post_type) {
        $lifelink = $wp_rewrite->get_extra_permastruct($post->post_type);

        $lifelink = str_replace('%life%', $post->post_type, $lifelink);

        $lifelink = str_replace('%post_id%', $post->ID, $lifelink);

        $lifelink = home_url(user_trailingslashit($lifelink));

        return $lifelink;

    } elseif('learn' === $post->post_type) {
        $learnlink = $wp_rewrite->get_extra_permastruct($post->post_type);

        $learnlink = str_replace('%learn%', $post->post_type, $learnlink);

        $learnlink = str_replace('%post_id%', $post->ID, $learnlink);

        $learnlink = home_url(user_trailingslashit($learnlink));

        return $learnlink;
    }

    return $post_link;
}


