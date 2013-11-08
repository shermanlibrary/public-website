<?php get_header(); ?>

	<!-- Browse the Catalog
	======================
	-->	<section class="catalog search shadow">

			<div class="wrap clearfix">

				<div class="fourcol first">
				<header class="gamma no-margin">
					<em>Quick Search</em>
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

	<!-- Research Types
	======================
	-->	<nav class="align-center panels clearfix">

			<div class="panel one-fourth genealogy">
				<a class="align-bottom button" href="<?php echo get_permalink( 133 ); ?>" title="<?php echo get_the_title( 123 ); ?>">
					Genealogy
				</a>
			</div>

			<div class="panel one-fourth bus">
				<a class="align-bottom button" href="http://sherman.library.nova.edu/e-library/index.php?action=subject&cat=kid&col=p" title="Business Databases and Resources in the Alvin Sherman E-Library">
					Homework Helpers
				</a>
			</div>

			<div class="panel one-fourth piechart">
				<a class="align-bottom button" href="http://sherman.library.nova.edu/e-library/index.php?action=subject&col=p&cat=zbu" title="Business Databases and Resources in the Alvin Sherman E-Library">
					Business
				</a>
			</div>

			<div class="panel one-fourth heart">
				<a class="align-bottom button" href="http://sherman.library.nova.edu/e-library/index.php?action=subject&cat=med&col=p" title="Health and Medicine Databases and Resources in the Alvin Sherman E-Library">
					Health
				</a>
			</div>

			<div class="panel one-fourth compose">
				<a class="align-bottom button" href="http://sherman.library.nova.edu/e-library/index.php?action=subject&col=p&cat=ztr" title="Teacher Databases and Resources in the Alvin Sherman E-Library">
					Teacher Resources
				</a>
			</div>


			<div class="panel one-fourth guides">
				<a class="align-bottom button" href="http://nova.campusguides.com/" title="Topical Guides and Tutorials made by NSU Librarians">
					Library Guides
				</a>
			</div>

			<div class="panel one-fourth research">
				<a class="align-bottom button" href="//sherman.library.nova.edu/e-library/index.php?col=p" title="Databases and Resources in the Alvin Sherman E-Library">
					All Databases
				</a>
			</div>

			<div class="panel one-fourth research">
				<a class="align-bottom button" href="http://sherman.library.nova.edu/e-library/index.php?action=subject&cat=spa&col=p" title="Spanish Language Databases and Resources in the Alvin Sherman E-Library">
					Recursos en Español
				</a>
			</div>

		</nav>

	<!-- The Loop
	======================
	--> <div id="content">
		
			<div id="inner-content" class="wrap clearfix">	

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			    
			    <div class="eightcol last clearfix">

				<!-- Helios Feed
				======================
				-->	<section class="feed">

						<?php
						$feed = fetch_feed( 'http://sherman.library.nova.edu/helios/rss/feed.php?l=15,11,12' ); 

						if ( !is_wp_error( $feed ) ) :

							$maxitems = $feed->get_item_quantity( 3 );
							$feed_items = $feed->get_items( 0, $maxitems );

						endif; 
						?>

						<ul class="feed">
						<?php if ( $maxitems == 0 ) : ?>
							<li> We're boring :( </li>
						<?php else : ?>
							<?php foreach ( $feed_items as $item ) : ?>
							<?php 
							/* Title of the Event */
							$event_title = $item->get_title();			
							$event_title_gibberish = '#(.*?-)(.*)#e';
							$event_title = preg_replace($event_title_gibberish,"('$2')",$event_title);
							
							/* Date of the Event */
							$event_date = $item->get_date('F j');
							$event_day = $item->get_date('l');
							$event_year = $item->get_date('Y');
							$event_time = $item->get_date('g:i a');
							
							/* Description of the Event 
							* Note: Some of the helios descriptions are pretty long. We only want to show a small excerpt and then provide a "Read More" link. We can use substr() to set a character limit. We can even nest that into strip_tags() to blast all the HTML that we've absorbed from the RSS feed. */
							//$event_description = strip_tags(substr($item->get_description(), 0, 140));
							$event_description = strip_tags($item->get_description());
							//$event_description = substr($event_description, 0, 200);
							$event_link = $item->get_permalink();
							?>
							<li class="clearfix has-date-stamp">

								<div class="date-stamp">
									<time>
										<span><?php echo esc_html( $event_time ); ?></span>
									</time>	
									<div class="align-center event-date">
										<div class="date">
											<?php echo esc_html( $event_date ); ?>										</div>
										<div class="day">
											<?php echo esc_html( $event_day ); ?>
											
										</div>
									</div>			
								</div>											
								<header>
								<h3 style="font-style: italic;"><a  style="color:#4b5971;" href="<?php echo esc_url( $event_link ); ?>" title="<?php echo $event_title; ?>">
									<?php echo esc_html( $event_title ); ?>
								</a>
								</h3>
								</header>
								<p class="description epsilon">
									<?php echo esc_html($event_description); ?>
								</p>
							</li>
							<?php endforeach; ?>
						<?php endif; ?>
						</ul>
					</section>
					    
					    </div>

						<?php endwhile; endif; ?>

					<div class="fourcol first">

					<!--<div class="media" data-spotlight="database" data-post="1"></div>-->


			</div> <!-- end #inner-content -->

		</div> <!-- end #content -->	

<?php get_footer(); ?>