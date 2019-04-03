<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
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
			<p class="col-md-6 col-sm-12">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'odin' ); ?> | <?php echo sprintf( __( 'Powered by the <a href="%s" rel="nofollow" target="_blank">Rafael Paulino</a> forces and <a href="%s" rel="nofollow" target="_blank">WordPress</a>.', 'odin' ), 'https://rafapaulino.com/', 'http://wordpress.org/' ); ?></p>
		</div>
	</div><!-- .container -->

	<div id="stop" class="backToTop">
		<div class="fas fa-arrow-up" aria-hidden="true" title="Voltar ao Topo"></div>
	</div>
</footer><!--/ footer -->

<?php wp_footer(); ?>
</body>
</html>
