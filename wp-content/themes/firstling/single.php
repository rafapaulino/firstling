<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 no-padding">
			<main class="content-single">
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
								<?php odin_posted_on(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header>

					<div class="entry-content">
						<?php
							the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
						?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
							<span class="cat-links"><?php echo __( 'Posted in:', 'odin' ) . ' ' . get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'odin' ) ); ?></span>
						<?php endif; ?>
						
						<?php if (has_tag()) : ?>
							<div class="tagcloud tagcloud-label">
								<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( get_the_author_meta( 'description' ) ) : ?>
							<div class="author-biography">
								<span class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?></span>
								<span class="author-description"><?php the_author_meta( 'description' ); ?></span>
							</div><!-- .author-biography -->
						<?php endif; ?>

						<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
							<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'odin' ), __( '1 Comment', 'odin' ), __( '% Comments', 'odin' ) ); ?></span>
						<?php endif; ?>

						<div class="prev-next-content">
							<?php 
								get_template_part( 'prev-post' );
								get_template_part( 'next-post' );
							?>
						</div>
						<?php get_template_part( 'related-posts' ); ?>
					</footer>

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
			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();