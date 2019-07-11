<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Firstling
 * @since 1.0.2
 */
?>
</main>
<!--/ main -->

<!-- footer -->
<footer id="footer">
	<div class="container">
		<div class="row">
			<nav class="col-md-6 col-sm-12">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu',
							'depth'          => 2,
							'container'      => false,
							'menu_class'     => 'nav footer-nav clearfix',
							'fallback_cb'     => false,
							'items_wrap'     => '<ul id="menu-footer" class="%2$s">%3$s</ul>',
						)
					);
				?>
			</nav>
			<p class="col-md-6 col-sm-12">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'firstling'); ?> | <?php echo sprintf( __( 'Powered by the <a href="%s" rel="nofollow" target="_blank">Rafael Paulino</a> forces with <a href="%s" rel="nofollow" target="_blank">WordPress</a> and <a href="%s" rel="nofollow" target="_blank">Odin</a>.', 'firstling'), 'https://rafapaulino.com/', 'http://wordpress.org/','http://wpod.in/' ); ?></p>
		</div>
	</div><!-- .container -->

	<div id="stop" class="backToTop">
		<div class="fas fa-arrow-up" aria-hidden="true" title="<?php esc_attr_e("Back to Top", "firstling"); ?>"></div>
	</div>
</footer><!--/ footer -->
<?php wp_footer(); ?>
</body>
</html>