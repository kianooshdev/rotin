<?php

// Creating the widget
class banner_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

// Base ID of your widget
            'banner_widget',

// Widget name will appear in UI
            __('بنر تبلیغاتی (روتین تاج)', 'wpb_widget_domain'),

// Widget description
            array('description' => __('بنر تبلیغاتی در سایدبار', 'wpb_widget_domain'),)
        );
    }

// Creating widget front-end

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $discount = $instance['discount'];
        $text_button = $instance['text_button'];
        $link_button = $instance['link_button'];
        $image_uri = $instance['image_uri'];

// before and after widget arguments are defined by themes
        echo $args['before_widget']; ?>

    <div class="image_widget">
        <div class="shop_banner">
            <div class="banner_img">
                <img src="<?php echo $image_uri; ?>" alt="">
            </div>
            <div class="shop_bn_content">
                <h5 class="shop_subtitle"><?php echo $title ?></h5>
                <h3 class="shop_title"><?php echo $discount ?></h3>
                <a href="<?php echo $link_button ?>" class="shop_btn"><?php echo $text_button ?></a>
            </div>
        </div>
    </div>

        <?php echo $args['after_widget'];
    }

// Widget Backend
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : 'عنوان را وارد کنید';
        $discount = !empty($instance['discount']) ? $instance['discount'] : 'درصد تخفیف را وارد کنید';
        $text_button = !empty($instance['text_button']) ? $instance['text_button'] : 'عنوان دکمه CTA را وارد کنید';
        $link_button = !empty($instance['link_button']) ? $instance['link_button'] : 'لینک دکمه CTA را وارد کنید';
        $image_uri = !empty($instance['image_uri']) ? $instance['image_uri'] : '';

// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>">تصویر خود را انتخاب کنید:</label><br />
            <img class="custom_media_image" src="<?php echo $image_uri; ?>" style="margin-bottom:15px;padding:0;max-width:100%;" />
            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $image_uri; ?>">
            <input type="button" value="<?php _e( 'انتخاب تصویر', 'themename' ); ?>" class="button custom_media_upload" id="custom_image_uploader"/>
        </p>
        <br>
        <p>سایز استاندار باید 350×255 باشد.</p>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">عنوان:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('discount'); ?>">درصد تخفیف:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('discount'); ?>"
                   name="<?php echo $this->get_field_name('discount'); ?>" type="text"
                   value="<?php echo esc_attr($discount); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text_button'); ?>">عنوان دکمه:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_button'); ?>"
                   name="<?php echo $this->get_field_name('text_button'); ?>" type="text"
                   value="<?php echo esc_attr($text_button); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link_button'); ?>">لینک دکمه:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_button'); ?>"
                   name="<?php echo $this->get_field_name('link_button'); ?>" type="text"
                   value="<?php echo esc_attr($link_button); ?>"/>
        </p>

        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['discount'] = (!empty($new_instance['discount'])) ? strip_tags($new_instance['discount']) : '';
        $instance['text_button'] = (!empty($new_instance['text_button'])) ? strip_tags($new_instance['text_button']) : '';
        $instance['link_button'] = (!empty($new_instance['link_button'])) ? strip_tags($new_instance['link_button']) : '';
        $instance['image_uri'] = (!empty($new_instance['image_uri'])) ? strip_tags($new_instance['image_uri']) : '';

        return $instance;
    }
}

// Register and load the widget
function banner_load_widget()
{
    register_widget('banner_widget');
}
add_action('widgets_init', 'banner_load_widget');


function banner_Script(){
    wp_enqueue_media();
    wp_enqueue_script('banner_Script', get_template_directory_uri() . '/asset/js/admin.js');
}
add_action('admin_enqueue_scripts', 'banner_Script');