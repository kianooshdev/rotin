<?php
function add_theme_scripts()
{
    wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), false, 'all');
    wp_enqueue_style('owl.theme.default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), false, 'all');
    wp_enqueue_style('style.main', get_template_directory_uri() . '/assets/css/style.css', array(), false, 'all');
    wp_enqueue_style('header', get_template_directory_uri() . '/assets/css/header.css', array(), false, 'all');
    wp_enqueue_style('footer', get_template_directory_uri() . '/assets/css/footer.css', array(), false, 'all');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), false, 'all');
    if (is_home()) {
        wp_enqueue_style('index.css', get_template_directory_uri() . '/assets/files/index/index.css', array(), false, 'all');
    }
    if (is_single()  || is_search() || is_page()) {
        wp_enqueue_style('single.css', get_template_directory_uri() . '/assets/files/single/single.css', array(), false, 'all');
        wp_enqueue_style('widget.css', get_template_directory_uri() . '/assets/files/widget/widget.css', array(), false, 'all');
    }
    if (is_archive()) {
        wp_enqueue_style('archive-product.css', get_template_directory_uri() . '/assets/files/archive-product/archive-product.css', array(), false, 'all');    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), false, true);
        wp_enqueue_script('archive-product.js', get_template_directory_uri() . '/assets/files/archive-product/archive-product.js', array('jquery'), false, true);
        wp_enqueue_style('widget.css', get_template_directory_uri() . '/assets/files/widget/widget.css', array(), false, 'all');
    }
    if(is_account_page()){
        wp_enqueue_style('my-account', get_template_directory_uri() . '/assets/files/my-account/my-account.css', array(), false, 'all');
    }
    if(is_product()){
        wp_enqueue_style('single-product', get_template_directory_uri(). '/assets/files/single-product/single-product.css', array(), false, 'all');
        wp_enqueue_script('single-product.js', get_template_directory_uri() . '/assets/files/single-product/single-product.js', array('jquery'), false, true);
    }
    if(is_cart() || is_checkout()){
        wp_enqueue_style('single-product', get_template_directory_uri(). '/assets/files/cart/cart.css', array(), false, 'all');
    }
    wp_enqueue_style('style', get_stylesheet_uri());


    wp_enqueue_script('jq', get_template_directory_uri() . '/assets/js/jquery-3.5.1.min.js', array(), false, true);
    wp_enqueue_script('owl.carousel.js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), false, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), false, true);
    if (is_home()) {
        wp_enqueue_script('index.js', get_template_directory_uri() . '/assets/files/index/index.js', array('jquery'), false, true);
    }
    if (is_single()) {
        wp_enqueue_script('single.js', get_template_directory_uri() . '/assets/files/single/single.js', array('jquery'), false, true);
    }
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

function rotin_setup_theme()
{
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_theme_support( 'woocommerce');
    add_theme_support( 'wc-product-gallery-zoom');
    add_theme_support( 'wc-product-gallery-lightbox');
    add_theme_support( 'wc-product-gallery-slider');

    add_image_size('article', 413, 306, true);
    add_image_size('archive', 550, 320, true);
    add_image_size('widget_img', 130, 130, true);
    add_image_size('product', 328, 334, true);

    register_nav_menus(
        array(
            'main_menu' => __(' فهرست اصلی '),
            'mobile_menu' => __(' فهرست موبایل ')
        )
    );
    register_sidebar(
        array(
            'name' => 'سایدبار بلاگ',
            'id' => 'blog_sidebar',
            'before_widget' => '<div class="widget box_shadow">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget_title">',
            'after_title  ' => '</h5>',

        )
    );
    register_sidebar(
        array(
            'name' => '1 سایدبار فوتر',
            'id' => 'footer_sidebar_one',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title  ' => '',

        )
    );
    register_sidebar(
        array(
            'name' => '2 سایدبار فوتر',
            'id' => 'footer_sidebar_two',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title  ' => '</h4>',

        )
    );
    register_sidebar(
        array(
            'name' => '3 سایدبار فوتر',
            'id' => 'footer_sidebar_three',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title  ' => '</h4>',

        )
    );
    register_sidebar(
        array(
            'name' => '4 سایدبار فوتر',
            'id' => 'footer_sidebar_foor',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title  ' => '</h4>',

        )
    );
    register_sidebar(
        array(
            'name' => '5 سایدبار فوتر',
            'id' => 'footer_sidebar_five',
            'before_widget' => '<div class="social">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title  ' => '</h4>',

        )
    );
    register_sidebar(
        array(
            'name' => '6 سایدبار فوتر',
            'id' => 'footer_sidebar_six',
            'before_widget' => '<div class="">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title  ' => '</h4>',

        )
    );
    register_sidebar(
        array(
            'name' => 'سایدبار فروشگاه',
            'id' => 'shop_sidebar',
            'before_widget' => '<div id="%1$s" class="%2$s widget">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title  ' => '</h4>',

        )
    );
}

// Get Menu ID
add_action('after_setup_theme', 'rotin_setup_theme');

function get_menu_id($location)
{
    $locations = get_nav_menu_locations();
    $menu_id = $locations[$location];
    return !empty($menu_id) ? $menu_id : '';
}
// Get Child Menu
function get_child_menu_items($menu_array, $parent_id)
{
    $child_menu = [];
    if (!empty($menu_array) && is_array($menu_array)) {
        foreach ($menu_array as $menu) {
            if (intval($menu->menu_item_parent) === $parent_id) {
                array_push($child_menu, $menu);
            }
        }
    }
    return $child_menu;
}
// Mega Menu
function get_class_menu($menu_item)
{
    $menu_classes = $menu_item->classes;
    $class_name = '';
    if (!empty($menu_classes) && is_array($menu_classes)) {
        for ($i = 0; $i < count($menu_classes); $i++) {
            $class_name .= esc_html($menu_classes[$i]);
        }
        return $class_name;
    }
}

/**
 * Load Custom Comments Layout file.
 */
require get_template_directory() . '/inc/functions/comments_temp.php';
require get_template_directory() . '/inc/functions/tv_post_type.php';
require get_template_directory() . '/inc/functions/single_product.php';
require get_template_directory() . '/inc/widget/recent_post.php';
require get_template_directory() . '/inc/widget/banner.php';
require_once get_template_directory() . '/plugins/plugin.php';



/**
 * Search Post Type = Product
 */
function wpb_change_search_url()
{
    if (is_search() && !empty($_GET['s']) && ($_GET['post_type'] != 'product')) {
        wp_redirect(home_url("/?s=") . urlencode(get_query_var('s')) . "&post_type=product");
        exit();
    }
}
add_action('template_redirect', 'wpb_change_search_url');

/** 
 * Archive Product
 */
function custop_excerpt_length() {
    return 40;
 }
 add_filter('excerpt_length' , 'custop_excerpt_length',999);