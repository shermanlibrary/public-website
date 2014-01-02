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

	<!-- Browse the Catalog
	======================
	-->	<section class="catalog search shadow">

			<div class="wrap clearfix">

				<div class="fourcol first">
				<header class="gamma no-margin">
					<em>Looking for something?</em>
				</header>
				</div>

				<div class="eightcol last">
					<form class="align-left" role="search" method="get" id="searchform" action="#">
					    <input type="search" value="" name="s" id="s" placeholder="<?php echo esc_attr__('Harry Potter ...','bonestheme') ?>" x-webkit-speech speech />
					    <input class="search-button" type="submit" id="searchsubmit" value="<?php echo esc_attr__('Find') ?>" />
				    </form>
			    </div>

			</div><!--/.wrap-->

		</section><!--/.catalog-->

			<nav id="panels" class="panels align-center clearfix" role="navigation">
	
				<div class="panel one-fourth catalog">					

					<a class="align-bottom button" href="<?php echo get_permalink( 118 ); ?>" title="<?php echo get_the_title( 118 ); ?>">
						Collection
					</a>

				</div>

				<div class="panel one-fourth event">

					<a class="align-bottom button" href="#">
						Services
					</a>

				</div>

				<div class="panel one-fourth new-and-good">
					<a class="align-bottom button epsilon" href="#">
						Policies
					</a>
				</div>

				<div class="panel one-fourth help">
					<a class="align-bottom button epsilon" href="#">
						Help
					</a>
				</div>

			</nav>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">	

				<figure class="caption">
					<blockquote>
						<header>
							<em class="gamma">Did you know?</em>
						</header>
						<p class="delta">
							The Alvin Sherman Library, Research, and Information Technology
							Center is anique joint-use facility serving the residents of Broward County
							as well as NSU students, faculty, and staff members.
						</p>
					</blockquote>
				</figure>

					<section id="welcome" class="clearfix">
					    <div id="main" class="eightcol first clearfix" role="main">

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

	    				<p>About page wishlisht: Who is Alvin Sherman? Art in the Building.</p>
    				</section>

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->	

					
		<?php endif; ?>	

<?php get_footer(); ?>