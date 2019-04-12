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

	<!-- tags -->
	<aside id="tags-sidebar" class="widget">
		<h3 class="widget-title">Tags</h3>
		<div class="tagcloud tagcloud-label">
			<ul>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>Lorem ipsum dolor sit amet</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>tag</span></a></li>
				<li><a href="#"><span>consectetur adipisicing elit</span></a></li>
			</ul>
		</div>
	</aside>
	<!--/ tags -->

</aside><!-- #sidebar -->
