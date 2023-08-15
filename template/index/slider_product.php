<!-- Start Slider Product -->
<section>
    <div class="container">
        <div class="slider">
            <div class="slider_title">
                <h5>انواع کالا ها</h5>
            </div>
            <div class="owl-carousel owl-theme slider_product">
                <?php
                $pro = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 15,
                ));
                if($pro->have_posts()) {
                    while ($pro->have_posts()) : $pro->the_post();?>
                <div class="item">
                
                    <?php get_template_part( 'template/product/product_box' ); ?>
                </div>
                <?php endwhile;
                }
                else {
                    echo "<p>مطلبی پیدا نشد</p>";
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>
<!-- End Slider Product -->