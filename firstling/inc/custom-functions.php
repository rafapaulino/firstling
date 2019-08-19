<?php 

if ( ! defined('ABSPATH')) exit('restricted access');

/**
 * Custom Footer.
 */
function firstling_admin_footer() {
	echo date( 'Y' ) . ' - ' . get_bloginfo( 'name' );
}

add_filter( 'admin_footer_text', 'firstling_admin_footer' );

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
			echo '<span class="featured-post">' . __( 'Sticky', 'firstling' ) . ' </span>';
		}

		// Set up and print post meta information.
		printf( '<span class="entry-date">%s <time class="entry-date" datetime="%s">%s</time></span> <span class="byline">%s <span class="author vcard"><a class="url fn n" href="%s" rel="author">%s</a></span>.</span>',
			__( 'Posted in', 'firstling' ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			__( 'by', 'firstling' ),
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

			echo $layout;
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
 * Breadcrumbs.
 *
 * @since  2.2.0
 *
 * @param  string $homepage  Homepage name.
 *
 * @return string            HTML of breadcrumbs.
 */
function firstling_breadcrumbs( $homepage = '' ) {
	global $wp_query, $post, $author;

	! empty( $homepage ) || $homepage = __( 'Home', 'firstling' );

	// Default html.
	$current_before = '<li class="active">';
	$current_after  = '</li>';

	if ( ! is_home() && ! is_front_page() || is_paged() ) {

		// First level.
		echo '<ol id="breadcrumbs" class="breadcrumb">';
		echo '<li><a href="' . home_url() . '" rel="nofollow">' . $homepage . '</a></li>';

		// Single post.
		if ( is_single() && ! is_attachment() ) {

			// Checks if is a custom post type.
			if ( 'post' != $post->post_type ) {
				// But if Woocommerce
				if ( 'product' === $post->post_type ) {
					if ( is_woocommerce_activated() ) {
						$shop_page    = get_post( wc_get_page_id( 'shop' ) );
						echo '<li><a href="' . esc_url( get_permalink( $shop_page ) ) . '">' . get_the_title( $shop_page ) . '</a></li>';
					}

					// Gets post type taxonomies.
					$taxonomies = get_object_taxonomies( 'product' );
					$taxonomy = 'product_cat';
				} else {
					$post_type = get_post_type_object( $post->post_type );

					echo '<li><a href="' . get_post_type_archive_link( $post_type->name ) . '">' . $post_type->label . '</a></li> ';

					// Gets post type taxonomies.
					$taxonomies = get_object_taxonomies( $post_type->name );
				}

				if ( $taxonomies ) {
					// If is woocommerce product post type, $taxonomy already defined
					if ( 'product' !== $post->post_type ) {
						$taxonomy = $taxonomies[0];
					}
					// Gets post terms.
					$terms = get_the_terms( $post->ID, $taxonomy );
					$term  = $terms ? array_shift( $terms ) : '';
					// Gets parent post terms.
					$parent_term = get_term( $term->parent, $taxonomy );

					if ( $term ) {
						if ( $term->parent ) {
							echo '<li><a href="' . get_term_link( $parent_term ) . '">' . $parent_term->name . '</a></li> ';
						}
						echo '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li> ';
					}
				}
			} else {
				$category = get_the_category();
				$category = $category[0];
				// Gets parent post terms.
				$parent_cat = get_term( $category->parent, 'category' );
				// Gets top term
				$cat_tree = get_category_parents($category, FALSE, ':');
				$top_cat = explode(':', $cat_tree);
				$top_cat = $top_cat[0];

				if ( $category->parent ) {
					if ( $parent_cat->parent ) {
						echo '<li><a href="' . get_term_link( $top_cat, 'category' ) . '">' . $top_cat . '</a></li>';
					}
					echo '<li><a href="' . get_term_link( $parent_cat ) . '">' . $parent_cat->name. '</a></li>';
				}

				echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
			}

			echo $current_before . get_the_title() . $current_after;

		// Single attachment.
		} elseif ( is_attachment() ) {
			$parent   = get_post( $post->post_parent );
			$category = get_the_category( $parent->ID );
			$category = $category[0];

			echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';

			echo '<li><a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a></li>';

			echo $current_before . get_the_title() . $current_after;

		// Page without parents.
		} elseif ( is_page() && ! $post->post_parent ) {
			echo $current_before . get_the_title() . $current_after;

		// Page with parents.
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id   = $post->post_parent;
			$breadcrumbs = array();

			while ( $parent_id ) {
				$page = get_page( $parent_id );

				$breadcrumbs[] = '<li><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . get_the_title( $page->ID ) . '</a></li>';
				$parent_id  = $page->post_parent;
			}

			$breadcrumbs = array_reverse( $breadcrumbs );

			foreach ( $breadcrumbs as $crumb ) {
				echo $crumb . ' ';
			}

			echo $current_before . get_the_title() . $current_after;

		// Category archive.
		} elseif ( is_category() ) {
			$category_object  = $wp_query->get_queried_object();
			$category_id      = $category_object->term_id;
			$current_category = get_category( $category_id );
			$parent_category  = get_category( $current_category->parent );

			// Displays parent category.
			if ( 0 != $current_category->parent ) {
				$parents = get_category_parents( $parent_category, TRUE, false );
				$parents = str_replace( '<a', '<li><a', $parents );
				$parents = str_replace( '</a>', '</a></li>', $parents );
				echo $parents;
			}

			printf( __( '%sCategory: %s%s', 'firstling' ), $current_before, single_cat_title( '', false ), $current_after );

		// Tags archive.
		} elseif ( is_tag() ) {
			printf( __( '%sTag: %s%s', 'firstling' ), $current_before, single_tag_title( '', false ), $current_after );

		// Custom post type archive.
		} elseif ( is_post_type_archive() ) {
			// Check if Woocommerce Shop
			if ( is_woocommerce_activated() && is_shop() ) {
				$shop_page_id = wc_get_page_id( 'shop' );
				echo $current_before . get_the_title( $shop_page_id ) . $current_after;

			} else {
				echo $current_before . post_type_archive_title( '', false ) . $current_after;
			}

		// Search page.
		} elseif ( is_search() ) {
			printf( __( '%sSearch result for: &quot;%s&quot;%s', 'firstling' ), $current_before, get_search_query(), $current_after );

		// Author archive.
		} elseif ( is_author() ) {
			$userdata = get_userdata( $author );

			echo $current_before . __( 'Posted by', 'firstling' ) . ' ' . $userdata->display_name . $current_after;

		// Archives per days.
		} elseif ( is_day() ) {
			echo '<li><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';

			echo '<li><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a></li>';

			echo $current_before . get_the_time( 'd' ) . $current_after;

		// Archives per month.
		} elseif ( is_month() ) {
			echo '<li><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';

			echo $current_before . get_the_time( 'F' ) . $current_after;

		// Archives per year.
		} elseif ( is_year() ) {
			echo $current_before . get_the_time( 'Y' ) . $current_after;

		// Archive fallback for custom taxonomies.
		} elseif ( is_archive() ) {
			$current_object = $wp_query->get_queried_object();
			$taxonomy       = get_taxonomy( $current_object->taxonomy );
			$term_name      = $current_object->name;

			// Displays the post type that the taxonomy belongs.
			if ( ! empty( $taxonomy->object_type ) ) {
				// Get correct Woocommerce Post Type crumb
				if ( is_woocommerce() ) {
					$shop_page    = get_post( wc_get_page_id( 'shop' ) );
					echo '<li><a href="' . esc_url( get_permalink( $shop_page ) ) . '">' . get_the_title( $shop_page ) . '</a></li>';
				} else {
					$_post_type = array_shift( $taxonomy->object_type );
					$post_type = get_post_type_object( $_post_type );
					echo '<li><a href="' . get_post_type_archive_link( $post_type->name ) . '">' . $post_type->label . '</a></li> ';
				}
			}

			// Displays parent term.
			if ( 0 != $current_object->parent ) {
				$parent_term = get_term( $current_object->parent, $current_object->taxonomy );

				echo '<li><a href="' . get_term_link( $parent_term ) . '">' . $parent_term->name . '</a></li>';
			}

			echo $current_before . $taxonomy->label . ': ' . $term_name . $current_after;

		// 404 page.
		} elseif ( is_404() ) {
			echo $current_before . __( '404 Error', 'firstling' ) . $current_after;
		}

		// Gets pagination.
		if ( get_query_var( 'paged' ) ) {
			echo ' (' . sprintf( __( 'Page %s', 'firstling' ), get_query_var( 'paged' ) ) . ')';
		}

		echo '</ol>';
	}
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

function firstling_carrossel_total()
{
	//$total = Kirki::get_option( 'carrossel' );
	//return intval($total);
	return 5;
}

function firstling_paging_nav()
{
	$mid = 2;
	// Total of items that will show along with the current page.
	$end = 1;
	// Total of items displayed for the last few pages.
	$show = false;
	// Show all items.
	echo firstling_pagination($mid, $end, false);
}