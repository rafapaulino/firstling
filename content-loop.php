<?php
/**
 * The template used for displaying page content.
 *
 * @package Firstling
 * @since 1.0.2
 */
?>

<?php 
	$id = intval(get_the_ID());
	$img = firstling_getImageSRC($id,'news-sidebar');
?>
<article id="post-<?php echo $id; ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="thumb">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url" class="ui-box topBottom-leftRightCorner">
			<span class="ui-border-element">
				<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" itemprop="image" class="img-fluid">
			</span>
		</a>
	</div>
	<div class="details">
		<h2 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url"><?php the_title(); ?></a></h2>
		<a class="time" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url"><?php echo esc_html(get_the_date()); ?></a>
		<p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo firstling_getExcerpt(200); ?>...</a></p>
	</div>
</article>