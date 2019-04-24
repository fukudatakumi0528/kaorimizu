<?php
    $slug = get_post_type_object(get_post_type())->name;
    $name = get_post_type_object(get_post_type())->label;

    $location = get_the_terms($post->ID, 'location');
    $location = $location[0]->name;
    $tsubo = get_the_terms($post->ID, 'tsubo');
    $tsubo = $tsubo[0]->name;
get_header(); ?>
<main id="contents" class="realestate">
    <!-- <h2 id="page_title">施工事例</h2> -->
    <ol id="breadcrumb">
        <li><a href="<?php echo home_url(); ?>/">株式会社オフィス・ラボ ホーム</a></li>
        <li><a href="<?php echo home_url().'/'.$slug; ?>/"><?php echo $name; ?></a></li>
        <li><?php the_title(); ?></li>
    </ol>
    <div class="heading">
        <h2><i><img src="<?php echo get_template_directory_uri(); ?>/img/icon_realestate_title01.png" width="28" height="31" alt="不動産情報"></i><?php the_title(); ?></h2>
    </div>
    <section id="single">
        <article class="post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
        if($cfs->get('realestate_image')){
            $image_id = $cfs->get('realestate_image');
            $size   = "realestate_single";
            $img = wp_get_attachment_image_src($image_id, $size);
            $fullimg = wp_get_attachment_image_src($image_id, 'full');
            echo '<p class="thumb"><a href="'.$fullimg[0].'"><img src="'.$img[0].'" width="560" alt="'.get_the_title().'"></a></p>';
        }else {
            echo '<p class="thumb"><img src="https://placehold.jp/12/EEEEEE/333333/560x400.png?text=No image" width="560" height="400" alt="'.get_the_title().'"></p>';
        }
?>
            <dl class="detail">
                <dt><?php the_title(); ?></dt>
                <dt><span>エリア</span></dt>
                <dd><?php echo $location; ?></dd>
                <dt><span>坪数</span></dt>
                <dd><?php echo $cfs->get('realestate_tsubo'); ?></dd>
            </dl>
            <div class="contact">
                <p class="button"><a href="/contact/">CONTACT US</a></p>
            </div>
<?php endwhile; ?>
<?php else : ?>
            <h3>記事はまだありません。</h3>
<?php
    endif;
    wp_reset_postdata();
?>
        <!-- /post --></article>
    <!-- /single --></section>
<?php get_sidebar(); ?>
<!-- /contents --></main>
<?php get_footer(); ?>