<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="left clearfix" role="main">
				
					<h1 class="archive_title h2">
						<span><?php _e("Artiklar skrivna av:"); ?></span> 
						<!-- google+ rel=me function -->
						<?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
						$google_profile = get_the_author_meta( 'google_profile', $curauth->ID );
						if ( $google_profile ) {
							echo '<a href="' . esc_url( $google_profile ) . '" rel="me">' . $curauth->display_name . '</a>'; ?></a>
						<?php } else { ?>
						<?php echo get_the_author_meta('display_name', get_query_var('author')); ?>
						<?php } ?>
					</h1>
					
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
							<div class="excerpt ellipsis multiline"><p><?php the_excerpt(); ?></p></div>
					</section>											
				</article> <!-- end article -->
				<?php } ?>				
					
				<?php endwhile; ?>
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
