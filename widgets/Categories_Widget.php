<?php
/**
 *
 * @package Firstling
 * @since 1.0.2
 */
if ( ! defined('ABSPATH')) exit('restricted access');

class Categories_Widget extends WP_Widget 
{
    public function __construct() 
    {
        $widget_options = array( 
            'classname' => 'categories-box',
            'description' => __('With this Widget you put the categories in the sidebar.','firstling'),
        );        
        parent::__construct( 'categories-box', __('Categories', 'firstling'), $widget_options );
    }

    public function form( $instance ) 
    {
        $title = ! empty( $instance['categories_title'] ) ? $instance['categories_title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'categories_title' ); ?>"><?php echo __('Title','firstling'); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'categories_title' ); ?>" name="<?php echo $this->get_field_name( 'categories_title' ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat title" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) 
    { 
        $instance = $old_instance;
        $instance[ 'categories_title' ] = strip_tags( $new_instance[ 'categories_title' ] );

        return $instance;
    }

    public function widget( $args, $instance ) 
    {
        $title = apply_filters( 'widget_title', $instance[ 'categories_title' ] );

        $categories = get_categories(array(
            'hide_empty' => true,
            'orderby' => 'name',
            'order' => 'ASC',
        ));

        if ( count($categories) ) : 
    ?>
	<!-- categories -->
	<aside id="categories-sidebar" class="widget">
		<h3 class="widget-title"><?php echo esc_attr($title); ?></h3>
		<ul class="categories-list">
            <?php 
                foreach($categories as $cat): 
                    $link = esc_url(get_category_link( $cat->term_id )); 
            ?>
			    <li><a href="<?php echo $link; ?>" title="<?php echo esc_attr($cat->name); ?>"><?php echo esc_attr($cat->name); ?> <span>(<?php echo esc_attr($cat->count); ?>)</span></a></li>
            <?php endforeach; ?>
		</ul>
	</aside>
	<!--/ categories -->
    <?php 
        endif;
    }
}