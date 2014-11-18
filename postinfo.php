<?php
echo '<div class="postinfo"><span>Author: ',
	get_the_author_link(),
	' on ',
	get_the_date();
if (is_user_logged_in()) {
	echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
	edit_post_link(__('edit', 'wikiwp'));
}
if ('page' !== get_post_type()) {
	echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;',
		__('Categories', 'wikiwp'),
		': ';
	the_category(', ');
	echo '</span>';

	echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp',
		__('Tags', 'wikiwp'),
		': ';
	$tag = get_the_tags();
	if (empty($tag)) {
		echo 'No tags set';
	} else {
		the_tags('',', ','');
	}
}
if (false === is_page() && false === is_single()) {
	echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
	comments_popup_link(false, false, false, 'comments-link');
}
echo '</span></div>';
