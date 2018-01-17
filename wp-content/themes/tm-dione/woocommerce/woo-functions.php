<?php
/**
 * Woocommerce Functions.
 */

// remove woocommerce actions
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);

// Remove action in single product
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

// add actions
add_action('woocommerce_before_shop_loop_item', 'tm_template_loop_product_link_open', 10);
add_action('woocommerce_after_shop_loop_item', 'tm_template_loop_product_link_close', 5);
add_action('woocommerce_after_shop_loop_item', 'tm_template_loop_product_link_close', 10);

add_action('woocommerce_shop_loop_item_title', 'tm_template_loop_product_title', 10);

add_action('woocommerce_before_shop_loop_item_title', 'tm_template_loop_product_thumbnail', 10);

// Filter
add_filter('woocommerce_product_review_comment_form_args', 'tm_product_review_comment_form_args');

// Remove link
function tm_template_loop_product_link_open()
{
    return;
}
function tm_template_loop_product_link_close()
{
    return;
}

// Thumbnail
function tm_template_loop_product_thumbnail($size = 'shop_catalog')
{
    global $post,$woocommerce_loop;

    echo '<div class="image-product-contain">';
    echo '<a href="'.get_the_permalink().'" class="product-link">';
    wc_get_template('loop/sale-flash.php');

    if (isset($woocommerce_loop['thumb_size']) && !empty($woocommerce_loop['thumb_size'])) {
        $size = $woocommerce_loop['thumb_size'];
    }

    if (has_post_thumbnail()) {
        echo get_the_post_thumbnail($post->ID, $size);
    } elseif (wc_placeholder_img_src()) {
        echo wc_placeholder_img($size);
    }
    echo '</a>';

    if (isset($woocommerce_loop['thumb_size']) && !empty($woocommerce_loop['thumb_size'])) {
        echo '<div class="woo-content-product">';
        echo '<p><a href="'.get_the_permalink().'" class="product-name">'.get_the_title().'</a></p>';
        wc_get_template('loop/price.php');
        wc_get_template('loop/rating.php');
        wc_get_template('loop/add-to-cart.php');
        echo '</div>';
    } else {
        wc_get_template('loop/add-to-cart.php');
    }
    echo '</div>';
}

// Title
function tm_template_loop_product_title()
{
    global $woocommerce_loop;
    if (!isset($woocommerce_loop['el_class']) || $woocommerce_loop['el_class'] != 'grid-masonry') {
        echo '<div class="woo-content-product">';
        echo '<p><a href="'.get_the_permalink().'" class="product-name">'.get_the_title().'</a></p>';
        wc_get_template('loop/price.php');
        wc_get_template('loop/rating.php');
        echo '</div>';
    }
}

// Button form review
function tm_product_review_comment_form_args($comment_form)
{
    $comment_form['submit_button'] = '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-border-black" value="%4$s" />';

    return $comment_form;
}

/*======================================= MY ACCOUNT ======================================= */
/**
 * Customize billing fields.
 *
 * @param $fields
 *
 * @return mixed
 */
function tm_dione_override_billing_fields($fields)
{
    // First name
    $fields['billing_first_name']['class'] = array('col-xs-12 col-sm-6 padding-sm-right-10');
    $fields['billing_first_name']['placeholder'] = esc_html__('First name (*)', 'tm-dione');

    // Last name
    $fields['billing_last_name']['class'] = array('col-xs-12 col-sm-6 padding-sm-left-10');
    $fields['billing_last_name']['placeholder'] = esc_html__('Last name (*)', 'tm-dione');

    // Company
    $fields['billing_company']['class'] = array('col-xs-12');
    $fields['billing_company']['placeholder'] = esc_html__('Company name', 'tm-dione');

    // Email
    $fields['billing_email']['class'] = array('col-xs-12 col-sm-7 padding-sm-right-10');
    $fields['billing_email']['placeholder'] = esc_html__('Email (*)', 'tm-dione');

    // Phone
    $fields['billing_phone']['class'] = array('col-xs-12 col-sm-5 padding-sm-left-10');
    $fields['billing_phone']['placeholder'] = esc_html__('Phone (*)', 'tm-dione');

    // Country
    $fields['billing_country']['class'] = array('col-xs-12');

    // Address
    $fields['billing_address_1']['class'] = array('col-xs-12');
    $fields['billing_address_1']['placeholder'] = esc_html__('Street address (*)', 'tm-dione');
    $fields['billing_address_2']['class'] = array('col-xs-12');

    // City
    $fields['billing_city']['class'] = array('col-xs-12');

    // State
    $fields['billing_state']['class'] = array('col-xs-12 col-sm-8 padding-sm-right-10');
    $fields['billing_state']['placeholder'] = esc_html__('State', 'tm-dione');

    // Post code
    $fields['billing_postcode']['class'] = array('col-xs-12 col-sm-4');

    return $fields;
}

add_filter('woocommerce_billing_fields', 'tm_dione_override_billing_fields');

function tm_dione_override_shipping_fields($fields)
{
    // First name
    $fields['shipping_first_name']['class'] = array('col-xs-12 col-sm-6 padding-sm-right-10');
    $fields['shipping_first_name']['placeholder'] = esc_html__('First name (*)', 'tm-dione');

    // Last name
    $fields['shipping_last_name']['class'] = array('col-xs-12 col-sm-6 padding-sm-left-10');
    $fields['shipping_last_name']['placeholder'] = esc_html__('Last name (*)', 'tm-dione');

    // Company
    $fields['shipping_company']['class'] = array('col-xs-12');
    $fields['shipping_company']['placeholder'] = esc_html__('Company name', 'tm-dione');

    // Country
    $fields['shipping_country']['class'] = array('col-xs-12');

    // Address
    $fields['shipping_address_1']['class'] = array('col-xs-12');
    $fields['shipping_address_1']['placeholder'] = esc_html__('Street address (*)', 'tm-dione');
    $fields['shipping_address_2']['class'] = array('col-xs-12');

    // City
    $fields['shipping_city']['class'] = array('col-xs-12');

    // State
    $fields['shipping_state']['class'] = array('col-xs-12 col-sm-8 padding-sm-right-10');
    $fields['shipping_state']['placeholder'] = esc_html__('State', 'tm-dione');

    // Post code
    $fields['shipping_postcode']['class'] = array('col-xs-12 col-sm-4');

    return $fields;
}

add_filter('woocommerce_shipping_fields', 'tm_dione_override_shipping_fields');

/*======================================= CHECK OUT ======================================= */
/**
 * Customize checkout fields.
 *
 * @param $fields
 *
 * @return mixed
 */
function tm_dione_override_checkout_fields($fields)
{

    // First name
    $fields['billing']['billing_first_name']['class'] = $fields['shipping']['shipping_first_name']['class'] = array('col-xs-12 col-sm-6 padding-sm-right-10');
    $fields['billing']['billing_first_name']['placeholder'] = $fields['shipping']['shipping_first_name']['placeholder'] = esc_html__('First name (*)', 'tm-dione');

    // Last name
    $fields['billing']['billing_last_name']['class'] = $fields['shipping']['shipping_last_name']['class'] = array('col-xs-12 col-sm-6 padding-sm-left-10');
    $fields['billing']['billing_last_name']['placeholder'] = $fields['shipping']['shipping_last_name']['placeholder'] = esc_html__('Last name (*)', 'tm-dione');

    // Company
    $fields['billing']['billing_company']['class'] = $fields['shipping']['shipping_company']['class'] = array('col-xs-12');
    $fields['billing']['billing_company']['placeholder'] = $fields['shipping']['shipping_company']['placeholder'] = esc_html__('Company name', 'tm-dione');

    // Email
    $fields['billing']['billing_email']['class'] = array('col-xs-12 col-sm-7 padding-sm-right-10');
    $fields['billing']['billing_email']['placeholder'] = esc_html__('Email (*)', 'tm-dione');

    // Phone
    $fields['billing']['billing_phone']['class'] = array('col-xs-12 col-sm-5 padding-sm-left-10');
    $fields['billing']['billing_phone']['placeholder'] = esc_html__('Phone (*)', 'tm-dione');

    // Country
    $fields['billing']['billing_country']['class'] = $fields['shipping']['shipping_country']['class'] = array('col-xs-12');

    // Address
    $fields['billing']['billing_address_1']['class'] = $fields['shipping']['shipping_address_1']['class'] = array('col-xs-12');
    $fields['billing']['billing_address_1']['placeholder'] = $fields['shipping']['shipping_address_1']['placeholder'] = esc_html__('Street address (*)', 'tm-dione');
    $fields['billing']['billing_address_2']['class'] = $fields['shipping']['shipping_address_2']['class'] = array('col-xs-12');

    // City
    $fields['billing']['billing_city']['class'] = $fields['shipping']['shipping_city']['class'] = array('col-xs-12');

    // State
    $fields['billing']['billing_state']['class'] = $fields['shipping']['shipping_state']['class'] = array('col-xs-12 col-sm-8 padding-sm-right-10');
    $fields['billing']['billing_state']['placeholder'] = $fields['shipping']['shipping_state']['placeholder'] = esc_html__('State', 'tm-dione');

    // Post code
    $fields['billing']['billing_postcode']['class'] = $fields['shipping']['shipping_postcode']['class'] = array('col-xs-12 col-sm-4');

    // Order comment
    $fields['order']['order_comments']['class'] = array('col-xs-12');

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'tm_dione_override_checkout_fields');
