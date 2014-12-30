<?php

if (have_posts()) : while (have_posts()) : the_post();
		?>
		
		<!--   portfolio content   -->
		<div id="<?php the_ID(); ?>" class="post-entry clearfix">
		
			<h1 class="post-title"><?php the_title(); ?></h1>
			
			<?php
			$portfolio_type = get_post_meta($post->ID, '_portfolio_type', TRUE);
			$portfolio_image = get_post_meta($post->ID, '_portfolio_image', TRUE);
			$portfolio_video = get_post_meta($post->ID, '_portfolio_video', TRUE);
			$portfolio_slider = array();
			if ( $portfolio_image1 = get_post_meta($post->ID, '_portfolio_image1', TRUE) ) $portfolio_slider[] = $portfolio_image1;
			if ( $portfolio_image2 = get_post_meta($post->ID, '_portfolio_image2', TRUE) ) $portfolio_slider[] = $portfolio_image2;
			if ( $portfolio_image3 = get_post_meta($post->ID, '_portfolio_image3', TRUE) ) $portfolio_slider[] = $portfolio_image3;
			if ( $portfolio_image4 = get_post_meta($post->ID, '_portfolio_image4', TRUE) ) $portfolio_slider[] = $portfolio_image4;
			if ( $portfolio_image5 = get_post_meta($post->ID, '_portfolio_image5', TRUE) ) $portfolio_slider[] = $portfolio_image5;
			
			$size_width = 940;
			$size_height = 376;
			
			switch ($portfolio_type):
					case 'image':
						if ( !empty($portfolio_image) ) {
						?>
						<div class="thumb">
							<a class="zoom" href="<?php echo $portfolio_image; ?>" title="<?php echo get_the_title(); ?>" rel="prettyPhoto">
								<?php slicetheme_timthumb($portfolio_image, $size_width, $size_height); ?>
								<span class="zoom-hover"></span>
							</a>
						</div>
						<?php
						}
					break;
					case 'video':
						if ( !empty($portfolio_video) ) {
						?>
						<div class="thumb">
							<?php slicetheme_video($portfolio_video, $size_width, $size_height); ?>
						</div>
						<?php
						}
					break;
					case 'slider':
						if ( !empty($portfolio_slider) ) {
						?>
						<div class="slider-wrapper">
							<div class="detailslider">
								<ul class="slides">
									<?php foreach ( $portfolio_slider as $slider ) { ?>
									<li><?php slicetheme_timthumb($slider, $size_width, $size_height); ?></li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<?php
						}
					break;
				endswitch;
			?>
			
			<div class="four columns ml0">
			
				<div class="portfolio-meta">
					<span class="port-copyright"><?php echo get_post_meta($post->ID, '_portfolio_client', TRUE); ?></span>
					<?php $the_category = get_the_term_list($post->ID, 'portfolio-category', '', ', ', ''); ?>
					<span class="port-category"><?php echo $the_category; ?></span>
				</div>
				
				<?php if ($portfolio_website = get_post_meta($post->ID, '_portfolio_website', TRUE)) { ?>
					<p><a href="<?php echo $portfolio_website; ?>" class="more"><?php _e('Visit Website', 'slicetheme'); ?></a></p>
				<?php } ?>
				
			</div>
			
			<div class="twelve columns mr0">
							
				<div class="entry-content">
					<?php the_content(); ?>
					<?php edit_post_link(__('Edit', 'slicetheme'), '<div class="edit-link">', '</div>'); ?>
				</div>
				
			</div>
			
			<div class="clearfix"></div>
			
			<!--   content nav   -->
			<div class="content-nav">
				<?php previous_post_link('<div class="content-prev">%link</div>'/*, __('Prev Portfolio', 'slicetheme')*/); ?>
				<?php next_post_link('<div class="content-next">%link</div>'/*, __('Next Portfolio', 'slicetheme')*/); ?>
			</div>
			<!--   end content nav   -->
			
		</div>
		<!--   end portfolio content   -->

		<?php
endwhile; endif;