<script type="text/javascript">
	//slider
	$().ready(function() {
		$('.kwicks').kwicks({
			max : 700,
			spacing : 0,
			duration: <?php slicetheme_option('kwicks_duration', 700, TRUE); ?>,
			easing: 'swing' 
		});
	});
</script>

<?php if ( $slider_home = slicetheme_option('kwicks_image') ) { ?>
<div id="kwicks-slider">
	<ul class="kwicks horizontal" >
	<?php
	foreach ( $slider_home as $id => $slide ) {
		?>
		<li id="kwick_<?php echo $id; ?>">
			<?php slicetheme_timthumb($slide['url'], 980, 392); ?>
			<?php
			if ( $slide['title'] || $slide['description'] ) {
				echo '<div class="st-caption">';
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