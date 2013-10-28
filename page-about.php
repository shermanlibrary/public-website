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

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->	

					
		<?php endif; ?>	

<?php get_footer(); ?>