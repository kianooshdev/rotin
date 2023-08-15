<?php
// Creating the widget
class recent_post_widget extends WP_Widget {
 
    function __construct() {
    parent::__construct(
     
    // Base ID of your widget
    'recent_post_widget', 
     
    // Widget name will appear in UI
    __('نمایش مقالات جدید (روتین تاج)', 'wpb_widget_domain'), 
     
    // Widget description
    array( 'description' => __( 'ویجت اختصاصی مقالات جدید با تصویر شاخص', 'wpb_widget_domain' ), )
    );
    }
     
    // Creating widget front-end
     
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $blog_number = $instance['blog_number'];
    $set_date = $instance['set_date'];
     
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title']; ?>

    <ul class="widget_rexent_post">

    <?php $query_options = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'publish_date',
        'order' => 'DESC',
        'posts_per_page' => $blog_number,
    );
    $the_query = new WP_Query($query_options);

    while ($the_query->have_posts()):
        $the_query->the_post(); ?>

          <li>
            <div class="post_main">
              <div class="post_img">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('widget_img'); ?></a>
              </div>
              <div class="post_content">
                <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                <?php if($set_date) { ?>
                <p><?php echo get_the_date('d F Y'); ?></p>
                <?php } ?>
              </div>
            </div>
          </li>
        
        <?php endwhile;
                wp_reset_postdata();
                ?>
        </ul>
     
    <?php echo $args['after_widget'];
    }
     
    // Widget Backend
    public function form( $instance ) {
        $title= !empty($instance[ 'title' ]) ? $instance[ 'title' ] : 'عنوان را وارد کنید';
        $blog_number = !empty($instance['blog_number']) ? $instance[ 'blog_number' ] : 'تعداد مقالات را وارد کنید';
        $set_date = !empty($instance['set_date']) ? $instance[ 'set_date' ] : '0';
    
    // Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">عنوان</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'blog_number' ); ?>">تعداد مقالات</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'blog_number' ); ?>" name="<?php echo $this->get_field_name( 'blog_number' ); ?>" type="text" value="<?php echo esc_attr( $blog_number ); ?>" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'set_date' ); ?>">نمایش تاریخ مقالات</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'set_date' ); ?>"
           <?php if($set_date){echo "checked";} ?> name="<?php echo $this->get_field_name( 'set_date' ); ?>" type="checkbox" value="1" />
    </p>
    <?php
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();

    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['blog_number'] = ( ! empty( $new_instance['blog_number'] ) ) ? strip_tags( $new_instance['blog_number'] ) : '';
    $instance['set_date'] = ( ! empty( $new_instance['set_date'] ) ) ? strip_tags( $new_instance['set_date'] ) : '';

    return $instance;
    }
     
    // Class wpb_widget ends here
    } 
     
    // Register and load the widget
    function recent_post_load_widget() {
        register_widget( 'recent_post_widget' );
    }
    add_action( 'widgets_init', 'recent_post_load_widget' );