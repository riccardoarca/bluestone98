<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


	<?php $post_counter = 1 ?>

	<?php while ( have_posts() ) : the_post(); ?>

              <?php  $categories = get_the_category($post->ID); ?>
                 
               <div id="post-<?php echo $post_counter; ?>" class="post-card <?php if( $post_counter == 4 ){ echo 'post-odd'; } ?> mtm30">

                 <a class="relative d-block" href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>">

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

               </div>

               <?php  if( $post_counter %3 == 0 ){ ?>

                </div><div class="row posts-loop w-100 mt30 mtm0">

              <?php  } ?>

             <?php $post_counter++; endwhile; ?>



