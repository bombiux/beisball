<?php

add_theme_support('post-thumbnails');

function this_menus() {
	register_nav_menus(array(
		'menu-principal' => __('Menu Principal', 'this')
	));
}
add_action('init', 'this_menus');

function this_scripts_styles() {
	wp_enqueue_style('reset', get_template_directory_uri() . '/css/reset.css', array(), '0.0.6');
	wp_enqueue_style('dashicons');
	wp_enqueue_style('style', get_stylesheet_uri(), array('reset', 'dashicons'), '1.0.0');
}
add_action('wp_enqueue_scripts', 'this_scripts_styles');


function get_li_items($player) {
	$temporary = get_field($player);
	echo '<div><h4>';
		if ($player == 'cuerpo_tec') {
			echo 'Cuerpo Técnico';
		} else {
			echo $player;
		}
	echo '</h4><ul>';
		for ($i=1; $i < sizeof($temporary); $i++) { 
			if ($temporary[$i] != '') {
				echo '<li><span>' . $temporary[$i] . '</span></li>';
			}
		}
    echo '</ul></div>';
}