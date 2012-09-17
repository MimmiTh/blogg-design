<?php get_header(); ?>
				
	<div id="content" class="clearfix">    
		
		<div id="main" class="left clearfix" role="main">
			
				<?php if (is_category()) { ?>
					<h1 class="archive_title h2">
						<?php single_cat_title(); ?>
					</h1>
				<?php } elseif (is_tag()) { ?> 
					<h1 class="archive_title h2">
						<?php single_tag_title(); ?>
					</h1>
				<?php } elseif (is_author()) { ?>
					<h1 class="archive_title h2">
						<span><?php _e("Inlägg skrivna av"); ?></span> <?php get_the_author_meta('display_name'); ?>
					</h1>
				<?php } elseif (is_day()) { ?>
					<h1 class="archive_title h2">
						<?php the_time('l, F j, Y'); ?>
					</h1>
				<?php } elseif (is_month()) { ?>
				    <h1 class="archive_title h2">
				    	<?php the_time('F Y'); ?>
				    </h1>
				<?php } elseif (is_year()) { ?>
				    <h1 class="archive_title h2">
				    	<?php the_time('Y'); ?>
				    </h1>
				<?php } ?>

				<?php if (have_posts()) : while (have_posts()) : the_post();	
				
				if ( has_post_thumbnail() ) {?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class('index post clearfix'); ?> role="article"> 
						<figure class="left">
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumb-150' ); ?></a>
						</figure>            
						
						<section class="index post_content left">  
							<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1><span class="post-category">i <?php the_category(', '); ?></span>
							<?php the_excerpt(); ?><a class="read-more" href="<?php the_permalink() ?>">Läs mer &raquo;</a>
						</section>											
				</article> <!-- end article -->
			
			<?php } else { ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class('index post clearfix'); ?> role="article"> 
					<section class="index post_content full">  
							<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1><span class="post-category">i <?php the_category(', '); ?></span>
							<?php the_excerpt(); ?><a class="read-more" href="<?php the_permalink() ?>">Läs mer &raquo;</a>
					</section>											
				</article> <!-- end article -->
				<?php } ?>				
				
				<?php endwhile; ?>	
				
				<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
					
					<?php page_navi(); // use the page navi function ?>

				<?php } else { // if it is disabled, display regular wp prev & next links ?>
					<nav class="wp-prev-next">
						<ul class="clearfix">
							<li class="prev-link"><?php next_posts_link(_e('&laquo; Äldre inlägg')) ?></li>
							<li class="next-link"><?php previous_posts_link(_e('Nyare inlägg &raquo;')) ?></li>
						</ul>
					</nav>
				<?php } ?>
							
				
				<?php else : ?>
				
				<article id="post-not-found">
				    <header>
				    	<h1><?php _e("Inga inlägg än"); ?></h1>
				    </header>
				    <section class="post_content">
				    	<p><?php _e("Tyvärr verkar det inte finnas några inlägg här än, titta in igen om ett tag!"); ?></p>
				    	<p><a href="<?php echo home_url(); ?>">Till startsidan</a></p>
				    </section>
				    <footer>
				    </footer>
				</article>
				
				<?php endif; ?>
						
			</div> <!-- end #main -->
    
			<?php get_sidebar(); ?>
		
		<?php get_footer(); ?>
