<?php
    $cat      = get_the_category();
    $cat      = $cat[0];
    $id   = $cat->term_id;
    global $slug;
    $slug = $cat->slug;
    $name = $cat->name;
    if(isset($_GET['page'])){
        $paged = $_GET['page'];
    }
get_header(); ?>
<main id="contents" class="category">
    <h2 id="page_title" class="column">コラム</h2>
    <ol id="breadcrumb">
        <li><a href="<?php echo home_url(); ?>/">株式会社オフィス・ラボ ホーム</a></li>
        <li><?php echo $name; ?></li>
    </ol>
    <section id="topics">
        <div class="inner">
            <div class="heading">
                <h1><img src="<?php echo get_template_directory_uri(); ?>/img/title_top_topics01.png" width="115%" alt="トピックス"></h1>
                 <p class="date">last update <?php $args = array(
    'posts_per_page' => 1,
    'orderby'        => 'modified',
    'order'          => 'desc'
);
    $my_query = new WP_Query($args);
    $lastupdate = 0;
    if ($my_query->have_posts()): while ($my_query->have_posts()) : $my_query->the_post();
        if(is_sticky()) continue;
        if(get_the_modified_time('U')>get_the_time('U')) {
            $lastupdate = get_the_modified_time('U');
        }else {
            $lastupdate = get_the_time('U');
        }
    endwhile;
    endif;
    wp_reset_query();
    echo date('Y/n/j',$lastupdate);
?></p>
            </div>
            <div id="list">
<?php $args = array(
    'posts_per_page' => 9,
);
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()): while ($my_query->have_posts()) : $my_query->the_post();

        // $type = get_the_terms($post->ID, 'type');
        // $type = $type[0]->name;
        // $taste = get_the_terms($post->ID, 'taste');
        // $taste = $taste[0]->name;
        // $case = get_the_terms($post->ID, 'case');
        // $case = $case[0]->name;
        // $area = get_the_terms($post->ID, 'area');
        // $area = $area[0]->name;
        // $date = get_the_terms($post->ID, 'date');
        // $date = $date[0]->name;

        $cat  = get_the_category();
        $cat  = $cat[0];
        $name = $cat->name;
        $slug = $cat->slug;
        if (!$name) {
            $slug = get_post_type_object(get_post_type())->name;
            $name = get_post_type_object(get_post_type())->label;
        }

?>
                <a href="<?php the_permalink(); ?>">
                <article class="topics">
                    <p class="cat <?php echo $slug; ?>"><i><img src="<?php echo get_template_directory_uri(); ?>/img/icon_top_<?php echo $slug; ?>01.png" width="30" height="22" alt="施工事例"></i><?php echo $name; ?></p>
                    <p class="date"><?php if($cfs->get('new')) echo '<img src="'.get_template_directory_uri().'/img/icon_topics_new01.png" width="30" height="17" alt="NEW">' ;?><span>投稿日：<?php the_time('Y/n/j') ?></span></p>
                    <?php
        if($cfs->get('works_images')){
            $images = $cfs->get('works_images');
            $size   = "works_top";
            $image_id = $images[0]['works_image'];
            $img = wp_get_attachment_image_src($image_id, $size);
            echo '<p class="thumb"><img src="'.$img[0].'" width="290" height="252" alt="'.get_the_title().'"></p>';
        }elseif($cfs->get('cloumn_image')){
            $image_id = $cfs->get('cloumn_image');
            $size   = "column_archive";
            $img = wp_get_attachment_image_src($image_id, $size);
            echo '<p class="thumb"><img src="'.$img[0].'" width="290" height="151" alt="'.get_the_title().'"></p>';
        }
?>
                    <h2><?php echo mb_substr(get_the_title(), 0, 18); ?></h2>
<?php if(get_the_content()): ?>
                    <p class="post"><?php the_excerpt(); ?></p>
<?php endif; ?>
                    <p class="detail"><span>続きを見る</span></p>
                </article>
                </a>
<?php
    endwhile;
    else : ?>
        <p>記事はまだありません。</p>
<?php
    endif;
    // wp_reset_query();
?>
            <!-- /list --></div>
        <!-- /inner --></div>
    <!-- /topics --></section>
<!-- /contents --></main>
<?php get_footer(); ?>