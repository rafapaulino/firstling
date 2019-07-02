<?php

if ( ! defined('ABSPATH')) exit('restricted access');

//pega o valor src da imagem 
function getImageSRC($id, $size = 'thumbnail')
{
    $post_thumbnail_id = get_post_thumbnail_id( intval($id) );
    $image_attributes = wp_get_attachment_image_src( intval($post_thumbnail_id), $size );
    if ( $image_attributes ) :
        return esc_attr($image_attributes[0]);
    else :
        return esc_url('http://placehold.it/1140x426');
    endif;
}

function getExcerpt($limit = 150, $type = 'excerpt')
{
    $excerpt = odin_excerpt($type, $limit);

    if (strlen($excerpt) > $limit) {
		$excerpt = substr(trim($excerpt),0,$limit);
    }
    
    return $excerpt;
}

function wpSubstr($string, $limit = 150)
{
    $new_string = substr(trim($string), 0, $limit);
    
    if (strlen($string) > $limit) {
        $new_string = $new_string . '...';
    }
    return esc_attr($new_string);
}

function firstling_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
add_filter('style_loader_tag', 'firstling_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'firstling_remove_type_attr', 10, 2);