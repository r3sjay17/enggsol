<?php
$footer_layout_quantity_columns = Kirki::get_option( 'tm-dione', 'footer_layout_quantity_columns' );
$footer_layout_custom_width     = Kirki::get_option( 'tm-dione', 'footer_layout_custom_width' );
$footer_wide_boxed = Kirki::get_option( 'tm-dione', 'footer_wide_boxed' );

$footer_dark_light = Kirki::get_option( 'tm-dione', 'footer_dark_light' );
$footer_sticky = (Kirki::get_option( 'tm-dione', 'footer_sticky_enable' ) == 1 )? 'sticky' : '';

$cl_footer_column = 'col-md-12';
switch ( $footer_layout_quantity_columns ) {
    case 2:
        $cl_footer_column = 'col-md-6';
        break;
    case 3:
        $cl_footer_column = 'col-md-4';
        break;
    case 4:
        $cl_footer_column = 'col-md-3';
        break;
}
if ( $footer_layout_custom_width == 1 ) {
    $cl_footer_column .= ' footer-column';
}

if ( $footer_wide_boxed == 'wide' ) {
    $footer_cl = "container-fluid padding-x-200-lg";
} else {
    $footer_cl = "container";
}

$footer_container_cl = $footer_dark_light;
if ( Kirki::get_option( 'tm-dione', 'footer_parallax_enable' ) == 1 ) {
    $footer_container_cl .= ' footer-parallax';
}

?>






<div class="<?php echo esc_attr( $footer_container_cl ) ?>">

    <?php if ( Kirki::get_option( 'tm-dione', 'footer_layout_enable' ) ) { ?>
        <?php if ( is_active_sidebar( 'footer' ) ) { ?>
            <?php tha_footer_before(); ?>
            <footer class="site-footer">

<!--               xtension footer-->
                <div class="extension">  <?php dynamic_sidebar( 'footer4' );?>  </div>

                <?php tha_footer_top(); ?>
                <div class="<?php echo esc_attr( $footer_cl ) ?>">
                    <div class="row footer-column-container">
                        <div class="<?php echo esc_attr( $cl_footer_column ) ?>">
                            <?php dynamic_sidebar( 'footer' ); ?>
                        </div>

                        <?php if ( $footer_layout_quantity_columns >= 2 ) { ?>
                            <div class="<?php echo esc_attr( $cl_footer_column ) ?> ft-cl-2" column=2>
                                <?php dynamic_sidebar( 'footer2' ); ?>
                            </div>
                        <?php } ?>
                        <?php if ( $footer_layout_quantity_columns >= 3 ) { ?>
                            <div class="<?php echo esc_attr( $cl_footer_column ) ?> ft-cl-3" column=3>
                                <?php dynamic_sidebar( 'footer3' ); ?>
                            </div>
                        <?php } ?>
                        <?php if ( $footer_layout_quantity_columns >= 4 ) { ?>
                            <div class="<?php echo esc_attr( $cl_footer_column ) ?> ft-cl-4" column=4>
                                <?php dynamic_sidebar( 'footer4' ); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php tha_footer_bottom(); ?>
            </footer><!-- .site-footer -->
            <?php tha_footer_after(); ?>
        <?php } ?>
    <?php } ?>

    <?php if ( Kirki::get_option( 'tm-dione', 'copyright_enable' ) == 1 ) { ?>
        <div class="copyright <?php echo esc_attr($footer_sticky) ?>">
            <div class="<?php echo esc_attr( $footer_cl ) ?>">
                <div class="row">


                    <?php if(Kirki::get_option( 'tm-dione', 'copyright_display' ) == 'col-md-6'): ?>
                        <div class="<?php echo esc_attr(Kirki::get_option( 'tm-dione', 'copyright_display' )) ?> col-xs-center copyright_text"><?php echo html_entity_decode( Kirki::get_option( 'tm-dione', 'copyright_text' ) ); ?>
                        </div>
                        <?php if ( Kirki::get_option( 'tm-dione', 'copyright_social_menu_enable' ) == 1 ) { ?>
                            <div class="<?php echo esc_attr(Kirki::get_option( 'tm-dione', 'copyright_display' )) ?> col-xs-center text-right">
                                <div class="social">
                                    <?php wp_nav_menu( array(
                                        'theme_location'  => 'social',
                                        'container_class' => 'social-menu',
                                        'fallback_cb'     => false
                                    ) ); ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php else: ?>
                        <div class="<?php echo esc_attr(Kirki::get_option( 'tm-dione', 'copyright_display' )) ?> col-xs-center copyright_text">
                            <?php echo html_entity_decode( Kirki::get_option( 'tm-dione', 'copyright_text' ) ); ?>
                            <?php if ( Kirki::get_option( 'tm-dione', 'copyright_social_menu_enable' ) == 1 ) { ?>
                                <div class="social">
                                    <?php wp_nav_menu( array(
                                        'theme_location'  => 'social',
                                        'container_class' => 'social-menu',
                                        'fallback_cb'     => false
                                    ) ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- .copyright -->
    <?php } ?>

</div>







<section class="getquote-product">
            <div class="invisible_btn"></div>

            <div class="container quote-wrapper">


                <div class="header_modal_warpper">
                    <div class="modal_logo">
                         <?php dynamic_sidebar( 'footer' );?>
                    </div>
                    <a href="#" class="close2">|X|</a>
                </div>


<!--                GET THE PAGE ID TITLE-->
<!--                contact form-->
                <?php $page = get_page( 3220 ); ?>
                <div class="col-md-12 body-content form-contact">
                    <?php echo do_shortcode( $page->post_content ); ?>
                </div>
                
<!--                GET THE PAGE ID TITLE-->
<!--                drop resume-->
                <?php $page = get_page( 3370 ); ?>
                <div class="col-md-12 body-content form-resume">
                    <?php echo do_shortcode( $page->post_content ); ?>
                </div>
                
<!--                GET THE PAGE ID TITLE-->
<!--                requet staff-->
                <?php $page = get_page( 3377 ); ?>
                <div class="col-md-12 body-content form-request">
                    <?php echo do_shortcode( $page->post_content ); ?>
                </div>
    
                
<!--                GET THE PAGE ID TITLE-->
<!--                Jobalert resume-->
                <?php $page = get_page( 3372 ); ?>
                <div class="col-md-12 body-content form-jobalert">
                    <?php echo do_shortcode( $page->post_content ); ?>
                </div>
                
                
                
                
            </div>
    
    

</section>




<script>
        jQuery(".getquote-product").hide();
        jQuery(".request-quote").click(function(e){
            e.preventDefault();
                jQuery(".getquote-product").fadeIn(800);
        });
    
//        contact us
        jQuery("#menu-item-3188").click(function(e){
            e.preventDefault();
                jQuery(".getquote-product").fadeIn(800);
        });
    
        
//        drop resume
        jQuery("#menu-item-3186").click(function(e){
            e.preventDefault();
                jQuery(".getquote-product").fadeIn(800);
        });
//        request resume
        jQuery("#menu-item-3187").click(function(e){
            e.preventDefault();
                jQuery(".getquote-product").fadeIn(800);
        });
    
        jQuery(".close2").click(function(e){
            e.preventDefault();
                jQuery(".getquote-product").fadeOut(800);
        });
        jQuery(".invisible_btn").click(function(e){
            e.preventDefault();
                jQuery(".getquote-product").fadeOut(800);
        });
    
    
    
//        contacts 
        jQuery("#menu-item-3188").click(function(e){
           e.preventDefault();
                jQuery(".body-content.form-contact").addClass('visible');
                jQuery(".body-content.form-resume").removeClass('visible');
                jQuery(".body-content.form-request").removeClass('visible');
                jQuery(".body-content.form-jobalert").removeClass('visible');
        });
    
    
//        drop resume call
        jQuery("#menu-item-3186").click(function(e){
           e.preventDefault();
                jQuery(".body-content.form-resume").addClass('visible');
                jQuery(".body-content.form-request").removeClass('visible');
                jQuery(".body-content.form-jobalert").removeClass('visible');
                jQuery(".body-content.form-contact").removeClass('visible');
        });
    
//        request resume
        jQuery("#menu-item-3187").click(function(e){
           e.preventDefault();
                jQuery(".body-content.form-request").addClass('visible');
                jQuery(".body-content.form-resume").removeClass('visible');
                jQuery(".body-content.form-jobalert").removeClass('visible');
                jQuery(".body-content.form-contact").removeClass('visible');
        });
        
    
        jQuery(".request-quote.jobseeker").click(function(e){
           e.preventDefault();
                jQuery(".body-content.form-jobalert").addClass('visible');
                jQuery(".body-content.form-request").removeClass('visible');
                jQuery(".body-content.form-resume").removeClass('visible');
                jQuery(".body-content.form-contact").removeClass('visible');
        });
    
    
         jQuery(".request-quote.employer").click(function(e){
           e.preventDefault();
                jQuery(".body-content.form-request").addClass('visible');
                jQuery(".body-content.form-jobalert").removeClass('visible');
                jQuery(".body-content.form-resume").removeClass('visible');
                jQuery(".body-content.form-contact").removeClass('visible');
        });
</script>




<!--SCRIPT FOR SIDEBAR -->

<script>
jQuery(window).scroll(function() {
    var scroll = jQuery(window).scrollTop();

    if (scroll >= 100) {
        jQuery(".side-contacts").addClass("scrolling");
    } else {
        jQuery(".side-contacts").removeClass("scrolling");
    }
});
</script>




