<div class="sidebar fivecol last clearfix" role="complementary">
	<div class="contrast-against-dark">

	<section class="stack-blocks" style="padding-bottom: 2em;" >

		<p>
			Need a library card? GET ONE RIGHT NAU!!!! MEOW MEOW.
		</p>
		<a class="button zeta" href="<?php echo home_url(); ?>/about">Learn More</a>
	</section>

	<img src="http://placehold.it/450x253" style="width:100%;">

	<img src="http://placehold.it/450x253" style="width:100%;">

	<!-- Featured Databases
	======================
	--> 
	<aside class="media">
	<?php query_posts(array('post_type' => 'spotlight_databases', 'posts_per_page' => '2')); ?>
	<?php if ( have_posts()) : while ( have_posts()) : the_post(); ?>

			

			<article id="post-<?php the_ID(); ?>" <?php post_class('thumbnail thumbnail--overlay clearfix');?> style="margin-bottom:1em; ">
				<header>
					<h3 class="delta"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<p class="tagline">This is an excellent resource.</p>

					<div class="align-center">
						<a class="button zeta">Try it out!</a>
					</div>
				</header>
				<?php echo the_post_thumbnail('media-medium'); ?>					
			    </article>
		

	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
	<?php else: ?>
	<?php endif; ?>
	</aside>
	<!--<section class="media">
		<ul>
			<li class="related_post thumbnail thumbnail--gallery">
				<a href="http://sherman.library.nova.edu/sites/demo/watch/title/" title="This is another great video!">
					<img src="http://www.nova.edu/library/video/getting_started--navigating-asl-homepage(08-2013).jpg">
					<span class="caption">Welcome to LibraryLearn</span>
				</a>
			</li>
		</ul>
	</section>	-->


	<?php if ( is_active_sidebar( 'home' ) ) : ?>

		<?php //dynamic_sidebar( 'home' ); ?>

	<?php else : ?>

		<!-- This content shows up if there are no widgets defined in the backend. -->
		
	<?php endif; ?>

	</div>

</div>