<?php
/**
 * The sidebar containing the secondary widget area, displays on homepage, archives and posts.
 *
 * If no active widgets in this sidebar, it will shows Recent Posts, Archives and Tag Cloud widgets.
 *
 * @package Firstling
 * @since 1.0.2
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
