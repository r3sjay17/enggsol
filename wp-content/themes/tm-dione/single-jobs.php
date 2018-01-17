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
        <?php $post = get_post( get_the_ID() ); ?>
        <?php $img_id =  get_post_meta($post->ID,'upload_banner_image',true); ?>
        <?php $banner_img = wp_get_attachment_image_url($img_id, 'full'); ?>

        <div style="background:url(<?php echo site_url().'/wp-content/uploads/2017/05/enggsol-banner-view-all-job.jpg'; ?>)no-repeat;" class="rty-job-single-page banner-subpage">  

            <!--<div class="container">
                <div class="col-md-12">

                    <div class="col-md-12 text-left">
                        <h1><?php the_title( get_the_ID() ); ?></h1>
                    </div>

                </div>

            </div>-->
    
            <div class="rty-inner-content-holder">

                <div class="container">

                    <div class="col-md-12">

                        <?php do_shortcode('[rty_job_search]');?>

                        <!--<div class="col-md-12 text-left">
                            <h3>
                                <?php //the_title(); ?>
                            </h3>

                        </div>-->

                    </div>

                </div>

            </div>

        </div>


        <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>

        <div class="container">
            <div class="row">
                
                <input type="hidden" class="rty-site-url" value="<?php echo site_url(); ?>">
                <input type="hidden" class="rty-job-id" value="<?php echo get_the_ID(); ?>">
                
                <div class="col-md-12">
                    <div class="count-results"> <?php echo wp_count_posts("jobs")->publish; ?> JOBS IN ALL LOCATIONS </div>
                </div>
                
                <div class="col-md-12">
                    <?php echo do_shortcode('[rty_filter]'); ?> 
                </div>
                
                <div class="col-md-12">
                    <div class="col-md-9 rty-single-job-content-holder">

                        <h2> <?php the_title(); ?></h2>
                        <h4><strong>LOCATION:</strong> <?php echo get_field( 'location', get_the_ID() ); ?></h4>
                        <h4><strong>JOB TYPE:</strong> <?php echo get_field( 'industry', get_the_ID() ); ?></h4>
                        <h4><strong>DATE OPENED:</strong> <?php echo date( 'm/d/Y', strtotime(get_field( 'start_date', get_the_ID() ) ) ); ?></h4>
                        <?php the_content(); ?>

                        <div class="col-md-12 clearfix single-bottom-holder">

                                <div class="rty-apply-holder">
                                    <div class="rty-inner"><a href="#" class="rty-btn-apply">APPLY FOR THIS JOB</a></div>
                                </div>

                                <div class="social-holder">
                                    <div class="social-contents">
                                        <span> SHARE:</span>
                                        <span>
                                            <a class="rty-fb" target="_blank" href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . urlencode( get_permalink() )) ?>"><i class="fa fa-facebook"></i>
                                            </a>
                                        </span>
                                        <span>
                                            <a class="rty-twitter" target="_blank" href="<?php echo esc_url('http://twitter.com/share?text='.urlencode( get_the_title() . "&url=" . get_permalink() ) ); ?>"><i class="fa fa-twitter"></i>
                                            </a>
                                        </span>
                                        <span>
                                            <a class="rty-gplus" target="_blank" href="<?php echo esc_url('https://plus.google.com/share?url='.urlencode( get_permalink() ) ) ?>"><i class="fa fa-google-plus"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>


                                <!--<div class="realated-holder">
                                    <h4>RELATED TOPIC</h4>
                                    <?php  echo do_shortcode('[related-career]');?>
                                </div>-->

                        </div>

                    </div>


                    <div class="col-md-3">
                        <div class="sidebar">
                           <?php //dynamic_sidebar( 'sidebar-career' );?>
                            <a href="#" class="rty-btn-drop-resume"><img src="<?php echo site_url().'/wp-content/uploads/2017/05/man-drop-resume.png'; ?>"></a>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>

         
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>



<?php get_footer(); ?>