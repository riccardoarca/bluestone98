<?php
/**
 * The template for displaying search results pages.
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<?php if (isset($_GET['ct_search'])) {
	if ( 'true' === $_GET['ct_search'] ) {
		get_template_part( 'loop-templates/ct-search' );
	} 
} else {
	get_template_part( 'loop-templates/blog-search' );
} ?>


<?php get_footer();
