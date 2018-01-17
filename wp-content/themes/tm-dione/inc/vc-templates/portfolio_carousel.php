<?php
$default_args = array(
    'categories' => '',
    'order' => '',
    'order_by' => '',
    'layout' => '',
    'img_size' => 'full',
    'slide_to_show' => 3,
    'number' => '-1',
    'custom_class' => '',
    'css' => '',
    'show_nav' => 'enable_show_nav',
    'nav_style' => '',
    'show_dots' => '',
    'show_desc' => '',
    'show_title' => '',
    'item_padding' => '',
);

extract(shortcode_atts($default_args, $atts));

$terms = get_terms('portfolio_category', array(
    'slug' => explode(',', $categories),
));

$args = array(
    'post_type' => 'portfolio',
    'tax_query' => array(
        array(
            'taxonomy' => 'portfolio_category',
            'field' => 'slug',
            'terms' => explode(',', $categories),
            'operator' => 'IN',
        ),
    ),
    'posts_per_page' => $number,
);
if ($order != '') {
    $args['order'] = $order;
}
if ($order_by != '') {
    $args['orderby'] = $order_by;
}

$loop = new WP_Query($args);

$data_slick = array();

if ($show_dots == 'enable_show_dots') {
    $data_slick['dots'] = true;
}
if ($show_nav == 'enable_show_nav') {
    $data_slick['arrows'] = true;
} else {
    $data_slick['arrows'] = false;
}

$slides_per_row = ($slide_to_show != '') ? $slide_to_show * 1 : 3;

$data_slick['slidesToShow'] = (int)$slides_per_row;
$data_slick['slidesToScroll'] = (int)$slides_per_row;

$id_pCarousel = 'pCarousel-'.rand();

?>
<?php if($layout == 'fullscreen'): ?>
	<div class="portfolio-list slick-single-item">

		<?php while ($loop->have_posts()) : $loop->the_post();

	             $terms = get_the_terms(get_the_ID(), 'portfolio_category');

	             $terms_slugs = array();
	             $terms_names = array();

	             foreach ($terms as $term) {
	                 $terms_slugs[] = $term->slug;
	                 $terms_names[] = $term->name;
	             }

	            $bfi_img_size = explode('x', $img_size);
	            $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

	            $post_thumbnail = $post_thumbnail[0];
	            if (count($bfi_img_size) >= 2 || is_numeric($bfi_img_size[0])) {
	                $post_thumbnail = bfi_thumb($post_thumbnail, array('width' => $bfi_img_size[0], 'height' => $bfi_img_size[1]));
	            }

				$wrapper_style = 'background-image: url('.esc_attr($post_thumbnail).');';
				$id_style = uniqid('style-');
	             ?>
				<!-- PORTFOLIO ITEM -->
				<div class="detail-wrapper" id="<?php echo esc_attr($id_style) ?>">
					<?php tm_dione_apply_style($wrapper_style, '#' . $id_style); ?>
				    <div class="detail-content">
				        <h5 class="detail-content_tag">
				            <?php the_terms(get_the_ID(), 'portfolio_category', '', ', '); ?>
				        </h5>
				        <div class="line-short"></div>
				        <h2 class="detail-content_title heading-1 text-inherit"><?php the_title() ?></h2>
				        <a href="<?php the_permalink(); ?>" class="btn btn-border-black"><?php esc_html_e('project detail', 'tm-dione') ?></a>
				    </div>
				</div>
		<?php endwhile;
	        wp_reset_postdata(); ?>
	</div>
<?php else: ?>
	<div id="<?php echo esc_attr($id_pCarousel) ?>" class="portfolio-slider">

		<div class="folio-main-content">
			<ul class="folio-filter list-inline" data-option-key="filter">
				<li><a class="active" href="#filter" data-option-value=".slide-item"><?php esc_html_e('All', 'tm-dione') ?></a></li>
				<?php foreach ($terms as $key => $term): ?>
					<li><a href="#" data-option-value="<?php echo '.'.$term->slug ?>"><?php echo ''.$term->name ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="porfolio-slider awesome-slider <?php echo esc_attr($nav_style) ?>"
		     data-slick='<?php echo json_encode($data_slick) ?>'>

			<?php
	        while ($loop->have_posts()): $loop->the_post();

	            $terms = get_the_terms(get_the_ID(), 'portfolio_category');

	            $terms_slugs = array();
	            $terms_names = array();

	            foreach ($terms as $term) {
	                $terms_slugs[] = $term->slug;
	                $terms_names[] = $term->name;
	            }

	            $bfi_img_size = explode('x', $img_size);
	            $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

	            $post_thumbnail = $post_thumbnail[0];
	            if (count($bfi_img_size) >= 2 || is_numeric($bfi_img_size[0])) {
	                $post_thumbnail = bfi_thumb($post_thumbnail, array('width' => $bfi_img_size[0], 'height' => $bfi_img_size[1]));
	            }

	            $inner_html = '<div class="hover-content-container"><div class="hover-content">';
	            $inner_html .= do_shortcode('[svg svg_icon="svg01"]');
	            $inner_html .= '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
	            $inner_html .= '<p>'.implode(', ', $terms_names).'</p>';
	            $inner_html .= '</div></div>';
	            ?>
				<div class="slide-item <?php echo esc_attr(implode(' ', $terms_slugs)) ?>">
					<?php echo ''.$inner_html; ?>
					<img class="img-responsive" src="<?php echo esc_attr($post_thumbnail) ?>" alt="" />
				</div>
			<?php
	        endwhile;
	        wp_reset_postdata();
	        ?>

		</div>

	</div>
	<?php if (!empty($item_padding) || $item_padding === 0): ?>
	<style media="screen">
		#<?php echo esc_attr($id_pCarousel) ?> .slide-item {
			padding: <?php echo esc_attr($item_padding); ?>px;
		}
	</style>
	<?php endif; ?>

<?php endif; ?>
