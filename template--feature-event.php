			<?php 
			
			/* ==================
			 * Featured Spotlight
			 * ================== */
			/* ==================
			 - We look for a featured, spotlit event
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

				else : if ( $response['custom_fields']['is_feature'][0] == 'yes') : $feature++;  if ( $feature == 1 ) : 
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
				$feature_imageTablet			=	$response['thumbnail_images']['media-medium']['url'];
				$feature_imageSquarescreen		=	$response['thumbnail_images']['media-large']['url'];
				$feature_imageWidescreen		=	$response['thumbnail_images']['media-jumbo']['url'];
				$feature_link					=	$response['custom_fields']['overlay_link'][0];
				$feature_tagline				=	$response['custom_fields']['overlay_tagline'][0];
				$feature_title					=	$response['custom_fields']['overlay_title'][0];

				if ( $ua->isTablet ) { $feature_ress_image = $feature_imageTablet; } elseif ( $ua->isComputer ) { $feature_ress_image = $feature_imageTablet; } else { $feature_ress_image	= $feature_imagePhone; }

				?>

				<section class="feature">
					<div class="feature-event" style="background-image: url(<?php echo $feature_ress_image; ?>); width:66%;"></div>
					<article class="card shadow" itemscope itemtype="http://schema.org/Event">				

						<header>
							<a href="<?php echo ( !$feature_link ? $response['url'] : $feature_link ); ?>" itemprop="url">
								<h3 class="beta title" itemprop="name"><?php echo $feature_title; ?></h3>
							</a>

							<time class="delta" datetime="<?php echo $feature_date_start . ( $feature_multiday === true ? '-' . $feature_date_end : ''); ?>"> 
								<span itemprop="startDate" content="<?php echo $feature_date_start ?>"><?php echo date('l, F j', strtotime($feature_date_start) ); ?></span> <?php echo ( $feature_multiday === false ? '' : '- ' . '<span itemprop="endDate" content="' . $feature_date_end . '">' . date('l, F j', strtotime($feature_date_end) ) . '</span>' ); ?>								
							</time>

						</header>

						<div class="promotion <?php echo $feature_alignment ?> <?php echo ( $feature_show_desc === true ? 'has-excerpt' : '' ); ?>">
							
							<?php if ( $ua->isComputer ) { echo ( $feature_show_desc === true ? '<p class="excerpt" itemprop="description">' . strip_tags( $feature_description ) . '</p>' : '' ); } ?>

						</div>

						<a class="button coral" href="<?php echo ( !$feature_link ? $response['url'] : $feature_link ); ?>">Read More</a>

					</article>
				</section>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>

			<?php endforeach; ?>