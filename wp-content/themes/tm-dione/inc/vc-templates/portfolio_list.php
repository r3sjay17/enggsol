<?php
if (!defined('ABSPATH')) {
    die('-1');
}
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

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
    'posts_per_page' => $number,
);

$loop = new WP_Query($args);

?>

<?php if ($style == 'vertical'): ?>
<div class="portfolio-list slick-single-item <?php echo esc_attr($style)?>">

	<?php while ($loop->have_posts()) : $loop->the_post();
			 $link = ($link_to == 'website')?do_shortcode(get_post_meta( get_the_ID(), "portfolio_website", true )):get_the_permalink();

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
			        <a href="<?php echo esc_attr($link) ?>" class="btn btn-border-black"><?php esc_html_e('project detail', 'tm-dione') ?></a>
			    </div>
			</div>
	<?php endwhile;
        wp_reset_postdata(); ?>
</div>
<?php else: ?>
	<div class="our-works <?php echo esc_attr($style)?>">
		<?php while ($loop->have_posts()) : $loop->the_post();
				 $link = ($link_to == 'website')?do_shortcode(get_post_meta( get_the_ID(), "portfolio_website", true )):get_the_permalink();

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

				$works_item = 'background-image: url('.esc_attr($post_thumbnail).');';
				$works_item .= 'width: '.esc_attr($width).';';
				$id_works_item_style = uniqid('style-');
				tm_dione_apply_style($works_item, '#' . $id_works_item_style);
                 ?>
				 <!-- PORTFOLIO ITEM -->
        <div class="our-works_item" id="<?php echo esc_attr($id_works_item_style) ?>">
            <div class="our-works_overlay">
                <h5><a href="<?php echo esc_attr($link) ?>"><?php the_title() ?></a></h5>
            </div>
        </div>
		  <?php endwhile;
            wp_reset_postdata(); ?>
    </div>
<?php endif; ?>
