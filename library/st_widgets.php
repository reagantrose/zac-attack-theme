<?php

/*
Latest Posts
*/
class slicetheme_latest_posts extends WP_Widget {

	function slicetheme_latest_posts()
	{
		$widget_ops = array('classname' => 'widget-post', 'description' => 'The most latest posts on your site.' );
		
		$this->WP_Widget( 'st_latest_posts', THEMENAME.' - Latest Posts', $widget_ops );
	}

	function widget( $args, $instance )
	{
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Latest Posts', 'slicetheme') : $instance['title'], $instance, $this->id_base);
		$cat = !empty($instance['cat']) ? $instance['cat'] : '';
		$count = !empty($instance['count']) ? $instance['count'] : '';
		
		echo $before_widget;
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		
		if ( !empty($cat) ) {
			$loop = new WP_Query('cat='.$cat.'&posts_per_page='.$count);
		}
		else {
			$loop = new WP_Query('&posts_per_page='.$count);
		}
		
		if ($loop->have_posts()) :		
		?>
		<ul>
			<?php
			while ($loop->have_posts()) : $loop->the_post();
				?>
				<li class="news-content">
					<?php
					if ( current_theme_supports('post-thumbnails') && has_post_thumbnail() ) {
						$thumbURL = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), '');
						$thumbURL = $thumbURL[0];
						?>
						<span class="thumb">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
							<?php slicetheme_timthumb($thumbURL, 55, 45); ?>
							</a>
						</span>
						<?php
					}
					?>
					<span class="headline">
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						<span class="time"><?php the_time('F j, Y H:i a'); ?></span>
					</span>
				</li>
				<?php
			endwhile;
			?>
		</ul>
		<?php		
		wp_reset_postdata();
		endif;
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['cat'] = strip_tags($new_instance['cat']);
		$instance['count'] = strip_tags($new_instance['count']);
		return $instance;
	}

	function form( $instance )
	{		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'cat' => '', 'count' => 5 ) );
		$title = strip_tags($instance['title']);
		$cat = strip_tags($instance['cat']);
		$count = strip_tags($instance['count']);
		
		$categories_list = get_categories('hide_empty=0');		
		$categories = array();
		$categories[''] = 'All';
		foreach ($categories_list as $category) {
			$categories[$category->cat_ID] = $category->cat_name;
		}
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>">Choose the categories:</label>
			<select class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>">
				<?php
				foreach ( $categories as $id => $name )
				{					
					$selected = ($cat == $id) ? ' selected' : '';
				
					echo '<option value="'.$id.'"'. $selected .'>'.$name.'</option>';
				}
				?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">Number to display:</label>
			<select id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>">
				<?php
				for ( $i = 1; $i <= 10; $i++ )
				{					
					$selected = ($count == $i) ? ' selected' : '';
				
					echo '<option value="'.$i.'"'. $selected .'>'.$i.'</option>';
				}
				?>
			</select>
		</p>
		<?php
	}
}


/*
Latest Portfolio
*/
class slicetheme_latest_portfolio extends WP_Widget {

	function slicetheme_latest_portfolio()
	{
		$widget_ops = array('classname' => 'widget-post', 'description' => 'The most latest portfolio on your site.' );
		
		$this->WP_Widget( 'st_latest_portfolio', THEMENAME.' - Latest Portfolio', $widget_ops );
	}

	function widget( $args, $instance )
	{
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Latest Portfolio', 'slicetheme') : $instance['title'], $instance, $this->id_base);
		$cat = !empty($instance['cat']) ? $instance['cat'] : '';
		$count = !empty($instance['count']) ? $instance['count'] : '';
		
		echo $before_widget;
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		
		if ( !empty($cat) ) {
			$args = array(
				'posts_per_page' => $count,
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio-category',
						'field' => 'id',
						'terms' => $cat
					)
				)
			);
			$loop = new WP_Query($args);
		}
		else {
			$loop = new WP_Query('post_type=portfolio&posts_per_page='.$count);
		}
		
		if ($loop->have_posts()) :
		?>
		<ul>
			<?php
			while ($loop->have_posts()) : $loop->the_post();
				?>
				<li class="news-content">
					
						<?php
						$portfolio_type = get_post_meta(get_the_ID(), '_portfolio_type', TRUE);
						$portfolio_image = get_post_meta(get_the_ID(), '_portfolio_image', TRUE);
						$portfolio_video = get_post_meta(get_the_ID(), '_portfolio_video', TRUE);
						$portfolio_video_thumb = get_post_meta(get_the_ID(), '_portfolio_video_thumb', TRUE);
						$portfolio_slider = array();
						if ( $portfolio_image1 = get_post_meta(get_the_ID(), '_portfolio_image1', TRUE) ) $portfolio_slider[] = $portfolio_image1;
						if ( $portfolio_image2 = get_post_meta(get_the_ID(), '_portfolio_image2', TRUE) ) $portfolio_slider[] = $portfolio_image2;
						if ( $portfolio_image3 = get_post_meta(get_the_ID(), '_portfolio_image3', TRUE) ) $portfolio_slider[] = $portfolio_image3;
						if ( $portfolio_image4 = get_post_meta(get_the_ID(), '_portfolio_image4', TRUE) ) $portfolio_slider[] = $portfolio_image4;
						if ( $portfolio_image5 = get_post_meta(get_the_ID(), '_portfolio_image5', TRUE) ) $portfolio_slider[] = $portfolio_image5;
										
						switch ($portfolio_type):
							case 'image':
								if ( !empty($portfolio_image) ) {
								?>
								<span class="thumb">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
									<?php slicetheme_timthumb($portfolio_image, 55, 45); ?>
									</a>
								</span>
								<?php
								}
							break;
							case 'video':
								if ( !empty($portfolio_video_thumb) ) {
								?>
								<span class="thumb">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
									<?php slicetheme_timthumb($portfolio_video_thumb, 55, 45); ?>
									</a>
								</span>
								<?php
								}
							break;
							case 'slider':
								if ( !empty($portfolio_slider) ) {
								?>
								<span class="thumb">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
									<?php slicetheme_timthumb($portfolio_slider[0], 55, 45); ?>
									</a>
								</span>
								<?php
								}
							break;
						endswitch;
						?>						
						<span class="headline">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							<span class="time"><?php the_time('F j, Y H:i a'); ?></span>
						</span>					
				</li>
				<?php
			endwhile;
			?>
		</ul>
		<?php		
		wp_reset_postdata();
		endif;
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['cat'] = strip_tags($new_instance['cat']);
		$instance['count'] = strip_tags($new_instance['count']);
		return $instance;
	}

	function form( $instance )
	{		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'cat' => '', 'count' => 5 ) );
		$title = strip_tags($instance['title']);
		$cat = strip_tags($instance['cat']);
		$count = strip_tags($instance['count']);
		
		$categories_list = get_categories('taxonomy=portfolio-category&hide_empty=0');		
		$categories = array();
		$categories[''] = 'All';
		foreach ($categories_list as $category) {
			$categories[$category->cat_ID] = $category->cat_name;
		}
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>">Choose the categories:</label>
			<select class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>">
				<?php
				foreach ( $categories as $id => $name )
				{					
					$selected = ($cat == $id) ? ' selected' : '';
				
					echo '<option value="'.$id.'"'. $selected .'>'.$name.'</option>';
				}
				?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">Number to display:</label>
			<select id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>">
				<?php
				for ( $i = 1; $i <= 10; $i++ )
				{					
					$selected = ($count == $i) ? ' selected' : '';
				
					echo '<option value="'.$i.'"'. $selected .'>'.$i.'</option>';
				}
				?>
			</select>
		</p>
		<?php
	}
}


/*
Twitter
*/
class slicetheme_twitter extends WP_Widget {

	function slicetheme_twitter()
	{
		$widget_ops = array('classname' => 'widget-twitter', 'description' => 'The most latest twitter messages on your site.' );
		
		$this->WP_Widget( 'st_twitter', THEMENAME.' - Latest Tweets', $widget_ops );
	}

	function widget( $args, $instance )
	{
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Latest Tweets', 'slicetheme') : $instance['title'], $instance, $this->id_base);
		$twitterID = !empty($instance['twitterID']) ? $instance['twitterID'] : '';
		$count = !empty($instance['count']) ? $instance['count'] : '';
		
		echo $before_widget;
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		
		?>
		<ul id="twitter_update_list">
			<li>Twitter feed loading</li>
		</ul>
		<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
		<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $twitterID; ?>.json?callback=twitterCallback2&amp;count=<?php echo $count; ?>"></script>
		<?php
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitterID'] = strip_tags($new_instance['twitterID']);
		$instance['count'] = strip_tags($new_instance['count']);
		return $instance;
	}

	function form( $instance )
	{		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'twitterID' => '', 'count' => 5 ) );
		$title = strip_tags($instance['title']);
		$twitterID = strip_tags($instance['twitterID']);
		$count = strip_tags($instance['count']);
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('twitterID'); ?>">Twitter username:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitterID'); ?>" name="<?php echo $this->get_field_name('twitterID'); ?>" type="text" value="<?php echo esc_attr($twitterID); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">Number to display:</label>
			<select id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>">
				<?php
				for ( $i = 1; $i <= 10; $i++ )
				{					
					$selected = ($count == $i) ? ' selected' : '';
				
					echo '<option value="'.$i.'"'. $selected .'>'.$i.'</option>';
				}
				?>
			</select>
		</p>
		<?php
	}
}


/*
Flickr
*/
class slicetheme_flickr extends WP_Widget {

	function slicetheme_flickr()
	{
		$widget_ops = array('classname' => 'widget-flickr', 'description' => 'The most latest flickr photo on your site.' );
		
		$this->WP_Widget( 'st_flickr', THEMENAME.' - Latest Flickr Photos', $widget_ops );
	}

	function widget( $args, $instance )
	{
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Latest Flickr Photos', 'slicetheme') : $instance['title'], $instance, $this->id_base);
		$flickrID = !empty($instance['flickrID']) ? $instance['flickrID'] : '';
		$count = !empty($instance['count']) ? $instance['count'] : '';
		$display = !empty($instance['display']) ? $instance['display'] : '';
		
		echo $before_widget;
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		
		?>
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $count; ?>&amp;display=<?php echo $display; ?>&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flickrID; ?>"></script>
		<?php
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickrID'] = strip_tags($new_instance['flickrID']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['display'] = strip_tags($new_instance['display']);
		return $instance;
	}

	function form( $instance )
	{		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'flickrID' => '', 'display' => 'latest', 'count' => 9 ) );
		$title = strip_tags($instance['title']);
		$flickrID = strip_tags($instance['flickrID']);
		$count = strip_tags($instance['count']);
		$display = strip_tags($instance['display']);
		
		$display_opt = array('latest', 'random');
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('flickrID'); ?>">Flickr ID:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('flickrID'); ?>" name="<?php echo $this->get_field_name('flickrID'); ?>" type="text" value="<?php echo esc_attr($flickrID); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('display'); ?>">What pictures to display:</label>
			<select class="widefat" id="<?php echo $this->get_field_id('display'); ?>" name="<?php echo $this->get_field_name('display'); ?>">
				<?php
				foreach ( $display_opt as $opt )
				{					
					$selected = ($display == $opt) ? ' selected' : '';
				
					echo '<option value="'.$opt.'"'. $selected .'>'.ucfirst($opt).'</option>';
				}
				?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">Number to display:</label>
			<select id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>">
				<?php
				for ( $i = 1; $i <= 10; $i++ )
				{					
					$selected = ($count == $i) ? ' selected' : '';
				
					echo '<option value="'.$i.'"'. $selected .'>'.$i.'</option>';
				}
				?>
			</select>
		</p>
		<?php
	}
}


/*
Contact Info
*/
class slicetheme_contact_info extends WP_Widget {

	function slicetheme_contact_info()
	{
		$widget_ops = array('classname' => 'widget-contact', 'description' => 'Display your contact information.' );
		
		$this->WP_Widget( 'st_contact_info', THEMENAME.' - Contact Info', $widget_ops );
	}

	function widget( $args, $instance )
	{
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Contact Info', 'slicetheme') : $instance['title'], $instance, $this->id_base);
		
		echo $before_widget;
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		
		?>
		<p>
			<?php if ( $contact_address = slicetheme_option('contact_address') ) { ?>
			<span class="address"><?php echo nl2br($contact_address); ?></span>
			<?php } ?>
			<?php if ( $contact_phone = slicetheme_option('contact_phone') ) { ?>
			<span class="phone"><?php echo $contact_phone; ?></span>
			<?php } ?>
			<?php if ( $contact_fax = slicetheme_option('contact_fax') ) { ?>
			<span class="fax"><?php echo $contact_fax; ?></span>
			<?php } ?>
			<?php if ( $contact_email = slicetheme_option('contact_email') ) { ?>
			<span class="mail"><a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a></span>
			<?php } ?>
			<?php if ( $contact_website = slicetheme_option('contact_website') ) { ?>
			<span class="website"><a href="<?php echo $contact_website; ?>"><?php echo $contact_website; ?></a></span>
			<?php } ?>
		</p>
		<?php
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form( $instance )
	{		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<?php
	}
}


/*
Contact Form
*/
class slicetheme_contact_form extends WP_Widget {

	function slicetheme_contact_form()
	{
		$widget_ops = array('classname' => 'widget-contact', 'description' => 'Display your contact form.' );
		
		$this->WP_Widget( 'st_contact_form', THEMENAME.' - Contact Form', $widget_ops );
	}

	function widget( $args, $instance )
	{
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Quick Contact', 'slicetheme') : $instance['title'], $instance, $this->id_base);
		
		echo $before_widget;
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		
		?>
		<div id="result_contact_form_wgt"></div>
		
		<form id="contact_form_wgt" class="st-form" method="post" action="<?php echo SLICETHEME_BASE_URL .'/scripts/contact.php'; ?>">
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
				<label for="contact_message"><?php _e('Message', 'slicetheme'); ?></label>
				<textarea class="text_area required" name="contact_message" id="contact_message" rows="4"></textarea>
			</p>
			<p>
				<input type="submit" class="button" name="submit" value="<?php _e('Send', 'slicetheme'); ?>" id="submit" />
				<input type="hidden" name="is_wgt" value="1" />
			</p>
		</fieldset>
		</form>
		<?php
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form( $instance )
	{		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<?php
	}
}


/*
Newsletter Form
*/
class slicetheme_newsletter_form extends WP_Widget {

	function slicetheme_newsletter_form()
	{
		$widget_ops = array('classname' => 'widget-newsletter', 'description' => 'Display your newsletter form.' );
		
		$this->WP_Widget( 'st_newsletter_form', THEMENAME.' - Newsletter Form', $widget_ops );
	}

	function widget( $args, $instance )
	{
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Join Newsletter', 'slicetheme') : $instance['title'], $instance, $this->id_base);
		
		echo $before_widget;
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		
		?>
		<div id="result_newsletter_form_wgt"></div>
		
		<form id="newsletter_form_wgt" class="st-form" method="post" action="<?php echo SLICETHEME_BASE_URL .'/scripts/newsletter.php'; ?>">
		<fieldset>
			<p>
				<label for="newsletter_name"><?php _e('Name', 'slicetheme'); ?></label>
				<input type="text" class="text_input required" name="newsletter_name" id="newsletter_name" />
			</p>
			<p>
				<label for="newsletter_email"><?php _e('Email', 'slicetheme'); ?></label>
				<input type="text" class="text_input required email" name="newsletter_email" id="newsletter_email" />
			</p>
			<p>
				<input type="submit" class="button" name="submit" value="<?php _e('Subscribe', 'slicetheme'); ?>" id="submit" />
				<input type="hidden" name="is_wgt" value="1" />
			</p>
		</fieldset>
		</form>
		<?php
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form( $instance )
	{		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<?php
	}
}


/*
3 in 1
*/
class slicetheme_3in1_widget extends WP_Widget {

	function slicetheme_3in1_widget()
	{
		$widget_ops = array('classname' => 'widget-3in1', 'description' => 'A widget that displays your popular posts, recent posts, a tag cloud.' );
		
		$this->WP_Widget( 'st_3in1_widget', THEMENAME.' - 3 in 1 Widget', $widget_ops );
	}

	function widget( $args, $instance )
	{
		extract($args);
		
		$title = !empty($instance['title']) ? $instance['title'] : '';
		$count = !empty($instance['count']) ? $instance['count'] : '';
		
		echo $before_widget;
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		
		?>
		<!--   tab section   -->
		<aside class="st-tabs">
			<ul class="tabs">
			  <li><a href="#tab-1"><?php _e('Popular', 'slicetheme'); ?></a></li>
			  <li><a href="#tab-2"><?php _e('Recent', 'slicetheme'); ?></a></li>
			  <li><a href="#tab-3"><?php _e('Tags', 'slicetheme'); ?></a></li>
			</ul>
			<div class="tabs-container">
			<div id="tab-1" class="tabs-content">
				<?php
				$loop = new WP_Query('&orderby=comment_count&posts_per_page='.$count);
				if ($loop->have_posts()) :		
				?>
				<ul class="widget widget-post">
					<?php
					while ($loop->have_posts()) : $loop->the_post();
						?>
						<li class="news-content">							
							<?php
							if ( current_theme_supports('post-thumbnails') && has_post_thumbnail() ) {
								$thumbURL = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), '');
								$thumbURL = $thumbURL[0];
								?>
								<span class="thumb">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
									<?php slicetheme_timthumb($thumbURL, 55, 45); ?>
									</a>
								</span>
								<?php
							}
							?>
							<span class="headline">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								<span class="time"><?php the_time('F j, Y H:i a'); ?></span>
							</span>							
						</li>
						<?php
					endwhile;
					?>
				</ul>
				<?php
				wp_reset_postdata();
				endif;
				?>
			</div>
			<div id="tab-2" class="tabs-content">
				<?php
				$loop = new WP_Query('&posts_per_page='.$count);
				if ($loop->have_posts()) :		
				?>
				<ul class="widget widget-post">
					<?php
					while ($loop->have_posts()) : $loop->the_post();
						?>
						<li class="news-content">
							<?php
							if ( current_theme_supports('post-thumbnails') && has_post_thumbnail() ) {
								$thumbURL = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), '');
								$thumbURL = $thumbURL[0];
								?>
								<span class="thumb">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
									<?php slicetheme_timthumb($thumbURL, 55, 45); ?>
									</a>
								</span>
								<?php
							}
							?>
							<span class="headline">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								<span class="time"><?php the_time('F j, Y H:i a'); ?></span>
							</span>
						</li>
						<?php
					endwhile;
					?>
				</ul>
				<?php
				wp_reset_postdata();
				endif;
				?>
			</div>
			<div id="tab-3" class="tabs-content widget tagcloud">
				<?php wp_tag_cloud('smallest=12&largest=12&unit=px'); ?>
			</div>
			</div>
		</aside>
		<!--   end tab section   -->
		<?php
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		return $instance;
	}

	function form( $instance )
	{		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => 5 ) );
		$title = strip_tags($instance['title']);
		$count = strip_tags($instance['count']);
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">Number to display:</label>
			<select id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>">
				<?php
				for ( $i = 1; $i <= 10; $i++ )
				{					
					$selected = ($count == $i) ? ' selected' : '';
				
					echo '<option value="'.$i.'"'. $selected .'>'.$i.'</option>';
				}
				?>
			</select>
		</p>
		<?php
	}
}

function slicetheme_register_widgets() {
	register_widget( 'slicetheme_latest_posts' );
	register_widget( 'slicetheme_latest_portfolio' );
	register_widget( 'slicetheme_twitter' );
	register_widget( 'slicetheme_flickr' );
	register_widget( 'slicetheme_contact_info' );
	register_widget( 'slicetheme_contact_form' );
	register_widget( 'slicetheme_newsletter_form' );
	register_widget( 'slicetheme_3in1_widget' );
}

add_action( 'widgets_init', 'slicetheme_register_widgets' );