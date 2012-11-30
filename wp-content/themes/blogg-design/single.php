<?php get_header(); ?>
			
		<div id="content" class="clearfix">
			
			<div id="main" class="left clearfix" role="main" itemscope itemtype="http://schema.org/BlogPosting">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
							
							<p class="meta"><span class="time"><time datetime="<?php echo the_time('Y-m-j'); ?>" itemprop="dateCreated" content="<?php echo the_time('Y-m-d'); ?>"><?php the_time('j F Y'); ?></time></span><span class="category"><?php the_category(', '); ?></span>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
						
							<?php the_content(); ?>
											
						</section> <!-- end article section -->
						
						<footer id="post-footer" class="single">
			
							<?php the_tags('<p class="tags"><span class="tags-title">Taggar:</span> ', ', ', '</p>'); ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->

					<!-- Author info-->
					<aside class="author_info" itemscope itemtype="http://schema.org/Person" itemprop="author">
						<figure>
							<?php echo get_avatar(get_the_author_meta('ID'), 150, 'Mystery Man', 'Avatar tillhörande '.get_the_author_meta('display_name')); ?>
							<?php
							$website = get_the_author_meta('user_url');
							$googleplus = get_the_author_meta('googleplus');
							$facebook = get_the_author_meta('user_fb');
							$twitter = get_the_author_meta('user_tw');
							
							if ($user_url || $googleplus || $facebook || $twitter) {
								echo '<div class="centeredlinks">';
									echo '<ul class="author_links">';
										if ($website) {
											echo '<li><a href="'.$website.'"><img src="'.get_bloginfo('template_directory').'/library/images/home.png" width="18" height="18" alt="Hemsida"></a></li>';
										}
										if ($googleplus) {
											echo '<li class="gplus"><a href="'.$googleplus.'?rel=author">Google+</a></li>';
										}
										if ($twitter) {
											echo '<li><a href="'.$twitter.'"><img src="'.get_bloginfo('template_directory').'/library/images/twitter.png" width="18" height="18" alt="Twitter"></a></li>';
										}
										if ($facebook) {
											echo '<li><a href="'.$facebook.'"><img src="'.get_bloginfo('template_directory').'/library/images/fb.png" width="18" height="18" alt="Facebook"></a></li>';
										}
										
									echo '</ul>';
								echo '</div>';
							}
							?>
						</figure>
						<div>
							<h2>Skrivet av <span itemprop="name"><?php the_author_posts_link(); ?></span></a></h2>
							<p><?php the_author_meta('description'); ?></p>
						</div>
					</aside> <!-- end author info -->

					<!-- Related posts -->
					<?php if (function_exists('related_posts')) {
						echo '<div class="related_posts">';
						echo '<h2 class="widgettitle h3">Relaterade artiklar</h2>';
						related_posts();
						echo '</div>';
					} ?>

					<!-- Post bottom, widgetized area -->
					<?php 
					if (is_active_sidebar('post-bottom')) {
						dynamic_sidebar('post-bottom');
					}
					?>
					
					<!-- Comments -->
					<?php comments_template(); ?>
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1>Not Found</h1>
					    </header>
					    <section class="post_content">
					    	<p>Sorry, but the requested resource was not found on this site.</p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
				
				</div> <!-- end #main -->
    
			<?php get_sidebar(); ?>
        
			<?php get_footer(); ?>
