<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="gallery_summery">
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div class="summary entry-summary">
			<div class="product_meta_info">
                <?php the_title('<h1 class="pro_title">','</h1>'); ?>
				<div class="en_title">
					<p>Princess dress for girls</p>
				</div>               

                <ul class="pro_meta">
                    <li class="li_meta">
						<svg class="icon">
         				   <use xlink:href="<?php echo get_template_directory_uri().'/assets/image/svg-sprite.svg#category'?>"></use>
         				</svg>
                        <span class="fw-normal">دسته‌بندی:</span>
                        <span class="float-end"><?php the_terms(get_the_ID(), 'product_cat', '', '. ') ?></span>
                    </li>  
					<?php if($product->get_sku()) : ?>
                    <li class="li_meta">
						<svg class="icon">
         				   <use xlink:href="<?php echo get_template_directory_uri().'/assets/image/svg-sprite.svg#sku'?>"></use>
         				</svg>
                        <span class="fw-normal">کد محصول:</span>
                        <span class="float-end"><?= $product->get_sku(); ?></span>
                    </li>
					<?php endif; ?>                 
                </ul>
                        </span>
                    </li>
                </ul>

				<div class="box_icon">
					<div class="product_icon">
						<div class="icon_pro d-flex">
							<svg class="icon">
                	    	    <use xlink:href="http://localhost/rotintaj/wp-content/themes/rotintaj/assets/image/svg-sprite.svg#price">
                	    	    </use>
                	    	</svg>
						</div>
						<div class="icon_text">
							<span>تضمین بهترین قیمت بازار</span>
						</div>
					</div>
					<div class="product_icon">
						<div class="icon_pro d-flex">
							<svg class="icon">
                	    	    <use xlink:href="http://localhost/rotintaj/wp-content/themes/rotintaj/assets/image/svg-sprite.svg#favorite">
                	    	    </use>
                	    	</svg>
						</div>
						<div class="icon_text">
							<span>تضمین اصالت کالا</span>
						</div>
					</div>
					<div class="product_icon">
						<div class="icon_pro d-flex">
							<svg class="icon">
                	    	    <use xlink:href="http://localhost/rotintaj/wp-content/themes/rotintaj/assets/image/svg-sprite.svg#fast-delivery">
                	    	    </use>
                	    	</svg>
						</div>
						<div class="icon_text">
							<span>تحویل در کمترین زمان ممکن</span>
						</div>
					</div>
				</div>
            </div>

			<div class="box_price">
				<div class="add_to_cart">

					<?php
					if($quantity == 0) { ?>
						<span class="call_price">موجودی به اتمام رسید</span>
					<?php  } else{
					do_action( 'woocommerce_before_add_to_cart_quantity' );
								
					woocommerce_quantity_input(
						array(
							'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
							'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
							'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
						)
					);
				
					do_action( 'woocommerce_after_add_to_cart_quantity' );
					?>


					<?php
					
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
				 ); }
				?></div>
				<div class="price_sale">
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
					<?php woocommerce_show_product_sale_flash(); ?>
					?>تخفیف
				</div> 
			</div>

			<?php woocommerce_template_single_excerpt(); ?>







			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 
			do_action( 'woocommerce_single_product_summary' );
			*/
			?>
		</div>
	</div>
</div>
<section>
    <nav>
        <div class="nav nav-tabs tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">
                توضیحات محصول
            </button>
            <?php if ($product && ($product->has_attributes() || apply_filters('wc_product_enable_dimensions_display',$product->has_weight()|| $product->has_dimensions() ))  ){ ?>
                <button class="tablinks"onclick="openCity(event, 'Paris')">
                    مشخصات محصول</button>
            <?php } ?>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">
                نظرات کاربران</button>
        </div>
    </nav>

    <div class="tab-content">
    <!-- Tab content -->
        <div id="London" class="tabcontent">
        <h3>نقد و بررسی اجمالی محصول</h3>
        
        <?php the_content(); ?>
        </div>

        <?php if ($product && ($product->has_attributes() || apply_filters('wc_product_enable_dimensions_display',$product->has_weight()|| $product->has_dimensions() ))  ){ ?>
        <div id="Paris" class="tabcontent">
        <h3>مشخصات بیشتر محصول</h3>       
            <?php wc_get_template('single-product/tabs/additional-information.php'); }?>
        </div>

        <div id="Tokyo" class="tabcontent">
        <h3>نظرات کاربران</h3>
        <div class="container">
            <div class="comments box_shadow">
              <?php 
                  // If comments are open or we have at least one comment, load up the comment template.
                  if ( comments_open() || get_comments_number() ) :
            	        comments_template();
                  endif;
              ?>
                <!--End Show Comment-->
            </div>
        </div>
</section>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div

<?php do_action( 'woocommerce_after_single_product' ); ?>
