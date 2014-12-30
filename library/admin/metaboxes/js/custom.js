jQuery(document).ready(function ($) {	
	
	/**
	 * Metabox of Page
	 */
	$('select#_page_template').each(function(){
		var page_option = $(this).children('option:selected').val();
		if (page_option == 'default') {
			$('#tr_page_default').show();
			$('#tr_page_blog').hide();
			$('#tr_page_portfolio').hide();
			$('#page_portfolio_metabox').hide();
			$('#page_homepage_metabox').hide();
		} else if (page_option == 'blog') {
			$('#tr_page_default').hide();
			$('#tr_page_blog').show();
			$('#tr_page_portfolio').hide();
			$('#page_portfolio_metabox').hide();
			$('#page_homepage_metabox').hide();
		} else if (page_option == 'portfolio') {
			$('#tr_page_default').hide();
			$('#tr_page_blog').hide();
			$('#tr_page_portfolio').show();
			$('#page_portfolio_metabox').show();
			$('#page_homepage_metabox').hide();
			
				$('select#_page_portfolio').each(function(){
					var port_option = $(this).children('option:selected').val();
					if (port_option == 'fw_1') {
						$('#tr_page_portfolio_gallery').hide();
					} else {
						$('#tr_page_portfolio_gallery').show();
					}
				});		
		} else if (page_option == 'homepage') {
			$('#tr_page_default').hide();
			$('#tr_page_blog').hide();
			$('#tr_page_portfolio').hide();
			$('#page_portfolio_metabox').hide();
			$('#page_homepage_metabox').show();
		} else {
			$('#tr_page_default').hide();
			$('#tr_page_blog').hide();
			$('#tr_page_portfolio').hide();
			$('#page_portfolio_metabox').hide();
			$('#page_homepage_metabox').hide();
		}
	});	
			
	$('select#_page_template').change(function(){
		var page_option = $(this).children('option:selected').val();
		if (page_option == 'default') {
			$('#tr_page_default').show();
			$('#tr_page_blog').hide();
			$('#tr_page_portfolio').hide();
			$('#page_portfolio_metabox').hide();
			$('#page_homepage_metabox').hide();
		} else if (page_option == 'blog') {
			$('#tr_page_default').hide();
			$('#tr_page_blog').show();
			$('#tr_page_portfolio').hide();
			$('#page_portfolio_metabox').hide();
			$('#page_homepage_metabox').hide();
		} else if (page_option == 'portfolio') {
			$('#tr_page_default').hide();
			$('#tr_page_blog').hide();
			$('#tr_page_portfolio').show();
			$('#page_portfolio_metabox').show();
			$('#page_homepage_metabox').hide();
		} else if (page_option == 'homepage') {
			$('#tr_page_default').hide();
			$('#tr_page_blog').hide();
			$('#tr_page_portfolio').hide();
			$('#page_portfolio_metabox').hide();
			$('#page_homepage_metabox').show();
		} else {
			$('#tr_page_default').hide();
			$('#tr_page_blog').hide();
			$('#tr_page_portfolio').hide();
			$('#page_portfolio_metabox').hide();
			$('#page_homepage_metabox').hide();
		}
	});	
			
	$('select#_page_portfolio').change(function(){
		var port_option = $(this).children('option:selected').val();
		if (port_option == 'fw_1') {
			$('#tr_page_portfolio_gallery').hide();
		} else {
			$('#tr_page_portfolio_gallery').show();
		}
	});
	/**
	 * End Page
	 */
	
	/**
	 * Metabox of Portfolio
	 */
	$('select#_portfolio_type').each(function(){
		var portfolio_option = $(this).children('option:selected').val();
		if (portfolio_option == 'image') {
			$('#tr_portfolio_image').show();
			$('#tr_portfolio_video').hide();
			$('#tr_portfolio_video_thumb').hide();
			$('#tr_portfolio_image1').hide();
			$('#tr_portfolio_image2').hide();
			$('#tr_portfolio_image3').hide();
			$('#tr_portfolio_image4').hide();
			$('#tr_portfolio_image5').hide();
		} else if (portfolio_option == 'video') {
			$('#tr_portfolio_image').hide();
			$('#tr_portfolio_video').show();
			$('#tr_portfolio_video_thumb').show();
			$('#tr_portfolio_image1').hide();
			$('#tr_portfolio_image2').hide();
			$('#tr_portfolio_image3').hide();
			$('#tr_portfolio_image4').hide();
			$('#tr_portfolio_image5').hide();
		} else if (portfolio_option == 'slider') {
			$('#tr_portfolio_image').hide();
			$('#tr_portfolio_video').hide();
			$('#tr_portfolio_video_thumb').hide();
			$('#tr_portfolio_image1').show();
			$('#tr_portfolio_image2').show();
			$('#tr_portfolio_image3').show();
			$('#tr_portfolio_image4').show();
			$('#tr_portfolio_image5').show();
		}
	});
	
	$('select#_portfolio_type').change(function(){
		var portfolio_option = $(this).children('option:selected').val();
		if (portfolio_option == 'image') {
			$('#tr_portfolio_image').show();
			$('#tr_portfolio_video').hide();
			$('#tr_portfolio_video_thumb').hide();
			$('#tr_portfolio_image1').hide();
			$('#tr_portfolio_image2').hide();
			$('#tr_portfolio_image3').hide();
			$('#tr_portfolio_image4').hide();
			$('#tr_portfolio_image5').hide();
		} else if (portfolio_option == 'video') {
			$('#tr_portfolio_image').hide();
			$('#tr_portfolio_video').show();
			$('#tr_portfolio_video_thumb').show();
			$('#tr_portfolio_image1').hide();
			$('#tr_portfolio_image2').hide();
			$('#tr_portfolio_image3').hide();
			$('#tr_portfolio_image4').hide();
			$('#tr_portfolio_image5').hide();
		} else if (portfolio_option == 'slider') {
			$('#tr_portfolio_image').hide();
			$('#tr_portfolio_video').hide();
			$('#tr_portfolio_video_thumb').hide();
			$('#tr_portfolio_image1').show();
			$('#tr_portfolio_image2').show();
			$('#tr_portfolio_image3').show();
			$('#tr_portfolio_image4').show();
			$('#tr_portfolio_image5').show();
		}
	});
	/**
	 * End Portfolio
	 */

});