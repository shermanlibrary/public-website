<?php get_header(); ?>

	<!-- Map
	======================
	--> <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=3100+Ray+Ferrero,+Jr.+Blvd.+Alvin+Sherman+Library&amp;aq=&amp;sll=26.076115,-80.276369&amp;sspn=0.251943,0.268822&amp;ie=UTF8&amp;hq=3100+Ray+Ferrero,+Jr.+Blvd.+Alvin+Sherman+Library&amp;hnear=&amp;t=m&amp;cid=4794388343535914270&amp;ll=26.201654,-80.223541&amp;spn=0.215631,0.892639&amp;z=11&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=3100+Ray+Ferrero,+Jr.+Blvd.+Alvin+Sherman+Library&amp;aq=&amp;sll=26.076115,-80.276369&amp;sspn=0.251943,0.268822&amp;ie=UTF8&amp;hq=3100+Ray+Ferrero,+Jr.+Blvd.+Alvin+Sherman+Library&amp;hnear=&amp;t=m&amp;cid=4794388343535914270&amp;ll=26.201654,-80.223541&amp;spn=0.215631,0.892639&amp;z=11&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>

	
		<div id="content">
		
			<div id="inner-content" class="wrap clearfix">	

				    <div id="main" class="sevencol first clearfix" role="main">

				    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						    <header class="article-header">
								<h2 class="tera page-title" itemprop="headline">
									<em><?php the_title(); ?></em>
								</h2>
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
					
    				</div> <!-- end #main -->

			</div> <!-- end #inner-content -->

		</div> <!-- end #content -->	

				
	<?php endif; ?>	

<?php get_footer(); ?>