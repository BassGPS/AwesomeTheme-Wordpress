<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo(charset); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	<div class="container">
	<!-- site-header -->
	<header class="site-header">
	
	<div class="search_time_container">
		<div class="current-time">
			<?php echo current_time('F jS, Y g:iA'); ?>
		</div>
		<div class="hd-search">
			<?php get_search_form(); ?>
		</div>
		
	</div>	
	
		<h1><a href="<?php echo home_url(); ?>"><img id="site-logo" src="http://www.aisd.net/images/logo_txt.png" height="60px" alt="<?php bloginfo('name'); ?>" /></a></h1>
		
		
		<nav class="site-nav">
		
		<?php 
		
		$args = array(
			'theme_location' => 'primary'
		);
		?>
			<?php wp_nav_menu($args); ?>
		</nav>
	</header><!-- site header -->
	
	