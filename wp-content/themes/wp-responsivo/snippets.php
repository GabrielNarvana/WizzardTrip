<?php

/*******************************
*  THEME SUPORT
********************************/
function add_suport_theme(){
	add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme','add_suport_theme');

/*******************************
* REGISTRO MENU PESONALIZADO
********************************/
add_theme_support('menus');

/*******************************
* SCRIPTS / CSS
********************************/
function wp_responsivo_scripts() {
//CARREGANDO CSS HEADER
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
wp_enqueue_style( 'style', get_stylesheet_uri() );

//CARREGANDO SCRIPTS HEADER
wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery') );

 //CARREGANDO NO FOOTER
//wp_enqueue_script('functions-js', get_template_directory_url().'assets/js/functions.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'wp_responsivo_scripts' );