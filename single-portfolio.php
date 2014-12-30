<?php get_header(); ?>
		
		<!--   main-container   -->
        <section id="main-container" class="container" role="main">
		<div class="sixteen columns">
		
        	<section class="portfolio">
				
               	<?php get_template_part( 'library/includes/loop', 'single-portfolio' ); ?>
				
            </section>
		
		</div>	
        </section>
        <!--   end main-container   -->

<?php get_footer(); ?>