<?php

function this_menus() {
	register_nav_menus(array(
		'menu-principal' => __('Menu Principal', 'this')
	));
}
add_action('init', 'this_menus');

function this_scripts_styles() {
	global $wp_query;

	// styles
	wp_enqueue_style('reset', get_template_directory_uri() . '/css/reset.css', array(), '0.0.6');
	wp_enqueue_style('dashicons');
	wp_enqueue_style('style', get_stylesheet_uri(), array('reset', 'dashicons'), '1.0.0');

	// scripts
	// wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'this_scripts_styles');

add_theme_support('post-thumbnails');


 