<?php
/**
 *
 * @package Odin
 * @since 2.2.0
 */
if ( ! defined('ABSPATH')) exit('restricted access');

class Form_Widget extends WP_Widget 
{
    public function __construct() 
    {
        $widget_options = array( 
            'classname' => 'search-box',
            'description' => __('With this Widget you put the search form in the sidebar.','firstling'),
        );        
        parent::__construct( 'search-box', __('Search Form','firstling'), $widget_options );
    }

    public function form( $instance ) 
    {
        $title = ! empty( $instance['search_form_title'] ) ? $instance['search_form_title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'search_form_title' ); ?>"><?php echo __('Title','firstling'); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'search_form_title' ); ?>" name="<?php echo $this->get_field_name( 'search_form_title' ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat title" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) 
    { 
        $instance = $old_instance;
        $instance[ 'search_form_title' ] = strip_tags( $new_instance[ 'search_form_title' ] );

        return $instance;
    }

    public function widget( $args, $instance ) 
    {
        $title = apply_filters( 'widget_title', $instance[ 'search_form_title' ] );
    ?>
    <!-- form -->
    <aside id="form-sidebar" class="widget">
        <?php if (trim($title) !== "") : ?>
            <h3 class="widget-title"><?php esc_attr_e($title); ?></h3>
        <?php endif; ?>
		<?php get_search_form(); ?>
	</aside>
    <!--/ form -->
    <?php 
    }
}
