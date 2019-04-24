<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php $page = get_page(get_the_ID()); ?>
    <div id="page_title">
        <h2><img src="<?php echo get_template_directory_uri().'/img/page/bnr_'.$page->post_name.'.png';?>" width="1280" height="160" alt="<?php the_title();?>"></h2>
    </div>
    <div id="breadcrumb">
        <a href="<?php echo home_url(); ?>/">ホーム</a> &gt; <?php the_title(); ?>
    </div>
    <div id="contents">
        <div id="main" class="page editor">
<?php the_content(); ?>
<?php
    endwhile;
    endif;
    wp_reset_postdata();
?>
        </div><!-- /#main -->
<?php get_sidebar(); ?>
    </div><!-- /#contents -->
<?php get_footer(); ?>