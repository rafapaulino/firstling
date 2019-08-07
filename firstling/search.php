<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package firstling
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 wrap">
			<div class="content-home">
				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'firstling'), get_search_query() ); ?></h1>
				</header><!-- .page-header -->
				<?php 
					if ( have_posts() ) : 
						while ( have_posts() ) : the_post(); 
							get_template_part( 'template-parts/content-loop' );
						endwhile; 
						firstling_paging_nav(); 
					else:
						get_template_part( 'template-parts/content-none' );
					endif; 
				?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
