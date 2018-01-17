<?php
/**
 * Infinity functions and definitions.
 */

// Remove all option in Customizer.
//remove_theme_mods();

if (!function_exists('tm_dione_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     * ===========================================================================
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function tm_dione_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Infinity, use a find and replace
         * to change 'tm-dione' to the name of your theme in all the template files
         */
        load_theme_textdomain('tm-dione', get_template_directory().'/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        add_image_size('tm-dione-post-thumb', 848, 450, true);
		add_image_size('tm-dione-500-500', 500, 500, true);
        add_image_size('tm-dione-500-250', 500, 240, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'tm-dione'),
            'top' => esc_html__('Top Menu', 'tm-dione'),
            'mobile' => esc_html__('Mobile Menu', 'tm-dione'),
            'social' => esc_html__('Social Menu', 'tm-dione'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array('image', 'audio', 'video', 'quote', 'gallery'));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('infinity_custom_background_args', array(
            'default-color' => '#ffffff',
            'default-image' => '',
        )));

        // Support woocommerce
        add_theme_support('woocommerce');
    }
endif; // tm_dione_setup
add_action('after_setup_theme', 'tm_dione_setup');

/*
 * Define Constants
 * ================
 */
define('TM_DIONE_THEME_ROOT', esc_url(get_template_directory_uri()));
define('TM_DIONE_PARENT_THEME_NAME', wp_get_theme(get_template())->get('Name'));
define('TM_DIONE_PARENT_THEME_VERSION', wp_get_theme(get_template())->get('Version'));
define('TM_DIONE_PARENT_THEME_AUTHOR', wp_get_theme(get_template())->get('Author'));
define('TM_DIONE_PRIMARY_COLOR', '#0076A3');
define('TM_DIONE_SECONDARY_COLOR', '#00AEEF');
define('TM_DIONE_PRIMARY_FONT', 'Poppins');
define('TM_DIONE_SECONDARY_FONT', 'Raleway');

define( 'BFITHUMB_UPLOAD_DIR', 'tm-bfi' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * ===========================================================================
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if (!isset($content_width)) {
    $content_width = 640; /* pixels */
}

/**
 * Register widget area.
 * ====================.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tm_dione_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('About us Menus', 'tm-dione'),
        'id' => 'aboutus-menu',
        'description' => esc_html__('Area of right side', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));
    
    
    register_sidebar(array(
        'name' => esc_html__('Business Menus', 'tm-dione'),
        'id' => 'business-menu',
        'description' => esc_html__('Area of right side', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));
    
    

    register_sidebar(array(
        'name' => esc_html__('Enggsol Top Menus', 'tm-dione'),
        'id' => 'top-slider',
        'description' => esc_html__('Area of top header', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Header Right', 'tm-dione'),
        'id' => 'header-right',
        'description' => esc_html__('Area of header right', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget header-right %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    if (class_exists('WooCommerce')) {
        register_sidebar(array(
            'name' => esc_html__('Sidebar for shop', 'tm-dione'),
            'id' => 'sidebar-shop',
            'description' => esc_html__('Area of Shop right side', 'tm-dione'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
        ));
    }

    register_sidebar(array(
        'name' => esc_html__('Sidemenu', 'tm-dione'),
        'id' => 'sidebar-sidemenu',
        'description' => esc_html__('Area of Menu right side, not support sub-menu', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));
    
    
     register_sidebar(array(
        'name' => esc_html__('Career Sidebar', 'tm-dione'),
        'id' => 'sidebar-career',
        'description' => esc_html__('Area of Menu right side, not support sub-menu', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    
    register_sidebar(array(
        'name' => esc_html__('Information Sidebar', 'tm-dione'),
        'id' => 'sidebar-information',
        'description' => esc_html__('Area of Menu right side, not support sub-menu', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    

	register_sidebar(array(
        'name' => esc_html__('Logo Footer', 'tm-dione'),
        'id' => 'footer',
        'description' => esc_html__('Area of Footer-column-1', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title"><span>',
        'after_title' => '</span></h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Menus', 'tm-dione'),
        'id' => 'footer2',
        'description' => esc_html__('Area of Footer-column-2', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title"><span>',
        'after_title' => '</span></h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Copyright Enggsol', 'tm-dione'),
        'id' => 'footer3',
        'description' => esc_html__('Area of Footer-column-3', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title"><span>',
        'after_title' => '</span></h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Social Icons', 'tm-dione'),
        'id' => 'footer4',
        'description' => esc_html__('Area of Footer-column-4', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title"><span>',
        'after_title' => '</span></h5>',
    ));

	register_sidebar(array(
        'name' => esc_html__('Footer subscribe form', 'tm-dione'),
        'id' => 'footer-subscribe-form',
        'description' => esc_html__('Area of Footer subscribe form', 'tm-dione'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title"><span>',
        'after_title' => '</span></h5>',
    ));
}

add_action('widgets_init', 'tm_dione_widgets_init');

/**
 * Enqueue scripts and styles.
 * ==========================.
 */
function tm_dione_scripts()
{
    wp_enqueue_style('tm-dione-style', TM_DIONE_THEME_ROOT.'/style.css');

    wp_enqueue_style('font-awesome', TM_DIONE_THEME_ROOT.'/assets/libs/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('pe-icon-7-stroke', TM_DIONE_THEME_ROOT.'/assets/libs/pe-icon-7-stroke/css/pe-icon-7-stroke.css');
    wp_enqueue_style('odometer-theme-minimal', TM_DIONE_THEME_ROOT.'/assets/libs/odometer/odometer-theme-minimal.css');
    wp_enqueue_style('lightgallery', TM_DIONE_THEME_ROOT.'/assets/libs/lightgallery/css/lightgallery.min.css');

    wp_enqueue_style('slick', TM_DIONE_THEME_ROOT.'/assets/libs/slick/slick.css');
    wp_enqueue_style('slick-theme', TM_DIONE_THEME_ROOT.'/assets/libs/slick/slick-theme.css');

    wp_enqueue_style('lightslider', TM_DIONE_THEME_ROOT.'/assets/libs/lightslider/css/lightslider.min.css');

    wp_enqueue_style('onepage-scroll', TM_DIONE_THEME_ROOT.'/assets/libs/onepage-scroll/onepage-scroll.css');

	if(!wp_is_mobile()) {
		// wow
		wp_enqueue_style( 'wow', TM_DIONE_THEME_ROOT . '/assets/libs/wow/css/animate.css' );
		wp_enqueue_script( 'wow', TM_DIONE_THEME_ROOT . '/assets/libs/wow/js/wow.min.js', array( 'jquery' ), TM_DIONE_PARENT_THEME_VERSION, true );
	}

    if (Kirki::get_option('tm-dione', 'rtl') == 1) {
        wp_enqueue_style('tm-dione-main', TM_DIONE_THEME_ROOT.'/assets/css/output/main-rtl.css');
    } else {
        wp_enqueue_style('tm-dione-main', TM_DIONE_THEME_ROOT.'/assets/css/output/main-ltr.css');
    }

    wp_enqueue_script('head-room-jquery', TM_DIONE_THEME_ROOT.'/assets/libs/headroom/jQuery.headroom.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);
    wp_enqueue_script('head-room', TM_DIONE_THEME_ROOT.'/assets/libs/headroom/headroom.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

    wp_enqueue_script('owl-carousel', TM_DIONE_THEME_ROOT.'/assets/libs/owl-carousel/owl.carousel.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

    wp_enqueue_script('slick', TM_DIONE_THEME_ROOT.'/assets/libs/slick/slick.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

    wp_enqueue_script('imagesloaded', TM_DIONE_THEME_ROOT.'/assets/libs/imagesloaded/imagesloaded.pkgd.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);
    wp_enqueue_script('isotope', TM_DIONE_THEME_ROOT.'/assets/libs/isotope/isotope.pkgd.js', array(), TM_DIONE_PARENT_THEME_VERSION, true);

    //Counter
    wp_enqueue_script('waypoint', TM_DIONE_THEME_ROOT.'/assets/libs/waypoint/noframework.waypoints.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);
    wp_enqueue_script('counter', TM_DIONE_THEME_ROOT.'/assets/libs/odometer/odometer.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

    //Accordion
    wp_enqueue_script('collapse', TM_DIONE_THEME_ROOT.'/assets/libs/bootstrap/js/bootstrap.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

    // Slideout
    wp_enqueue_script('slideout', TM_DIONE_THEME_ROOT.'/assets/libs/slideout/slideout.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

    //Lightgallery
    wp_enqueue_script('lightgallery', TM_DIONE_THEME_ROOT.'/assets/libs/lightgallery/js/lightgallery-all.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);
    //lightslider
    wp_enqueue_script('lightslider', TM_DIONE_THEME_ROOT.'/assets/libs/lightslider/js/lightslider.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

    //Countdown
    wp_enqueue_script('countdown', TM_DIONE_THEME_ROOT.'/assets/libs/countdown/countdown.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

	//typed
	wp_enqueue_script('typed', TM_DIONE_THEME_ROOT.'/assets/libs/typed/typed.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

	//fitvids
	wp_enqueue_script('fitvids', TM_DIONE_THEME_ROOT.'/assets/libs/fitvids/jquery.fitvids.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

    //onepage scroll
    wp_enqueue_script('onepage-scroll', TM_DIONE_THEME_ROOT.'/assets/libs/onepage-scroll/jquery.onepage-scroll.min.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

	 wp_enqueue_script('second-script', TM_DIONE_THEME_ROOT.'/assets/js/second-script.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

	 wp_enqueue_script( 'wpb_composer_front_js' );

    wp_enqueue_script('js-main', TM_DIONE_THEME_ROOT.'/assets/js/main.js', array('jquery'), TM_DIONE_PARENT_THEME_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'tm_dione_scripts');

/**
 * Setup custom css.
 * ================.
 */
function tm_dione_custom_css()
{
    $tm_dione_custom_css = Kirki::get_option('tm-dione', 'custom_css');
    if (Kirki::get_option('tm-dione', 'custom_css_enable') == 1) {
        wp_add_inline_style('tm-dione-style', html_entity_decode($tm_dione_custom_css, ENT_QUOTES));
    }
}

add_action('wp_enqueue_scripts', 'tm_dione_custom_css');

function tm_load_custom_wp_admin_style() {
        wp_register_style( 'tm_load_custom_wp_admin_style', get_template_directory_uri() . '/assets/admin/admin.css', false, TM_DIONE_PARENT_THEME_VERSION );
        wp_enqueue_style( 'tm_load_custom_wp_admin_style' );
}
add_action( 'admin_enqueue_scripts', 'tm_load_custom_wp_admin_style' );

/**
 * Implement other setup.
 * ======================.
 */
// Load core
require_once get_template_directory().'/core/core.php';
require_once get_template_directory().'/inc/customizer/customizer.php';
require_once get_template_directory().'/inc/oneclick.php';

// Theme Hook Alliance
require_once get_template_directory().'/inc/tha-theme-hooks.php';

// Load tmg
require_once get_template_directory().'/inc/tgm-plugin-activation.php';
require_once get_template_directory().'/inc/tgm-plugin-registration.php';

// Load metabox
require_once get_template_directory().'/inc/meta-box.php';

// Load custom js
require_once get_template_directory().'/inc/custom-js.php';

// Load custom header
require_once get_template_directory().'/inc/custom-header.php';

// Custom template tags for this theme.
require_once get_template_directory().'/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require_once get_template_directory().'/inc/extras.php';

// Load Jetpack compatibility file.
require_once get_template_directory().'/inc/jetpack.php';

// Load woocommerce function.
require_once get_template_directory().'/woocommerce/woo-functions.php';

if (is_admin() && class_exists('RevSliderAdmin') && isset($productAdmin)) {
    remove_action('admin_notices', array($productAdmin, 'addActivateNotification'));
}

foreach ( glob( get_template_directory() . '/inc/widget/*.php' ) as $widget ) {
	require_once( $widget );
}

// Extend VC
if (class_exists('WPBakeryVisualComposerAbstract')) {
    function tm_dione_requireVcExtend()
    {
        require get_template_directory().'/inc/vc-maps/vc-maps.php';
    }

    add_action('init', 'tm_dione_requireVcExtend', 2);
}

add_action('admin_bar_menu', 'tm_builder_toolbar_links', 100);
function tm_builder_toolbar_links($wp_admin_bar)
{
    $wp_admin_bar->add_node(array(
        'id' => 'tm_builder',
        'title' => '<span class="ab-icon"></span> '.TM_DIONE_PARENT_THEME_NAME.' (v'.TM_DIONE_PARENT_THEME_VERSION.') ',
        'href' => '#',
        'meta' => array('class' => 'tm_builder_menu'),
    ));
    $wp_admin_bar->add_node(array(
        'id' => 'tm_builder_customize',
        'parent' => 'tm_builder',
        'title' => esc_html__('Customize', 'tm-dione'),
        'href' => admin_url('customize.php?url='.urlencode('http'.(isset($_SERVER['HTTPS']) ? 's' : '').'://'."{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}")),
    ));
    $wp_admin_bar->add_node(array(
        'id' => 'tm_builder_support',
        'parent' => 'tm_builder',
        'title' => esc_html__('Need Support?', 'tm-dione'),
        'href' => 'http//support.thememove.com',
        'meta' => array('target' => '_blank'),
    ));
    $wp_admin_bar->remove_node('customize');
    echo '<style>';
    echo '.tm_builder_menu > a{background-color: #eb4723 !important; color: #ffffff !important}';
    echo '.tm_builder_menu > a:hover{background-color: #0073aa !important; color: #ffffff !important}';
    echo '.tm_builder_menu > a > .ab-icon:before{content: "\f540"; top: 2px; color: #ffffff !important}';
    echo '</style>';
}

// Remove all stylesheet Woo
// Remove each style one by one
add_filter('woocommerce_enqueue_styles', 'tm_dequeue_styles');
function tm_dequeue_styles($enqueue_styles)
{
    unset($enqueue_styles['woocommerce-general']);    // Remove the gloss
    unset($enqueue_styles['woocommerce-layout']);        // Remove the layout
    unset($enqueue_styles['woocommerce-smallscreen']);    // Remove the smallscreen optimisation
    return $enqueue_styles;
}

// Or just remove them all in one line
add_filter('woocommerce_enqueue_styles', '__return_false');

// Disable notifier VC
if(function_exists('vc_set_as_theme')) {
  vc_set_as_theme($notifier = false);
 }

function tm_dione_add_style( $style, $property, $value, $contain_value = '' ){
	if(empty($style)) {
		$style = '';
	}
	$style .= $property . ':' . $contain_value . $value . $contain_value . ';';
	return $style;
}
function tm_dione_apply_style($style, $selector, $echo = true) {
	if(empty($style)) {
		return;
	}
	$style = $selector . '{' . $style . '}';
	if($echo) {
		tm_dione_add_style_to_head($style);
	} else {
		return $style;
	}
}
function tm_dione_add_style_to_head($style, $echo = true) {
	$script = '<style id=\''.uniqid('tm-dione-custom-style-').'\' >' . $style . '</style>';
	//$script = '<script id=\''.uniqid('tm-dione-custom-script-').'\' type=\'text/javascript\'>';
		//$script .= '(function($) {';
			//$script .= '$(document).ready(function() {';
				//$script .= '$("head").append("'.$style.'");';
				//$script .= 'document.writeln("'.$style.'");';
			//$script .= '});';
		//$script .= '})(jQuery);';
	//$script .= '</script>';
	if($echo) {
		echo ''. $script;
	} else {
		return $script;
	}
}
function tm_dione_print($html){
	echo '' . $html;
}

function tm_get_all_menus() {
    $args      = array(
        'hide_empty' => true,
        //'fields'     => 'id=>name',
    );
    $menus     = get_terms( 'nav_menu', $args );
	$menu_result = array();
	foreach ($menus as $key => $menu) {
		$menu_result[$menu->slug] = $menu->name;
	}
	$menu_result[''] = esc_html__( 'Default Menu', 'tm-dione' );
    return $menu_result;
}

function tm_get_logo($type = 'normal'){
	$logo = '';
	switch ($type) {
		case 'sticky':
			$logo = Kirki::get_option( 'tm-dione', 'logo_sticky' );
			break;
		default:
			global $dark_light_logo;
			switch ($dark_light_logo) {
				case 'dark':
					$logo = Kirki::get_option( 'tm-dione', 'logo_dark' );
					break;
				case 'light':
					$logo = Kirki::get_option( 'tm-dione', 'logo_light' );
					break;
				default:
					$logo = Kirki::get_option( 'tm-dione', 'logo_normal' );
					break;
			}
			break;
	}
	return $logo;
}

// Post

// Adding new field for Quote Post Format
if ( ! function_exists( 'tm_dioneadd_quote_text_field' ) ) {
	function tm_dioneadd_quote_text_field() {
		global $post;
		?>
		<div class="vp-pfui-elm-block">
			<label for="vp-pfui-format-quote-text"><?php esc_html_e( 'Quote', 'tm-dione' ); ?></label>

      <textarea name="_format_quote_text" id="vp-pfui-format-quote-text" cols="30"
                rows="10"><?php echo esc_attr( get_post_meta( $post->ID, '_format_quote_text', true ) ); ?></textarea>

		</div>
		<?php
	}

	add_action( 'vp_pfui_after_quote_meta', 'tm_dioneadd_quote_text_field' );
}

if ( ! function_exists( 'tm_dioneadd_gallery_type_field' ) ) {
	function tm_dioneadd_gallery_type_field() {
		global $post;
		$type = get_post_meta( $post->ID, '_format_gallery_type', true );
		if ( ! $type ) {
			$type = 'slider';
		}
		?>
		<div class="vp-pfui-elm-block">
			<label for="vp-pfui-format-gallery-type"><?php esc_html_e( 'Gallery Type', 'tm-dione' ); ?></label>
			<input type="radio" name="_format_gallery_type" value="slider"
			       id="slider" <?php checked( $type, "slider" ); ?>><label style="display: inline-block; padding:0 10px 0 0;"
			                                                               for="slider"><?php esc_html_e( 'Slider', 'tm-dione' ); ?></label>
			<input type="radio" name="_format_gallery_type" value="masonry"
			       id="masonry" <?php checked( $type, "masonry" ); ?>><label
				style="display: inline-block; padding:0 10px 0 0;" for="masonry"><?php esc_html_e( 'Masonry', 'tm-dione' ); ?></label>
		</div>
		<?php
	}

	add_action( 'vp_pfui_after_gallery_meta', 'tm_dioneadd_gallery_type_field' );
}

add_action( 'admin_init', 'tm_dioneadmin_init' );

function tm_dioneadmin_init() {
	$post_formats = get_theme_support( 'post-formats' );
	if ( ! empty( $post_formats[0] ) && is_array( $post_formats[0] ) ) {
		if ( in_array( 'quote', $post_formats[0] ) ) {
			add_action( 'save_post', 'tm_dionecustom_save_post' );
		}
	}
}

function tm_dionecustom_save_post( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! defined( 'XMLRPC_REQUEST' ) ) {
		if ( isset( $_POST['_format_quote_text'] ) ) {
			update_post_meta( $post_id, '_format_quote_text', $_POST['_format_quote_text'] );
		}
		if ( isset( $_POST['_format_gallery_type'] ) ) {
			update_post_meta( $post_id, '_format_gallery_type', $_POST['_format_gallery_type'] );
		}
	}
}

/**
 * search_filter
 * ================
 */
function tm_search_filter( $query ) {
	if( is_search() ) {
		if (  Kirki::get_option( 'tm-dione', 'search_mode' ) == 1 && Kirki::get_option( 'tm-dione', 'search_only_posts' ) == 1 && ( ! isset( $query->query_vars['post_type'] ) ) ) {
			$query->set( 'post_type', array( 'post' ) );
		}
	}
}

add_action( 'pre_get_posts', 'tm_search_filter' );





require_once get_template_directory() . '/custom-php/custom-functions.php';
