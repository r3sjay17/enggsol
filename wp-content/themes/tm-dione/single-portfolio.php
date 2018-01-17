<?php
/**
 * @package dione
 */
get_header();

$portfolio_header_section = Kirki::get_option( 'tm-dione', 'portfolio_header_section_enable' );
$tm_dione_heading_image = get_post_meta( get_the_ID(), "portfolio_heading_image", true );
$portfolio_single_layout = get_post_meta( get_the_ID(), "portfolio_single_layout", true );

$tm_dione_heading_image = do_shortcode( $tm_dione_heading_image );
$tm_dione_heading_image = str_replace( 'http://http://', 'http://', $tm_dione_heading_image );
$tm_dione_heading_image = str_replace( 'https://https://', 'https://', $tm_dione_heading_image );

if(empty($portfolio_single_layout)) {
	$portfolio_single_layout = Kirki::get_option( 'tm-dione', 'portfolio_single_layout' );
}

$style = '';
if ( $tm_dione_heading_image ) {
	$style .= 'background-image: url(\'' . ( $tm_dione_heading_image ) . '\');';
}
$id_style = uniqid('page-header-style-');
tm_dione_apply_style($style, '#' . $id_style);
?>

<?php while ( have_posts() ) : the_post(); ?>

	<!-- *********************** PAGE HEADER ************************ -->
	<?php if($portfolio_header_section == 1): ?>
		<div id="<?php echo esc_attr($id_style) ?>" class="page-header">
			<div class="page-header_content">
				<div class="container">
					<div class="row padding-y-100">
						<div class="col-md-8 col-md-offset-2 text-center">
							<div class="page-header_content-inner">
								<?php echo do_shortcode( '[svg svg_icon="svg01"]' ); ?>
								<h2 class="text-inherit margin-bottom-30"><?php the_title(); ?></h2>

								<div>
									<?php the_terms( get_the_ID(), 'portfolio_category', '', ', ' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<!-- // PAGE HEADER -->

	<!-- *********************** PAGE CONTENT ************************ -->
	<div class="page-content">
		<?php get_template_part( 'template-parts/content-portfolio', $portfolio_single_layout ); ?>
	</div>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
