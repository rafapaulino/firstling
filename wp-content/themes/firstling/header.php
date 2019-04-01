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
<!-- navigation -->
<nav id="primary-menu">
    <ul class="mainmenu">
        <li><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Products</a>
            <ul class="submenu">
                <li><a href="">Tops</a></li>
                <li><a href="">Bottoms</a></li>
                <li><a href="">Footwear</a></li>
            </ul>
        </li>
        <li><a href="">Contact us</a></li>
    </ul>
</nav>
<!-- /navigation -->

<main id="main">
    <header class="fixed-top" id="header">
        
        <!-- redes sociais -->
        <div class="navContainer d-print-none">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="socialNav">
                            <li class="socialBrand">
                                <a href="index.html" accesskey="3" title="SITE" target="_blank">
                                    SITE
                                </a>
                            </li>
                            <li class="socialBrand">
                                <a href="index.html" accesskey="2" title="SITE" target="_blank">
                                    SITE
                                </a>
                            </li> 
                            <li class="socialBrand">
                                <a href="index.html" accesskey="2" title="SITE" target="_blank">
                                    SITE
                                </a>
                            </li>                          
                            <li class="social facebook bgAnimated">
                                <a href="index.html" accesskey="f" title="Facebook">
                                    <i class="fab fa-facebook" aria-hidden="true">
                                        <span class="sr-only">Clique aqui para acessar o Facebook</span>
                                    </i>
                                </a>
                            </li>
                            <li class="social youtube bgAnimated">
                                <a href="index.html" accesskey="y" title="YouTube">
                                    <i class="fab fa-youtube" aria-hidden="true">
                                        <span class="sr-only">Clique aqui para acessar o YouTube</span>
                                    </i>
                                </a>
                            </li>
                            <li class="social twitter bgAnimated">
                                <a href="index.html" accesskey="t" title="Twitter">
                                    <i class="fab fa-twitter" aria-hidden="true">
                                        <span class="sr-only">Clique aqui para acessar o Twitter</span>
                                    </i>
                                </a>
                            </li>
                            <li class="social linkedin bgAnimated">
                                <a href="index.html" accesskey="l" title="Linkedin">
                                    <i class="fab fa-linkedin" aria-hidden="true">
                                        <span class="sr-only">Clique aqui para acessar o Linkedin</span>
                                    </i>
                                </a>
                            </li>
                            <li class="social slideshare bgAnimated">
                                <a href="index.html" accesskey="s" title="Slideshare">
                                    <i class="fab fa-slideshare" aria-hidden="true">
                                        <span class="sr-only">Clique aqui para acessar o Slideshare</span>
                                    </i>
                                </a>
                            </li>
                            <li class="social flickr bgAnimated">
                                <a href="index.html" accesskey="k" title="Flickr">
                                    <i class="fab fa-flickr" aria-hidden="true">
                                        <span class="sr-only">Clique aqui para acessar o Flickr</span>
                                    </i>
                                </a>
                            </li>
                            <li class="social instagram bgAnimated">
                                <a href="index.html" accesskey="i" title="Instagram">
                                    <i class="fab fa-instagram" aria-hidden="true">
                                        <span class="sr-only">Clique aqui para acessar o Instagram</span>
                                    </i>
                                </a>
                            </li>
                            <li class="social rss bgAnimated">
                                <a href="index.html" accesskey="r" title="RSS">
                                    <i class="fa fa-rss" aria-hidden="true">
                                        <span class="sr-only">Clique aqui para acessar o RSS</span>
                                    </i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /barra redes sociais -->
        
        <!-- logo/busca/menu -->
        <div class="headerContainer d-print-none">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div id="menu">
                            <i class="fas fa-bars"></i>
                            <span>Menu</span>
                        </div>
                        <div id="close-menu">
                            <i class="fas fa-times"></i>
                            <span>Fechar</span>
                        </div>
                    </div>

                    <div class="col-sm-4 text-center" id="branding">
                        <h1>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
                        <strong><?php bloginfo( 'description' ); ?></strong>
                    </div>

                    <!-- search -->
                    <div class="col-sm-12" id="search-content">
                        <i class="fas fa-search" id="open-search"></i>
                        <form method="get" id="search" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                            <input type="search" name="s" id="search-header" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Digite sua busca e tecle enter...', 'odin' ); ?>" />
                        </form>
                        <i class="fas fa-times" id="close-search"></i>
                    </div>
                    <!-- /search -->
                </div>
            </div>
        </div>
        <!-- /logo/busca/menu -->
    </header>

	<div id="wrapper" class="container">
		<div class="row">
