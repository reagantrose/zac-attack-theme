		
		<!--   footer   -->
        <section id="footer">
        	
			<div class="container footer-wrap clearfix">
			
				<?php
				$footer_columns = slicetheme_option('footer_columns', 4);
				
				switch ($footer_columns)
				{
					case 1: $class = 'sixteen columns'; break;
					case 2: $class = 'eight columns'; break;
					case 3: $class = 'one-third column'; break;
					case 4: $class = 'four columns'; break;
				}
				
				for ($i = 1; $i <= $footer_columns; $i++)
				{
					?>
					<!--   footer widget   -->
					<div class="<?php echo $class; ?>">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Column '.$i)) : ?><?php endif; ?>
					</div>
					<!--   end footer widget   -->
					<?php
				}
				?>
				
			</div>
			
            <!--   copyright   -->
            <footer class="copy clearfix">
		
				<a id="top" href="#" title="<?php _e('Scroll to Top', 'slicetheme'); ?>"><?php _e('Scroll to Top', 'slicetheme'); ?></a>
			
            	<div class="container">
					
                    <div class="eight columns">
						<p><?php echo slicetheme_option('footer_copyright', 'Copyright &copy; 2012 Goode. Wordpress Theme by <a href="http://www.slicetheme.com/">SliceTheme</a>'); ?></p>
					</div>
							
                	<div class="eight columns widget widget-social last">
                    	<?php slicetheme_socials(); ?>
					</div>
					
				</div>
				
            </footer>
            <!--   end copyright   -->
			
        </section>
        <!--   end footer   -->
    </div>
<?php wp_footer(); ?>
<?php echo slicetheme_option('site_tracking'); ?>
</body>
</html>
