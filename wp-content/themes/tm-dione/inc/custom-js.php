<?php function tm_dione_js_custom_code() { ?>
	<?php if ( Kirki::get_option( 'tm-dione', 'custom_js_enable' ) == 1 ): ?>
		<?php echo html_entity_decode( Kirki::get_option( 'tm-dione', 'custom_js' ) ); ?>
	<?php endif ?>

	<?php if(Kirki::get_option('tm-dione', 'centered_logo_enable') == 1) {
		$logo = esc_attr(Kirki::get_option('tm-dione', 'logo_normal'));
		?>
		<script>
			jQuery(document).ready(function ($) {
				// center logo
				var $centerd_logo = $('#logo').parent('.logo').html();
				$('#logo').attr('id', 'logo-old').addClass('hidden-md-up');
				var $logo = Math.floor( ( $('#site-navigation .primary-menu > ul > li').length ) / 2 );
				$('#site-navigation .primary-menu > ul > li:nth-child('+$logo+')').after('<li class="logo">'+$centerd_logo+'</li>');
			});
		</script>
	<?php } ?>
<?php }

add_action( 'wp_footer', 'tm_dione_js_custom_code' );
