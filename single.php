<?php get_header(); ?>

<div class="container">
  <div class="single">
    <div class="content box_shadow">
      <?php
      get_template_part('template/single/breadcrumb');
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
      get_template_part('template/single/post-title');
      get_template_part('template/single/post-detail');
      get_template_part('template/single/post-content');
    endwhile;
  endif;
     ?>
    <!-- End Content -->
    <?php get_sidebar(); ?>
    <!-- End Sidebar -->
  </div>
      <!-- Start Related Post -->
      <?php get_template_part('template/single/post-related'); ?>
    <!-- End Related Post -->

    <?php get_template_part('template/single/single-comment'); ?>
</div>
       
<?php get_footer();?>