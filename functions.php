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

/************* INCLUDE NEEDED FILES ***************/

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
*/
require_once('library/bones.php'); // if you remove this, bones will break


/*********************
THEME SUPPORT
*********************/
add_theme_support('post-thumbnails');   

// default thumb size   
set_post_thumbnail_size(125, 70, true);   

// wp custom background (thx to @bransonwerner for update)
add_theme_support( 'custom-background',
    array( 
    'default-image' => '',  // background image default
    'default-color' => '', // background color default (dont add the #)
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
    )
);      

// rss thingy           
add_theme_support('automatic-feed-links'); 

// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

// adding post format support
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

// wp menus
add_theme_support( 'menus' );  

// registering wp3+ menus          
register_nav_menus(                      
    array( 
        'mobile-menu' => __( 'Mobile Menu', 'bonestheme' ),
        'secondary-menu' => __( 'Secondary Menu', 'bonestheme' )
    )
);

/*
2. library/custom-post-type.php
    - an example custom post type
    - example custom taxonomy (like categories)
    - example custom taxonomy (like tags)
*/
require_once('library/post-type--databases.php'); // you can disable this if you like
/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
    - prevent users from disabling core plugins
*/
require_once('library/admin.php'); // this comes turned off by default
require_once('library/custom-fields.php');
/*
4. library/translation/translation.php
    - adding support for other languages
*/
/*
5. library/bundles/something.php
    - bundles crucial plugins.
*/
//require_once('library/bundles/series/orgSeries.php');
// require_once('library/translation/translation.php'); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'media-small', 350, 193, true );
add_image_size( 'media-medium', 570, 321, true );
add_image_size( 'media-large', 720, 405, true );
add_image_size( 'media-jumbo', 1140, 641, true );

add_image_size( 'feature-small', 720, 281, true);
add_image_size( 'feature-medium', 1028, 402, true);
add_image_size( 'feature-large', 1280, 500, true);
add_image_size( 'feature-jumbo', 1366, 534, true);
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
 * is_tree() function that tests if a page has a certain parent */
function is_tree($pid)
{
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
 * $URL PARAMETERS
 */ // http://codex.wordpress.org/Function_Reference/get_query_var
function add_query_vars_filter( $vars ) {
    $vars[] = 'for';
    return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

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
 * $POST-VIEWS
 */
// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count;
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}



// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
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

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function sherman_wpsearch() {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '">
    <input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('What are you looking for?','bonestheme').'" x-webkit-speech speech />
    <input class="search-button" type="submit" id="searchsubmit" value="'. esc_attr__('Go') .'" />
    </form>';
    return $form;
} // don't remove this bracket!
