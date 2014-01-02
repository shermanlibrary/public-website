<?php 

$file = 'http://sherman2.library.nova.edu/pls/files/mpopb.txt';
$books = get_list( $file );
$counter = 0;

?>
<section id="recommendations" class="wrap clearfix">
	
	<?php foreach( $books as $book ) :  $counter++; if ( $counter < 7 ) :?>
	<div class="book row" style="margin-bottom: 3em;">
		
		<?php $bibrecord    = substr($book[0], 0, -1);
			  $isbn         = trim($book[7],': ');
			  $title        = str_replace( array(':','/'), '', $book[1]);
			  $subtitle     = str_replace( array(':','/'), '', $book[2]);
			  $summary      = str_replace('"', '', $book[5]);?>

		<article>
							<header>
					<h3 class="no-margin post-title" style="text-transform: capitalize; font-style: italic;"><?php echo $title . ': ' . $subtitle; ?></h3>
					<span class="delta author">by Author</span>
				</header>
		<div class="twocol first">

			<a class="record-link" href="//novacat.nova.edu/record=<?php echo $bibrecord; ?>~S13" title="<?php echo $title . ': ' . $subtitle ?>">
				<span id="book-hook" class="gbs-thumbnail-large" data-author="author" data-isbn="<?php echo $isbn; ?>" data-summary="<?php echo $summary; ?>" data-title="<?php echo $title . ': ' . $subtitle?>" title="ISBN:<?php echo $isbn; ?>"></span>
			</a>

		</div>

		<div class="tencol last">
				<p class="drop-cap epsilon summary">
					<?php read_more( $summary, 500 ); ?>
				</p>
		</div>
		</article>

		<!--<a href="<?=NOVACAT;?>record=b2516713~S13" target="_blank"><?= $title; ?> <?= $subtitle; ?></a><br />
		<?php if(strlen($summary) > 1 ) : ?>
			<?= read_more($summary); ?><br />
		<?php endif; ?>

		<span class="majax-showholdings" title=".<?= $bibrecord; ?>"></span>		
		<a href="<?=NOVACAT;?>search~S13?/.<?=$bibrecord; ?>/.<?= $bibrecord;?>/1%2C1%2C1%2CB/request~<?= $bibrecord; ?>" target="_blank" ><img src="//sherman2.library.nova.edu/pls/assets/img/request.gif"></a><br /><br />-->
	</div>
	<?php endif; ?>			
	<?php endforeach; ?>	
		
</section>

<script type="text/javascript" src="http://novacat.nova.edu/screens/majax.js">	</script>
<script src="//sherman2.library.nova.edu/pls/assets/js/gbsclasses.js"></script>