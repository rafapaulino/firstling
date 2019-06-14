<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package     Kirki
 * @category    Core
 * @author      Ari Stathopoulos (@aristath)
 * @copyright   Copyright (c) 2019, Ari Stathopoulos (@aristath)
 * @license     https://opensource.org/licenses/MIT
 * @since       3.0.12
 */

/**
* Include Kirki as a library for this theme 
*/
if ( ! class_exists( 'Kirki' ) ) {
    include_once( dirname( __FILE__ ) . '/kirki/kirki.php' );
}

use Kirki\Core\Helper;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'kirki_demo',
	[
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	]
);

  

function starter_customize_register( $wp_customize ) 
{
    /*$wp_customize->add_section( 'starter_new_section_name' , array(
        'title'    => __( 'Visible Section Name', 'starter' ),
        'priority' => 30
    ) );*/
    /*$wp_customize->add_section( 'starter_new_section_name' , array(
        'title'    => __( 'Visible Section Name', 'starter' ),
        'priority' => 30
    ) );  */ 

    /*$wp_customize->add_setting( 'starter_new_setting_name' , array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'    => __( 'Header Color', 'starter' ),
        'section'  => 'starter_new_section_name',
        'settings' => 'starter_new_setting_name',
    ) ) );*/

/**
	 * Add panels
	 */
	$wp_customize->add_panel( 'starter_new_section_name', array(
		'priority'    => 10,
		'title'       => __( 'Backgrounds', 'kirki' ),
	) );

	/**
	 * Add sections
	 */
     $wp_customize->add_section( 'header_background', array(
 		'title'       => __( 'Header Background', 'kirki' ),
 		'priority'    => 10,
 		'panel'       => 'starter_new_section_name',
 	) );

     $wp_customize->add_section( 'main_background', array(
 		'title'       => __( 'Main Background', 'kirki' ),
 		'priority'    => 20,
 		'panel'       => 'starter_new_section_name',
 	) );

     $wp_customize->add_section( 'footer_background', array(
 		'title'       => __( 'Footer Background', 'kirki' ),
 		'priority'    => 30,
 		'panel'       => 'starter_new_section_name',
 	) );

    $wp_customize->add_section( 'typography', array(
 		'title'       => __( 'Typography -----', 'kirki' ),
 		'priority'    => 20,
     ) );
     
     $wp_customize->add_section( 'firstling_configuracoes_principais', array(
        'title'       => __( 'Configurações Principais do Tema', 'kirki' ),
        'priority'    => 20,
    ) );
    
}
add_action( 'customize_register', 'starter_customize_register');

function mytheme_kirki_fields( $fields ) {

    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'header_background',
        'label'       => __( 'Choose your header background', 'kirki' ),
        'description' => __( 'The header background you specify here will apply to the header area, including your menus and your branding.', 'kirki' ),
        'section'     => 'header_background',
        'default'     => array(
            'color'    => 'rgba(25,170,141,0.7)',
            'image'    => '',
            'repeat'   => 'no-repeat',
            'size'     => 'cover',
            'attach'   => 'fixed',
            'position' => 'left-top',
        ),
        'priority'    => 10,
        'output'      => '#header'
    );

    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'body_background',
        'label'       => __( 'Choose the background for the main area', 'kirki' ),
        'description' => __( 'The header background you specify here will apply to the main area of your site.', 'kirki' ),
        'section'     => 'main_background',
        'default'     => array(
            'color'    => 'rgba(255,255,255,1)',
            'image'    => '',
            'repeat'   => 'no-repeat',
            'size'     => 'cover',
            'attach'   => 'fixed',
            'position' => 'left-top',
        ),
        'priority'    => 10,
        'output'      => '#content'
    );

    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'footer_background',
        'label'       => __( 'Choose the background for your footer', 'kirki' ),
        'description' => __( 'If you choose to use an image then please use a blurry image so that it does not distract users from the widgets you have on your footer..', 'kirki' ),
        'section'     => 'footer_background',
        'default'     => array(
            'color'    => 'rgba(255,255,255,1)',
            'image'    => '',
            'attach'   => 'fixed',
        ),
        'priority'    => 10,
        'output'      => '#content'
    );

    $fields[] = array(
        'type'        => 'select',
        'setting'     => 'font_family',
        'label'       => __( 'Font-Family', 'kirki' ),
        'description' => __( 'Please choose a font for your site. This font-family will be applied to all elements on your page, including headers and body.', 'kirki' ),
        'section'     => 'typography',
        'default'     => 'Roboto',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_font_choices(),
        'output'      => array(
            array(
                'element'  => 'body, h1, h2, h3, h4, h5, h6',
                'property' => 'font-family',
            ),
        ),
        'transport'   => 'postMessage',
        'js_vars'     => array(
            array(
                'element'  => 'body, h1, h2, h3, h4, h5, h6',
                'function' => 'css',
                'property' => 'font-family',
            ),
        ),
    );

    $fields[] = array(
        'type'        => 'slider',
        'setting'     => 'font_size',
        'label'       => __( 'Font-Size', 'kirki' ),
        'description' => __( 'Please choose a font-size for your body.', 'kirki' ),
        'section'     => 'typography',
        'default'     => 1,
        'priority'    => 20,
        'choices'     => array(
            'min'  => .7,
            'max'  => 2,
            'step' => .01
        ),
        'output'        => array(
            array(
                'element'  => 'body',
                'property' => 'font-size',
                'units'    => 'em',
            ),
        ),
        'transport'   => 'postMessage',
        'js_vars'     => array(
            array(
                'element'  => 'body',
                'function' => 'css',
                'property' => 'font-size',
            ),
        ),
    );


//https://gist.github.com/aristath/d778d2592a4a6ce8f640
    $fields[] = array(
		'type'        => 'radio-image',
		'setting'     => 'radio_image_demo',
		'label'       => __( 'This is the label', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'kirki' ),
		'section'     => 'firstling_configuracoes_principais',
		'default'     => 'option-1',
		'priority'    => 10,
		'choices'     => array(
			'option-1' => admin_url() . '/images/align-left-2x.png',
			'option-2' => admin_url() . '/images/align-center-2x.png',
			'option-3' => admin_url() . '/images/align-right-2x.png',
		),
	);

    return $fields;

}
add_filter( 'kirki/fields', 'mytheme_kirki_fields' );