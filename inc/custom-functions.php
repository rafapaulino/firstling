<?php 

if ( ! defined('ABSPATH')) exit('restricted access');


/**
 * Custom logo URL.
 */
function firstling_admin_logo_url() {
	return home_url();
}

add_filter( 'login_headerurl', 'firstling_admin_logo_url' );

/**
 * Custom logo title.
 */
function firstling_admin_logo_title() {
	return get_bloginfo( 'name' );
}

add_filter( 'login_headertitle', 'firstling_admin_logo_title' );

/**
 * Remove widgets dashboard.
 */
function firstling_admin_remove_dashboard_widgets() {
	// remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	// remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

	// Yoast's SEO Plugin Widget
	remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
}

add_action( 'wp_dashboard_setup', 'firstling_admin_remove_dashboard_widgets' );

if ( ! function_exists( 'firstling_posted_on' ) ) {

	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since 1.0.2
	 */
	function firstling_posted_on() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			?><span class="featured-post"><?php esc_attr_e( 'Sticky', 'firstling' ); ?></span><?php
		}

		// Set up and print post meta information.
		printf( '<span class="entry-date">%s <time class="entry-date" datetime="%s">%s</time></span> <span class="byline">%s <span class="author vcard"><a class="url fn n" href="%s" rel="author">%s</a></span>.</span>',
			esc_attr( 'Posted in', 'firstling' ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( 'by', 'firstling' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}
}

/**
 * Pagination.
 *
 * @since  2.2.0
 *
 * @global array $wp_query   Current WP Query.
 * @global array $wp_rewrite URL rewrite rules.
 *
 * @param  int   $mid   Total of items that will show along with the current page.
 * @param  int   $end   Total of items displayed for the last few pages.
 * @param  bool  $show  Show all items.
 * @param  mixed $query Custom query.
 *
 * @return string       Return the pagination.
 */
function firstling_pagination( $mid = 2, $end = 1, $show = false, $query = null ) {

	// Prevent show pagination number if Infinite Scroll of JetPack is active.
	if ( ! isset( $_GET[ 'infinity' ] ) ) {

		global $wp_query, $wp_rewrite;

		$total_pages = $wp_query->max_num_pages;

		if ( is_object( $query ) && null != $query ) {
			$total_pages = $query->max_num_pages;
		}

		if ( $total_pages > 1 ) {
			$url_base = $wp_rewrite->pagination_base;
			$big = 999999999;

			// Sets the paginate_links arguments.
			$arguments = apply_filters( 'firstling_pagination_args', array(
					'base'      => esc_url_raw( str_replace( $big, '%#%', get_pagenum_link( $big, false ) ) ),
					'format'    => '',
					'current'   => max( 1, get_query_var( 'paged' ) ),
					'total'     => $total_pages,
					'show_all'  => $show,
					'end_size'  => $end,
					'mid_size'  => $mid,
					'type'      => 'list',
					'prev_text' => __( '&laquo; Previous', 'firstling' ),
					'next_text' => __( 'Next &raquo;', 'firstling' ),
				)
			);

			$pagination = '<div class="pagination-wrap">' . paginate_links( $arguments ) . '</div>';

			// Prevents duplicate bars in the middle of the url.
			if ( $url_base ) {
				$pagination = str_replace( '//' . $url_base . '/', '/' . $url_base . '/', $pagination );
			}

			return $pagination;
		}
	}
}

/**
 * Related Posts.
 *
 * Usage:
 * To show related by categories:
 * Add in single.php <?php firstling_related_posts(); ?>
 * To show related by tags:
 * Add in single.php <?php firstling_related_posts( 'tag' ); ?>
 *
 * @since  2.2.0
 *
 * @global array $post         WP global post.
 *
 * @param  string $display      Set category or tag.
 * @param  int    $qty          Number of posts to be displayed (default 4).
 * @param  string $title        Set the widget title.
 * @param  bool   $thumb        Enable or disable displaying images (default true).
 * @param  string $post_type    Post type (default post).
 *
 * @return string              Related Posts.
 */
function firstling_related_posts( $display = 'category', $qty = 4, $title = '', $thumb = true, $post_type = 'post' ) {
	global $post;

	$show = false;
	$post_qty = (int) $qty;
	! empty( $title ) || $title = __( 'Related Posts', 'firstling' );

	// Creates arguments for WP_Query.
	switch ( $display ) {
		case 'tag':
			$tags = wp_get_post_tags( $post->ID );

			if ( $tags ) {
				// Enables the display.
				$show = true;

				$tag_ids = array();
				foreach ( $tags as $tag ) {
					$tag_ids[] = $tag->term_id;
				}

				$args = array(
					'tag__in' => $tag_ids,
					'post__not_in' => array( $post->ID ),
					'posts_per_page' => $post_qty,
					'post_type' => $post_type,
					'ignore_sticky_posts' => 1
				);
			}
			break;

		default :
			$categories = get_the_category( $post->ID );

			if ( $categories ) {

				// Enables the display.
				$show = true;

				$category_ids = array();
				foreach ( $categories as $category ) {
					$category_ids[] = $category->term_id;
				}

				$args = array(
					'category__in' => $category_ids,
					'post__not_in' => array( $post->ID ),
					'posts_per_page' => $post_qty,
					'post_type' => $post_type,
					'ignore_sticky_posts' => 1,
				);
			}
			break;
	}

	if ( $show ) {

		$related = new WP_Query( $args );
		if ( $related->have_posts() ) {

			$layout = '<div id="related-post">';
			$layout .= '<h3>' . esc_attr( $title ) . '</h3>';
			$layout .= ( $thumb ) ? '<div class="row">' : '<ul>';

			while ( $related->have_posts() ) {
				$related->the_post();

				$layout .= ( $thumb ) ? '<div class="col-md-' . ceil( 12 / $qty ) . '">' : '<li>';

				if ( $thumb ) {
					if ( has_post_thumbnail() ) {
						$img = get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
					} else {
						$img = '<img src="' . get_template_directory_uri() . '/core/assets/images/odin-thumb-placeholder.jpg" alt="' . get_the_title() . '">';
					}
					// Filter to replace the image.
					$image = apply_filters( 'firstling_related_posts_thumbnail', $img );

					$layout .= '<span class="thumb">';
					$layout .= sprintf( '<a href="%s" title="%s" class="thumbnail">%s</a>', esc_url( get_permalink() ), get_the_title(), $image );
					$layout .= '</span>';
				}

				$layout .= '<span class="text">';
				$layout .= sprintf( '<a href="%1$s" title="%2$s">%2$s</a>', esc_url( get_permalink() ), get_the_title() );
				$layout .= '</span>';

				$layout .= ( $thumb ) ? '</div>' : '</li>';
			}

			$layout .= ( $thumb ) ? '</div>' : '</ul>';
			$layout .= '</div>';

			echo apply_filters('the_content', $layout);
		}
		wp_reset_postdata();
	}
}

/**
 * Get term meta fields
 *
 * Usage:
 * <?php echo firstling_get_term_meta( $term_id, $field );?>
 *
 * @since  2.2.7
 *
 * @param  int    $term_id      Term ID
 * @param  string $field        Field slug
 *
 * @return string               Field value
 */
function firstling_get_term_meta( $term_id, $field ) {
	// First try to get value in the new Term Meta WP API.
	if ( $value = get_term_meta( $term_id, $field, true ) ) {
		return $value;
	}

	// After, try to get in the old way (option API).
	$option_name = sprintf( 'firstling_term_meta_%s_%s', $term_id, $field );
	$value       = get_option( $option_name );

	// Upgrade to new update_term_meta().
	if ( false !== $value ) {
		update_term_meta( $term_id, $field, $value );
		delete_option( $option_name );
	}

	return $value;
}


/**
 * Custom excerpt for content or title.
 *
 * Usage:
 * Place: <?php echo firstling_excerpt( 'excerpt', value ); ?>
 *
 * @since  2.2.0
 *
 * @param  string $type  Sets excerpt or title.
 * @param  int    $limit Sets the length of excerpt.
 *
 * @return string       Return the excerpt.
 */
function firstling_excerpt( $type = 'excerpt', $limit = 40 ) {
	$limit = (int) $limit;

	// Set excerpt type.
	switch ( $type ) {
		case 'title':
			$excerpt = get_the_title();
			break;

		default :
			$excerpt = get_the_excerpt();
			break;
	}
	$excerpt = wp_trim_words( $excerpt, $limit );
	return wp_trim_words( $excerpt, $limit );
}

//pega o valor src da imagem 
function firstling_image_src($id, $size = 'thumbnail')
{
    $post_thumbnail_id = get_post_thumbnail_id( intval($id) );
    $image_attributes = wp_get_attachment_image_src( intval($post_thumbnail_id), $size );
    if ( $image_attributes ) :
        return esc_attr($image_attributes[0]);
    else :
        $img = get_template_directory_uri() . '/assets/images/locomotive-60539_1920.jpg';
        return esc_url($img);
    endif;
}

function firstling_get_excerpt($limit = 150, $type = 'excerpt')
{
    $excerpt = firstling_excerpt($type, $limit);

    if (strlen($excerpt) > $limit) {
		$excerpt = substr(trim($excerpt),0,$limit);
    }
    
    return $excerpt;
}

function firstling_wp_substr($string, $limit = 150)
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

function firstling_paging_nav()
{
	$mid = 2;
	// Total of items that will show along with the current page.
	$end = 1;
	// Total of items displayed for the last few pages.
	$show = false;
	// Show all items.
	$str = firstling_pagination($mid, $end, false);
	echo apply_filters('the_content', $str);
}

function firstling_carrossel_total()
{
	$total = get_theme_mod( 'firstling_carrossel' );
	return intval($total);
}

//adiciona a classe no body
function firstling_custom_body_class($classes) 
{
    $classe_tema = get_theme_mod( 'firstling_theme_color' );
    $sobrescrever_cores = get_theme_mod( 'firstling_overwrite_colors' );

    if(trim($classe_tema) !== "" && $classe_tema !== "default" && $sobrescrever_cores == "no")
    $classes[] = $classe_tema;
    
    if($sobrescrever_cores)
    $classes[] = 'custom-color';

    return $classes;
}
//Now add test class to the filter
add_filter('body_class','firstling_custom_body_class');


//adiciona a cor personalizada no header
function firstling_hook_css() 
{
    $sobrescrever_cores = get_theme_mod( 'firstling_overwrite_colors' );
	$cor_de_fundo = get_theme_mod( 'firstling_custom_background' );
	
	if($sobrescrever_cores == "yes" && trim($cor_de_fundo) !== ""):
?><style>
body.custom-color .navContainer { background-color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color #footer { border-bottom-color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .topBottom-leftRightCorner .ui-border-element::before, body.custom-color .topBottom-leftRightCorner .ui-border-element::after, body.custom-color .topBottom-leftRightCorner::before, body.custom-color .topBottom-leftRightCorner::after { border-color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .categories-list li a:hover { color: <?php echo esc_attr($cor_de_fundo); ?> !important; }
body.custom-color h2 a:hover, body.custom-color h3 a:hover, body.custom-color h4 a:hover, body.custom-color h5 a:hover, body.custom-color h6 a:hover { color: <?php echo esc_attr($cor_de_fundo); ?> !important; }
body.custom-color .entry-content h1, body.custom-color .entry-content h2, body.custom-color .entry-content h3, body.custom-color .entry-content h4, body.custom-color .entry-content h5, body.custom-color .entry-content h6 { color: <?php echo esc_attr($cor_de_fundo); ?> !important; }
body.custom-color .entry-content h1.su-post-title, body.custom-color .entry-content h2.su-post-title, body.custom-color .entry-content h3.su-post-title, body.custom-color .entry-content h4.su-post-title, body.custom-color .entry-content h5.su-post-title, body.custom-color .entry-content h6.su-post-title { color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .entry-content h1.su-post-title a, body.custom-color .entry-content h2.su-post-title a, body.custom-color .entry-content h3.su-post-title a, body.custom-color .entry-content h4.su-post-title a, body.custom-color .entry-content h5.su-post-title a, body.custom-color .entry-content h6.su-post-title a { color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .plyr--full-ui input[type="range"] { color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .plyr--audio .plyr__control.plyr__tab-focus, body.custom-color .plyr--audio .plyr__control:hover, body.custom-color .plyr--audio .plyr__control[aria-expanded="true"] { background: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .plyr--audio .plyr__control.plyr__tab-focus, body.custom-color .plyr--audio .plyr__control:hover, body.custom-color .plyr--audio .plyr__control[aria-expanded="true"] { background: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .author.vcard a { color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .comments-link a { color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .media-heading a { color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .comment-metadata a { color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color #comments .btn-comment { background: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .pagination-wrap .page-numbers li span { background: <?php echo esc_attr($cor_de_fundo); ?>; border: 1px solid <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color blockquote { border-color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color blockquote:before, body.custom-color blockquote:after { color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .author-description strong { color: <?php echo esc_attr($cor_de_fundo); ?>; }
body.custom-color .posted-on a, body.custom-color .logged-in-as a, body.custom-color .entry-content a, body.custom-color .comment-content a {
  color: <?php echo esc_attr($cor_de_fundo); ?> !important;
}
body.custom-color .plyr__control--overlaid {
	background: <?php echo esc_attr($cor_de_fundo); ?>;
}
.comment-edit-link, .url {
  color: <?php echo esc_attr($cor_de_fundo); ?> !important;
}
</style><?php
	endif;
}
add_action('wp_head', 'firstling_hook_css');