<?php
// register post type
function post_type_video_plus() {
    $labels = array(
        'name'               => __( 'ویدیوها' ),
        'singular_name'      => __( 'ویدیوها' ),
        'menu_name'          => __( 'ویدیوها' ),
        'name_admin_bar'     => __( 'ویدیوها' ),
        'add_new'            => __( ' افزودن جدید' ),
        'add_new_item'       => __( 'پست مخصوص ویدیوها' ),
        'new_item'           => __( 'پست جدید' ),
        'edit_item'          => __( 'ویرایش پست' ),
        'view_item'          => __( 'مشاهده پست' ),
        'all_items'          => __( 'همه ویدیوها' ),
        'search_items'       => __( 'جستجو در بین ویدیوها' ),
        'parent_item_colon'  => __( 'مادر' ),
        'not_found'          => __( 'مطلب یافت نشد' ),
        'not_found_in_trash' => __( 'مطلب در زباله دان یافت نشد' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,

        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies' => array('post_tag'),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
    register_post_type( 'tv', $args );
}
add_action( 'init', 'post_type_video_plus' );






// اضافه کردن تاکسونومی برای پست تایپ وبسافتTV
function create_taxonomies_for_tv() {
    $labels = array(
        'name'              => _x( 'دسته بندی', 'دسته بندی' ),
        'singular_name'     => _x( 'دسته بندی پست ها ', 'دسته بندی' ),
        'search_items'      => __( 'جستجویه دسته' ),
        'all_items'         => __( 'تمام دسته ها' ),
        'parent_item'       => __( 'زیر دسته' ),
        'parent_item_colon' => __( 'Parent Genre:' ),
        'edit_item'         => __( 'ویرایش دسته' ),
        'update_item'       => __( 'بروزرسانی دسته' ),
        'add_new_item'      => __( 'افزودن دسته جدید' ),
        'new_item_name'     => __( 'نام جدید دسته' ),
        'menu_name'         => __( 'دسته بندی' ),
    );

    $ar = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );

    register_taxonomy( 'cat_pishro_tv', 'tv' , $ar );
}
add_action( 'init', 'create_taxonomies_for_tv');