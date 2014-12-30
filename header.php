<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>	
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo( 'name' ); ?></title>
    
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="shortcut icon" href="<?php slicetheme_option('site_favicon', SLICETHEME_IMAGES.'/favicon.ico', TRUE); ?>" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="all" />
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?> <?php /* this is used by many Wordpress features and for plugins to work proporly */ ?>
</head>

<body <?php body_class(); ?>>
	
	<?php $style_layout = ( slicetheme_option('style_layout') == 1 ) ? 'class="st-custom-narrow"' : ''; ?>
	<div id="st-wrapper" <?php echo $style_layout; ?>>
	
		<section id="social" class="social-wrapper">
		
			<div class="container">
			<div class="sixteen columns">
			
				<div class="widget widget-social">
					<?php slicetheme_socials(); ?>
				</div>
				
			</div>
			</div>
			
		</section>
		
    	<!--   header   -->
    	<section id="header">
        	
			<header class="container clearfix">
			
            	<div class="five columns logo">
                	<h1 id="site-title"><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php slicetheme_option('site_logo', SLICETHEME_IMAGES.'/logo.png', TRUE); ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>
                </div>                
                <nav id="main-nav" class="eleven columns">
                	<?php wp_nav_menu( array( 'menu_id' => 'nav', 'menu_class' => 'primary-menu', 'theme_location' => 'primary', 
											'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                </nav>
				<div id="responsive_menu" class="four columns">
					<?php
					$nav_args = array( 'theme_location' => 'primary', 
									  'walker' => new Walker_Nav_Menu_Dropdown(), 
									  'items_wrap' => '<select onChange="window.location.href=$(this).val();">%3$s</select>' );
					wp_nav_menu( $nav_args );
					?>
				</div>
				
			</header>
			
        </section>
        <!--   end header   -->
        	
		<?php
		$page_template = get_post_meta($post->ID, '_page_template', TRUE);
		if ( is_front_page() || $page_template == 'homepage' ) {
			//$home_slider = slicetheme_option('home_slider');
			$home_slider = get_post_meta($post->ID, '_page_home_slider', TRUE);
			?>
			<!--   top-box   -->
        	<section id="top-box">
				<!--   slider   -->
				<section class="container-slider">
					<?php
					get_template_part( 'library/slideshow/'.$home_slider.'-slider' );
					?>
				</section>
				<!--   end slider   -->
			</section>
        	<!--   end top-box   -->
			<?php
		}
		else {
			?>
			<!--   top-box   -->
        	<section id="top-box" class="top-box-crumb">
				<!--   crumb   -->
				<div class="container crumb clearfix">
				<div class="sixteen columns">
				
					<?php slicetheme_archive(); ?>
					<p><?php slicetheme_breadcrumbs(); ?></p>
				
				</div>
				</div>
				<!--   end crumb   -->
			</section>
        	<!--   end top-box   -->
		<?php } ?>