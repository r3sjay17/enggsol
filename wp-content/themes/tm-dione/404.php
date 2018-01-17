<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div class="container-fluid">
	<div class="row row-404">
		<div class="col-md-12 text-center">
			<h1 class="title-404"><?php esc_html_e('404', 'tm-dione') ?></h1>
			<div class="sub-title-404">
				<?php esc_html_e('Page not found!', 'tm-dione') ?>
			</div>
			<p class="desc-404">
				<?php esc_html_e('Sorry, the page you requested could not be found.', 'tm-dione') ?>
			</p>
			<div class="group-buttom-404">
				<a id="back-button-404" href="javascript:window.history.back();" target="_self" class="btn btn-medium btn-bg-black-color btn-in-404-page"><?php esc_html_e('GO BACK', 'tm-dione') ?></a>
				<a id="home-button-404" href="<?php echo esc_url(home_url('/')) ?>" target="_self" class="btn btn-medium btn-in-404-page" ><?php esc_html_e('HOMEPAGE', 'tm-dione') ?></a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
