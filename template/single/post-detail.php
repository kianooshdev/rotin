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