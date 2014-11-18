<?php
get_header(); 
get_sidebar();

// TITLE
$cat_title = '<strong>' . single_cat_title('', false) . '</strong>';
echo '<div class="container">',
	'<h1 class="posttitle">';
switch ($wp_query->found_posts) {
	case 0: {
		printf(__('Nothing filed under %s', 'wikiwp'), $cat_title);
		break;
	}
	case 1: {
		printf(__('A single entry is filed under %s', 'wikiwp'), $cat_title);
		break;
	}
	default: {
		printf(__('%d entries filed under %s', 'wikiwp'), $wp_query->found_posts, $cat_title);
		break;
	}
}
echo '</h1>';

// CATEGORY META
$cat_id = get_queried_object_id();
$term_description = term_description();
$categories = get_categories(array('parent' => $cat_id, 'depth' => 1));
if (false === empty($term_description) || false === empty($categories)) {
	echo '<div class="category-meta">';

	// Show an optional term description.
	if (false === empty($term_description)) {
		echo $term_description;
	}

	// Immediate children list
	if (false === empty($categories)) {
		echo '<p class="category-children-header">';
		if (isset($categories[1])) {
			printf(__('%d available sub categories', 'wikiwp'), count($categories));
		} else {
			_e('Available sub category', 'wikiwp');
		}
		echo '</p><ul class="category-children">';
		foreach ($categories as &$c) {
			echo '<li><a href="',
				get_category_link($c->cat_ID),
				'">',
				$c->name,
				'</a>';
			if (false === empty($c->description)) {
				echo ' <span>',
					$c->description,
					'</span>';
			}
			echo '</li>';
		}
		unset($c);
		echo '</ul>';
	}

	echo '</div>';
}

// CONTENT
if (have_posts()) {
	while (have_posts()) {
		the_post();
		echo '<h2 class="excerpt_title"><a href="', get_the_permalink(), '">', get_the_title(), '</a></h2>';
		// excerpt
		the_excerpt();

		// post info
		get_template_part('postinfo');

		$cs = get_the_category();
		if (false === empty($cs)) {
			$ccs = array();
			foreach ($cs as &$c) {
				if ($cat_id === $c->parent) {
					$ccs[] = '<a class="meta_text" href="' . get_category_link($c->term_id) . '" title="' . esc_attr(strip_tags($c->name)) . '">' . $c->name . '</a>';
				}
			}
			unset($c);
			if (false === empty($ccs)) {
				echo '<p class="sub-category">';
				if (isset($ccs[1])) {
					printf(__('Filed under sub categories: %s', 'wikiwp'), implode(', ', $ccs));
				} else {
					printf(__('Filed under sub category: %s', 'wikiwp'), $ccs[0]);
				}
				echo '</p>';
			}
		}
	}
}
echo '</div>';

// GET FOOTER
get_footer();