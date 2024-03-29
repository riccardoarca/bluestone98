<?php
/**
 * The archive template file
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


<div class="wrapper" id="archive-wrapper">

  <div id="content" class="main">
      
      <section id="archive-header" class="main-header">
        
          <div class="hero lg-container">
            
            <h1 class="text-center text-black">News</h1>

             <?php the_archive_title( '<h1 class="text-center text-black0">', '</h1>' );
                the_archive_description( '<p class="text-black">', '</p>' );

            ?>          

          </div>

      </section>

       <section id="sidebar">
 
           <div class="row">
 
             <div class="lg-container">

                 <?php get_sidebar(); ?>

             </div>
 
         </div>
 
       </section>

      <section id="post-container" class="container pt-100">

        
         <?php if ( have_posts() ) { ?>


           <div  class="row posts-loop w-100">

             <?php  get_template_part( 'loop-templates/content'); ?>
             
           </div>

         <?php }else {

            get_template_part( 'loop-templates/content');
          }

          ?>

       <div class="row pagination">

          <div class="pagination__wrapper">
            
               <?php

                  the_posts_pagination( array(
                    'mid_size' => 2,
                    'prev_text' => __( '<', 'bluestone98' ),
                    'next_text' => __( '>', 'bluestone98' ),
                    ) );
                ?>

          </div>

       </div>
                
      </section>

  </div>

</div><!-- #index-wrapper -->

<?php
get_footer();
