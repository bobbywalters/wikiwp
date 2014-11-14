<?php 
get_header(); 
get_sidebar(); 
?>

<div class="container">
<?php if (have_posts()) : the_post() ?>
	<h1 class="posttitle"><?php the_title(); ?></h1>
	<div <?php post_class('content'); ?>><?php  the_content();  ?></div>
	<?php get_template_part('postinfo'); ?>
	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	<div class="navigation">
		<div class="alignleft"><?php previous_post_link('Older: %link') ?></div>
		<div class="alignright"><?php next_post_link('Newer: %link') ?></div>
	</div>
	<div class="comments">
		<?php if (comments_open()) comments_template(); ?>
	</div>
<?php endif ?>
</div>

<?php get_footer();