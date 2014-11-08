<?php
	if ( is_page() ) {
		echo '<div class="postinfo">',
			 '<span><small>Author:&nbsp;'.get_the_author().' on '.get_the_date();
		if (is_user_logged_in()) {
			echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
			edit_post_link(__('edit', 'wikiwp'));
		}
		echo '</small></span>',
			 '</div>';
	} elseif ( is_single() ) {
		echo '<div class="postinfo">',
			 '<span><small>Author:&nbsp;'.get_the_author().' on '.get_the_date();
		if (is_user_logged_in()) {
			echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
			edit_post_link(__('edit', 'wikiwp'));
		}
		echo '</small></span>',
			 '</div>';
		echo '<div class="postinfo">',
			 '<span><small>';
		_e('Categories', 'wikiwp');
		echo ':&nbsp;';
		the_category(', ');
		echo '</small></span>',
			 '</div>',
			 '<div class="postinfo">',
			 '<span><small>';
		_e('Tags', 'wikiwp');
		echo ':&nbsp;';
		$tag = get_the_tags();
		if (! $tag) { 
			echo 'No tags set';
		} else {
			the_tags('',', ','');
		}
		echo '</small></span>',
			 '</div>';
	} elseif ( is_front_page() && is_home() ) {
		echo '<div>',
			 '<span><i><small>By '.get_the_author_link().' on '.get_the_date().'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
		if (is_user_logged_in()) {
			edit_post_link(__('edit', 'wikiwp'));
			echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
		}
		_e('Categories', 'wikiwp');
		echo ':&nbsp;';
		the_category(', ');
		echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
            	comments_popup_link(false, false, false, 'comments-link');
		echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
		_e('Tags', 'wikiwp');
		echo ':&nbsp;';
		$tag = get_the_tags();
		if (! $tag) { 
			echo 'No tags set';
		} else {
			the_tags('',', ','');
		}
		echo '</small></i></span>',
		   	 '</div>';
	} elseif ( is_search() ) {
		echo '<div>',
			 '<span><i><small>By '.get_the_author_link().' on '.get_the_date().'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
		if (is_user_logged_in()) {
			edit_post_link(__('edit', 'wikiwp'));
			echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
		}
		_e('Categories', 'wikiwp');
		echo ':&nbsp;';
		the_category(', ');
		echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
            	comments_popup_link(false, false, false, 'comments-link');
		echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
		_e('Tags', 'wikiwp');
		echo ':&nbsp;';
		$tag = get_the_tags();
		if (! $tag) { 
			echo 'No tags set';
		} else {
			the_tags('',', ','');
		}
		echo '</small></i></span>',
		   	 '</div>';
	}
?>
