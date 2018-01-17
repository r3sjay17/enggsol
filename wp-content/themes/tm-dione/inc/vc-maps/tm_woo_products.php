<?php

/**
 * ThemeMove WooCommerce Recent Products.
 *
 * @version 1.0
 */
class WPBakeryShortCode_Tm_Woo_Products extends WPBakeryShortCode
{
    public function get_inline_css($css_id = '')
    {
        $atts = vc_map_get_attributes($this->getShortcode(), $this->getAtts());
        $css_id = '#'.$css_id;

        $title_style = $atts['title_style'];
        $title_color = $atts['title_color'];
        $title_bgcolor = $atts['title_bgcolor'];

        $css = '';

        $css .= $css_id.' .tm-shortcode-title{color:'.$title_color.';';

        if ('style-with-bgcolor' == $title_style) {
            $css .= 'background-color:'.$title_bgcolor.';';
        }

        $css .= '}';

        if ('style-with-underline' == $title_style) {
            $css .= $css_id.' .tm-shortcode-title span{border-bottom-color:'.$title_color.';}';
        }

        return $css;
    }
}

vc_map(array(
            'name' => esc_html__('Recent products', 'tm-dione'),
            'base' => 'tm_woo_products',
            'category' => sprintf(esc_html__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
            'description' => esc_html__('Show recent products', 'tm-dione'),
                'icon' => 'tm-shortcode-ico product-icon',
            'params' => array(

            ),
        ));
