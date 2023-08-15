<!-- Start blog Slider -->
<section>
    <div class="container">
        <div class="slider">
            <div class="slider_title">
                <h5>مقالات جدید سایت</h5>
            </div>
            <div class="owl-carousel owl-theme slider_product">
                <?php
                // Define our WP Query Parameters 
                $query_options = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'orderby' => 'publish_date',
                    'order' => 'DESC',
                    'posts_per_page' => 10,
                );
                $the_query = new WP_Query($query_options);

                while ($the_query->have_posts()):
                    $the_query->the_post(); ?>

                    <div class="item">
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
                                                xlink:href="<?= get_template_directory_uri() . '/assets/image/svg-sprite.svg#category' ?>">
                                            </use>
                                        </svg>
                                    </div>
                                    <div class="date">
                                        <span>
                                            <?php echo get_the_date('d F Y'); ?>
                                        </span>
                                        <svg class="icon">
                                            <use
                                                xlink:href="<?= get_template_directory_uri() . '/assets/image/svg-sprite.svg#calendar' ?>">
                                            </use>
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
                    </div>

                <?php endwhile;
                wp_reset_postdata();
                ?>

            </div>
        </div>
    </div>
</section>
<!-- End blog Slider -->