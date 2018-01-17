<?php
$default_args = array(
	"number_of_posts" => "3",
	"orderby"         => "",
	"order"           => "",
	"style"           => "no-image",
	"img_size"        => "full",
	"category_ids"    => "",
	"author_ids"      => "",
	"time_format"     => "M d, Y",
	'disable_author'  => '',
	"text_align"      => "",
	"el_class"        => "",
	'css'             => "",
);
extract( shortcode_atts( $default_args, $atts ) );
$cuid = uniqid('latest-blog-');
$css_class       = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$number_of_posts = ( $number_of_posts != '' ) ? $number_of_posts : 3;
$img_size        = ( $img_size != '' ) ? $img_size : 'full';
$args            = array(
	'post_type'      => 'post',
	'posts_per_page' => $number_of_posts,
);
if ( $category_ids != '' ) {
	$args['cat'] = $category_ids;
}
if ( $author_ids != '' ) {
	$args['author'] = $author_ids;
}

$item_class = 'col-md-4';

$loop = new WP_Query( $args );
?>
<?php if ( $style == 'no-image' ) { ?>
	<div id="<?php echo esc_attr($cuid); ?>" class="latest-blog no-image row <?php echo esc_attr( $el_class ) ?> <?php echo esc_attr( $css_class ) ?>">
		<?php while ( $loop->have_posts() ) : $loop->the_post();
			$meta = get_post_meta( get_the_ID() ); ?>
			<div class="col-md-4">
				<div>
					<p><?php the_time( $time_format ); ?></p>
					<?php the_title( sprintf( '<h4 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

					<div class="entry-excerpt"><?php the_excerpt(); ?></div>
					<p><a href="<?php the_permalink() ?>" class="text-link"><?php esc_html_e('READ MORE', 'tm-dione') ?></a></p>
				</div>
			</div>
		<?php endwhile;
		wp_reset_postdata(); ?>
	</div>
	<script>
		jQuery(document).ready(function ($) {
			'use strict';
			var owl = jQuery('#<?php echo esc_attr( $cuid ); ?>');
			var owlOptions = {
				items: 1,
				loop: true,
				dots: true,
			};
			jQuery(document).ready(function () {
				checkOwl();
			});
			jQuery(window).on('resize', function () {
				checkOwl();
			});
			function checkOwl() {
				if (jQuery(document).width() < 769) {
					owl.owlCarousel(owlOptions);
					owl.removeClass('off');
				} else {
					owl.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
					owl.find('.owl-stage-outer').children().unwrap();
				}
			}
		});
	</script>
<?php } else if ( $style == 'masonry' ) { ?>

	<div class="latest-blog <?php echo esc_attr( $css_class ) ?>">
		<div class="blog-grid-masonry row">
			<?php while ( $loop->have_posts() ) : $loop->the_post();
				$meta = get_post_meta( get_the_ID() ); ?>
				<div class="<?php echo esc_attr( $item_class ) ?> post blog-entry">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="post-thumb">
							<a href="<?php the_permalink() ?>">
								<?php
									$bfi_img_size = explode('x', $img_size);
									$post_thumbnail =  wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

									$post_thumbnail = $post_thumbnail[0];
									if( count($bfi_img_size ) >= 2 || is_numeric($bfi_img_size[0])) {
										$post_thumbnail = bfi_thumb( $post_thumbnail, array( 'width' => $bfi_img_size[0], 'height' => $bfi_img_size[1] ) );
									}
								?>
								<img class="img-responsive" src="<?php echo esc_attr( $post_thumbnail ) ?>" alt="" />
							</a>
						</div>
					<?php } ?>
					<div class="postcontent-grid">
						<span class="date"><?php the_time( $time_format ) ?></span>

						<div class="blog-entry-header">
							<div class="blog-entry-title">
								<?php the_title( sprintf( '<h5 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
							</div>
						</div>
						<div class="blog-entry-content">
							<?php the_excerpt(); ?>
						</div>

						<?php if ($disable_author != 'yes'): ?>
							<div class="blog-entry-meta">
				                <span class="author">
									<?php echo get_avatar( get_the_author_meta('ID'), 32) ?>
				  	                <?php
				  	                  echo get_the_author();
				                    ?>
				                </span>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile;
			wp_reset_postdata(); ?>
		</div>
	</div>

<?php } else { // grid ?>

	<div class="latest-blog blog-grid row <?php echo esc_attr( $css_class ) ?>">
		<?php while ( $loop->have_posts() ) : $loop->the_post();
			$meta = get_post_meta( get_the_ID() ); ?>
			<div class="<?php echo esc_attr( $item_class ) ?> post blog-entry">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post-thumb">
						<a href="<?php the_permalink() ?>">
							<?php
								$bfi_img_size = explode('x', $img_size);
								$post_thumbnail =  wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

								$post_thumbnail = $post_thumbnail[0];
								if( count($bfi_img_size ) >= 2 || is_numeric($bfi_img_size[0])) {
									$post_thumbnail = bfi_thumb( $post_thumbnail, array( 'width' => $bfi_img_size[0], 'height' => $bfi_img_size[1] ) );
								}
							?>
							<img class="img-responsive" src="<?php echo esc_attr( $post_thumbnail ) ?>" alt="" />
						</a>
					</div>
				<?php } ?>
				<div class="postcontent-grid">
					<div class="blog-entry-header">
						<div class="blog-entry-title">
							<?php the_title( sprintf( '<h4 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
						</div>
					</div>
					<div class="blog-entry-content">
						<?php the_excerpt(); ?>
					</div>
					<div class="date">
						<p><?php the_time( $time_format ); ?></p>
					</div>
				</div>
			</div>
		<?php endwhile;
		wp_reset_postdata(); ?>
	</div>
<?php } ?>
