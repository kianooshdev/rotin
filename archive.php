<?php get_header(); ?>
<div class="archive_breadcrumb">
    <div class="container">
        <?php get_template_part('template/single/breadcrumb'); ?>
    </div>
</div>
<div class="archi">
    <div class="container">
        <div class="archive">

            <?php while (have_posts()):
                the_post(); ?>
                <div class="article box_shadow">
                    <div class="article_img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('archive'); ?>
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
                                    <?php the_time(' d F Y'); ?>
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
            <?php endwhile; ?>
        </div>
        <div class="pageination">
            <?php echo paginate_links(
                array(
                    'prev_text' => __('قبلی'),
                    'next_text' => __('بعدی'),
                )
            ); ?>
        </div>
    </div>
</div>



<?php get_footer(); ?>