<?php get_header(); ?>		
			
			<?php if ( $ua->isTablet || $ua->isComputer ) { get_template_part( 'template--feature-event' ); } ?>
			
			<section id="panels" class="align-center clearfix" style="border-top: 1px solid white;">
				<div class="panel one-third catalog">
					
					<a class="align-bottom button" href="#">
						Browse the Catalog
					</a>
				</div>

				<div class="panel one-third kids" style="background-color: #E2624F;">
					<a class="align-bottom button epsilon" href="<?php echo get_permalink('9'); ?>">
						Kids
					</a>
				</div>

				<div class="panel one-third teens">
					<a class="align-bottom button epsilon" href="<?php echo get_permalink('25'); ?>">
						Teens
					</a>
				</div>				
				
			</section>

			<section class="align-center clearfix">

				<div class="panel one-third event">

					<a class="align-bottom button" href="<?php echo get_permalink('54'); ?>">
						Programs and Events
					</a>

				</div>

				<div class="panel one-third research">					

					<a class="align-bottom button" href="<?php echo get_permalink('27');?>">
						Research
					</a>

				</div>

				<div class="panel one-third new-and-good">
					<a class="align-bottom button epsilon" href="#">
						What's New and Good
					</a>
				</div>

			</section>

			<?php get_template_part('template--info-panels'); ?>

			<?php if ( $ua->isTablet || $ua->isComputer ) { get_template_part('template--assorted-features'); } ?>

			<?php if ( $ua->isTablet || $ua->isComputer ) { get_template_part('template--loop'); } ?>

<?php get_footer(); ?>
