<?php get_header(); ?>
		
		<!--   main-container   -->
		<section id="main-container" class="container" role="main">
			
			<?php			
			global $portfolio_cfg;
			
			$portfolio_cfg['is_fw_1']		= TRUE;
			$portfolio_cfg['show_info']		= TRUE;
			$portfolio_cfg['nav_class']		= 'sixteen columns';
			$portfolio_cfg['section_class']	= 'sixteen columns';
			$portfolio_cfg['thumb_class']	= 'thumb';
			$portfolio_cfg['thumb_width']	= 680;
			$portfolio_cfg['thumb_height']	= 272;
			?>
			
			<section class="portfolio">
		
				<!--   filtering button   -->
				<div class="<?php echo $portfolio_cfg['nav_class']; ?>">
					<ul class="st-filter">
						<?php
						$categories = get_categories( array('taxonomy' => 'portfolio-category', 'hide_empty' => 0) );
						foreach($categories as $category)
						{
							?>
							<li><a href="<?php echo get_term_link( $category->slug, $category->taxonomy ); ?>" class="<?php echo $category->slug; ?>"><?php echo $category->cat_name; ?></a></li>
							<?php
						}
						?>
					</ul>
				</div>
				
				<div class="clearfix"></div>
				<div class="ourHolder">
				
					<?php get_template_part( 'library/includes/loop', 'portfolio' ); ?>
				
				</div>
				<div class="clearfix"></div>
				
				<div class="sixteen columns">
					<?php if (function_exists('slicetheme_pagenav')) { slicetheme_pagenav(); } else { ?>
					<div class="content-nav">
						<div class="content-prev"><?php next_posts_link( __('Older Entries', 'slicetheme') ); ?></div>
						<div class="content-next"><?php previous_posts_link( __('Newer Entries', 'slicetheme') ); ?></div>
					</div>
					<?php } ?>
				</div>
					
			</section>
		
		</section>
		<!--   end main-container   -->

<?php get_footer(); ?>