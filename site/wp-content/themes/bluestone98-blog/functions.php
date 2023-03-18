<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Set up theme defaults and registers support for various WordPress feaures.
 */
add_action( 'after_setup_theme', function() {

  load_theme_textdomain( 'my-theme', get_theme_file_uri( 'languages' ) );

  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );
  add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
  ) );
  add_theme_support( 'custom-background', apply_filters( 'my-theme_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );

  // Add theme support for selective refresh for widgets.
  add_theme_support( 'customize-selective-refresh-widgets' );

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support( 'custom-logo', array(
    'height'      => 200,
    'width'       => 50,
    'flex-width'  => true,
    'flex-height' => true,
  ) );

  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'main-menu' ),
  ) );
} );

// remove default jpg compression
add_filter( 'jpeg_quality', function() {
    return 100;
});

// remove polyfill and regenerator runtime (adds to pagespeed, only used for older browsers)
function deregister_polyfill(){

  wp_deregister_script( 'wp-polyfill' );
  wp_deregister_script( 'regenerator-runtime' );

}
add_action( 'wp_enqueue_scripts', 'deregister_polyfill');


/**
 * Register widget area.
 */
add_action( 'widgets_init', function() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'my-theme' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
} );


// Limit WP uploads file size
function upload_limit_image_size($file) {

  // Calculate the image size in KB
  $image_size = $file['size']/1024;

  // File size limit in KB
  $limit = 200;

  // Check if it's an image
  $is_image = strpos($file['type'], 'image');

  if ( ( $image_size > $limit ) && ($is_image !== false) )
          $file['error'] = 'Your picture is too large. It has to be smaller than '. $limit .'KB';

  return $file;

}
add_filter('wp_handle_upload_prefilter', 'upload_limit_image_size');


  // register webpack compiled js and css with theme
  function enqueue_webpack_scripts() {
    
    $cssFilePath = glob( get_template_directory() . '/css/build/main.min.*.css' );
    $cssFileURI = get_template_directory_uri() . '/css/build/' . basename($cssFilePath[0]);
    wp_enqueue_style( 'main_css', $cssFileURI );
    
    $jsFilePath = glob( get_template_directory() . '/js/build/main.min.*.js' );
    $jsFileURI = get_template_directory_uri() . '/js/build/' . basename($jsFilePath[0]);
    wp_enqueue_script( 'main_js', $jsFileURI , null , null , true );
     
  }
  add_action( 'wp_enqueue_scripts', 'enqueue_webpack_scripts' );

  // Remove Gutenberg block css
function remove_block_css(){
  wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );


?>