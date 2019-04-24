<?php
    $pageobj   = $wp_query->get_queried_object();
    $post_type = $pageobj->name;
    $name      = $pageobj->labels->name;
    if(isset($_GET['page'])){
        $paged = $_GET['page'];
    }
    get_header(); ?>
<main id="contents" class="archive_works">
    <h2 id="page_title">施工事例</h2>
    <ol id="breadcrumb">
        <li><a href="<?php echo home_url(); ?>/">株式会社オフィス・ラボ ホーム</a></li>
        <li><?php echo $name; ?></li>
    </ol>
    <div id="main">
        <section id="pickup">
            <h1><img src="<?php echo get_template_directory_uri(); ?>/img/title_works_pickup01.png" width="224" height="25" alt="ピックアップ"></h1>
<?php
    $args = array(
        'post_type'      => $post_type,
        'posts_per_page' => 30
    );
    $worksposts = array();
    $my_query = new WP_Query($args);
    $count = 0;
    if ($my_query->have_posts()): while ($my_query->have_posts() && $count < 3) : $my_query->the_post();
        $designContainerType=get_post_meta($post->ID, 'design_container_type_title',true);
        $date = get_the_terms($post->ID, 'date');
        $date = $date[0]->name;
        if(!$cfs->get('pickup')) continue;
        $count++
?>
            <article class="post">
<?php
        if($cfs->get('works_images')){
            $images = $cfs->get('works_images');
            $size   = "works_hot";
            $image_id = $images[0]['works_image'];
            $img = wp_get_attachment_image_src($image_id, $size);
        }
?>
                <p class="thumb"><a href="<?php the_permalink(); ?>"><img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title(); ?>"></a></p>
                <div class="info">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                    <p class="detail"><?php echo nl2br($designContainerType);?></p>
                    <p class="button"><a href="<?php the_permalink(); ?>">続きを見る</a></p>
                </div>
            </article>




<?php endwhile;
    else : ?>
        <p>記事はまだありません。</p>
<?php
    endif;
    wp_reset_query();
?>
        </section>
        <section id="works_archive">
            <h1><img src="<?php echo get_template_directory_uri(); ?>/img/title_works01.png" width="216" height="35" alt="施工事例一覧"></h1>
            <section class="works_list">
                <article class="post">
                    <div class="info">
                        <h2><a href=""></a></h2>
						<p class="detail"></p>
                    </div>
                    <ul class="thumbs">
                        <li class="image01"><a href=""><img src="" width="350" height="200" alt=""></a></li>
                        <li class="image02"><a href=""><img src="" width="60" height="60" alt=""></a></li>
                        <li class="image03"><a href=""><img src="" width="60" height="60" alt=""></a></li>
                        <li class="image04"><a href=""><img src="" width="60" height="60" alt=""></a></li>
                    </ul>
                    <p class="button"><a href="">続きを見る</a></p>
                </article>
            </section>
        </section>

    </div>
<?php
    $args = array(
        'post_type'      => $post_type,
        'order' => 'asc',
        'orderby' => 'date',
        'posts_per_page' => -1
    );
    $postcount = 1;
    $worksposts = array();
    $my_query = new WP_Query($args);

    if ($my_query->have_posts()): while ($my_query->have_posts()) : $my_query->the_post();

        $date = get_the_terms($post->ID, 'date');
        $date = $date[0]->name;
		$designContainerType=get_post_meta($post->ID, 'design_container_type_title',true);
		

        $count = 1;
        if($cfs->get('works_images')){
            $images = $cfs->get('works_images');
            $size   = "works_archive";
            $postimages = array();
            foreach ($images as $image) {
                if ($count > 1) {
                    $size   = "works_sub";
                }
                if ($count > 4) {
                    break;
                }
                $image_id = $image['works_image'];
                $img = wp_get_attachment_image_src($image_id, $size);
                array_push($postimages, $img[0]);
                $count++;
            }
        }

        $postdata = array(
            $post->ID => array(
                'title' => get_the_title(),
                'url'   => get_the_permalink(),
                'detail'  => nl2br($designContainerType),
                'date'  => $date,
                'imgs'  => $postimages,
            ),
        );
        $worksposts = array_merge($postdata,$worksposts);

    endwhile;
    else : ?>
        <p>記事はまだありません。</p>
<?php
    endif;
    wp_reset_query();
?>
<?php get_sidebar(); ?>
<!-- /contents --></main>
<?php
    $jsonworksposts = json_encode($worksposts);
?>
<script>
var posts = [];
posts = JSON.parse('<?php echo  $jsonworksposts; ?>');
</script>
<?php get_footer(); ?>