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

  <div id="#content" class="main"></div>

     <section id="blog-header" class="main-header">
        
          <div class="hero lg-container">
            
            <h1 class="text-center text-black">News</h1>

          </div>

      </section>

      <section id="post-container" class="container pt-100">

         <?php if ( have_posts() ) { ?>

          <?php $post_counter = 1 ?>

           <div class="row posts-loop w-100">

             <?php while ( have_posts() ) : the_post(); ?>

              <?php  $categories = get_the_category($post->ID); ?>
                 
               <div id="post-<?php echo $post_counter; ?>" class="post-card <?php if( $post_counter == 4 ){ echo 'post-odd'; } ?> mtm30">

                 <a class="relative d-block" href="<?php the_permalink(); ?>">

                   <?php echo get_the_post_thumbnail( $post->ID, 'blog_thumb', array('class'=>'img-fluid w-100') ); ?>

                   <div class="overlay abs w-100 h-100">

                     <p class="fs16 up text-white">

                        <?php foreach ($categories as  $category) {
                          
                            echo  $category->name;
                          
                          } ?>
                        
                        </p>
                      
                         <h3 class="fs30_v up text-green content-fit"><?php the_title(); ?></h3>
            
                   </div>

                 </a>

               </div>

               <?php  if( $post_counter %3 == 0 ){ ?>

               </div><div class="row posts-loop w-100 mt30 mtm0">
              <?php  } ?>

             <?php $post_counter++; endwhile; ?>
             
           </div>

           <?php } else { ?>

           <div class="no-content">

             <h2 class="h2text-center">Sorry, there are no posts to read.</h2>

           </div> 

       <?php } ?>
                
      </section>

    </div>

</div><!-- #index-wrapper -->

<?php
get_footer();
