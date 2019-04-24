<?php
    $pageobj   = $wp_query->get_queried_object();
    $taxonomy = $pageobj->taxonomy;
    $slug     = $pageobj->slug;
    $name     = $pageobj->name;
	if(isset($_GET['page'])){
        $paged = $_GET['page'];
    }
    get_header(); ?>
<main id="contents" class="archive_works">
    <h2 id="page_title">施工事例</h2>
    <ol id="breadcrumb">
        <li><a href="<?php echo home_url(); ?>/">株式会社オフィス・ラボ ホーム</a></li>
        <li><a href="../../">施工事例</a></li>
        <li><?php echo $name; ?></li>
    </ol>
    <div id="main">
        <section class="works_list">
            <h1><span class="date"></span></h1>
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
<?php
    $args = array(
        $taxonomy => $slug,
        'order' => 'asc',
        'posts_per_page' => -1
    );
    $postcount = 1;
    $worksposts = array();
    $my_query = new WP_Query($args);

    if ($my_query->have_posts()): while ($my_query->have_posts()) : $my_query->the_post();

        $type = get_the_terms($post->ID, 'type');
        $type = $type[0]->name;
        $taste = get_the_terms($post->ID, 'taste');
        $taste = $taste[0]->name;
        $case = get_the_terms($post->ID, 'case');
        $case = $case[0]->name;
        $area = get_post_meta($post->ID, 'works_area', true);
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
    <section class="works_list">
        <p>記事はまだありません。</p>
    </section>
<?php
    endif;
    wp_reset_query();
?>
    </div>

<?php get_sidebar(); ?>
<!-- /contents --></main>
<?php
    $jsonworksposts = json_encode($worksposts);
?>
<script>
var posts = [];
posts = JSON.parse('<?php echo  $jsonworksposts; ?>');
console.log(posts);
</script>
<?php get_footer(); ?>