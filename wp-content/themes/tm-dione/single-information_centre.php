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


        <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>

        <div class="container">
            <div class="row">

                <div class="col-md-8">

                    <h2> <?php the_title(); ?></h2>
                    <?php the_content(); ?>

                </div>


                <div class="col-md-4">
                    <div class="sidebar">
                       <?php dynamic_sidebar( 'sidebar-information' );?>

                    </div>
                </div>
                
                
                <div class="col-md-12 clearfix single-bottom-holder">
                    
                        <div class="social-holder">
                            <div class="social-contents">
                                <span> SHARE</span>
                                <span>
                                    <a target="_blank"
                                         href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . urlencode( get_permalink() )) ?>"><i
                                            class="fa fa-facebook"></i>
                                    </a>
                                </span>
                                <span>
                                    <a target="_blank"
                                         href="<?php echo esc_url('http://twitter.com/share?text='.urlencode( get_the_title() . "&url=" . get_permalink() ) ); ?>"><i
                                            class="fa fa-twitter"></i>
                                    </a>
                                </span>
                                <span>
                                    <a target="_blank"
                                         href="<?php echo esc_url('https://plus.google.com/share?url='.urlencode( get_permalink() ) ) ?>"><i
                                            class="fa fa-google-plus"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                        
                    
                        <div class="realated-holder">
                            <h4>RELATED TOPIC</h4>
                            <?php  echo do_shortcode('[related-information]');?>
                        </div>
                
                </div>
                

            </div>
        </div>

         
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>



<?php get_footer(); ?>