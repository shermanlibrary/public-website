<?php
/* ==================
 * $Databases
 * -- not the mysql-kind. We're puzzling this post-type together
 * so it's easier for staff to post about a database or
 * resource and kind of specially format it. We want to
 * make sure that we can
 * 1. Include a logo
 * 2. Write content and embed screenshots.
 * 3. Associate these resources with a custom
 * 		taxonomy that we can use to pair content
 *		--using the JSON API--with the major
 *		subject categories for our library databases.
 * 4. Match tutorials or other resources (if they exist).
 */

// let's create the function for the custom type
function post_type_databases() { 
	// creating (registering) the custom type 
	register_post_type( 'spotlight_databases', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Databases', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Database', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Resource Posts', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Spotlight a New One!', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Library Database', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Library Databses', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Library Database', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Library Database', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Library Database', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in the trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Promote electronic resources with this post-type, right here.', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 4, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'databases', 'with_front' => false ), /* you can specify it's url slug */
			'has_archive' => 'databases', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this ads your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'spotlight_databases');
	/* this ads your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'spotlight_databases');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'post_type_databases');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'resource-subjects', 
    	array('spotlight_databases'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Database Subjects', 'bonestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Database Subject', 'bonestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Database Subjects', 'bonestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Database Subjects', 'bonestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent DB Subject', 'bonestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent DB Subject:', 'bonestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Subject', 'bonestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Subject', 'bonestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Databse Subject', 'bonestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Database Subject Name', 'bonestheme' ) /* name title for taxonomy */
    		),
    		'show_ui' => true,
    		'query_var' => true,
    		'capabilities' => array(
    			'manage_terms' => 'admin',
    			'edit_terms' => 'admin',
    			'delete_terms' => 'admin',
    			'assign_terms' => 'admin'
    		),
    	)
    );   
    
	// now let's add custom tags (these act like categories)
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
?>