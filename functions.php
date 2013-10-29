<?php

/* ==================
 * Nasty Hobbitses
 * ================== */
/* ==================
 * For use for a little bit of icky, user-agent templating,
 * mostly to handle responsive images for features.
 * We can't figure out how to get Detector to work inside a
 * WordPress, yet; until then we will use the UAParser directly,
 * with the intention to fully implement Detector when possible. */
require_once('library/Detector/lib/ua-parser-php/UAParser.php'); $ua = UA::parse(); 

/* ==================
 * Needed Files
 * ================== */
/*
1. library/bones.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqeueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/ require_once('library/bones.php'); // if you remove this, bones will break

/*
2. library/custom-post-type.php
    - an example custom post type
    - example custom taxonomy (like categories)
    - example custom taxonomy (like tags)
*/ // No custom post-types yet for PLS :-)

/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
    - prevent users from disabling core plugins
*/  require_once('library/admin.php'); // this comes turned off by default
    require_once('library/custom-fields.php');

/*
4. library/translation/translation.php
    - adding support for other languages
*/ // require_once('library/translation/translation.php'); // this comes turned off by default
/*


/* ==================
 * Thumbnails
 * ================== */
set_post_thumbnail_size(125, 70, true);   // Default Thumbnail
add_image_size( 'media-small', 350, 193, true );
add_image_size( 'media-medium', 570, 321, true );
add_image_size( 'media-large', 720, 405, true );
add_image_size( 'media-jumbo', 1140, 641, true );

add_image_size( 'feature-small', 720, 281, true);
add_image_size( 'feature-medium', 1028, 402, true);
add_image_size( 'feature-large', 1280, 500, true);
add_image_size( 'feature-jumbo', 1366, 534, true);

/* ==================
 * Theme Support
 * ================== */    
add_theme_support('post-thumbnails');   
add_theme_support( 'custom-background',
    array( 
    'default-image' => '',  // background image default
    'default-color' => '', // background color default (dont add the #)
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
    )
);      
add_theme_support('automatic-feed-links'); 
add_theme_support( 'post-formats',  
    array( 
        'aside',             // title less blurb
        'gallery',           // gallery of images
        'link',              // quick link to other site
        'image',             // an image
        'quote',             // a quick quote
        'status',            // a Facebook like status update
        'video',             // video 
        'audio',             // audio
        'chat'               // chat transcript 
    )
);  
add_theme_support( 'menus' );  

/* ==================
 * Built-In Menus */
register_nav_menus(                      
    array( 
        'mobile-menu' => __( 'Mobile Menu', 'bonestheme' ),
        'secondary-menu' => __( 'Secondary Menu', 'bonestheme' )
    )
);

/* ==================
 * $MENU Functions
 * ================== */
/* ==================
 * Note: there is most certainly a better way to generate
 * this menu dynamically using wp_nav_menu(), but based 
 * on the deadline at the time of this excuse I figured I'd
 * hard code it. Sorry!!! - Michael Schofield
 */ require_once('library/menu.php');

/* ==================
 * $SIDEBARS
 * ================== */
// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
        'id' => 'home',
        'name' => 'Front Page Sidebar (sans Container)',
        'description' => 'This sidebar appears specifically on the front page. Use wisely. This sidebar has no container.',
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="section-title hide-text">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'id' => 'video',
        'name' => 'Single Video Sidebar (sans Container)',
        'description' => 'This sidebar appears specifically on the individual videos. Use wisely. This sidebar has no container.',
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="section-title hide-text">',
        'after_title' => '</h3>',
    ));
} // don't remove this bracket!

/* ==================
 * Helper Functions
 * ================== */
/* ==================
 * is_tree() function that tests if a page has a certain parent */
function is_tree($pid) {
  global $post;

  $ancestors = get_post_ancestors($post->$pid);
  $root = count($ancestors) - 1;
  $parent = $ancestors[$root];

  if(is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors)))
  {
    return true;
  }
  else
  {
    return false;
  }
};

/* ==================
 * $URL PARAMETERS
 */ // http://codex.wordpress.org/Function_Reference/get_query_var
function add_query_vars_filter( $vars ) {
    $vars[] = 'for';
    return $vars;
} add_filter( 'query_vars', 'add_query_vars_filter' );

/* ==================
 * $POST-TYPES in RESULTS
 */ // Let's not discriminate ...
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'spotlight_databases', 'nav_menu_item'
        ));
      return $query;
    }
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

/* ==================
 * Comments
 * ================== */
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
			    <?php /*
			        this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			        echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			    */ ?>
			    <!-- custom gravatar call -->
			    <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>&s=32" class="load-gravatar avatar avatar-48 photo" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			    <!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				<!--<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>-->
				
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="alert info">
          			<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            <?php edit_comment_link(__('Edit', 'bonestheme'),'  ','') ?>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/* ==================
 * Search
 * ================== */
// Search Form
function sherman_wpsearch() {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '">
    <input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search our Website','bonestheme').'" x-webkit-speech speech />
    <input class="search-button" type="submit" id="searchsubmit" value="'. esc_attr__('Go') .'" />
    </form>';
    return $form;
} // don't remove this bracket!
