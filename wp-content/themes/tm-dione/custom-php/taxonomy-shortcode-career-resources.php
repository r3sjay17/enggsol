<?php

add_shortcode('taxonomy_career_categories', 'render_taxonomy_career_categories');
function render_taxonomy_career_categories($atts){
    
    $taxonomy = 'career_resources_categories';
    //Get the current term
    $current_term = get_queried_object();
    //Set the current term ID
    if( empty($current_term->term_id) ){ //Set to parent if cant get the term object
        $current_term_id = 0;
    }else{
        $current_term_id = $current_term->term_id;
    }
    //Get the all terms
  
            //title & Description for categories
            $term_name = $current_term->name;
            $term_description = $current_term->description;
            $term_description_output = wp_trim_words( $term_description, 50 );
            //term perlink
            $term_link = get_term_link($current_term_id);
            //images category
            $img_cat = '<img src="'. do_shortcode('[wp_custom_image_category onlysrc="true" size="full" term_id="'. $current_term_id.'" alt="alt :)"]') .'">';
    
    
    
    //Set the main html wrapper
    $html .= '<div class="category-output-wrapper">';
    

            $term_products = '<ul class="category-output-holder">';
            $products = get_posts(array(
                'post_type' => 'career_resources',
                'posts_per_page' => '-1',
                'post_status' => 'publish',
                'tax_query' => array(array(
                'taxonomy' => $taxonomy,
                'terms' => $current_term_id,
                'field' => 'term_id',
            )),
            ));

            foreach($products as $product) {
                $title = $product->post_title;
                $link = get_permalink($product->ID);
                $content = $product->post_content;
                $content_trim = wp_trim_words( $content, 15 );
//                $post_image = wp_get_attachment_image(get_post_thumbnail_id($product->ID),'medium');
//                $post_image_url = wp_get_attachment_url($post_image);
                $post_image  = wp_get_attachment_image_url( get_post_thumbnail_id( $product->ID ), "full");
                
//              CUSTOM META POST
                $meta_subtitle = get_post_meta($product->ID,'sub_title_services',true);
                $meta_shortdescription = get_post_meta($product->ID,'sub_title_services',true);
                
                $term_products .= '
              
                            
							<li class="content-wrapper">
                                <div class="col-md-4">
                                    <div class="featured-image" style="background:url('.$post_image.')no-repeat;">  </div>
                                </div>
                            
                                <div class="col-md-8">
                                    <div class="heading">
                                        <h1 class="entry-title-primary">'. $title .'</h1> 
                                        <div>' .$term_name. '</div>
                                    </div>
                                    <div class="entry-content">'. $content_trim .'</div>									
                                    <a class="primary-buttons" href="'. $link .'"> READMORE </a>
                                </div>
							</li>
                            
                            
            ';

            }

    
    
            $term_products .= '
                            </ul>
            ';

            $html .= $term_products;


        $html .= '</div>';



    return $html;
}
