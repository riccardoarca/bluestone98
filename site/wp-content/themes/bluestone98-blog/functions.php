<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**  Custom walker class.
 */
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {

  /**
   * Starts the list before the elements are added.
   *
   * Adds classes to the unordered list sub-menus.
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int    $depth  Depth of menu item. Used for padding.
   * @param array  $args   An array of arguments. @see wp_nav_menu()
   */
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    // Depth-dependent classes.
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
      'sub-menu',
      ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
      ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
      'menu-depth-' . $display_depth
    );
    $class_names = implode( ' ', $classes );

    // Build HTML for output.
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
  }

  /**
   * Start the element output.
   *
   * Adds main/sub-classes to the list items and links.
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $item   Menu item data object.
   * @param int    $depth  Depth of menu item. Used for padding.
   * @param array  $args   An array of arguments. @see wp_nav_menu()
   * @param int    $id     Current item ID.
   */
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // Depth-dependent classes.
    $depth_classes = array(
      ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
      ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
      ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
      'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    // Passed classes.
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    // Build HTML.
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

    // Link attributes.
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

    // Build HTML output and pass through the proper filter.
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
      $args->before,
      $attributes,
      $args->link_before,
      apply_filters( 'the_title', $item->title, $item->ID ),
      $args->link_after,
      $args->after
    );
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}


/**
 * Set up theme defaults and registers support for various WordPress features.
 */
add_action( 'after_setup_theme', function() {

  load_theme_textdomain( 'bluestone98', get_theme_file_uri( 'languages' ) );

  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'blog-hero', 1280, 723, true );
  add_image_size( 'blog-medium', 500, 600, true );
  add_image_size( 'blog-small', 446, 446, true );
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
    'name'          => __( 'Sidebar', 'bluestone98' ),
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

/* Hide admin bar*/
function hide_admin_bar(){ return false; }
add_filter( 'show_admin_bar', 'hide_admin_bar' );

function hide_from_loop($query) 
{
   if (is_admin() || !$query->is_main_query()) // If is admin area or is not the main query being run...
      return; // ...stop function from running

   if (is_archive() || is_search() || is_home()) // If is archive, search, or home pages
   {
      $query->set( 'posts_per_page', 5 ); // Setting how many posts to show
      $query->set('meta_key', 'featured'); // Look for our hide_from_loop custom field
      $query->set('meta_value', '0'); // Only show posts that are unchecked
   }
}
add_action( 'pre_get_posts', 'hide_from_loop', 1 ); // Hook into pre_get_posts


?>