<?php
function render_shortcode_accordion( $attribute )
{
    $DefaultImage  = get_template_directory_uri()."/custom-php/default-image.jpg";

    $args = array(
        "post_type"      => "join_us",
        "posts_per_page" => -1,
        "orderby"        => "post_date",
        "order"          => "ASC"
//        "order"          => "DESC"
    );

    $loop = new WP_Query( $args );
    $html = '';


    $html .= '<div id="accordion" class="accordion panel-group">';
    $html .= '<div class="panel" role="tablist">';

    if ($loop->have_posts()) {
        
    $html .= '<ul>';
        
        while ( $loop->have_posts() ) { 

            $loop->the_post();
            $post_id          = get_the_id();
            $post_object      = get_post( $post_id );
            $post_image       = wp_get_attachment_image_url( get_post_thumbnail_id( $post_id ), "large");
            $post_title       = $post_object->post_title;
            $post_content     = $post_object->post_content;
            $post_excerpt     = $post_object->post_excerpt;
            
            $postbutton = get_post_meta($post_id,'button_url',true);
            $linkurl = get_permalink ($postbutton);

            $html .= '    
                   
                       <div class="panel-heding" role="tab">
                            <div class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#section-'. $post_id .'" aria-expanded="false">
                                    '. $post_title .'			
                                </a>
                            </div>

                            <div id="section-'. $post_id .'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                    
                                        <img src="'. $post_image .'">
                                        '. $post_content .'

                                    </div>
                            </div>

                        </div>

                    ';

        }
    
    $html .= '</ul>';  
        
    } else {
        $html .=' <p> No Available Posts </p> ';
    }
    
    
    wp_reset_postdata();
    
    $html .= '</div>';
    $html .= '</div>';
   
$script = '
        
        <!-- insert your script here -->
        
';

return $html.$script;
      
}
add_shortcode( "joinus" ,"render_shortcode_accordion");
?>