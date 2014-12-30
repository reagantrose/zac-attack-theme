<?php

//languages
load_theme_textdomain('slicetheme', TEMPLATEPATH . '/languages');
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

//
$di_options = get_option(OPTIONS);
function slicetheme_option($key, $default = '', $echo = FALSE)
{
	global $di_options;
	
	if ( is_array($key) ) {
		foreach ($key as $val) {
			$option[$val] = $di_options[$val];
		}		
		return $option;
	}
	
	$option = $di_options[$key];
	
	if ( empty($option) ) $option = $default;
	
	if ( $echo ) echo $option;
	
	return $option;
}

//
function slicetheme_styles()
{
	global $di_options, $post;
	
	wp_enqueue_style('base', SLICETHEME_CSS .'/base.css');
	wp_enqueue_style('skeleton', SLICETHEME_CSS .'/skeleton.css');
	wp_enqueue_style('layout', SLICETHEME_CSS .'/layout.css');
	wp_enqueue_style('prettyPhoto', SLICETHEME_CSS .'/prettyPhoto.css');
	
	wp_enqueue_style('flex-slider', SLICETHEME_JS .'/flex-slider/flexslider.css');
	
	// Slider
	$page_template = get_post_meta($post->ID, '_page_template', TRUE);
	if ( is_front_page() || $page_template == 'homepage') {
		$home_slider = get_post_meta($post->ID, '_page_home_slider', TRUE);
		
		switch ($home_slider):
			case 'circle':
				wp_enqueue_style('circle-slider', SLICETHEME_JS .'/circle-slider/circle-slideshow.css');
			break;
			case 'coin':
				wp_enqueue_style('coin-slider', SLICETHEME_JS .'/coin-slider/coin-slider.css');
			break;
			case 'kwicks':
				wp_enqueue_style('kwicks-slider', SLICETHEME_JS .'/kwicks-slider/kwicks-slider.css');
			break;
			case 'nivo':
				wp_enqueue_style('nivo-slider', SLICETHEME_JS .'/nivo-slider/nivo-slider.css');
			break;
			case 'slidesjs':
				wp_enqueue_style('slidesjs-slider', SLICETHEME_JS .'/slidesjs-slider/slideshow.css');
			break;
		endswitch;
	}
	
	// Body Font
	$style_body_font_type = slicetheme_option('style_body_font_type');
	if ( $style_body_font_type == 1 ) {
		$style_body_font_google = slicetheme_option('style_body_font_google');
		$font_name = str_replace(' ', '+', $style_body_font_google);
		
		wp_enqueue_style('body-google-font', 'http://fonts.googleapis.com/css?family='. $font_name);
	}
	
	// Heading Font
	$style_heading_font_type = slicetheme_option('style_heading_font_type');
	if ( $style_heading_font_type == 1 ) {
		$style_heading_font_google = slicetheme_option('style_heading_font_google');
		$font_name = str_replace(' ', '+', $style_heading_font_google);
		
		wp_enqueue_style('heading-google-font', 'http://fonts.googleapis.com/css?family='. $font_name);
	}
	
	// Menu Font
	$style_menu_font_type = slicetheme_option('style_menu_font_type');
	if ( $style_menu_font_type == 1 ) {
		$style_menu_font_google = slicetheme_option('style_menu_font_google');
		$font_name = str_replace(' ', '+', $style_menu_font_google);
		
		wp_enqueue_style('menu-google-font', 'http://fonts.googleapis.com/css?family='. $font_name);
	}
	
	if ( $style_skin = slicetheme_option('style_skin') ) {
		wp_enqueue_style('custom-skin', SLICETHEME_CSS .'/skins/'. $style_skin);
	}
	wp_enqueue_style('custom-style', SLICETHEME_CSS .'/custom.php');
}

//
function slicetheme_scripts()
{
	global $di_options, $post;
	
	wp_deregister_script('jquery');
    wp_enqueue_script('jquery', SLICETHEME_JS .'/jquery.min.js');
	wp_enqueue_script('modernizr', SLICETHEME_JS .'/modernizr.js');
	wp_enqueue_script('jquery-easing', SLICETHEME_JS .'/jquery.easing.1.3.js');
	wp_enqueue_script('jquery-prettyPhoto', SLICETHEME_JS .'/jquery.prettyPhoto.js');
	wp_enqueue_script('jquery-accordion', SLICETHEME_JS .'/jquery.accordion.js');
	wp_enqueue_script('jquery-quicksand', SLICETHEME_JS .'/jquery.quicksand.js');
	wp_enqueue_script('jquery-fitvids', SLICETHEME_JS .'/jquery.fitvids.js');
	
	wp_enqueue_script('flex-slider', SLICETHEME_JS .'/flex-slider/jquery.flexslider.js');
	
	// Slider
	$page_template = get_post_meta($post->ID, '_page_template', TRUE);
	if ( is_front_page() || $page_template == 'homepage') {
		$home_slider = get_post_meta($post->ID, '_page_home_slider', TRUE);
		
		switch ($home_slider):
			case 'circle':
				wp_enqueue_script('circle-slider-tmpl', SLICETHEME_JS .'/circle-slider/jquery.tmpl.min.js');
				wp_enqueue_script('circle-slider', SLICETHEME_JS .'/circle-slider/jquery.slideshow.js');
			break;
			case 'coin':
				wp_enqueue_script('coin-slider', SLICETHEME_JS .'/coin-slider/coin-slider.js');
			break;
			case 'kwicks':
				wp_enqueue_script('kwicks-slider', SLICETHEME_JS .'/kwicks-slider/jquery.kwicks-1.5.1.pack.js');
			break;
			case 'nivo':
				wp_enqueue_script('nivo-slider', SLICETHEME_JS .'/nivo-slider/nivo-slider.js');
			break;
			case 'slidesjs':
				wp_enqueue_script('slidesjs-slider', SLICETHEME_JS .'/slidesjs-slider/jquery.slideshow.js');
			break;
		endswitch;
	}
	
	if ( $page_template == 'contact' ) {
		if ( $contact_apikey = slicetheme_option('contact_apikey') ) {
			wp_enqueue_script('jquery-gmap-apis', 'https://maps.googleapis.com/maps/api/js?key='. $contact_apikey .'&sensor=false');
			wp_enqueue_script('jquery-gmap', SLICETHEME_JS .'/jquery.gmap.min.js');
			
			add_action('wp_head', 'slicetheme_print_gmap');
		}
	}
	
	// Heading Font
	$style_heading_font_type = slicetheme_option('style_heading_font_type');
	if ( $style_heading_font_type == 2 ) {
		$style_heading_font_cufon = slicetheme_option('style_heading_font_cufon');
		$font_name = str_replace(' ', '_', $style_heading_font_cufon);
		global $font_family; $font_family = $style_heading_font_cufon;
		
		wp_enqueue_script('cufon-yui', SLICETHEME_JS .'/cufon-yui.js');
		wp_enqueue_script('cufon-font', SLICETHEME_JS .'/fonts/'. $font_name .'.js');
		
		add_action('wp_head', 'slicetheme_print_cufon');
	}
	
	if ( is_singular() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script( 'comment-reply' ); 
	}
	
	wp_enqueue_script('custom-script', SLICETHEME_JS .'/scripts.js');
}

if ( !is_admin() ) {
	add_action('wp_print_styles', 'slicetheme_styles');
	add_action('wp_print_scripts', 'slicetheme_scripts');
}

//
function slicetheme_print_gmap()
{
	global $di_options;
	
	$contact_latitude = slicetheme_option('contact_latitude', '34.148007');
	$contact_longitude = slicetheme_option('contact_longitude', '-118.067842');
	
	?>
	<script type="text/javascript">
	$(function()
	{
		$("#contact_map").gMap({
			latitude: <?php echo $contact_latitude; ?>,
			longitude: <?php echo $contact_longitude; ?>,
			maptype: 'ROADMAP', // 'HYBRID', 'SATELLITE', 'ROADMAP' or 'TERRAIN'
			zoom: 14,
			markers: [
				{
					latitude: <?php echo $contact_latitude; ?>,
					longitude: <?php echo $contact_longitude; ?>
				}
			],
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: false,
				overviewMapControl: false
			}
		});

	});
	</script>
	<?php
}

//
function slicetheme_print_cufon()
{	
	global $font_family;
	
	?>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4,h5, .title, .widget-title, .post-title, .slide-title', { fontFamily: '<?php echo $font_family; ?>', hover: true });
	</script>
	<?php
}

//
function slicetheme_socials()
{
	$args = array('soc_facebook', 'soc_google', 'soc_twitter', 'soc_youtube', 'soc_vimeo', 'soc_flickr', 
				  'soc_picasa', 'soc_linkedin', 'soc_dribbble');
	
	$socials = slicetheme_option($args);
	
	foreach ($socials as $key => $social) {
		$name = str_replace('soc_', '', $key);
		if ( !empty($social) )
			echo '<a class="'. $key .'" href="'. $social .'" title="'. $name .'">
					<img src="'. SLICETHEME_IMAGES .'/social/'. $name .'.png"></a>'."\n";
	}
	
	echo '<a class="soc_rss" href="'. slicetheme_option('soc_rss', get_bloginfo('rss2_url')) .'" title="RSS">
			<img src="'. SLICETHEME_IMAGES .'/social/rss.png"></a>'."\n";
}

//
function slicetheme_excerpt($length = 35, $echo = FALSE)
{	
	global $post;
	
	$the_excerpt = strip_shortcodes( $post->post_content );
	$the_excerpt = str_replace(']]>', ']]&gt;', $the_excerpt);
	$the_excerpt = strip_tags($the_excerpt);
	$words = preg_split("/[\n\r\t ]+/", $the_excerpt, $length + 1, PREG_SPLIT_NO_EMPTY);
	if ( count($words) > $length ) {
		array_pop($words);
		$the_excerpt = implode(' ', $words);
		$the_excerpt = $the_excerpt . ' ...';
	} else {
		$the_excerpt = implode(' ', $words);
	}
	
	$the_excerpt = wpautop($the_excerpt);
	
	if ( $echo ) echo $the_excerpt;
	
	return $the_excerpt;
}

//
function slicetheme_timthumb($url = '', $width = 150, $height = 150, $title = '')
{	
	if ( empty($url) ) return;
	
	$out = '<img src="'. SLICETHEME_BASE_URL .'/timthumb.php?src='. $url .'&amp;w='. $width .'&amp;h='. $height .'&amp;zc=1" alt="'. $title .'" />';
	
	echo $out;
}

//
function slicetheme_video($video = '', $width = 480, $height = 320)
{
	if ( empty($video) ) return;
	
	$out = '<div style="max-width:'. $width .'px;">';
	if ( strpos($video,'youtube') ) {
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video, $matches);
		//$out = '<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'. $matches[1] .'&hd=1" style="width: '. $width .'px; height: '. $height .'px;">';
		//$out.= '<param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'. $matches[1] .'&hd=1" />';
		//$out.= '</object>';	
		$out.= '<iframe src="http://www.youtube.com/v/'. $matches[1] .'?rel=0&hd=1" width="'. $width .'" height="'. $height .'" frameborder="0" allowfullscreen></iframe>';
	} else {
		preg_match('/http:\/\/vimeo.com\/(\d+)$/', $video, $matches);
		$out.= '<iframe src="http://player.vimeo.com/video/'. $matches[1] .'?title=0&byline=0&portrait=0" width="'. $width .'" height="'. $height .'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
	}
	$out.= '</div>';
	
	echo $out;
}

//
function slicetheme_archive()
{
	/* category archive */ if (is_category()) { ?><h2 class="page-title"><?php _e('Archive for category:', 'slicetheme'); ?> <?php single_cat_title(); ?></h2>
	<?php
	/* tag archive */ } elseif( is_tag() ) { ?><h2 class="page-title"><?php _e('Post Tagged with:', 'slicetheme'); ?> &quot;<?php single_tag_title(); ?>&quot;</h2>
	<?php
	/* search archive */ } elseif( is_search() ) { ?><h2 class="page-title"><?php _e('Search Results for:', 'slicetheme'); ?> &quot;<?php echo get_search_query(); ?>&quot;</h2>
	<?php
	/* daily archive */ } elseif (is_day()) { ?><?php _e('Archive for', 'slicetheme'); ?> <?php the_time('F j, Y'); ?></h2>
	<?php
	/* monthly archive */ } elseif (is_month()) { ?><h2 class="page-title"><?php _e('Archive for', 'slicetheme'); ?> <?php the_time('F, Y'); ?></h2>
	<?php
	/* yearly archive */ } elseif (is_year()) { ?><h2 class="page-title"><?php _e('Archive for', 'slicetheme'); ?> <?php the_time('Y'); ?></h2>
	<?php
	/* author archive */ } elseif (is_author()) { ?><h2 class="page-title"><?php _e('Author Archive', 'slicetheme'); ?></h2>
	<?php
	/* paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><h2 class="page-title"><?php _e('Archives', 'slicetheme'); ?></h2>
	<?php
	/* 404 page */ } elseif (is_404()) { ?><h2 class="page-title"><?php _e('Page Not Found', 'slicetheme');?></h2><?php } else { echo '&nbsp;'; }
}

//
function slicetheme_breadcrumbs()
{ 
	$delimiter = '/';
	$name = 'Home';
	$currentBefore = '<span class="current">';
	$currentAfter = '</span>';
	
	if ( !is_home() && !is_front_page() || is_paged() ) {
	
		global $post;
		$home = get_bloginfo('url');
		echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
		
		if ( is_tax() ) {
			  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			  echo $currentBefore . $term->name . $currentAfter;
	
		} elseif ( is_category() ) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo $currentBefore . '';
			single_cat_title();
			echo '' . $currentAfter;
		
		} elseif ( is_day() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time('d') . $currentAfter;
		
		} elseif ( is_month() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time('F') . $currentAfter;
		
		} elseif ( is_year() ) {
			echo $currentBefore . get_the_time('Y') . $currentAfter;
		
		} elseif ( is_single() ) {
			$postType = get_post_type();
			if ( $postType == 'post' ) {
			$cat = get_the_category(); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			}
			elseif($postType == 'portfolio')
			{
			$terms = get_the_term_list($post->ID, 'portfolio-category', '', '###', '');
			$terms = explode('###', $terms);
			echo $terms[0]. ' ' . $delimiter . ' ';
			}
			echo $currentBefore;
			the_title();
			echo $currentAfter;
		
		} elseif ( is_page() && !$post->post_parent ) {
			echo $currentBefore;
			the_title();
			echo $currentAfter;
		
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $currentBefore;
			the_title();
			echo $currentAfter;
		
		} elseif ( is_search() ) {
			echo $currentBefore . __('Search Results for:', 'slicetheme'). ' &quot;' . get_search_query() . '&quot;' . $currentAfter;
		
		} elseif ( is_tag() ) {
			echo $currentBefore . __('Post Tagged with:', 'slicetheme'). ' &quot;';
			single_tag_title();
			echo '&quot;' . $currentAfter;
		
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $currentBefore . __('Author Archive', 'slicetheme') . $currentAfter;
		
		} elseif ( is_404() ) {
			echo $currentBefore . __('Page Not Found', 'slicetheme') . $currentAfter;
		
		}
		
		if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		echo __('Page') . ' ' . get_query_var('paged');
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
	
	}
}

//
function slicetheme_comment($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article class="comment" id="comment-<?php comment_ID(); ?>">
			<!--   comment meta   -->
			<footer class="comment-meta">
				<!--   comment author   -->
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment->comment_author_email, 48 ); ?>
					<cite class="fn"><?php echo get_comment_author_link(); ?></cite> <span class="says"><?php _e('says:', 'slicetheme'); ?></span>
					<span class="commentmetadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'slicetheme'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'slicetheme'),'  ','') ?>
					</span>
				</div>
				<!--   end comment author   -->
			</footer>
			<!--   end comment meta   -->
			<!--   comment content   -->
			<div class="comment-content">
				<?php comment_text() ?>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
			<!--   end comment content   -->
		</article>
	<?php
}

//
function slicetheme_pagenav($pages = '', $range = 4)
{
	 $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
		 echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo " <a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo " <a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? " <span class='current'>".$i."</span>":" <a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo " <a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

//
function slicetheme_attachment_filter($attachment_link)
{	
	$pattern		= "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
	$replacement	= '<a$1href=$2$3.$4$5 rel="prettyPhoto[gal_sc]"$6>$7</a>';
	$attachment_link= preg_replace($pattern, $replacement, $attachment_link);
	return $attachment_link;
}
add_filter('wp_get_attachment_link', 'slicetheme_attachment_filter');

//
function pr($var)
{
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}

//
function new_excerpt_more($more)
{
	global $post;
	
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

//
function new_content_more($link)
{
    return preg_replace('#more-link#isU', 'more', $link);
}
add_filter('the_content_more_link', 'new_content_more');

//
class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu
{
	var $to_depth = -1;
	
	function start_lvl(&$output, $depth)
	{
		$output .= '</option>';
	}
	
	function end_lvl(&$output, $depth)
	{
		$indent = str_repeat("\t", $depth); // don't output children closing tag
	}
	
	function start_el(&$output, $item, $depth, $args)
	{
		$indent = ( $depth ) ? str_repeat( "&nbsp;", $depth * 4 ) : '';
		
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$classes[] = 'menu-item-' . $item->ID;
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		$value = ' value="'. $item->url .'"';
		
		$output .= '<option'.$id.$value.$class_names.'>';
		
		$item_output = $args->before;
		
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		
		$output .= $indent.$item_output;
	}
	
	function end_el(&$output, $item, $depth)
	{
		if (substr($output, -9) != '</option>')
		{
			$output .= "</option>"; // replace closing </li> with the option tag
		}
	}
}