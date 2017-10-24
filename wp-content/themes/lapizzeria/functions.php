<?php
function lapizzeria_styles() {
    
    //Registrar estilos
    wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '7.0.0' );
    wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array('normalize'), '4.7.0' );
    wp_register_style( 'style', get_template_directory_uri() . '/style.css', array('normalize'), '1.0' );

    
    //Llamar estilos
    wp_enqueue_style( 'normalize' );
    wp_enqueue_style( 'fontawesome' );
    wp_enqueue_style( 'style' );

    //Registrar scripts
    wp_register_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
    
    //Llamar scripts
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'scripts' );
}

add_action( 'wp_enqueue_scripts', 'lapizzeria_styles' );

function lapizzeria_menus() {
    register_nav_menus( array( 
        'header-menu' => __('Header Menu', 'lapizzeria'),
        'social-menu' => __('Social Menu', 'lapizzeria'), 
    ) );
}

add_action( 'init', 'lapizzeria_menus' );
