<?php
// Load fonts
require_once get_template_directory().'/inc/vc-maps/params/functions.php';
require_once get_template_directory().'/inc/vc-maps/fonts/pe-7-troke.php';

require_once get_template_directory().'/inc/vc-maps/params/icons.php';
require_once get_template_directory().'/inc/vc-maps/params/number.php';
require_once get_template_directory().'/inc/vc-maps/params/switch.php';
require_once get_template_directory().'/inc/vc-maps/params/gradient.php';
require_once get_template_directory().'/inc/vc-maps/params/datetime_picker.php';

function tm_dione_vc_param($param_type)
{
    $param = array();

    switch ($param_type) {
         case 'title':
              $param = array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'tm-dione'),
                    'param_name' => 'title',
                    'admin_label' => true,
              );
              break;

          case 'title':
            $param = array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'tm-dione'),
                'param_name' => 'title',
                'admin_label' => true,
            );
            break;

        default:
            $param = array(
                'type' => 'textfield',
                'heading' => esc_html__('404 not found', 'tm-dione'),
                'std' => esc_html__('404 not found', 'tm-dione'),
                'param_name' => 'not_found',
                'admin_label' => true,
            );
            break;
    }

    return $param;
}
