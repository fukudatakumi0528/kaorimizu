<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Get the current post's TOC list or supplied post's TOC list.
 *
 * @access public
 * @since  2.0
 *
 * @param int|null|WP_Post $post                 An instance of WP_Post or post ID. Defaults to current post.
 * @param bool             $apply_content_filter Whether or not to apply `the_content` filter when processing post for headings.
 *
 * @return string
 */
function get_ez_toc_list( $post = NULL, $apply_content_filter = TRUE ) {

	if ( ! $post instanceof WP_Post ) {

		$post = get_post( $post );
	}

	$ezPost = new ezTOC_Post( $post );

	if ( $apply_content_filter ) {

		$ezPost->applyContentFilter()->process();

	} else {

		$ezPost->process();
	}

	return $ezPost->getTOCList();
}

/**
 * Display the current post's TOC list or supplied post's TOC list.
 *
 * @access public
 * @since  2.0
 *
 * @param null|WP_Post $post                 An instance of WP_Post
 * @param bool         $apply_content_filter Whether or not to apply `the_content` filter when processing post for headings.
 */
function ez_toc_list( $post = NULL, $apply_content_filter = TRUE ) {

	echo get_ez_toc_list( $post, $apply_content_filter );
}

/**
 * Get the current post's TOC content block or supplied post's TOC content block.
 *
 * @access public
 * @since  2.0
 *
 * @param int|null|WP_Post $post                 An instance of WP_Post or post ID. Defaults to current post.
 * @param bool             $apply_content_filter Whether or not to apply `the_content` filter when processing post for headings.
 *
 * @return string
 */
function get_ez_toc_block( $post = NULL, $apply_content_filter = TRUE ) {

	if ( ! $post instanceof WP_Post ) {

		$post = get_post( $post );
	}

	$ezPost = new ezTOC_Post( $post );

	if ( $apply_content_filter ) {

		$ezPost->applyContentFilter()->process();

	} else {

		$ezPost->process();
	}

	return $ezPost->getTOC();
}

/**
 * Display the current post's TOC content or supplied post's TOC content.
 *
 * @access public
 * @since  2.0
 *
 * @param null|WP_Post $post                 An instance of WP_Post
 * @param bool         $apply_content_filter Whether or not to apply `the_content` filter when processing post for headings.
 */
function ez_toc_block( $post = NULL, $apply_content_filter = TRUE ) {

	echo get_ez_toc_block( $post, $apply_content_filter );
}
