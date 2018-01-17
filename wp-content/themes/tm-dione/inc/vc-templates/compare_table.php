<?php
extract( shortcode_atts( array(
	'title'            => '',
	'element_tag'      => '',
	'compare_enable'   => '',
	'auto_create_cell' => '',
	'captions'         => '',
	'custom_height'    => '',
	'el_class'         => '',
	'el_id'            => '',
	'css'              => '',
), $atts ) );

global $tm_auto_create_cell, $tm_custom_height;
$tm_auto_create_cell = $auto_create_cell;

$captions = explode( "\n", $captions );

$row_style = '';

$tm_custom_height = uniqid('row-');

if ( $auto_create_cell != 'auto_create_cell_value' && $custom_height != '' ) {
	$row_style = tm_dione_add_style( $row_style, 'height', $custom_height . 'px');
	tm_dione_apply_style( $row_style, '.' . $tm_custom_height);
}
?>

<?php if ( $compare_enable == 'compare_enable_value' ): ?>
	<div class="packages-pricing-table">
		<table class="table table-striped caption-table">
			<thead>
			<tr>
				<th>
					<div class="heading-3"><?php echo '' . $title ?></div>
				</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if ( $auto_create_cell != 'auto_create_cell_value' ) {
				echo '<tr class="'.  $tm_custom_height . '"><td>';
			}
			?>
			<?php foreach ( $captions as $caption ) {

				if ( $auto_create_cell == 'auto_create_cell_value' ) {
					echo '<tr><td>';
				}

				echo do_shortcode( $caption );

				if ( $auto_create_cell == 'auto_create_cell_value' ) {
					echo '</td></tr>';
				}
			}
			?>
			<?php
			if ( $auto_create_cell != 'auto_create_cell_value' ) {
				echo '</td></tr>';
			}
			?>
			</tbody>
		</table>
		<div class="pricing-tables">
			<?php echo do_shortcode( $content ) ?>
		</div>
	</div>
<?php else: ?>
	<div class="pricing-tables packages-pricing-table">
		<?php echo do_shortcode( $content ) ?>
	</div>
<?php endif; ?>
