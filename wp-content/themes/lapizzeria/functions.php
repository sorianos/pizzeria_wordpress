<?php

//Tablas personalizadas y otras funciones
require get_template_directory() . '/inc/database.php';
//Funciones para  las reservaciones
require get_template_directory() . '/inc/reservaciones.php';
//Funciones para  las opciones
require get_template_directory() . '/inc/opciones.php';

function lapizzeria_setup() {
  	add_theme_support( 'post-thumbnails' );
	add_image_size( 'nosotros', 437, 291, true );
	add_image_size( 'especialidades', 768, 515, true );
	update_option( 'thumbnail_size_w', 253 );
	update_option( 'thumbnail_size_h', 164 );
}


add_action( 'after_setup_theme', 'lapizzeria_setup' );

function lapizzeria_styles() {

    //Registrar estilos
    wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '7.0.0' );
    wp_register_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900', array(), '1.0.0' );
	wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array('normalize'), '4.7.0' );
	wp_register_style( 'fluidboxcss', get_template_directory_uri() . '/css/fluidbox.min.css', array('normalize'), '1.0.0' );
    wp_register_style( 'style', get_template_directory_uri() . '/style.css', array('normalize'), '1.0' );

    //Llamar estilos
    wp_enqueue_style( 'normalize' );
    wp_enqueue_style( 'google_fonts' );
	wp_enqueue_style( 'fontawesome' );
	wp_enqueue_style( 'fluidboxcss' );
    wp_enqueue_style( 'style' );

    //Registrar scripts
	wp_register_script( 'fluidboxjs', get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array(), '1.0.0', true );
	wp_register_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );

    //Llamar scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'fluidboxjs' );
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

//Creación de custom post type
add_action( 'init', 'lapizzeria_especialidades' );

function lapizzeria_especialidades() {
	$labels = array(
		'name'               => _x( 'Pizzas', 'lapizzeria' ),
		'singular_name'      => _x( 'Pizzas', 'post type singular name', 'lapizzeria' ),
		'menu_name'          => _x( 'Pizzas', 'admin menu', 'lapizzeria' ),
		'name_admin_bar'     => _x( 'Pizzas', 'add new on admin bar', 'lapizzeria' ),
		'add_new'            => _x( 'Add New', 'book', 'lapizzeria' ),
		'add_new_item'       => __( 'Add New Pizza', 'lapizzeria' ),
		'new_item'           => __( 'New Pizzas', 'lapizzeria' ),
		'edit_item'          => __( 'Edit Pizzas', 'lapizzeria' ),
		'view_item'          => __( 'View Pizzas', 'lapizzeria' ),
		'all_items'          => __( 'All Pizzas', 'lapizzeria' ),
		'search_items'       => __( 'Search Pizzas', 'lapizzeria' ),
		'parent_item_colon'  => __( 'Parent Pizzas:', 'lapizzeria' ),
		'not_found'          => __( 'No Pizzases found.', 'lapizzeria' ),
		'not_found_in_trash' => __( 'No Pizzases found in Trash.', 'lapizzeria' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'lapizzeria' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'especialidades' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'especialidades', $args );
}

//widgets
function lapizzeria_widgets() {
	register_sidebar( array (
		'name' =>  'Blog Sidebard',
		'id' => 'blog_sidebard',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );
}

add_action( 'widgets_init', 'lapizzeria_widgets' );