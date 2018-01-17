<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory).
 *
 * @category YourThemeOrPlugin
 *
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 *
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter.
 *
 * @param CMB2_Field object $field Field object
 *
 * @return bool True if metabox should show
 */
function cmb2_hide_if_no_cats($field)
{
    // Don't show this field if not in the cats category
    if (!has_tag('cats', $field->object_id)) {
        return false;
    }

    return true;
}

add_filter('tm_molly_page_meta_box_presets', 'tm_molly_page_meta_box_presets');
function tm_molly_page_meta_box_presets($presets)
{
	$presets[] = 'header_preset';
	$presets[] = 'header_dark_light';

    $presets[] = 'footer_preset';
	$presets[] = 'footer_dark_light';

    return $presets;
}

add_filter('cmb2_meta_boxes', 'tm_dione_metaboxes');
/**
 * Define the metabox and field configurations.
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function tm_dione_metaboxes(array $meta_boxes)
{

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'infinity_';

    /*
     * Sample metabox to demonstrate each field type included
     */
    $fields = array(
        array(
            'name' => esc_html__('Page Layout', 'tm-dione'),
            'desc' => esc_html__('Choose a layout you want', 'tm-dione'),
            'id' => $prefix.'page_layout_private',
            'type' => 'select',
            'options' => array(
                'default' => esc_html__('Default', 'tm-dione'),
                'full-width' => esc_html__('Full width', 'tm-dione'),
                'content-sidebar' => esc_html__('Content-Sidebar', 'tm-dione'),
                'sidebar-content' => esc_html__('Sidebar-Content', 'tm-dione'),
            ),
        ),
        array(
            'name' => esc_html__('Page title', 'tm-dione'),
            'desc' => esc_html__('Choose a style', 'tm-dione'),
            'id' => $prefix.'page_title',
            'type' => 'select',
            'options' => array(
                '' => esc_html__('Default', 'tm-dione'),
                'center-style' => esc_html__('Center Style', 'tm-dione'),
                'none' => esc_html__('Disable', 'tm-dione'),
            ),
        ),
        array(
            'name' => esc_html__('Title Background', 'tm-dione'),
            'desc' => esc_html__('Upload an image or enter a URL for heading title', 'tm-dione'),
            'id' => $prefix.'heading_image',
            'type' => 'file',
        ),
        array(
            'name' => esc_html__('Custom Title', 'tm-dione'),
            'id' => $prefix.'custom_title',
            'type' => 'text',
        ),
        array(
            'name' => esc_html__('Custom Description', 'tm-dione'),
            'id' => $prefix.'custom_desc',
            'type' => 'textarea',
        ),
        array(
            'name' => esc_html__('Title Height', 'tm-dione'),
            'desc' => esc_html__('Example: 500px', 'tm-dione'),
            'id' => $prefix.'custom_height',
            'type' => 'text',
        ),
        array(
            'name' => esc_html__('Title margin botom', 'tm-dione'),
            'desc' => esc_html__('Example: 50px', 'tm-dione'),
            'id' => $prefix.'title_margin_bottom',
            'type' => 'text',
        ),
        array(
            'name' => esc_html__('Breadcrumb', 'tm-dione'),
            'id' => $prefix.'breadcrumb',
            'type' => 'select',
            'options' => array(
                'default' => esc_html__('Default', 'tm-dione'),
                '1' => esc_html__('Enable', 'tm-dione'),
                '0' => esc_html__('Disable', 'tm-dione'),
            ),
        ),
        array(
            'name' => esc_html__('Disable Comment', 'tm-dione'),
            'desc' => esc_html__('Check this box to disable comment form of the page', 'tm-dione'),
            'id' => $prefix.'disable_comment',
            'type' => 'checkbox',
        ),
        array(
            'name' => esc_html__('Overlay Menu', 'tm-dione'),
            'desc' => esc_html__('Check this box to enable Overlay Menu', 'tm-dione'),
            'id' => $prefix.'menu_overlay',
            'type' => 'checkbox',
        ),
        array(
            'name' => esc_html__('Onepage scroll', 'tm-dione'),
            'desc' => esc_html__('Check this box to enable Onepage scroll', 'tm-dione'),
            'id' => $prefix.'onepage_scroll',
            'type' => 'checkbox',
        ),
		array(
            'name' => esc_html__('Sticky Header', 'tm-dione'),
            'desc' => esc_html__('Check this box to enable Sticky Header Enable', 'tm-dione'),
            'id' => $prefix.'sticky_header_enable',
            'type' => 'checkbox',
        ),
		array(
            'name' => esc_html__('Disable main menu', 'tm-dione'),
            'desc' => esc_html__('Check this box to disable main menu', 'tm-dione'),
            'id' => $prefix.'hide_main_nav',
            'type' => 'checkbox',
        ),
		array(
            'name' => esc_html__('Main menu', 'tm-dione'),
            'desc' => esc_html__('Choose main menu for this page', 'tm-dione'),
            'id' => $prefix.'page_main_menu',
            'type' => 'select',
            'options' => tm_get_all_menus(),
        ),

        array(
            'name' => esc_html__('Custom Class', 'tm-dione'),
            'desc' => esc_html__('Enter custom class for this page', 'tm-dione'),
            'id' => $prefix.'custom_class',
            'type' => 'text',
        ),
    );

    $presets = apply_filters('tm_molly_page_meta_box_presets', array());
    $preset_meta_boxes = array();

    if (!empty($presets)) {
        foreach ($presets as $preset) {
            if (!empty(Kirki::$fields[ $preset ]) && !empty(Kirki::$fields[ $preset ]['choices']) ) {
				$kirki_preset = Kirki::$fields[ $preset ];
				$options = array('' => esc_html__('Default', 'tm-dione'));
				if( Kirki::$fields[ $preset ]['type'] == 'kirki-preset' ) {

	                foreach ($kirki_preset['choices'] as $preset_choice_value => $preset_choice) {
	                    $options[ $preset_choice_value ] = $preset_choice['label'];
	                }

	                $preset_meta_boxes[] = array(
	                    'name' => $kirki_preset['label'],
	                    'desc' => isset($kirki_preset['description']) ? $kirki_preset['description'] : '',
	                    'id' => $prefix.$preset,
	                    'type' => 'select',
	                    'options' => $options,
	                );
				} else {

					$preset_meta_boxes[] = array(
	                    'name' => $kirki_preset['label'],
	                    'desc' => isset($kirki_preset['description']) ? $kirki_preset['description'] : '',
	                    'id' => $prefix.$preset,
	                    'type' => 'select',
	                    'options' => array_merge($kirki_preset['choices'], $options ),
	                );

				}
            }
        }
    }

    $reverse_preset_meta_boxes = array_reverse($preset_meta_boxes);
    foreach ($reverse_preset_meta_boxes as $preset_meta_box) {
        array_unshift($fields, $preset_meta_box);
    }
    /*
     * Sample metabox to demonstrate each field type included
     */
    $meta_boxes['page_metabox'] = array(
        'id' => 'page_metabox',
        'title' => esc_html__('Page Settings', 'tm-dione'),
        'object_types' => array('page'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
        'fields' => $fields,
    );

    $prefix = 'portfolio_';
    $meta_boxes['portfolio'] = array(
        'id' => 'portfolio_metabox',
        'title' => esc_html__('Portfolio Settings', 'tm-dione'),
        'object_types' => array('portfolio'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
        'fields' => array(
            array(
                'name' => esc_html__('Layout', 'tm-dione'),
                'desc' => esc_html__('Choose a layout', 'tm-dione'),
                'id' => $prefix.'single_layout',
                'type' => 'select',
                'options' => array(
                    '' => esc_html__('Default', 'tm-dione'),
                    '1-column' => esc_html__('1 Column', 'tm-dione'),
                    '2-columns' => esc_html__('2 Columns', 'tm-dione'),
                ),
            ),
            array(
                'name' => esc_html__('Title Background', 'tm-dione'),
                'desc' => esc_html__('Upload an image or enter a URL for heading title', 'tm-dione'),
                'id' => $prefix.'heading_image',
                'type' => 'file',
            ),
            array(
                'name' => esc_html__('Client', 'tm-dione'),
                'desc' => esc_html__('Enter the client name', 'tm-dione'),
                'id' => $prefix.'client',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Website', 'tm-dione'),
                'desc' => esc_html__('Enter the link', 'tm-dione'),
                'id' => $prefix.'website',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Gallery Images', 'tm-dione'),
                'desc' => esc_html__('Upload or add multiple images/attachments.', 'tm-dione'),
                'id' => $prefix.'gallery_image',
                'type' => 'file_list',
                'preview_size' => array(100, 100), // Default: array( 50, 50 )
            ),
        ),
    );

	$prefix = 'testimonials_';
    $meta_boxes['testimonials'] = array(
        'id' => 'testimonials_metabox',
        'title' => esc_html__('Testimonials Settings', 'tm-dione'),
        'object_types' => array('testimonials'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
        'fields' => array(
            array(
                'name' => esc_html__('Author', 'tm-dione'),
                'desc' => esc_html__('Enter the author name', 'tm-dione'),
                'id' => $prefix.'author',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Text', 'tm-dione'),
                'desc' => esc_html__('Enter the testimonial text', 'tm-dione'),
                'id' => $prefix.'text',
                'type' => 'textarea',
            ),
            array(
                'name' => esc_html__('Description', 'tm-dione'),
                'desc' => esc_html__('Enter the Description text', 'tm-dione'),
                'id' => $prefix.'description',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Website', 'tm-dione'),
                'desc' => esc_html__("Enter full URL of the author's website", 'tm-dione'),
                'id' => $prefix.'website',
                'type' => 'text',
            ),
        ),
    );

	$prefix = 'post_';
    $meta_boxes['post'] = array(
        'id' => 'post_metabox',
        'title' => esc_html__('Post Settings', 'tm-dione'),
        'object_types' => array('post'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
        'fields' => array(
			array(
	            'name' => esc_html__('Hide Featured image', 'tm-dione'),
	            'desc' => esc_html__('Check this box to disable featured image in single post', 'tm-dione'),
	            'id' => $prefix.'hide_featured_image',
	            'type' => 'checkbox',
	        ),
        ),
    );

    return $meta_boxes;
}
