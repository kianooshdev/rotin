<?php /* Template Name: نمایش سایدبار */
 get_header(); ?>
<div class="archive_breadcrumb">
    <div class="container">
        <?php get_template_part('template/single/breadcrumb'); ?>
    </div>
</div>
<?php while(have_posts()) : the_post(); ?>
<div class="container">
  <div class="single">
    <div class="content box_shadow">
          <?php the_content(); ?>
    </div>
    <!-- End Content -->
    <?php get_sidebar(); ?>
    <!-- End Sidebar -->   
  </div>      
</div>
<?php 
endwhile;
get_footer(); ?>