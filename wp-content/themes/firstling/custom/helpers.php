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

function getExcerpt($limit = 150)
{
    $excerpt = odin_excerpt('excerpt', $limit);

    if (strlen($excerpt) > $limit) {
		$excerpt = substr(trim($excerpt),0,$limit);
    }
    
    return $excerpt;
}