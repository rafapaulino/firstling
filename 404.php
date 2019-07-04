<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); 
?>
<div class="container">
	<div class="row">
		<div class="col-12 wrap">
			<!-- 404 -->
			<div class="page-404">
				
				<div class="notfound">
					<div class="notfound-404">
						<h2><?php esc_attr_e("Page not found", "firstling"); ?></h2>
						<h3><span>4</span><span>0</span><span>4</span></h3>
					</div>
					<h4><?php esc_attr_e("The page you are looking for was not found, please use the form below to perform a search on the site.", "firstling"); ?></h4>
					<?php get_search_form(); ?>
				</div>

			</div>
			<!-- /404 -->
		</div>
	</div>
</div>
<?php
get_footer();
