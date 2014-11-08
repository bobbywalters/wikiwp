<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scaleable=yes">
		<meta name="robots" content="index, follow" />
		<title><?php wp_title(''); ?></title>
		<meta name="description" content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('name'); echo " - "; bloginfo('description'); } ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
		<meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
		<meta property="og:url" content="<?php esc_url( home_url() ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class('body'); ?>>
	<header><h2 style="float: right"><?php
		global $wp_the_query;
		$current_object = $wp_the_query->get_queried_object();
		$sep = false;
		if (false === empty($current_object)) {
			if (false === empty($current_object->post_type)
				&& ($post_type_object = get_post_type_object($current_object->post_type))
				&& current_user_can('edit_post', $current_object->ID)
				&& $post_type_object->show_ui) {
				$sep = true;
				echo '<a href="',
					get_edit_post_link($current_object->ID),
					'">',
					$post_type_object->labels->edit_item,
					'</a>';
			} elseif (false === empty($current_object->taxonomy)
				&& ($tax = get_taxonomy($current_object->taxonomy))
				&& current_user_can($tax->cap->edit_terms)
				&& $tax->show_ui) {
				$sep = true;
				echo '<a href="',
					get_edit_term_link($current_object->term_id, $current_object->taxonomy),
					'">',
					$tax->labels->edit_item,
					'</a>';
			}
		}
		if (current_user_can('edit_pages')) {
			if (true === $sep) {
				echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
			} else {
				$sep = true;
			}
			echo '<a href="',
				admin_url('post-new.php?post_type=page'),
				'">New Page</a>';
		}
		if (true === $sep) {
			echo '&nbsp;&nbsp;&nbsp;';
		}
	?></h2></header>