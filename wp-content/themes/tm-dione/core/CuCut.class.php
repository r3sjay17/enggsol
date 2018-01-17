<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/*
 * Customizer Shortcut
 *
 * @package CuCut
 */

if (!class_exists('CuCut')) {
    class CuCut
    {
	    /**
	     * The constructor.
	     */
		public $customize;

	    public function __construct($customize = array())
	    {
			if( empty( $customize ) ) {
				// Default settings
				$customize = array(
					array(
						'type' 	   => 'section',
						'settings' => 'header',
						'label'    => esc_html__( 'Customize Header', 'tm-dione' ),
						'selector' => '.header-container',
						'position' => 'center top',
					),
					array(
						'type' 	   => 'section',
						'settings' => 'footer',
						'label'    => esc_html__( 'Customize Footer', 'tm-dione' ),
						'selector' => '.footer-wrapper',
						'position' => 'center top',
					),
					array(
						'type' 	   => 'section',
						'settings' => 'blog',
						'label'    => esc_html__( 'Customize Blog Header', 'tm-dione' ),
						'selector' => '.header-blog-wrapper',
						'position' => 'center top',
					),
					array(
						'type' 	   => 'section',
						'settings' => 'sidebar-widgets-sidebar-1',
						'label'    => esc_html__( 'Sidebar', 'tm-dione' ),
						'selector' => '.blog .sidebar',
						'position' => 'center top',
					),
					array(
						'type' 	   => 'section',
						'settings' => 'sidebar-widgets-sidebar-shop',
						'label'    => esc_html__( 'Sidebar', 'tm-dione' ),
						'selector' => '.woocommerce .sidebar',
						'position' => 'center top',
					),
					array(
						'type' 	   => 'section',
						'settings' => 'page',
						'label'    => esc_html__( 'Customize Page Title', 'tm-dione' ),
						'selector' => '.page-big-title',
						'position' => 'center top',
					),
				);
			}
			$this->customize = $customize;
	        // add_action('customize_preview_init', array($this, 'js'));
			add_action('wp_footer', array($this, 'js'));
			add_action('customize_controls_enqueue_scripts', array($this, 'customize_controls_enqueue_scripts'));
	        add_action('wp_head', array($this, 'css'));
	    }

	    /**
	     * Enqueue scrips & styles.
	     */
	    public function js()
	    {
			// wp_register_script( 'tm-customizer', TM_DIONE_THEME_ROOT . '/assets/js/customizer.js', array( 'jquery' ), TM_DIONE_PARENT_THEME_VERSION );
			// wp_localize_script( 'tm-customizer', 'tm_customizer', $this->customize );
	        // wp_enqueue_script( 'tm-customizer' );
			?>
			<script type="text/javascript">
				(function($) {
					$(document).ready(function() {

						var tm_customizer = <?php $this->output ( wp_json_encode($this->customize) ); ?>;

						var api = parent.wp.customize;

						$.each( tm_customizer, function( key, tm_customize ) {
						  $(tm_customize.selector).addClass('tm-customizer-control');
						  $(tm_customize.selector).append('<span class="tm-customizer-control-a '+tm_customize.position+'" data-focus="'+tm_customize.settings+'" data-type="'+tm_customize.type+'">'+tm_customize.label+' <i class="fa fa-cog fa-spin fa-fw"></i></span>');

						});
						$('.tm-customizer-control-a').on('click', function() {
							if( $(this).data('type') == 'section' ) {
								api.section( $(this).data('focus') ).expand();
							} else {
								api.control( $(this).data('focus') ).focus();
							}
						});
					});
				})(jQuery);
			</script>
			<?php
	    }

		public function customize_controls_enqueue_scripts()
		{
			wp_add_inline_script( 'wp-color-picker', "
			(function($) {
				$(document).ready(function() {
					var api = parent.wp.customize;
					$('.description a').on('click', function(e) {
						e.preventDefault();
						if( $(this).data('type') == 'section' ) {
							api.section( $(this).data('focus') ).expand();
						} else {
							api.control( $(this).data('focus') ).focus();
						}
						return false;
					});
				});
			})(jQuery);" );
			?>
			<?php
		}

	    /**
	     * Style.
	     */
	    public function css()
	    {
			?>
	        <style>

			/* Customizer */
				.tm-customizer-control:hover {
				  border: 1px dashed #000;
				  position: relative; }
				  .tm-customizer-control:hover .tm-customizer-control-a {
				    display: block; }
				    .tm-customizer-control:hover .tm-customizer-control-a:hover {
				      color: #fff !important;
				      background-color: #000 !important; }

				.tm-customizer-control-a {
				  -webkit-transition: opacity 1s cubic-bezier(0.645, 0.045, 0.355, 1);
				  transition: opacity 1s cubic-bezier(0.645, 0.045, 0.355, 1);
				  display: none;
				  position: absolute;
				  top: 10px;
				  left: 10px;
				  cursor: pointer;
				  background-color: #333 !important;
				  color: #ccc !important;
				  border-radius: 3px !important;
				  padding: 5px 10px !important;
				  z-index: 99 !important; }
				  .tm-customizer-control-a.left {
				    left: 10px; }
				  .tm-customizer-control-a.right {
				    left: auto;
				    right: 10px; }
				  .tm-customizer-control-a.center {
				    left: 50%;
				    -webkit-transform: translateX(-50%);
				            transform: translateX(-50%); }
				  .tm-customizer-control-a.top {
				    top: 10px; }
				  .tm-customizer-control-a.middle {
				    top: 50%;
				    -webkit-transform: translateY(-50%);
				            transform: translateY(-50%); }
				  .tm-customizer-control-a.bottom {
				    top: auto;
				    bottom: 10px; }
				  .tm-customizer-control-a.center.middle {
				    -webkit-transform: translate(-50%, -50%);
				    transform: translate(-50%, -50%);
				};

			</style>
			<?php
	    }

		/**
	     * Ouput.
	     */
		public function output($content)
	    {
	        echo '' . $content;
	    }
    }

	if(is_customize_preview()) {
		new CuCut();
	}

}
