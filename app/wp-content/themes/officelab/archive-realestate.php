<?php
    $pageobj   = $wp_query->get_queried_object();
    $post_type = $pageobj->name;
    $name      = $pageobj->labels->name;
    if(isset($_GET['page'])){
        $paged = $_GET['page'];
    }
    get_header(); ?>
<main id="contents" class="archive_realestate">
    <h2 id="page_title"><?php echo $name; ?></h2>
    <ol id="breadcrumb">
        <li><a href="<?php echo home_url(); ?>/">株式会社オフィス・ラボ ホーム</a></li>
        <li><?php echo $name; ?></li>
    </ol>
            <div id="main">
<?php $args = array(
    'post_type'      => $post_type,
    'posts_per_page' => 9,
);
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()): while ($my_query->have_posts()) : $my_query->the_post();

        $location = get_the_terms($post->ID, 'location');
        $location = $location[0]->name;
        $tsubo = $cfs->get('realestate_tsubo');
?>
                <a href="<?php the_permalink(); ?>">
                <article class="topics">
                    <p class="cat"><i><img src="<?php echo get_template_directory_uri(); ?>/img/icon_arichive_realestate01.png" width="24" height="26" alt="不動産情報"></i><?php echo mb_substr(get_the_title(), 0, 12); ?></p>
                    <p class="date"><span>掲載日：<?php the_time('Y/n/j') ?></span></p>
<?php
        if($cfs->get('realestate_image')){
            $image_id = $cfs->get('realestate_image');
            $size   = "realestate_archive";
            $img = wp_get_attachment_image_src($image_id, $size);
            echo '<p class="thumb"><img src="'.$img[0].'" width="230" height="200" alt="'.get_the_title().'"></p>';
        }else {
            echo '<p class="thumb"><img src="https://placehold.jp/12/EEEEEE/333333/230x200.png?text=No image" width="230" height="200" alt="'.get_the_title().'"></p>';
        }
?>
                    <dl>
                        <dt><span>エリア</span></dt>
                        <dd><?php echo $location; ?></dd>
                        <dt><span>坪数</span></dt>
                        <dd><?php echo $tsubo; ?></dd>
                    </dl>
<?php if(get_the_content()): ?>
                    <p class="post"><?php the_excerpt(); ?></p>
<?php endif; ?>
                </article>
                </a>
<?php
    endwhile;
    else : ?>
        <p>記事はまだありません。</p>
<?php
    endif;
    wp_reset_query();
?>
            <!-- /list --></div>
<?php get_sidebar(); ?>
<!-- /contents --></main>
<?php get_footer(); ?>