<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

// Get Bones Core Up & Running!
require_once('library/bones.php');            // core functions (don't remove)
require_once('library/plugins.php');          // plugins & extra functions (optional)
require_once('library/bloggdesign-custom-post-type.php'); // custom post type example
require_once('library/slideshow-custom-post-type.php'); // custom post type example

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size( 'bones-thumb-560', 560, 200, true );
add_image_size( 'thumb-150', 150, 150, true );
add_image_size( 'thumb-700', 700, 150, true );
add_image_size( 'thumb-220', 220, 200, true );
/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
  
    register_sidebar(array(
    	'id' => 'sidebar',
    	'name' => 'Sidebar',
    	'description' => 'Sidebaren. Visas på alla sidor.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h2 class="widgettitle h3">',
    	'after_title' => '</h2>',
    ));
    
    register_sidebar(array(
        'id' => 'post-bottom',
        'name' => 'Post, bottom',
        'description' => 'Yta under poster, efter författarrutan.',
        'before_widget' => '<div id="%1$s" class="widget post-bottom %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle h3">',
        'after_title' => '</h2>',
    ));

    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Sidebar 2',
    	'description' => 'The second (secondary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
				<?php edit_comment_link(__('(Edit)'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="help">
          			<p><?php _e('Your comment is awaiting moderation.') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" class="searchform" action="' . home_url( '/' ) . '" >
    <input type="image" class="searchsubmit" alt="search" src="'.get_template_directory_uri().'/library/images/search.png" />
    <input type="search" placeholder="'.__("Sök...").'" value="' . get_search_query() . '" name="s" class="s" />
    </form>';
 
    return $form;
    
} // don't remove this bracket!

//Add CSS files
function add_theme_styles() {
    //normalization
    wp_enqueue_style('normalize', get_template_directory_uri() . '/library/css/normalize.css', false, null, 'all');

    //Font awesome webfont
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/library/css/font-awesome.css', false, null, 'all');

    //Base theme style
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', false, null, 'all');

    //Flexslider
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/library/js/flexslider/flexslider.css', false, null, 'all');    

    //IE-only stylesheets
    global $is_IE;
    if ($is_IE) {
        wp_enqueue_style('font-awesome-ie7', get_template_directory_uri() . '/library/css/font-awesome-ie7.css', false, '2.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'add_theme_styles');

//Add JS files
function add_theme_scripts() {
    //Modernizr
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/library/js/modernizr.full.min.js', false, null, true);

    //Dotdotdot
    wp_enqueue_script('ellipsis', get_template_directory_uri() . '/library/js/jquery.ellipsis.js', false, null, true);

    //Flexslider
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/library/js/flexslider/jquery.flexslider-min.js', false, null, true);

    //Custom scripts
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/library/js/scripts.js', false, null, true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

?>
