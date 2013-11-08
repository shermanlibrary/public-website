	<?php if ( is_active_sidebar( 'kids' ) ) : ?>

		<?php dynamic_sidebar( 'kids' ); ?>

	<?php else : ?>

		<!-- This content shows up if there are no widgets defined in the backend. -->
		
	<?php endif; ?>