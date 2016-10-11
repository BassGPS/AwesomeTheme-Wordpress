<?php

get_header(); ?>

<?php if (get_theme_mod('at_banner_image_display') == 'Yes') { ?>
		<div class="banner-image">
			<img src="<?php echo wp_get_attachment_url(get_theme_mod('at_banner_image_setting')); ?> ">
		</div>
		<?php } ?>
<div class="post-wrapper clearfix">

	<div class="main-column">
		<?php 
			if (have_posts()) :
				while (have_posts()) : the_post();
				
				get_template_part('content', get_post_format());
				
				endwhile;

				else : 
					echo '<p>No Content Found</p>';

			endif; 
		?>
	</div>
	
	<?php get_sidebar(); ?>
	
</div><!-- end post-wrapper -->

<?php 
get_footer();

?>