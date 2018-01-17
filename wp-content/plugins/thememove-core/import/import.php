<?php
define( 'TM_IMPORT_URL', untrailingslashit( plugins_url( '/', __FILE__ ) ) );
define( 'TM_IMPORT_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

class ThemeMove_Import {
	public $demos = array();
	public $style = array();
	public $support = array();
	public $generate_thumb = false;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'register_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'init', array( $this, 'init' ) );

		// AJAX Import
		add_action( 'wp_ajax_tm_import', array( $this, 'import' ) );
	}

	public function init() {
		$this->theme          = wp_get_theme();
		$this->demos          = apply_filters( 'thememove_import_demos', array() );
		$this->style          = apply_filters( 'thememove_import_style', array(
			'title_color'  => '#222222',
			'link_color'   => '#337ab7',
			'notice_color' => '#00BF50',
			'logo'         => ''
		) );
		$this->support        = apply_filters( 'thememove_import_support', array(
			'name'       => 'ThemeMove',
			'author_url' => 'http://themeforest.net/user/thememove/portfolio',
			'url'        => 'http://support.thememove.com',
			'text'       => 'support.thememove.com',
		) );
		$this->generate_thumb = apply_filters( 'thememove_import_generate_thumb', false );
	}

	public function register_menu() {
		add_menu_page( $this->theme . ' Theme', esc_html__( $this->theme . ' Import', 'thememove' ), 'manage_options', 'tm_import_page', array(
			&$this,
			'register_page'
		), 'dashicons-download' );
	}

	public function register_page() {
		$demos          = $this->demos;
		$style          = $this->style;
		$support        = $this->support;
		$generate_thumb = $this->generate_thumb;

		include( TM_IMPORT_PATH . DS . 'import-page.php' );
	}

	public function enqueue_scripts() {
		$screen = get_current_screen();

		if ( $screen->id == 'toplevel_page_tm_import_page' ) {
			wp_enqueue_style( 'tm_import_css', TM_IMPORT_URL . '/assets/css/import.css', array(), '1.0' );
		}
	}
}

new ThemeMove_Import();