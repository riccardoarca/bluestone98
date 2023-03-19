<?php
/**
 * The header for our theme
 *
 * */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <title><?=get_the_title()?></title>

  <!-- meta tag header includes -->
  <meta name="author" content="Riccardo Arca" />
  <meta name="description" content="<?=get_the_excerpt()?>" /> 
  <meta name="keywords" content="<?=$metaTags?>">
  <link rel="canonical" href="<?=wp_get_canonical_url()?>">
  <meta name="robots" content="index, follow">

  <!-- compatability header includes -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="stylesheet" href="https://use.typekit.net/mum3xkt.css">
 
  <!-- open graph header includes -->
  <meta property="og:title" content="<?=get_the_title()?>" />
  <meta property="og:url" content="<?=wp_get_canonical_url()?>" />
  <meta property="og:description" content="<?=get_the_excerpt()?>" />

  <!-- wordpress header includes -->
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<div class="site" id="page">

  <!-- ******************* The Navbar Area ******************* -->
  <header id="wrapper-navbar" class="main-header">

    <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'bluestone98' ); ?></a>

    <?php get_template_part( 'global-templates/nav'); ?>

  </header><!-- #wrapper-navbar end -->