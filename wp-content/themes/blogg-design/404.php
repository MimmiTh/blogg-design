<?php get_header(); ?>
			
		<div id="content" class="clearfix">
			
			<div id="main" class="left search" role="main">

				<article id="post-not-found" class="clearfix">
						
					<header>							
						<h1><?php _e("404 - Nu gick något snett!"); ?></h1>						
					</header> <!-- end article header -->
					
					<section class="post_content">							
						<p><?php _e("Nu blev något fel, det du letar efter verkar inte finnas. Kanske har du stavat fel, eller så har jag kanske gjort något knasigt."); ?></p>					
					</section> <!-- end article section -->
            
					<section>
						<p><a href="<?php echo home_url(); ?>">Hoppa till startsidan!</a></p>
					</section>
						
					<footer>							
					</footer> <!-- end article footer -->
					
				</article> <!-- end article -->
															
			</div> <!-- end #main -->
				
			<div id="sidebar" class="sidebar right clearfix" role="complementary">
	
				<div id="logo"><h1><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1></div>
				<p class="bloginfo"><?php bloginfo('description'); ?></p>
					
			</div>
			
    <?php get_footer(); ?>
