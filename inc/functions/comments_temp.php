<?php
if( ! function_exists( 'better_commets' ) ):
function better_comments($comment, $args, $depth) {
    ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="comment_img">
            <?php echo get_avatar($comment,$size='50',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
            <p class="customer_meta">
                <span class="name_author"><?php echo get_comment_author() ?></span>
                <span class="comment_date"><?php printf(esc_html__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></span>
            </p>
            <span class="reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                <svg class="icon">
                    <use xlink:href="<?php echo get_template_directory_uri().'/assets/image/svg-sprite.svg#reply'?>"></use>
                </svg>
        </span>
        </div> 
        <div class="comment_content">
            <?php comment_text() ?>
        </div> 

            <div class="comment-arrow"></div>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php esc_html_e('دیدگاه شما در حال بررسی می باشد. با تشکر روتین تاج') ?></em>
                    <br />
                <?php endif; ?>
<?php
        }
endif;