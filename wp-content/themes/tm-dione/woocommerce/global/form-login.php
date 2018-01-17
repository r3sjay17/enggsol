<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( is_user_logged_in() ) {
	return;
}
?>
<form method="post" class="login form-group <?php if ( $hidden ) echo esc_attr('display-none'); ?>">

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php if ( $message ) echo wpautop( wptexturize( $message ) ); ?>

	<div class="row">
		<div class="col-sm-6">
			<label for="username"><?php esc_html_e( 'Username or email', 'tm-dione' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="username" id="username" />
		</div>
		<div class="col-sm-6">
			<label for="password"><?php esc_html_e( 'Password', 'tm-dione' ); ?> <span class="required">*</span></label>
			<input class="input-text" type="password" name="password" id="password" />
		</div>
	</div>

	<?php do_action( 'woocommerce_login_form' ); ?>

	<div class="row">
		<div class="col-xs-12">
			<?php wp_nonce_field( 'woocommerce-login' ); ?>
			<input type="submit" class="btn btn-border-black width-auto" name="login" value="<?php esc_attr_e( 'Login', 'tm-dione' ); ?>" />
			<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />

			<label for="rememberme" class="inline rememberme">
				<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'tm-dione' ); ?>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<p class="lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'tm-dione' ); ?></a>
			</p>
		</div>
	</div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
