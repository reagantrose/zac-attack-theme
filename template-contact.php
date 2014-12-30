<?php get_header(); ?>
						
		<!--   main-container   -->
		<section id="main-container" class="container" role="main">
		<div class="sixteen columns">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<!--   post entry   -->
			<div id="<?php the_ID(); ?>" class="detail-entry clearfix">
			
				<h1 class="post-title"><?php the_title(); ?></h1>
				
				<div class="entry-content">
					
					<div class="one_half">
						
						<?php the_content(); ?>
						
						<div id="result_contact_form"></div>
						<div id="loading_contact_form" style="margin-bottom: 20px; display: none;">
							<img src="<?php echo SLICETHEME_IMAGES; ?>/loader.gif" alt="<?php _e('Please wait..', 'slicetheme');?>" />
						</div>
						
						<form id="contact_form" class="st-form" method="post" action="<?php echo SLICETHEME_BASE_URL .'/scripts/contact.php'; ?>">
						<fieldset>
							<p>
								<label for="contact_name"><?php _e('Name', 'slicetheme'); ?></label>
								<input type="text" class="text_input required" name="contact_name" id="contact_name" />
							</p>
							<p>
								<label for="contact_email"><?php _e('Email', 'slicetheme'); ?></label>
								<input type="text" class="text_input required email" name="contact_email" id="contact_email" />
							</p>
							<p>
								<label for="contact_subject"><?php _e('Subject', 'slicetheme'); ?></label>
								<input type="text" class="text_input" name="contact_subject" id="contact_subject" />
							</p>
							<p>
								<label for="contact_message"><?php _e('Message', 'slicetheme'); ?></label>
								<textarea class="text_area required" name="contact_message" id="contact_message" rows="7" style="width: 95%"></textarea>
							</p>
							<p>
								<input type="submit" class="button" name="submit" value="<?php _e('Send', 'slicetheme'); ?>" id="submit" />
							</p>
						</fieldset>
						</form>
					</div>
					
					<div class="one_half last">
					
						<?php
						$wgt_args = array(
										'before_widget' => '<section class="widget widget-contact">', 
										'after_widget' => '</section>', 
										'before_title' => '<h3 class="widget-title">', 
										'after_title' => '</h3>', 
										);
						the_widget('slicetheme_contact_info', '', $wgt_args); ?>
						
						<div id="contact_map" style="max-width: 460px; height: 320px; margin-bottom: 20px;"></div>
						
					</div>
					
				</div>				
				
			</div>
		    <!--   end post entry   -->
		   
		   	<?php endwhile; endif; ?>
		
		</div>	
		</section>
		<!--   end main-container   -->

<?php get_footer(); ?>