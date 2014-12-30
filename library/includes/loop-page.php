<?php

if (have_posts()) :	while (have_posts()) : the_post();
		?>
		
		<!--   post entry   -->
		<div id="<?php the_ID(); ?>" class="post-entry clearfix">
			
			<h1 class="post-title"><?php the_title(); ?></h1>
			
			<div class="entry-content">
			
				<?php the_content(); ?>
					
				<?php wp_link_pages(array('before' => '<div class="pagination"><strong>'.__('Pages', 'slicetheme').'</strong> : ', 'after' => '</div>', 'next_or_number' => 'number')); ?>
				
				<?php edit_post_link(__('Edit', 'slicetheme'), '<div class="edit-link">', '</div>'); ?>
				
			</div>

		</div>
	    <!--   end post entry   -->
			
		<?php
endwhile; endif;