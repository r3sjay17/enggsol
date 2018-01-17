<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'tm-dione' ),
				'background-image'      => esc_attr__( 'Background Image', 'tm-dione' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'tm-dione' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'tm-dione' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'tm-dione' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'tm-dione' ),
				'inherit'               => esc_attr__( 'Inherit', 'tm-dione' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'tm-dione' ),
				'cover'                 => esc_attr__( 'Cover', 'tm-dione' ),
				'contain'               => esc_attr__( 'Contain', 'tm-dione' ),
				'background-size'       => esc_attr__( 'Background Size', 'tm-dione' ),
				'fixed'                 => esc_attr__( 'Fixed', 'tm-dione' ),
				'scroll'                => esc_attr__( 'Scroll', 'tm-dione' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'tm-dione' ),
				'left-top'              => esc_attr__( 'Left Top', 'tm-dione' ),
				'left-center'           => esc_attr__( 'Left Center', 'tm-dione' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'tm-dione' ),
				'right-top'             => esc_attr__( 'Right Top', 'tm-dione' ),
				'right-center'          => esc_attr__( 'Right Center', 'tm-dione' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'tm-dione' ),
				'center-top'            => esc_attr__( 'Center Top', 'tm-dione' ),
				'center-center'         => esc_attr__( 'Center Center', 'tm-dione' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'tm-dione' ),
				'background-position'   => esc_attr__( 'Background Position', 'tm-dione' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'tm-dione' ),
				'on'                    => esc_attr__( 'ON', 'tm-dione' ),
				'off'                   => esc_attr__( 'OFF', 'tm-dione' ),
				'all'                   => esc_attr__( 'All', 'tm-dione' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'tm-dione' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'tm-dione' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'tm-dione' ),
				'greek'                 => esc_attr__( 'Greek', 'tm-dione' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'tm-dione' ),
				'khmer'                 => esc_attr__( 'Khmer', 'tm-dione' ),
				'latin'                 => esc_attr__( 'Latin', 'tm-dione' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'tm-dione' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'tm-dione' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'tm-dione' ),
				'arabic'                => esc_attr__( 'Arabic', 'tm-dione' ),
				'bengali'               => esc_attr__( 'Bengali', 'tm-dione' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'tm-dione' ),
				'tamil'                 => esc_attr__( 'Tamil', 'tm-dione' ),
				'telugu'                => esc_attr__( 'Telugu', 'tm-dione' ),
				'thai'                  => esc_attr__( 'Thai', 'tm-dione' ),
				'serif'                 => _x( 'Serif', 'font style', 'tm-dione' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'tm-dione' ),
				'monospace'             => _x( 'Monospace', 'font style', 'tm-dione' ),
				'font-family'           => esc_attr__( 'Font Family', 'tm-dione' ),
				'font-size'             => esc_attr__( 'Font Size', 'tm-dione' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'tm-dione' ),
				'line-height'           => esc_attr__( 'Line Height', 'tm-dione' ),
				'font-style'            => esc_attr__( 'Font Style', 'tm-dione' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'tm-dione' ),
				'top'                   => esc_attr__( 'Top', 'tm-dione' ),
				'bottom'                => esc_attr__( 'Bottom', 'tm-dione' ),
				'left'                  => esc_attr__( 'Left', 'tm-dione' ),
				'right'                 => esc_attr__( 'Right', 'tm-dione' ),
				'center'                => esc_attr__( 'Center', 'tm-dione' ),
				'justify'               => esc_attr__( 'Justify', 'tm-dione' ),
				'color'                 => esc_attr__( 'Color', 'tm-dione' ),
				'add-image'             => esc_attr__( 'Add Image', 'tm-dione' ),
				'change-image'          => esc_attr__( 'Change Image', 'tm-dione' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'tm-dione' ),
				'add-file'              => esc_attr__( 'Add File', 'tm-dione' ),
				'change-file'           => esc_attr__( 'Change File', 'tm-dione' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'tm-dione' ),
				'remove'                => esc_attr__( 'Remove', 'tm-dione' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'tm-dione' ),
				'variant'               => esc_attr__( 'Variant', 'tm-dione' ),
				'subsets'               => esc_attr__( 'Subset', 'tm-dione' ),
				'size'                  => esc_attr__( 'Size', 'tm-dione' ),
				'height'                => esc_attr__( 'Height', 'tm-dione' ),
				'spacing'               => esc_attr__( 'Spacing', 'tm-dione' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'tm-dione' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'tm-dione' ),
				'light'                 => esc_attr__( 'Light 200', 'tm-dione' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'tm-dione' ),
				'book'                  => esc_attr__( 'Book 300', 'tm-dione' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'tm-dione' ),
				'regular'               => esc_attr__( 'Normal 400', 'tm-dione' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'tm-dione' ),
				'medium'                => esc_attr__( 'Medium 500', 'tm-dione' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'tm-dione' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'tm-dione' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'tm-dione' ),
				'bold'                  => esc_attr__( 'Bold 700', 'tm-dione' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'tm-dione' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'tm-dione' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'tm-dione' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'tm-dione' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'tm-dione' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'tm-dione' ),
				'add-new'           	=> esc_attr__( 'Add new', 'tm-dione' ),
				'row'           		=> esc_attr__( 'row', 'tm-dione' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'tm-dione' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'tm-dione' ),
				'back'                  => esc_attr__( 'Back', 'tm-dione' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'tm-dione' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'tm-dione' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'tm-dione' ),
				'none'                  => esc_attr__( 'None', 'tm-dione' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'tm-dione' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'tm-dione' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'tm-dione' ),
				'initial'               => esc_attr__( 'Initial', 'tm-dione' ),
				'select-page'           => esc_attr__( 'Select a Page', 'tm-dione' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'tm-dione' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'tm-dione' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'tm-dione' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'tm-dione' ),
			);

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
