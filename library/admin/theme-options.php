<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

/*-----------------------------------------------------------------------------------*/
/* TO DO: Add options/functions that use these */
/*-----------------------------------------------------------------------------------*/

//General
$number_10 = array('Select',1,2,3,4,5,6,7,8,9,10);
$number_15 = array('Select',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
$number_20 = array('Select',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);

//Style Layout
$style_layout[0] = ADMIN_DIR ."images/style-wide.png";
$style_layout[1] = ADMIN_DIR ."images/style-narrow.png";

//Style Skins
$style_skins_url = SLICETHEME_BASE_URL .'/css/skins/thumb/';
$style_skins_path = SLICETHEME_BASE .'/css/skins/';
$style_skins = array();
$style_skins[''] = $style_skins_url . "default.png";
if ( is_dir($style_skins_path) ) {
    if ($style_skins_dir = opendir($style_skins_path) ) { 
        while ( ($style_skins_file = readdir($style_skins_dir)) !== false ) {
            if ( stristr($style_skins_file, ".css") !== false ) {
                $style_skins[$style_skins_file] = $style_skins_url . str_replace("css", "png", $style_skins_file);
            }
        }    
    }
}

//Style Pattern
$style_pattern_url = SLICETHEME_BASE_URL .'/images/pattern/';
$style_pattern_path = SLICETHEME_BASE .'/images/pattern/';
$style_pattern = array();
if ( is_dir($style_pattern_path) ) {
    if ($style_pattern_dir = opendir($style_pattern_path) ) { 
        while ( ($style_pattern_file = readdir($style_pattern_dir)) !== false ) {
            if ( stristr($style_pattern_file, ".png") !== false ) {
                if ( preg_match('/dark/is', $style_pattern_file) ) {
					$style_pattern['Pattern Dark'][$style_pattern_file] = $style_pattern_url . $style_pattern_file;
				}
				if ( preg_match('/light/is', $style_pattern_file) ) {
					$style_pattern['Pattern Light'][$style_pattern_file] = $style_pattern_url . $style_pattern_file;
				}
				if ( preg_match('/transparant/is', $style_pattern_file) ) {
					$style_pattern['Pattern Transparent'][$style_pattern_file] = $style_pattern_url . $style_pattern_file;
				}
            }
        }    
    }
}

//Font Size
$style_font_size = array();
for ( $i = 9; $i <= 40; $i++ ) {
	$size = $i."px";
	$style_font_size[$size] = $size;
}

require_once (ADMIN_PATH . 'theme-array.php'); // Array data for option panel


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


//General Settings
$of_options[] = array(	"name" => "General Settings",
						"type" => "heading");
						
						$of_options[] = array(	"name" => "Website Logo",
												"desc" => "Upload a custom logo for your Website.",
												"id" => "site_logo",
												"type" => "upload");
						
						$of_options[] = array(	"name" => "Custom Favicon",
												"desc" => "Upload a 16px x 16px PNG/GIF image that will represent your website's favicon.",
												"id" => "site_favicon",
												"type" => "upload");
						
						$of_options[] = array(	"name" => "Tracking Code",
												"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
												"id" => "site_tracking",
												"type" => "textarea");


//Styling Settings
$of_options[] = array(	"name" => "Styling Settings",
						"type" => "heading");
						
						$of_options[] = array(	"name" => "Layout Style",
												"desc" => "Select the style to use for the layout.",
												"id" => "style_layout",
												"type" => "images",
												"options" => $style_layout);
						
						$of_options[] = array(	"name" => "Pre-Defined Skins",
												"desc" => "Select a color scheme for your website.",
												"id" => "style_skin",
												"type" => "images",
												"options" => $style_skins);
						
						$of_options[] = array(	"name" => "Custom Color Scheme",
												"desc" => "Please check this option if you want to enable custom color scheme.",
												"id" => "style_custom",
												"type" => "checkbox");
						
						$of_options[] = array(	"name" => "Background Color",
												"desc" => "Specify the background color.",
												"id" => "style_custom_bg",
												"type" => "color");
						
						$of_options[] = array(	"name" => "Header/Footer Line Color",
												"desc" => "Specify the border line color.",
												"id" => "style_custom_line_color",
												"type" => "color");
						
						$of_options[] = array(	"name" => "General Font Color",
												"desc" => "Specify the body font color.",
												"id" => "style_custom_font_color",
												"type" => "color");
						
						$of_options[] = array(	"name" => "Heading Font Color",
												"desc" => "Specify the heading h1-h6 font color.",
												"id" => "style_custom_font_color_heading",
												"type" => "color");
						
						$of_options[] = array(	"name" => "General Link Color",
												"desc" => "Specify the link color.",
												"id" => "style_custom_link_color",
												"type" => "color");
						
						$of_options[] = array(	"name" => "General Link Hover Color",
												"desc" => "Specify the link hover color.",
												"id" => "style_custom_link_color_hover",
												"type" => "color");
						
						$of_options[] = array(	"name" => "Heading Link Color",
												"desc" => "Specify the title link color.",
												"id" => "style_custom_link_color_title",
												"type" => "color");
						
						$of_options[] = array(	"name" => "Heading Link Hover Color",
												"desc" => "Specify the title link hover color.",
												"id" => "style_custom_link_color_title_hover",
												"type" => "color");
												
												//
						
						$of_options[] = array(	"name" => "Background Type",
												"desc" => "Select the type to use for the background.",
												"id" => "style_bg_type",
												"type" => "select",
												"options" => array(0 => "None", 1 => "Pattern", 2 => "Custom Image"));
						
						$of_options[] = array(	"name" => "Choose Background Pattern",
												"desc" => "Select a background pattern for your website.",
												"id" => "style_bg_pattern",
												"type" => "st_images",
												"options" => $style_pattern);
						
						$of_options[] = array(	"name" => "Custom Background",
												"desc" => "Upload a custom background for your Website.",
												"id" => "style_bg_image",
												"type" => "media");
						
						$of_options[] = array(	"name" => "Custom CSS",
												"desc" => "Use this text area if you wish to insert custom CSS into your website.",
												"id" => "style_css",
												"type" => "textarea");


//Font Settings
$of_options[] = array(	"name" => "Font Settings",
						"type" => "heading");
						
			$of_options[] = array(	"type" => "info",
									"std" => "Heading Typography");
						
						$of_options[] = array(	"name" => "Font Type",
												"desc" => "Select the type to use for the fonts.",
												"id" => "style_heading_font_type",
												"type" => "select",
												"options" => array(0 => "Web Fonts Family", 1 => "Google Fonts", 2 => "Cufon"));
						
						$of_options[] = array(	"name" => "",
												"desc" => "Web fonts family",
												"id" => "style_heading_font_std",
												"type" => "select",
												"options" => $style_font_standar);
						
						$of_options[] = array(	"name" => "",
												"desc" => "Google fonts",
												"id" => "style_heading_font_google",
												"type" => "select",
												"options" => $style_font_google);
						
						$of_options[] = array(	"name" => "",
												"desc" => "Cufon",
												"id" => "style_heading_font_cufon",
												"type" => "select",
												"options" => $style_font_cufon);
						
						$of_options[] = array(	"name" => "H1 Font Size",
												"desc" => "Specify the H1 font size.",
												"id" => "style_h1_size",
												"type" => "select",
												"std" => "24px",
												"options" => $style_font_size);
						
						$of_options[] = array(	"name" => "H2 Font Size",
												"desc" => "Specify the H2 font size.",
												"id" => "style_h2_size",
												"type" => "select",
												"std" => "20px",
												"options" => $style_font_size);
						
						$of_options[] = array(	"name" => "H3 Font Size",
												"desc" => "Specify the H3 font size.",
												"id" => "style_h3_size",
												"type" => "select",
												"std" => "18px",
												"options" => $style_font_size);
						
						$of_options[] = array(	"name" => "H4 Font Size",
												"desc" => "Specify the H4 font size.",
												"id" => "style_h4_size",
												"type" => "select",
												"std" => "16px",
												"options" => $style_font_size);
						
						$of_options[] = array(	"name" => "H5 Font Size",
												"desc" => "Specify the H5 font size.",
												"id" => "style_h5_size",
												"type" => "select",
												"std" => "14px",
												"options" => $style_font_size);
						
						$of_options[] = array(	"name" => "H6 Font Size",
												"desc" => "Specify the H6 font size.",
												"id" => "style_h6_size",
												"type" => "select",
												"std" => "12px",
												"options" => $style_font_size);
						
			$of_options[] = array(	"type" => "info",
									"std" => "Menu Navigation Typography");
						
						$of_options[] = array(	"name" => "Font Type",
												"desc" => "Select the type to use for the fonts.",
												"id" => "style_menu_font_type",
												"type" => "select",
												"options" => array(0 => "Web Fonts Family", 1 => "Google Fonts"));
						
						$of_options[] = array(	"name" => "",
												"desc" => "Web fonts family",
												"id" => "style_menu_font_std",
												"type" => "select",
												"options" => $style_font_standar);
						
						$of_options[] = array(	"name" => "",
												"desc" => "Google fonts",
												"id" => "style_menu_font_google",
												"type" => "select",
												"options" => $style_font_google);
						
						$of_options[] = array(	"name" => "Font Size",
												"desc" => "Specify the menu font size.",
												"id" => "style_menu_font_size",
												"type" => "select",
												"std" => "12px",
												"options" => $style_font_size);
						
			$of_options[] = array(	"type" => "info",
									"std" => "Body Content Typography");
						
						$of_options[] = array(	"name" => "Font Type",
												"desc" => "Select the type to use for the fonts.",
												"id" => "style_body_font_type",
												"type" => "select",
												"options" => array(0 => "Web Fonts Family", 1 => "Google Fonts"));
						
						$of_options[] = array(	"name" => "",
												"desc" => "Web fonts family",
												"id" => "style_body_font_std",
												"type" => "select",
												"options" => $style_font_standar);
						
						$of_options[] = array(	"name" => "",
												"desc" => "Google fonts",
												"id" => "style_body_font_google",
												"type" => "select",
												"options" => $style_font_google);
						
						$of_options[] = array(	"name" => "Font Size",
												"desc" => "Specify the body font size.",
												"id" => "style_body_font_size",
												"type" => "select",
												"std" => "12px",
												"options" => $style_font_size);


//Slider Settings
$of_options[] = array(	"name" => "Slider Settings",
						"type" => "heading");
						
			$of_options[] = array(	"type" => "info",
									"std" => "Circle Slider");
						
						$of_options[] = array(	"name" => "Current Text",
												"desc" => "Currently viewing text.",
												"id" => "circle_current_text",
												"type" => "text",
												"std" => "Currently Viewing");
						
						$of_options[] = array(	"name" => "Next Text",
												"desc" => "Next image text.",
												"id" => "circle_next_text",
												"type" => "text",
												"std" => "Next");
						
						$of_options[] = array(	"name" => "Previous Text",
												"desc" => "Previous image text.",
												"id" => "circle_previous_text",
												"type" => "text",
												"std" => "Previous");
						
			$of_options[] = array(	"type" => "info",
									"std" => "Flex Slider");
						
						$of_options[] = array(	"name" => "Slider Effects",
												"desc" => "Please select slider effect for your slideshow.",
												"id" => "flex_animation",
												"type" => "select",
												"std" => "fade",
												"options" => array("fade" => "fade", "slide" => "slide"));
						
						$of_options[] = array(	"name" => "Slideshow Speed",
												"desc" => "Set the speed of the slideshow cycling.",
												"id" => "flex_slideshowSpeed",
												"type" => "text",
												"std" => "7000");
						
						$of_options[] = array(	"name" => "Animation Duration",
												"desc" => "Set the speed of animations.",
												"id" => "flex_animationDuration",
												"type" => "text",
												"std" => "600");
						
						$of_options[] = array(	"name" => "Next & Prev Navigation",
												"desc" => "Choose if you want to show next & prev navigation.",
												"id" => "flex_directionNav",
												"type" => "select",
												"std" => "true",
												"options" => array("true" => "Yes", "false" => "No"));
						
						$of_options[] = array(	"name" => "Enable Bullets",
												"desc" => "Choose if you want to enable bullets navigation.",
												"id" => "flex_controlNav",
												"type" => "select",
												"std" => "false",
												"options" => array("true" => "Yes", "false" => "No"));
						
						$of_options[] = array(	"name" => "Pause On Hover",
												"desc" => "Choose if you want to pause slider only on hover.",
												"id" => "flex_pauseOnHover",
												"type" => "select",
												"std" => "true",
												"options" => array("true" => "Yes", "false" => "No"));
						
			$of_options[] = array(	"type" => "info",
									"std" => "Kwicks Slider");
						
						$of_options[] = array(	"name" => "Slideshow Speed",
												"desc" => "Set the speed of the slideshow cycling.",
												"id" => "kwicks_duration",
												"type" => "text",
												"std" => "200");
						
			$of_options[] = array(	"type" => "info",
									"std" => "Nivo Slider");
						
						$of_options[] = array(	"name" => "Slider Effects",
												"desc" => "Please select slider effect for your slideshow.",
												"id" => "nivo_effect",
												"type" => "select",
												"std" => "random",
												"options" => $nivo_effects);
						
						$of_options[] = array(	"name" => "Animation Speed",
												"desc" => "This is the animation speed during the change of each slide.",
												"id" => "nivo_animSpeed",
												"type" => "text",
												"std" => "500");
						
						$of_options[] = array(	"name" => "Pause Time",
												"desc" => "This option is the pause time of each slider.",
												"id" => "nivo_pauseTime",
												"type" => "text",
												"std" => "3000");
						
						$of_options[] = array(	"name" => "Next & Prev Navigation",
												"desc" => "Choose if you want to show next & prev navigation.",
												"id" => "nivo_directionNav",
												"type" => "select",
												"std" => "true",
												"options" => array("true" => "Yes", "false" => "No"));
						
						$of_options[] = array(	"name" => "Next & Prev Navigation Only on Hover",
												"desc" => "Choose if you want to show next & prev navigation only on hover",
												"id" => "nivo_directionNavHide",
												"type" => "select",
												"std" => "true",
												"options" => array("true" => "Yes", "false" => "No"));
						
						$of_options[] = array(	"name" => "Enable Bullets",
												"desc" => "Choose if you want to enable bullets navigation.",
												"id" => "nivo_controlNav",
												"type" => "select",
												"std" => "false",
												"options" => array("true" => "Yes", "false" => "No"));
						
						$of_options[] = array(	"name" => "Pause On Hover",
												"desc" => "Choose if you want to pause slider only on hover.",
												"id" => "nivo_pauseOnHover",
												"type" => "select",
												"std" => "true",
												"options" => array("true" => "Yes", "false" => "No"));
						
			$of_options[] = array(	"type" => "info",
									"std" => "SlidesJS Slider");
						
						$of_options[] = array(	"name" => "Slider Effects",
												"desc" => "Please select slider effect for your slideshow.",
												"id" => "slidesjs_effect",
												"type" => "select",
												"std" => "fade",
												"options" => array("fade" => "fade", "slide" => "slide"));
						
						$of_options[] = array(	"name" => "Play",
												"desc" => "This is the animation speed during the change of each slide.",
												"id" => "slidesjs_play",
												"type" => "text",
												"std" => "5000");
						
						$of_options[] = array(	"name" => "Pause",
												"desc" => "Pause slideshow on click of next/prev or pagination.",
												"id" => "slidesjs_pause",
												"type" => "text",
												"std" => "2500");
						
						$of_options[] = array(	"name" => "Next & Prev Navigation",
												"desc" => "Choose if you want to show next & prev navigation.",
												"id" => "slidesjs_generateNextPrev",
												"type" => "select",
												"std" => "true",
												"options" => array("true" => "Yes", "false" => "No"));
						
						$of_options[] = array(	"name" => "Enable Bullets",
												"desc" => "Choose if you want to enable bullets navigation.",
												"id" => "slidesjs_generatePagination",
												"type" => "select",
												"std" => "false",
												"options" => array("true" => "Yes", "false" => "No"));
						
						$of_options[] = array(	"name" => "Pause On Hover",
												"desc" => "Choose if you want to pause slider only on hover.",
												"id" => "slidesjs_hoverPause",
												"type" => "select",
												"std" => "true",
												"options" => array("true" => "Yes", "false" => "No"));


//Image Slider Settings
$of_options[] = array(	"name" => "Image Slideshow",
						"type" => "heading");
						
						$of_options[] = array(	"name" => "Circle Slider",
												"desc" => "Unlimited slider with drag and drop sortings.",
												"id" => "circle_image",
												"type" => "slider");
						
						$of_options[] = array(	"name" => "Kwicks Slider",
												"desc" => "Unlimited slider with drag and drop sortings.",
												"id" => "kwicks_image",
												"type" => "slider");
						
						$of_options[] = array(	"name" => "Flex Slider",
												"desc" => "Unlimited slider with drag and drop sortings.",
												"id" => "flex_image",
												"type" => "slider");
						
						$of_options[] = array(	"name" => "Nivo Slider",
												"desc" => "Unlimited slider with drag and drop sortings.",
												"id" => "nivo_image",
												"type" => "slider");
						
						$of_options[] = array(	"name" => "SlidesJS Slider",
												"desc" => "Unlimited slider with drag and drop sortings.",
												"id" => "slidesjs_image",
												"type" => "slider");


//Newsletter Settings
$of_options[] = array(	"name" => "Newsletter Settings",
						"type" => "heading");
						
						$of_options[] = array(	"name" => "Email Address",
												"desc" => "Please add your e-mail address here.",
												"id" => "newsletter_email",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Success Message",
												"desc" => "Customize the success message that will be displayed after the user submits the form.",
												"id" => "newsletter_success",
												"type" => "textarea");


//Contact Settings
$of_options[] = array(	"name" => "Contact Settings",
						"type" => "heading");
						
						$of_options[] = array(	"name" => "Email Address",
												"desc" => "Please add your e-mail address here.",
												"id" => "contact_email",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Success Message",
												"desc" => "Customize the success message that will be displayed after the user submits the form.",
												"id" => "contact_success",
												"type" => "textarea");
						
						$of_options[] = array(	"name" => "Website URL",
												"desc" => "Please add your website url here.",
												"id" => "contact_website",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Phone Number",
												"desc" => "Please add your phone number here.",
												"id" => "contact_phone",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Fax Number",
												"desc" => "Please add your fax number here.",
												"id" => "contact_fax",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Office Address",
												"desc" => "Please add your office address here.",
												"id" => "contact_address",
												"type" => "textarea");
						
			$of_options[] = array(	"type" => "info",
									"std" => "Google Map Settings");
						
						$of_options[] = array(	"name" => "Google Map API Key",
												"desc" => "Please add your google map API key here.",
												"id" => "contact_apikey",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Latitude",
												"desc" => "Please enter your latitude here.",
												"id" => "contact_latitude",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Longitude",
												"desc" => "Please enter your longitude here.",
												"id" => "contact_longitude",
												"type" => "text");


//Social Settings
$of_options[] = array(	"name" => "Social Settings",
						"type" => "heading");
						
						$of_options[] = array(	"name" => "Facebook URL",
												"desc" => "Enter the url to your facebook page.",
												"id" => "soc_facebook",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Google+ URL",
												"desc" => "Enter the url to your google+ page.",
												"id" => "soc_google",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Twitter URL",
												"desc" => "Enter the url to your twitter page.",
												"id" => "soc_twitter",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Youtube URL",
												"desc" => "Enter the url to your youtube page.",
												"id" => "soc_youtube",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Vimeo URL",
												"desc" => "Enter the url to your vimeo page.",
												"id" => "soc_vimeo",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Flickr URL",
												"desc" => "Enter the url to your flickr page.",
												"id" => "soc_flickr",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Picasa URL",
												"desc" => "Enter the url to your picasa page.",
												"id" => "soc_picasa",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Linkedin URL",
												"desc" => "Enter the url to your linkedin page.",
												"id" => "soc_linkedin",
												"type" => "text");
						
						$of_options[] = array(	"name" => "Dribbble URL",
												"desc" => "Enter the url to your dribbble page.",
												"id" => "soc_dribbble",
												"type" => "text");
						
						$of_options[] = array(	"name" => "RSS Feed URL",
												"desc" => "If you want to use a service like feedburner enter the feed url here. Otherwise the default wordpress feed url will be used.",
												"id" => "soc_rss",
												"type" => "text");


//Footer Settings
$of_options[] = array(	"name" => "Footer Settings",
						"type" => "heading");
						
						$of_options[] = array(	"name" => "Footer Text",
												"desc" => "Enter your footer text here.",
												"id" => "footer_copyright",
												"type" => "textarea");
						
						$of_options[] = array(	"name" => "Footer Columns",
												"desc" => "Select your footer columns.",
												"id" => "footer_columns",
												"type" => "select",
												"std" => "4",
												"options" => array(	1 => "1 Column", 
																	2 => "2 Columns", 
																	3 => "3 Columns", 
																	4 => "4 Columns"));

	}
}
?>
