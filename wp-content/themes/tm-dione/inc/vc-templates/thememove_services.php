<?php
/**
 * Shortcode attributes
 * @var $tm_heading
 * @var $el_class
 * @var $category
 * Shortcode class
 * @var $this WPBakeryShortCode_Thememove_Services
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$services = (array) vc_param_group_parse_atts( $services );
if ( count( $services ) > 0 ) {
	?>
	<div class="tm-services-slides <?php echo esc_attr( $el_class ); ?>">
		<?php
		foreach ( $services as $service ) {
			?>
			<div class="tm-services-slide row">
				<div class="col-md-6 tm-services-slide-left">
					<?php echo wp_get_attachment_image( $service['photo'], 'full' ); ?>
				</div>
				<div class="col-md-6 tm-services-slide-right">
					<h2 class="tm-services-slide-title">
						<?php echo esc_html( $service['title'] ); ?>
					</h2>
					<div class="tm-services-slide-content">
						<?php echo '' . $service['content']; ?>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}
?>
<script>
	jQuery(window).load(function () {
		var $ = jQuery;
		$(".tm-services-slides").owlCarousel(
			{
				responsive: {
					0: {
						items: 1
					},
					769: {
						items: 1
					}
				},
				navigation: true,
				nav: true,
				dots: false,
				<?php if ( $autoplay ) {
				echo 'autoplay: true,';
				} ?>
				margin: 0,
				autoplayHoverPause: true,
				loop: true
			}
		);
	});
</script>
