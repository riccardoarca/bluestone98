<?php
/**
 * The template for displaying all single posts.
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>


<div class="wrapper pt-0" id="single-wrapper">

	<div id="#content" class="main pd_mob">
		
		<?php while ( have_posts() ) : the_post(); ?>

		<?php  $hero_img = get_field('hero_image');?>

     	<section id="post-header" class="main-header">
        
	          <div class="main-header__hero md-container">
	            
	         <img class="img-fluid w-100" src="<?php echo $hero_img['url']; ?>" alt="<?php echo $hero_img['alt']; ?>">

	          </div>

	          <h1 class="text-center mt60 mtm30"><?php the_title(); ?></h1>

     	 </section>

     	 <section id="post-content mt90 mtm30" class="post-wrapper">
        
	          <div class="post-wrapper__hero md-container">
	            
	            <?php

				// Check value exists.
				if( have_rows('flexible_content') ):

				    // Loop through rows.
				    while ( have_rows('flexible_content') ) : the_row();

				        // Case: Subheading layout.
				        if( get_row_layout() == 'sub_headeing' ):
				            $title = get_sub_field('subtitle');
				            $content = get_sub_field('content'); ?>

						       <div class="row">
						       		
						       		<div class="post-wrapper__row">
						       			
						       			<h2 class="text-black"><?php echo $title; ?></h2>

						       			<div class="post-wrapper__content"><?php echo $content; ?></div>

						       		</div>

						       </div>

				        <?php 
				        	// Case: Fullwidth image layout.
				    		elseif( get_row_layout() == 'full_width_image' ): 
				            $full_image = get_sub_field('image'); 
				            $caption = get_sub_field('caption'); 

				         ?>

				          <div class="row">
						       		
						  	<div class="post-wrapper__row">
						  		
						  		<img class="img-fluid w-100" src="<?php echo $full_image['url']; ?>" alt="<?php echo $full_image['alt']; ?>">
						  		
						  		<p class="mt30 mtm30"><?php echo $caption; ?></p>
						  		
						  	</div>

						  </div>

						 <?php 
						 	// Case: Video layout.
							elseif( get_row_layout() == 'video' ): 
				            $video_url = get_sub_field('video_url'); 
				            $video_caption = get_sub_field('video_caption'); 

				         ?>

				          <div class="row justify-content-center">
						       		
						  	<div class="post-wrapper__row">
						  		
						  		<div class="post-wrapper__video">
						  			
						  			 <?php


										// Load value.

										$iframe = $video_url;

										// Use preg_match to find iframe src.

										preg_match('/src="(.+?)"/', $iframe, $matches);

										$src = $matches[1];

										// Add extra parameters to src and replcae HTML.

										$params = array(

										    'controls'  => 1,

										    'hd'        => 1,

										    'autohide'  => 1,

										    'muted'		=> 0,

										    'autoplay'  => 0,

										    'background' => 1,

										);

										$new_src = add_query_arg($params, $src);

										$iframe = str_replace($src, $new_src, $iframe);

										// Add extra attributes to iframe HTML.

										$attributes = 'frameborder="0"';

										$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

										// Display customized HTML.

										echo $iframe;

										?>

						  		</div>

						  		<p class="mt30 mtm30"><?php echo $video_caption; ?></p>

						  	</div>

						  </div>


						 <?php 
						 	// Case: Full Width Content layout.
							elseif( get_row_layout() == 'full_width_content' ): 
				            $full_content = get_sub_field('content'); 
				            $video_caption = get_sub_field('video_caption'); 

				         ?>

				         <div class="row">
						       		
						  	<div class="post-wrapper__row">

						  		<div class="post-wrapper__content"><?php echo $content; ?></div>

						  	</div>

						  </div>

				  <?php endif;

				    // End loop.
				    endwhile;

				// No value.
				else :
				    // Do something...
				endif;

				?>

	          </div>

     	 </section>


	<?php endwhile; // end of the loop. ?>

	</div>

</div>

<?php get_footer();

