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

$next_post = get_next_post();
if (!empty( $next_post )):
    $myLink = esc_url( get_permalink( $next_post->ID ) );
    $myTitle = firstling_wp_substr($next_post->post_title, 50);
    $img = firstling_image_src( $next_post->ID, 'next-prev');
?>
<div class="postNavigation nextPost d-print-none" itemscope itemtype="http://schema.org/Article">
    <a href="<?php echo esc_attr($myLink); ?>" class="img ui-box topBottom-leftRightCorner" title="<?php echo esc_attr($myTitle); ?>" itemprop="url">
        <span class="ui-border-element">
            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($myTitle); ?>" itemprop="image">
        </span>
    </a>
    <a href="<?php echo esc_attr($myLink); ?>" title="<?php echo esc_attr($myTitle); ?>" class="title">
        <span><?php esc_attr_e('Next','firstling'); ?></span>
        <h3 itemprop="headline"><?php echo esc_attr($myTitle); ?></h3>
    </a>
</div>
<?php else: ?>
<div class="postNavigation nextPost d-print-none"></div>
<?php endif; ?>