jQuery(document).ready(function ($) {
	 	 
	/**
	 * Skins Type
	 */
	$('input#style_custom').each(function(){
		if ( $(this).attr('checked') ) {
			$('#section-style_custom_bg').show();
			$('#section-style_custom_line_color').show();
			$('#section-style_custom_font_color').show();
			$('#section-style_custom_font_color_heading').show();
			$('#section-style_custom_link_color').show();
			$('#section-style_custom_link_color_hover').show();
			$('#section-style_custom_link_color_title').show();
			$('#section-style_custom_link_color_title_hover').show();
		} else {
			$('#section-style_custom_bg').hide();
			$('#section-style_custom_line_color').hide();
			$('#section-style_custom_font_color').hide();
			$('#section-style_custom_font_color_heading').hide();
			$('#section-style_custom_link_color').hide();
			$('#section-style_custom_link_color_hover').hide();
			$('#section-style_custom_link_color_title').hide();
			$('#section-style_custom_link_color_title_hover').hide();
		}
	});
	
	$('input#style_custom').click(function(){
		if ( $(this).attr('checked') ) {		
			$('#section-style_custom_bg').fadeIn('slow');
			$('#section-style_custom_line_color').fadeIn('slow');
			$('#section-style_custom_font_color').fadeIn('slow');
			$('#section-style_custom_font_color_heading').fadeIn('slow');
			$('#section-style_custom_link_color').fadeIn('slow');
			$('#section-style_custom_link_color_hover').fadeIn('slow');
			$('#section-style_custom_link_color_title').fadeIn('slow');
			$('#section-style_custom_link_color_title_hover').fadeIn('slow');
		} else {
			$('#section-style_custom_bg').hide();
			$('#section-style_custom_line_color').hide();
			$('#section-style_custom_font_color').hide();
			$('#section-style_custom_font_color_heading').hide();
			$('#section-style_custom_link_color').hide();
			$('#section-style_custom_link_color_hover').hide();
			$('#section-style_custom_link_color_title').hide();
			$('#section-style_custom_link_color_title_hover').hide();
		}
	});
	/**
	 * End Skins
	 */
	 
	 	 
	/**
	 * Background Type
	 */
	$('select#style_bg_type').each(function(){
		var bg_option = $(this).children('option:selected').val();
		if (bg_option == '1') {
			$('#section-style_bg_pattern').show();
			$('#section-style_bg_image').hide();
		} else if (bg_option == '2') {
			$('#section-style_bg_pattern').hide();
			$('#section-style_bg_image').show();
		} else {
			$('#section-style_bg_pattern').hide();
			$('#section-style_bg_image').hide();
		}
	});
	
	$('select#style_bg_type').change(function(){
		var bg_option = $(this).children('option:selected').val();
		if (bg_option == '1') {
			$('#section-style_bg_pattern').fadeIn('slow');
			$('#section-style_bg_image').hide();
		} else if (bg_option == '2') {
			$('#section-style_bg_pattern').hide();
			$('#section-style_bg_image').fadeIn('slow');
		} else {
			$('#section-style_bg_pattern').hide();
			$('#section-style_bg_image').hide();
		}
	});
	/**
	 * End Background
	 */


	/**
	 * Heading Font Type
	 */
	$('select#style_heading_font_type').each(function(){
		var heading_option = $(this).children('option:selected').val();
		if (heading_option == '0') {
			$('#section-style_heading_font_std').show();
			$('#section-style_heading_font_google').hide();
			$('#section-style_heading_font_cufon').hide();
		} else if (heading_option == '1') {
			$('#section-style_heading_font_std').hide();
			$('#section-style_heading_font_google').show();
			$('#section-style_heading_font_cufon').hide();
		} else if (heading_option == '2') {
			$('#section-style_heading_font_std').hide();
			$('#section-style_heading_font_google').hide();
			$('#section-style_heading_font_cufon').show();
		}
	});
	
	$('select#style_heading_font_type').change(function(){
		var heading_option = $(this).children('option:selected').val();
		if (heading_option == '0') {
			$('#section-style_heading_font_std').fadeIn('slow');
			$('#section-style_heading_font_google').hide();
			$('#section-style_heading_font_cufon').hide();
		} else if (heading_option == '1') {
			$('#section-style_heading_font_std').hide();
			$('#section-style_heading_font_google').fadeIn('slow');
			$('#section-style_heading_font_cufon').hide();
		} else if (heading_option == '2') {
			$('#section-style_heading_font_std').hide();
			$('#section-style_heading_font_google').hide();
			$('#section-style_heading_font_cufon').fadeIn('slow');
		}
	});
	/**
	 * End Heading
	 */
	 
	 
	/**
	 * Menu Font Type
	 */
	$('select#style_menu_font_type').each(function(){
		var menu_option = $(this).children('option:selected').val();
		if (menu_option == '0') {
			$('#section-style_menu_font_std').show();
			$('#section-style_menu_font_google').hide();
		} else if (menu_option == '1') {
			$('#section-style_menu_font_std').hide();
			$('#section-style_menu_font_google').show();
		}
	});
	
	$('select#style_menu_font_type').change(function(){
		var menu_option = $(this).children('option:selected').val();
		if (menu_option == '0') {
			$('#section-style_menu_font_std').fadeIn('slow');
			$('#section-style_menu_font_google').hide();
		} else if (menu_option == '1') {
			$('#section-style_menu_font_std').hide();
			$('#section-style_menu_font_google').fadeIn('slow');
		}
	});
	/**
	 * End Menu
	 */
	 
	 
	/**
	 * Body Font Type
	 */
	$('select#style_body_font_type').each(function(){
		var body_option = $(this).children('option:selected').val();
		if (body_option == '0') {
			$('#section-style_body_font_std').fadeIn('slow');
			$('#section-style_body_font_google').hide();
		} else if (body_option == '1') {
			$('#section-style_body_font_std').hide();
			$('#section-style_body_font_google').fadeIn('slow');
		}
	});
	
	$('select#style_body_font_type').change(function(){
		var body_option = $(this).children('option:selected').val();
		if (body_option == '0') {
			$('#section-style_body_font_std').fadeIn('slow');
			$('#section-style_body_font_google').hide();
		} else if (body_option == '1') {
			$('#section-style_body_font_std').hide();
			$('#section-style_body_font_google').fadeIn('slow');
		}
	});
	/**
	 * End Body
	 */

});