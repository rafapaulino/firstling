<?php
/**
 * The sidebar containing the secondary widget area, displays on homepage, archives and posts.
 *
 * If no active widgets in this sidebar, it will shows Recent Posts, Archives and Tag Cloud widgets.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<aside id="sidebar" class="col-md-4">
	<?php 
		if ( is_active_sidebar( 'main-sidebar' ) ):
			dynamic_sidebar( 'main-sidebar' );
		endif;
	?>
</aside><!-- #sidebar -->
