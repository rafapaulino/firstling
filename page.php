<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package firstling
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 wrap">
			<div class="content-single">
				<?php 
					if ( have_posts() ) : 
						while ( have_posts() ) : the_post(); 

						if ( has_post_thumbnail() ):
							$img = firstling_image_src(get_the_ID(),'single');
				?>
						<img src="<?php echo esc_url($img); ?>" class="img-fluid" alt="<?php the_title(); ?>">
						<?php endif; ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						
						<?php if ( 'post' == get_post_type() ) : ?>
							<div class="entry-meta">
								<?php firstling_posted_on(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
					<?php 
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endwhile; 
						else:
							get_template_part( 'template-parts/content-none' );
						endif; 
					?>
				</article>
			</div>
		</div>
        <?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
