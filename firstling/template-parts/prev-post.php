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

$prev_post = get_previous_post();
if (!empty( $prev_post )):
    $link = esc_url( get_permalink( $prev_post->ID ) );
    $title = firstling_wpSubstr( $prev_post->post_title, 50 );
    $img = firstling_image_src( $prev_post->ID, 'next-prev');
?>
<div class="postNavigation prevPost d-print-none" itemscope itemtype="http://schema.org/Article">
    <a href="<?php echo $link; ?>" class="img ui-box topBottom-leftRightCorner" title="<?php echo $title; ?>" itemprop="url">
        <span class="ui-border-element">
            <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>" itemprop="image">
        </span>
    </a>
    <a href="<?php echo $link; ?>" title="<?php echo $title; ?>" class="title">
        <span><?php esc_attr_e('Prev','firstling'); ?></span>
        <h3 itemprop="headline"><?php echo $title; ?></h3>
    </a>
</div>
<?php else: ?>
<div class="postNavigation prevPost d-print-none"></div>
<?php endif; ?>