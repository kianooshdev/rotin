<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

	<div class="archive_breadcrumb">
		<div class="container">
			<?php get_template_part('template/single/breadcrumb'); ?>
		</div>
	</div>
	<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
	<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );?>

<div class="container">
	<div class="archive_product woocommerce">
		<div class="archive box_shadow">
			<div class="sidebar_archive">
				<?php dynamic_sidebar( 'shop_sidebar' ); ?>
			</div>

<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' ); 
	woocommerce_product_loop_start();
	?>
	 <div class="archive_content">
				<div class="ordering">
					<div class="product_header">
                	    <div class="product_header_left">
                	        <div class="custom_select">
                	            <?php woocommerce_catalog_ordering(); ?>
                	        </div>
                	    </div>
                	    <div class="product_header_right">
                	        <div class="products_view">
                	            <a href="javascript:Void(0)" class="shorting_icon grid active"> 
									<svg class="icon">
         							   <use xlink:href="<?php echo get_template_directory_uri().'/assets/image/svg-sprite.svg#grid'?>"></use>
         							</svg>
                	            </a>
                	            <a href="javascript:Void(0)" class="shorting_icon list">
									<svg class="icon">
         							   <use xlink:href="<?php echo get_template_directory_uri().'/assets/image/svg-sprite.svg#hamberger'?>"></use>
         							</svg>
                	            </a>
                	        </div>
                	    </div>
                	</div>
				</div>

				<div class="product_box shop_container grid">
	
	<?php 

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' ); 

			wc_get_template_part( 'template/product/product_box' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}?>
		</div>
	</div>
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10

do_action( 'woocommerce_sidebar' );
 */?>
 		</div>
 	</div>
</div>
<?php get_footer( 'shop' );
