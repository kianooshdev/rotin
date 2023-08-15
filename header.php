<!doctype html>
<html <?php language_attributes();?> >
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php wp_head(); ?>
  </head>
  <body>
    <?php 
    if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open(); } ?>
    <!-- Start Header -->
    <header>
      <div class="container">
        <?php get_template_part( 'template/header/main_header'); ?>
        <!-- End Main Header -->
        <?php get_template_part( 'template/header/bottom_header'); ?>
      </div>
    </header>
    <!-- End Header -->