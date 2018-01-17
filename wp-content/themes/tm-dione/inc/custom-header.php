<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *
 * @package Infinity
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses tm_dione_header_style()
 * @uses tm_dione_admin_header_style()
 * @uses tm_dione_admin_header_image()
 */
function tm_dione_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'infinity_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'tm_dione_header_style',
		'admin-head-callback'    => 'tm_dione_admin_header_style',
		'admin-preview-callback' => 'tm_dione_admin_header_image',
	) ) );
}

add_action( 'after_setup_theme', 'tm_dione_custom_header_setup' );

if ( ! function_exists( 'tm_dione_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see tm_dione_custom_header_setup().
	 */
	function tm_dione_header_style() {
		$header_text_color = get_header_textcolor();

		// If no custom options for text are set, let's bail
		// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
		if ( HEADER_TEXTCOLOR == $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
				// Has the text been hidden?
				if ( 'blank' == $header_text_color ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
				// If the user has set a custom color for the text use that.
				else :
			?>
			.site-title a,
			.site-description {
				color: # <?php echo esc_attr( $header_text_color ); ?>;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif; // tm_dione_header_style

if ( ! function_exists( 'tm_dione_admin_header_style' ) ) :
	/**
	 * Styles the header image displayed on the Appearance > Header admin panel.
	 *
	 * @see tm_dione_custom_header_setup().
	 */
	function tm_dione_admin_header_style() {
		?>
		<style type="text/css">
			.appearance_page_custom-header #headimg {
				border: none;
			}

			#headimg h1,
			#desc {
			}

			#headimg h1 {
			}

			#headimg h1 a {
			}

			#desc {
			}

			#headimg img {
			}
		</style>
		<?php
	}
endif; // tm_dione_admin_header_style

if ( ! function_exists( 'tm_dione_admin_header_image' ) ) :
	/**
	 * Custom header image markup displayed on the Appearance > Header admin panel.
	 *
	 * @see tm_dione_custom_header_setup().
	 */
	function tm_dione_admin_header_image() {
		?>

		<?php
	}
endif; // tm_dione_admin_header_image
