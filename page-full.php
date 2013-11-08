<?php 
/*
	Template Name: Full Width
*/
?>

<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="wrap clearfix">
	
		    <div id="main" role="main">

			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				
				    <header class="article-header">
						<h1 class="page-title tera" itemprop="headline">
							<em><?php the_title(); ?></em>
						</h1>
				    </header> <!-- end article header -->
			
				    <section class="post-content clearfix" itemprop="articleBody">
					    <?php the_content(); ?>
					</section> <!-- end article section -->
				
				    <footer class="article-footer wrap clearfix">
	
					    <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
						
				    </footer> <!-- end article footer -->
				    
				    <?php //comments_template(); ?>
			
			    </article> <!-- end article -->
			
			    <?php endwhile; ?>		
			
			    <?php else : ?>
			
				    <article id="post-not-found" class="hentry clearfix">
				    	<header class="article-header">
				    		<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
				    	</header>
				    	<section class="post-content">
				    		<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
				    	</section>
				    	<footer class="article-footer">
				    	    <p><?php _e("This is the error message in the page.php template.", "bonestheme"); ?></p>
				    	</footer>
				    </article>
			
			    <?php endif; ?>
	
			</div> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>