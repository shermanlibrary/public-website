<?php get_header(); ?>		
			
	<?php if ( $ua->isComputer ) { get_template_part( 'template--feature-event' ); }?>	

	<!-- Browse the Catalog
	======================
	-->	<section class="catalog search">

			<div class="wrap clearfix">

				<div class="fourcol first">
				<header class="gamma no-margin">
					<em>Search the Catalog</em>
				</header>
				</div>

				<div class="eightcol last">
					<form class="align-left" role="search" method="get" id="searchform" action="#">
					    <input type="search" value="" name="s" id="s" placeholder="<?php echo esc_attr__(' Ender\'s Game, Call of Duty, or anything else!','bonestheme') ?>" x-webkit-speech speech />
					    <input class="search-button" type="submit" id="searchsubmit" value="<?php echo esc_attr__('Find') ?>" />
				    </form>
			    </div>

			</div><!--/.wrap-->

		</section><!--/.catalog-->

			<nav id="panels" class="panels align-center clearfix" role="navigation">
				<div class="panel one-fourth catalog">					
					<a class="align-bottom button" href="<?php echo get_permalink( 118 ); ?>" title="<?php echo get_the_title( 118 ); ?>">
						Collection
					</a>
				</div>

				<div class="panel one-fourth research">					

					<a class="align-bottom button" href="<?php echo get_permalink( 161 );?>">
						Research
					</a>

				</div>

				<div class="panel one-fourth event">

					<a class="align-bottom button" href="<?php echo get_permalink( 108 ); ?>">
						Events
					</a>

				</div>

				<div class="panel one-fourth new-and-good">
					<a class="align-bottom button epsilon" href="#">
						Picks
					</a>
				</div>

				<div class="panel one-fourth kids">
					<a class="align-bottom button epsilon" href="<?php echo get_permalink( 72 ); ?>" title="<?php echo get_the_title( 72 ); ?>">
						Kids
					</a>
				</div>


				<div class="panel one-fourth teens">
					<a class="align-bottom button epsilon" href="<?php echo get_permalink( 137 ); ?>" title="<?php echo get_the_title( 137 ); ?>">
						Teens
					</a>
				</div>

				<div class="panel one-fourth compose">
					<a class="align-bottom button epsilon" href="#">
						News
					</a>
				</div>

				<div class="panel one-fourth help">
					<a class="align-bottom button epsilon" href="<?php echo get_permalink( 142 ); ?>" title="<?php echo get_the_title( 142 ); ?>">
						Help
					</a>
				</div>


		</nav>

			<?php get_template_part('template--info-panels'); ?>


			<?php //if ( $ua->isComputer ) { get_template_part('template--assorted-features'); } ?>
			<br>
			<?php //if ( $ua->isTablet || $ua->isComputer ) { get_template_part('template--loop'); } ?>

<?php get_footer(); ?>
