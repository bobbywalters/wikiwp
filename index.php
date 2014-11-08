<?php
get_header();
get_sidebar();
?>

<div class="container">

<h1>
<?php
if (is_category()) single_cat_title();
elseif (is_search()) bloginfo('name');
else wp_title('',true);
?>
</h1>

<?php while ( have_posts() ) : the_post() ?>

  <div id="<?php the_ID() ?>" class="excerpt">
    <h2><a href="<?php the_permalink() ?>"> <?php the_title() ?></a></h2>
    <div class="summary">
      <?php the_content('<span class="more">'.__('More...', 'wikiwp').'</span>'); ?>
    </div>
  
	 <?php get_template_part('postinfo'); ?>
  
<div id="pagination">
<?php wp_link_pages(); ?>
</div>

<?php  endwhile; ?>

<div class="navigation">
<div class="alignleft"><?php previous_posts_link(__('Newer entries', 'wikiwp')) ?></div>
<div class="alignright"><?php next_posts_link(__('Older entries', 'wikiwp')) ?></div>
</div>

<br />

<?php

if(is_home())
{
  $categories = get_categories('number=8');
  foreach ($categories as $cat) 
  {
    global $post;

    $id = $cat->cat_ID;
    $cn = get_cat_name($id);
    if($cn == "") continue;
    $cn = ucfirst($cn);
   
    echo "<fieldset class='cat_fieldset'><legend class='cat_legend'>$cn</legend>\n";
    echo "<ul>\n";

    $myposts = get_posts("numberposts=5&offset=0&category=$id");
    foreach($myposts as $post) :
?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php 
    endforeach; 
    echo "</ul>";
    echo "</fieldset>";
}
}
?>

</div><!--home-->

<?php get_footer() ?>
