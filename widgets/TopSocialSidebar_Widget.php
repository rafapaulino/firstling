<?php
/**
 *
 * @package Odin
 * @since 2.2.0
 */
if ( ! defined('ABSPATH')) exit('restricted access');

class TopSocialSidebar_Widget extends WP_Widget 
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
            'classname' => 'top-social-box',
            'description' => __('With this Widget you put the social network icons in the top.','firstling'),
        );        
        parent::__construct( 'top-social-box', __('Social Network and Links','firstling'), $widget_options );
    }

    public function form( $instance ) 
    {
        $this->create_instance($instance);
    }

    public function update( $new_instance, $old_instance ) 
    { 
        $instance = $old_instance;

        $instance[ 'top_social_link_1' ] = strip_tags( $new_instance[ 'top_social_link_1' ] );
        $instance[ 'top_social_link_2' ] = strip_tags( $new_instance[ 'top_social_link_2' ] );
        $instance[ 'top_social_link_3' ] = strip_tags( $new_instance[ 'top_social_link_3' ] );
        $instance[ 'top_social_link_title_1' ] = strip_tags( $new_instance[ 'top_social_link_title_1' ] );
        $instance[ 'top_social_link_title_2' ] = strip_tags( $new_instance[ 'top_social_link_title_2' ] );
        $instance[ 'top_social_link_title_3' ] = strip_tags( $new_instance[ 'top_social_link_title_3' ] );

        $x = 1;
        $icon = 'top_social_sidebar_icon_';
        $link = 'top_social_sidebar_link_';

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
    ?>
    <!-- social top -->
    <div class="navContainer d-print-none">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="socialNav">
                        <?php $this->create_html($instance); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /social top -->
    <?php 
    }

    private function create_instance($instance)
    {

        for ($a = 1; $a < 4; $a++) 
        {
            $link_href = 'top_social_link_' . $a;
            $link = ! empty( $instance[$link_href] ) ? $instance[$link_href] : '';
            $link_title = 'top_social_link_title_' . $a;
            $title = ! empty( $instance[$link_title] ) ? $instance[$link_title] : '';

            ?>
            <p>
                <label for="<?php echo $this->get_field_id($link_href); ?>"><?php echo __('Link','firstling'); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id($link_href); ?>" name="<?php echo $this->get_field_name($link_href); ?>" value="<?php echo esc_attr( $link ); ?>" class="widefat title" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id($link_title); ?>"><?php echo __('Title','firstling'); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id($link_title); ?>" name="<?php echo $this->get_field_name($link_title); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat title" />
            </p><hr>
            <?php

        }
        ?><br><br>
        <?php 

        for ($x = 1; $x <= count($this->icons); $x++)
        {
            $icon = 'top_social_sidebar_icon_' . $x;
            $link = 'top_social_sidebar_link_' . $x;
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
        for ($y = 1; $y < 4; $y++) 
        {
            $href = esc_url( $instance['top_social_link_' . $y] );
            $title = esc_attr( $instance['top_social_link_title_' . $y] );

            if (trim($title) !== "" && trim($href) !== ""):
        ?>
            <li class="socialBrand">
                <a href="<?php echo $href; ?>" title="<?php echo $title; ?>" target="_blank">
                    <?php echo $title; ?>
                </a>
            </li>
        <?php 
            endif;
        }        
        
        $x = 1;
        $icon = 'top_social_sidebar_icon_';
        $link = 'top_social_sidebar_link_';

        foreach($this->icons as $key => $value)
        {
            $icon_html = esc_attr( $instance[$icon . $x] );
            $link_html = esc_url( $instance[$link . $x] );
            $icon_class = esc_attr( $this->icons[$icon_html]['icon'] );
            $title = esc_attr( $this->icons[$icon_html]['title'] );

            if (trim($link_html) !== ""):
            ?>
                <li class="social <?php echo $icon_html; ?> bgAnimated">
                    <a href="<?php echo $link_html; ?>" accesskey="<?php echo intval($x); ?>" title="<?php esc_attr_e('Click here to access:','firstling'); ?> <?php echo $title; ?>">
                        <i class="<?php echo $icon_class; ?>" aria-hidden="true">
                            <span class="sr-only"><?php esc_attr_e('Click here to access:','firstling'); ?> <?php echo $title; ?></span>
                        </i>
                    </a>
                </li>               
            <?php 
            endif;
            $x++;
        }
    }
}
