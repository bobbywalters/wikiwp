<?php
get_header(); 
get_sidebar();

// TITLE
$search_query = '<strong>' . get_search_query() . '</strong>';
echo '<div class="container">',
	'<h1 class="posttitle">';
switch ($wp_query->found_posts) {
	case 0: {
		printf(__('Nothing found for %s', 'wikiwp'), $search_query);
		break;
	}
	case 1: {
		printf(__('Found a single result for %s', 'wikiwp'), $search_query);
		break;
	}
	default: {
		printf(__('%d results found for %s', 'wikiwp'), $wp_query->found_posts, $search_query);
		break;
	}
}
echo '</h1>';

// CONTENT
if (have_posts()) {
	while (have_posts()) {
		the_post();
		echo '<h2 class="excerpt_title"><a href="', get_the_permalink(), '">', get_the_title(), '</a></h2>';
		// excerpt
		the_excerpt();

		// post info
		get_template_part('postinfo');
	}
}
echo '</div>';

// GET FOOTER
get_footer();