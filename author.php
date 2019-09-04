<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package firstling
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 wrap">
			<div class="content-home">
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					?>
					<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<div class="author-biography">
							<span class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?></span>
							<span class="author-description"><?php the_author_meta( 'description' ); ?></span>
						</div><!-- .author-biography -->
					<?php endif; ?>
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