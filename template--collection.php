<?php
/* 
Template Name: Collection
*/
?>

<?php get_header(); ?>
	
	<?php get_template_part( 'template--recommendation-feature' ); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<!-- Browse the Catalog
	======================
	-->	<section class="catalog search shadow">

			<div class="wrap clearfix">

				<div class="fourcol first">
				<header class="gamma no-margin">
					<em>
					<?php if ( is_page( 'books' ) ) : ?>
						Find something to read
					<?php elseif ( is_page( 'games' ) ) : ?>
						Search for a Game!
					<?php else : ?>
						Search the Catalog
					<?php endif; ?>
					</em>
				</header>
				</div>

				<div class="eightcol last">
					<form class="align-left" role="search" method="get" id="searchform" action="#">
					    <input type="search" value="" name="s" id="s" placeholder="<?php echo esc_attr__('Enders Game, Hyperion, Mark Twain, etc ...', 'bonestheme') ?>" x-webkit-speech speech />
					    <input class="search-button" type="submit" id="searchsubmit" value="<?php echo esc_attr__('Go') ?>" />
				    </form>
			    </div>

			</div><!--/.wrap-->

		</section><!--/.catalog-->

			<div id="content">
			
			
				<div id="inner-content" class="wrap clearfix">

					<?php if ( is_page( array( 'audiobooks', 'books', 'genealogy' ) ) ) { get_template_part( 'template--recommendations' ); }?>

			
				    <div id="main" class="sevencol first clearfix" role="main">
					    
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						    <header class="article-header">
								<!--<h1 class="page-title tera" itemprop="headline">
									<em><?php the_title(); ?></em>
								</h1>-->
						    </header> <!-- end article header -->
					
						    <section class="post-content clearfix" itemprop="articleBody">
						    	Staff can feature best-seller lists, relevant events, FAQs about the collection (like games), etc.
							    <?php the_content(); ?>
							</section> <!-- end article section -->
						
						    <footer class="article-footer wrap clearfix">
			
							    <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
								
						    </footer> <!-- end article footer -->
						    
						    <?php //comments_template(); ?>
					
					    </article> <!-- end article -->	

<!--
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
	-->		
    				</div> <!-- end #main -->

					<div class="fivecol last media">
					
					</div>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

	<?php endwhile; endif; ?>
<?php get_footer(); ?>