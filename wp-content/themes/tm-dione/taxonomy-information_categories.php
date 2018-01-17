<?php
/**
 * The template for displaying all single posts.
 *
 * @package Infinity
 */
$tm_dione_heading_image = Kirki::get_option( 'tm-dione', 'post_bg_image' );
$tm_dione_layout        = 'content-sidebar';//Kirki::get_option( 'tm-dione', 'post_layout' );
get_header(); ?>



           
        <!--FROM SERVICES FEATURED BACKGROUND-->
        <?php $post = get_post( 3398 ); ?>
        <?php $img_id =  get_post_meta($post->ID,'upload_banner_image',true); ?>
        <?php $banner_img = wp_get_attachment_image_url($img_id, 'full'); ?>

        <div style="background:url(<?php echo $banner_img; ?>)no-repeat;" class="banner-subpage">  

            <div class="container">
                <div class="col-md-12">

                    <div class="col-md-12 text-left">
                        <h1><?php the_title(); ?></h1>
                    </div>

                </div>

            </div>

        </div>



        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <?php  echo do_shortcode('[taxonomy_information_categories]');?>
                </div>


                <div class="col-md-4">
                    <div class="sidebar">
                       <?php dynamic_sidebar( 'sidebar-information' );?>
                    </div>
                </div>
                
            </div>
        </div>




<?php get_footer(); ?>