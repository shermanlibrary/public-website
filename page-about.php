<?php get_header(); ?>

	<div class="feature feature-image" id="feature" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>); ">
		<div id="inner-feature" class="clearfix">
				<figure class="caption">
					<blockquote>
						<header>
							<em class="gamma">Our Mission</em>
						</header>
						<p class="delta">
							The Nova Southeastern University Libraries collaborate to be the premier research, cultural, and lifelong learning centers for NSU and the community.
						</p>
					</blockquote>
				</figure>
		</div><!--.inner-feature-->
	</div>

			<section id="panels" class="align-center clearfix" style="border-top: 1px solid white;">
				<div class="panel one-third catalog">
					
					<a class="align-bottom button epsilon" href="<?php echo home_url('/hours/'); ?>" title="Library Hours">
						Hours 
					</a>
				</div>
				
				<div class="panel one-third library-card">

					<a class="align-bottom button epsilon" href="#directions">
						Directions
					</a>

				</div>

				<div class="panel one-third third-panel">					

					<a class="align-bottom button epsilon" href="#">
						Contact Info
					</a>

				</div>
			</section>

			<section class="align-center clearfix">
				<div class="panel one-fourth games" style="background-color: #21aabd;">
					<a class="align-bottom button epsilon" href="#">
						Library Card
					</a>
				</div>

				<div class="panel one-fourth dictionary" style="background-color: #61D4E4;">
					<a class="align-bottom button epsilon" href="//sherman.library.nova.edu/sites/friends" title="Alvin Sherman Library Circle of Friends">
						Circle of Friends
					</a>
				</div>

				<div class="panel one-fourth" style="background-color: #4b5971;">
					<a class="align-bottom button epsilon" href="#">
						Services
					</a>
				</div>

				<div class="panel one-fourth" style="background-color: #75D4BA;">
					<a class="align-bottom button epsilon" href="#">
						Policies
					</a>
				</div>

			</section>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">	

					<section id="welcome" class="clearfix">
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

	    				<?php get_sidebar( 'home' ); ?>
    				</section>

				<!-- Library Hours
				======================
				-->	<section id="hours" style="margin-top: 3em; ">
						<header class="section-header">
							<a name="hours"></a>
							<h2 class="icon-clock giga">
								<em>Hours</em>
							</h2>
						</header>

						<p>Hours Here.</p>

    				</section>	

				<!-- Library Hours
				======================
				-->	<section id="directions" style="margin-top: 3em; ">
						<header class="section-header">
							<a name="directions"></a>
							<h2 class="giga icon-safari">								
								<em>Directions</em>
							</h2>
						</header>

						<div class="vcard">
							<p class="address">
								<i>
									<span class="fn">Alvin Sherman Library, Research, and Information Technology Center</span> <br>
									<span class="street-address">3100 Rey Ferrero, Jr. Blvd</span><br>
									<span class="region">Fort Lauderdale - Davie, Florida  33314 - 7796</span>
								</i>
							</p>
						</div>

						<!-- Map
						======================
						--> <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=3100+Ray+Ferrero,+Jr.+Blvd.+Alvin+Sherman+Library&amp;aq=&amp;sll=26.076115,-80.276369&amp;sspn=0.251943,0.268822&amp;ie=UTF8&amp;hq=3100+Ray+Ferrero,+Jr.+Blvd.+Alvin+Sherman+Library&amp;hnear=&amp;ll=26.079459,-80.242542&amp;spn=0.251755,0.268822&amp;t=m&amp;z=12&amp;iwloc=A&amp;cid=4794388343535914270&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=3100+Ray+Ferrero,+Jr.+Blvd.+Alvin+Sherman+Library&amp;aq=&amp;sll=26.076115,-80.276369&amp;sspn=0.251943,0.268822&amp;ie=UTF8&amp;hq=3100+Ray+Ferrero,+Jr.+Blvd.+Alvin+Sherman+Library&amp;hnear=&amp;ll=26.079459,-80.242542&amp;spn=0.251755,0.268822&amp;t=m&amp;z=12&amp;iwloc=A&amp;cid=4794388343535914270" style="color:#0000FF;text-align:left">View Larger Map</a></small>

    				</section>	
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->	

					
		<?php endif; ?>	

<?php get_footer(); ?>