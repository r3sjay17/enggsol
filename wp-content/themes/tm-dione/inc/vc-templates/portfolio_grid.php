<?php
$default_args = array(
    'categories' => '',
    'order' => '',
    'columns' => 'folio-main-4cols',
    'order_by' => 'date',
    'order' => 'ASC',
    'type' => 'grid',
	'ratio' => '1:1',
    'style' => 'style01',
	'grid_style' => '',
	'button_text' => '',
    'img_size' => '500',
	'link_to' => '',
    'number' => '-1',
    'hide_filter' => '',
    'item_padding' => '',
    'custom_class' => '',
    'css' => '',
);

extract(shortcode_atts($default_args, $atts));
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), $this->settings['base'], $atts);

if (!is_numeric($img_size)) {
    $img_size = '500';
}
if (empty($type)) {
    $type = 'grid';
}

$img_base_w = $img_size;
$img_size = $img_base_w.'x'.$img_base_w;

$img_size_big = ($img_base_w * 2).'x'.($img_base_w * 2);
$img_size_first = $img_size_big;
$img_size_third = ($img_base_w * 2).'x'.($img_base_w - 15);

$img_size_small = ($img_base_w).'x'.($img_base_w - ($img_base_w/3));

$i = 0;
$column_cl = '';
$terms = get_terms('portfolio_category', array(
    //'hide_empty' => false,
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
	'orderby' => $order_by,
	'order'   => $order,
    'posts_per_page' => $number,
);

$loop = new WP_Query($args);

$id_pGrid = uniqid('pGrid-');
$link = '';
?>

<?php if ($type == 'grid'): ?>

	<div id="<?php echo esc_attr($id_pGrid) ?>" class="folio-main-content <?php echo esc_attr($custom_class) ?> <?php echo esc_attr($css_class) ?>">
		<?php if ($hide_filter != 'hide_filter_enable'): ?>
			<ul class="folio-main-filter list-inline" data-option-key="filter">
				<li><a class="filter-grid active" href="#filter" data-option-value="*"><?php esc_html_e('All', 'tm-dione') ?></a></li>
				<?php foreach ($terms as $key => $term): ?>
					<li><a class="filter-grid" href="#" data-option-value="<?php echo '.'.$term->slug ?>"><?php echo ''.$term->name ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<div class="folio-main-grid  <?php echo esc_attr($columns) ?>">
			<?php while ($loop->have_posts()) : $loop->the_post();

                $terms = get_the_terms(get_the_ID(), 'portfolio_category');

                $terms_slugs = array();
                $terms_names = array();

                foreach ($terms as $term) {
                    $terms_slugs[] = $term->slug;
                    $terms_names[] = $term->name;
                }

				if(!empty($ratio) && $ratio != '1:1') {
					if($ratio == '3:2') {
						$ratio = 3/2;
					}
					elseif($ratio == '2:1') {
						$ratio = 2/1;
					}
					elseif($ratio == '4:3') {
						$ratio = 4/3;
					}
					elseif($ratio == '16:9') {
						$ratio = 16/9;
					}
					$img_size = $img_base_w . 'x' . ($img_base_w / $ratio);
				}

				if(!empty($link_to) && $link_to == 'website') {
					$link = do_shortcode(get_post_meta( get_the_ID(), "portfolio_website", true ));
				} else {
					$link = get_the_permalink();
				}
                ?>
				<!-- PORTFOLIO ITEM -->
				<div
					class="filter-animation folio-main-item col-sm-12 <?php echo esc_attr($columns) ?> <?php echo esc_attr(implode(' ', $terms_slugs)) ?>">

					<?php if($grid_style == 'show-title-button'): ?>

						<div class="folio-wrapper show-title-button">
							<?php
							$bfi_img_size = explode('x', $img_size);
							$post_thumbnail =  wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
							?>
							<img class="img-responsive" src="<?php echo esc_attr( bfi_thumb( $post_thumbnail[0], array( 'width' => $bfi_img_size[0], 'height' => $bfi_img_size[1] ) ) ) ?>" alt="" />

							<div class="folio-overlay">
								<div class="text-center">
									<a class="btn btn-medium btn-bg-white-color" target="_blank" href="<?php echo esc_url($link) ?>"><?php echo esc_html($button_text) ?></a>
								</div>
							</div>
						</div>
						<h6 class="show-title-button"><a href="<?php echo esc_url($link) ?>"><?php the_title() ?></a></h6>

					<?php else: ?>
						<a href="<?php echo esc_url($link) ?>">
							<div class="folio-wrapper">
								<?php
								$bfi_img_size = explode('x', $img_size);
								$post_thumbnail =  wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
								?>
								<img class="img-responsive" src="<?php echo esc_attr( bfi_thumb( $post_thumbnail[0], array( 'width' => $bfi_img_size[0], 'height' => $bfi_img_size[1] ) ) ) ?>" alt="" />

								<div class="folio-overlay">
									<div class="folio-overlay-inner">
										<p><?php echo esc_attr(implode(', ', $terms_names)) ?></p>
										<h5><?php the_title() ?></h5>
									</div>
								</div>
								<div class="folio-overlay-zoom ndSvgFill">
									<svg viewBox="0 0 30 30" version="1.1"
									     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									     xml:space="preserve"
									     x="0px" y="0px" width="30px" height="30px">
		                                <g>
			                                <rect x="13" y="0" width="4" height="30"/>
			                                <rect x="0" y="13" width="30" height="4"/>
		                                </g>
		                        	</svg>
								</div>
							</div>
						</a>

					<?php endif; ?>

				</div>
			<?php endwhile;
            wp_reset_postdata(); ?>
		</div>
	</div>

<?php elseif ($type == 'masonry'): ?>
	<div  id="<?php echo esc_attr($id_pGrid) ?>" class="folio-main-content <?php echo esc_attr($style.' '.$css_class) ?>">
		<?php if ($hide_filter != 'hide_filter_enable'): ?>
			<ul class="folio-main-filter list-inline" data-option-key="filter">
				<li><a class="filter-masonry active" href="#filter" data-option-value="*"><?php esc_html_e('All', 'tm-dione') ?></a></li>
				<?php foreach ($terms as $key => $term): ?>
					<li><a class="filter-masonry" href="#" data-option-value="<?php echo '.'.$term->slug ?>"><?php echo ''.$term->name ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<div class="folio-main-masonry <?php echo esc_attr($columns) ?>">
        <div class="folio-main-item folio-main-item_sizer"></div>
			<?php
             while ($loop->have_posts()) : $loop->the_post();

                $terms = get_the_terms(get_the_ID(), 'portfolio_category');

                $terms_slugs = array();
                $terms_names = array();

                foreach ($terms as $term) {
                    $terms_slugs[] = $term->slug;
                    $terms_names[] = $term->name;
                }
                    ++$i;
					$size = '';
                    if ($style == 'style01') {
                        $condition = ($i == 1 || $i == 3);
                        $column_cl = $condition ? 'folio-main-item_width2' : '';
                        switch ($i) {
                            case 1:
                                $size = $img_size_first;
                                break;
                            case 3:
                                $size = $img_size_third;
                                break;
                            default:
                                $size = $img_size;
                                break;
                        }
                    } elseif ($style == 'style02') { // Metro
                        $condition = (($i - 1) % 3 == 0);
                        $column_cl = $condition ? 'folio-main-item_width2' : '';
                        $size = $condition ? $img_size_big : $img_size;
                    } elseif ($style == 'style03') {
                        $condition = (($i - 1) % 3 == 0 || $i == 0);
                        //$column_cl = $condition?'folio-main-item_width2':'' ;
                        $size = $condition ? $img_size_small : $img_size;
                    }
                ?>
				<!-- PORTFOLIO ITEM -->
				<?php if ($style == 'style03'): ?>
					<div
						class="filter-animation folio-main-item <?php echo esc_attr($column_cl) ?> <?php echo esc_attr(implode(' ', $terms_slugs)) ?>">
						<a href="<?php the_permalink(); ?>">
							<div class="folio-wrapper">
								<?php
								$bfi_img_size = explode('x', $size);
								$post_thumbnail =  wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
								?>
								<img class="img-responsive" src="<?php echo esc_attr( bfi_thumb( $post_thumbnail[0], array( 'width' => $bfi_img_size[0], 'height' => $bfi_img_size[1] ) ) ) ?>" alt="" />
							</div>
						</a>
						<div class="folio-info text-center">
							<div class="svg-plus ndSvgFill">
								<svg viewBox="0 0 30 30" version="1.1"
									  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									  xml:space="preserve"
									  x="0px" y="0px" width="30px" height="30px">
											  <g>
												  <rect x="13" y="0" width="4" height="30"/>
												  <rect x="0" y="13" width="30" height="4"/>
											  </g>
									</svg>
							</div>
							<p><?php echo esc_attr(implode(', ', $terms_names)) ?></p>
							<h5><a class="folio-title" href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
						</div>
					</div>
				<?php else: ?>
					<div
						class="filter-animation folio-main-item <?php echo esc_attr($column_cl) ?> <?php echo esc_attr(implode(' ', $terms_slugs)) ?>">
						<a href="<?php the_permalink(); ?>">
							<div class="folio-wrapper">
								<?php
								$bfi_img_size = explode('x', $size);
								$post_thumbnail =  wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
								if($style == 'nature_size'):
								?>
									<img class="img-responsive" src="<?php echo esc_attr( $post_thumbnail[0]) ?>" alt="" />
								<?php else: ?>
									<img class="img-responsive" src="<?php echo esc_attr( bfi_thumb( $post_thumbnail[0], array( 'width' => $bfi_img_size[0], 'height' => $bfi_img_size[1] ) ) ) ?>" alt="" />
								<?php endif; ?>
								<div class="folio-overlay">
									<div class="folio-overlay-inner">
										<p><?php echo esc_attr(implode(', ', $terms_names)) ?></p>
										<h5><?php the_title() ?></h5>
									</div>
								</div>
								<div class="folio-overlay-zoom ndSvgFill">
									<svg viewBox="0 0 30 30" version="1.1"
									     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									     xml:space="preserve"
									     x="0px" y="0px" width="30px" height="30px">
	                               	<g>
			                                <rect x="13" y="0" width="4" height="30"/>
			                                <rect x="0" y="13" width="30" height="4"/>
	                                 </g>
	                        </svg>
								</div>
							</div>
						</a>
					</div>
				<?php endif; ?>
			<?php endwhile;
            wp_reset_postdata(); ?>
		</div>
	</div>
<?php endif; ?>

<?php if (!empty($item_padding) || $item_padding === 0): ?>
<style media="screen">
	#<?php echo esc_attr($id_pGrid) ?> .folio-main-item {
		padding: <?php echo esc_attr($item_padding); ?>px;
	}
</style>
<?php endif; ?>
