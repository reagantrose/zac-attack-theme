<?php get_header(); ?>
		
		<!--   main-container   -->
        <section id="main-container" class="container" role="main">
		<div class="sixteen columns">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<!--   post entry   -->
			<div id="<?php the_ID(); ?>" class="detail-entry clearfix">
				
				<h1 class="post-title"><?php the_title(); ?></h1>
				
				<div class="entry-content">
				
					<?php $attachments = array_values(get_children( array('post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') ));

					foreach ( $attachments as $k => $attachment )
					if ( $attachment->ID == $post->ID )
					break;
		
					$next_url = isset($attachments[$k+1]) ? get_permalink($attachments[$k+1]->ID) : get_permalink($attachments[0]->ID); ?>
					
					<p><a href="<?php echo $next_url; ?>" rel="attachment"><?php echo wp_get_attachment_image( $post->ID, 'full' ); ?></a></p>
				
					<!--   content nav   -->
					<div class="content-nav">
						<div class="content-prev"><?php previous_image_link( false ); ?></div>
						<div class="content-next"><?php next_image_link( false ); ?></div>
					</div>
					<!--   end content nav   -->
					
				</div>
	
			</div>
			<!--   end post entry   -->
				
			<?php endwhile; endif; ?>
				
		</div>
        </section>
        <!--   end main-container   -->

<?php get_footer(); ?>