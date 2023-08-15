<div class="main_header">
  <div class="logo">
    <a href="#">
      <img src="<?= get_template_directory_uri() . '/assets/image/logo.png' ?>" alt="فروشگاه آرایشی روتین تاج" />
    </a>
  </div>
  <div class="search">
    <form action="<?= home_url(); ?>" id="srarch-form" method="get">
      <svg class="icon">
        <use xlink:href="<?= get_template_directory_uri() . '/assets/image/svg-sprite.svg#search' ?>"></use>
      </svg>
      <input class="form-control" type="search" name="s" id="s" placeholder="به دنبال چه میگردی...؟" aria-label="search"
        value="<?php esc_attr(apply_filters('the_search_query', get_search_query())); ?>" />
    </form>
  </div>
  <div class="login">
    <a href="#" class="">
      <span class="icon-container">
        <svg class="icon">
          <use xlink:href="<?= get_template_directory_uri() . '/assets/image/svg-sprite.svg#profile' ?>"></use>
        </svg>
      </span>
    </a>
    <a href="#" class="">
      <span class="icon-container">
        <svg class="icon">
          <use xlink:href="<?= get_template_directory_uri() . '/assets/image/svg-sprite.svg#buy' ?>"></use>
        </svg>
      </span>
    </a>
    <a href="#" class="">
      <span class="icon-container">
        <svg class="icon">
          <use xlink:href="<?= get_template_directory_uri() . '/assets/image/svg-sprite.svg#heart' ?>"></use>
        </svg>
      </span>
    </a>
  </div>
</div>