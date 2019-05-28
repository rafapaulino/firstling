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
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <span><?php bloginfo( 'name' ); ?></span>
                    <strong class="navbar-text"><?php bloginfo( 'description' ); ?></strong>
                </a>
            </h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="bootstrap-4-navbar.html">Default</a></li>
                    <li class="nav-item"><a class="nav-link" href="bootstrap-4-navbar-static-top.html">Static top</a></li>
                    <li class="nav-item"><a class="nav-link" href="bootstrap-4-navbar-fixed-top.html">Fixed top</a></li>
                    <li class="nav-item"><a class="nav-link" href="bootstrap-4-navbar-fixed-bottom.html">Fixed bottom</a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">A sub menu</a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><a class="dropdown-item disabled" href="#">Disabled item</a></li>
                                <li><a class="dropdown-item" href="#">One more link</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="#">A separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<main>