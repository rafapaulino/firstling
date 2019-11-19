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

$firstling_prev_post = get_previous_post();
if (!empty( $firstling_prev_post )):
    $firstling_link = esc_url( get_permalink( $firstling_prev_post->ID ) );
    $firstling_title = firstling_wp_substr( $firstling_prev_post->post_title, 50 );
    $firstling_img = firstling_image_src( $firstling_prev_post->ID, 'next-prev');
?>
<div class="postNavigation prevPost d-print-none" itemscope itemtype="http://schema.org/Article">
    <a href="<?php echo esc_url($firstling_link); ?>" class="img ui-box topBottom-leftRightCorner" title="<?php echo esc_attr($firstling_title); ?>" itemprop="url">
        <span class="ui-border-element">
            <img src="<?php echo esc_url($firstling_img); ?>" alt="<?php echo esc_attr($firstling_title); ?>" itemprop="image">
        </span>
    </a>
    <a href="<?php echo esc_url($firstling_link); ?>" title="<?php echo esc_attr($firstling_title); ?>" class="title">
        <span><?php esc_attr_e('Prev','firstling'); ?></span>
        <h3 itemprop="headline"><?php echo esc_attr($firstling_title); ?></h3>
    </a>
</div>
<?php else: ?>
<div class="postNavigation prevPost d-print-none"></div>
<?php endif; ?>