<script type="text/javascript">
	//slider
	$(function() {
		$('#cn-slideshow').slideshow();
	});
</script>	

<script id="barTmpl" type="text/x-jquery-tmpl">
	<div class="cn-bar">
		<div class="cn-nav">
			<a href="#" class="cn-nav-prev">
				<span>Previous</span>
				<div style="background-image:url(${prevSource});"></div> 
			</a>
			<a href="#" class="cn-nav-next">
				<span>Next</span>
				<div style="background-image:url(${nextSource});"></div>
			</a>
		</div><!-- cn-nav -->
		<div class="cn-nav-content">
			<div class="cn-nav-content-prev">
				<span><?php slicetheme_option('circle_previous_text', 'Previous', TRUE); ?></span>
				<h3>${prevTitle}</h3>
			</div>
			<div class="cn-nav-content-current">
				<span><?php slicetheme_option('circle_current_text', 'Currently', TRUE); ?></span>
				<h2>${currentTitle}</h2>
			</div>
			<div class="cn-nav-content-next">
				<span><?php slicetheme_option('circle_next_text', 'Next', TRUE); ?></span>
				<h3>${nextTitle}</h3>
			</div>
		</div><!-- cn-nav-content -->
	</div><!-- cn-bar -->
</script>

<?php if ( $slider_home = slicetheme_option('circle_image') ) { ?>
<div id="cn-slideshow" class="cn-slideshow">
	<div class="cn-images">
		<?php
		foreach ( $slider_home as $id => $slide ) {
			$slide_big = SLICETHEME_BASE_URL .'/timthumb.php?src='. $slide['url'] .'&amp;w=980&amp;h=392&amp;zc=1';
			$slide_thumb = SLICETHEME_BASE_URL .'/timthumb.php?src='. $slide['url'] .'&amp;w=150&amp;h=150&amp;zc=1';
			?>
			<img src="<?php echo $slide_big; ?>" data-thumb="<?php echo $slide_thumb; ?>" alt="<?php echo $slide['title']; ?>" title="<?php echo $slide['title']; ?>" />
			<?php
		}
		?>
	</div><!-- cn-images -->
</div><!-- cn-slideshow -->
<?php } ?>