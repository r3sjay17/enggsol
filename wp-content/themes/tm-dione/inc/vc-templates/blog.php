<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class       = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
//$number_of_posts = ( $number_of_posts != '' ) ? $number_of_posts : 3;
$img_size        = ( $img_size != '' ) ? $img_size : 'full';
$args            = array(
	'post_type'      => 'post',
);
if( !empty($number_of_posts) ) {
	$args['posts_per_page'] = $number_of_posts;
}

if ( get_query_var( 'paged' ) != '' )  {
	$args['paged'] = get_query_var('paged');
}
if ( get_query_var( 'page' ) != '' )  {
	$args['paged'] = get_query_var('page');
}

if ( $category_ids != '' ) {
	$args['cat'] = $category_ids;
}
if ( $author_ids != '' ) {
	$args['author'] = $author_ids;
}

$item_class = 'col-md-4';
$class = '';
$main_id = uniqid('main-blog-');

$loop = new WP_Query( $args );

$next_page = 0;
if($loop->max_num_pages >= 2 ) {
	$next_page = 2;
}
?>
<?php if($type == ''): ?>
	<div id="blog-grid-masonry" class="<?php echo esc_attr( $class ); ?>">
		<main class="content row blog-grid-masonry" role="main">
			<?php if ( $loop->have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php
					get_template_part( 'template-parts/content', 'masonry' );
					?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</main>
		<?php tm_dione_paging_nav(); ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php elseif($type == 'metro'): ?>
	<div id="blog-metro" class="<?php echo esc_attr( $class ); ?>">
		<main id="<?php echo esc_attr($main_id) ?>" class="content row grid-masonry" role="main">
			<?php if ( $loop->have_posts() ) : ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php
					global $base_image_width;
					$base_image_width = $img_size;
					get_template_part( 'template-parts/content', 'metro' );
					?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</main>

		<?php if($show_load_more == 'yes'): ?>
			<div class="loadmore-contain">
				<button data-box-container="#<?php echo esc_attr($main_id) ?>"
					data-next-page="<?php echo esc_attr($next_page) ?>"
					data-max-pages="<?php echo esc_attr($loop->max_num_pages) ?>"
					class="btn-loadmore btn"
					type="button"
					data-url="<?php echo esc_url(add_query_arg( array( 'paged' => '' ), "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" )) ?>"
					name="button"
					data-text="<?php esc_html_e('Load more', 'tm-dione') ?>" >
					<?php esc_html_e('Load more', 'tm-dione') ?>
				</button>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
