<?php get_header(); ?>
<main id="top_contents">
    <section id="main_visual">
        <div class="detail">
            <p class="catch"><img src="<?php echo get_template_directory_uri(); ?>/img/txt_top_visual01.png" width="955" height="67" alt="QUALITY × COST × PLAN"></p>
        </div>
        <p class="button"><a href="#topics"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_top_cursor01.png"></a></p>
        <div id="visual">
            <?php $args = array(
    'post_type'      => 'visual',
    'posts_per_page' => -1,
);
    $my_query = new WP_Query($args);
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <div class="inner">
                <?php
        if($cfs->get('main_visual')){
            $image_id = $cfs->get('main_visual');
            $size   = "visual";
            $img = wp_get_attachment_image_src($image_id, $size);
            echo '<img src="'.$img[0].'" width="100%" alt="'.get_the_title().'">';
        }
?>
            </div>
<?php
    endwhile;
    wp_reset_query();
?>
        <!-- /visual --></div>
    </section>
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
    <section id="topics">
        <div class="inner">
            <div class="heading">
                <h1><img src="<?php echo get_template_directory_uri(); ?>/img/title_top_topics01.png" width="115%" alt="トピックス"></h1>
                <p class="date">last update <?php $args = array(
    'post_type'      => array('post','works','realestate'),
    'posts_per_page' => 5,
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
            <div class="list">
            <?php $args = array(
    'post_type'      => array('post','works'),
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'desc'
);
    $my_query = new WP_Query($args);
    $newscount = 0;
    if ($my_query->have_posts()): while ($my_query->have_posts()) : $my_query->the_post();
        if($newscount >= 12) break;
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
                    <p class="date"><?php if($cfs->get('new')) echo '<img src="'.get_template_directory_uri().'/img/icon_topics_new01.png" width="30" height="17" alt="NEW">' ;?><span class=f_days>投稿日：<?php the_time('Y/n/j') ?></span></p>
                    <?php
        if($cfs->get('works_images')){
            $images = $cfs->get('works_images');
            $size   = "works_top";
            $image_id = $images[0]['works_image'];
            $img = wp_get_attachment_image_src($image_id, $size);
            echo '<p class="thumb"><img src="'.$img[0].'" width="280" height="243" alt="'.get_the_title().'"></p>'."\n";
                    $count++;
        }elseif($cfs->get('cloumn_image')){
            $image_id = $cfs->get('cloumn_image');
            $size   = "column_archive";
            $img = wp_get_attachment_image_src($image_id, $size);
            echo '<p class="thumb"><img src="'.$img[0].'" width="280" height="146" alt="'.get_the_title().'"></p>';
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
    wp_reset_query();
?>
            <!-- /list --></div>
        <!-- /inner --></div>
        <!-- /topics --></section>
    <section id="hot">
        <div class="inner">
            <div class="heading">
                <h1><img src="<?php echo get_template_directory_uri(); ?>/img/title_top_hottopics01.png" width="316.25px" alt="ホットトピックス"></h1>
            </div>
            <div class="list">

<?php $args = array(
    'post_type'      => array('post','works'),
    'posts_per_page' => 30,
);
    $count = 0;
    $worksposts = array();
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
                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php
                        // if(get_post_meta($post->ID,'pickup_title',true)){
                        //     // echo $cfs->get('pickup_title');
                        //     echo get_post_meta($post->ID,'pickup_title',true);
                        // }else {
                            the_title();
                        /*}*/ ?></a></h2>
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
    <section id="works">
        <div class="inner">
            <div class="heading">
                <h1><img src="<?php echo get_template_directory_uri(); ?>/img/title_top_works01.png" width="276" alt="施工事例(閲覧数順)"></h1>
            </div>
            <div class="list">
<?php
    $args = array(
        'post_type'      => 'works',
        'orderby' => 'meta_value_num',
        'meta_key' => 'jetpack-post-views-Month',
        'order' => 'desc',
        'posts_per_page' => 3
    );
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()): while ($my_query->have_posts()) : $my_query->the_post();

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
?>
                <a href="<?php the_permalink(); ?>">
                <article class="works">
                    <ul class="categories">
                        <li class="type"><?php echo $type; ?></li>
                        <li class="taste"><?php echo $taste; ?></li>
                        <li class="case"><?php echo $case; ?></li>
                        <li class="area"><?php echo $area; ?></li>
                    </ul>
                    <ul class="images">
<?php
        $count = 1;
        if($cfs->get('works_images')){
            $images = $cfs->get('works_images');
            foreach ($images as $image) {
                if ($count == 1) {
                    $size   = "works_top";
                    $image_id = $image['works_image'];
                    $img = wp_get_attachment_image_src($image_id, $size);
                    echo '                        <li class="main_image"><img src="'.$img[0].'" width="280" height="243" alt="'.get_the_title().'"></li>'."\n";
                    $count++;
                }elseif ($count > 1 && $count < 5) {
                    $size   = "works_top_sub";
                    $image_id = $image['works_image'];
                    $img = wp_get_attachment_image_src($image_id, $size);
                    if($count == 2) {
                        echo '                        <li class="sub_image first"><img src="'.$img[0].'" width="90" height="90" alt="'.get_the_title().'"></li>'."\n";
                    }else {
                        echo '                        <li class="sub_image"><img src="'.$img[0].'" width="90" height="90" alt="'.get_the_title().'"></li>'."\n";
                    }
                    $count++;
                }else {
                    break;
                }
            }
        }
?>
                    </ul>
                    <h2><?php the_title(); ?></h2>
                    <p class="detail"><span>続きを見る</span></p>
                </article>
                </a>
<?php endwhile;
    else : ?>
        <p>記事はまだありません。</p>
<?php
    endif;
    wp_reset_query();
?>

<!--Ptengine-->
<script type="text/javascript">
	window._pt_sp_2 = [];
	_pt_sp_2.push('setAccount,758c2098');
	var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	(function() {
		var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
		atag.src = _protocol + 'js.ptengine.jp/pta.js';
		var stag = document.createElement('script'); stag.type = 'text/javascript'; stag.async = true;
		stag.src = _protocol + 'js.ptengine.jp/pts.js';
		var s = document.getElementsByTagName('script')[0]; 
		s.parentNode.insertBefore(atag, s);s.parentNode.insertBefore(stag, s);
	})();
</script>
        
            <!-- /list --></div>
        <!-- /inner --></div>
    <!-- /works --></section>
<!-- /top_contents --></main>
<?php get_footer(); ?>