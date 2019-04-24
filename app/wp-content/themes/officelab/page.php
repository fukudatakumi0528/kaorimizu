<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php $page = get_page(get_the_ID()); ?>
<main id="contents" class="page">
    <h2 id="page_title" class="<?php echo $post->post_name; ?>"><?php the_title();?></h2>
    <ol id="breadcrumb">
        <li><a href="<?php echo home_url(); ?>/">株式会社オフィス・ラボ ホーム</a></li>
<?php
        if ( is_page('company') || is_page() && $post->post_parent > 0) {
        echo '        <li><a href="'.home_url().'/company/info/">企業情報</a></li>'."\n";
} ;?>
        <li><?php the_title(); ?></li>
    </ol>
    <section id="single" class="<?php echo $post->post_name; ?>">
<?php the_content(); ?>
<?php
    endwhile;
    endif;
    wp_reset_postdata();
?>
    <!-- /single --></section>
<!-- /contents --></main>
<?php get_footer(); ?>