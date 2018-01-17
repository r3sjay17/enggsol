<?php
if ( ! function_exists( 'tm_dione_register_theme_plugins' ) ) :
	function tm_dione_register_theme_plugins() {

		$plugins = array(
			array(
                'name'               => esc_html__('ThemeMove Core', 'tm-dione'),
                'slug'               => 'thememove-core',
                'source'             => 'https://bitbucket.org/digitalcreative/thememove-plugins/raw/2f0d5d583bb2f68a082f094ef158c5deca03ca1d/thememove-core-1.3.4.1.zip',
                'version'            => '1.3.4.1',
                'required'           => true,
                'force_deactivation' => true,
            ),
			array(
                'name'               => esc_html__('Dione plugin', 'tm-dione' ),
                'slug'               => 'tm-dione-plugin',
                'source'             => 'http://api.insightstud.io/update/dione/plugins/tm-dione-plugin.zip',
                'version'            => '1.1',
                'required'           => true,
                'force_deactivation' => true,
            ),

			array(
                'name'     => esc_html__('Visual Composer', 'tm-dione' ),
                'slug'     => 'js_composer',
                'source'   => 'https://bitbucket.org/digitalcreative/thememove-plugins/raw/246cbd85cf16b193cb72818e38c4e51d04862c40/js_composer.zip',
				'version'  => '5.0.1',
                'required' => true
            ),
			array(
                'name'               => esc_html__('Revolution Slider', 'tm-dione'),
                'slug'               => 'revslider',
                'source'             => 'http://api.insightstud.io/update/dione/plugins/revslider.zip',
				'version'  => '5.3.1.5',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false,
            ),
			array(
				'name'               => 'Vafpress Post Formats UI',
				'slug'               => 'vafpress-post-formats-ui-develop',
				'source'             => 'https://bitbucket.org/digitalcreative/thememove-plugins/raw/98b2b31016673bcaa4802db1b1163ab89e95849f/vafpress-post-formats-ui-develop.zip',
				'required'           => true,
				'version'            => '1.5',
			),
			array(
				'name'     => esc_html__('WooCommerce', 'tm-dione'),
				'slug'     => 'woocommerce',
				//'version'  => '2.5.5',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Loco Translate', 'tm-dione'),
				'slug'     => 'loco-translate',
				//'version'  => '1.5.5',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Widget Logic', 'tm-dione'),
				'slug'     => 'widget-logic',
				//'version'  => '0.57',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Contact Form 7', 'tm-dione'),
				'slug'     => 'contact-form-7',
				//'version'  => '4.3.1',
				'required' => false,
			),
			array(
				'name'     => esc_html__('MailChimp', 'tm-dione'),
				'slug'     => 'mailchimp-for-wp',
				//'version'  => '3.1.6',
				'required' => false,
			),
		);

		$config = array(
			'id'           => 'tm-dione',
			// Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',
			// Default absolute path to pre-packaged plugins.
			'menu'         => 'tgmpa-install-plugins',
			// Menu slug.
			'parent_slug'  => 'themes.php',
			// Parent menu slug.
			'capability'   => 'edit_theme_options',
			// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,
			// Show admin notices or not.
			'dismissable'  => true,
			// If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',
			// If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,
			// Automatically activate plugins after installation or not.
			'message'      => '',
			// Message to output right before the plugins table.
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'tm-dione' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'tm-dione' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'tm-dione' ),
				// %s = plugin name.
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'tm-dione' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'notice_ask_to_update_maybe'      => _n_noop( 'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tm-dione' ),
				'update_link'                     => _n_noop( 'Begin updating plugin', 'Begin updating plugins', 'tm-dione' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tm-dione' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'tm-dione' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'tm-dione' ),
				'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'tm-dione' ),
				'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'tm-dione' ),
				// %1$s = plugin name(s).
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'tm-dione' ),
				// %s = dashboard link.
				'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'tm-dione' ),
				'nag_type'                        => 'updated',
				// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			)
		);

		tgmpa( $plugins, $config );

	}

	add_action( 'tgmpa_register', 'tm_dione_register_theme_plugins' );
endif;
