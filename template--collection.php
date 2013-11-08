<?php
/* 
Template Name: Collection
*/
?>

<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	Featured Event related to the collection: i.e., Gaming Event for Games, Book Club for Books / Audiobooks, Live Band for Music ...

	<!-- Browse the Catalog
	======================
	-->	<section class="catalog search">

			<div class="wrap clearfix">

				<div class="fourcol first">
				<header class="gamma no-margin">
					<em>
					<?php if ( is_page( 'games' ) ) : ?>
						Search for a Game!
					<?php else : ?>
						Search the Catalog
					<?php endif; ?>
					</em>
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

			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
				    <div id="main" class="sevencol first clearfix" role="main">
					    
					
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


						<section>
							<header>
								<h2 class="mega">
									<em>F.A.Q.</em>
								</h2>
							</header>
							<p>
								Q: What should I put here? <br>
								A: Whatever you want ...
							</p>
						</section>
					 
						<section>
							<header>
								<h2 class="mega">
									<em>Suggest a Purchase</em>
								</h2>
							</header>
							<p>
								An embedded form - right hurr!
							</p>
						</section>
			
    				</div> <!-- end #main -->

					<div class="fivecol last">
						<div>
							Featured Item with Trailer
							<img src="//placehold.it/570x321" style="width: 100%;">
						</div>

						<div>
							Michael just rated Item a "Masterpiece!"<br>
							Put It on Hold
						</div>

						<div>
							LeThesha just rated Item a "Masterpiece!"<br>
							Put It on Hold
						</div>

						<div>
							Julie just rated Item a "Masterpiece!"<br>
							Put It on Hold
						</div>

						<div>
							Want to review something?
						</div>

						<div>
						Related Database
						<img src="//placehold.it/570x321" style="width: 100%;">
						</div>
					</div>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

	<?php endwhile; endif; ?>
<?php get_footer(); ?>