<?php

if (have_posts()) :	while (have_posts()) : the_post();
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
					<?php slicetheme_timthumb($thumbURL, 700, 280); ?>
					<span class="zoom-hover"></span>
				</a>
			</div>
			<?php } ?>
			
			<div class="three columns ml0 blog-meta">
				<span class="blog-date"><?php the_time('F j, Y'); ?></span>
				<span class="blog-author"><?php _e('By', 'slicetheme'); ?> <?php the_author_posts_link(); ?></span>
				<span class="blog-category"><?php _e('In', 'slicetheme'); ?> <?php the_category(', '); ?></span>
				<span class="blog-comment"><?php comments_popup_link(__('No Comment', 'slicetheme' ), __('1 Comment', 'slicetheme'), __('% Comments', 'slicetheme' )); ?></span>
				<?php edit_post_link(__('Edit', 'slicetheme'), '<span class="edit-link">', '</span>'); ?>
			</div>
			
			<div class="nine columns mr0 entry-content">	
				<?php the_excerpt(); ?>
				<p><a href="<?php the_permalink() ?>" class="more"><?php _e('Read More', 'slicetheme'); ?></a></p>
			</div>			
			
		</div>
		<!--   end post entry   -->
		
		<?php		
endwhile; endif;
		?>