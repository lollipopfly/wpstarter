<?php
if ( ! function_exists( 'wpstarter_setup' ) ) :
	function wpstarter_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		// set_post_thumbnail_size(1024, 768, true);

		if (function_exists('add_theme_support')) {
			add_theme_support('menus');
		}

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;
add_action( 'after_setup_theme', 'wpstarter_setup' );

/**
 * Enqueue scripts and styles.
 */
function wpstarter_scripts() {
	wp_enqueue_style( 'wpstarter-style', get_stylesheet_uri() );


	wp_enqueue_script('jquery',
	    get_template_directory_uri() . '/src/js/libs/jquery.min.js');

	wp_enqueue_script('script-commmon',
	    get_template_directory_uri() . '/src/js/common.js',
	      ['jquery'], null, true);
}
add_action( 'wp_enqueue_scripts', 'wpstarter_scripts' );


/* ACF */
// Acf theme options
// if( function_exists('acf_add_options_page') ) {

//   acf_add_options_page(array(
//     'page_title'  => 'Theme General Settings',
//     'menu_title'  => 'Theme Options',
//     'menu_slug'   => 'theme-general-settings',
//     'capability'  => 'edit_posts',
//     'redirect'    => false
//   ));
//   acf_add_options_sub_page(array(
//     'page_title'  => 'Theme Social Settings',
//     'menu_title'  => 'Social',
//     'parent_slug' => 'theme-general-settings',
//   ));
//   acf_add_options_sub_page(array(
//     'page_title'  => 'Theme Social Settings',
//     'menu_title'  => 'Bottom Contact Form',
//     'parent_slug' => 'theme-general-settings',
//   ));
//   acf_add_options_sub_page(array(
//     'page_title'  => 'Theme Social Settings',
//     'menu_title'  => 'Footer',
//     'parent_slug' => 'theme-general-settings',
//   ));
//   acf_add_options_sub_page(array(
//     'page_title'  => 'Theme Social Settings',
//     'menu_title'  => 'Popups',
//     'parent_slug' => 'theme-general-settings',
//   ));
// }


/* Contact Form 7 */
// Remove span wrapper for contact form 7 fields
// add_filter('wpcf7_form_elements', function($content) {
//   $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

//   return $content;
// });


// CUSTOM POST TYPES

// function register_courses() {
//    register_post_type('courses', array(
//      'labels' => array(
//        'name' => __('Courses'), 'singular_name' => __( 'Courses' ),
//      ),
//      'singular_label' => __('Courses'),
//      'public' => true,
//      'publicly_queryable' => true,
//      'has_archive' => false,
//      'menu_icon' => 'dashicons-welcome-write-blog',
//      'menu_position' => 5,
//      'has_archive' => false,
//      'show_ui' => true, 
//      '_builtin' => false, 
//      '_edit_link' => 'post.php?post=%d',
//      'capability_type' => 'post',
//      'hierarchical' => false,
//      'taxonomies' => array(),
//      'rewrite' => array("slug" => 'courses', 'with_front' => false ),
//      'query_var' => "courses", 
//      'supports' => array('title','editor', 'excerpt')
//    ));
//    flush_rewrite_rules();
// }
// add_action( 'init', 'register_courses' );