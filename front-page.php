<?php

get_header();

?>
 
<?php if (get_theme_mod('at_banner_image_display') == 'Yes') { ?>
		<div class="banner-image">
			<img src="<?php echo wp_get_attachment_url(get_theme_mod('at_banner_image_setting')); ?> ">
		</div>
		<?php } ?>
<div class="site-content">

	<div class="widget-content clearfix">
		<div class="widget-column-left">
		
		<?php if (is_active_sidebar('column1')) : ?>
			<div class="column-widget-area">
			<?php dynamic_sidebar('column1'); ?>
			</div>
		<?php endif; ?>
		
		</div>
		<div class="widget-column-right last">
		
		<?php if (is_active_sidebar('column2')) : ?>
			<div class="column-widget-area">
			<?php dynamic_sidebar('column2'); ?>
			</div>
		<?php endif; ?>
		
		</div>
	</div>

<?php if (have_posts()) :
	while (have_posts()) : the_post();
	
	the_content();
	
	endwhile;

	else : 
		echo '<p>No Content Found</p>';

	endif; ?>
	
	<div class="home-columns clearfix">
	
		<div class="one-half">
	
			<h2>Awesome Posts</h2>
	<?php
	
	// Uncategorized post loop begins here
	$uncatPosts = new WP_Query('cat=1&posts_per_page=2');
	
	if ($uncatPosts->have_posts()) :
	while ($uncatPosts->have_posts()) : $uncatPosts->the_post(); ?>
	
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php the_excerpt(); ?>
	<?php endwhile;

	else : 
		echo '<p>No Content Found</p>';

	endif; 
	wp_reset_postdata(); ?>
	
		</div>
		<div class="one-half last">
	
			<h2>Awesome Links</h2>
	<?php 
	
	// Links post loop begins here
	$linksPosts = new WP_Query('cat=7&posts_per_page=3');
	
	if ($linksPosts->have_posts()) :
	while ($linksPosts->have_posts()) : $linksPosts->the_post(); ?>
	
	<h2><a href="<?php echo get_the_content(); ?>" target="_blank"><?php the_title(); ?></a></h2>
	
	<?php endwhile;

	else : 
		echo '<p>No Content Found</p>';

	endif; 
	wp_reset_postdata();
	?>
		</div>
	</div>
</div> <?php
get_footer();
?>