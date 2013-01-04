<div id="sidebar" class="sidebar right clearfix" role="complementary">
	
	<div id="logo"><h1><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1></div>
	<p class="bloginfo"><?php bloginfo('description'); ?></p>

	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	<?php else : ?>
		<div class="help">
			<p>Please activate some Widgets.</p>
		</div>
	<?php endif; ?>
	
			<footer role="contentinfo">
			
			<div id="inner-footer" class="clearfix">

				<p class="attribution">Klock- (Infinity Kim) och taggikon från <a href="http://thenounproject.com/">The Noun Project</a>.
						
			</div> <!-- end #inner-footer -->
						
		</footer> <!-- end footer -->
</div>
