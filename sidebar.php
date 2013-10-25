				<div id="front" class="sidebar threecol last clearfix" role="complementary">

				<!-- Ask a Librarian
				======================
				--> <section id="ask-a-librarian" class="hidden-phone"></section>

					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="alert help">
							<p>Please activate some Widgets.</p>
						</div>

					<?php endif; ?>

					<?php if ( current_user_can( 'edit_post' ) ) : ?>

						
							<?php dynamic_sidebar( 'sidebar-staff' ); ?>
						

					<?php endif; ?>					

				</div>