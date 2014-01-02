<div class="sidebar fourcol last clearfix" role="complementary">

	<?php get_template_part('template--info-panels'); ?>

	<section class="stack-blocks" style="padding-bottom: 2em;" >

		<p>
			TODO: Subscribe to our newsletter
		</p>

	</section>


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