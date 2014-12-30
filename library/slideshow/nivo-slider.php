<script type="text/javascript">
	//slider
	$(window).load(function() {
		$('#slider').nivoSlider({
			effect: "<?php slicetheme_option('nivo_effect', 'random', TRUE); ?>",
			slices: 15,
			boxCols: 8,
			boxRows: 4,
			animSpeed: <?php slicetheme_option('nivo_animSpeed', 500, TRUE); ?>,
			pauseTime: <?php slicetheme_option('nivo_pauseTime', 3000, TRUE); ?>,
			startSlide: 0,
			directionNav: <?php slicetheme_option('nivo_directionNav', 'true', TRUE); ?>,
			directionNavHide: <?php slicetheme_option('nivo_directionNavHide', 'true', TRUE); ?>,
			controlNav: <?php slicetheme_option('nivo_controlNav', 'false', TRUE); ?>,
			keyboardNav: true,
			pauseOnHover: <?php slicetheme_option('nivo_pauseOnHover', 'true', TRUE); ?>,
			captionOpacity: 1,
            customChange: function(){
                if ( typeof Cufon != 'undefined') {
					Cufon.replace('.slide-title');
				}
            }
		});		
	});
</script>

<?php if ( $slider_home = slicetheme_option('nivo_image') ) { ?>
<div class="slider-wrapper">
	<div id="slider" class="nivoSlider">
		<?php
		foreach ( $slider_home as $id => $slide ) {
			$slide_big = SLICETHEME_BASE_URL .'/timthumb.php?src='. $slide['url'] .'&amp;w=980&amp;h=392&amp;zc=1';
			
			$out = '<img src="'. $slide_big .'" alt="" title="'. $slide['title'] .'" />';
			
			if ( !empty($slide['description']) ) {
				$IDx = 'htmlcaption-'. $slide['order'];
				$htmlcaption[$IDx] = $slide;
				$out = '<img src="'. $slide_big .'" alt="" title="#'. $IDx .'" />';
			}
			
			if ( !empty($slide['link']) ) {
				$out = '<a href="'. $slide['link'] .'">'. $out .'</a>';
			}
			
			$out = $out."\n";
			
			echo $out;
		}
		?>
	</div>
	<?php
	foreach ( (array)$htmlcaption as $ID => $slide ) {
		?>
		<div id="<?php echo $ID; ?>" class="nivo-html-caption">
			<div class="html-cap">
				<div class="nivo-caption">
					<?php
					if ( $slide['title'] ) {
						$slide_title = !empty($slide['link']) ? '<a href="'. $slide['link'] .'">'. $slide['title'] .'</a>' : $slide['title'];
						echo '<div class="slide-title">'. $slide_title .'</div>';
					}				
					if ( $slide['description'] ) {
						echo '<p class="slide-description">'. $slide['description'] .'<p>';
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>
<?php } ?>