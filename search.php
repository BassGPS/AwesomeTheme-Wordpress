<?php

get_header();

if (have_posts()) : ?>

	<h2>Search results for: <?php the_search_query(); ?></h2>

	<?php 
	while (have_posts()) : the_post(); ?>
	
	<div class="post-wrapper">
	
	<?php get_template_part('content', get_post_format()); ?>
	
	</div>
	<?php endwhile;

	else : 
		echo '<p>No Content Found</p>';

	endif;

get_footer();

?>