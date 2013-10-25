<?php 
/* ==================
 * The Loop (Main News and Blog)
 * ================== */
/* ==================
 - We look for regular posts syndicated from The Spotlight
 - that meets the targeted audience criteria.
 - This template pulls in just the most recent post. There will
 - be another template for all news items.
 */
global $ua;

/* ==================
 * Spotlight JSON API */
$spotlight_taxonomy_api_url 	= 'http://sherman2.library.nova.edu/sites/spotlight/api/taxonomy/get_taxonomy_posts/';
$spotlight_taxonomy 			= 'library-audience';
$spotlight_post_type			= 'post';

if      ( is_page( 'kids' ) || get_query_var( 'for' ) == 'kids' )   { $library_audience = 'kids'; }
elseif  ( is_page( 'teens' ) || get_query_var( 'for' ) == 'teens')  { $library_audience = 'teens'; }
else                                                                { $library_audience = 'public'; }
/* ==================
 * Latest Post */
$snews_jSON = json_decode( wp_remote_retrieve_body( wp_remote_get( $spotlight_taxonomy_api_url . '?taxonomy=' . $spotlight_taxonomy .'&slug=' . $library_audience . '&post_type=' . $spotlight_post_type . '&count=1', array( 'sslverify' => false) ) ), true); 

foreach ( $snews_jSON['posts'] as $response ) : 

$the_ID 		= $response['id'];
$the_permalink 	= $response['url'];
$the_title_attribute = $response['title_plain'];
$the_title 				= $response['title'];
$the_time				= $response['modified'];
$the_content 			= $response['content'];

?>


<!-- Content!
======================
-->	<div id="content">
	
		<div id="inner-content" class="wrap clearfix">
	
		    <div id="main" class="sevencol first clearfix" role="main">
				
			    <article id="post-<?php echo $the_ID; ?>" <?php post_class('clearfix contrast-against-white'); ?> role="article">
	    	
				    <header class="article-header">

				    	<h2 class="tera section-title">
				    		<em>News</em>
				    	</h2>					    
					    <h3><a href="<?php echo $the_permalink; ?>" rel="bookmark" title="<?php echo $the_title_attribute; ?>"><?php echo $the_title; ?></a></h3>

				    	<!--<p class="meta"> 
				    		<time class="icon-clock" datetime="<?php echo $the_time; ?>" pubdate>
								<?php //_e('Posted', 'bonestheme'); ?>
				    			<?php //the_time(get_option('date_format')); ?></time> 
			    			</p>-->

						 
				    </header> <!-- end article header -->
			
				    <section class="post-content clearfix">
					    <?php echo $the_content; ?>
				    </section> <!-- end article section -->
				
				    <footer class="article-footer">

				    </footer> <!-- end article footer -->
				    
				    <?php // comments_template(); // uncomment if you want to use them ?>
			
			    </article> <!-- end article -->
			<?php endforeach; ?>

		    </div> <!-- end #main -->

		    <?php get_sidebar('home'); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->