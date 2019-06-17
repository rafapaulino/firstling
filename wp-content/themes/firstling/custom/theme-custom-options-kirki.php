<?php
/**
 * An example file demonstrating how to add all controls.
 * https://gist.github.com/aristath/d778d2592a4a6ce8f640
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

  

function firstling_customize_register( $wp_customize ) 
{    
    $wp_customize->add_section( 'firstling_configuracoes_principais', array(
        'title'       => __( 'Configurações Principais do Tema', 'kirki' ),
        'priority'    => 20,
    ) );
    
}
add_action( 'customize_register', 'firstling_customize_register');

function firstling_kirki_fields( $fields ) {


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
    
    $fields[] = array(
		'type'        => 'switch',
		'setting'     => 'sobrescrever_cores',
		'label'       => __( 'Sobrescrever as cores acima', 'kirki' ),
		'description' => __( 'Escolhendo essa opção você pode definir uma cor personalizada nos controles abaixo.', 'kirki' ),
		'help'        => __( 'Escolhendo essa opção você pode definir uma cor personalizada nos controles abaixo.', 'kirki' ),
		'section'     => 'firstling_configuracoes_principais',
		'default'     => 0,
		'priority'    => 10,
    );
    

    $fields[] = array(
		'type'        => 'color',
		'setting'     => 'cor_de_fundo',
		'label'       => __( 'Cor de fundo', 'kirki' ),
		'description' => __( 'Escolha a cor de fundo personalizada para o seu tema.', 'kirki' ),
		'help'        => __( 'A cor escolhida aqui será utilizada no tema.', 'kirki' ),
		'section'     => 'firstling_configuracoes_principais',
	);


    return $fields;

}
add_filter( 'kirki/fields', 'firstling_kirki_fields' );