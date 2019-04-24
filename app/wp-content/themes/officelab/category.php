<?php
    $cat      = get_the_category();
    $cat      = $cat[0];
    $id   = $cat->term_id;
    $slug = $cat->slug;
    $name = $cat->name;
    if(isset($_GET['page'])){
        $paged = $_GET['page'];
    }
get_header(); ?>
<main id="contents" class="category">
    <h2 id="page_title">ニュース</h2>
    <ol id="breadcrumb">
        <li><a href="<?php echo home_url(); ?>/">株式会社オフィス・ラボ ホーム</a></li>
        <li><?php echo $name; ?></li>
    </ol>
    <section id="hot">
        <div class="inner">
            <div class="heading">
                <h2><img src="<?php echo get_template_directory_uri(); ?>/img/title_top_hottopics01.png" width="316.25px"  alt="ホットトピックス"></h2>
            </div>
            <div class="list">

<?php $args = array(
    'post_type'      => array('post','works'),
    'posts_per_page' => 30,
);
    $count = 0;
    $my_query = new WP_Query($args);

    if ($my_query->have_posts()): while ($my_query->have_posts() && $count < 3) : $my_query->the_post();
        if(!$cfs->get('pickup')) continue;
        $count++;
        $cat  = get_the_category();
        $cat  = $cat[0];
        $name = $cat->name;
        $slug = $cat->slug;
        if (!$name) {
            $slug = get_post_type_object(get_post_type())->name;
            $name = get_post_type_object(get_post_type())->label;
        }

?>
                <article class="hot">
                    <p class="cat"><img src="<?php echo get_template_directory_uri(); ?>/img/icon_top_hot_<?php echo $slug; ?>01.png" width="70" height="70" alt="<?php echo $name; ?>"></p>
                    <h3 class="title"><a href="<?php the_permalink(); ?>"><?php
                        if($cfs->get('pickup_title')){
                            echo $cfs->get('pickup_title');
                        }else {
                            the_title();
                        } ?></a></h3>
                    <?php
        if($cfs->get('works_images')){
            $images = $cfs->get('works_images');
            $size   = "hot_topics";
            $image_id = $images[0]['works_image'];
            $img = wp_get_attachment_image_src($image_id, $size);
            echo '<p class="thumb"><a href="'.get_the_permalink().'"><img src="'.$img[0].'" width="325" height="120" alt="'.get_the_title().'"></a></p>';
        }elseif($cfs->get('cloumn_image')){
            $image_id = $cfs->get('cloumn_image');
            $size   = "hot_topics";
            $img = wp_get_attachment_image_src($image_id, $size);
            echo '<p class="thumb"><a href="'.get_the_permalink().'"><img src="'.$img[0].'" width="325" height="120" alt="'.get_the_title().'"></a></p>';
        }elseif($slug == 'news'){
            echo '<p>'.get_the_excerpt().'</p>';
        }
?>
                </article>
<?php endwhile; ?>
<?php
    endif;
    wp_reset_query();
?>
            <!-- /list --></div>
        <!-- /inner --></div>
    <!-- /hot --></section>
    <section id="topics">
        <div class="inner">
            <div class="heading">
                <h1><img src="<?php echo get_template_directory_uri(); ?>/img/title_top_topics01.png" width="115%" alt="トピックス"></h1>
                 <p class="date">last update <?php $args = array(
    'post_type'      => array('post','works'),
    'posts_per_page' => 1,
    'orderby'        => 'modified',
    'order'          => 'desc'
);
    $my_query = new WP_Query($args);
    $lastupdate = 0;
    if ($my_query->have_posts()): while ($my_query->have_posts()) : $my_query->the_post();
        if(is_sticky()) continue;
        if(get_the_modified_time('U')>$lastupdate) {
            $lastupdate = get_the_modified_time('U');
        }
    endwhile;
    endif;
    wp_reset_query();
    echo date('Y/n/j',$lastupdate);
?></p>
            </div>
<?php
    $re_args = array(
        'post_type'      => 'realestate',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'desc'
    );
    $my_re_query = new WP_Query($re_args);
    $re_update = 0;
    if ($my_re_query->have_posts()): while ($my_re_query->have_posts()) : $my_re_query->the_post();
        if(get_the_modified_time('U')>get_the_time('U')) {
            $re_update = get_the_modified_time('U');
        }else {
            $re_update = get_the_time('U');
        }
    endwhile;
    endif;
    $realestateUpdateDate = date('Y/n/j',$re_update);
?>
            <div id="list">
<?php $args = array(
    'post_type'      => array('post','works'),
    'posts_per_page' => 9,
);
    $my_query = new WP_Query($args);
    $newscount = 0;
    if ($my_query->have_posts()): while ($my_query->have_posts()) : $my_query->the_post();
        if($newscount == 2) : ?>
                <a href="<?php echo home_url(); ?>/realestate/">
                    <article class="topics realestate">
                        <p class="cat"><i><img src="<?php echo get_template_directory_uri(); ?>/img/icon_arichive_realestate01.png" width="24" height="26" alt="不動産情報"></i>不動産情報</p>
                        <p class="date"><span class="f_days">最終更新日：<?php echo $realestateUpdateDate; ?></span></p>
                        <p><img src="<?php echo get_template_directory_uri(); ?>/img/img_top_realestate01.png" alt=""></p>
                        <p class="detail"><span>不動産情報一覧を見る</span></p>
                    </article>
                </a>
<?php
        $newscount++;
        endif;

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
    $newscount++;
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