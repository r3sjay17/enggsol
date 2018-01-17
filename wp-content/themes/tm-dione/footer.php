<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Infinity
 */
?>
<?php tha_content_bottom(); ?>
</div> <!-- #content -->
<?php tha_content_after(); ?>
	<div class="footer-wrapper">
		<?php get_template_part('template-parts/footer', Kirki::get_option( 'tm-dione', 'footer_type' )); ?>
	</div>
</div><!-- #page -->
<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
<?php if(Kirki::get_option( 'tm-dione', 'scroll_top_top_enable' ) == 1): ?>
	<a class="scrollup show" title="<?php esc_html_e('Go to top', 'tm-dione') ?>"><i class="fa fa-angle-up"></i></a>
<?php endif; ?>
</body>
</html>
