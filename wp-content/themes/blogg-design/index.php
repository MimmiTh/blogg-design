<?php get_header(); ?>
	   
	<div id="content" class="clearfix">
		<div id="main" class="clearfix left" role="main">
			<?php if (get_query_var('paged') <= 1) { ?>
			<article class="featured flexslider">
				<ul class="slides">			
					<?php 
						$args = array(
							'meta_query' => array(
								array(
									'key' => 'featured',
									'value' => '1',
									'compare' => 'LIKE'
								)
							)
						);
						
					$featuredquery = new WP_Query($args);
					
					while ($featuredquery->have_posts()) : $featuredquery->the_post(); ?>

						<li>
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumb-700' ); ?></a>
							<section class="clearfix">
								<h1>Utvald: <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
								<span class="post-category"><?php the_category(', '); ?></span><br>
								<?php the_excerpt(); ?>
								<a class="read-more" href="<?php the_permalink() ?>">Läs mer &raquo;</a>
							</section>			
						</li>

					<?php endwhile;
					wp_reset_postdata(); ?>
				</ul>
			</article>
			<?php } ?>
			
			<div id="posts-container">
			<?php if (have_posts()) : while (have_posts()) : the_post();
			
			if ( has_post_thumbnail() ) {?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class('index post clearfix'); ?> role="article"> 
						<figure class="left">
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumb-150' ); ?></a>
						</figure>            
						
						<section class="index post_content left">  
							<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1><span class="post-category">i <?php the_category(', '); ?></span>
							<div class="excerpt ellipsis multiline"><?php the_excerpt(); ?></div>
						</section>											
				</article> <!-- end article -->
			
			<?php } else { ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class('index post clearfix'); ?> role="article"> 
					<section class="index post_content full">  
							<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1><span class="post-category">i <?php the_category(', '); ?></span>
							<div class="excerpt ellipsis multiline"><?php the_excerpt(); ?></div>
					</section>											
				</article> <!-- end article -->
				<?php } ?>				
									
				<?php comments_template(); ?>
						
			<?php endwhile; ?>	
								
				<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
					<?php page_navi(); // use the page navi function ?>
							
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
					
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries')); ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;')); ?></li>
							</ul>
						</nav>
						
					<?php } ?>		
						
					<?php else : ?>
						<article id="post-not-found">
							<header>
								<h1>Hittades inte</h1>
							</header>
							<section class="post_content">
								<p>Tyvärr hittades inte det du söker efter.</p>
							</section>
							
						</article>
						
				<?php endif; ?>
			</div>
							
		</div> <!-- end #main -->
    
		<?php get_sidebar(); ?>

<?php get_footer(); ?>

