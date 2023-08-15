<?php /* Template Name: تمام عرض */
 get_header(); ?>
<div class="archive_breadcrumb">
    <div class="container">
        <?php get_template_part('template/single/breadcrumb'); ?>
    </div>
</div>
<?php while(have_posts()) : the_post(); ?>
<div class="container">
  <div class="page woocommerce">
    <div class="fll_width box_shadow">
            <?php the_content(); ?>
    </div>   
  </div>      
</div>
<?php 
endwhile;
get_footer(); ?>