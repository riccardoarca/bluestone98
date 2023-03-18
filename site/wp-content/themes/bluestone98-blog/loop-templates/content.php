<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<section id="post-container" class="pt-200">

			<div class="lg-container">
				
				<div class="posts-loop">
						
					<div class="post-card">

						<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

					</div>
					
				</div>

			</div>
                
                
        </section>

	</header><!-- .entry-header -->

</article><!-- #post-## -->
