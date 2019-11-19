<?php 
/**
 * The template for displaying image attachments.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Firstling
 * @since 1.0.2
 */
if ( ! defined('ABSPATH')) exit('restricted access');

global $post;
$firstling_id = $post->ID;
$firstling_post_type = get_post_type( $firstling_id );

$firstling_args = array(
    'post__not_in' => array( $firstling_id ),
    'posts_per_page' => 5,
    'post_type' => $firstling_post_type,
    'ignore_sticky_posts' => 1,
    'orderby' => 'rand',
    'order'   => 'ASC'
);

$firstling_related = new WP_Query( $firstling_args );
if ( $firstling_related->have_posts() ):
?>
<div class="relatedPosts d-print-none">
    <h3 class="titulosChamada"><?php esc_attr_e("Related Content", "firstling"); ?></h3>
    <div class="jcarousel-wrapper" itemscope itemtype="http://schema.org/Article">
        <div class="jcarousel jcarousel-related-posts">
            <ul id="carrossel<?php echo intval($firstling_id); ?>">
            <?php 
                while ( $firstling_related->have_posts() ):
                $firstling_related->the_post();
                
                $firstling_link = esc_url( get_permalink() );
                $firstling_title = esc_attr( get_the_title() );
                $firstling_id = get_the_ID();
                $firstling_img = firstling_image_src($firstling_id, 'news-sidebar');
            ?>
                <li>
                    <a href="<?php echo esc_url($firstling_link); ?>" title="<?php echo esc_attr($firstling_title); ?>" itemprop="url" class="ui-box topBottom-leftRightCorner">
                        <span class="ui-border-element">
                            <img src="<?php echo esc_url($firstling_img); ?>" alt="<?php echo esc_attr($firstling_title); ?>" itemprop="image" class="img-fluid">
                        </span>
                    </a>

                    <?php 
                        $firstling_categories = get_the_category(); 
                        if ( ! empty( $firstling_categories ) ):
                    ?>
                        <a href="<?php echo esc_url( get_category_link( $firstling_categories[0]->term_id ) ); ?>" class="category" title="<?php echo esc_attr( $firstling_categories[0]->name ); ?>" itemprop="about">
                            <?php echo esc_attr( $firstling_categories[0]->name ); ?>
                        </a>
                    <?php endif; ?>

                    <h2 itemprop="headline"><a href="<?php echo esc_url($firstling_link); ?>" title="<?php echo esc_attr($firstling_title); ?>" itemprop="url"><?php echo esc_attr($firstling_title); ?></a></h2>
                </li>
            <?php endwhile; ?>          
            </ul>
        </div>
        <a href="#" title="<?php esc_attr_e("Back", "firstling"); ?>" class="jcarousel-control-prev jcarousel-related-posts-control-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
        <a href="#" title="<?php esc_attr_e("Go", "firstling"); ?>" class="jcarousel-control-next jcarousel-related-posts-control-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
    </div>
</div>
<?php endif; wp_reset_postdata(); ?>