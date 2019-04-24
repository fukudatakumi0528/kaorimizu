<?php
        $cat  = get_the_category();
        $cat  = $cat[0];
        $id   = $cat->term_id;
        $slug = $cat->slug;
        $name = $cat->name;
get_header(); ?>
<main id="contents" class="single">
    <?php if($slug == 'column') echo '<h2 id="page_title" class="column">コラム</h2>'; ?>
    <?php if($slug == 'news') echo '<h2 id="page_title" class="news">ニュース</h2>'; ?>
    <ol id="breadcrumb">
        <li><a href="<?php echo home_url(); ?>/">株式会社オフィス・ラボ ホーム</a></li>
        <li><a href="<?php echo home_url().'/news'; ?>/">ニュース</a></li>
        <li><?php the_title(); ?></li>
    </ol>
    <section id="single">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="post">
            <p class="date"><span>投稿日：<?php the_time('Y/n/j') ?></span></p>
            <h1 class="title"><?php the_title(); ?></h1>
            <?php if ($cfs->get('cloumn_image')){
                $image_id = $cfs->get('cloumn_image');
                $size   = "column_single";
                $img = wp_get_attachment_image_src($image_id, $size);
                echo '<p class="thumb"><img src="'.$img[0].'" width="'.$img[1].'" height="'.$img[2].'" alt="'.get_the_title().'"></p>';
            }?>
            <div class="content editor"><?php the_content(); ?></div>
        </article>
        <nav id="page_navi">
            <ul class="page_navi_in">
<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
if ( !empty( $prev_post ) ): ?>
                <li class="back"><?php previous_post_link('%link', '戻る', TRUE); ?></li>
<?php endif; ?>
                <li class="current"><a href="<?php echo home_url().'/news/'; ?>">一覧に戻る</a></li>
<?php
if ( !empty( $next_post ) ): ?>
                <li class="next"><?php next_post_link('%link', '次へ', TRUE); ?></li>
<?php endif; ?>
            </ul>
        <!-- /page_nav --></nav>
<?php endwhile; ?>
<?php else : ?>
        <h1>記事はまだありません。</h1>
<?php
    endif;
    wp_reset_postdata();
?>

<div class="fb-share-button" data-href="<?php the_permalink() ?>" data-layout="box_count"></div>

    <!-- /single --></section>
<!-- /contents --></main>
</script>
<?php get_footer(); ?>