<?php
/**
 *
 * @package Odin
 * @since 2.2.0
 */
if ( ! defined('ABSPATH')) exit('restricted access');


require_once('PopularNews_Widget.php');
require_once('Categories_Widget.php');
require_once('Form_Widget.php');
require_once('SocialSidebar_Widget.php');
require_once('TopSocialSidebar_Widget.php');
require_once('Tags_Widget.php');

function remove_widgets()
{
    unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
}

function firstling_load_widget() 
{
	remove_widgets();
	
    //entidades do topo
    register_sidebar(
        array(
            'name' => __( 'Top', 'firstling'),
            'id' => 'top-sidebar',
            'description' => __( 'Sidebar with top items.', 'firstling'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        )
    );

    register_widget( 'PopularNews_Widget' );
	register_widget( 'Categories_Widget' );
	register_widget( 'Form_Widget' );
	register_widget( 'SocialSidebar_Widget' );
	register_widget( 'TopSocialSidebar_Widget' );
	register_widget( 'Tags_Widget' );
}
add_action( 'widgets_init', 'firstling_load_widget' );