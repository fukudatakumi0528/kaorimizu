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

// 施工事例タクソノミーをラジオボタンに変更
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

/* 投稿名変更・カスタム投稿・カスタム分類（タクソノミー）関連 ------------*/

//投稿名変更
/*
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0]                 = 'ニュース';
    $submenu['edit.php'][5][0]  = 'ニュース一覧';
    $submenu['edit.php'][10][0] = '新しいニュース';
    $submenu['edit.php'][16][0] = 'タグ';
}
function change_post_object_label() {
    global $wp_post_types;
    $labels                     = &$wp_post_types['post']->labels;
    $labels->name               = 'ニュース';
    $labels->singular_name      = 'ニュース';
    $labels->add_new            = _x('新規追加', 'ニュース');
    $labels->add_new_item       = '新しいニュース';
    $labels->edit_item          = 'ニュースの編集';
    $labels->new_item           = '新しいニュース';
    $labels->view_item          = 'ニュースを表示';
    $labels->search_items       = 'ニュース検索';
    $labels->not_found          = 'ニュースが見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱のニュースにも見つかりませんでした';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
*/



function register_cpt_news() {
  $exampleSupports = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
    'title',  // 記事タイトル
    'editor',  // 記事本文
    'thumbnail',  // アイキャッチ画像
    'revisions'  // リビジョン
  ];
  register_post_type( 'news',  // カスタム投稿名
    array(
      'label' => 'ニュース',  // 管理画面の左メニューに表示されるテキスト
      'public' => true,  // 投稿タイプをパブリックにするか否か
      'has_archive' => true,  // アーカイブを有効にするか否か
      'menu_position' => 3,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
      //'supports' => $exampleSupports  // 投稿画面でどのmoduleを使うか的な設定
    )
  );
}
add_action( 'init', 'register_cpt_news' ); // アクションに上記関数をフックします



function register_cpt_column() {
  $exampleSupports = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
    'title',  // 記事タイトル
    'editor',  // 記事本文
    'thumbnail',  // アイキャッチ画像
    'revisions'  // リビジョン
  ];
  register_post_type( 'column',  // カスタム投稿名
    array(
      'label' => 'コラム',  // 管理画面の左メニューに表示されるテキスト
      'public' => true,  // 投稿タイプをパブリックにするか否か
      'has_archive' => true,  // アーカイブを有効にするか否か
      'menu_position' => 4,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
      //'supports' => $exampleSupports  // 投稿画面でどのmoduleを使うか的な設定
    )
  );
}
add_action( 'init', 'register_cpt_column' ); // アクションに上記関数をフックします



//お客様の声
function register_cpt_voice() {
  $exampleSupports = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
    'title',  // 記事タイトル
    'editor',  // 記事本文
    'thumbnail',  // アイキャッチ画像
    'revisions'  // リビジョン
  ];
  register_post_type( 'voice',  // カスタム投稿名
    array(
      'label' => 'お客様の声',  // 管理画面の左メニューに表示されるテキスト
      'public' => true,  // 投稿タイプをパブリックにするか否か
      'has_archive' => true,  // アーカイブを有効にするか否か
      'menu_position' => 3,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
      //'supports' => $exampleSupports  // 投稿画面でどのmoduleを使うか的な設定
    )
  );
}
add_action( 'init', 'register_cpt_voice' ); // アクションに上記関数をフックします



// カスタム投稿登録

function register_cpt_visual() {
//カスタム投稿の部分を任意の文字列へ変更
    $labels = array(
        'name'               => _x( 'メイン画像', 'visual' ),
        'singular_name'      => _x( 'メイン画像', 'visual' ),
        'add_new'            => _x( '新規追加', 'visual' ),
        'add_new_item'       => _x( '新しいメイン画像を追加', 'visual' ),
        'edit_item'          => _x( 'メイン画像を編集', 'visual' ),
        'new_item'           => _x( 'メイン画像を追加', 'visual' ),
        'view_item'          => _x( 'メイン画像を見る', 'visual' ),
        'search_items'       => _x( 'メイン画像検索', 'visual' ),
        'not_found'          => _x( 'メイン画像はありません', 'visual' ),
        'not_found_in_trash' => _x( 'ゴミ箱にメイン画像はありません', 'visual' ),
        'parent_item_colon'  => _x( '親 メイン画像:', 'visual' ),
        'menu_name'          => _x( 'メイン画像', 'visual' ),
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 5,                          // この投稿タイプが表示されるメニューの位置。5で投稿の下
        'menu_icon'     => 'dashicons-format-image',  // 管理画面のメニューアイコン名 https://developer.wordpress.org/resource/dashicons/
        'supports'      => array(                      // このカスタム投稿内で使用する機能
            'title',
            'custom-fields'
        ),
        'has_archive'   => false                        // この投稿タイプのアーカイブを有効にする
    );

    register_post_type( 'visual', $args );
}
add_action( 'init', 'register_cpt_visual' );




function register_cpt_project() {
//カスタム投稿の部分を任意の文字列へ変更
    $labels = array(
        'name'               => _x( '施工事例', 'project' ),
        'singular_name'      => _x( '施工事例', 'project' ),
        'add_new'            => _x( '新規追加', 'project' ),
        'add_new_item'       => _x( '新しい施工事例を追加', 'project' ),
        'edit_item'          => _x( '施工事例を編集', 'project' ),
        'new_item'           => _x( '施工事例を追加', 'project' ),
        'view_item'          => _x( '施工事例を見る', 'project' ),
        'search_items'       => _x( '施工事例検索', 'project' ),
        'not_found'          => _x( '施工事例はありません', 'project' ),
        'not_found_in_trash' => _x( 'ゴミ箱に施工事例はありません', 'project' ),
        'parent_item_colon'  => _x( '親 施工事例:', 'project' ),
        'menu_name'          => _x( '施工事例', 'project' ),
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 5,                          // この投稿タイプが表示されるメニューの位置。5で投稿の下
        'menu_icon'     => 'dashicons-format-aside',  // 管理画面のメニューアイコン名 https://developer.wordpress.org/resource/dashicons/
        'supports'      => array(                      // このカスタム投稿内で使用する機能
            'title',
            'custom-fields'
        ),
        'taxonomies'    => array( 'type','taste','case','area','date' ),       // このカスタム投稿で使用するカスタム分類
        'has_archive'   => true                        // この投稿タイプのアーカイブを有効にする
    );

    register_post_type( 'project', $args );

    // カスタム分類（タクソノミー）登録
    register_taxonomy(
        'type',                 // カスタム分類の名前
        'project',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => '業種',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    register_taxonomy(
        'taste',                 // カスタム分類の名前
        'project',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'テイスト',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    register_taxonomy(
        'case',                 // カスタム分類の名前
        'project',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => '事例',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    register_taxonomy(
        'area',                 // カスタム分類の名前
        'project',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => '広さ',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    register_taxonomy(
        'date',                 // カスタム分類の名前
        'project',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => '完成年',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
	/*Add 2017.5.15*/
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
        'project_tag',                 // カスタム分類の名前
        'project',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
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
add_action( 'init', 'register_cpt_project' );


function register_cpt_realestate() {
//カスタム投稿の部分を任意の文字列へ変更
    $labels = array(
        'name'               => _x( '不動産情報', 'realestate' ),
        'singular_name'      => _x( '不動産情報', 'realestate' ),
        'add_new'            => _x( '新規追加', 'realestate' ),
        'add_new_item'       => _x( '新しい不動産情報を追加', 'realestate' ),
        'edit_item'          => _x( '不動産情報を編集', 'realestate' ),
        'new_item'           => _x( '不動産情報を追加', 'realestate' ),
        'view_item'          => _x( '不動産情報を見る', 'realestate' ),
        'search_items'       => _x( '不動産情報検索', 'realestate' ),
        'not_found'          => _x( '不動産情報はありません', 'realestate' ),
        'not_found_in_trash' => _x( 'ゴミ箱に不動産情報はありません', 'realestate' ),
        'parent_item_colon'  => _x( '親 不動産情報:', 'realestate' ),
        'menu_name'          => _x( '不動産情報', 'realestate' ),
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 5,                          // この投稿タイプが表示されるメニューの位置。5で投稿の下
        'menu_icon'     => 'dashicons-building',  // 管理画面のメニューアイコン名 https://developer.wordpress.org/resource/dashicons/
        'supports'      => array(                      // このカスタム投稿内で使用する機能
            'title',
            'custom-fields'
        ),
        'taxonomies'    => array( 'location','tsubo' ),       // このカスタム投稿で使用するカスタム分類
        'has_archive'   => true                        // この投稿タイプのアーカイブを有効にする
    );

    register_post_type( 'realestate', $args );

    // カスタム分類（タクソノミー）登録
    register_taxonomy(
        'location',                 // カスタム分類の名前
        'realestate',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'エリア',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    register_taxonomy(
        'tsubo',                 // カスタム分類の名前
        'realestate',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => '坪数',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
}
add_action( 'init', 'register_cpt_realestate' );

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


