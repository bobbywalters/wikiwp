<?php
// Disable the admin bar...edit and new will be in header
show_admin_bar(false);

// SET CONTENT WIDTH FOR EMBEDDED MEDIA
if ( false === isset( $content_width ) ) $content_width = 1024;

// Load theme style and JS
function wikiwp_enqueue_scripts() {
	// Main CSS stylesheet
	wp_register_style( 'wikiwp-style', get_stylesheet_uri(), array(), null, 'all' );
	wp_enqueue_style( 'wikiwp-style' );

	if (false === is_admin() && is_singular()) {
		// Table of contents script
		wp_enqueue_script('wikiwp-toc-js', get_stylesheet_directory_uri() . '/js/toc.min.js', array(), null, true);
		wp_localize_script('wikiwp-toc-js', 'wwp_toc_i18n', array('contents' => __('Contents', 'wikiwp')));

		// Threaded comment reply script
		if (comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'wikiwp_enqueue_scripts');

// AUTOMATIC FEED LINKS
add_theme_support( 'automatic-feed-links' );

// SIDEBAR
function wikiwp_register_sidebar_left() {
    register_sidebar( array(
        'name' => __( 'Left Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( '', 'theme-slug' ),
        'before_title' => '',
        'after_title' => '',
    ) );
}
add_action( 'widgets_init', 'wikiwp_register_sidebar_left' );