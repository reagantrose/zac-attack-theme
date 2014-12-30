<?php
$slice_url = dirname(__FILE__);
if ( preg_match('#wp-content#isU', $slice_url) ) {
	require_once '../../../../wp-load.php';  
}
else {
	require_once '../../../../../wp-load.php';  
}  
header("Content-type: text/css");

// Custom Skins
$style_custom = slicetheme_option('style_custom');
if ( $style_custom ) {
	//bg
	if ( $style_custom_bg = slicetheme_option('style_custom_bg') ) {
		echo "body { background-color: $style_custom_bg; }\n";
	}
	if ( $style_custom_line_color = slicetheme_option('style_custom_line_color') ) {
		echo ".social-wrapper, #nav ul, #footer { border-color: $style_custom_line_color; }\n";
	}
	//font
	if ( $style_custom_font_color = slicetheme_option('style_custom_font_color') ) {
		echo "body { color: $style_custom_font_color; }\n";
	}
	if ( $style_custom_font_color_heading = slicetheme_option('style_custom_font_color_heading') ) {
		echo "h1,h2,h3,h4,h5,h6,.post-title { color: $style_custom_font_color_heading; }\n";
	}
	//link
	if ( $style_custom_link_color = slicetheme_option('style_custom_link_color') ) {
		echo "a, .widget li a { color: $style_custom_link_color; }\n";
	}
	if ( $style_custom_link_color_hover = slicetheme_option('style_custom_link_color_hover') ) {
		echo "a:hover, .widget li a:hover { color: $style_custom_link_color_hover; }\n";
	}
	if ( $style_custom_link_color_title = slicetheme_option('style_custom_link_color_title') ) {
		echo ".post-title a { color: $style_custom_link_color_title; }\n";
	}	
	if ( $style_custom_link_color_title_hover = slicetheme_option('style_custom_link_color_title_hover') ) {
		echo ".post-title a:hover { color: $style_custom_link_color_title_hover; }\n";
	}
}

// Background Pattern/Image
$style_bg_type = slicetheme_option('style_bg_type');
if ( $style_bg_type == 1 ) {
	$style_bg_pattern = slicetheme_option('style_bg_pattern');
	echo "body { background-image: url('". SLICETHEME_IMAGES ."/pattern/". $style_bg_pattern ."'); }\n";
}
elseif ( $style_bg_type == 2 ) {
	$style_bg_image = slicetheme_option('style_bg_image');
	echo "body { background-image: url('". $style_bg_image ."'); }\n";
}

// Font Size
if ( $style_body_font_size = slicetheme_option('style_body_font_size') ) {
	echo "body { font-size: $style_body_font_size; }\n";
}
if ( $style_h1_size = slicetheme_option('style_h1_size') ) {
	echo "h1 { font-size: $style_h1_size; }\n";
}
if ( $style_h2_size = slicetheme_option('style_h2_size') ) {
	echo "h2 { font-size: $style_h2_size; }\n";
}
if ( $style_h3_size = slicetheme_option('style_h3_size') ) {
	echo "h3 { font-size: $style_h3_size; }\n";
}
if ( $style_h4_size = slicetheme_option('style_h4_size') ) {
	echo "h4 { font-size: $style_h4_size; }\n";
}
if ( $style_h5_size = slicetheme_option('style_h5_size') ) {
	echo "h5 { font-size: $style_h5_size; }\n";
}
if ( $style_h6_size = slicetheme_option('style_h6_size') ) {
	echo "h6 { font-size: $style_h6_size; }\n";
}
if ( $style_menu_font_size = slicetheme_option('style_menu_font_size') ) {
	echo "#nav a, #nav ul li a, #nav ul li li a { font-size: $style_menu_font_size; }\n";
}

// Body Font Family
if ( $style_body_font_type = slicetheme_option('style_body_font_type') ) {
	$style_body_font_std = slicetheme_option('style_body_font_std');
	$style_body_font_google = slicetheme_option('style_body_font_google');
	
	if ( $style_body_font_type == 0 ) {
		$font_family = $style_body_font_std;
	}
	elseif ( $style_body_font_type == 1 ) {
		$font_family = $style_body_font_google;
		if ( false !== ($p = strpos($font_family, ':')) ) $font_family = substr($font_family, 0, $p);
	}
	echo "body { font-family: '$font_family', Arial, serif; }\n";
}

// Heading Font Family
if ( $style_heading_font_type = slicetheme_option('style_heading_font_type') ) {
	$style_heading_font_std = slicetheme_option('style_heading_font_std');
	$style_heading_font_google = slicetheme_option('style_heading_font_google');
	
	$font_family = 'Arial';
	if ( $style_heading_font_type == 0 ) {
		$font_family = $style_heading_font_std;
	}
	elseif ( $style_heading_font_type == 1 ) {
		$font_family = $style_heading_font_google;
		if ( false !== ($p = strpos($font_family, ':')) ) $font_family = substr($font_family, 0, $p);
	}
	echo "h1,h2,h3,h4,h5,h6 { font-family: '$font_family', Arial, serif; }\n";
}

// Menu Font Family
if ( $style_menu_font_type = slicetheme_option('style_menu_font_type') ) {
	$style_menu_font_std = slicetheme_option('style_menu_font_std');
	$style_menu_font_google = slicetheme_option('style_menu_font_google');
	
	if ( $style_menu_font_type == 0 ) {
		$font_family = $style_menu_font_std;
	}
	elseif ( $style_menu_font_type == 1 ) {
		$font_family = $style_menu_font_google;
		if ( false !== ($p = strpos($font_family, ':')) ) $font_family = substr($font_family, 0, $p);
	}
	echo "#nav a { font-family: '$font_family', Arial, serif; }\n";
}

// Custom CSS
if ( $style_css = slicetheme_option('style_css') ) {
echo $style_css."\n";
}

?>