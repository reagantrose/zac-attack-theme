<?php

global $portfolio_cfg;

if (have_posts()) :	while (have_posts()) : the_post();
		
		$terms = get_the_terms($post->ID, 'portfolio-category');
		
		$datatype = array();
		foreach ( $terms as $term ) {
			$datatype[] = $term->slug;
		}
		$datatype = implode(' ', $datatype);
		
		$the_category = get_the_term_list($post->ID, 'portfolio-category', '', ', ', '');
				
		$portfolio_type = get_post_meta($post->ID, '_portfolio_type', TRUE);
		$portfolio_image = get_post_meta($post->ID, '_portfolio_image', TRUE);
		$portfolio_video = get_post_meta($post->ID, '_portfolio_video', TRUE);
		$portfolio_video_thumb = get_post_meta($post->ID, '_portfolio_video_thumb', TRUE);
		$portfolio_slider = array();
		if ( $portfolio_image1 = get_post_meta($post->ID, '_portfolio_image1', TRUE) ) $portfolio_slider[] = $portfolio_image1;
		if ( $portfolio_image2 = get_post_meta($post->ID, '_portfolio_image2', TRUE) ) $portfolio_slider[] = $portfolio_image2;
		if ( $portfolio_image3 = get_post_meta($post->ID, '_portfolio_image3', TRUE) ) $portfolio_slider[] = $portfolio_image3;
		if ( $portfolio_image4 = get_post_meta($post->ID, '_portfolio_image4', TRUE) ) $portfolio_slider[] = $portfolio_image4;
		if ( $portfolio_image5 = get_post_meta($post->ID, '_portfolio_image5', TRUE) ) $portfolio_slider[] = $portfolio_image5;
		
		$st_bg = 'st-bg';
		if ( isset($portfolio_cfg['is_fw_1']) ) {
			$st_bg = '';
		}
		if ( isset($portfolio_cfg['is_lr_1']) ) {
			$st_bg = '';
		}
		if ( $portfolio_cfg['page_portfolio_gallery'] == 1 ) {
			$st_bg = '';
		}
		?>
	
		<!--   portfolio content   -->
		<div class="qsand <?php echo $portfolio_cfg['section_class']; ?>" data-id="id-<?php the_ID(); ?>" data-type="<?php echo $datatype; ?>">
			
			<div class="entry_portfolio <?php echo $st_bg; ?> clearfix">
				
				<?php if ( isset($portfolio_cfg['is_fw_1']) ) { ?><div class="eleven columns ml0"><?php } ?>
				<?php if ( isset($portfolio_cfg['is_lr_1']) ) { ?><div class="eight columns ml0"><?php } ?>
				
				<?php					
				switch ($portfolio_type):
					case 'image':
						if ( !empty($portfolio_image) ) {
							?>
							<div class="<?php echo $portfolio_cfg['thumb_class']; ?>">
								<a class="zoom" href="<?php echo $portfolio_image; ?>" title="<?php the_title(); ?>" rel="prettyPhoto">
									<?php slicetheme_timthumb($portfolio_image, $portfolio_cfg['thumb_width'], $portfolio_cfg['thumb_height']); ?>
									<span class="zoom-hover"></span>
								</a>
							</div>
							<?php
						}
					break;
					case 'video':
						if ( !empty($portfolio_video) ) {
							?>
							<div class="<?php echo $portfolio_cfg['thumb_class']; ?>">
								<?php
								if ( !empty($portfolio_video_thumb) ) {
								?>
								<a class="zoom" href="<?php echo $portfolio_video; ?>" title="<?php the_title(); ?>" rel="prettyPhoto">
									<?php slicetheme_timthumb($portfolio_video_thumb, $portfolio_cfg['thumb_width'], $portfolio_cfg['thumb_height']); ?>
									<span class="zoom-hover video"></span>
								</a>
								<?php
								}
								?>
							</div>
							<?php
						}
					break;
					case 'slider':
						if ( !empty($portfolio_slider) ) {
							?>
							<div class="<?php echo $portfolio_cfg['thumb_class']; ?>">
								<?php
								foreach ( $portfolio_slider as $k => $slider )
								{
									$hidden = ( $k > 0 ) ? ' style="display: none;"' : '';
									?>
									<a class="zoom"<?php echo $hidden; ?> href="<?php echo $slider; ?>" title="<?php the_title(); ?>" rel="prettyPhoto[slide_<?php the_ID(); ?>]">
										<?php slicetheme_timthumb($slider, $portfolio_cfg['thumb_width'], $portfolio_cfg['thumb_height']); ?>
										<span class="zoom-hover slider"></span>
									</a>
									<?php
								}
								?>
							</div>
							<?php
						}
					break;
				endswitch;
				?>
				
				<?php if ( isset($portfolio_cfg['is_fw_1']) ) { ?></div><?php } ?>
				<?php if ( isset($portfolio_cfg['is_lr_1']) ) { ?></div><?php } ?>
				
				<?php if ( isset($portfolio_cfg['is_fw_1']) ) { ?><div class="five columns mr0"><?php } ?>
				<?php if ( isset($portfolio_cfg['is_lr_1']) ) { ?><div class="four columns mr0"><?php } ?>
				
				<?php if ( $portfolio_cfg['page_portfolio_gallery'] == 0 ) { ?>
					
					<div class="post-content <?php if ( isset($portfolio_cfg['equalH']) ) { ?>equalH<?php } else { ?>col1<?php } ?>">
					
						<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						
						<?php if ( isset($portfolio_cfg['show_info']) ) { ?>
						<div class="portfolio-meta">
							<span class="port-copyright"><?php echo get_post_meta($post->ID, '_portfolio_client', TRUE); ?></span>
							<span class="port-category"><?php echo $the_category; ?></span>
						</div>
						<?php } ?>
						
						<div class="entry-content">
							<?php slicetheme_excerpt(10, TRUE); ?>
							<?php if ( isset($portfolio_cfg['show_info']) ) { ?>
							<p><a href="<?php the_permalink() ?>" class="more"><?php _e('Read More', 'slicetheme'); ?></a></p>
							<?php } ?>
						</div>
						
					</div>
			
				<?php } ?>
				
				<?php if ( isset($portfolio_cfg['is_fw_1']) ) { ?></div><?php } ?>
				<?php if ( isset($portfolio_cfg['is_lr_1']) ) { ?></div><?php } ?>
				
			</div>
			
		</div>
		<!--   end portfolio content   -->
			
		<?php
endwhile; endif;
		?>