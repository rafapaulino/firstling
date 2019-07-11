<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Firstling
 * @since 1.0.2
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
							get_template_part( 'content-loop' );
						endwhile; 
						firstling_paging_nav(); 
					else:
						get_template_part( 'content-none' );
					endif; 
				?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();