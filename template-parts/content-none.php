<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package firstling
 */

?>
<div>
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( esc_attr( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'firstling'), esc_url(admin_url( 'post-new.php' )) ); ?></p>
	<?php elseif ( is_search() ) : ?>
		<p><?php esc_attr_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'firstling'); ?></p>
		<?php get_search_form(); ?>
	<?php else : ?>
		<p><?php esc_attr_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'firstling'); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div><!-- .page-content -->
