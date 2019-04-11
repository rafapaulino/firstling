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
	
	<!-- redes sociais -->
	<aside id="redes-sociais-sidebar" class="widget">
		<ul class="redes-sociais-mini">
			<li><a class="facebook" href="https://www.facebook.com/" target="_blank" title="Clique aqui para acessar o Facebook"><i class="fab fa-facebook"></i></a></li>
			<li><a class="twitter" href="https://www.twitter.com/" target="_blank" title="Clique aqui para acessar o Twitter"><i class="fab fa-twitter"></i></a></li>
			<li><a class="youtube" href="https://www.facebook.com/" target="_blank" title="Clique aqui para acessar o YouTube"><i class="fab fa-youtube"></i></a></li>
			<li><a class="instagram" href="https://www.facebook.com/" target="_blank" title="Clique aqui para acessar o Instagram"><i class="fab fa-instagram"></i></a></li>
			<li><a class="whatsapp" href="https://www.twitter.com/" target="_blank" title="Clique aqui para compartilhar no WhatsApp "><i class="fab fa-whatsapp"></i></a></li>
			<li><a class="pinterest" href="https://plus.google.com/" target="_blank" title="Clique aqui para acessar o Pinterest"><i class="fab fa-pinterest"></i></a></li>
			<li><a class="linkedin" href="https://www.twitter.com/" target="_blank" title="Clique aqui para acessar o Linkedin"><i class="fab fa-linkedin"></i></a></li>
		</ul>
	</aside>
	<!--/ redes sociais -->


	<aside id="form-sidebar" class="widget">
		<?php get_search_form(); ?>
	</aside>

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
