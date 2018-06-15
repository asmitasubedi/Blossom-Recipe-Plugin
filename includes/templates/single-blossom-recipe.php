
<?php get_header(); ?>
 
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header blog-header">
						
						<h1 class="entry-title"><?php the_title();?></h1>
						
					</header><!-- .entry-header -->

				<div class="entry-content">
					<?php
						
        				do_action('br_recipe_details_action');
        			?>

        				<span class="description" ><?php the_content();?></span>

        			<?php 
        				
        				do_action('br_recipe_ingredients_action');
        			?>

        			<?php 

        				do_action('br_recipe_instructions_action');
        			?>

        			<?php

        				do_action('br_recipe_notes_action');

        			?>
					
				</div><!-- .entry-content -->

				</article>

			<?php 				
			endwhile; // End of the loop.
			?>
    
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->
 
<?php get_footer(); ?>
