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
   
    <!-- logo/busca -->
    <div class="headerContainer d-print-none">
        <div class="container">
            <div class="row">
                <div class="offset-3 offset-sm-4 col-6 col-sm-4 text-center" id="branding">
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
    <!-- /logo/busca -->

    <!-- menu -->
    <div class="container d-print-none">
        <div class="row">
            <!-- navigation -->
            <nav id="primary-menu" class="navbar navbar-expand-lg navbar-dark bg-dark">
                
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <?php /*
                        wp_nav_menu(
                            array(
                                'theme_location' => 'main-menu',
                                'depth'          => 2,
                                'container'      => false,
                                'menu_class'     => 'mainmenu nav navbar-nav mr-auto',
                                'items_wrap'     => '<ul class="%2$s">%3$s</ul>'
                            )
                        ); 
                        
                        https://getbootstrap.com/docs/4.3/components/navbar/

                        menu igual este: https://colorlib.com/sparkling/
                        colocar o efeito da busca igual este:
                        https://colorlib.com/wp/themes/newspaper-x/

                        deixar os icones das redes sociais menores:
                        https://colorlib.com/blaskan/
                        
                        */
                    ?>

                    <!-- Left nav -->
                    <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item disabled" href="#">Disabled link</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">One more separated link</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">A long sub menu</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><a class="dropdown-item" href="#">One more link</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 1</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 2</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 3</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 4</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 5</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 6</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 7</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 8</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 9</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 10</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 11</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 12</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 13</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 14</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 15</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 16</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 17</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 18</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 19</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 20</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 21</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 22</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 23</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 24</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 25</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 26</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 27</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 28</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 29</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 30</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 31</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 32</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 33</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 34</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 35</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 36</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 37</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 38</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 39</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 40</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 41</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 42</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 43</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 44</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 45</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 46</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 47</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 48</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 49</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 50</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 51</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 52</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 53</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 54</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 55</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 56</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 57</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 58</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 59</a></li>
                                <li><a class="dropdown-item" href="#">Menu item 60</a></li>
                            </ul>
                            </li>
                            <li><a class="dropdown-item" href="#">Another link</a></li>
                            <li><a class="dropdown-item" href="#">One more link</a></li>
                        </ul>
                        </li>
                    </ul>
                    </li>
                    </ul>



                </div>
            </nav>
            <!-- /navigation -->
        </div>
    </div>
    <!-- /menu -->
</header>
<!--/ header -->


<main>