<?php
	get_header();
	get_sidebar();

	echo '<div class="container">';

	while ( have_posts() ) : the_post();

	echo '<article ';
	post_class('post');
	echo '>',
		 '<h1 class="posttitle">'.get_the_title().'</h1>',
		 '<div class="content">'.get_the_content().'</div>';
	get_template_part('postinfo' );
	echo '</article>';
?>

<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<div class="navigation">
<div class="alignleft"><?php next_post_link('Newer: %link') ?></div>
<div class="alignright"><?php previous_post_link('Older: %link') ?></div>
</div>

<div class="comments">
<?php if (comments_open()) comments_template(); ?>
</div>

<?php endwhile ?>

<div class="lastlist">
<p>Last articles</p>
<ul>
<?php wp_get_archives('type=postbypost&limit=10'); ?>
</ul>
</div>

</div>

<?php get_footer(); ?>
