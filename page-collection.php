<?php get_header(); ?>

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

	<!-- Collection Types
	======================
	-->	<nav class="align-center panels clearfix">

			<div class="panel one-fourth audiobooks">
				<a class="align-bottom button" href="<?php echo get_permalink( 123 ); ?>" title="<?php echo get_the_title( 123 ); ?>">
					Audiobooks
				</a>
			</div>

			<div class="panel one-fourth books">
				<a class="align-bottom button" href="<?php echo get_permalink( 121 ); ?>" title="<?php echo get_the_title( 121 ); ?>">
					Books
				</a>
			</div>

			<div class="panel one-fourth research">
				<a class="align-bottom button" href="//sherman.library.nova.edu/e-library/index.php?col=p" title="Databases and Resources in the Alvin Sherman E-Library">
					Databases
				</a>
			</div>

			<div class="panel one-fourth games">
				<a class="align-bottom button" href="<?php echo get_permalink( 129 ); ?>" title="<?php echo get_the_title( 129 ); ?>">
					Games
				</a>
			</div>

			<div class="panel one-fourth genealogy">
				<a class="align-bottom button" href="<?php echo get_permalink( 133 ); ?>" title="<?php echo get_the_title( 133 ); ?>">
					Genealogy
				</a>
			</div>

			<div class="panel one-fourth periodical">
				<a class="align-bottom button" href="<?php echo get_permalink( 131 ); ?>" title="<?php echo get_the_title( 131 ); ?>">
					Magazines
				</a>
			</div>

			<div class="panel one-fourth movies">
				<a class="align-bottom button" href="<?php echo get_permalink( 125 ); ?>" title="<?php echo get_the_title( 125 ); ?>">
					Videos
				</a>
			</div>

			<div class="panel one-fourth music">
				<a class="align-bottom button" href="<?php echo get_permalink( 127 ); ?>" title="<?php echo get_the_title( 127 ); ?>">
					Music
				</a>
			</div>

		</nav>

	<!-- The Loop
	======================
	--> <div id="content">
		
			<div id="inner-content" class="wrap clearfix">	

				<figure class="caption">
					<blockquote>
						<header>
							<em class="gamma">Did we say <strong>our</strong> collection?</em>
						</header>
						<p class="delta">
							We want to make sure that the Alvin Sherman Library provides the
							resources you need. Are we missing something? We'll try and get it
							from another library through <a href="#">interlibrary loan</a>, or you
							might want to <a href="#">suggest a purchase</a> and we will do our best 
							to get the item on our shelves.	Or maybe you just want to share the joy 
							and <a href="#">review a book, movie, or game</a>?
						</p>
					</blockquote>
				</figure>

			</div> <!-- end #inner-content -->

		</div> <!-- end #content -->	

<?php get_footer(); ?>