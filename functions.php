<?php 

function novis_portal_resources(){
	wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'novis_portal_resources');


//Theme Setup
function novis_portal_setup(){
	
	//Navigation Menus
	register_nav_menus(array(
	'primary' 	=> __('Primary Menu'),
	'footer'	=> __('Footer Menu')
	));
	
	//Add Feadured Image Support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 180, true);
	add_image_size('banner-image', 920, 210, true );

	//Add Post Format Support
	add_theme_support('post-formats', array('aside', 'gallery', 'video'));

	//Add HTML5 Support
	add_theme_support('html5', array('comment_list', 'comment_form', 'search_form' ));
}
add_action('after_setup_theme', 'novis_portal_setup');

//Customize Excerpt Word Count Length
function novis_portal_excerpt_length(){
	return 20;
}
add_filter('excerpt_length', 'novis_portal_excerpt_length' );