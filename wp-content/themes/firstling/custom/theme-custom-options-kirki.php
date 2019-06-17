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

    $img_dir = get_template_directory_uri() . '/assets/images/';

    //https://gist.github.com/aristath/d778d2592a4a6ce8f640
    $fields[] = array(
		'type'        => 'radio-image',
		'setting'     => 'classe_tema',
		'label'       => __( 'Esquema de Cores', 'kirki' ),
		'description' => __( 'Escolha qual esquema de cores você deseja para o seu tema.', 'kirki' ),
		'help'        => __( 'Escolha qual esquema de cores você deseja para o seu tema.', 'kirki' ),
		'section'     => 'firstling_configuracoes_principais',
		'default'     => 'default',
		'priority'    => 10,
		'choices'     => array(
			'default' => $img_dir . 'default.png',
			'green'   => $img_dir . 'green.png',
            'pink'    => $img_dir . 'pink.png',
            'purple'  => $img_dir . 'purple.png',
            'red'     => $img_dir . 'red.png',
            'warning' => $img_dir . 'warning.png',
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


//adiciona a classe no body
function firstling_custom_body_class($classes) 
{
    $classe_tema = Kirki::get_option( 'classe_tema' );
    $sobrescrever_cores = Kirki::get_option( 'sobrescrever_cores' );

    if(trim($classe_tema) !== "" && $classe_tema !== "default" && $sobrescrever_cores === false)
    $classes[] = $classe_tema;
    
    if($sobrescrever_cores)
    $classes[] = 'custom-color';

    return $classes;
}
//Now add test class to the filter
add_filter('body_class','firstling_custom_body_class');

//adiciona a cor personalizada no header
function firstling_hook_css() 
{
    $sobrescrever_cores = Kirki::get_option( 'sobrescrever_cores' );
    $cor_de_fundo = Kirki::get_option( 'cor_de_fundo' );
?><style>
body.custom-color .navContainer{background-color:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color #footer{border-bottom-color:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color .topBottom-leftRightCorner .ui-border-element::before,body.custom-color .topBottom-leftRightCorner .ui-border-element::after,body.custom-color .topBottom-leftRightCorner::before,body.custom-color .topBottom-leftRightCorner::after{border-color:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color .categories-list li a:hover{color:<?php esc_attr_e($cor_de_fundo); ?> !important}body.custom-color h2 a:hover,body.custom-color h3 a:hover,body.custom-color h4 a:hover,body.custom-color h5 a:hover,body.custom-color h6 a:hover{color:<?php esc_attr_e($cor_de_fundo); ?> !important}body.custom-color .entry-content h1,body.custom-color .entry-content h2,body.custom-color .entry-content h3,body.custom-color .entry-content h4,body.custom-color .entry-content h5,body.custom-color .entry-content h6{color:<?php esc_attr_e($cor_de_fundo); ?> !important}body.custom-color .plyr--full-ui input[type="range"]{color:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color .plyr--audio .plyr__control.plyr__tab-focus,body.custom-color .plyr--audio .plyr__control:hover,body.custom-color .plyr--audio .plyr__control[aria-expanded="true"]{background:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color .plyr--audio .plyr__control.plyr__tab-focus,body.custom-color .plyr--audio .plyr__control:hover,body.custom-color .plyr--audio .plyr__control[aria-expanded="true"]{background:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color .author.vcard a{color:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color .comments-link a{color:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color .media-heading a{color:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color .comment-metadata a{color:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color #comments .btn-comment{background:<?php esc_attr_e($cor_de_fundo); ?>}body.custom-color .pagination-wrap .page-numbers li span{background:<?php esc_attr_e($cor_de_fundo); ?>;border:1px solid <?php esc_attr_e($cor_de_fundo); ?>}
</style><?php
}
add_action('wp_head', 'firstling_hook_css');
