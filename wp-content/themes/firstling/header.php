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

<!-- header -->
<header class="fixed-top" id="header">
    
    <?php 
		if ( is_active_sidebar( 'top-sidebar' ) ):
			dynamic_sidebar( 'top-sidebar' );
		endif;
	?>
   
    <!-- logo/busca/menu -->
    <div class="headerContainer d-print-none">
        <div class="container">
            <div class="row">
                <div class="col-3 col-sm-4">
                    
                    <div id="menu">
                        <i class="fas fa-bars"></i>
                        <span class="d-none d-md-block">Menu</span>
                    </div>

                    <div id="close-menu">
                        <i class="fas fa-times"></i>
                        <span class="d-none d-md-block">Fechar</span>
                    </div>

                </div>

                <div class="col-6 col-sm-4 text-center" id="branding">
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
                        <input type="search" name="s" id="search-header" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Digite sua busca e tecle enter...', 'odin' ); ?>" required="required" />
                    </form>
                    <i class="fas fa-times" id="close-search"></i>
                </div>
                <!-- /search -->
            </div>
        </div>
    </div>
    <!-- /logo/busca/menu -->

</header>
<!--/ header -->

<!-- navigation -->
<nav id="primary-menu" class="d-print-none">
    <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'depth'          => 2,
                'container'      => false,
                'menu_class'     => 'mainmenu',
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>'
            )
        );
    ?>
</nav>
<!-- /navigation -->

<main>