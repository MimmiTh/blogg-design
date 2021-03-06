<?php
/*
Template Name: Free Designs
*/?>
<?php get_header(); ?>
	   
	<div id="content" class="clearfix">
		<div id="main" class="left" role="main">
		<div class="page_content clearfix">				
			
			<?php if(have_posts()) : while (have_posts()) : the_post();
				$content = get_the_content();
				if (!empty($content)) {
					print '<div class="free-designs-description">';
					print '<h1 class="archive_title h2">Gratis bloggdesigner till blogg.se</h1>';
					print $content;
					print '</div>';
				}
			endwhile; endif; ?>

			<div class="designs clearfix">
			<?php $args = array( 'post_type' => 'custom_type', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<article class="design">
					<figure>
						<a href="<?php print get_post_meta($post->ID , 'post_url', true); ?>"><?php the_post_thumbnail( 'thumb-320' );?></a>
						<figcaption>
							<h2 class="h4"><?php the_title();?></h2>
							<?php the_excerpt(); ?>
						</figcaption>
					</figure>
				</article>
	
			<?php endwhile; ?>

			</div>
			
		</div>

		</div> <!-- end #main -->
    
		<?php get_sidebar(); ?>
		
		<?php get_footer(); ?>
