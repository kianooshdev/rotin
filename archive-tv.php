<?php get_header(); ?>


<div class="archive_breadcrumb">
    <div class="container">
        <?php get_template_part('template/single/breadcrumb'); ?>
    </div>
</div>
<div class="archi">
    <div class="container">
        <div class="archive_tv">


<?php $televi = new WP_Query(array(
    'post_type' => 'tv',
    'post_per_page' => 9,
    ));
    if($televi->have_posts()) :
        while($televi->have_posts()) : $televi->the_post(); ?>
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

        <?php endwhile;
    endif;
    wp_reset_postdata();
?>
        </div>
    </div>
</div>
<?php get_footer(); ?>