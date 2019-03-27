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
	<header id="header" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<div id="branding">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
						<strong class="site-description"><?php bloginfo( 'description' ); ?></strong>
					</div>

					<nav role="navigation">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#" aria-haspopup="true">Menu Dropdown <i class="fas fa-caret-down"></i></a>
								<ul class="dropdown" aria-label="submenu">
									<li><a href="#">Sub-1</a></li>
									<li><a href="#">Sub-2</a></li>
									<li><a href="#">Sub-3</a></li>
								</ul>
							</li>
							<li><a href="#">Quem Somos</a></li>
							<li><a href="#">Sobre</a></li>
							<li><a href="#">Política de Privacidade</a></li>
							<li><a href="#">Contato</a></li>
						</ul>
					</nav>

				</div>
			</div>
		</div>
	</header>

	<div id="wrapper" class="container">
		<div class="row">
