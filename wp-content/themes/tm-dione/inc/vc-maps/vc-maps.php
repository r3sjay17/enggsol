<?php
/**
 * Initial setup
 * =============
 */
$new_vc_dir = get_template_directory() . '/inc/vc-templates';
if ( function_exists( "vc_set_shortcodes_templates_dir" ) ) {
	vc_set_shortcodes_templates_dir( $new_vc_dir );
}
// Update shortcode
vc_map_update('vc_separator', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico divider-icon',
));

vc_map_update('vc_text_separator', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico divider-icon',
));

vc_map_update('vc_single_image', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico singleimage-icon',
));

vc_map_update('rev_slider', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
));

// remove some shortcode
vc_remove_element( "vc_button" );
vc_remove_element( "vc_message" );
vc_remove_element( "vc_cta" );
vc_remove_element( "vc_toggle" );
vc_remove_element( "vc_tta_tour" );

require_once get_template_directory() . '/inc/vc-maps/params/params.php';

// Load shortcode
require_once get_template_directory() . '/inc/vc-maps/google_map.php';

//require_once get_template_directory() . '/inc/vc-maps/custom-heading.php';

require_once get_template_directory() . '/inc/vc-maps/vc_row.php';
require_once get_template_directory() . '/inc/vc-maps/vc_column.php';
require_once get_template_directory() . '/inc/vc-maps/button.php';
require_once get_template_directory() . '/inc/vc-maps/message.php';
require_once get_template_directory() . '/inc/vc-maps/vc_column_text.php';
require_once get_template_directory() . '/inc/vc-maps/testimonials.php';
require_once get_template_directory() . '/inc/vc-maps/icons.php';
require_once get_template_directory() . '/inc/vc-maps/icon_with_text.php';
require_once get_template_directory() . '/inc/vc-maps/call_to_action.php';
require_once get_template_directory() . '/inc/vc-maps/process_bar.php';
require_once get_template_directory() . '/inc/vc-maps/counter.php';
require_once get_template_directory() . '/inc/vc-maps/list.php';

require_once get_template_directory() . '/inc/vc-maps/vc_tta_accordion.php';
require_once get_template_directory() . '/inc/vc-maps/vc_tta_section.php';
require_once get_template_directory() . '/inc/vc-maps/vc_custom_heading.php';
require_once get_template_directory() . '/inc/vc-maps/vc_gallery.php';

require_once get_template_directory() . '/inc/vc-maps/carousel.php';
require_once get_template_directory() . '/inc/vc-maps/latest_blog.php';
require_once get_template_directory() . '/inc/vc-maps/blog.php';
require_once get_template_directory() . '/inc/vc-maps/countdown.php';
require_once get_template_directory() . '/inc/vc-maps/compare_table.php';
require_once get_template_directory() . '/inc/vc-maps/price_box.php';
require_once get_template_directory() . '/inc/vc-maps/team_member.php';
require_once get_template_directory() . '/inc/vc-maps/team_member2.php';
require_once get_template_directory() . '/inc/vc-maps/vc_tta_tabs.php';

require_once get_template_directory() . '/inc/vc-maps/svg.php';
if ( post_type_exists( 'portfolio' ) ) {
	require_once get_template_directory() . '/inc/vc-maps/portfolio_grid.php';
    require_once get_template_directory() . '/inc/vc-maps/portfolio_carousel.php';
    require_once get_template_directory() . '/inc/vc-maps/portfolio_list.php';
}

require_once get_template_directory() . '/inc/vc-maps/line.php';
require_once get_template_directory() . '/inc/vc-maps/shop_banner.php';
require_once get_template_directory() . '/inc/vc-maps/tm_video.php';
require_once get_template_directory() . '/inc/vc-maps/tm_woo_products.php';
require_once get_template_directory() . '/inc/vc-maps/services.php';

require_once get_template_directory() . '/inc/vc-maps/thememove-menu.php';

require_once get_template_directory() . '/inc/vc-maps/animation.php';

require_once get_template_directory() . '/inc/vc-maps/horizontal_scroll_gallery.php';

// Disable auto update of VC
add_action( 'vc_before_init', 'disable_updater' );
function disable_updater() {
	vc_manager()->disableUpdater();
}

/*** Restore Tabs&Accordion from Deprecated category ***/

$vc_map_deprecated_settings = array (
	'deprecated' => false,
	'category' => esc_html__( 'Content', 'tm-dione' )
);
