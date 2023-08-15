<!-- Start Product -->
<section>
    <div class="container">
        <div class="section_product">
        <?php
        $pro = new WP_Query(array(
            'post_type' => 'product',
            'posts_per_page' => 8,
        ));
        if($pro->have_posts()) {
            while ($pro->have_posts()) : $pro->the_post();?>
            <?php get_template_part( 'template/product/product_box' ); 

            endwhile;
        }
        else {
            echo "<p>مطلبی پیدا نشد</p>";
        }
        wp_reset_postdata();
        ?>
        </div>
    </div>
</section>
<!-- End Product -->