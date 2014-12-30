<?php get_header(); ?>
		
        <!--   main-container   -->
        <section id="main-container" class="container" role="main">
		
		    <div class="twelve columns first content">
			
            	<?php get_template_part( 'library/includes/loop', 'index' ); ?>
				
				<div class="clearfix"></div>
				
				<?php if (function_exists('slicetheme_pagenav')) { slicetheme_pagenav(); } else { ?>
				<div class="content-nav">
					<div class="content-prev"><?php next_posts_link( __('Older Entries', 'slicetheme') ); ?></div>
					<div class="content-next"><?php previous_posts_link( __('Newer Entries', 'slicetheme') ); ?></div>
				</div>
				<?php } ?>
			   
            </div>
			
        	<!--  sidebar right  -->
        	<section id="sidebar" class="four columns last">
			<div class="st-right-sidebar">
            	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar General (right)')) : ?><?php endif; ?>
            </div>
			</section>
            <!--   end sidebar right   -->
		
        </section>
        <!--   end main-container   -->

<?php get_footer(); ?>