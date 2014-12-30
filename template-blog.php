<?php get_header(); ?>
						
		<!--   main-container   -->
		<section id="main-container" class="container" role="main">
		
			<?php
			$page_blog = get_post_meta($post->ID, '_page_blog', TRUE);
			
			global $blog_cfg;
			
			$blog_cfg['page_blog']	= $page_blog;
			
			switch ($page_blog):
				case 'fw':
					$blog_cfg['thumb_class']	= 'six columns ml0 thumb';
					$blog_cfg['entry_class']	= 'ten columns mr0';
					$blog_cfg['thumb_width']	= 450;
					$blog_cfg['thumb_height']	= 240;
				break;
				case 'ds':
					$blog_cfg['meta_class']		= 'three columns ml0 blog-meta';
					$blog_cfg['entry_class']	= 'five columns mr0 entry-content';
					$blog_cfg['thumb_width']	= 460;
					$blog_cfg['thumb_height']	= 184;
				break;
				case 'lb_f':
				case 'rb_f':
					$blog_cfg['meta_class']		= 'three columns ml0 blog-meta';
					$blog_cfg['entry_class']	= 'nine columns mr0 entry-content';
					$blog_cfg['thumb_width']	= 700;
					$blog_cfg['thumb_height']	= 280;
				break;
				case 'lb_m':
				case 'rb_m':
					$blog_cfg['meta_class']		= 'three columns ml0 blog-meta';
					$blog_cfg['entry_class']	= 'nine columns mr0';
					$blog_cfg['thumb_width']	= 520;
					$blog_cfg['thumb_height']	= 208;
				break;
				case 'lb_s':
				case 'rb_s':
					$blog_cfg['thumb_class']	= 'three columns ml0 thumb';
					$blog_cfg['entry_class']	= 'nine columns mr0';
					$blog_cfg['thumb_width']	= 450;
					$blog_cfg['thumb_height']	= 240;
				break;
			endswitch;
			
			switch ($page_blog):
				case 'fw':
					?>
					<div class="sixteen columns content">
					<?php
				break;
				case 'ds':
					?>
					<div class="first">
					<div class="eight columns last content">
					<?php
				break;
				case 'lb_f':
				case 'lb_m':
				case 'lb_s':
					?>
					<div class="twelve columns last content">
					<?php
				break;
				case 'rb_f':
				case 'rb_m':
				case 'rb_s':
					?>
					<div class="twelve columns first content">
					<?php
				break;
			endswitch;
			
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			query_posts(array( 'post_type' => 'post', 'showposts' => get_option('posts_per_page'), 'paged' => $paged ));
			
			get_template_part( 'library/includes/loop', 'blog' );
			
			?>
			<div class="clearfix"></div>
			<?php
								
			if ( function_exists('slicetheme_pagenav') ) { slicetheme_pagenav(); } else {
			?>
			<div class="content-nav">
				<div class="content-prev"><?php next_posts_link( __('Older Entries', 'slicetheme') ); ?></div>
				<div class="content-next"><?php previous_posts_link( __('Newer Entries', 'slicetheme') ); ?></div>
			</div>
			<?php }
			
			wp_reset_query();
			
			switch ($page_blog):
				case 'fw':
					?>
					</div>
					<?php
				break;
				case 'ds':
					?>
					</div>
					<!--  sidebar right  -->
					<section id="sidebar-left" class="four columns first">
					<div class="st-left-sidebar">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Blog (left)')) : ?><?php endif; ?>
					</div>
					</section>
					<!--   end sidebar right   -->
					</div>
					<!--  sidebar right  -->
					<section id="sidebar-right" class="four columns last">
					<div class="st-right-sidebar">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Blog (right)')) : ?><?php endif; ?>
					</div>
					</section>
					<!--   end sidebar right   -->
					<?php
				break;
				case 'lb_f':
				case 'lb_m':
				case 'lb_s':
					?>
					</div>
					<!--  sidebar right  -->
					<section id="sidebar-left" class="four columns first">
					<div class="st-left-sidebar">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Blog (left)')) : ?><?php endif; ?>
					</div>
					</section>
					<!--   end sidebar right   -->
					<?php
				break;
				case 'rb_f':
				case 'rb_m':
				case 'rb_s':
					?>
					</div>
					<!--  sidebar right  -->
					<section id="sidebar-right" class="four columns last">
					<div class="st-right-sidebar">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Blog (right)')) : ?><?php endif; ?>
					</div>
					</section>
					<!--   end sidebar right   -->
					<?php
				break;
			endswitch;
			?>
		
		</section>
		<!--   end main-container   -->

<?php get_footer(); ?>