<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'blog-medium' ); ?>

	<div class="entry-content">

		<?php
		the_content();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">


	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
