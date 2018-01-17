<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Infinity
 */
$tm_dione_layout      = Kirki::get_option( 'tm-dione', 'archive_layout' );
$tm_dione_list_boxed = 1;
$tm_dione_page_title = Kirki::get_option( 'tm-dione', 'archive_title' );
$tm_dione_heading_image = Kirki::get_option( 'tm-dione', 'page_bg_image' );
$page_breadcrumb = Kirki::get_option( 'tm-dione', 'breadcrumb_enable' );

$style = '';
if ( $tm_dione_heading_image ) {
	$style .= 'background-image: url("' . ( $tm_dione_heading_image ) . '");';
}
$id_style = uniqid('page-header-style-');

get_header();

tm_dione_apply_style($style, '#' . $id_style);

?>
       


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

                    <?php  get_template_part( 'template-parts/content', 'masonry' ); ?>
                    
                </div>


                <div class="col-md-4">
                    <div class="sidebar">
                       <?php dynamic_sidebar( 'sidebar-career' );?>

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
                            <?php  echo do_shortcode('[related-career]');?>
                        </div>
                
                </div>
                

            </div>
        </div>




<?php get_footer(); ?>
