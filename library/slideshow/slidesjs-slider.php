<script type="text/javascript">
	//slider
	$(document).ready(function() {
		$('#slides').slides({
			preload: true,
			preloadImage: '<?php echo SLICETHEME_JS; ?>/slidesjs-slider/loading.gif',
			play: <?php slicetheme_option('slidesjs_play', '5000', TRUE); ?>,
			pause: <?php slicetheme_option('slidesjs_pause', '2500', TRUE); ?>,
			hoverPause: <?php slicetheme_option('slidesjs_hoverPause', 'true', TRUE); ?>,
			autoHeight: true,
			effect: '<?php slicetheme_option('slidesjs_effect', 'fade', TRUE); ?>',
			generateNextPrev: <?php slicetheme_option('slidesjs_generateNextPrev', 'true', TRUE); ?>,
			generatePagination: <?php slicetheme_option('slidesjs_generatePagination', 'true', TRUE); ?>
		});
	});
</script>

<?php if ( $slider_home = slicetheme_option('slidesjs_image') ) { ?>
<div id="slides">
	<div class="slides_container">
		<?php
		foreach ( $slider_home as $id => $slide ) {
			?>
			<div class="item-slide">
				<div class="feat-image left">
					<img src="<?php echo $slide['url']; ?>" alt="" />
				</div>
				<div class="feat-content right">
					<?php
					if ( $slide['title'] ) {
						echo '<div class="slide-title">'. $slide['title'] .'</div>';
					}				
					if ( $slide['description'] ) {
						echo '<p class="slide-description">'. $slide['description'] .'<p>';
					}
					if ( $slide['link'] ) {
						echo '<a class="st-button medium black" href="'. $slide['link'] .'">'. __('Read More', 'slicetheme') .'</a>';
					}
					?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>
<?php } ?>