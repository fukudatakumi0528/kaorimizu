<?php

if (function_exists('wpp_get_mostpopular')) {
     wpp_get_mostpopular();
}

/* Ajaxの使用*/
function add_my_ajaxurl() {
?>
    <script>
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
    </script>
<?php
}
add_action( 'wp_head', 'add_my_ajaxurl', 1 );

function my_ajax_get_posts(){
    $showcount = $_POST['showcount'];
    $catslug = $_POST['cat'];
    $returnObj = array();
    $args = array(
        'post_type'   => array('post','works'),
        'numberposts' => 7,
        'offset' => $showcount,
        'category_name' => $catslug,
    );
    global $cfs, $post;
    $oldpost = $post;
    $oldcfs  = $cfs;

    $myposts = get_posts($args);
    $retHtml = '';
    foreach($myposts as $post) :
        setup_postdata($post);

        $type = get_the_terms($post->ID, 'type');
        $type = $type[0]->name;
        $taste = get_the_terms($post->ID, 'taste');
        $taste = $taste[0]->name;
        $case = get_the_terms($post->ID, 'case');
        $case = $case[0]->name;
        $area = get_the_terms($post->ID, 'area');
        $area = $area[0]->name;
        $date = get_the_terms($post->ID, 'date');
        $date = $date[0]->name;

        $cat  = get_the_category();
        $cat  = $cat[0];
        $name = $cat->name;
        $slug = $cat->slug;
        if (!$name) {
            $slug = get_post_type_object(get_post_type())->name;
            $name = get_post_type_object(get_post_type())->label;
        }

        if($cfs->get('new')) $new = '<img src="'.get_template_directory_uri().'/img/icon_topics_new01.png" width="30" height="17" alt="NEW">';

        if($cfs->get('works_images')){
            $images = $cfs->get('works_images');
            $size   = "works_archive";
            $image_id = $images[0]['works_image'];
            $img = wp_get_attachment_image_src($image_id, $size);
            $thumbcode = '<p class="thumb"><img src="'.$img[0].'" width="290" height="252" alt="'.get_the_title().'"></p>';
        }elseif($cfs->get('cloumn_image')){
            $image_id = $cfs->get('cloumn_image');
            $size   = "column_archive";
            $img = wp_get_attachment_image_src($image_id, $size);
            $thumbcode = '<p class="thumb"><img src="'.$img[0].'" width="290" height="151" alt="'.get_the_title().'"></p>';
        }elseif($slug == 'news'){
            $thumbcode = '<p>'.get_the_excerpt().'</p>';
        }

        if(get_the_content()) {
            $maincode = '
                    <p class="post"><?php the_excerpt(); ?></p>';
        }

        $retHtml.='
                <a href="'.get_the_permalink().'">
                <article class="topics">
                    <p class="cat '.$slug.'"><i><img src="'.get_template_directory_uri().'/img/icon_top_'.$slug.'01.png" width="30" height="22" alt="'.get_the_title().'"></i>'.$name.'</p>
                    <p class="date">'.$new.'<span>投稿日：'.get_the_time('Y/n/j').'</span></p>
                    '.$thumbcode.'
                    <h2>'.get_the_title().'</h2>
                    '.$maincode.'
                    <p class="detail"><span>続きを見る</span></p>
                </article>
                </a>';

    endforeach;

    $post = $oldpost;
    $cfs  = $oldcfs;
    echo $retHtml;

    die();
}
add_action( 'wp_ajax_my_ajax_get_posts', 'my_ajax_get_posts' );
add_action( 'wp_ajax_nopriv_my_ajax_get_posts', 'my_ajax_get_posts' );


function my_ajax_get_realestate_posts(){
    $showcount = $_POST['showcount'];
    $returnObj = array();
    $args = array(
        'post_type'   => 'realestate',
        $_POST['tax'] => $_POST['slug'],
        'numberposts' => 3,
        'offset' => $showcount,
    );
    global $cfs, $post;
    $oldpost = $post;
    $oldcfs  = $cfs;

    $myposts = get_posts($args);
    $retHtml = '';
    foreach($myposts as $post) :
        setup_postdata($post);

        $location = get_the_terms($post->ID, 'location');
        $location = $location[0]->name;
        $tsubo = $cfs->get('realestate_tsubo');

        if($cfs->get('realestate_image')){
            $image_id = $cfs->get('realestate_image');
            $size   = "realestate_archive";
            $img = wp_get_attachment_image_src($image_id, $size);
            $thumbcode = '<p class="thumb"><img src="'.$img[0].'" width="230" height="200" alt="'.get_the_title().'"></p>';
        }else {
            $thumbcode = '<p class="thumb"><img src="https://placehold.jp/12/EEEEEE/333333/230x200.png?text=No image" width="230" height="200" alt="'.get_the_title().'"></p>';
        }

        $retHtml.='
                <a href="'.get_the_permalink().'">
                <article class="topics">
                    <p class="cat"><i><img src="'.get_template_directory_uri().'/img/icon_arichive_realestate01.png" width="24" height="26" alt="不動産情報"></i>'.mb_substr(get_the_title(), 0, 12).'</p>
                    <p class="date"><span>掲載日：'.get_the_time('Y/n/j').'</span></p>
                    '.$thumbcode.'
                    <dl>
                        <dt><span>エリア</span></dt>
                        <dd>'.$location.'</dd>
                        <dt><span>坪数</span></dt>
                        <dd>'.$tsubo.'</dd>
                    </dl>
                </article>
                </a>';

    endforeach;

    $post = $oldpost;
    $cfs  = $oldcfs;
    echo $retHtml;

    die();
}
add_action( 'wp_ajax_my_ajax_get_realestate_posts', 'my_ajax_get_realestate_posts' );
add_action( 'wp_ajax_nopriv_my_ajax_get_realestate_posts', 'my_ajax_get_realestate_posts' );


function get_works_images(){
    $post_images = $_POST['images'];
    $showcount = $_POST['showcount'];
    $works_title = $_POST['title'];
    $post_images = array_slice($post_images, $showcount, 1);
    $retHtml = "";

    foreach ($post_images as $post_image) {
        $retHtml.='
                <li><img src="'.$post_image.'" width="810" alt="'.$works_title.'"></li>'."\n";
    }
    echo $retHtml;
    die();
}
add_action( 'wp_ajax_get_works_images', 'get_works_images' );
add_action( 'wp_ajax_nopriv_get_works_images', 'get_works_images' );


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


function register_cpt_works() {
//カスタム投稿の部分を任意の文字列へ変更
    $labels = array(
        'name'               => _x( '施工事例', 'works' ),
        'singular_name'      => _x( '施工事例', 'works' ),
        'add_new'            => _x( '新規追加', 'works' ),
        'add_new_item'       => _x( '新しい施工事例を追加', 'works' ),
        'edit_item'          => _x( '施工事例を編集', 'works' ),
        'new_item'           => _x( '施工事例を追加', 'works' ),
        'view_item'          => _x( '施工事例を見る', 'works' ),
        'search_items'       => _x( '施工事例検索', 'works' ),
        'not_found'          => _x( '施工事例はありません', 'works' ),
        'not_found_in_trash' => _x( 'ゴミ箱に施工事例はありません', 'works' ),
        'parent_item_colon'  => _x( '親 施工事例:', 'works' ),
        'menu_name'          => _x( '施工事例', 'works' ),
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

    register_post_type( 'works', $args );

    // カスタム分類（タクソノミー）登録
    register_taxonomy(
        'type',                 // カスタム分類の名前
        'works',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => '業種',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    register_taxonomy(
        'taste',                 // カスタム分類の名前
        'works',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => 'テイスト',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    register_taxonomy(
        'case',                 // カスタム分類の名前
        'works',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => '事例',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    register_taxonomy(
        'area',                 // カスタム分類の名前
        'works',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
        array(
            'label' => '広さ',   // カスタム分類表示名
            'hierarchical' => true   // trueでカテゴリーのように階層あり、falseでタグのように階層化なし
        )
    );
    register_taxonomy(
        'date',                 // カスタム分類の名前
        'works',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
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
        'work_tag',                 // カスタム分類の名前
        'works',                // このカスタム分類を使う投稿タイプ、もしくはカスタム投稿タイプ
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
add_action( 'init', 'register_cpt_works' );

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

/* ヘッダ関連 ----------------------------------*/

// 不要ヘッダlink削除
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

/* WordPressタグのカスタマイズ ---------------------*/

// the_excerpt()「続きを読む」をカスタマイズ
function my_excerpt_more($post) {
    return  '...';
}
function my_trim_all_excerpt( // 抜粋（the_excerpt()）を適当な文字数でカット
    $text = '' ,
    $cut  = 80 //表示する文字数
     ) {
    global $post;
    $raw_excerpt = $text;
    if ( '' == $text ) {
        $text = get_the_content('');
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $text = strip_tags($text);
    }
    $excerpt_mblength = apply_filters('excerpt_mblength', $cut );
    $excerpt_more     = my_excerpt_more( $post );
    $text             = wp_trim_words( $text, $excerpt_mblength, $excerpt_more );
    return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'my_trim_all_excerpt' );

/* 投稿関連 -----------------------------------*/

// メディア画像サイズ追加
add_image_size( 'works_hot', 520, 277, true );
add_image_size( 'works_top', 290, 252, true );
add_image_size( 'works_archive', 350, 200, true );
add_image_size( 'works_sub', 60, 60, true );
add_image_size( 'works_single', 810, 810, false );
add_image_size( 'column_archive', 290, 151, true );
add_image_size( 'column_single', 400, 400, false );
add_image_size( 'hot_topics', 325, 120, true );
add_image_size( 'works_top_sub', 90, 90, true );
add_image_size( 'visual', 2000, 2000, false );
add_image_size( 'realestate_single', 560, 2000, false );
add_image_size( 'realestate_archive', 230, 200, true );

// 特定のカテゴリーの投稿をショートコード[list num="表示数" cat="カテゴリーID"]で表示
function get_cat_items($atts, $content = null){
    extract(shortcode_atts(array(
        'num' => '5',  // デフォルトの表示数
        'cat' => '1'   // デフォルトのカテゴリーID
    ), $atts));
    global $post;
    $oldpost = $post;
    $myposts = get_posts('numberposts='.$num.'&category='.$cat);
    $retHtml = '';
    foreach($myposts as $post){
        setup_postdata($post);
        $retHtml.='<li><span>'.get_post_time('Y年m月d日').'</span><a href="'.get_the_permalink().'">'.mb_substr(get_the_title('','',false), 0, 40).'</a></li>'."\n";
    }
    $post = $oldpost;
    return $retHtml;
}
add_shortcode('list', 'get_cat_items');

// カスタム投稿情報取得
function get_custom_items($atts, $content = null){
    extract(shortcode_atts(array(
        "num" => '3'  // デフォルトの表示数
    ), $atts));
    global $post;
    $oldpost = $post;
    $myposts = get_posts('post_type=items&numberposts='.$num.'&orderby=id');
    $retHtml = '';
    foreach($myposts as $post) {
        setup_postdata($post);
        $image_id = get_field('custom_image');
        $size = "thumbnail";
        $image = wp_get_attachment_image_src( $image_id, $size );
        $retHtml.='
            <p class="thumb"><a href="'.get_the_permalink().'"><img src="'.$image[0].'" width="150" height="150" alt="'.get_the_title().'"></a></p>'."\n".'
            <p><span>'.get_post_time('Y年m月d日').'</span><a href="'.get_the_permalink().'">'.mb_substr(get_the_title('','',false), 0, 40).'</a></p>
        ';
    }
    $post = $oldpost;
    return $retHtml;
}
add_shortcode("customposts", "get_custom_items");
/*Add 2017.5.13*/
define('FORCE_SSL',false);
function pr($val=NULL){
	echo '<pre>';
	print_r($val);
	echo '</pre>';
}
function get_shared_url ( $post_id = null ) {
	if ( ! $post_id ) $post_id = get_the_ID();
	$permalink = get_permalink( $post_id );
	if ( FORCE_SSL ) {
		$permalink = str_replace( 'http://', 'https://', $permalink );
		if ( get_post_meta( $post_id, 'is_not_force_ssl', true ) ) {
			$permalink = str_replace( 'https://', 'http://', $permalink );
		}
	}
	return $permalink;
}

function get_third_party_tweet_button( $url = null, $title = null ) {
	if ( ! $url && ! $title ) {
		$url = get_shared_url();
		$title = get_the_title();
	}
	$string = 'https://jsoon.digitiminimi.com/tweet_button.html#url=%s&text=%s&count=vertical&lang=ja';
	$src = sprintf( $string, rawurlencode( $url ), rawurlencode( $title ) );
	$output = '<iframe src="' . $src . '" width="76" height="70" title="Twitter Tweet Button" style="border:0;overflow:hidden;"></iframe>';
	return $output;
}

function getWorkNearList( $taxonomySlugs, $order, $limit , $post_not_in = null ) {
	$args = array(
		'post_type' => 'works',
		'order' => $order,
		'posts_per_page' => $limit
	);
	if(!empty($taxonomySlugs)){
		$args['tax_query']=array(
			array(
				'taxonomy'=>'work_tag',
				'field'=>'slug',
				'terms'=>$taxonomySlugs,
			)
		);
	}
	if(!empty($post_not_in)) {
		if(!is_array($post_not_in)) {
			$post_not_in = array($post_not_in);
		}
		$args["post__not_in"] = $post_not_in;
	}
	return get_posts( $args );
}