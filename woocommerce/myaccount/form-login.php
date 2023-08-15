<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1">
		<div class="login_wrap">
			<div class="padding_eight_all">

<?php endif; ?>

		<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

		<form method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<div class="form-group">
				<input type="text" class="form-control" name="username" id="username" 
				autocomplete="username" placeholder="نام خود را وارد کنید"
				 value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</div>


			<div class="form-group">
				<input class="form-control" type="password" name="password" id="password"
				 autocomplete="current-password" placeholder="کلمه عبور" />
			</div>
			<?php do_action( 'woocommerce_login_form' ); ?>


			<div class="form-group login_footer">
				<div class="chek-form">
					<input class="form-check-input"
					 name="rememberme" type="checkbox" id="rememberme" value="forever" />
					 <label for="rememberme" class="form-check-label">
						<?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
					</label>

					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					
				</div>
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-danger" 
			name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
			</div>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

			</div>
		</div>
	</div>


		

	<div class="u-column2 col-2">
		<div class="login_wrap">
			<div class="padding_eight_all">

		<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<div class="form-group">
					<input type="text" class="form-control" name="username" id="reg_username" 
					placeholder="نام کاربری خود را وارد کنید" autocomplete="username"
					  value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</div>

			<?php endif; ?>

			<div class="form-group">
				<input type="email" class="form-control" name="email" id="reg_email"
				placeholder="ایمیل خود را وارد کنید" autocomplete="email"
				  value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</div>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<div class="form-group">
					<input type="password" class="form-control" name="password" id="reg_password"
					placeholder="رمز عبور خود را وارد کنید" autocomplete="new-password" />
				</div>

			<?php else : ?>

				<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<div class="form-group">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="btn btn-danger" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</div>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

			</div>
		</div>
	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
