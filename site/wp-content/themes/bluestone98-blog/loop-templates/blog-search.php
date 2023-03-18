<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<div class="row">

			<div class="col-md-12 content-area px-0" id="primary">

				<main class="site-main" id="main" role="main">
						 	
					  <section id="blog-hero_area" class="row anitrigger mt170 mtm100">

					  		<div class="col-12 col-lg-3 offset-lg-1">

					  			<div class="card pd_mob">

					  				<h1 class="fs48 text-green mt0 mtm10">Search Results</h1>

					  				<p class="text-blue fs30_a"><?php printf( esc_html__( 'Search Results for: %s', 'understrap' ), '<span>' . get_search_query() . '</span>');	?></p>

					  				<div class="serch_bar mt100 mtm40">

					  					<div class="row">
					  						
					  						<div class="col-8 col-lg-7">
					  							
									             <!-- Custom Search -->

									             <form class="desktop-search" method="get" id="blog-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

									                 <input type="hidden" name="post_type[]" value="post" />

									                 <label class="sr-only" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>

									                 <div class="input-group">

									                     <input class="field form-control" id="s" name="s" type="text"

									                         placeholder="<?php esc_attr_e( 'Search', 'understrap' ); ?>">

									                     <span class="input-group-append">

									                         <button class="submit" id="tcsubmit" name="submit" type="submit"

									                         value="<?php esc_attr_e( 'Search', 'understrap' ); ?>"><i class="text-green fa-light fa-magnifying-glass"></i></button>

									                     </span>

									                 </div>

									             </form>

									             <div class="card sidebar">

		                                          	<?php dynamic_sidebar( 'right-sidebar' ); ?>

		                                          </div>

							  				</div>

							  			</div>
							  					
							  		</div>

					  		</div>

					   	</div>

					   	<div class="col-12 col-lg-6 offset-lg-1 mtm40">
					  	
					   		<div class="card last-post relative post-container featured-post pd_mob">

					   			<?php 

					   			$args = array( 
									    'post_type'      => 'post', 
									    'posts_per_page' => 1, 
									    'orderby'        => 'date',
									    'post_status'	 =>	'publish',
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


								   		<a class="d-block" href="<?php echo the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'blog-hero', array('class' => 'img-fluid blog-hero', ) ); ?>
								
									     	<div class="content abs h-100">

									     		<div class="row align-items-end h-100">

									     			<div class="col-12">
									     				
									     				<p class="fs16 up text-white"><?php foreach ($categories as  $category) {
											
												     			echo  $category->name;
											
												     		} ?>
											
												     	</p>
											
												     		<div class="content-small text-white">
											
												     			<?php echo $excerpt; ?>
											
												     		</div>
											
												     		<h3 class="fs30_v up text-green content-fit"><?php the_title(); ?></h3>
											
												     	 	<a class="bt green d-block mt30 mtm10" href="<?php echo the_permalink(); ?>">Read More</a>
									     			</div>

									     		</div>
								
									     	</div>
								
								     	</a>



							  		 	<?php  endwhile;

									wp_reset_query();?>

								<?php endif; ?>
					   		
					   		</div>

					   	</div>

				  </section>


				  <section id="blog-loop" class="row anitrigger default_sec_pd bg-l-grey mt120 mtm50 relative mx-0 px-0">

					  <div class="col-12 px-0">

					  		<div class="card pd_mob">

					  			<?php if ( have_posts() ) :  $post_counter = 1; ?>

						  			<div class="row simplefade fade_in_up">

						  				
						   			<?php while ( have_posts() ) : the_post();

										$categories = get_the_category($post->ID);
									?>

	 										<div id="post-<?php echo $post_counter; ?>" class="col-12 col-lg-3 <?php if( $post_counter == 1 OR $post_counter == 4 OR $post_counter == 7 ){ echo 'offset-lg-2'; } ?> mtm30">

												 	<div class="card relative small_post post-container">
											
												   		<a class="d-block" href="<?php echo the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'blog-small', array('class' => 'img-fluid ', ) ); ?>
												
													     	<div class="content abs h-100">

													     		<div class="row align-items-end h-100">

													     			<div class="col-12">
													     				
													     				<p class="fs16 up text-white"><?php foreach ($categories as  $category) {
															
																     			echo  $category->name;
															
																     		} ?>
															
																     	</p>
														
																     	<h3 class="fs30_v up text-green content-fit"><?php the_title(); ?></h3>
															
																     	<a class="bt green d-block mt30 mtm10" href="<?php echo the_permalink(); ?>">Read More</a>

													     			</div>

													     		</div>
												
													     	</div>
												
												     	</a>

											   		</div>

												  </div>

		                                             <?php if( $post_counter %3 == 0 ){ ?>

		                                                </div><div class="row mt100 mtm0 simplefade fade_in_up">

		                                            <?php } ?>

											
											<?php $post_counter++; endwhile; ?>


										<?php else : ?>

											<div class="col-10 col-lg-6 mx-auto text-center">

												<h2 class="fs30_v">No results found, maybe try different search criteria?</h2>

 													<form class="desktop-search" method="get" id="blog-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

										                 <input type="hidden" name="post_type[]" value="post" />

										                 <label class="sr-only" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>

										                 <div class="input-group">

										                     <input class="field form-control" id="s" name="s" type="text"

										                         placeholder="<?php esc_attr_e( 'Search', 'understrap' ); ?>">

										                     <span class="input-group-append">

										                         <button class="submit" id="tcsubmit" name="submit" type="submit"

										                         value="<?php esc_attr_e( 'Search', 'understrap' ); ?>"><i class="text-green fa-light fa-magnifying-glass"></i></button>

										                     </span>

										                 </div>

									             </form>


											</div>

										<?php endif; ?>

						  			</div>

						  			<div class="row blog-pagination mt120 mtm40">
							
										<div class="col-12 col-lg-6 offset-lg-2">

											<div class="card pd_mob">
												
												<!-- The pagination component -->
								
												<?php understrap_pagination(); ?>

											</div>
								
										</div>		
							
									</div>

					  		</div>

					  	</div>

					  		 <img src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/Imperial-DNA-Graphic-Small.svg" class="abs rotate_anti_clock_w dna z-2" alt="DNA" />
					  		 
					  </section>

					  <?php get_template_part( 'global-templates/logos-carousel'); ?>
					  <?php get_template_part( 'global-templates/clients-testimonials'); ?>


			</main><!-- #main -->


		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
