<?php get_header(); ?>
	<?php get_template_part( 'template--feature-event' ); ?>

			<?php 
			/* ==================
			 * Assorted Features
			 * ================== */
			/* ==================
			 - We look for assorted spotlights
			 - that meets the targeted audience criteria
			 - and that it has been further optimized
			 - via the marketing options, which is available
			 - to only "Webrarian" levels. 
			 */
			global $ua;

			/* ==================
			 * Spotlight JSON API */
			$spotlight_taxonomy_api_url 	= 'http://sherman2.library.nova.edu/sites/spotlight/api/taxonomy/get_taxonomy_posts/';
			$spotlight_taxonomy 			= 'library-audience';
			$spotlight_post_type			= 'spotlight_events';

			if      ( is_page( 'kids' ) || get_query_var( 'for' ) == 'kids' )   { $library_audience = 'kids'; }
			elseif  ( is_page( 'teens' ) || get_query_var( 'for' ) == 'teens')  { $library_audience = 'teens'; }
			else                                                                { $library_audience = 'public'; }

			/* ==================
			 * Featured Event */
			$spe_jSON = json_decode( wp_remote_retrieve_body( wp_remote_get( $spotlight_taxonomy_api_url . '?taxonomy=' . $spotlight_taxonomy .'&slug=' . $library_audience . '&post_type=spotlight_events&orderby=rand', array( 'sslverify' => false) ) ), true); 
			$spe = 0;
			foreach ( $spe_jSON['posts'] as $response) : ?>

				<?php if ( !$response['custom_fields']['overlay_title'][0] || $response['custom_fields']['is_feature'][0] == 'Yes' ) : ?>

				<?php else :  $spe++; ?>

					<?php if ( $spe == 1 ) : ?>

						<?php // Response Variables
						$spe_buttonText				=	$response['custom_fields']['overlay_button_text'][0];
						$spe_date					=	$response['custom_fields']['event_date'][0];
						$spe_image_id				=	$response['custom_fields']['graphic'][0];					
						$spe_imagePhone				=	$response['thumbnail_images']['media-small']['url'];
						$spe_imageTablet			=	$response['thumbnail_images']['media-medium']['url'];
						$spe_imageWidescreen		=	$response['thumbnail_images']['media-large']['url'];
						$spe_link					=	$response['custom_fields']['overlay_link'][0];
						$spe_tagline				=	$response['custom_fields']['overlay_tagline'][0];
						$spe_title					=	$response['custom_fields']['overlay_title'][0];

						if ( $ua->isTablet ) {
							$spe_ress_image = $spe_imageTablet;
						} elseif ( $ua->isComputer ) {
							$spe_ress_image	= $spe_imageWidescreen;
						} else {
							$spe_ress_image	= $spe_imagePhone;
						}
						?>
					<?php endif; // spe == 1?>

					<?php if ( $spe == 2 ) : ?>

						<?php // Response Variables
						$spe2_buttonText			=	$response['custom_fields']['overlay_button_text'][0];
						$spe2_date					=	$response['custom_fields']['event_date'][0];
						$spe2_image_id				=	$response['custom_fields']['graphic'][0];					
						$spe2_imagePhone			=	$response['thumbnail_images']['media-small']['url'];
						$spe2_imageTablet			=	$response['thumbnail_images']['media-medium']['url'];
						$spe2_link					=	$response['custom_fields']['overlay_link'][0];
						$spe2_tagline				=	$response['custom_fields']['overlay_tagline'][0];
						$spe2_title					=	$response['custom_fields']['overlay_title'][0];

						if ( $ua->isTablet ) {
							$spe2_ress_image = $spe2_imagePhone;
						} elseif ( $ua->isComputer ) {
							$spe2_ress_image	= $spe2_imageTablet;
						} else {
							$spe2_ress_image	= $spe2_imagePhone;
						}
						?>
					<?php endif; // spe == 2?>

			<?php endif; ?>

		<?php endforeach; ?>

	<!-- Browse the Catalog
	======================
	-->	<section class="catalog search shadow">

			<div class="wrap clearfix">

				<div class="fourcol first">
				<header class="gamma no-margin">
					<em>
						Search for Events
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


			<div class="feature assorted-features wrap clearfix">
				
				<div class="fourcol first">

				<!-- Spotlit Event
				======================
				-- <section class="align-center event">

						<div class="align-left promotion shadow">

							<h3 class="gamma promotion-title no-margin">
								<?php echo $spe_title; ?>
							</h3>


							<time class="epsilon" datetime="<?php echo $spe_date; ?>"> 
								<?php echo date('l, F j', $spe_date); ?> 
							</time>

						</div>

						<a class="button coral zeta" href="<?php echo $spe_link; ?>">
							<?php echo $spe_buttonText; ?>
						</a>


						<img class="image" src="<?php echo $spe_ress_image; ?>" style="border-top-right-radius: 40%;">
						
					</section>-->



				</div>

				<div class="eightcol last">

				<!-- Helios Feed
				======================
				-->	<section class="feed">

						<?php
						$feed = fetch_feed( 'http://sherman.library.nova.edu/helios/rss/feed.php?s=3' ); 

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