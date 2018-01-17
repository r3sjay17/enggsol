<?php

$args = array(
    'button_link' => '',
    'size' => 'btn-medium',
    'style' => '',
    'display' => '',
    'align' => '',
    'type' => '',
    'icon_type' => '',
    'icon_fontawesome' => '',
    'icon_openiconic' => '',
    'icon_typicons' => '',
    'icon_entypo' => '',
    'icon_linecons' => '',
    'icon_pe7stroke' => '',
    'custom_icon' => '',
    'icon_color' => '',
    'button_id' => '',
    'color' => '',
    'hover_color' => '',
    'background_color' => '',
    'hover_background_color' => '',
    'border_color' => '',
    'hover_border_color' => '',
    'font_style' => '',
    'font_weight' => '',
    'text_align' => '',
    'margin' => '',
    'border_radius' => '',
    'width' => '',
    'el_class' => '',
);

extract(shortcode_atts($args, $atts));

$button_link = vc_build_link($button_link);
$link = (isset($button_link['url'])) ? $button_link['url'] : '';
$text = (isset($button_link['title'])) ? $button_link['title'] : '';
$target = (isset($button_link['target'])) ? $button_link['target'] : '';

$button_id = $custom_class = 'btn-'.rand();

if ($target == '') {
    $target = '_self';
}

//init variables
$html = '';
$icon_html = $icon_styles = '';
$button_classes = 'btn';
$button_styles = '';
$add_icon = '';
$data_attr = '';

if ($style == 'text-link') {
    $button_classes = '';
    $size = '';
}

if ($el_class != '') {
    $button_classes .= " {$el_class}";
}

if ($size != '') {
    $button_classes .= " {$size}";
}

if ($text_align != '') {
    $button_classes .= " {$text_align}";
}

if ($style != '') {
    $button_classes .= " {$style}";
    if ($style == 'custom') {
        $button_classes .= " {$custom_class}";

        $e_custom_class = "<style> .{$custom_class} {";

        if ($color != '') {
            $e_custom_class .= 'color: '.$color.'; ';
        }

        if ($border_color != '') {
            $e_custom_class .= 'border-color: '.$border_color.'; ';
        }

        if ($background_color != '') {
            $e_custom_class .= "background-color: {$background_color};";
        }

        $e_custom_class .= "} .{$custom_class}:hover {";
        if ($hover_background_color != '') {
            $e_custom_class .= 'background-color:'.$hover_background_color.'; ';
        }

        if ($hover_border_color != '') {
            $e_custom_class .= 'border-color:'.$hover_border_color.'; ';
        }

        if ($hover_color != '') {
            $e_custom_class .= 'color:'.$hover_color;
        }

        $e_custom_class .= '} </style>';

        echo ''.$e_custom_class;
    }
}

if ($display != '' & $display != 'block') {
    $button_styles .= 'display: '.$display.'; ';
}

if ($font_style != '') {
    $button_styles .= 'font-style: '.$font_style.'; ';
}

if ($font_weight != '') {
    $button_styles .= 'font-weight: '.$font_weight.'; ';
}

if (isset($type) && $type != '') {
    $icon_html .= '<div class="text-link-icon">';
    if ($custom_icon != '') {
        if (is_numeric($custom_icon)) {
            $custom_icon_src = wp_get_attachment_url($custom_icon);
        } else {
            $custom_icon_src = $custom_icon;
        }

        $icon_html .= '<img src="'.esc_attr($custom_icon_src).'" alt="">';
    } else {
		$selector_icon = uniqid('selector-icon-');
	    tm_dione_apply_style($icon_styles, '#'.$selector_icon);

        $iconClass = isset(${'icon_'.$icon_type}) ? esc_attr(${'icon_'.$icon_type}) : 'fa fa-adjust';
        $icon_html .= "<i class='".$iconClass."' id='".$selector_icon."'></i>";
    }
    $icon_html .= '</div>';
}

if ($margin != '' && $display != 'block') {
    $button_styles .= 'margin: '.$margin.'; ';
}

if ($width != '') {
    $button_styles .= 'width: '.$width.'; ';
}

if ($border_radius != '') {
    $button_styles .= 'border-radius: '.$border_radius.'px;-moz-border-radius: '.$border_radius.'px;-webkit-border-radius: '.$border_radius.'px; ';
}

tm_dione_apply_style($button_styles, '#'.$button_id);

$html .= '<a id="'.$button_id.'" href="'.esc_attr($link).'" target="'.$target.'" '.$data_attr.' class="'.$button_classes.'">'.$text.$icon_html.'</a>';

if ($display == 'block') {
    $style_bf = '';
    if ($margin != '') {
        $style_bf = tm_dione_add_style($style_bf, 'margin', $margin);
    }
    if ($align != '') {
        $style_bf = tm_dione_add_style($style_bf, 'text-align', $align);
    }
    $selector_bf = uniqid('selector-bf-');
    tm_dione_apply_style($style_bf, '#'.$selector_bf);
    $html = '<div id="'.esc_attr($selector_bf).'">'.$html.'</div>';
}

tm_dione_print($html);
