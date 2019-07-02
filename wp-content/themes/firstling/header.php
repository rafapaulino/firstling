<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="fixed-top d-print-none" id="header">
    <?php 
        if ( is_active_sidebar( 'top-sidebar' ) ):
            dynamic_sidebar( 'top-sidebar' );
        endif;
    ?>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <h1>
                <?php 
                    if (has_custom_logo()): 
                        odin_the_custom_logo();
                    else: 
                ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <span><?php bloginfo( 'name' ); ?></span>
                    <strong class="navbar-text"><?php bloginfo( 'description' ); ?></strong>
                </a>
                <?php endif; ?>
            </h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <?php 
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'depth'          => 5,
                            'container'      => false,
                            'menu_class'     => 'nav navbar-nav ml-auto',
                            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                        )
                    );
                ?>
            </div>
        </nav>
    </div>
</header>
<main>