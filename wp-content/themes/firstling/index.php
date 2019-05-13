<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
<div class="container">
	<?php 
		$latest_posts = get_posts(array(
			'numberposts' => 5,
			'orderby'    => 'date',
			'sort_order' => 'desc'
		));
		$total = count($latest_posts);

		if ($total > 0):
	?>
	<div class="row">
		<div class="col-md-12 no-padding">
			<div class="wrapCarousel no-padding d-print-none">
				<!-- carrossel -->
				<div id="carouselHome" class="carousel slide carouselSwipe" data-interval="8000" data-ride="carousel" itemscope itemtype="http://schema.org/ItemList">
					<ol class="carousel-indicators">
						<?php for($a = 0; $a < $total; $a++) { ?>
							<li data-target="#carouselHome" data-slide-to="0" class="<?php esc_attr_e( ($a == 0) ? 'active':''); ?>"></li>
						<?php } ?>
					</ol>
					<div class="carousel-inner">
						<?php 
							$x = 0;
							foreach ($latest_posts as $post): setup_postdata( $post );
							$category = get_the_category(); 
							$img = getImageSRC(get_the_ID(),'carrossel');
						?>
							<div class="carousel-item <?php esc_attr_e( ($x == 0) ? 'active':''); ?>">
								<a href="<?php the_permalink(); ?>" itemprop="url">
									<img class="d-block w-100" src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
								</a>
								
								<div class="carousel-caption d-md-block">
									<?php if (count($category) > 0): ?>
										<h5 itemprop="name"><a href="<?php the_permalink(); ?>" itemprop="url" data-animation="animated fadeInLeft"><?php esc_attr_e($category[0]->cat_name); ?></a></h5>
									<?php endif; ?>
									<p itemprop="itemListElement"><a href="<?php the_permalink(); ?>" itemprop="url" data-animation="animated bounceInLeft"><?php the_title(); ?></a></p>
								</div>
							</div>
						<?php $x++; endforeach; ?>
					</div>
					<a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<!--/ carrossel -->
			</div>
		</div>
	</div>
	<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<div class="row">
		<div class="col-12 col-md-8 wrap">
			<main class="content-home">
				<?php 
					if ( have_posts() ) : 
						while ( have_posts() ) : the_post(); 
							get_template_part( 'content-loop' );
						endwhile; 
						odin_paging_nav(); 
					else:
						get_template_part( 'content-none' );
					endif; 
				?>
			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
