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

			if      ( is_page( 'kids' ) || get_query_var( 'for' ) == 'kids' )   { $library_audience = 'kids'; }
			elseif  ( is_page( 'teens' ) || get_query_var( 'for' ) == 'teens')  { $library_audience = 'teens'; }
			else                                                                { $library_audience = 'public'; }

			$feature_jSON = json_decode( wp_remote_retrieve_body( wp_remote_get( $spotlight_taxonomy_api_url . '?taxonomy=' . $spotlight_taxonomy .'&slug=' . $library_audience . '&post_type=spotlight_events&orderby=rand', array( 'sslverify' => false) ) ), true); 
			$feature = 0;

			foreach ($feature_jSON['posts'] as $response) : 
				
				// 1.) Does event have the pre-requisite content?
				if ( !$response['custom_fields']['overlay_title'][0] ) : 

				// 2.) If there is no end-date, is the start-date passed?
				elseif ( !$response['custom_fields']['event_end'][0] 
						&& strtotime( $response['custom_fields']['event_start'][0]) < strtotime('-1 day') ) : 
				
				// 3.) If there is an end-date, has it passed?
				elseif ( $response['custom_fields']['event_end'][0]
						&& strtotime( $response['custom_fields']['event_end'][0] ) < strtotime('-1 day') ) : 

				else : if ( $response['custom_fields']['is_feature'][0] == 'no') : $feature++;  if ( $feature == 1 ) : 

				// Response Variables
				$feature_buttonText				=	$response['custom_fields']['overlay_button_text'][0];

				// Date and Time
				$feature_allday					= false;
				$feature_multiday				= false;				
				$feature_date_start				=	$response['custom_fields']['event_start'][0];
				$feature_date_options			=	$response['custom_fields']['scheduling_options'][0];

				if ( strpos( $feature_date_options, 'multiday' ) !== false ) {
					$feature_multiday			= true;
					$feature_date_end			=	$response['custom_fields']['event_end'][0];
				}

				if ( strpos( $feature_date_options, 'allday' ) !== false ) {
					$feature_allday				= true;
				}

				// Special Layout Rules
				$feature_alignment				=	$response['custom_fields']['overlay_align'][0];
				$feature_show_desc 				= ( $response['custom_fields']['overlay_description'][0] == 'no' ? false : true );

		
				// Content
				$feature_description			=	$response['excerpt'];
				$feature_eventType				=	$response['event_type'][0];
				$feature_imageTablet			=	$response['thumbnail_images']['feature-medium']['url'];
				$feature_imageSquarescreen		=	$response['thumbnail_images']['feature-large']['url'];
				$feature_imageWidescreen		=	$response['thumbnail_images']['feature-jumbo']['url'];
				$feature_link					=	$response['custom_fields']['overlay_link'][0];
				$feature_tagline				=	$response['custom_fields']['overlay_tagline'][0];
				$feature_title					=	$response['custom_fields']['overlay_title'][0];

				if ( $ua->isTablet ) { $feature_ress_image = $feature_imageTablet; } elseif ( $ua->isComputer ) { $feature_ress_image = $feature_imageWidescreen; } else { $feature_ress_image	= $feature_imagePhone; }

				?>

						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>

			<?php endforeach; ?>

				<?php 
				/* ==================
				 * Item Showcase  */
				$sis_jSON = json_decode( wp_remote_retrieve_body( wp_remote_get( $spotlight_taxonomy_api_url . '?taxonomy=' . $spotlight_taxonomy .'&slug=' . $library_audience . '&post_type=spotlight_items&orderby=rand', array( 'sslverify' => false) ) ), true); 
				$sis = 0;
				foreach ( $sis_jSON['posts'] as $response) : $sis++;?>

					<?php if ( $sis == 1 ) : ?>

					<?php // Response Variables
					$sis_item_url				=	$response['url'];
					$sis_item_title				=	$response['custom_fields']['item_title'][0];
					$sis_book_author			=	$response['custom_fields']['book_author'][0];
					$sis_novacat_url			=	$response['custom_fields']['item_novacat'][0];
					$sis_isbn					=	$response['custom_fields']['book_isbn'][0];
					$sis_genre					=	$response['genre'][0];
					$sis_youtube_trailer		=	$response['custom_fields']['item_trailer'][0];
					?>

					<?php endif; // sis == 1?>
				<?php endforeach; ?>

				<div class="assorted-features wrap clearfix">

				<!-- Spotlit Event
				======================
				--> <section class="feature-event eightcol first spotlight media" style="background-image: url(' <?php echo $feature_ress_image;?> ' ); ">

						<header class="align-left shadow <?php echo $feature_alignment ?>">
							
							<?php echo $feature_eventType; ?>
							<h3 class="deleta promotion-title no-margin" style="color: white;">
								<a href="#<?php echo $feature_link; ?>" itemprop="url">
									<?php echo $feature_title; ?>
								</a>
							</h3>	

							<time class="epsilon" datetime="<?php echo $feature_date_start . ( $feature_multiday === true ? '-' . $feature_date_end : ''); ?>"> 
								<span itemprop="startDate" content="<?php echo $feature_date_start ?>"><?php echo date('l, F j', strtotime($feature_date_start) ); ?></span> <?php echo ( $feature_multiday === false ? '' : '- ' . '<span itemprop="endDate" content="' . $feature_date_end . '">' . date('l, F j', strtotime($feature_date_end) ) . '</span>' ); ?>
								<?php echo ( $feature_allday === false ? 'Not Allday' : '' ); ?>
							</time>						

						</header>	

						<?php if ( !$ua->isMobile ) { echo ( $feature_show_desc === true ? '<p class="drop-cap excerpt" itemprop="description">' . strip_tags( $feature_description, '<a>' ) . '</p>' : '' ); } ?>				

					</section>

					<div class="sidebar fourcol last">

					<!-- Item Showcase
					======================
					--	<section class="book showcase force-ratio" style="overflow: hidden; margin-bottom: 1em;" data-isbn="<?php echo $sis_isbn; ?>">

							<header>
								<h3 class="delta no-margin" style="color:#4b5971"><a href="<?php echo $sis_item_url; ?>"><?php echo $sis_item_title; ?></a></h3>
									<p class="byline">
										by <?php echo $sis_book_author; ?> <br>
										<span class="genre"><?php echo $sis_genre; ?></span>
									</p>								

									<a class="button green epsilon" href="<?php echo $sis_item_url; ?>">
										Recommended
									</a>
							</header>

							<div class="cover shadow">
								<img src="http://systems.library.nova.edu/cdn/styles/css/public-global/media/stock2.jpg">
							</div>
						</section> -->

					<div class="spotlight media" data-spotlight="event" data-audience data-category data-post="1"></div>
					<div class="spotlight media" data-spotlight="event" data-audience data-category data-post="2"></div>
					</div>

				</div><!--/.assorted-features-->

				</div>