<?php
if ( post_password_required() ) {
	return;
}
?>


	<?php if ( have_comments() ) : ?>
		<h5 class="comment_title">
			<?php
			printf(
				_nx(
					' %2$s یک دیدگاه برای',
					'%1$s دیدگاه برای "%2$s"',
					get_comments_number(),
					'comments title'
				),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
			?>
		</h5>

		<ul class="comment_list">
            <?php
	        wp_list_comments( array(
	        'style'      => 'ul',
	        'short_ping' => true,
            'callback' => 'better_comments'
	        ) );
            ?>
        </ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="navigation comment-navigation" role="navigation">

				<h2 class="screen-reader-text section-heading"><?php _e( 'صفحه بندی نظرات '); ?></h2>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; نظرات قدیمی' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'نظرات جدید &rarr;' ) ); ?></div>
			</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'twentythirteen' ); ?></p>
		<?php endif; 

     endif; // have_comments() 

    // $post_id       = $post->ID;
	$commenter     = wp_get_current_commenter();
	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req   = get_option( 'require_name_email' );
	$html5 = 'html5' === $args['format'];

	// Define attributes in HTML5 or XHTML syntax.
	$required_attribute = ( $html5 ? ' required' : ' required="required"' );
	$checked_attribute  = ( $html5 ? ' checked' : ' checked="checked"' );

	// Identify required fields visually and create a message about the indicator.
	$required_indicator = ' ' . wp_required_field_indicator();
	$required_text      = ' ' . wp_required_field_message();
	$fields = array(
		'author' => sprintf(
			'<div class="form_input">%s</div>',
			sprintf(
				'<input id="author" name="author" class="form-control" placeholder="* نام خود را وارد کنید" type="text" value="%s" autocomplete="name"%s />',
				esc_attr( $commenter['comment_author'] ),
				( $req ? $required_attribute : '' )
			)
		),
		'email'  => sprintf(
			'<div class="form_input">%s</div>',
			sprintf(
				'<input id="email" class="form-control" placeholder="* ایمیل خود را وارد کنید" name="email" value="%s" aria-describedby="email-notes" autocomplete="email"%s />',
				esc_attr( $commenter['comment_author_email'] ),
				( $req ? $required_attribute : '' )
			)
		),
	);
    
    $comment_form = array(
        'title_reply' => 'شما هم می‌توانید در مورد این مقاله نظر بدهید',
        'comment_field' => '<div class="form_group">
        <textarea name="comment" id="comment" class="form-control" placeholder="نظر شما"></textarea>
      </div>',
      'submit_button' => '<div>
      <button type="submit" class="btn btn-outline-danger">ارسال نظر</button>
    </div>',
        'fields' => $fields
    );
    
    comment_form($comment_form); ?>

<!-- End Comments --> 
</div>