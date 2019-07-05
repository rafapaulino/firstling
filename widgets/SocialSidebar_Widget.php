<?php
/**
 *
 * @package Odin
 * @since 2.2.0
 */
if ( ! defined('ABSPATH')) exit('restricted access');

class SocialSidebar_Widget extends WP_Widget 
{
    private $icons;
    
    public function __construct() 
    {
        $this->icons = array(
            'facebook'  => array('icon' => 'fab fa-facebook',  'title' => 'Facebook'),
            'twitter'   => array('icon' => 'fab fa-twitter',   'title' => 'Twitter'),
            'youtube'   => array('icon' => 'fab fa-youtube',   'title' => 'YouTube'),
            'instagram' => array('icon' => 'fab fa-instagram', 'title' => 'Instagram'),
            'whatsapp'  => array('icon' => 'fab fa-whatsapp',  'title' => 'WhatsApp'),
            'pinterest' => array('icon' => 'fab fa-pinterest', 'title' => 'Pinterest'),
            'linkedin'  => array('icon' => 'fab fa-linkedin',  'title' => 'Linkedin'),
            'rss'       => array('icon' => 'fa fa-rss', 'title' => 'RSS')
        );
        
        $widget_options = array( 
            'classname' => 'social-sidebar-box',
            'description' => __('With this Widget you put the social network icons in the sidebar.','firstling'),
        );        
        parent::__construct( 'social-sidebar-box', __('Social Network','firstling'), $widget_options );
    }

    public function form( $instance ) 
    {
        $title = ! empty( $instance['social_sidebar_title'] ) ? $instance['social_sidebar_title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'social_sidebar_title' ); ?>"><?php echo __('Title','firstling'); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'social_sidebar_title' ); ?>" name="<?php echo $this->get_field_name( 'social_sidebar_title' ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat title" />
        </p><br><br>
        <?php
        $this->create_instance($instance);
    }

    public function update( $new_instance, $old_instance ) 
    { 
        $instance = $old_instance;
        $instance[ 'social_sidebar_title' ] = strip_tags( $new_instance[ 'social_sidebar_title' ] );

        $x = 1;
        $icon = 'social_sidebar_icon_';
        $link = 'social_sidebar_link_';

        foreach($this->icons as $key => $value)
        {
            $instance[$icon . $x] = strip_tags( $new_instance[$icon . $x] );
            $instance[$link . $x] = strip_tags( $new_instance[$link . $x] );
            $x++;
        }

        return $instance;
    }

    public function widget( $args, $instance ) 
    {
        $title = apply_filters( 'widget_title', $instance[ 'social_sidebar_title' ] );
    ?>
    <!-- social network -->
    <aside id="redes-sociais-sidebar" class="widget">
        <?php if (trim($title) !== "") : ?>
            <h3 class="widget-title"><?php esc_attr_e($title); ?></h3>
        <?php endif; ?>

		<ul class="redes-sociais-mini">
            <?php $this->create_html($instance); ?>
		</ul>
	</aside>
    <!--/ social network -->
    <?php 
    }

    private function create_instance($instance)
    {

        for ($x = 1; $x <= count($this->icons); $x++)
        {
            $icon = 'social_sidebar_icon_' . $x;
            $link = 'social_sidebar_link_' . $x;
            $icon_instance = ! empty( $instance[$icon] ) ? $instance[$icon] : '';
            $link_instance = ! empty( $instance[$link] ) ? $instance[$link] : '';
            ?>
            <p>
                <label for="<?php echo $this->get_field_id($link); ?>"><?php echo __('Link','firstling'); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id($link); ?>" name="<?php echo $this->get_field_name($link); ?>" value="<?php echo esc_attr($link_instance); ?>" class="widefat title" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id($icon); ?>"><?php echo __('Icon','firstling'); ?>:</label>
                
                <select name="<?php echo $this->get_field_name($icon); ?>" id="<?php echo $this->get_field_id($icon); ?>" class="widefat title">
                    <?php foreach($this->icons as $key => $value): ?>
                        <option value="<?php echo esc_attr($key); ?>" <?php echo (( $icon_instance == $key )?'selected="selected"':''); ?>><?php echo esc_attr($value['title']); ?></option>
                    <?php endforeach; ?>
                </select>
                <hr><br>
            </p>
            <?php
        }
    }

    private function create_html($instance)
    {
        $x = 1;
        $icon = 'social_sidebar_icon_';
        $link = 'social_sidebar_link_';

        foreach($this->icons as $key => $value)
        {
            $icon_html = esc_attr( $instance[$icon . $x] );
            $link_html = esc_url( $instance[$link . $x] );
            $icon_class = esc_attr( $this->icons[$icon_html]['icon'] );
            $title = esc_attr( $this->icons[$icon_html]['title'] );

            if (trim($link_html) !== ""):
            ?>
                <li><a class="<?php echo $icon_html; ?>" href="<?php echo $link_html; ?>" target="_blank" title="<?php esc_attr_e('Click here to access:'); ?> <?php echo $title; ?>"><i class="<?php echo $icon_class; ?>"></i></a></li>
            <?php 
            endif;
            $x++;
        }
    }
}
