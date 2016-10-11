<?php

function awesometheme_resources() {
	
	wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'awesometheme_resources');

// Navigation Menus

register_nav_menus(array(
	'primary' => __( 'Primary Menu'),
	'footer' => __( 'Footer Menu'),

));

// Theme Setup
function awesometheme_setup() {
	
	// Add Featured Image Support
	add_theme_support('post-thumbnails');
	
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('banner-image', 920, 210, array('left', 'top'));
	
	// Add Post Format Support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
	
}

add_action('after_setup_theme', 'awesometheme_setup');

// Customize Excerpt word count length
function custom_excerpt_length() {
	return 30;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Add our Widget Locations
function ourwidgetsinit() {
	register_sidebar( array(
		'name' => 'Content Area Left',
		'id' => 'column1', 
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>'
	));
	register_sidebar( array(
		'name' => 'Content Area Right',
		'id' => 'column2', 
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>'
	));
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1', 
		'before_widget' => '<div class="sidebar-widget-item">',
		'after_widget' => '</div>'
	));
	register_sidebar( array(
		'name' => 'Footer Area 1',
		'id' => 'footer1',
		'before_widget' => '<div class="footer-widget-item">',
		'after_widget' => '</div>'
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 2',
		'id' => 'footer2',
		'before_widget' => '<div class="footer-widget-item">',
		'after_widget' => '</div>'
	));

	register_sidebar( array(
		'name' => 'Footer Area 3',
		'id' => 'footer3',
		'before_widget' => '<div class="footer-widget-item">',
		'after_widget' => '</div>'
	));

	register_sidebar( array(
		'name' => 'Footer Area 4',
		'id' => 'footer4',
		'before_widget' => '<div class="footer-widget-item">',
		'after_widget' => '</div>'
	));	
}

add_action('widgets_init', 'ourwidgetsinit');

// Customize Appearance Options

function awesometheme_customize_register( $wp_customize ) {
	
	// Link Color
	
	$wp_customize->add_setting('at_link_color', array(
		'default' => '#336699', 
		'transport' => 'refresh',
	));
	
	$wp_customize->add_section('at_standard_colors', array(
		'title' => __('Standard Colors', 'AwesomeTheme'),
		'priority' => 30,
	));
	
	$wp_customize->add_control(new WP_customize_color_control( $wp_customize, 'at_link_color_control', array(
		'label' => __('Link Color', 'AwesomeTheme'),
		'section' => 'at_standard_colors',
		'settings' => 'at_link_color',
	)));
	
	// Header & Footer Color + Text Color + Link Color + Search Button
	
	$wp_customize->add_setting('at_headerfooter_color', array(
		'default' => '#ddd', 
		'transport' => 'refresh',
	));
	
	$wp_customize->add_setting('at_headerfooter_text_color', array(
		'default' => '#333', 
		'transport' => 'refresh',
	));
	
	$wp_customize->add_setting('at_headerfooter_link_color', array(
		'default' => '#336699', 
		'transport' => 'refresh',
	));
	
	$wp_customize->add_setting('at_headerfooter_searchbutton_color', array(
		'default' => '#336699', 
		'transport' => 'refresh',
	));
	
	$wp_customize->add_section('at_HF_colors', array(
		'title' => __('Header & Footer Colors', 'AwesomeTheme'),
		'priority' => 40,
	));
	
	$wp_customize->add_control(new WP_customize_color_control( $wp_customize, 'at_headerfooter_color_control', array(
		'label' => __('Header & Footer Color', 'AwesomeTheme'),
		'section' => 'at_HF_colors',
		'settings' => 'at_headerfooter_color',
	)));
	
	$wp_customize->add_control(new WP_customize_color_control( $wp_customize, 'at_headerfooter_text_color_control', array(
		'label' => __('Header & Footer Text Color', 'AwesomeTheme'),
		'section' => 'at_HF_colors',
		'settings' => 'at_headerfooter_text_color',
	)));
	
	$wp_customize->add_control(new WP_customize_color_control( $wp_customize, 'at_headerfooter_link_color_control', array(
		'label' => __('Header & Footer Link Color', 'AwesomeTheme'),
		'section' => 'at_HF_colors',
		'settings' => 'at_headerfooter_link_color',
	)));
	
	$wp_customize->add_control(new WP_customize_color_control( $wp_customize, 'at_headerfooter_searchbutton_color_control', array(
		'label' => __('Search Button Color', 'AwesomeTheme'),
		'section' => 'at_HF_colors',
		'settings' => 'at_headerfooter_searchbutton_color',
	)));
}

	add_action ('customize_register', 'awesometheme_customize_register');
	
	
// Output Customize CSS
function awesomeTheme_customize_css (){ ?>
	
	<style type="text/css">
		
		a:link,
		a:visited {
			color: <?php echo get_theme_mod('at_link_color'); ?>;
		}
		.site-header,
		.site-footer {
			background: <?php echo get_theme_mod('at_headerfooter_color'); ?>;
			color: <?php echo get_theme_mod('at_headerfooter_text_color'); ?>;
		}
		.site-header a,
		.site-footer a {
			color: <?php echo get_theme_mod('at_headerfooter_link_color'); ?>;
		}
		div.hd-search #searchsubmit {
			background: <?php echo get_theme_mod('at_headerfooter_searchbutton_color'); ?>;
		}
	</style>
	
<?php }	

add_action('wp_head', 'awesomeTheme_customize_css');

// Add Footer callout section to admin appearance customize screen

function awesomeTheme_footer_callout ($wp_customize){
	
	$wp_customize->add_section('at_footer_callout_section', array(
		'title' => 'Footer Callout'
	));
	
	$wp_customize->add_setting('at_footer_callout_display', array (
		'default' => 'No',
	));
	
	$wp_customize->add_control( new WP_customize_control($wp_customize, 'at_footer_callout_display_control', array(
		'label' => 'Display this section?', 
		'section' => 'at_footer_callout_section',
		'settings' => 'at_footer_callout_display',
		'type' => 'select',
		'choices' => array('No' => 'No', 'Yes' => 'Yes')
	)));
	
	$wp_customize->add_setting('at_footer_callout_headline', array (
		'default' => 'Example Headline Text',
	));
	
	$wp_customize->add_control( new WP_customize_control($wp_customize, 'at_footer_callout_headline_control', array(
		'label' => 'Headline', 
		'section' => 'at_footer_callout_section',
		'settings' => 'at_footer_callout_headline',
	)));
	
	$wp_customize->add_setting('at_footer_callout_text', array (
		'default' => 'Example Paragraph Text',
	));
	
	$wp_customize->add_control( new WP_customize_control($wp_customize, 'at_footer_callout_text_control', array(
		'label' => 'Text', 
		'section' => 'at_footer_callout_section',
		'settings' => 'at_footer_callout_text',
		'type' => 'textarea',
	)));
	
	$wp_customize->add_setting('at_footer_callout_link');
	
	$wp_customize->add_control( new WP_customize_control($wp_customize, 'at_footer_callout_link_control', array(
		'label' => 'Link', 
		'section' => 'at_footer_callout_section',
		'settings' => 'at_footer_callout_link',
		'type' => 'dropdown-pages',
	)));
	
	$wp_customize->add_setting('at_footer_callout_image');
	
	$wp_customize->add_control( new WP_customize_cropped_image_control($wp_customize, 'at_footer_callout_image_control', array(
		'label' => 'Image', 
		'section' => 'at_footer_callout_section',
		'settings' => 'at_footer_callout_image',
		'width' => 750,
		'height' => 500,
	)));
}

add_action ('customize_register', 'awesomeTheme_footer_callout');

// Add Banner Image in Admin Customize 

function awesometheme_banner_image ($wp_customize) {
	
	
	$wp_customize->add_section('at_banner_image_section', array(
		'title' => 'Banner Image',
		'priority' => 50,
	));
	
	$wp_customize->add_setting('at_banner_image_display', array (
		'default' => 'No',
	));
	
	$wp_customize->add_control( new WP_customize_control($wp_customize, 'at_footer_callout_display_control', array(
		'label' => 'Display this Banner?', 
		'section' => 'at_banner_image_section',
		'settings' => 'at_banner_image_display',
		'type' => 'select',
		'choices' => array('No' => 'No', 'Yes' => 'Yes')
	)));
	
	
	$wp_customize->add_setting('at_banner_image_setting');
	
	$wp_customize->add_control( new WP_customize_cropped_image_control($wp_customize, 'at_banner_image_control', array(
		'label' => 'Image', 
		'section' => 'at_banner_image_section',
		'settings' => 'at_banner_image_setting',
		'width' => 980,
		'height' => 200,
	)));
	
}

add_action ('customize_register', 'awesometheme_banner_image');

 ?>