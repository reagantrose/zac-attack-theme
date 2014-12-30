<?php get_header(); ?>
						
		<!--   main-container   -->
		<section id="main-container" class="container" role="main">
		<div class="sixteen columns">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<!--   post entry   -->
			<div id="<?php the_ID(); ?>" class="detail-entry clearfix">
			
				<h1 class="post-title"><?php the_title(); ?></h1>
				
				<div class="entry-content">
				
					<div class="st-divider"></div>
					
					<div class="one_third">
											
						<?php
						$wgt_args = array(
								'before_widget' => '<section class="widget widget-post">', 
								'after_widget' => '</section>', 
								'before_title' => '<h3 class="widget-title">', 
								'after_title' => '</h3>', 
								);
						
						the_widget('slicetheme_latest_posts', 'title=The 20 latest Blog Posts&count=20', $wgt_args);						
						the_widget('slicetheme_latest_portfolio', 'title=The 20 latest Portfolio Entries&count=20', $wgt_args);
						?>
						
					</div>
					
					<div class="one_third">
						
						<section class="widget widget_pages">
							<h3 class="widget-title"><?php _e('Available Pages', 'slicetheme'); ?></h3>
							<ul>
								<?php wp_list_pages('title_li=&depth=-1'); ?>
							</ul>
						</section>
												
					</div>
					
					<div class="one_third last">
						
						<section class="widget widget_categories">
							<h3 class="widget-title"><?php _e('Archives by Blog Category', 'slicetheme'); ?></h3>
							<ul>
								<?php wp_list_categories('sort_column=name&optioncount=0&hierarchical=0&title_li='); ?>
							</ul>
						</section>
						
						<section class="widget widget_categories">
							<h3 class="widget-title"><?php _e('Archives by Portfolio Category', 'slicetheme'); ?></h3>
							<ul>
								<?php wp_list_categories('taxonomy=portfolio-category&sort_column=name&optioncount=0&hierarchical=0&title_li='); ?>
							</ul>
						</section>
					
						<section class="widget widget_archive">
							<h3 class="widget-title"><?php _e('Archives by Month', 'slicetheme'); ?></h3>
							<ul>
								<?php wp_get_archives('type=monthly'); ?>
							</ul>
						</section>
					
					</div>
					
				</div>				
				
			</div>
		    <!--   end post entry   -->
		   
		   	<?php endwhile; endif; ?>
		
		</div>	
		</section>
		<!--   end main-container   -->

<?php get_footer(); ?>