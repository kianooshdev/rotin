<div class="bottom_header">
          <nav class="navbar">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php 
                $header_menu_id = get_menu_id('main_menu');
                $header_menus = wp_get_nav_menu_items($header_menu_id);
                if(!empty($header_menus) && is_array($header_menus)){ ?>
                  <ul class="navbar-nav">
                 <?php foreach($header_menus as $menu_item){
                    if(!$menu_item->menu_item_parent){
                      $child_menu_items = get_child_menu_items($header_menus, $menu_item->ID);
                      $has_children = !empty($child_menu_items) && is_array($child_menu_items);
                      if(!$has_children){ ?>
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="<?php echo esc_url( $menu_item->url ); ?>">
                            <?php echo esc_html( $menu_item->title ); ?>
                          </a>
                        </li>

                      <?php }
                      elseif(get_class_menu($menu_item) !=='dropdown-mega-menu'){ ?>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" id="navbarDropdown" data-bs-toggle="dropdown" ><?php echo esc_html( $menu_item->title ); ?></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <?php
                          foreach($child_menu_items as $child_menu_item ){ ?>
                              <li>
                                <a class="dropdown-item" href="<?php echo esc_url( $child_menu_item->url ); ?>">
                                  <?php echo esc_html( $child_menu_item->title ); ?>
                                </a>
                            </li>
                          <?php } ?>
                        </ul>
                      </li>
                      <?php }

                      elseif (get_class_menu($menu_item) =='dropdown-mega-menu') { ?>
                        <li class="nav-item dropdown dropdown-mega-menu">
                          <a class="nav-link dropdown-toggle" href="#<?php echo esc_url($menu_item->url); ?>" id="navbarDropdown" data-bs-toggle="dropdown">
                            <?php echo esc_html($menu_item->title); ?>
                          </a>
                          <div class="dropdown-menu">
                            <ul class="mega-menu d-lg-flex">


                              <?php foreach ($child_menu_items as $child_menu_item){ ?>
                          
                                <li class="mega-menu-col col-lg-3">
                                  <ul>
                                    <li class="dropdown-header"><a href="<?php echo esc_html($child_menu_item->url); ?>"><?php echo esc_html($child_menu_item->title); ?></li>
                                      <?php 
                                      $child_mega_menus = get_child_menu_items($header_menus, $child_menu_item->ID);
                                      foreach ($child_mega_menus as $child_mega_menu ) {
                                      ?>
                                      <li>
                                        <a class="dropdown-item nav-link nav-item" href="<?php echo esc_html($child_mega_menu->url); ?>">
                                        <?php echo esc_html($child_mega_menu->title); ?></a
                                        >
                                      </li>
                                      <?php } ?>
                                  </ul>
                                </li>
                              <?php } ?>
                            </ul>
                          </div>
                        </li>
                      <?php }
                      
                    }
                  }
                }
                ?>
              </ul>
            </div>
          </nav>
        </div>