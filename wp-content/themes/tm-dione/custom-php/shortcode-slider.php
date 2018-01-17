<?php
/*//============// Custom Lates Memberships Shortcode //============//*/

function custom_shortcode_name( $attribute )
{
    $DefaultImage  = get_template_directory_uri()."/custom-php/default-image.jpg";
    
//    ORDER OPTION
    /*
	$args = array(
		"post_type"      => "services",
		"posts_per_page" => 3,
		"orderby"        => "post_date",
		"order"          => "DESC"
	);
	*/
    $args = array(
        "post_type"      => "name",
        "posts_per_page" => 8,
        "orderby"        => "post_date",
        "order"          => "ASC"
    );

    $loop = new WP_Query( $args );
?>



<div class="container-fluid no-margin">
      
    
    <?php
   
    while ( $loop->have_posts() ) :	$loop->the_post();

    $post_id          = get_the_id();
    $post_object      = get_post( $post_id );
    $post_image       = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), "large");
    $post_title       = $post_object->post_title;
    $post_content       = $post_object->post_content;
    $post_excerpt       = $post_object->post_excerpt;
   
    $post_link = ( get_post_meta( $post_id, 'link_page', true ) == NULL ) ? get_permalink( $post_id ) : "?".get_post_meta( $post_id, 'link_page', true );
    
//    DATE NORMAL
    $event_start_date = get_post_meta( $post->ID, 'event-start-date', true );
    $post_start_date  = date( 'F d, Y', $event_start_date );
    
//    FOR DATE CUSTOM
    $post_date          = $post_object->post_date;
    $post_date = date( 'd:F', strtotime($post_date) );
    $post_date = explode(":", $post_date);
    
    $subtitle = get_post_meta( $post_id, 'service_subtitle', true );
    ?>

    
    
<!--INSERT HERE  -->
    <div class="col-md-4">
          
                  
        <a href="<?php the_permalink( $post_id ); ?>">
            <img src="<?php echo ( $post_image != NULL ) ? $post_image[ 0 ] : $DefaultImage; ?>" alt="<?php echo $post_title; ?>" >
        </a>
        
        <?php $post_content; ?> 
        <a href="<?php the_permalink( $post_id ); ?>"> <?php $post_excerpt; ?> </a>
        <a href="<?php the_permalink( $post_id ); ?>"><h3><?php echo $post_title; ?></h3></a>
                   
          
    </div>
<!--INSERT HERE  -->

    
    <?php
    endwhile;
    ?>
    
    
</div>



<!--OWL SLIDER -->
<script>
    jQuery(document).ready(function() {
     
      var owl = jQuery("#solutions");
     
      owl.owlCarousel({
         
          itemsCustom : [
            [0, 1],
            [450, 1],
            [600, 2],
            [700, 2],
            [1000, 4],
            [1200, 4],
            [1400, 4],
            [1600, 4]
          ],
          navigation : true,
          autoPlay: 5000,
          stopOnHover: true
     
      });
     
    });
</script>



<?php
    wp_reset_query();
}

add_shortcode("name","custom_shortcode_name");
add_filter('widget_text', 'do_shortcode');
/*//============// Custom Lates News Shortcode //============//*/

?>