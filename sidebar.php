<?php 
	echo '<div class="sidebar">',
		 '<div id="logo">',
		 '<a href="'.get_home_url().'"><img class="logo-img" src="'.get_template_directory_uri().'/images/',
		 //Change the logo with your own.
		 'logo.png',
		 '" alt=".'.get_bloginfo('name').'"></a>',
		 '</div>',
		 '<h2 class="blog-name"><a href="'.get_home_url().'/">'.get_bloginfo('name').'</a></h2>',
		 '<h3 class="blog-description">'.get_bloginfo('description').'</h3>',
		 // sidebar
		 '<aside>',
		 '<ul class="sideul">';
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : endif;
	echo '</ul>',
		 '</aside>',
		 '</div>';
?>