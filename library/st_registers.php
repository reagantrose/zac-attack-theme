<?php

if ( function_exists('add_theme_support') ) {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'nav_menus' );
	//set_post_thumbnail_size( 200, 200 );
	//add_image_size('post_thumb', 800, 800, true);
}


/*
Register Menu
*/
if ( function_exists('register_nav_menus') )
{
	register_nav_menus(
		array(
			'primary' => __(THEMENAME . ' Primary Menu', 'slicetheme')
		)
	);
}


/*
Register Sidebar
*/
if ( function_exists('register_sidebar') )
{
	$sidebars = array(
				  'Sidebar General (right)',
				  'Sidebar Blog (left)',
				  'Sidebar Blog (right)',
				  'Sidebar Pages (left)',
				  'Sidebar Pages (right)',
				  'Sidebar Portfolio (left)',
				  'Sidebar Portfolio (right)'
				  );
	
	foreach ($sidebars as $sidebar)
	{
		register_sidebar(array(
		'name' => $sidebar,
		'before_widget' => '<section id="%1$s" class="widget %2$s">', 
		'after_widget' => '</section>', 
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>', 
		));
	}
	
	$sidebars = array(
				  'Footer Column 1', 
				  'Footer Column 2', 
				  'Footer Column 3', 
				  'Footer Column 4'
				  );
	
	foreach ($sidebars as $sidebar)
	{
		register_sidebar(array(
		'name' => $sidebar,
		'before_widget' => '<section id="%1$s" class="widget %2$s">', 
		'after_widget' => '</section>', 
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>', 
		));
	}
}


/*
Register Post Type
*/
add_action('init', 'portfolio_post_type');
add_action('init', 'pricing_table_post_type');

function portfolio_post_type() 
{
	$labels = array(
		'name' => _x('Portfolio', 'post type general name', 'slicetheme'),
		'singular_name' => _x('Portfolio', 'post type singular name', 'slicetheme'),
		'add_new' => _x('Add New', 'portfolio', 'slicetheme'),
		'all_items' => __('All Portfolio', 'slicetheme'),
		'add_new_item' => __('Add New Portfolio', 'slicetheme'),
		'edit_item' => __('Edit Portfolio', 'slicetheme'),
		'new_item' => __('New Portfolio', 'slicetheme'),
		'view_item' => __('View Portfolio', 'slicetheme'),
		'search_items' => __('Search Portfolio', 'slicetheme'),
		'not_found' =>  __('No Portfolio Found', 'slicetheme'),
		'not_found_in_trash' => __('No Portfolio Found in Trash', 'slicetheme'), 
		'parent_item_colon' => ''
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'portfolio-view', 'with_front' => true),
		'query_var' => true,
		'show_in_nav_menus'=> false,
		'supports' => array('title', 'thumbnail', 'excerpt', 'editor', 'comments')
	);
	
	register_post_type( 'portfolio' , $args );	
	
	register_taxonomy('portfolio-category', 
		array('portfolio'), 
		array('hierarchical' => true, 
		'label' => 'Categories', 
		'singular_label' => 'Categories', 
		'rewrite' => true,
		'query_var' => true
	));
}

function pricing_table_post_type() 
{
	$labels = array(
		'name' => _x('Pricing Table', 'post type general name', 'slicetheme'),
		'singular_name' => _x('Pricing Table', 'post type singular name', 'slicetheme'),
		'add_new' => _x('Add New', 'Pricing Table', 'slicetheme'),
		'all_items' => __('All Pricing Table', 'slicetheme'),
		'add_new_item' => __('Add New Pricing Table', 'slicetheme'),
		'edit_item' => __('Edit Pricing Table', 'slicetheme'),
		'new_item' => __('New Pricing Table', 'slicetheme'),
		'view_item' => __('View Pricing Table', 'slicetheme'),
		'search_items' => __('Search Pricing Table', 'slicetheme'),
		'not_found' =>  __('No Pricing Table Found', 'slicetheme'),
		'not_found_in_trash' => __('No Pricing Table Found in Trash', 'slicetheme'), 
		'parent_item_colon' => ''
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'pricing-table', 'with_front' => true),
		'query_var' => true,
		'show_in_nav_menus'=> false,
		'supports' => array('title', 'excerpt', 'editor', 'page-attributes')
	);
	
	register_post_type( 'pricing-table' , $args );	
	
	register_taxonomy('pricing-table-category', 
		array('pricing-table'), 
		array('hierarchical' => true, 
		'label' => 'Categories', 
		'singular_label' => 'Categories', 
		'rewrite' => true,
		'query_var' => true
	));
}

add_filter('manage_edit-portfolio_columns', 'portfolio_edit_columns');
add_filter('manage_edit-pricing-table_columns', 'pricing_table_edit_columns');
add_action('manage_posts_custom_column', 'posts_custom_columns', 10, 2);

function portfolio_edit_columns($columns)
{
	$newcolumns = array(
		'cb' => '<input type="checkbox" />',
		'title' => 'Title',
		'portfolio-category' => 'Categories'
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}

function pricing_table_edit_columns($columns)
{
	$newcolumns = array(
		'cb' => '<input type="checkbox" />',
		'title' => 'Title',
		'pricing-table-category' => 'Categories'
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}

function posts_custom_columns($column)
{
	global $post;
	
	switch ($column) {
		case 'portfolio-category':
		echo get_the_term_list($post->ID, 'portfolio-category', '', ', ','');
		break;
		case 'pricing-table-category':
		echo get_the_term_list($post->ID, 'pricing-table-category', '', ', ','');
		break;
	}
}


/*
Register Meta Box
*/
add_filter( 'cmb_meta_boxes', 'page_metaboxes' );
add_filter( 'cmb_meta_boxes', 'portfolio_metaboxes' );
add_filter( 'cmb_meta_boxes', 'pricing_table_metaboxes' );

function page_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_page_';

	$meta_boxes[] = array(
		'id'         => 'page_metabox',
		'title'      => 'Page Templates',
		'pages'      => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(		
			array(
				'name'    => 'Page Template',
				'desc'    => '',
				'id'      => $prefix .'template',
				'type'    => 'select',
				'options' => array(
					array( 'value' => 'default', 'name' => 'Page Default' ),
					array( 'value' => 'blog', 'name' => 'Blog' ),
					array( 'value' => 'portfolio', 'name' => 'Portfolio' ),
					array( 'value' => 'homepage', 'name' => 'Home Page' ),
					array( 'value' => 'contact', 'name' => 'Contact' ),
					array( 'value' => 'sitemap', 'name' => 'Sitemap' ),
				),
			),	
			array(
				'name'    => 'Page Layout',
				'desc'    => '',
				'id'      => $prefix .'default',
				'type'    => 'select',
				'std'     => 'rb',
				'options' => array(
					array( 'value' => 'fw', 'name' => 'Full Width' ),
					array( 'value' => 'lb', 'name' => 'Left Sidebar' ),
					array( 'value' => 'rb', 'name' => 'Right Sidebar' ),
					array( 'value' => 'ds', 'name' => 'Dual Sidebar' ),
				),
			),
			array(
				'name'    => 'Blog Layout',
				'desc'    => '',
				'id'      => $prefix .'blog',
				'type'    => 'select',
				'std'     => 'rb_f',
				'options' => array(
					array( 'value' => 'fw', 'name' => 'Full Width' ),
					array( 'value' => 'lb_f', 'name' => 'Left Sidebar + Big Image' ),
					array( 'value' => 'lb_m', 'name' => 'Left Sidebar + Medium Image' ),
					array( 'value' => 'lb_s', 'name' => 'Left Sidebar + Small Image' ),
					array( 'value' => 'rb_f', 'name' => 'Right Sidebar + Big Image' ),
					array( 'value' => 'rb_m', 'name' => 'Right Sidebar + Medium Image' ),
					array( 'value' => 'rb_s', 'name' => 'Right Sidebar + Small Image' ),
					array( 'value' => 'ds', 'name' => 'Dual Sidebar' ),
				),
			),
			array(
				'name'    => 'Portfolio Layout',
				'desc'    => '',
				'id'      => $prefix .'portfolio',
				'type'    => 'select',
				'std'     => 'fw_4',
				'options' => array(					
					array( 'value' => 'fw_1', 'name' => 'Full Width + 1 Column' ),
					array( 'value' => 'fw_2', 'name' => 'Full Width + 2 Columns' ),
					array( 'value' => 'fw_3', 'name' => 'Full Width + 3 Columns' ),
					array( 'value' => 'fw_4', 'name' => 'Full Width + 4 Columns' ),					
					array( 'value' => 'lb_1', 'name' => 'Left Sidebar + 1 Column' ),
					array( 'value' => 'lb_2', 'name' => 'Left Sidebar + 2 Columns' ),
					array( 'value' => 'lb_3', 'name' => 'Left Sidebar + 3 Columns' ),					
					array( 'value' => 'rb_1', 'name' => 'Right Sidebar + 1 Column' ),
					array( 'value' => 'rb_2', 'name' => 'Right Sidebar + 2 Columns' ),
					array( 'value' => 'rb_3', 'name' => 'Right Sidebar + 3 Columns' ),
				),
			),
		),
	);

	$meta_boxes[] = array(
		'id'         => 'page_portfolio_metabox',
		'title'      => 'Portfolio Layout Options',
		'pages'      => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Display per Page',
				'desc'    => '',
				'id'      => $prefix .'portfolio_num',
				'type'    => 'select',
				'std'     => '10',
				'options' => array(
					array( 'value' => '1', 'name' => '1' ),
					array( 'value' => '2', 'name' => '2' ),
					array( 'value' => '3', 'name' => '3' ),
					array( 'value' => '4', 'name' => '4' ),
					array( 'value' => '5', 'name' => '5' ),
					array( 'value' => '6', 'name' => '6' ),
					array( 'value' => '7', 'name' => '7' ),
					array( 'value' => '8', 'name' => '8' ),
					array( 'value' => '9', 'name' => '9' ),
					array( 'value' => '10', 'name' => '10' ),
					array( 'value' => '11', 'name' => '11' ),
					array( 'value' => '12', 'name' => '12' ),
					array( 'value' => '13', 'name' => '13' ),
					array( 'value' => '14', 'name' => '14' ),
					array( 'value' => '15', 'name' => '15' ),
					array( 'value' => '16', 'name' => '16' ),
					array( 'value' => '17', 'name' => '17' ),
					array( 'value' => '18', 'name' => '18' ),
					array( 'value' => '19', 'name' => '19' ),
					array( 'value' => '20', 'name' => '20' ),
				),
			),
			array(
				'name'    => 'JQuery Filter',
				'desc'    => '',
				'id'      => $prefix .'portfolio_filter',
				'type'    => 'select',
				'std'     => '1',
				'options' => array(
					array( 'value' => '0', 'name' => 'Disable' ),
					array( 'value' => '1', 'name' => 'Enable' ),
				),
			),
			array(
				'name'    => 'Gallery Style',
				'desc'    => '',
				'id'      => $prefix .'portfolio_gallery',
				'type'    => 'select',
				'std'     => '0',
				'options' => array(
					array( 'value' => '0', 'name' => 'Disable' ),
					array( 'value' => '1', 'name' => 'Enable' ),
				),
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'page_homepage_metabox',
		'title'      => 'Home Page Layout Options',
		'pages'      => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Select Top Slider',
				'desc'    => '',
				'id'      => $prefix .'home_slider',
				'type'    => 'select',
				'std'     => 'flex',
				'options' => array(
					array( 'value' => 'circle', 'name' => 'Circle Slider' ),
					array( 'value' => 'flex', 'name' => 'Flex Slider (Responsive)' ),
					array( 'value' => 'kwicks', 'name' => 'Kwicks Slider' ),
					array( 'value' => 'nivo', 'name' => 'Nivo Slider' ),
					array( 'value' => 'slidesjs', 'name' => 'SlidesJS Slider' ),
				),
			),
		),
	);

	return $meta_boxes;
}

function portfolio_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_portfolio_';

	$meta_boxes[] = array(
		'id'         => 'portfolio_metabox',
		'title'      => 'Portfolio Options',
		'pages'      => array( 'portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(	
			array(
				'name' => 'Client Name',
				'desc' => 'Clients name of portfolio.',
				'id'   => $prefix .'client',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Website URL',
				'desc' => 'A website to actual portfolio url.',
				'id'   => $prefix .'website',
				'type' => 'text_medium',
			),
			array(
				'name'    => 'Portfolio Type',
				'desc'    => '',
				'id'      => $prefix .'type',
				'type'    => 'select',
				'options' => array(
					array( 'value' => 'image', 'name' => 'Image' ),
					array( 'value' => 'video', 'name' => 'Video' ),
					array( 'value' => 'slider', 'name' => 'Slider' ),
				),
			),
			array(
				'name' => 'Image URL',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix .'image',
				'type' => 'image',
			),
			array(
				'name' 		=> 'Thumbnail URL',
				'desc' 		=> 'Upload an image or enter an URL.',
				'id'   		=> $prefix .'video_thumb',
				'type' 		=> 'image',
			),
			array(
				'name' 		=> 'Video URL',
				'desc' 		=> 'Enter an video URL. This theme only supports video from Youtube and Vimeo.',
				'id'   		=> $prefix .'video',
				'type' 		=> 'text_large',
			),
			array(
				'name' => 'Image Slider 1',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix .'image1',
				'type' => 'image',
			),
			array(
				'name' => 'Image Slider 2',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix .'image2',
				'type' => 'image',
			),
			array(
				'name' => 'Image Slider 3',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix .'image3',
				'type' => 'image',
			),
			array(
				'name' => 'Image Slider 4',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix .'image4',
				'type' => 'image',
			),
			array(
				'name' => 'Image Slider 5',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix .'image5',
				'type' => 'image',
			),
		),
	);

	return $meta_boxes;
}

function pricing_table_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_pricing_table_';

	$meta_boxes[] = array(
		'id'         => 'pricing_table_metabox',
		'title'      => 'Pricing Table Options',
		'pages'      => array( 'pricing-table' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(	
			array(
				'name' => 'Price Tag',
				'desc' => '',
				'id'   => $prefix .'pricetag',
				'type' => 'text_small',
			),
			array(
				'name'    => 'Price Type',
				'desc'    => '',
				'id'      => $prefix .'type',
				'type'    => 'select',
				'options' => array(
					array( 'value' => '0', 'name' => 'Normal' ),
					array( 'value' => '1', 'name' => 'Free' ),
					array( 'value' => '2', 'name' => 'Best Value' ),
				),
			),	
			array(
				'name' => 'Button URL',
				'desc' => '',
				'id'   => $prefix .'url',
				'type' => 'text_large',
				'std'  => '#',
			),
			array(
				'name' => 'Summary',
				'desc' => '',
				'id'   => $prefix .'summary',
				'type' => 'text_large',
			),
		),
	);

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );

function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once SLICETHEME_ADMIN .'/metaboxes/init.php';

}
