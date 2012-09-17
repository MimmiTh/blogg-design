<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
		wp_title( '-', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' - ' . sprintf( __( 'Sida %s', 'twentyeleven' ), max( $paged, $page ) );
		?></title>
		
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

		<!-- default stylesheet -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/normalize.css">		
		
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
				
		<!-- modernizr -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/modernizr.full.min.js"></script>
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		
		<!-- Dot dot dot Jquery ellipsis script -->		
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.dotdotdot-1.5.1.js"></script>
		
		<!-- Flexslider -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/js/flexslider/flexslider.css" type="text/css">
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/flexslider/jquery.flexslider.js"></script>
		
		<script type="text/javascript">
			$(window).load(function() {
				$('.featured').flexslider();
			});
		</script>
		
		<script>
					 $(document).ready(function() {
						$("section.index.post_content").dotdotdot({
								 after: "a.read-more"
						});
					});
		</script>
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		
	</head>
	
	<body <?php body_class(); ?>>
    	
		<div id="container">
			
			<div id="menu-outer-container">
				<div id="menu-inner-container">
					<?php wp_nav_menu(array( 'container' => 'nav','container_id' => 'mainmenu')); ?>
					<?php get_search_form(); ?>
				</div>
			</div>
