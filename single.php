<?php get_header(); ?>
		
		<!--   main-container   -->
        <section id="main-container" class="container" role="main">
		
		    <div class="twelve columns first content">
			
            	<?php get_template_part( 'library/includes/loop', 'single' ); ?>		   
				
            </div>
			
        	<!--  sidebar right  -->
        	<section id="sidebar-right" class="four columns last">
			<div class="st-right-sidebar">
            	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Blog (right)')) : ?><?php endif; ?>
            </div>
			</section>
            <!--   end sidebar right   -->
		
        </section>
        <!--   end main-container   -->

<?php get_footer(); ?>