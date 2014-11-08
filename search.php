<?php 
    get_header(); 
    get_sidebar();
    // CONTENT
    echo '<div class="container">',
         '<h1 class="posttitle">'.$wp_query->found_posts;
    printf( __( '&nbsp;results found for %s', 'wikiwp' ), '<strong>' . get_search_query() . '</strong>' );
    echo '</h1>';
    $posts = query_posts($query_string . '&orderby=name&order=asc&posts_per_page=-1'); 
    if (have_posts()) : while ( have_posts() ) : the_post();
    echo '<h2 class="excerpt_title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
    foreach((get_the_category()) as $category) { if ($category->category_parent  != 0) { echo '&nbsp;&nbsp;<a class="meta_text" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr(strip_tags($category->name)) . '">' . $category->name.'</a> '; } }
    // excerpt
    the_excerpt();
    // post info
    get_template_part('postinfo');
    endwhile; endif;
    echo '</div>';
    // GET FOOTER
    get_footer() 
?>
