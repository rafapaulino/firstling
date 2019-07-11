<?php
/**
 * Custom template tags for Odin.
 *
 * @package Firstling
 * @since 1.0.2
 */

if ( ! function_exists( 'firstling_classes_page_full' ) ) {

	/**
	 * Classes page full.
	 *
	 * @since 1.0.2
	 *
	 * @return string Classes name.
	 */
	function firstling_classes_page_full() {
		return 'col-md-12';
	}
}

if ( ! function_exists( 'firstling_classes_page_sidebar' ) ) {

	/**
	 * Classes page with sidebar.
	 *
	 * @since 1.0.2
	 *
	 * @return string Classes name.
	 */
	function firstling_classes_page_sidebar() {
		return 'col-md-9';
	}
}

if ( ! function_exists( 'firstling_classes_page_sidebar_aside' ) ) {

	/**
	 * Classes aside of page with sidebar.
	 *
	 * @since 1.0.2
	 *
	 * @return string Classes name.
	 */
	function firstling_classes_page_sidebar_aside() {
		return 'col-md-3 hidden-xs hidden-print widget-area';
	}
}

if ( ! function_exists( 'firstling_posted_on' ) ) {

	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since 1.0.2
	 */
	function firstling_posted_on() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post">' . __( 'Sticky', 'firstling' ) . ' </span>';
		}

		// Set up and print post meta information.
		printf( '<span class="entry-date">%s <time class="entry-date" datetime="%s">%s</time></span> <span class="byline">%s <span class="author vcard"><a class="url fn n" href="%s" rel="author">%s</a></span>.</span>',
			__( 'Posted in', 'firstling' ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			__( 'by', 'firstling' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}
}

if ( ! function_exists( 'firstling_paging_nav' ) ) {

	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since 1.0.2
	 */
	function firstling_paging_nav() {
		$mid  = 2;     // Total of items that will show along with the current page.
		$end  = 1;     // Total of items displayed for the last few pages.
		$show = false; // Show all items.

		echo firstling_pagination( $mid, $end, false );
	}
}

if ( ! function_exists( 'firstling_the_custom_logo' ) ) {

	/**
	 * Displays the optional custom logo.
	 *
	 * Does nothing if the custom logo is not available.
	 *
	 * @since Odin 2.2.10
	 */
	function firstling_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
}
