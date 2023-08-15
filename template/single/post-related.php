<div class="related_post box_shadow" >
    <div class="slider_title">
       <h5>مقالات مرتبط سایت</h5>
    </div>
    <div class="box_related">
    <?php
            $related = get_posts( array( 
                'category__in' => wp_get_post_categories($post->ID),
                 'numberposts' => 3,
                  'post__not_in' => array($post->ID) ) );
            if( $related ) foreach( $related as $post ) {
            setup_postdata($post); ?>
                <div class="article box_shadow">
                <div class="article_img">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('article'); ?>
                  </a>
                </div>
                <div class="article_body">
                  <div class="detail">
                    <div class="category">
                      <?php the_category(' . ') ?>
                      <svg class="icon">
                        <use
                          xlink:href="<?= get_template_directory_uri().'/assets/image/svg-sprite.svg#category'?>"
                        ></use>
                      </svg>
                    </div>
                    <div class="date">
                      <span><?php the_time(' d F Y'); ?></span>
                      <svg class="icon">
                        <use
                          xlink:href="<?= get_template_directory_uri().'/assets/image/svg-sprite.svg#calendar'?>"
                        ></use>
                      </svg>
                    </div>
                  </div>
                  <div class="title">
                    <a href="<?php the_permalink(); ?>">
                      <h2>
                        <?php the_title(); ?>
                      </h2>
                    </a>
                  </div>
                </div>
              </div>   
            <?php }
            wp_reset_postdata(); ?>
               
         <?php 
        
        ?>  
    </div>    
</div>
