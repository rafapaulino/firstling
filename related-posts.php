<?php 
/**
 * The template for displaying image attachments.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */
if ( ! defined('ABSPATH')) exit('restricted access');

global $post;
$id = $post->ID;
$post_type = get_post_type( $id );

$args = array(
    'post__not_in' => array( $id ),
    'posts_per_page' => 5,
    'post_type' => $post_type,
    'ignore_sticky_posts' => 1,
    'orderby' => 'rand',
    'order'   => 'ASC'
);

$related = new WP_Query( $args );
if ( $related->have_posts() ):
?>
<div class="relatedPosts d-print-none">
    <h3 class="titulosChamada"><?php esc_attr_e("Related Content", "firstling"); ?></h3>
    <div class="jcarousel-wrapper" itemscope itemtype="http://schema.org/Article">
        <div class="jcarousel jcarousel-related-posts">
            <ul id="carrossel<?php echo intval($id); ?>">
            <?php 
                while ( $related->have_posts() ):
                $related->the_post();
                
                $link = esc_url( get_permalink() );
                $title =  esc_attr( get_the_title() );
                $id = get_the_ID();
                $img = getImageSRC($id, 'news-sidebar');
            ?>
                <li>
                    <a href="<?php echo $link; ?>" title="<?php echo $title; ?>" itemprop="url" class="ui-box topBottom-leftRightCorner">
                        <span class="ui-border-element">
                            <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>" itemprop="image" class="img-fluid">
                        </span>
                    </a>

                    <?php 
                        $categories = get_the_category(); 
                        if ( ! empty( $categories ) ):
                    ?>
                        <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>" class="category" title="<?php echo esc_attr( $categories[0]->name ); ?>" itemprop="about">
                            <?php echo esc_attr( $categories[0]->name ); ?>
                        </a>
                    <?php endif; ?>

                    <h2 itemprop="headline"><a href="<?php echo $link; ?>" title="<?php echo $title; ?>" itemprop="url"><?php echo $title; ?></a></h2>
                </li>
            <?php endwhile; ?>          
            </ul>
        </div>
        <a href="#" title="<?php esc_attr_e("Back", "firstling"); ?>" class="jcarousel-control-prev jcarousel-related-posts-control-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
        <a href="#" title="<?php esc_attr_e("Go", "firstling"); ?>" class="jcarousel-control-next jcarousel-related-posts-control-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
    </div>
</div>
<?php endif; wp_reset_postdata(); ?>