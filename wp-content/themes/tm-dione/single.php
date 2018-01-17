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
        <?php $post = get_post( 3399 ); ?>
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
			<?php if ( $tm_dione_layout == 'sidebar-content' ) { ?>
				<?php get_sidebar(); ?>
			<?php } ?>
			<?php if ( $tm_dione_layout == 'sidebar-content' || $tm_dione_layout == 'content-sidebar' ) { ?>
				<?php $class = 'col-md-9'; ?>
			<?php } else { ?>
				<?php $class = 'col-md-12'; ?>
			<?php } ?>
			<div class="<?php echo esc_attr( $class ); ?>">
				<div class="content">
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope"
						         itemtype="http://schema.org/CreativeWork">
							<div class="entry-content">
								<?php get_template_part( 'template-parts/content', 'single' ); ?>
								<?php tm_post_navigation(); ?>
								<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								?>
							</div>
							<!-- .entry-content -->
						</article><!-- #post-## -->
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			<?php if ( $tm_dione_layout == 'content-sidebar' ) { ?>
				<div id="sidebar" class="col-md-3">
					<?php get_sidebar(); ?>
				</div>
			<?php } ?>
		</div>
	</div>
<?php get_footer(); ?>