    <div class="box_product">
        <?php woocommerce_show_product_sale_flash(); ?>
        <p class="wishlist">
            <i class="fa-regular fa-heart"></i>
        </p>
        <div class="product_img">
            <?php the_post_thumbnail('product', array('class' => 'Sirv image-main')); ?>
            <?php 
            $product = new WC_Product( get_the_ID() );
            $attachment_ids = $product->get_gallery_image_ids();
                if ( is_array( $attachment_ids ) && ! empty( $attachment_ids ) ) {
                $first_image_url = wp_get_attachment_url( $attachment_ids[0] );
            }
            if($first_image_url){
            ?>
            <img class="Sirv image-hover" src="<?php echo $first_image_url; ?>" />
            <?php } ?>
        </div>

        <div class="list_price">
            <a href="<?php global $product; echo $product->get_permalink(); ?>">
                <p class="product_title">
                    <?= $product->get_title(); ?>
                </p>
            </a>
            <p class="product_price">
                <?php
                $quantity = $product->get_stock_quantity();
                if($price_html = $product->get_price_html()) { ?>
                <?= $price_html ?>
                <?php } elseif($quantity == 0) { ?>
                    <span class="call_price">موجودی به اتمام رسید</span>
                <?php }
                else{ ?>
                    <span class="call_price">تماس بگیرید</span>
               <?php } ?>    
            </p>
            <?php if(is_archive()): ?>
		    <div class="excerpt">
		    	<?php echo excerpt(40,'...'); ?>
		    </div>
            <?php endif; ?>
        <div class="add_to_cart"><?php
             echo sprintf( '<a href="%s" data-quantity="1" class="%s btn btn-danger" %s>%s</a>',
                 esc_url( $product->add_to_cart_url() ),
                 esc_attr( implode( ' ', array_filter( array(
                     'button', 'product_type_' . $product->get_type(),
                     $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                     $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                 ) ) ) ),
                 wc_implode_html_attributes( array(
                     'data-product_id'  => $product->get_id(),
                     'data-product_sku' => $product->get_sku(),
                     'aria-label'       => $product->add_to_cart_description(),
                     'rel'              => 'nofollow',
                 ) ),
                 esc_html( $product->add_to_cart_text() )
             );
        ?></div>
        <?php if(is_archive()): ?>
        </div>
        <?php endif; ?>
        <?php if(!is_archive()) : ?>
            </div>
<?php endif; ?>
        
    </div>
    

            <!-- End a Box Product -->