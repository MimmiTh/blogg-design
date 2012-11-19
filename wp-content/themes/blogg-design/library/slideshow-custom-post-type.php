<?php 
//Register slide post type
add_action('init', 'slideshow_register');

function slideshow_register() {
	$labels = array(
		'name' => _x('Slideshow', 'post type general name'),
		'singular_name' => _x('Slide', 'post type singular name'),
		'add_new' => _x('Lägg till ny', 'slideshow item'),
		'add_new_item' => __('Lägg till ny slide'),
		'edit_item' => __('Redigera slide'),
		'new_item' => __('Ny slide'),
		'view_item' => __('Se slide'),
		'search_items' => __('Sök i slideshow'),
		'not_found' => __('Inget funnet'),
		'not_found_in_trash' => 'Inget funnet i papperskorgen',
		'parent_item_colon' => ''
	);

	$args = array(
		'description' => __( 'Slides som visas på sidans framsida.' ),
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 8,
		'menu_icon' => get_stylesheet_directory_uri() . '/library/images/slideshow-custom-post-icon.png',
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'slideshow', 'with_front' => false)
	);

	register_post_type('bd_slideshow', $args);
}

add_action('admin_init', 'slideshow_admin_init');

function slideshow_admin_init() {
	add_meta_box('url-meta', 'Slide-alternativ', 'slideshow_url_meta', 'bd_slideshow', 'side', 'low');
}

function slideshow_url_meta() {
	global $post;
	$custom = get_post_custom($post->ID);
	$url = $custom['url'][0];

	echo '<label>URL</label>';
	echo '<input name="url" value="'. $url .'"><br>';
}

add_action('save_post', 'slideshow_save_details');

function slideshow_save_details() {
	global $post;

	if (get_post_type($post) == 'bd_slideshow') {
		if (!isset($_POST['url'])) {
			return $post;
		}
		update_post_meta($post->ID, 'url', $_POST['url']);
	}
}

function wp_rtp_activation_hook() {
	if (function_exists('add_theme_support')) {
		add_theme_support('post_thumbnails', array('bd_slideshow'));
	}
	add_image_size('slider', 700, 150);
}

add_action('after_setup_theme', 'wp_rtp_activation_hook');

$image_sizes = array(
	array(
		'name' => 'slider',
		'width' => 700,
		'height' => 150,
		'crop' => false
	)
);

//For each new image size, run add_image_size() and update_option() to
//add the necessary info.
//update_option() is good because it only updates the database if the 
//value has changed. It also adds the option if it doesn't exist.
foreach ($image_sizes as $image_size) {
	add_image_size(
		$image_size['name'],
		$image_size['width'],
		$image_size['height'],
		$image_size['crop']
	);
	update_option($image_size['name'].'_size_w', $image_size['width']);
	update_option($image_size['name'].'_size_h', $image_size['height']);
	update_option($image_size['name'].'_crop', $image_size['crop']);	
}

//Hook into the 'intermediate_image_sizes' filter used by image-edit.php
//This adds the custom sizes into the array of sizes it uses when
//editing and saving images.
add_filter('intermediate_image_sizes', 'slideshow_add_image_sizes');

function slideshow_add_image_sizes($sizes) {
	global $image_sizes;
	foreach ($image_sizes as $image_size) {
		$sizes[] = $image_size['name'];
	}
	return $sizes;
}