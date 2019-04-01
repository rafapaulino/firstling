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

		</div><!-- .row -->
	</div><!-- #wrapper -->

	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<nav role="navigation" class="col-md-6">
					<ul id="menu-footer" class="nav footer-nav clearfix">
						<li><a href="https://colorlib.com/sparkling/" aria-current="page">Home</a></li>
						<li><a href="https://colorlib.com/sparkling/full-width/">Full-Width Page</a></li>
						<li><a href="https://colorlib.com/sparkling/sample-page/">Sample Page</a></li>
						<li><a href="https://colorlib.com/sparkling/languages/">Languages</a></li>
						<li><a href="https://colorlib.com/sparkling/contact-us/">Contact us</a></li>
					</ul>
				</nav>
				<p class="col-md-6">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'odin' ); ?> | <?php echo sprintf( __( 'Powered by the <a href="%s" rel="nofollow" target="_blank">Rafael Paulino</a> forces and <a href="%s" rel="nofollow" target="_blank">WordPress</a>.', 'odin' ), 'https://rafapaulino.com/', 'http://wordpress.org/' ); ?></p>
			</div>
		</div><!-- .container -->

		<div id="stop" class="backToTop">
            <div class="fas fa-arrow-up" aria-hidden="true" title="Voltar ao Topo"></div>
        </div>
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</main>
</body>
</html>
