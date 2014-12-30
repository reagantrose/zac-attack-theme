<?php get_header(); ?>

		<?php
		$page_template = get_post_meta($post->ID, '_page_template', TRUE);
		
		switch ($page_template):
			case 'blog':
				get_template_part( 'template', 'blog' );
			break;
			case 'portfolio':
				get_template_part( 'template', 'portfolio' );
			break;
			case 'contact':
				get_template_part( 'template', 'contact' );
			break;
			case 'sitemap':
				get_template_part( 'template', 'sitemap' );
			break;
			case 'homepage':
				?>
				
				<!--   main-container   -->
				<section id="main-container" class="container" role="main">
				<div class="sixteen columns">
				
					<?php				
					if (have_posts()) :	
						while (have_posts()) : the_post(); 
						the_content(); 
						endwhile; 
					endif;
					?>
				
				</div>
				</section>
				<!--   end main-container   -->
				
				<?php
			break;
			case 'default':
			default:
				
				$page_default = get_post_meta($post->ID, '_page_default', TRUE);				
				?>
								
				<!--   main-container   -->
				<section id="main-container" class="container" role="main">
				
					<?php
					switch ($page_default):
						case 'fw':
							?>
							<div class="sixteen columns content">
							<?php
						break;
						case 'ds':
							?>
							<div class="first">
							<div class="eight columns last content">
							<?php
						break;
						case 'lb':
							?>
							<div class="twelve columns last content">
							<?php
						break;
						case 'rb':
							?>
							<div class="twelve columns first content">
							<?php
						break;
					endswitch;
					
					get_template_part( 'library/includes/loop', 'page' );
					
					switch ($page_default):
						case 'fw':
							?>
							</div>
							<?php
						break;
						case 'ds':
							?>
							</div>
							<!--  sidebar right  -->
							<section id="sidebar" class="four columns first">
							<div class="st-left-sidebar">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Pages (left)')) : ?><?php endif; ?>
							</div>
							</section>
							<!--   end sidebar right   -->
							</div>
							<!--  sidebar right  -->
							<section id="sidebar" class="four columns last">
							<div class="st-right-sidebar">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Pages (right)')) : ?><?php endif; ?>
							</div>
							</section>
							<!--   end sidebar right   -->
							<?php
						break;
						case 'lb':
							?>
							</div>
							<!--  sidebar right  -->
							<section id="sidebar" class="four columns first">
							<div class="st-left-sidebar">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Pages (left)')) : ?><?php endif; ?>
							</div>
							</section>
							<!--   end sidebar right   -->
							<?php
						break;
						case 'rb':
							?>
							</div>
							<!--  sidebar right  -->
							<section id="sidebar" class="four columns last">
							<div class="st-right-sidebar">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Pages (right)')) : ?><?php endif; ?>
							</div>
							</section>
							<!--   end sidebar right   -->
							<?php
						break;
					endswitch;
					?>
				
				</section>
				<!--   end main-container   -->
				
				<?php		
			break;
		endswitch;
		?>

<?php get_footer(); ?>