<?php
/**
 *
 * @package Firstling
 * @since 1.0.2
 */
if ( ! defined('ABSPATH')) exit('restricted access');

class Tags_Widget extends WP_Widget 
{
    public function __construct() 
    {
        $widget_options = array( 
            'classname' => 'tags-box',
            'description' => __('With this Widget you put the tags in the sidebar.','firstling'),
        );        
        parent::__construct( 'tags-box', __('Tags','firstling'), $widget_options );
    }

    public function form( $instance ) 
    {
        $title = ! empty( $instance['tags_title'] ) ? $instance['tags_title'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'tags_title' )); ?>"><?php esc_attr_e('Title','firstling'); ?>:</label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id( 'tags_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tags_title' )); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat title" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) 
    { 
        $instance = $old_instance;
        $instance[ 'tags_title' ] = strip_tags( $new_instance[ 'tags_title' ] );

        return $instance;
    }

    public function widget( $args, $instance ) 
    {
        $title = apply_filters( 'widget_title', $instance[ 'tags_title' ] );
        $tags = get_tags();

        if ($tags):
    ?>
	<!-- tags -->
	<aside id="tags-sidebar" class="widget">
        <?php if (trim($title) !== "") : ?>
            <h3 class="widget-title"><?php echo esc_attr($title); ?></h3>
        <?php endif; ?>
		<div class="tagcloud tagcloud-label">
			<ul>
                <?php 
                    foreach($tags as $tag): 
                        $link = get_tag_link($tag->term_id);
                ?>
                    <li><a href="<?php echo esc_url($link); ?>"><span><?php echo esc_attr($tag->name); ?></span></a></li>
                <?php endforeach; ?>
			</ul>
		</div>
	</aside>
	<!--/ tags -->
    <?php 
        endif;
    }
}
