<?php 

$file = 'http://sherman2.library.nova.edu/pls/files/mpopb.txt';
$books = get_list( $file );
$counter = 0;

?>
<section id="recommendations" class="clearfix">

	<header>
		<h2>Popular Best Sellers <small>(<a href="#">More</a>)</small></h2>
	</header>
	
	<?php foreach( $books as $book ) :  $counter++; if ( $counter < 7 ) :?>
	<div class="align-left book media twocol <?php echo ( $counter == 1 ? 'first' : ( $counter == 6 ? 'last' : '' ) ); ?>" style="margin-bottom: 1em;">
		
		<?php $bibrecord    = substr($book[0], 0, -1);
			  $isbn         = trim($book[7],': ');
			  $title        = str_replace( array(':','/'), '', $book[1]);
			  $subtitle     = str_replace( array(':','/'), '', $book[2]);
			  $summary      = str_replace('"', '', $book[5]);?>

		<a class="record-link" href="//novacat.nova.edu/record=<?php echo $bibrecord; ?>~S13" title="<?php echo $title . ': ' . $subtitle ?>">
			<span id="book-hook" class="gbs-thumbnail-large" data-author="author" data-isbn="<?php echo $isbn; ?>" data-summary="<?php echo $summary; ?>" data-title="<?php echo $title . ': ' . $subtitle?>" title="ISBN:<?php echo $isbn; ?>"></span>
		</a>

		<!--<a href="<?=NOVACAT;?>record=b2516713~S13" target="_blank"><?= $title; ?> <?= $subtitle; ?></a><br />
		<?php if(strlen($summary) > 1 ) : ?>
			<?= read_more($summary); ?><br />
		<?php endif; ?>

		<span class="majax-showholdings" title=".<?= $bibrecord; ?>"></span>		
		<a href="<?=NOVACAT;?>search~S13?/.<?=$bibrecord; ?>/.<?= $bibrecord;?>/1%2C1%2C1%2CB/request~<?= $bibrecord; ?>" target="_blank" ><img src="//sherman2.library.nova.edu/pls/assets/img/request.gif"></a><br /><br />-->
	</div>
	<?php endif; ?>			
	<?php endforeach; ?>

	<article class="book-information row">
		<header>
			<h3 class="no-margin post-title" style="text-transform: capitalize; font-style: italic;"></h3>
			<span class="delta author"></span>
		</header>
		<p class="drop-cap epsilon summary"></p>
	</article>
	
	<hr>
	
		
</section>

<script type="text/javascript" src="http://novacat.nova.edu/screens/majax.js">	</script>
<script src="//sherman2.library.nova.edu/pls/assets/js/gbsclasses.js"></script>
<script type="text/javascript">
	$('.book').on('click', function( e ) {

		var hook 	= $(this).find('#book-hook'),
			link 	= $(this).children('.record-link').attr('href'),

			// book information
			author 	= hook.data('author'),
			summary = hook.data('summary'),
			shortenedSummary = summary.substring( 0, 750 ),
			title 	= hook.data('title');

			// the article
			article = $( 'article.book-information' );

		if ( summary ) {

			article.find('.post-title').text( title );
			article.find( '.author' ).text( 'by ' + author );
			article.children( '.summary' ).text( shortenedSummary.substring(0, Math.min( shortenedSummary.length, shortenedSummary.lastIndexOf(". ") ) ) + "." );
			e.preventDefault();
		}
	});
</script>