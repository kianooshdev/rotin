<?php get_header();

the_field('time_video');
?>

<div class="container">
  <div class="single">
    <div class="content box_shadow">
      <?php
      get_template_part('template/single/breadcrumb');
      if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

        <div class="post_title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="post_detail">
          <div class="post_author">
            <a> 
            <img src="<?php echo get_template_directory_uri().'/assets/image/user.png'?>" />
            <?php echo get_the_author_meta('display_name'); ?> </a>
          </div>
          <div class="post_date">
            <svg class="icon">
              <use xlink:href="<?php echo get_template_directory_uri().'/assets/image/svg-sprite.svg#calendar'?>"></use>
          </svg>
            <span><?php the_time(' d F Y'); ?></span>
          </div>
          <div class="post_views">
            <svg class="icon">
              <use xlink:href="<?php echo get_template_directory_uri().'/assets/image/svg-sprite.svg#show'?>"></use>
          </svg>
          <span>300 بازدید</span>
          </div>
        </div>
      <!-- End Post Detail -->
        <div class="post_content">

        <?php
        
              $video_url = esc_attr( get_field('link_video') );
              $video_poster = get_the_post_thumbnail_url();
                if (!empty($video_url)) {
                  $attr = array(
                     'src'   =>  $video_url,
                      'width' => '1120',
                      'height'    => '653',
                      'poster' => $video_poster,
                  );
                  echo wp_video_shortcode($attr);
                  }
                  else {
                        the_post_thumbnail();
                  }
                  ?>  
          <p>
            <?php the_content(); ?>
          </p>
        </div>
  <?php endwhile;
  endif;
     ?>
    <!-- End Content -->
</div>
    <?php get_sidebar(); ?>
    <!-- End Sidebar -->
  </div>
      <!-- Start Related Post -->
      <div class="related_post box_shadow" >
    <div class="slider_title">
       <h5> ویدئوها بیشتر</h5>
    </div>
    <div class="box_related">
    <?php
            $tv_related = new WP_Query(array(
              'post_type' => 'tv',
              'posts_per_page' => 3,
              'orderby' => 'rand',
              'post__not_in' => array ($post->ID),
            ));
            if($tv_related->have_posts()) {
              while ($tv_related->have_posts()) : $tv_related->the_post(); ?>
                <div class="article box_shadow">
                <div class="article_img">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('article'); ?>
                  </a>
                  <a class="category_tv" target="_blank" href="<?php echo get_post_type_archive_link('tv') ?>">ویدئوها</a>
                </div>
                <div class="article_body">                
                  <div class="title">
                    <a href="<?php the_permalink(); ?>">
                      <h2>
                        <?php the_title(); ?>
                      </h2>
                    </a>
                  </div>
                </div>
              </div>   
              <?php
               endwhile;
               }
               else {
                   echo "<p>مطلبی پیدا نشد</p>";
               }
               wp_reset_postdata();
               ?>
    </div>    
</div>

    <!-- End Related Post -->

    <?php get_template_part('template/single/single-comment'); ?>
</div>
<?php get_footer();?>