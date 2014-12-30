<?php

if (have_posts()) :	while (have_posts()) : the_post();
		?>
		
		<!--   post entry   -->
		<div id="<?php the_ID(); ?>" class="post-entry clearfix">
			
			<h1 class="post-title"><?php the_title(); ?></h1>
			
			<?php
			if ( current_theme_supports('post-thumbnails') && has_post_thumbnail() ) {
				$thumbURL = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '');
				$thumbURL = $thumbURL[0];
			?>
			<div class="thumb">
				<a class="zoom" href="<?php echo $thumbURL; ?>" title="<?php echo get_the_title(); ?>" rel="prettyPhoto">
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
			
			<div class="nine columns mr0">
				
				<div class="entry-content">
					<?php the_content(); ?>				
					<?php wp_link_pages(array('before' => '<div class="pagination"><strong>'.__('Pages', 'slicetheme').'</strong> : ', 'after' => '</div>', 'next_or_number' => 'number')); ?>
					<?php the_tags('<div class="blog-tags"><strong>'.__('Tags', 'slicetheme').' : </strong>', ', ', '</div>'); ?>
				</div>
				
			</div>
			
			<div class="clearfix"></div>
			
			<!--   content nav   -->
			<div class="content-nav">
				<?php previous_post_link('<div class="content-prev">%link</div>'); ?>
				<?php next_post_link('<div class="content-next">%link</div>'); ?>
			</div>
			<!--   end content nav   -->
			
			<?php comments_template(); ?>
			
		</div>
	    <!--   end post entry   -->
			
		<?php
endwhile; endif;