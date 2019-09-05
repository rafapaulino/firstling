<?php
/**
 * firstling Theme Customizer
 *
 * @package firstling
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function firstling_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'firstling_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'firstling_customize_partial_blogdescription',
		) );
	}


	$wp_customize->add_section( 'firstling_theme_settings', array(
        'title'       => __( 'Main Theme Settings', 'firstling' ),
		'priority'    => 20,
		'sanitize_callback'  => 'esc_attr',
    ) );

	//cor padrão do tema
	$wp_customize->add_setting("firstling_theme_color", array(
		"default" => "default",
		"transport" => "refresh",
		'sanitize_callback'  => 'esc_attr',
	));


	$wp_customize->add_control( 'firstling_theme_color', array(
		'type' => 'select',
		'setting'     => 'firstling_theme_color',
		'label'       => __( 'Color scheme', 'firstling' ),
		'description' => __( 'Choose which color scheme you want for your theme.', 'firstling' ),
		'help'        => __( 'Choose which color scheme you want for your theme.', 'firstling' ),
		'choices' => array( // Optional.
	         'default' => __( 'Default - Blue', 'firstling' ),
	         'green' => __( 'Green', 'firstling' ),
	         'pink' => __( 'Pink', 'firstling' ),
	         'purple' => __( 'Purple', 'firstling' ),
	         'red' => __( 'Red', 'firstling' ),
	         'warning' => __( 'Yellow', 'firstling' ),
      	),
		'priority'    => 10,
		'section'    => 'firstling_theme_settings',
		'sanitize_callback'  => 'esc_attr',
	) );


	//sobrescrever as cores padrão do tema
	$wp_customize->add_setting("firstling_overwrite_colors", array(
		"default" => "no",
		"transport" => "refresh",
		'sanitize_callback'  => 'esc_attr',
	));

	$wp_customize->add_control( 'firstling_overwrite_colors', array(
		'type' => 'select',
		'setting'     => 'firstling_overwrite_colors',
		'label'       => __( 'Overwrite the above colors', 'firstling' ),
		'description' => __( 'By choosing this option you can set a custom color in the controls below.', 'firstling' ),
		'help'        => __( 'By choosing this option you can set a custom color in the controls below.', 'firstling' ),
		'choices' => array( // Optional.
	         'no' => __( 'No', 'firstling' ),
	         'yes' => __( 'Yes', 'firstling' )
      	),
		'priority'    => 10,
		'section'    => 'firstling_theme_settings',
	) );


	//cor de fundo personalizada
	$wp_customize->add_setting("firstling_custom_background", array(
		"default" => "",
		"transport" => "refresh",
		'sanitize_callback'  => 'esc_attr',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'firstling_custom_background', array(
		'label'       => __( 'Background color', 'firstling' ),
		'description' => __( 'Choose the custom background color for your theme.', 'firstling' ),
		'help'        => __( 'The color chosen here will be used in the theme.', 'firstling' ),
		'section'    => 'firstling_theme_settings',
		'settings'   => 'firstling_custom_background',
	) ) );

	//quantidade de itens no carrossel da home
	$wp_customize->add_setting("firstling_carrossel", array(
		"default" => 5,
		"transport" => "refresh",
		'sanitize_callback'  => 'esc_attr',
	));

	$wp_customize->add_control( 'firstling_carrossel', array(
		'type'        => 'number',
		'setting'     => 'firstling_carrossel',
		'label'       => __( 'Carousel Items', 'firstling' ),
		'description' => __( 'Choose the amount of items that appear on the home carousel.', 'firstling' ),
		'help'        => __( 'Choose the amount of items that appear on the home carousel.', 'firstling' ),
		'section'    => 'firstling_theme_settings',
		'default'     => '5',
		'priority'    => 10
	) );

}
add_action( 'customize_register', 'firstling_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function firstling_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function firstling_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function firstling_customize_preview_js() {
	wp_enqueue_script( 'firstling-customizer', get_template_directory_uri() . '/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'firstling_customize_preview_js' );
