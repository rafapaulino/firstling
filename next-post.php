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

$next_post = get_next_post();
if (!empty( $next_post )):
    $link = esc_url( get_permalink( $next_post->ID ) );
    $title = wpSubstr($next_post->post_title, 50);
    $img = getImageSRC( $next_post->ID, 'next-prev');
?>
<div class="postNavigation nextPost d-print-none" itemscope itemtype="http://schema.org/Article">
    <a href="<?php echo $link; ?>" class="img ui-box topBottom-leftRightCorner" title="<?php echo $title; ?>" itemprop="url">
        <span class="ui-border-element">
            <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>" itemprop="image">
        </span>
    </a>
    <a href="<?php echo $link; ?>" title="<?php echo $title; ?>" class="title">
        <span><?php esc_attr_e('Next','odin'); ?></span>
        <h3 itemprop="headline"><?php echo $title; ?></h3>
    </a>
</div>
<?php else: ?>
<div class="postNavigation nextPost d-print-none"></div>
<?php endif; ?>