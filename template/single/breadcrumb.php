<div class="breadcrumb">
  <nav class="single_breadcrumb">
    <?php 
    if(class_exists('WooCommerce')) {
    if(is_product() || is_product_taxonomy() || is_shop() || is_cart() || is_checkout() ) { 
       woocommerce_breadcrumb();
     } else { ?>
    <ol class="ol_brd">
      <li class="breadcrumb_item">
        <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
      </li>
      <?php if (!is_archive() && !is_search() && !is_page()) { ?>
        <li class="breadcrumb_item">
          <?php the_category(' . '); ?>
        </li>
      <?php } ?>
      <li class="breadcrumb_item active">
        <?php if (is_archive()) {
          the_archive_title();
        } elseif (is_search()) {
          echo $wp_query->found_posts;
          _e(' :نتیجه بجستجو برای ', ' local ');
          the_search_query();
        } elseif (is_search()) {
          echo $wp_query->found_posts;
          _e(' :نتیجه بجستجو برای ', ' local ');
          the_search_query();
        } elseif(is_page(  )){ ?>
          <h1><?php the_title(); ?></h1>
        <?php }
        else {
          the_title();
        } ?>
      </li>
    </ol>
    <?php } } else{
    ?>
      <ol class="ol_brd">
            <li class="breadcrumb_item">
              <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
            </li>
            <?php if (!is_archive() && !is_search() && !is_page()) { ?>
              <li class="breadcrumb_item">
                <?php the_category(' . '); ?>
              </li>
            <?php } ?>
            <li class="breadcrumb_item active">
              <?php if (is_archive()) {
                the_archive_title();
              } elseif (is_search()) {
                echo $wp_query->found_posts;
                _e(' :نتیجه بجستجو برای ', ' local ');
                the_search_query();
              } elseif (is_search()) {
                echo $wp_query->found_posts;
                _e(' :نتیجه بجستجو برای ', ' local ');
                the_search_query();
              } elseif(is_page(  )){ ?>
                <h1><?php the_title(); ?></h1>
              <?php }
              else {
                the_title();
              } ?>
            </li>
        </ol>
    <?php } ?>
  </nav>
</div>
<!-- End Breadcrumb -->