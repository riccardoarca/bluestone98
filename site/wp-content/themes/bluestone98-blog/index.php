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

  <div id="content" class="main anitrigger">

    <section id="blog-header" class="main-header">
        
          <div class="hero lg-container">

            <div class="row">
              
               <div class="main-header__title half-lg">
                  
                  <h1 class="text-center text-black">News</h1>

              </div> 

                <div class="main-header__featured half-lg">
                
                <?php 

                  $args = array( 
                      'post_type'      => 'post', 
                      'posts_per_page' => 1, 
                      'orderby'        => 'date',
                      'post_status'  => 'publish',
                  );
                      $articles = new WP_Query( $args );
                        if( $articles->have_posts() ) :
                          setup_postdata( $articles );
                          $categories = get_the_category($post->ID);
                          $excerpt = get_field('excerpt'); 
                        ?>
                        
                      <?php
                        while( $articles->have_posts() ) :
                          $articles->the_post();
                                  
                   ?> 

                       <a class="relative d-block " href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>">

                        <?php echo get_the_post_thumbnail( $post->ID, 'blog-medium', array('class'=>'img-fluid w-100') ); ?>

                        <div class="overlay abs w-100 h-100">

                           <div class="post-card__container h-100">

                             <div class="d-block">
                               
                                <p class="fs16 up text-white">

                                 <?php foreach ($categories as  $category) {
                                   
                                     echo  $category->name;
                                   
                                   } ?>
                             
                               </p>
                           
                              <h2 class="up text-white"><?php the_title(); ?></h2>

                             </div>

                           </div>
                   
                        </div>

                      </a>

                   <?php  endwhile;

                  wp_reset_query();?>

                <?php endif; ?>
                
            </div>  

            </div>

          </div>

      </section>

 
       <section id="sidebar_area">
 
           <div class="row">
 
             <div class="lg-container">

                 <?php get_sidebar(); ?>

             </div>
 
         </div>
 
       </section>

      <section id="post-container" class="container fade_in_up simplefade pt-100">

         <?php if ( have_posts() ) { ?>

          <?php
              //Becasue we're displaying the first post as featured post
              global $wp_query;
              query_posts(
                  array_merge(
                      array(
                      'post_type' => 'post',
                      'posts_per_page' => 5,
                      'orderby' => 'date',
                      'post_status'  => 'publish',
                      'offset'     => 1 //this shouldn break the pagination, but on functions.php line 215 there is a quick fix..
                       ),
                      $wp_query->query
                  )
              ); ?>

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
