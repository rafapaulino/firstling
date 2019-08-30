<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package firstling
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
			<p class="col-md-6 col-sm-12 text-right">
				&copy; <?php echo esc_attr(date( 'Y' )); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php esc_attr_e('All rights reserved', 'firstling'); ?> | <?php esc_attr_e('Powered by the', 'firstling'); ?>
				<a href="http://rafapaulino.com" rel="nofollow" target="_blank"><?php esc_attr_e('Rafael Paulino', 'firstling'); ?></a> <?php esc_attr_e('forces with', 'firstling'); ?> <a href="http://wordpress.org/" rel="nofollow" target="_blank"><?php esc_attr_e('WordPress', 'firstling'); ?></a>			
			</p>
		</div>
	</div><!-- .container -->

	<div id="stop" class="backToTop">
		<div class="fas fa-arrow-up" aria-hidden="true" title="<?php esc_attr_e("Back to Top", "firstling"); ?>"></div>
	</div>
</footer><!--/ footer -->
<?php wp_footer(); ?>
</body>
</html>