<?php

$allowedColors = array('blue', 'slate', 'pink', 'lamb', 'red', 'green', 'terra', 'grey', 'brown', 'dark');
$allowedLists = array('circle', 'disc', 'arrow', 'star', 'diamond', 'errorli', 'info', 'locked', 'minus', 'newli', 
					'okay', 'pencil', 'refresh', 'small_blue', 'triangel', 'volume');

/*
Heading
*/
function slicetheme_heading($atts, $content = null, $code = '')
{
	$out = '<'. $code .'>'. slicetheme_do_shortcode($content) .'</'. $code .'>';
	return $out;
}
add_shortcode('h1', 'slicetheme_heading');
add_shortcode('h2', 'slicetheme_heading');
add_shortcode('h3', 'slicetheme_heading');
add_shortcode('h4', 'slicetheme_heading');
add_shortcode('h5', 'slicetheme_heading');
add_shortcode('h6', 'slicetheme_heading');


/*
Home Tagline
*/
function slicetheme_tagline($atts, $content = null)
{	
	$out = '<div class="st-tagline">'. slicetheme_do_shortcode($content, true) .'</div>';
	return $out;
}
add_shortcode('home_tagline', 'slicetheme_tagline');


/*
Home Featured
*/
function slicetheme_featured($atts, $content = null)
{	
	extract(shortcode_atts(array(
		'align' => ''
	), $atts));
	
	$out = '<div class="st-feature '.$align.' clearfix">'. slicetheme_do_shortcode($content) .'</div>';
	return $out;
}
add_shortcode('home_featured', 'slicetheme_featured');


/*
Blockquote
*/
function slicetheme_quote($atts, $content = null)
{
	extract(shortcode_atts(array(
		'align' => ''
	), $atts));
	
	$out = '<blockquote class="st-blockquote '. $align .'">'. slicetheme_do_shortcode($content, TRUE) .'</blockquote>';
	return $out;
}
add_shortcode('quote', 'slicetheme_quote');


/*
Divider
*/
function slicetheme_divider($atts, $content = null, $code = '')
{	
	$out = '<div class="st-'. $code .'"></div>';
	return $out;
}
add_shortcode('divider', 'slicetheme_divider');
add_shortcode('divider_hidden', 'slicetheme_divider');


/*
Space
*/
function slicetheme_space($atts, $content = null)
{	
	extract(shortcode_atts(array(
		'height' => '20'
	), $atts));
	
	$out = '<div style="clear: both; height:'. $height .'px;"></div>';
	
	return $out;
}
add_shortcode('space', 'slicetheme_space');


/*
Highlight
*/
function slicetheme_highlight($atts, $content = null)
{
	extract(shortcode_atts(array(
		'color' => ''
	), $atts));
	
	$out = '<span class="st-highlight '. $color .'">'. slicetheme_do_shortcode($content) .'</span>';
	return $out;
}
add_shortcode('highlight', 'slicetheme_highlight');


/*
Icon List
*/
function slicetheme_iconlist($atts, $content = null)
{	
	extract(shortcode_atts(array(
		'type' => ''
	), $atts));
	
	$out = '<div class="st-iconlist '. $type .'">'. slicetheme_do_shortcode($content) .'</div>';
	return $out;
}
add_shortcode('icon_list', 'slicetheme_iconlist');


/*
Dropcap
*/
function slicetheme_dropcaps($atts, $content = null, $code = '')
{	
	extract(shortcode_atts(array(
		'color' => ''
	), $atts));
	
	$out = '<span class="st-dropcaps '. $code .'">'. slicetheme_do_shortcode($content) .'</span>';
	return $out;
}
add_shortcode('dropcap1', 'slicetheme_dropcaps');
add_shortcode('dropcap2', 'slicetheme_dropcaps');
add_shortcode('dropcap3', 'slicetheme_dropcaps');
add_shortcode('dropcap4', 'slicetheme_dropcaps');


/*
Buttons
*/
function slicetheme_button($atts, $content = null, $code = '')
{	
	extract(shortcode_atts(array(
		'url' => '#',
		'color' => '',
		'align' => ''
	), $atts));
	
	$codetoclass = str_replace('button_', '', $code);
	
	$out = '<a href="'. $url .'" class="st-button '. $codetoclass .' '. $color .' '. $align .'">'. slicetheme_do_shortcode($content) .'</a>';
	return $out;
}
add_shortcode('button_small', 'slicetheme_button');
add_shortcode('button_medium', 'slicetheme_button');
add_shortcode('button_large', 'slicetheme_button');


/*
Buttons
*/
function slicetheme_button_icon($atts, $content = null)
{	
	extract(shortcode_atts(array(
		'type' => '',
		'url' => '#',
		'src' => '#'
	), $atts));
	
	switch ($type):
		case 'info':
		default:
			$out = '<a href="'. $url .'" class="st-button medium blue"><span><img src="'. SLICETHEME_IMAGES .'/icon/btn_info.png" alt="" /></span>'. slicetheme_do_shortcode($content) .'</a>';
		break;
		case 'success':
			$out = '<a href="'. $url .'" class="st-button medium green"><span><img src="'. SLICETHEME_IMAGES .'/icon/btn_ok.png" alt="" /></span>'. slicetheme_do_shortcode($content) .'</a>';
		break;
		case 'warning':
			$out = '<a href="'. $url .'" class="st-button medium orange"><span><img src="'. SLICETHEME_IMAGES .'/icon/btn_warning.png" alt="" /></span>'. slicetheme_do_shortcode($content) .'</a>';
		break;
		case 'error':
			$out = '<a href="'. $url .'" class="st-button medium red"><span><img src="'. SLICETHEME_IMAGES .'/icon/btn_error.png" alt="" /></span>'. slicetheme_do_shortcode($content) .'</a>';
		break;
		case 'add':
			$out = '<a href="'. $url .'" class="st-button medium black"><span><img src="'. SLICETHEME_IMAGES .'/icon/btn_add.png" alt="" /></span>'. slicetheme_do_shortcode($content) .'</a>';
		break;
		case 'download':
			$out = '<a href="'. $url .'" class="st-button medium green"><span><img src="'. SLICETHEME_IMAGES .'/icon/btn_down.png" alt="" /></span>'. slicetheme_do_shortcode($content) .'</a>';
		break;
		case 'upload':
			$out = '<a href="'. $url .'" class="st-button medium purple"><span><img src="'. SLICETHEME_IMAGES .'/icon/btn_up.png" alt="" /></span>'. slicetheme_do_shortcode($content) .'</a>';
		break;
		case 'help':
			$out = '<a href="'. $url .'" class="st-button medium dark"><span><img src="'. SLICETHEME_IMAGES .'/icon/btn_help.png" alt="" /></span>'. slicetheme_do_shortcode($content) .'</a>';
		break;
		case 'delete':
			$out = '<a href="'. $url .'" class="st-button medium terra"><span><img src="'. SLICETHEME_IMAGES .'/icon/btn_delete.png" alt="" /></span>'. slicetheme_do_shortcode($content) .'</a>';
		break;
		case 'custom':
			$out = '<a href="'. $url .'" class="st-button medium blue"><span><img src="'. $src .'" alt="" /></span>'. slicetheme_do_shortcode($content) .'</a>';
		break;
	endswitch;
	
	return $out;
}
add_shortcode('button_icon', 'slicetheme_button_icon');


/*
Icon Box
*/
function slicetheme_iconbox($atts, $content = null)
{
	extract(shortcode_atts(array(
		'title' => '',
		'src' => '#'
	), $atts));
	
	$out = '<div class="st-icon-box">';
	$out.= '<div class="st-icon-content">';
		
	if (!empty($src)) {
		$out.= '<div><img src="'. $src .'" alt="" /></div>';
	}
	if (!empty($title)) {
		$out.= '<h3>'. $title .'</h3>';
	}
	
	$out.= slicetheme_do_shortcode($content, TRUE);
	$out.= '</div>';
	$out.= '</div>';
	
	return $out;
}
add_shortcode('icon_box', 'slicetheme_iconbox');


/*
Alert Box
*/
function slicetheme_alerts($atts, $content = null, $code = '')
{	
	extract(shortcode_atts(array(
		'title' => ''
	), $atts));
	
	$codetoclass = str_replace('_box', '', $code);
	
	$out = '<div class="st-alert '. $codetoclass .'">';
	
	if ( !empty($title) ) {
		$out.= '<h3>'. $title .'</h3>';
	}
	
	$out.= slicetheme_do_shortcode($content, TRUE);
	$out.= '</div>';
	
	return $out;
}
add_shortcode('error_box', 'slicetheme_alerts');
add_shortcode('success_box', 'slicetheme_alerts');
add_shortcode('warning_box', 'slicetheme_alerts');
add_shortcode('info_box', 'slicetheme_alerts');
add_shortcode('help_box', 'slicetheme_alerts');


/*
Columns
*/
function slicetheme_columns($atts, $content = null, $code = '')
{	
	if ( preg_match('#_last#isU', $code) ) {
		$codetoclass = str_replace('_last', ' last', $code);
	}
	else {
		$codetoclass = $code;
	}
	
	$out = '<div class="st-columns '. $codetoclass .'">'. slicetheme_do_shortcode($content, TRUE) .'</div>';
	
	return $out;
}
add_shortcode('one_half', 'slicetheme_columns');
add_shortcode('one_third', 'slicetheme_columns');
add_shortcode('two_third', 'slicetheme_columns');
add_shortcode('one_fourth', 'slicetheme_columns');
add_shortcode('three_fourth', 'slicetheme_columns');
add_shortcode('one_fifth', 'slicetheme_columns');
add_shortcode('two_fifth', 'slicetheme_columns');
add_shortcode('three_fifth', 'slicetheme_columns');
add_shortcode('four_fifth', 'slicetheme_columns');
add_shortcode('one_half_last', 'slicetheme_columns');
add_shortcode('one_third_last', 'slicetheme_columns');
add_shortcode('two_third_last', 'slicetheme_columns');
add_shortcode('one_fourth_last', 'slicetheme_columns');
add_shortcode('three_fourth_last', 'slicetheme_columns');
add_shortcode('one_fifth_last', 'slicetheme_columns');
add_shortcode('two_fifth_last', 'slicetheme_columns');
add_shortcode('three_fifth_last', 'slicetheme_columns');
add_shortcode('four_fifth_last', 'slicetheme_columns');


/*
Tabs
*/	
function slicetheme_tabs($atts, $content = null)
{	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	}
	else
	{
		for ($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		$out = '<section class="st-tabs">';
		
		$out.= '<ul class="tabs">';
		for ($i = 0; $i < count($matches[0]); $i++) {
			$out.= '<li><a href="#tab-'. $i .'">'. $matches[3][$i]['title'] .'</a></li>';
		}
		$out.= '</ul>';
		
		$out.= '<div class="tabs-container">';
		for ($i = 0; $i < count($matches[0]); $i++) {
			$out.= '<div id="tab-'. $i .'" class="tabs-content">'. slicetheme_do_shortcode(trim($matches[5][$i]), TRUE) .'</div>';
		}
		$out.= '</div>';
		
		$out.= '</section>';
		
		return $out;
	}
}
add_shortcode('tabs', 'slicetheme_tabs');


/*
Accordions
*/
function slicetheme_accordions($atts, $content = null)
{
	extract(shortcode_atts(array(
		'keep_open' => 'false'
	), $atts));
	
	if (!preg_match_all("/(.?)\[(accordion)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	}
	else
	{
		for ($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		$attstoclass = ( $keep_open == 'false' ) ? 'accordion2' : 'accordion1';
		
		$out = '<div class="st-'. $attstoclass .' st-accordion">';
		
		$out.= '<ul>';
		for ($i = 0; $i < count($matches[0]); $i++) {
			$out.= '<li>';
			$out.= '<a href="#">'. $matches[3][$i]['title'] .'<span class="st-arrow">Open or Close</span></a>';
			$out.= '<div class="st-content">'. slicetheme_do_shortcode(trim($matches[5][$i]), TRUE) .'</div>';
			$out.= '</li>';
		}
		$out.= '</ul>';
		
		$out.= '</div>';
		
		return $out;
	}
}
add_shortcode('accordions', 'slicetheme_accordions');


/*
Sliders
*/	
function slicetheme_sliders($atts, $content = null)
{	
	if (!preg_match_all("/(.?)\[(slider)\b(.*?)(?:(\/))?\](?:(.+?)\[\/slider\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	}
	else
	{
		for ($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$out = '<div class="st-slider contentslider">';
		
		$out.= '<ul class="slides">';
		for ($i = 0; $i < count($matches[0]); $i++) {
			$out.= '<li>'. slicetheme_do_shortcode(trim($matches[5][$i]), TRUE) .'</li>';
		}
		$out.= '</ul>';
		
		$out.= '</div>';
		
		return $out;
	}
}
add_shortcode('sliders', 'slicetheme_sliders');


/*
Image
*/
function slicetheme_image($atts, $content = null)
{
	extract(shortcode_atts(array(
		'src' => '#',
		'width' => 'auto',
		'height' => 'auto',
		'alt' => '',
		'align' => '',
		'lightbox' => 'off'
	), $atts));
	
	$attstoclass = '';
	if ( $align == 'center' ) $attstoclass = 'aligncenter';
	if ( $align == 'left' ) $attstoclass = 'alignleft';
	if ( $align == 'right' ) $attstoclass = 'alignright';
	
	if ( $width <> 'auto' ) $width = $width.'px';
	if ( $height <> 'auto' ) $height = $height.'px';
	
	$out = '<img class="st-image '. $attstoclass .'" style="width: '. $width .'; height: '. $height .';" src="'. $src .'" alt="'. $alt .'" />';	
	
	if ($lightbox == 'on') {
		$out = '<a href="'. $src .'" title="'. $alt .'" rel="prettyPhoto">'. $out .'</a>';
	}
	
	return $out;
}
add_shortcode('image', 'slicetheme_image');


/*
Lighbox
*/
function slicetheme_lightbox($atts, $content = null)
{
	extract(shortcode_atts(array(
		'url' => '#',
		'title' => ''
	), $atts));

	$out = '<a href="'. $url .'" title="'. $title .'" rel="prettyPhoto">'. slicetheme_do_shortcode($content) .'</a>';
	
	return $out;
}
add_shortcode('lightbox', 'slicetheme_lightbox');


/*
Youtube
*/
function slicetheme_youtube($atts, $content = null)
{
	extract(shortcode_atts(array(
		'width' => '480',
		'height' => '320'
	), $atts));
	
	preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $content, $matches);
	
	$out = '<div class="st-video" style="max-width:'. $width .'px;">';
	//$out.= '<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'. $matches[1] .'&hd=1" style="width:'. $width .'px; height:'. $height .'px;">';
	//$out.= '<param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'. $matches[1] .'&hd=1" />';
	//$out.= '</object>';
	$out.= '<iframe src="http://www.youtube.com/v/'. $matches[1] .'?rel=0&hd=1" width="'. $width .'" height="'. $height .'" frameborder="0" allowfullscreen></iframe>';
	$out.= '</div>';
	
	return $out;
}
add_shortcode('youtube', 'slicetheme_youtube');


/*
Vimeo
*/
function slicetheme_vimeo($atts, $content = null)
{
	extract(shortcode_atts(array(
		'width' => '480',
		'height' => '320'
	), $atts));
	
	preg_match('/http:\/\/vimeo.com\/(\d+)$/', $content, $matches);
	
	$out = '<div class="st-video" style="max-width:'. $width .'px;">';
	$out.= '<iframe src="http://player.vimeo.com/video/'. $matches[1] .'?title=0&byline=0&portrait=0" width="'. $width .'" height="'. $height .'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
	$out.= '</div>';
	
	return $out;
}
add_shortcode('vimeo', 'slicetheme_vimeo');


/*
Code
*/
function slicetheme_code($atts, $content = null)
{
	$lines = explode("\n", $content);
	
	if (trim($lines[0]) == '') {
		array_shift($lines);
	}
	$n = count($lines);
	
	if (trim($lines[$n - 1]) == '') {
		array_pop($lines);
		--$n;
	}
	
	$out = '<div class="st-code">';
	for ($i = 0; $i < $n; ++$i) {
		if ( trim($lines[$i]) <> '<br />' ) $out.='<span>' . htmlentities(trim($lines[$i])) . '</span>';
	}
	$out.= '</div>';
	
	return $out;
}
add_shortcode('code', 'slicetheme_code');


/*
Pricing Table
*/
function slicetheme_pricelist($atts, $content = null)
{
	extract(shortcode_atts(array(
		'category' => '',
		'count' => 3,
		'currency' => '$',
		'billing_cycle' => __('Month', 'slicetheme')
	), $atts));
	
	$args = array(
		'posts_per_page' => $count,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'pricing-table-category',
				'field' => 'slug',
				'terms' => $category
			)
		)
	);
	$loop = new WP_Query($args);
	
	ob_start();
	
	if ($loop->have_posts()) :
	?>
	<!--   pricelist   -->
	<div id="pricing" class="c<?php echo $count; ?>">
		<div class="pricing-cell clearfix">
			<?php
			while ($loop->have_posts()) : $loop->the_post();
			$pricing_table_pricetag = get_post_meta(get_the_ID(), '_pricing_table_pricetag', TRUE);
			$pricing_table_type = get_post_meta(get_the_ID(), '_pricing_table_type', TRUE);
			$pricing_table_url = get_post_meta(get_the_ID(), '_pricing_table_url', TRUE);
			$pricing_table_summary = get_post_meta(get_the_ID(), '_pricing_table_summary', TRUE);
			
			switch($pricing_table_type):
				case '2':
					$pricing_type = 'best-buy';
					$pricing_label = '<span class="label-best">best value</span>';
				break;
				case '1':
					$pricing_type = 'free';
					$pricing_label = '<span class="label-free">free</span>';
				break;
				case '0':
					$pricing_type = '';
					$pricing_label = '';
				break;
			endswitch;
			
			$pricing_type = ($pricing_table_type == 2) ? 'best-buy' : ( ($pricing_table_type == 1) ? 'free' : '' );
			?>
			<!--   price-box   -->
			<div class="price-box <?php echo $pricing_type; ?>">
				<div class="package"><?php the_title(); ?></div>
				<div class="price">
					<span class="price1"><cite><?php echo $currency; ?></cite><?php echo $pricing_table_pricetag; ?></span>
					<span class="price2">/ <?php echo $billing_cycle; ?></span>
					<?php echo $pricing_label; ?>
				</div>
				<div class="price-feature">
					<?php the_content(); ?>
				</div>
				<div class="price-buy">
					<a href="<?php echo $pricing_table_url; ?>" class="button-buy"><?php _e('Sign Up Now', 'slicetheme'); ?></a>
					<p><?php echo $pricing_table_summary; ?></p>
				</div>
			</div>
			<!--   end price-box   -->
			<?php endwhile; ?>
		</div>
	</div>
	<!--   end pricelist   -->
	<?php
	wp_reset_postdata();
	endif;
	
	$out = ob_get_contents();
	ob_end_clean();
	
	return $out;
}
add_shortcode('price_list', 'slicetheme_pricelist');


/*
Recent Portfolio
*/
function slicetheme_portfolio($atts, $content = null)
{
	extract(shortcode_atts(array(
		'title' => '',
		'category' => '',		
		'item' => '8'
	), $atts));
	
	if ( !empty($category) ) {
		$args = array(
			'posts_per_page' => $item,
			'tax_query' => array(
				array(
					'taxonomy' => 'portfolio-category',
					'field' => 'id',
					'terms' => $category
				)
			)
		);
		$loop = new WP_Query($args);
	}
	else {
		$loop = new WP_Query('post_type=portfolio&posts_per_page='.$item); //orderby=ID&order=ASC&
	}
	
	ob_start();
	
	if ($loop->have_posts()) :
	
	if ( $title ) echo '<h3>'. $title .'</h3>'."\n";
	
	echo '<div class="st-portfolio portslider">';
		echo '<ul class="slides">';
			$c = 0;
			while ($loop->have_posts()) : $loop->the_post();
				
				$portfolio_type = get_post_meta(get_the_ID(), '_portfolio_type', TRUE);
				$portfolio_image = get_post_meta(get_the_ID(), '_portfolio_image', TRUE);
				$portfolio_video = get_post_meta(get_the_ID(), '_portfolio_video', TRUE);
				$portfolio_video_thumb = get_post_meta(get_the_ID(), '_portfolio_video_thumb', TRUE);
				$portfolio_slider = array();
				if ( $portfolio_image1 = get_post_meta(get_the_ID(), '_portfolio_image1', TRUE) ) $portfolio_slider[] = $portfolio_image1;
				if ( $portfolio_image2 = get_post_meta(get_the_ID(), '_portfolio_image2', TRUE) ) $portfolio_slider[] = $portfolio_image2;
				if ( $portfolio_image3 = get_post_meta(get_the_ID(), '_portfolio_image3', TRUE) ) $portfolio_slider[] = $portfolio_image3;
				if ( $portfolio_image4 = get_post_meta(get_the_ID(), '_portfolio_image4', TRUE) ) $portfolio_slider[] = $portfolio_image4;
				if ( $portfolio_image5 = get_post_meta(get_the_ID(), '_portfolio_image5', TRUE) ) $portfolio_slider[] = $portfolio_image5;
			
				if ($c % 4 == 0) echo '<li>';
				
				$column = (($c+1) % 4 == 0) ? 'one_fourth last' : 'one_fourth';
				
				echo '<section class="'. $column .'">';
					echo '<div class="entry_portfolio st-bg clearfix">';
						
						switch ($portfolio_type):
							case 'image':
								if ( !empty($portfolio_image) ) {
								echo '<div class="thumb">';
									echo '<a class="zoom" href="'. get_permalink() .'" title="'. get_the_title() .'">';
									slicetheme_timthumb($portfolio_image, 450, 240);
									echo '<span class="zoom-hover link"></span>';
									echo '</a>';
								echo '</div>';
								}
							break;
							case 'video':
								if ( !empty($portfolio_video_thumb) ) {
								echo '<div class="thumb">';
									echo '<a class="zoom" href="'. get_permalink() .'" title="'. get_the_title() .'">';
									slicetheme_timthumb($portfolio_video_thumb, 450, 240);
									echo '<span class="zoom-hover link"></span>';
									echo '</a>';
								echo '</div>';
								}
							break;
							case 'slider':
								if ( !empty($portfolio_slider) ) {
								echo '<div class="thumb">';
									echo '<a class="zoom" href="'. get_permalink() .'" title="'. get_the_title() .'">';
									slicetheme_timthumb($portfolio_slider[0], 450, 240);
									echo '<span class="zoom-hover link"></span>';
									echo '</a>';
								echo '</div>';
								}
							break;
						endswitch;
						
						echo '<div class="post-content">';
							echo '<h4 class="post-title"><a href="'. get_permalink() .'" title="'. get_the_title() .'">'. get_the_title() .'</a></h4>';
						echo '</div>';
						
					echo '</div>';
				echo '</section>';
				
				if ($c > 0 && ($c+1) % 4 == 0) echo '</li>';
				
				$c++;
			
			endwhile;
		echo '</ul>';
	echo '</div>';
	wp_reset_postdata();
	endif;
	
	$out = ob_get_contents();
	ob_end_clean();
	
	return $out;
}
add_shortcode('portfolio', 'slicetheme_portfolio');


/*
Recent Posts
*/
function slicetheme_blog($atts, $content = null)
{
	extract(shortcode_atts(array(
		'title' => '',
		'category' => '',		
		'item' => '8'
	), $atts));
	
	if ( !empty($category) ) {
		$loop = new WP_Query('cat='.$category.'&posts_per_page='.$item);
	}
	else {
		$loop = new WP_Query('&posts_per_page='.$item);
	}
	
	ob_start();
	
	if ($loop->have_posts()) :
	
	if ( $title ) echo '<h3>'. $title .'</h3>'."\n";
	
	echo '<div class="st-blog portslider">';
		echo '<ul class="slides">';
		$c = 0;
		while ($loop->have_posts()) : $loop->the_post();
			
			if ($c % 4 == 0) echo '<li>';
				
			$column = (($c+1) % 4 == 0) ? 'one_fourth last' : 'one_fourth';
			
			echo '<section class="'. $column .'">';
				echo '<div class="entry_portfolio st-bg clearfix">';
				
					if ( current_theme_supports('post-thumbnails') && has_post_thumbnail() ) {
						$thumbURL = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), '');
						$thumbURL = $thumbURL[0];
						
						echo '<div class="thumb">';
							echo '<a class="zoom" href="'. get_permalink() .'" title="'. get_the_title() .'">';
							slicetheme_timthumb($thumbURL, 450, 240);
							echo '<span class="zoom-hover link"></span>';
							echo '</a>';
						echo '</div>';						
					}
				
					echo '<div class="post-content">';
						echo '<h4 class="post-title"><a href="'. get_permalink() .'" title="'. get_the_title() .'">'. get_the_title() .'</a></h4>';
					echo '</div>';
			
				echo '</div>';
			echo '</section>';
			
			if ($c > 0 && ($c+1) % 4 == 0) echo '</li>';
				
			$c++;
			
		endwhile;
		echo '</ul>';
	echo '</div>';
	wp_reset_postdata();
	endif;
	
	$out = ob_get_contents();
	ob_end_clean();
	
	return $out;
}
add_shortcode('blog', 'slicetheme_blog');


/*
Formatter
*/
function slicetheme_do_shortcode($content, $autop = FALSE) 
{ 
	/*$content = do_shortcode( shortcode_unautop( $content ) ); 
	$content = preg_replace('#^<\/p>|^<br\s?\/?>|<p>$|<p>\s*(&nbsp;)?\s*<\/p>#', '', $content);*/
	
	$content = do_shortcode( $content ); 
	
	if ( $autop ) {
		$content = wpautop($content);
	}
	
	return $content;
}

function slicetheme_formatter($content)
{
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'slicetheme_formatter', 99);
add_filter('widget_text', 'slicetheme_formatter', 99);
