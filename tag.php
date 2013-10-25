<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="clearfix">
				
				    <div id="main" class="clearfix" role="main">
				
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('contrast-against-dark clearfix portlet'); ?> role="article">
							
							<div class="wrap">
							<div class="fourcol first">
							<div class="media">
	    						<?php $thumbnail = 'http://www.nova.edu/library/video/' . get_post_meta( get_the_ID(), 'academy_video_file', true ) . '.jpg'; ?>
								<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<img src="<?php echo $thumbnail; ?>">					
								</a>
							</div></div>

							<div class="eightcol last">
						    <h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

						    <p class="meta">
								<time class="icon-calendar" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate> 
									<?php the_time('F jS, Y'); ?>
								</time> 

								<span class="icon-mobile"> <?php echo getPostViews(get_the_ID()); ?> views</span>
							</p>			

						    <section class="post-content clearfix">
						
								    <?php the_excerpt(); ?>
					
						    </section> <!-- end article section -->
						    </div>
						    </div>
					
					    </article> <!-- end article -->
					
					    <?php endwhile; ?>	
					
					        <?php if (function_exists('bones_page_navi')) { // if experimental feature is active ?>
						
						        <?php bones_page_navi(); // use the page navi function ?>

					        <?php } else { // if it is disabled, display regular wp prev & next links ?>
						        <nav class="wp-prev-next">
							        <ul class="clearfix">
								        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							        </ul>
					    	    </nav>
					        <?php } ?>
					
					    <?php else : ?>
					
    					    <article id="post-not-found" class="hentry clearfix">
    						    <header class="article-header">
    							    <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
    					    	</header>
    						    <section class="post-content">
    							    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
        						</section>
    	    					<footer class="article-footer">
    		    				    <p><?php _e("This is the error message in the archive.php template.", "bonestheme"); ?></p>
    			    			</footer>
    				    	</article>
					
					    <?php endif; ?>
			
    				</div> <!-- end #main -->
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>