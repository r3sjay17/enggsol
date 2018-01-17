<div class="container">
	<?php foreach ( $messages as $message ) : ?>
		<div class="woocommerce-message text-center"><?php echo wp_kses_post( $message ); ?></div>
	<?php endforeach; ?>
</div>
