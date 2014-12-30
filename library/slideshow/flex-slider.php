<script type="text/javascript">
	//slider
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "<?php slicetheme_option('flex_animation', 'fade', TRUE); ?>",
			slideshowSpeed: <?php slicetheme_option('flex_slideshowSpeed', 7000, TRUE); ?>,
			animationDuration: <?php slicetheme_option('flex_animationDuration', 600, TRUE); ?>,
			directionNav: <?php slicetheme_option('flex_directionNav', 'true', TRUE); ?>,
			controlNav: <?php slicetheme_option('flex_controlNav', 'false', TRUE); ?>,
			animationLoop: true,
			pauseOnAction: true,
			pauseOnHover: <?php slicetheme_option('flex_pauseOnHover', 'true', TRUE); ?>,
			nextText: "",
			prevText: "",
		});
	});
</script>

<?php if ( $slider_home = slicetheme_option('flex_image') ) { ?>
<div class="flexslider">
	<ul class="slides">
		<?php
		foreach ( $slider_home as $id => $slide ) {
			?>			
			<li>
				<?php slicetheme_timthumb($slide['url'], 980, 392); ?>
				<?php
				if ( $slide['title'] || $slide['description'] ) {
					echo '<div class="slide-caption">';
					if ( $slide['title'] ) {
						$slide_title = !empty($slide['link']) ? '<a href="'. $slide['link'] .'">'. $slide['title'] .'</a>' : $slide['title'];
						echo '<div class="slide-title">'. $slide_title .'</div>';
					}				
					if ( $slide['description'] ) {
						echo '<p class="slide-description">'. $slide['description'] .'<p>';
					}
					echo '</div>';
				} ?>
			</li>
			<?php
		}
		?>
	</ul>
</div>
<?php } ?>