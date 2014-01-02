<?php get_header(); //get_template_part( 'template--feature-event' ); ?>

	<!-- Browse the Catalog
	======================
	-->	<section class="catalog search shadow">

			<div class="wrap clearfix">

				<div class="fourcol first">
				<header class="gamma no-margin">
					<em>Search the Catalog</em>
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

		<nav class="align-center clearfix">

			<div class="panel one-fourth books">					

				<a class="align-bottom button epsilon" href="#">
					Raise a Reader
				</a>

			</div>

			<div class="panel one-fourth event">
				<a class="align-bottom button epsilon" href="<?php echo get_permalink( 108 ); ?>?for=kids">
					Programs
				</a>
			</div>

			<div class="panel one-fourth bus">

				<a class="align-bottom button epsilon" href="#">
					Homework Helpers
				</a>

			</div>

			<div class="panel one-fourth compose">
				<a class="align-bottom button epsilon" href="#">
					Teacher Resources
				</a>
			</div>

		</nav>
		
			<?php get_template_part('template--assorted-features'); ?>

				<div class="wrap clearfix" style="margin-top:3em;">

					<div class="fourcol first">
						<?php get_sidebar('kids'); ?>
					</div>
			<div class="eightcol last">
<!-- Helios Feed
				======================
				-->	<section class="feed" style="margin-top: 5em;">

						<?php
						$feed = fetch_feed( 'http://sherman.library.nova.edu/helios/rss/feed.php?l=3,14,4' ); 

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
			</div>
<?php get_footer(); ?>