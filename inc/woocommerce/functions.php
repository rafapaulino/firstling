<?php
/**
 * General functions used to integrate this theme with WooCommerce.
 *
 * @package odin
 */

if ( ! function_exists( 'firstling_before_content' ) ) {
	/**
	 * Before Content
	 * Wraps all WooCommerce content in wrappers which match the theme markup
	 * @since   2.2.6
	 * @return  void
	 */
	function firstling_before_content() {
		?>
		<main id="content" class="<?php echo firstling_classes_page_sidebar(); ?>" tabindex="-1" role="main">
		<?php
	}
}

if ( ! function_exists( 'firstling_after_content' ) ) {
	/**
	 * After Content
	 * Closes the wrapping divs
	 * @since   2.2.6
	 * @return  void
	 */
	function firstling_after_content() {
		?>
		</main><!-- #main -->
		<?php
	}
}

/**
 * Default loop columns on product archives
 * @return integer products per row
 * @since  2.2.6
 */
function firstling_loop_columns() {
	return apply_filters( 'firstling_loop_columns', 4 ); // 4 products per row
}

/**
 * Product gallery thumnail columns
 * @return integer number of columns
 * @since  2.2.6
 */
function firstling_thumbnail_columns() {
	return intval( apply_filters( 'firstling_product_thumbnail_columns', 4 ) );
}

/**
 * Products per page
 * @return integer number of products
 * @since  2.2.6
 */
function firstling_products_per_page() {
	return intval( apply_filters( 'firstling_products_per_page', 12 ) );
}
