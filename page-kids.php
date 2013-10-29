<?php get_header(); ?>

			<?php //get_template_part( 'template--feature-event' ); ?>

			<section id="panels" class="align-center clearfix" style="border-top: 1px solid white;">
				<div class="panel one-third catalog">
					
					<a class="align-bottom button epsilon" href="#">
						Browse the Catalog
					</a>
				</div>
				
				<div class="panel one-third scholar">

					<a class="align-bottom button epsilon" href="#">
						Homework Help
					</a>

				</div>

				<div class="panel one-third" style="background: #E2624F;">					

					<a class="align-bottom button epsilon" href="#">
						Raise a Reader
					</a>

				</div>
			</section>

			<section class="align-center clearfix">
				<div class="panel one-fourth games" style="background-color: #21aabd;">
					<a class="align-bottom button epsilon" href="#">
						Games
					</a>
				</div>

				<div class="panel one-fourth dictionary" style="background-color: #61D4E4;">
					<a class="align-bottom button epsilon" href="#">
						Recommendations
					</a>
				</div>

				<div class="panel one-fourth" style="background-color: #4b5971;">
					<a class="align-bottom button epsilon" href="#">
						Programs
					</a>
				</div>

				<div class="panel one-fourth" style="background-color: #75D4BA;">
					<a class="align-bottom button epsilon" href="#">
						Schools
					</a>
				</div>

			</section>

			<?php //get_template_part('template--info-panels'); ?>			
			<?php get_template_part('template--assorted-features'); ?>
			<?php get_template_part('template--loop'); ?>

<?php get_footer(); ?>