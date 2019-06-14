<?php 
/*
 * Opções customizadas para o tema:
 * https://code.tutsplus.com/tutorials/settings-and-controls-for-a-color-scheme-in-the-theme-customizer--cms-21350
 * https://premium.wpmudev.org/blog/wordpress-theme-customization-api/
 * 
 * 
*/

function firstling_customize_register( $wp_customize ) {
 
    /*******************************************
        Color scheme
    ********************************************/
    
    // add the section to contain the settings
    $wp_customize->add_section( 'textcolors' , array(
        'title' =>  'Color Scheme',
    ) );

    // main color ( site title, h1, h2, h4. h6, widget headings, nav links, footer headings )
    $txtcolors[] = array(
        'slug'=>'color_scheme_1', 
        'default' => '#000',
        'label' => 'Main Color'
    );
    
    // secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
    $txtcolors[] = array(
        'slug'=>'color_scheme_2', 
        'default' => '#666',
        'label' => 'Secondary Color'
    );
    
    // link color
    $txtcolors[] = array(
        'slug'=>'link_color', 
        'default' => '#008AB7',
        'label' => 'Link Color'
    );
    
    // link color ( hover, active )
    $txtcolors[] = array(
        'slug'=>'hover_link_color', 
        'default' => '#9e4059',
        'label' => 'Link Color (on hover)'
    );

    // add the settings and controls for each color
    foreach( $txtcolors as $txtcolor ) {
    
        // SETTINGS
        $wp_customize->add_setting(
            $txtcolor['slug'], array(
                'default' => $txtcolor['default'],
                'type' => 'option', 
                'capability' =>  'edit_theme_options'
            )
        );
        
    }

    // CONTROLS
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            $txtcolor['slug'], 
            array('label' => $txtcolor['label'], 
            'section' => 'textcolors',
            'settings' => $txtcolor['slug'])
        )
    );

    // add the settings and controls for each color
    foreach( $txtcolors as $txtcolor ) {
    
        // SETTINGS
        $wp_customize->add_setting(
            $txtcolor['slug'], array(
                'default' => $txtcolor['default'],
                'type' => 'option', 
                'capability' => 
                'edit_theme_options'
            )
        );
        // CONTROLS
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $txtcolor['slug'], 
                array('label' => $txtcolor['label'], 
                'section' => 'textcolors',
                'settings' => $txtcolor['slug'])
            )
        );
    }


    /**************************************
    Solid background colors
    ***************************************/
    // add the section to contain the settings
    $wp_customize->add_section( 'background' , array(
        'title' =>  'Cores do Tema',
    ) );
    
    
    // adiciona a opção de cor customizada para o tema
    $wp_customize->add_setting( 'theme-color-style' );
    
    // adiciona o controle para a cor customizada
    $wp_customize->add_control( 'theme-color-style', array(
        'label'      => 'Add a solid background to the header?',
        'section'    => 'background',
        'settings'   => 'theme-color-style',
        'type'       => 'radio',
        'choices'    => array(
            'header-background-off'   => 'no',
            'header-background-on'  => 'yes',
    ) ) );
    
    
    // add the setting for the footer background
    $wp_customize->add_setting( 'footer-background' );
    
    // add the control for the footer background
    $wp_customize->add_control( 'footer-background', array(
        'label'      => 'Add a solid background to the footer?',
        'section'    => 'background',
        'settings'   => 'footer-background',
        'type'       => 'radio',
        'choices'    => array(
            'footer-background-off'   => 'no',
            'footer-background-on'  => 'yes',
            ) 
        ) 
    );


}
add_action( 'customize_register', 'firstling_customize_register' );
