<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package firstling
 */
?>
<div class="wrap-sidebar col-12 col-md-4">
	<aside id="sidebar">
		<?php 
			if ( is_active_sidebar( 'main-sidebar' ) ):
				dynamic_sidebar( 'main-sidebar' );
			endif;
		?>
	</aside><!-- #sidebar -->
</div>
