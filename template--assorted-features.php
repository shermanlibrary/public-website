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
					<?php endif; // spe == 1?>

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

				<div class="feature assorted-features clearfix">
				
				<!-- Spotlit Event
				======================
				--> <section class="align-center event eightcol first">

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


						<img class="image" src="<?php echo $spe_ress_image; ?>">
						

					</section>

					<div class="fourcol last">

					<!-- Item Showcase
					======================
					-->	<section class="book showcase force-ratio" style="overflow: hidden; margin-bottom: 1em;" data-isbn="<?php echo $sis_isbn; ?>">

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
						</section> 

				<!-- Spotlit Event
				======================
				--> <section class="event small">

						<div class="align-left promotion">

							<h3 class="delta promotion-title no-margin">
								<?php echo $spe2_title; ?>
							</h3>


							<time class="epsilon" datetime="<?php echo $spe2_date; ?>"> 
								<?php echo date('l, F j', $spe2_date); ?> 
							</time>

						</div>

						<a class="button green zeta" href="<?php echo $spe_link; ?>">
							<?php echo $spe2_buttonText; ?>
						</a>


						<img class="image shadow" src="<?php echo $spe2_ress_image; ?>">
						
					</section>
					</div>

				</div><!--/.assorted-features-->