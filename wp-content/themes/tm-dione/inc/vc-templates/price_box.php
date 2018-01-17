<?php
extract( shortcode_atts( array(
	'title'                 => '',
	'price'                 => '',
	'features'              => '',
	'button_link'           => '',
	'button_style'          => '',
	'button_size'           => '',
	'column_size'           => '3',
	'box_style'             => '',
	'special_column_enable' => '',
), $atts ) );

global $tm_auto_create_cell, $tm_custom_height;
$auto_create_cell = $tm_auto_create_cell;

$css_class = $box_style;
$features  = explode( "\n", ( $features ) );

if ( $special_column_enable == 'special_column_enable_value' ) {
	$css_class .= ' price-box-featured';
}

switch ( $column_size ) {
	case '2':
		$css_class .= ' col-md-2';
		break;
	case '3':
		$css_class .= ' col-md-3';
		break;
	case '4':
		$css_class .= ' col-md-4';
		break;
	case '6':
		$css_class .= ' col-md-6';
		break;
	default:
		break;
}

?>

<table class="table table-striped pricing-table <?php echo esc_attr( $css_class ) ?>">
	<thead>
	<tr>
		<th>
			<div class="pricing-table-title"><?php echo '' . $title ?></div>
			<div class="pricing-table-price"><?php echo '' . $price ?></div>
		</th>
	</tr>
	</thead>
	<tbody>
	<?php
	if ( $auto_create_cell != 'auto_create_cell_value' ) {
		echo '<tr class="'.  $tm_custom_height . '"><td>';
	}
	?>
	<?php foreach ( $features as $feature ) { ?>
		<?php
		if ( $auto_create_cell == 'auto_create_cell_value' ) {
			echo '<tr><td>';
		}
		?>
		<?php
		if ( trim( strip_tags( $feature ) ) == 'v' ) {
			echo '<i class="fa fa-check"></i>';
		} else if ( trim( strip_tags( $feature ) ) == 'x' ) {
			echo '<i class="fa fa-times"></i>';
		} else {
			echo '' . $feature;
		}
		?>
		<?php
		if ( $auto_create_cell == 'auto_create_cell_value' ) {
			echo '</td></tr>';
		}
		?>
	<?php } ?>
	<?php
	if ( $auto_create_cell != 'auto_create_cell_value' ) {
		echo '</td></tr>';
	}
	?>
	</tbody>
	<tfoot>
	<tr>
		<?php
		$button_link = vc_build_link( $button_link );
		$link        = ( isset( $button_link['url'] ) ) ? $button_link['url'] : '';
		$text        = ( isset( $button_link['title'] ) ) ? $button_link['title'] : '';
		$target      = ( isset( $button_link['target'] ) ) ? $button_link['target'] : '';
		?>
		<td>
			<a href="<?php echo esc_url( $link ) ?>" target="<?php echo esc_attr( $target ) ?>"
			   class="btn btn-border-black">
				<?php echo '' . $text ?>
			</a>
		</td>
	</tr>
	</tfoot>
</table>
