<?php
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper');
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end');
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs');
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);

add_action('woocommerce_before_main_content','theme_wrapper_start');
add_action('woocommerce_after_main_content','theme_wrapper_end');

function theme_wrapper_start(){
    echo '<div class="container">';
      echo '<div class="single_product woocommerce">';
         echo '<div class="fll_width box_shadow">';

}

function theme_wrapper_end(){
         echo '</div>';
      echo '</div>';
    echo '</div>';
}

add_action( 'woocommerce_sale_flash', 'sale_badge_percentage', 25 );
 
function sale_badge_percentage() {
   global $product;
   if ( ! $product->is_on_sale() ) return;
   if ( $product->is_type( 'simple' ) ) {
      $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
   } elseif ( $product->is_type( 'variable' ) ) {
      $max_percentage = 0;
      foreach ( $product->get_children() as $child_id ) {
         $variation = wc_get_product( $child_id );
         $price = $variation->get_regular_price();
         $sale = $variation->get_sale_price();
         if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
         if ( $percentage > $max_percentage ) {
            $max_percentage = $percentage;
         }
      }
   }
   if ( $max_percentage > 0 ) echo "<span class='onsale'>" . round($max_percentage) . "% </span>"; // If you would like to show -40% off then add text after % sign
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * Archive Product
 */
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);

add_filter('woocommerce_show_page_title','override_page_title');
function override_page_title(){
   return false;
}
// Custom Excerpt
function excerpt($limit, $more = ' ... ')
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . ' ' . $more;
    } else {
        $excerpt = implode(" ", $excerpt) . ' ' . $more;
    }
    $excerpt = preg_replace('[ ]', ' ', $excerpt);

    return $excerpt;
}
/**
 *  Cart Checkout Thankyou
 */
add_action('woocommerce_before_cart_table','rotin_guide_shop');
add_action('woocommerce_before_checkout_form','rotin_guide_shop');
add_action('woocommerce_before_thankyou','rotin_guide_shop');
function rotin_guide_shop(){
   $cart_active = (is_cart() || is_checkout() || is_order_received_page()) ? 'active' : '';
   $checkout_active = (is_checkout() || is_order_received_page()) ? 'active' : '';
   $order_received_active = (is_order_received_page()) ? 'active' : '';
   $html="<div class='step'>
            <div class='wid'>
                <div class='shop_steps'>
                    <span class='". 'shop_steps_num steps_1 ' . $cart_active ." '>1</span>
                    <span class='". 'shop_steps_num steps_2 ' . $checkout_active ." '>2</span>
                    <span class='". 'shop_steps_num steps_3 ' . $order_received_active ." '>3</span>
                </div>
            </div>
         </div>";
   echo $html;
}

/**
 *  My Account
 */
add_action('woocommerce_before_account_navigation', 'kima_before_account_nav');
function kima_before_account_nav()
{
    $before = '<div class="woocommerce-MyAccount-navigation-con">';
    $user = wp_get_current_user();
    $before .= '<div c"lass=kima_user_info">';
    $before .= get_avatar(get_current_user_id(), 120, '', $user->display_name);
    $before .= '<span class="kima_user_name">' . $user->display_name . '</span>';
    $before .= '</div>';
    echo $before;
}

add_action('woocommerce_after_account_navigation', 'kima_after_account_nav');
function kima_after_account_nav()
{
    echo '</div>';
}

