<?php

global $blog_cfg;

if (have_posts()) :	while (have_posts()) : the_post();
		
		switch ($blog_cfg['page_blog']):
			case 'fw':
			case 'lb_s':
			case 'rb_s':
				?>
				<!--   blog-entry   -->
				<div id="<?php the_ID(); ?>" class="blog-entry small-thumb clearfix">
					
					<?php
					if ( current_theme_supports('post-thumbnails') && has_post_thumbnail() ) {
						$thumbURL = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '');
						$thumbURL = $thumbURL[0];
					?>
					<div class="<?php echo $blog_cfg['thumb_class']; ?>">
						<a class="zoom" href="<?php echo $thumbURL; ?>" title="<?php the_title(); ?>" rel="prettyPhoto">
							<?php slicetheme_timthumb($thumbURL, $blog_cfg['thumb_width'], $blog_cfg['thumb_height']); ?>
							<span class="zoom-hover"></span>
						</a>
					</div>
					<?php } ?>
					
					<div class="<?php echo $blog_cfg['entry_class']; ?>">
					
						<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>			

						<div class="blog-meta">
							<span class="blog-date"><?php the_time('F j, Y'); ?></span>
							<span class="blog-author"><?php _e('By', 'slicetheme'); ?> <?php the_author_posts_link(); ?></span>
							<span class="blog-category"><?php _e('In', 'slicetheme'); ?> <?php the_category(', '); ?></span>
							<span class="blog-comment"><?php comments_popup_link(__('No Comment', 'slicetheme' ), __('1 Comment', 'slicetheme'), __('% Comments', 'slicetheme' )); ?></span>
							<?php edit_post_link(__('Edit', 'slicetheme'), '<span class="edit-link">', '</span>'); ?>
						</div>
						
						<div class="entry-content">	
							<?php the_excerpt(); ?>
							<p><a href="<?php the_permalink() ?>" class="more"><?php _e('Read More', 'slicetheme'); ?></a></p>
						</div>
						
					</div>
					
				</div>
				<!--   end post entry   -->
				<?php
			break;
			case 'ds':
			case 'lb_f':
			case 'rb_f':
				?>
				<!--   blog-entry   -->
				<div id="<?php the_ID(); ?>" class="blog-entry full-thumb clearfix">
					
					<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					
					<?php
					if ( current_theme_supports('post-thumbnails') && has_post_thumbnail() ) {
						$thumbURL = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '');
						$thumbURL = $thumbURL[0];
					?>
					<div class="thumb">
						<a class="zoom" href="<?php echo $thumbURL; ?>" title="<?php the_title(); ?>" rel="prettyPhoto">
							<?php slicetheme_timthumb($thumbURL, $blog_cfg['thumb_width'], $blog_cfg['thumb_height']); ?>
							<span class="zoom-hover"></span>
						</a>
					</div>
					<?php } ?>

					<div class="<?php echo $blog_cfg['meta_class']; ?>">
						<span class="blog-date"><?php the_time('F j, Y'); ?></span>
						<span class="blog-author"><?php _e('By', 'slicetheme'); ?> <?php the_author_posts_link(); ?></span>
						<span class="blog-category"><?php _e('In', 'slicetheme'); ?> <?php the_category(', '); ?></span>
						<span class="blog-comment"><?php comments_popup_link(__('No Comment', 'slicetheme' ), __('1 Comment', 'slicetheme'), __('% Comments', 'slicetheme' )); ?></span>
						<?php edit_post_link(__('Edit', 'slicetheme'), '<span class="edit-link">', '</span>'); ?>
					</div>						
					
					<div class="<?php echo $blog_cfg['entry_class']; ?>">
						<?php slicetheme_excerpt(35, TRUE); ?>
						<p><a href="<?php the_permalink() ?>" class="more"><?php _e('Read More', 'slicetheme'); ?></a></p>
					</div>			
					
				</div>
				<!--   end post entry   -->
				<?php
			break;
			case 'lb_m':
			case 'rb_m':
				?>
				<!--   blog-entry   -->
				<div id="<?php the_ID(); ?>" class="blog-entry medium-thumb clearfix">		
					
					<div class="<?php echo $blog_cfg['meta_class']; ?>">
						<span class="blog-date"><?php the_time('F j, Y'); ?></span>
						<span class="blog-author"><?php _e('By', 'slicetheme'); ?> <?php the_author_posts_link(); ?></span>
						<span class="blog-category"><?php _e('In', 'slicetheme'); ?> <?php the_category(', '); ?></span>
						<span class="blog-comment"><?php comments_popup_link(__('No Comment', 'slicetheme' ), __('1 Comment', 'slicetheme'), __('% Comments', 'slicetheme' )); ?></span>
						<?php edit_post_link(__('Edit', 'slicetheme'), '<span class="edit-link">', '</span>'); ?>
					</div>
					
					<div class="<?php echo $blog_cfg['entry_class']; ?>">
					
						<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>			
								
						<?php
						if ( current_theme_supports('post-thumbnails') && has_post_thumbnail() ) {
							$thumbURL = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '');
							$thumbURL = $thumbURL[0];
						?>
						<div class="thumb">
							<a class="zoom" href="<?php echo $thumbURL; ?>" title="<?php the_title(); ?>" rel="prettyPhoto">
								<?php slicetheme_timthumb($thumbURL, $blog_cfg['thumb_width'], $blog_cfg['thumb_height']); ?>
								<span class="zoom-hover"></span>
							</a>
						</div>
						<?php } ?>	
						
						<div class="entry-content">	
							<?php the_excerpt(); ?>
							<p><a href="<?php the_permalink() ?>" class="more"><?php _e('Read More', 'slicetheme'); ?></a></p>
						</div>
						
					</div>			
					
				</div>
				<!--   end post entry   -->
				<?php
			break;
		endswitch;
		
endwhile; endif;
		?>