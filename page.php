<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Firstling
 * @since 1.0.2
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-12 wrap">
			<div class="content-single">
				<?php 
					if ( have_posts() ) : 
						while ( have_posts() ) : the_post(); 

						if ( has_post_thumbnail() ):
							$img = getImageSRC(get_the_ID(),'single');
				?>
						<img src="<?php echo $img; ?>" class="img-fluid" alt="<?php the_title(); ?>">
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
						get_template_part( 'content-none' );
					endif; 
				?>
				</article>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();