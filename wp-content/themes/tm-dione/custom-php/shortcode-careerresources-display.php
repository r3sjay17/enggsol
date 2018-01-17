<?php

add_shortcode('shortcode_careerresources', 'render_shortcode_careerresources');
function render_shortcode_careerresources($atts){

    
    $DefaultImage  = get_template_directory_uri()."/custom-php/default-image.jpg";

    $args = array(
        "post_type"      => "career_resources",
        "posts_per_page" => -1,
        "orderby"        => "post_date",
        "order"          => "ASC"
//        "order"          => "DESC"
    );

    $loop = new WP_Query( $args );
    $html = '';


    $html .= '<div id="shortcode-information-wrapper">';

    if ($loop->have_posts()) {
        
    $html .= '<ul class="row informationcentre">';
        
        while ( $loop->have_posts() ) { 

            $loop->the_post();
            $post_id          = get_the_id();
            $post_object      = get_post( $post_id );
            $post_image       = wp_get_attachment_image_url( get_post_thumbnail_id( $post_id ), "large");
            $post_title       = $post_object->post_title;
            $post_content     = $post_object->post_content;
            $post_content_output = wp_trim_words( $post_content , 15 );
            $postlink = get_permalink ($post_id);
            
//            $post_excerpt     = $post_object->post_excerpt;
//            $postbutton = get_post_meta($post_id,'button_url',true);
//            $linkurl = get_permalink ($postbutton);

            $html .= '    
                   
                        <li class="col-md-4 col-holder">
                            <div class="holder-wrapper">
                                <div class="feature-img" style="background-image:url('.( ( $post_image != NULL ) ? $post_image: $DefaultImage ).'" alt="'. $post_title .'no-repeat); background-size:cover;">
                                </div>
                                
                                <div class="description">
                                     <h1>' . $post_title . '</h1>
                                     <p>' . $post_content_output . '</p>
                                     <a href="'. $postlink .'" class="primary-buttons"> Learn More </a>
                                </div>
                               
                            </div> 
                        </li>

                    ';

        }
    
    $html .= '</ul>';  
        
    } else {
        $html .=' <p> No Available Posts </p> ';
    }
    
    
    wp_reset_postdata();
    $html .= '</div>';
   


return $html.$script;
      
}
