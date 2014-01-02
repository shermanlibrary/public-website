<?php get_header(); ?>

	<section style="background-color:#313547; color:white; padding-top: 2em; padding-bottom: 2em;">

		<div class="wrap clearfix">

			<article>

				<div class="sixcol first">
					<div class="media" data-spotlight="database" data-category data-post="2"></div>
				</div>

				<div class="sixcol last">
				<header>
					<h3 class="no-margin post-title" style="color: white;">A Random Featured Database</h3>
					<span class="delta author">filed under <a href="#" style="color: white;">Music</a> </span>
				</header>
					<p class="epsilon summary">
						A brief excerpt associated with the database spotlight written to sell the usefulness
						of this resource. It shouldn't be pedantic or too erudite, but written for actual 
						people! This section will pull from all spotlights and it won't show on mobile.
					</p>
				</div>
			</article>
		</div>
			
	</section>

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

		<div class="wrap clearfix">

				<figure class="caption">
					<blockquote>
						<header>
							<em class="gamma">A mini-mission statement about research</em>
						</header>
						<p class="delta">
							A very short, positive blurb about how the library has
							the resources and the expertise to help with all
							kinds of research - academic or otherwise.
						</p>
					</blockquote>
				</figure>
		</div>

<?php get_footer(); ?>