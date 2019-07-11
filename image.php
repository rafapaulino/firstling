<?php
/**
 * The template for displaying image attachments.
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
				<?php 
					if ( have_posts() ) : 
						while ( have_posts() ) : the_post(); 
				?>
					<header class="page-header">
						<?php the_title(); ?>
						<div class="image-description">
							<?php
								$metadata = wp_get_attachment_metadata();
								printf( __( 'Image total size: %s pixels', 'firstling'), sprintf( '<a href="%1$s" title="%2$s"><span>%3$s</span> &times; <span>%4$s</span></a>', wp_get_attachment_url(), esc_attr( __( 'Full image link', 'firstling') ), $metadata['width'], $metadata['height'] ) );
								
								$metadata = wp_get_attachment_metadata();
								printf( __( 'Image total size: %s pixels', 'firstling'), sprintf( '<a href="%1$s" title="%2$s"><span>%3$s</span> &times; <span>%4$s</span></a>', wp_get_attachment_url(), esc_attr( __( 'Full image link', 'firstling') ), $metadata['width'], $metadata['height'] ) );
							?>
						</div>
					</header><!-- .page-header -->
					<p class="attachment">
						<a href="<?php echo wp_get_attachment_url( $post->ID, 'full' ); ?>" title="<?php the_title_attribute(); ?>">
							<?php 
								$img = getImageSRC($post->ID,'carrossel');
							?>
							<img src="<?php echo $img; ?>" class="img-fluid" alt="<?php the_title(); ?>">
						</a>
					</p>
					<div class="entry-caption">
						<em><?php if ( ! empty( $post->post_excerpt ) ) the_excerpt(); ?></em>
					</div>
					<?php the_content(); ?>

				<?php 
						endwhile; 
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