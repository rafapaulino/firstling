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
$myId = $post->ID;
$myPostType = get_post_type( $myId );

$args = array(
    'post__not_in' => array( $myId ),
    'posts_per_page' => 5,
    'post_type' => $myPostType,
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
            <ul id="carrossel<?php echo intval($myId); ?>">
            <?php 
                while ( $related->have_posts() ):
                $related->the_post();
                
                $myLink = esc_url( get_permalink() );
                $myTitle =  esc_attr( get_the_title() );
                $myId = get_the_ID();
                $img = firstling_image_src($myId, 'news-sidebar');
            ?>
                <li>
                    <a href="<?php echo esc_url($myLink); ?>" title="<?php echo esc_attr($myTitle); ?>" itemprop="url" class="ui-box topBottom-leftRightCorner">
                        <span class="ui-border-element">
                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($myTitle); ?>" itemprop="image" class="img-fluid">
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

                    <h2 itemprop="headline"><a href="<?php echo esc_url($myLink); ?>" title="<?php echo esc_attr($myTitle); ?>" itemprop="url"><?php echo esc_attr($myTitle); ?></a></h2>
                </li>
            <?php endwhile; ?>          
            </ul>
        </div>
        <a href="#" title="<?php esc_attr_e("Back", "firstling"); ?>" class="jcarousel-control-prev jcarousel-related-posts-control-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
        <a href="#" title="<?php esc_attr_e("Go", "firstling"); ?>" class="jcarousel-control-next jcarousel-related-posts-control-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
    </div>
</div>
<?php endif; wp_reset_postdata(); ?>