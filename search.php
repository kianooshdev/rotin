<?php get_header();
global $wp_query; ?>
<div class="archive_breadcrumb">
    <div class="container">
        <?php get_template_part('template/single/breadcrumb'); ?>
    </div>
</div>
<div class="archi">
    <div class="container">
        <div class="archive">

            <?php if (have_posts()) {
                while (have_posts()):
                    the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="box_product">
                            <div class="product_img">
                                <img class="Sirv image-main"
                                    src="<?= get_template_directory_uri() . '/assets/image/1-300x300.jpg' ?>" />
                                <img class="Sirv image-hover"
                                    src="<?= get_template_directory_uri() . '/assets/image/2-300x300.jpg' ?>" />
                            </div>
                            <p class="product_title">
                                <?php the_title(); ?>
                            </p>
                            <p class="product_price">
                                <del>23.450.000</del>
                                <ins>20.990.000</ins>
                            </p>
                        </div>
                    </a>
                <?php endwhile;
            } ?>
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