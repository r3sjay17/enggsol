<?php

/***************/
// [my_custom_heading_shortcode ]
function heading_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'text_attr' => 'text_default',
        'dropdown_attr' => 'primary-heading',
        'dropdown_attr2' => 'align-left',
        'dropdown_alignment_attr' => 'left',
    ), $atts );

    $text_value = $a['text_attr'];
    $dropdown_value = $a['dropdown_attr'];
    $dropdown_value2 = $a['dropdown_attr2'];
    $image_id = $a['image_attr'];
    $href = vc_build_link( $a['url_link'] );

        $html .= '<div class="wx-heading '. $dropdown_value2 .'">';
        $html .= '<h1 class="'. $dropdown_value .'">'. $text_value .'</h1>';
        $html .= '</div>';

    return $html;




}
add_shortcode( 'my_custom_shortcode', 'heading_shortcode' );


add_action( 'vc_before_init', 'my_custom_heading_shortcode_vs' );
function my_custom_heading_shortcode_vs() {
   vc_map( array(
      "name" => __( "WX Headings", "my-dropdown-domain" ),
      "base" => "my_custom_shortcode",
      "class" => "",
      "category" => __( "WX Custom Shortcode", "my-text-domain"),
      "params" => array(
         array(
            "type" => "dropdown",
            "heading" => __( "Heading style", "my-text-domain" ),
            "param_name" => "dropdown_attr",
            "admin_label" => true,
            "description" => __( "Select style for heading.", "my-text-domain" ),
            "value" =>  array(
                    'Primary'    =>  '',
                    'Secondary'    =>  'secondary-heading',
                    'Third'    =>  'third-heading',
                    'Fourth'    =>  'fourth-heading',
                )
         ),

         array(
            "type" => "dropdown",
            "heading" => __( "Text align", "my-text-domain" ),
            "param_name" => "dropdown_attr2",
            "admin_label" => true,
            "description" => __( "Select style for heading.", "my-text-domain" ),
            "value" =>  array(
                    'left'    =>  'align-left',
                    'center'    =>  'align-center',
                    'right'    =>  'align-right',
                )
         ),

         array(
            "type" => "textfield",
            "heading" => __( "Text Heading", "my-text-domain" ),
            "param_name" => "text_attr",
            "value" => __( "Default param value", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "Insert the heading word.", "my-text-domain" )
         )

      )
   ) );
}

/*************/







/***************/

// [my_custom_buttons_shortcode ]
function buttons_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'text_attr' => 'readmore',
        'dropdown_attr' => 'primary-button',
        'dropdown_attr2' => 'align-left',
        'dropdown_alignment_attr' => 'left',
        'url_link' => '',
    ), $atts );

    $text_value = $a['text_attr'];
    $dropdown_value = $a['dropdown_attr'];
    $dropdown_value2 = $a['dropdown_attr2'];
    $image_id = $a['image_attr'];
    $href = vc_build_link( $a['url_link'] );

        $html .= '<a href="'. $href['url'] .'" class="wx-button '. $dropdown_value2 .'">';
        $html .= '<p class="'. $dropdown_value .'">'. $text_value .'</p>';
        $html .= '</a>';

    return $html;




}
add_shortcode( 'my_custom_button_shortcode', 'buttons_shortcode' );


add_action( 'vc_before_init', 'my_custom_buttons_shortcode_vs' );
function my_custom_buttons_shortcode_vs() {
   vc_map( array(
      "name" => __( "WX Buttons", "my-dropdown-domain" ),
      "base" => "my_custom_button_shortcode",
      "class" => "",
      "category" => __( "WX Custom Shortcode", "my-text-domain"),
      "params" => array(
         array(
            "type" => "dropdown",
            "heading" => __( "Button style", "my-text-domain" ),
            "param_name" => "dropdown_attr",
            "admin_label" => true,
            "description" => __( "Select style for heading.", "my-text-domain" ),
            "value" =>  array(
                    'Primary Button'    =>  '',
                    'Secondary Button'    =>  'secondary-button',
                )
         ),

         array(
            "type" => "dropdown",
            "heading" => __( "Text align", "my-text-domain" ),
            "param_name" => "dropdown_attr2",
            "admin_label" => true,
            "description" => __( "Select style for heading.", "my-text-domain" ),
            "value" =>  array(
                    'left'    =>  'align-left',
                    'center'    =>  'align-center',
                    'right'    =>  'align-right',
                )
         ),

         array(
            "type" => "textfield",
            "heading" => __( "Text Heading", "my-text-domain" ),
            "param_name" => "text_attr",
            "value" => __( "Default param value", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "Insert the heading word.", "my-text-domain" )
         ),

        array(
            "type" => "vc_link",
            "heading" => __( "Text Url", "my-text-domain" ),
            "param_name" => "url_link",
            "description" => __( "page link url page.", "my-text-domain" )
         )
      )
   ) );
}

/*************/





/***************/

// [Text with Image Attached ]
function text_img_shortcode( $atts,$content ) {
    $a = shortcode_atts( array(
        'textarea_html' => 'Insert Name',
        'image_attr' => 'attach_image',
        'text_attr' => 'heading here',
        'url_link' => '',
    ), $atts );


    $image_id = $a['image_attr'];
    $textarea_html = $a['textarea_html'];
    $title_head = $a['text_attr'];
    $href = vc_build_link( $a['url_link'] );
    $image = wp_get_attachment_image($image_id, 'full');


        $html .= '<div class="text-image-wrapper">';
        $html .= '<div class="text-image-holder">
                        '. $image .'
                        <h4>'. $title_head .'</h4>
                        <div class="overlay">
                            <div class="overlay-holder">
                                <h5>'. $title_head .'</h5>
                                <div class="description"> '. $content .' </div>
                                <a href="'. $href['url'] .'" class="secondary-buttons"> readmore </a>
                            </div>
                        </div>
                  </div>';

        $html .= '</div>';

    return $html;




}
add_shortcode( 'text_image_shortcode', 'text_img_shortcode' );


add_action( 'vc_before_init', 'my_text_image_shortcode' );
function my_text_image_shortcode() {
   vc_map( array(
      "name" => __( "WX Text-Image", "my-dropdown-domain" ),
      "base" => "text_image_shortcode",
      "class" => "",
      "content" => true,
      "category" => __( "WX Custom Shortcode", "my-text-domain"),
      "params" => array(


        array(
            "type" => "attach_image",
            "heading" => __( "Insert image", "my-text-domain" ),
            "param_name" => "image_attr",
            "value" => __( "Default param value", "my-text-domain" ),

            "description" => __( "Description for foo param.", "my-text-domain" )
        ),

        array(
            "type" => "textfield",
            "heading" => __( "Text Heading", "my-text-domain" ),
            "param_name" => "text_attr",
            "value" => __( "Default param value", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "Insert the heading word.", "my-text-domain" )
         ),

        array(
            "type" => "textarea_html",
            "heading" => __( "text content", "my-text-domain" ),
            "param_name" => "content",
            "value" => __( "Default param value", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "Description for foo param.", "my-text-domain" )
        ),

        array(
            "type" => "vc_link",
            "heading" => __( "Text Url", "my-text-domain" ),
            "param_name" => "url_link",
            "description" => __( "page link url page.", "my-text-domain" )
        )


      )
   ) );
}

/*************/







/***************/
// [my_custom_groupanimation_shortcode ]
function animation_group( $atts ) {
    $a = shortcode_atts( array(
        'text_attr' => 'text_default',
        'text_attr2' => 'text_default',
        'text_attr3' => 'text_default',
        'text_attr4' => 'text_default',
        'dropdown_attr' => 'primary-heading',
        'dropdown_attr2' => 'align-left',
        'dropdown_alignment_attr' => 'left',
        'image_attr' => 'attach_image',

    ), $atts );

    $text_value = $a['text_attr'];
    $text_value2 = $a['text_attr2'];
    $text_value3 = $a['text_attr3'];
    $text_value4 = $a['text_attr4'];

    $dropdown_value = $a['dropdown_attr'];
    $dropdown_value2 = $a['dropdown_attr2'];
    $href = vc_build_link( $a['url_link'] );


    $image_id = $a['image_attr'];
    $image = wp_get_attachment_image($image_id, 'full');


        $html .= '<div class="wx-group-animation '. $dropdown_value .'">';
        $html .= '<div class="steps step1">
            <div class="step-holder">
            <h3>'. $text_value .'</h3>
            </div>

        </div>
        ';

        $html .= '<div class="steps step2">
            <div class="step-holder">
            <h3>'. $text_value2 .'</h3>
            </div>

        </div>
        ';

        $html .= '<div class="steps step3">
            <div class="step-holder">
            <h3>'. $text_value3 .'</h3>
            </div>

        </div>
        ';

        $html .= '<div class="steps step4">
            <div class="step-holder">
            <h3>'. $text_value4 .'</h3>
            </div>
        </div>
        ';


        $html .= '<div class="background-img">
                    '. $image .'
                    </div>
            ';
        $html .= '</div>';

    return $html;




}
add_shortcode( 'animation_group_step', 'animation_group' );


add_action( 'vc_before_init', 'my_custom_animation_group_step_vs' );
function my_custom_animation_group_step_vs() {
   vc_map( array(
      "name" => __( "WX Animation Groups", "my-dropdown-domain" ),
      "base" => "animation_group_step",
      "class" => "",
      "category" => __( "WX Custom Shortcode", "my-text-domain"),
      "params" => array(
         array(
            "type" => "dropdown",
            "heading" => __( "Heading style", "my-text-domain" ),
            "param_name" => "dropdown_attr",
            "admin_label" => true,
            "description" => __( "Select style for heading.", "my-text-domain" ),
            "value" =>  array(
                    'Primary'    =>  '',
                    'Secondary'    =>  'secondary-heading',
                )
         ),

//         array(
//            "type" => "dropdown",
//            "heading" => __( "Text align", "my-text-domain" ),
//            "param_name" => "dropdown_attr2",
//            "admin_label" => true,
//            "description" => __( "Select style for heading.", "my-text-domain" ),
//            "value" =>  array(
//                    'left'    =>  'align-left',
//                    'center'    =>  'align-center',
//                    'right'    =>  'align-right',
//                )
//         ),

         array(
            "type" => "textfield",
            "heading" => __( "Text Step 1", "my-text-domain" ),
            "param_name" => "text_attr",
            "value" => __( "Default param value", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "Insert the heading word.", "my-text-domain" )
         ),

         array(
            "type" => "textfield",
            "heading" => __( "Text Step 2", "my-text-domain" ),
            "param_name" => "text_attr2",
            "value" => __( "Default param value", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "Insert the heading word.", "my-text-domain" )
         ),

        array(
            "type" => "textfield",
            "heading" => __( "Text Step 3", "my-text-domain" ),
            "param_name" => "text_attr3",
            "value" => __( "Default param value", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "Insert the heading word.", "my-text-domain" )
         ),

        array(
            "type" => "textfield",
            "heading" => __( "Text Step 4", "my-text-domain" ),
            "param_name" => "text_attr4",
            "value" => __( "Default param value", "my-text-domain" ),
            "admin_label" => true,
            "description" => __( "Insert the heading word.", "my-text-domain" )
         ),

        array(
            "type" => "attach_image",
            "heading" => __( "Background Image", "my-text-domain" ),
            "param_name" => "image_attr",
            "value" => __( "Default param value", "my-text-domain" ),
            "description" => __( "Description for foo param.", "my-text-domain" )
        )





      )
   ) );
}

/*************/










?>
