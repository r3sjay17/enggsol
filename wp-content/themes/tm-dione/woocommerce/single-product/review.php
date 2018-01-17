<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$rating   = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
$verified = wc_review_is_from_verified_owner( $comment->comment_ID );
?>


<li itemprop="review" itemscope itemtype="http://schema.org/Review" <?php comment_class('comment'); ?> id="li-comment-<?php comment_ID() ?>">
	<div>
		<div class="comment-author">
			<?php echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '100' ), '' ); ?>
		</div>
		<div class="comment-content">
			<div class="metadata">
				<?php if ( $comment->comment_approved == '0' ) : ?>

					<h5><?php esc_html_e( 'Your comment is awaiting approval', 'tm-dione' ); ?></h5>

				<?php else : ?>
				<?php
					if ( get_option( 'woocommerce_review_rating_verification_label' ) === 'yes' )
						if ( $verified )
							echo '<em class="verified">(' . esc_html__( 'verified owner', 'tm-dione' ) . ')</em> ';
				?>


					<h5><?php comment_author(); ?></h5>
					<a class="date" href="#"><time itemprop="datePublished" datetime="<?php echo get_comment_date( 'c' ); ?>"><?php echo get_comment_date( wc_date_format() ); ?></time></a>
				<?php endif; ?>

				<?php do_action( 'woocommerce_review_before_comment_meta', $comment ); ?>
			</div>
			<?php do_action( 'woocommerce_review_before_comment_text', $comment ); ?>

			<?php comment_text(); ?>

			<?php do_action( 'woocommerce_review_after_comment_text', $comment ); ?>
		</div>
	</div>
<!--</li>-->
