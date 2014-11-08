<?php
get_header();
get_sidebar();
?>

<div id="container">

<h1 class="postitle">Page not found<hr /></h1>
<br>

<h2>Last articles:</h2>
<ul>
<?php wp_get_archives('type=postbypost&limit=10'); ?>
</ul>
</div>

</div>

<?php get_footer(); ?>
