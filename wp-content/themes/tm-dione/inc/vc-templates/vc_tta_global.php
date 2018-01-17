<?php

global $tm_tta_type;

if ( 'vc_tta_accordion' == $this->settings['base'] ) :

	$tm_tta_type = 'vc_tta_accordion';

	extract( shortcode_atts( array(
		//'active_section' => '',
		'collapsible_all' => '',
		'el_class'        => '',
	), $atts ) );

	global $tm_accordion_id;

	$output = '';

	$tm_accordion_id = ( $collapsible_all == 'enable_collapsible_all_value' ) ? '' : uniqid('accordion-');

	$el_class  = $this->getExtraClass( $el_class );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'accordion panel-group', $this->settings['base'] );

	$output .= "\n\t" . '<div id="' . esc_attr( $tm_accordion_id ) . '" class="' . $css_class . '">';
	$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );
	$output .= '</div>' . $this->endBlockComment( '.wpb_accordion' );

	echo '' . $output;

elseif ( 'vc_tta_tabs' == $this->settings['base'] ):

	extract( shortcode_atts( array(
		'style'    => 'style-01',
		'el_class' => '',
	), $atts ) );

	global $tm_tabs, $tab_active;
	$tm_tta_type = 'vc_tta_tabs';
	$tm_tabs = array();

	do_shortcode( $content );

	?>

	<div class="tabs-container <?php echo esc_attr( $style ) ?>">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<?php foreach ( $tm_tabs['nav'] as $id => $nav ) : ?>
				<li role="presentation" class="<?php if ( $tab_active == $id ) {
					echo 'active';
				} ?>">
					<a href="#<?php echo esc_attr( $id ) ?>" aria-controls="<?php echo esc_attr( $id ) ?>" role="tab"
					   data-toggle="tab"><?php echo esc_html( $nav ) ?></a>
				</li>
			<?php endforeach; ?>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<?php foreach ( $tm_tabs['content'] as $id => $tab_content ) : ?>
				<div role="tabpanel" class="tab-pane <?php if ( $tab_active == $id ) {
					echo 'active';
				} ?>" id="<?php echo esc_attr( $id ) ?>">
					<?php echo do_shortcode( $tab_content ) ?>
				</div>
			<?php endforeach; ?>
		</div>

	</div>

	<?php

endif;
