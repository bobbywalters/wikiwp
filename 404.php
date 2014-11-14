<?php
get_header();
get_sidebar();
?>

<div id="container">
	<h1 class="postitle">Page not found</h1>
	<h2>Recent entries</h2>
	<ul>
		<?php wp_get_archives('type=postbypost&limit=10'); ?>
	</ul>
</div>

<?php get_footer(); ?>
