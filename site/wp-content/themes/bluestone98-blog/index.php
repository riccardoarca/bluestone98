<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>


<div class="wrapper" id="index-wrapper">

  <div class="container-fluid" id="content" tabindex="-1">

    <div class="row">


      <main class="site-main" id="main">

        <?php
        if ( have_posts() ) {
          // Start the Loop.
          while ( have_posts() ) {
            the_post();

            
            get_template_part( 'loop-templates/content', get_post_format() );
          }
        } else {
        
        }
        ?>

      </main><!-- #main -->

      <!-- The pagination component -->
    

    

    </div><!-- .row -->

  </div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
