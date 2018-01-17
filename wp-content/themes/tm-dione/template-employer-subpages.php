<?php
/*********************************************
LABEL FOR TEMPLATE
*********************************************/
/**
 * Template Name: TEMPLATE EMPLOYER SUBPAGE


*/



get_header(); ?>



<!--FROM SERVICES FEATURED BACKGROUND-->
<?php $img_id =  get_post_meta($post->ID,'upload_banner_image',true); ?>
<?php $banner_img = wp_get_attachment_image_url($img_id, 'full'); ?>

<div style="background:url(<?php echo $banner_img; ?>)no-repeat;" class="banner-subpage">

    <div class="container">
        <div class="col-md-12">

            <div class="col-md-12 text-left">
                    <h3>
                      <?php the_title(); ?>
                    </h3>

            </div>

        </div>

    </div>

</div>



<div class="container">
    <div class="row">
        <?php if ( $tm_dione_layout == 'left-sidebar' ) { ?>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        <?php } ?>
        <?php if ( $tm_dione_layout == 'left-sidebar' || $tm_dione_layout == 'right-sidebar' ) { ?>
            <?php $class = 'col-lg-9'; ?>
        <?php } else { ?>
            <?php $class = 'col-md-12'; ?>
        <?php } ?>
        <div class="<?php echo esc_attr( $class ); ?>">
            <div class="content">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>">
                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tm-dione' ),
                                'after'  => '</div>',
                            ) );
                            ?>
                        </div>
                        <!-- .entry-content -->
                    </article><!-- #post-## -->
                    <?php if ( ( comments_open() || get_comments_number() ) && $tm_dione_disable_comment != 'on' ) : comments_template(); endif; ?>
                <?php endwhile; // end of the loop. ?>
            </div>
        </div>
        <?php if ( $tm_dione_layout == 'right-sidebar' ) { ?>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>
