<?php get_header(); ?>
		
		<!--   main-container   -->
		<section id="main-container" class="container" role="main">
			
			<?php
			$page_portfolio = get_post_meta($post->ID, '_page_portfolio', TRUE);
			$page_portfolio_num = get_post_meta($post->ID, '_page_portfolio_num', TRUE);
			$page_portfolio_filter = get_post_meta($post->ID, '_page_portfolio_filter', TRUE);
			$page_portfolio_gallery = get_post_meta($post->ID, '_page_portfolio_gallery', TRUE);
			
			global $portfolio_cfg;
			
			$portfolio_cfg['page_portfolio_gallery'] = $page_portfolio_gallery;
			
			switch ($page_portfolio):
				case 'fw_1':
					$portfolio_cfg['is_fw_1']		= TRUE;
					$portfolio_cfg['show_info']		= TRUE;
					$portfolio_cfg['nav_class']		= 'sixteen columns';
					$portfolio_cfg['section_class']	= 'sixteen columns';
					$portfolio_cfg['thumb_class']	= 'thumb';
					$portfolio_cfg['thumb_width']	= 680;
					$portfolio_cfg['thumb_height']	= 272;
				break;
				case 'fw_2':
					$portfolio_cfg['equalH']		= TRUE;
					$portfolio_cfg['nav_class']		= 'sixteen columns';
					$portfolio_cfg['section_class']	= 'eight columns';
					$portfolio_cfg['thumb_class']	= 'thumb';
					$portfolio_cfg['thumb_width']	= 460;
					$portfolio_cfg['thumb_height']	= 246;
				break;
				case 'fw_3':
					$portfolio_cfg['equalH']		= TRUE;
					$portfolio_cfg['nav_class']		= 'sixteen columns';
					$portfolio_cfg['section_class']	= 'one-third column';
					$portfolio_cfg['thumb_class']	= 'thumb';
					$portfolio_cfg['thumb_width']	= 450;
					$portfolio_cfg['thumb_height']	= 240;
				break;
				case 'fw_4':
				default:
					$portfolio_cfg['equalH']		= TRUE;
					$portfolio_cfg['nav_class']		= 'sixteen columns';
					$portfolio_cfg['section_class']	= 'four columns';
					$portfolio_cfg['thumb_class']	= 'thumb';
					$portfolio_cfg['thumb_width']	= 450;
					$portfolio_cfg['thumb_height']	= 240;
				break;
				case 'lb_1':
				case 'rb_1':
					$portfolio_cfg['is_lr_1']		= TRUE;
					$portfolio_cfg['show_info']		= TRUE;
					$portfolio_cfg['nav_class']		= 'twelve columns';
					$portfolio_cfg['section_class']	= 'twelve columns';
					$portfolio_cfg['thumb_class']	= 'thumb';
					$portfolio_cfg['thumb_width']	= 460;
					$portfolio_cfg['thumb_height']	= 246;
					
				break;
				case 'lb_2':
				case 'rb_2':
					$portfolio_cfg['equalH']		= TRUE;
					$portfolio_cfg['nav_class']		= 'twelve columns';
					$portfolio_cfg['section_class']	= 'six columns';
					$portfolio_cfg['thumb_class']	= 'thumb';
					$portfolio_cfg['thumb_width']	= 450;
					$portfolio_cfg['thumb_height']	= 240;
				break;
				case 'lb_3':
				case 'rb_3':
					$portfolio_cfg['equalH']		= TRUE;
					$portfolio_cfg['nav_class']		= 'twelve columns';
					$portfolio_cfg['section_class']	= 'four columns';
					$portfolio_cfg['thumb_class']	= 'thumb';
					$portfolio_cfg['thumb_width']	= 450;
					$portfolio_cfg['thumb_height']	= 240;
				break;
			endswitch;
			
			switch ($page_portfolio):
				case 'lb_1':
				case 'lb_2':
				case 'lb_3':
					?>
					<div class="twelve-portfolio last content">
					<?php
				break;
				case 'rb_1':
				case 'rb_2':
				case 'rb_3':
					?>
					<div class="twelve-portfolio first content">
					<?php
				break;
			endswitch;
			?>
			
			<section class="portfolio">
				
				<?php if ( $page_portfolio_filter == 1 ) : ?>
				<!--   filtering button   -->
                <div class="<?php echo $portfolio_cfg['nav_class']; ?>">
					<ul class="st-filter" id="filterOptions">
						<li class="active"><a href="#" class="all">All</a></li>
						<?php
						$categories = get_categories( array('taxonomy'	=> 'portfolio-category', 'hide_empty' => 0) );
						foreach($categories as $category)
						{
							?>
							<li><a href="#" class="<?php echo $category->slug; ?>"><?php echo $category->cat_name; ?></a></li>
							<?php
						}
						?>
					</ul>
				</div>
				<?php endif ?>
				
				<?php
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				query_posts(array( 'post_type' => 'portfolio', 'showposts' => $page_portfolio_num, 'paged' => $paged ));
				?>				
				
				<div class="clearfix"></div>
            	<div class="ourHolder">
		
					<?php get_template_part( 'library/includes/loop', 'portfolio' ); ?>
					
                </div>
				<div class="clearfix"></div>
		
				<div class="<?php echo $portfolio_cfg['nav_class']; ?>">
					<?php if (function_exists('slicetheme_pagenav')) { slicetheme_pagenav(); } else { ?>
					<div class="content-nav">
						<div class="content-prev"><?php next_posts_link( __('Older Entries', 'slicetheme') ); ?></div>
						<div class="content-next"><?php previous_posts_link( __('Newer Entries', 'slicetheme') ); ?></div>
					</div>
					<?php } ?>
				</div>
				
				<?php wp_reset_query();?>
				
			</section>
			
			<?php
			switch ($page_portfolio):
				case 'lb_1':
				case 'lb_2':
				case 'lb_3':
					?>
					</div>
					<!--  sidebar right  -->
					<section id="sidebar" class="four columns first">
					<div class="st-left-sidebar">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Portfolio (left)')) : ?><?php endif; ?>
					</div>
					</section>
					<!--   end sidebar right   -->
					<?php
				break;
				case 'rb_1':
				case 'rb_2':
				case 'rb_3':
					?>
					</div>
					<!--  sidebar right  -->
					<section id="sidebar" class="four columns last">
					<div class="st-right-sidebar">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Portfolio (right)')) : ?><?php endif; ?>
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